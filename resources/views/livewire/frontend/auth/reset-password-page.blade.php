<div>

    <section class="login-section">
        <div class="content login-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="login-card">
                        <h4 class="mb-4 d-flex justify-content-center  align-items-center">
                            <a href="/" target="_blank">
                                @if ($setting?->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->logotext }}"
                                        class="logo-img me-3 account-img" loading="lazy">
                                @endif
                            </a>
                        </h4>
                        <form wire:submit="accountresetpassword">
                            <div class="mb-3 position-relative">
                                <i class="fas fa-envelope form-icon"></i>
                                <input wire:model="email" type="email" class="form-control login-input-email"
                                    placeholder="Email Address" />
                            </div>
                            <div class="mb-3 position-relative">
                                <i class="fas fa-lock form-icon"></i>
                                <input wire:model="password" type="password" class="form-control login-input-email"
                                    id="registerPassword" placeholder="Password" />
                                <span class="password-toggle" onclick="togglePassword('registerPassword', this)">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="mb-3 position-relative">
                                <i class="fas fa-lock form-icon"></i>
                                <input wire:model="password_confirmation" type="password"
                                    class="form-control login-input-email" id="confirmPassword"
                                    placeholder="Confirm Password" />
                                <span class="password-toggle" onclick="togglePassword('confirmPassword', this)">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-user-check me-1"></i> Reset Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function togglePassword(fieldId, iconSpan) {
            const field = document.getElementById(fieldId);
            const icon = iconSpan.querySelector('i');

            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                field.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>







</div>
