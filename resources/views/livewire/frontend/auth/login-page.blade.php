<div>
    <section class="login-section">
        <div class="content login-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="login-card">
                        <h4 class="mb-4 d-flex justify-content-center align-items-center">
                            @if ($setting?->logo)
                                <a href="/">
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->logotext }}"
                                        class="logo-img me-3 account-img" loading="lazy">
                                </a>
                            @endif
                        </h4>

                        <form onsubmit="getLocationAndLogin(event)">
                            <div class="mb-3 position-relative">
                                <i class="fas fa-envelope form-icon"></i>
                                <input type="email" wire:model.defer="email" class="form-control login-input-email"
                                    placeholder="Email Address" required />
                            </div>

                            <div class="mb-3 position-relative">
                                <i class="fas fa-lock form-icon"></i>
                                <input type="password" wire:model.defer="password"
                                    class="form-control login-input-password" id="loginPassword" placeholder="Password"
                                    required />
                                <span class="password-toggle" onclick="togglePassword('loginPassword', this)">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            </div>

                            <div class="my-3 form-check">
                                <input wire:model.defer="remember" type="checkbox" class="form-check-input"
                                    id="remember" />
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </button>

                            <div class="text-center mt-3">
                                <a href="/account-forgot-password" class="form-link" wire:navigate>
                                    <i class="fas fa-key me-1"></i>Forgot Password?
                                </a>
                            </div>
                            @if ($showPaymentNotice)
                                <div class="text-center mt-2">
                                    <span class="text-danger">Please pay your monthly plan(1-10days)</span><br>
                                    <a href="/payment" class="form-link btn btn-danger text-white" wire:navigate>Pay</a>
                                </div>
                            @endif
                            @php
                                $rejectedPayment = \App\Models\Payment::where('status', 'rejected')->first();
                            @endphp

                            @if ($rejectedPayment)
                                <div class="text-center mt-2">
                                    <span class="text-danger">Your account is temporarily suspended</span>
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.getLocationAndLogin = function(event) {
                event.preventDefault();

                const formEl = document.querySelector('form');
                const component = formEl?.closest('[wire\\:id]');
                const wireId = component?.getAttribute('wire:id');
                const livewireInstance = wireId ? Livewire.find(wireId) : null;

                if (!livewireInstance) {
                    console.error("Livewire component not found.");
                    return;
                }

                const callLogin = (lat = null, lng = null) => {
                    livewireInstance.call('login', lat, lng);
                };

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const lat = position.coords.latitude;
                            const lng = position.coords.longitude;
                            callLogin(lat, lng);
                        },
                        function(error) {
                            console.warn('Location error:', error);
                            if (error.code === 1) {
                                livewireInstance.dispatch('toastr:error', {
                                    message: 'Location permission is required to login.'
                                });
                                return;
                            }
                            callLogin(null, null);
                        }, {
                            enableHighAccuracy: true,
                            timeout: 10000,
                            maximumAge: 0
                        }
                    );
                } else {
                    livewireInstance.dispatch('toastr:error', {
                        message: 'Your browser does not support location services.'
                    });
                }
            }
        });
    </script>
</div>
