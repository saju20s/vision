<div>

    <section class="login-section">
        <div class="content login-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="login-card">
                        <h4 class="mb-4 d-flex justify-content-center  align-items-center">
                            @if ($setting?->logo)
                                <a href="/" target="_blank">
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->logotext }}"
                                        class="logo-img me-3 account-img" loading="lazy">
                                </a>
                            @endif
                        </h4>
                        <form wire:submit="sendPasswordResetLink">
                            <div class="mb-3 position-relative">
                                <i class="fas fa-envelope form-icon"></i>
                                <input type="email" wire:model="email" class="form-control login-input-email"
                                    placeholder="Email Address" />

                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa-solid fa-paper-plane me-1"></i> Send password reset link
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





</div>
