<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\Payment;
use App\Models\Setting;
use Livewire\Component;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginPage extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public ?float $latitude = null;
    public ?float $longitude = null;
    public bool $showPaymentNotice = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ];

    // Listen for JS event
    protected $listeners = ['setLocation'];

    public function setLocation($lat = null, $lng = null)
    {
        $this->latitude = $lat !== null ? (float)$lat : null;
        $this->longitude = $lng !== null ? (float)$lng : null;
    }

    public function login($lat = null, $lng = null)
    {
        $this->latitude = $lat !== null ? (float)$lat : null;
        $this->longitude = $lng !== null ? (float)$lng : null;
        try {
            $this->validate();
            $this->ensureIsNotRateLimited();

            if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            }

            // Check if user has any role
            $user = Auth::user();

            if ($user->email !== 'shariful971@gmail.com' && !$user->is_active) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => 'Update your package. Please contact support.',
                ]);
            }


            if ($user->roles->isEmpty()) {
                Auth::logout();
                return redirect('/');
            }

            RateLimiter::clear($this->throttleKey());
            Session::regenerate();

            ActivityLog::create([
                'user_id'     => Auth::id(),
                'action'      => 'Login',
                'details'     => 'User logged in successfully',
                'icon'        => 'fas fa-sign-in-alt',
                'ip_address'  => request()->ip(),
                'user_agent'  => request()->userAgent(),
                'latitude'    => $this->latitude,
                'longitude'   => $this->longitude,
            ]);

            $this->dispatch('toastr:success', message: 'Login successful');
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }


    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    public function render()
    {
        $currentYear  = now()->year;
        $currentMonth = now()->month;
        $allpayments = Payment::latest()->get();

        $payment = Payment::whereYear('paid_for_month', $currentYear)
            ->whereMonth('paid_for_month', $currentMonth)
            ->first();

        if (!$payment) {
            $this->showPaymentNotice = true;
        } else {
            $this->showPaymentNotice = ($payment->amount === null || $payment->amount == 0);
        }

        $rejectedPayment = $allpayments->firstWhere('status', 'rejected');

        if ($rejectedPayment) {
            $this->showPaymentNotice = false;
            $this->dispatch('accountSuspended', message: 'Your account is temporarily suspended');
        }

        $setting = Setting::find(1);

        return view('livewire.frontend.auth.login-page', compact('setting'))
            ->layout('backend.template.body');
    }
}
