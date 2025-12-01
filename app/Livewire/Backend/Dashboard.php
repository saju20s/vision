<?php

namespace App\Livewire\Backend;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Blog;
use App\Models\Team;
use App\Models\User;
use App\Models\Video;
use App\Models\Course;
use App\Models\Doctor;
use App\Models\Notice;
use App\Models\Expense;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Marketing;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $todaySales, $todayProfit, $todayExpense, $todayNetProfit;
    public $thisMonthSales, $thisMonthProfit, $thisMonthExpense, $thisMonthNetProfit;
    public $prevMonthSales, $prevMonthProfit, $prevMonthExpense, $prevMonthNetProfit;
    public $totalSales, $totalProfit, $totalExpense, $totalNetProfit;

    public $todayDiscount, $weeklyDiscount, $thisMonthDiscount, $prevMonthDiscount, $yearlyDiscount, $totalDiscount;
    public $totalDoctor, $totalDoctorCommission, $totalMarketing, $totalMarketingCommission, $totalPatient;

    // protected $timezone = 'Asia/Dhaka';

    public function mount()
    {
        $this->calculateToday();
        $this->calculateWeekly();
        $this->calculateThisMonth();
        $this->calculatePrevMonth();
        $this->calculateYearly();
        $this->calculateTotal();
    }

    protected function calculateDiscount($bills)
    {
        return $bills->sum(function ($bill) {
            if ($bill->discount_type === 'amount') {
                return intval(round($bill->discount));
            } elseif ($bill->discount_type === 'percentage') {
                if ($bill->discount >= 100) {
                    return intval(round($bill->total_amount));
                }
                $gross = ($bill->total_amount * 100) / (100 - $bill->discount);
                return intval(round($gross - $bill->total_amount));
            }
            return 0;
        });
    }



    protected function calculateToday()
    {
        $today = Carbon::now()->startOfDay();
        $bills = Bill::whereDate('created_at', $today)->get();
        $expenses = Expense::whereDate('date', $today)->sum('amount');

        $totalDoctorCommission = $bills->sum('doctor_commision');
        $totalMarketingCommission = $bills->sum('marketing_commision');

        $this->todaySales = $bills->sum('total_amount');
        $this->todayExpense = $expenses;
        $this->todayProfit = $this->todaySales - $totalDoctorCommission - $totalMarketingCommission;
        $this->todayNetProfit = $this->todayProfit - $this->todayExpense;

        $this->todayDiscount = $this->calculateDiscount($bills);
    }

    protected function calculateWeekly()
    {
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();
        $bills = Bill::whereBetween('created_at', [$weekStart, $weekEnd])->get();

        $this->weeklyDiscount = $this->calculateDiscount($bills);
    }

    protected function calculateThisMonth()
    {
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();
        $bills = Bill::whereBetween('created_at', [$monthStart, $monthEnd])->get();
        $expenses = Expense::whereBetween('date', [$monthStart, $monthEnd])->sum('amount');

        $totalDoctorCommission = $bills->sum('doctor_commision');
        $totalMarketingCommission = $bills->sum('marketing_commision');

        $this->thisMonthSales = $bills->sum('total_amount');
        $this->thisMonthExpense = $expenses;
        $this->thisMonthProfit = $this->thisMonthSales - $totalDoctorCommission - $totalMarketingCommission;
        $this->thisMonthNetProfit = $this->thisMonthProfit - $this->thisMonthExpense;

        $this->thisMonthDiscount = $this->calculateDiscount($bills);
    }

    protected function calculatePrevMonth()
    {
        $prevMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $prevMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        $bills = Bill::whereBetween('created_at', [$prevMonthStart, $prevMonthEnd])->get();
        $expenses = Expense::whereBetween('date', [$prevMonthStart, $prevMonthEnd])->sum('amount');

        $totalDoctorCommission = $bills->sum('doctor_commision');
        $totalMarketingCommission = $bills->sum('marketing_commision');

        $this->prevMonthSales = $bills->sum('total_amount');
        $this->prevMonthExpense = $expenses;
        $this->prevMonthProfit = $this->prevMonthSales - $totalDoctorCommission - $totalMarketingCommission;
        $this->prevMonthNetProfit = $this->prevMonthProfit - $this->prevMonthExpense;

        $this->prevMonthDiscount = $this->calculateDiscount($bills);
    }

    protected function calculateYearly()
    {
        $yearStart = Carbon::now()->startOfYear();
        $bills = Bill::whereBetween('created_at', [$yearStart, Carbon::now()])->get();

        $this->yearlyDiscount = $this->calculateDiscount($bills);
    }

    protected function calculateTotal()
    {
        $bills = Bill::all();
        $expenses = Expense::sum('amount');

        $totalDoctorCommission = $bills->sum('doctor_commision');
        $totalMarketingCommission = $bills->sum('marketing_commision');

        $this->totalSales = $bills->sum('total_amount');
        $this->totalExpense = $expenses;
        $this->totalProfit = $this->totalSales - $totalDoctorCommission - $totalMarketingCommission;
        $this->totalNetProfit = $this->totalProfit - $this->totalExpense;

        $this->totalDiscount = $this->calculateDiscount($bills);

        $this->totalDoctor = Doctor::count();
        $this->totalMarketing = Marketing::count();
        $this->totalPatient = Patient::count();

        $this->totalDoctorCommission = $totalDoctorCommission;
        $this->totalMarketingCommission = $totalMarketingCommission;
    }

    public function render()
    {
        $user = Auth::user();
        $default = 'avatar.png';
        $setting = Setting::find(1);
        return view('livewire.backend.dashboard', [
            'post' => Blog::count(),
            'notice' => Notice::where('type', 'notice')->count(),
            'noc' => Notice::where('type', 'noc')->count(),
            'apa' => Notice::where('type', 'apa')->count(),
            'video' => Video::count(),
            'message' => Message::count(),
            'course' => Course::count(),
            'team' => Team::count(),
            'user' => User::count(),
            'todayDiscount' => $this->todayDiscount,
            'weeklyDiscount' => $this->weeklyDiscount,
            'thisMonthDiscount' => $this->thisMonthDiscount,
            'prevMonthDiscount' => $this->prevMonthDiscount,
            'yearlyDiscount' => $this->yearlyDiscount,
            'totalDiscount' => $this->totalDiscount,
            'totalDoctor' => $this->totalDoctor,
            'totalDoctorCommission' => $this->totalDoctorCommission,
            'totalMarketing' => $this->totalMarketing,
            'totalMarketingCommission' => $this->totalMarketingCommission,
            'totalPatient' => $this->totalPatient,
            'permissions' => $user->getAllPermissions()->pluck('name'),
            'roles' => $user->getRoleNames(),
            'setting' => $setting,
            'profile' => $user,
            'default' => $default,
        ])->layout('backend.template.body');
    }
}
