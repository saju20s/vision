<div>

    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-0 align-items-stretch">
                    <!-- Sidebar -->
                    <div class="col-md-3 ml-4">
                        <div class="setting-sidebar-left pt-5">
                            @can('settings/logo_&_identity.view')
                                <a href="/setting-logo-identity" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fa-solid fa-border-all me-2"></i> Logo & Identity
                                </a>
                            @endcan
                            @can('settings/header_setting.view')
                                <a href="/setting-header" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fa-solid fa-h me-2"></i> Header Setting
                                </a>
                            @endcan
                            @can('settings/footer_setting.view')
                                <a href="/setting-footer" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fa-solid fa-f me-2"></i> Footer Setting
                                </a>
                            @endcan
                            @can('settings/sidebar.view')
                                <a href="/setting-sidebar" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fa-solid fa-grip me-2"></i> Sidebar
                                </a>
                            @endcan
                            @can('settings/academic_information.view')
                                <a href="/setting-academic" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fa-solid fa-circle-info"></i> Academic Information
                                </a>
                            @endcan
                            <a href="/setting-profile"
                                :class="{
                                    'active': window.location.pathname.startsWith('/setting-profile') || window
                                        .location
                                        .pathname === '/setting-profile'
                                }"
                                class="d-block text-dark text-decoration-none" wire:navigate>
                                <i class="fa-solid fa-user me-2"></i> Profile Setting
                            </a>
                            @can('report_signature.view')
                                <a href="/report-signature" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fa-solid fa-user me-2"></i> Report
                                </a>
                            @endcan                          
                            @can('settings/contact_setting.view')
                                <a href="/setting-contact" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fas fa-address-book me-2"></i> Contact Setting
                                </a>
                            @endcan
                            @can('settings/smtp.view')
                                <a href="/setting-smtp" class="d-block text-dark text-decoration-none" wire:navigate>
                                    <i class="fas fa-envelope me-2"></i> SMTP
                                </a>
                            @endcan
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="setting-content pt-5">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="profile-password-button d-flex">
                                                <button id="showProfileForm" type="button"
                                                    class="btn btn-primary w-100 toggle-btn profile-button">Profile
                                                    Update</button>
                                                <button id="showPasswordForm" type="button"
                                                    class="btn btn-outline-primary w-100 toggle-btn profile-button">Password
                                                    Change</button>
                                            </div>

                                            <div class="my-3">
                                                <!-- Profile Form -->
                                                <div id="profileForm" class="form-section active">
                                                    <div class="card rounded-0 border-top-0 profile-password-card">
                                                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                                                            <div class="card-body profile-password-card-body">
                                                                <div class="mb-3">
                                                                    <label for="name"
                                                                        class="form-label fw-semibold">Name</label>
                                                                    <input type="text" id="name"
                                                                        wire:model.defer="name" class="form-control"
                                                                        placeholder="enter your name" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email"
                                                                        class="form-label fw-semibold">Email</label>
                                                                    <input type="text" id="email"
                                                                        wire:model.defer="email" class="form-control"
                                                                        placeholder="enter your e-mail" />
                                                                </div>

                                                                <div class="mb-3">
                                                                    {{-- old image Preview --}}
                                                                    @if ($datas->image)
                                                                        <img class="img-fluid rounded shadow profile-img-sec"
                                                                            alt="Preview"
                                                                            src="{{ asset('storage/' . $datas->image) }}"
                                                                            loading="lazy">
                                                                    @else
                                                                        <span class="text-muted">No image</span>
                                                                    @endif
                                                                    {{-- image Preview --}}
                                                                    @if ($image)
                                                                        <div class="mt-3">
                                                                            <img src="{{ $image->temporaryUrl() }}"
                                                                                class="img-fluid rounded shadow"
                                                                                alt="Preview" loading="lazy">
                                                                        </div>
                                                                    @endif
                                                                    <label for="image"
                                                                        class="form-label fw-semibold mt-3">Upload
                                                                        Image</label>
                                                                    <input type="file" id="image"
                                                                        wire:model="image"
                                                                        class="form-control fImage" />
                                                                </div>

                                                                <button type="submit" class="btn btn-primary w-25">Save
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Password Form -->
                                                <div id="passwordForm" class="form-section profile-password-sec">
                                                    <div class="card rounded-0 border-top-0 profile-password-card">
                                                        <form wire:submit.prevent="passwordUpdate">
                                                            <div class="card-body profile-password-card-body">

                                                                {{-- Current Password --}}
                                                                <div class="mb-3">
                                                                    <label for="current_password"
                                                                        class="form-label fw-semibold">Current
                                                                        Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password" id="current_password"
                                                                            wire:model.defer="current_password"
                                                                            class="form-control"
                                                                            placeholder="Current Password" />
                                                                        <span class="input-group-text bg-white">
                                                                            <i class="fa-solid fa-eye toggle-password"
                                                                                onclick="togglePassword('current_password', this)"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                {{-- New Password --}}
                                                                <div class="mb-3">
                                                                    <label for="password"
                                                                        class="form-label fw-semibold">New
                                                                        Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password" id="password"
                                                                            wire:model.defer="password"
                                                                            class="form-control"
                                                                            placeholder="New Password" />
                                                                        <span class="input-group-text bg-white">
                                                                            <i class="fa-solid fa-eye toggle-password"
                                                                                onclick="togglePassword('password', this)"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>


                                                                {{-- Confirm Password --}}
                                                                <div class="mb-3">
                                                                    <label for="password_confirmation"
                                                                        class="form-label fw-semibold">Confirm
                                                                        Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password"
                                                                            id="password_confirmation"
                                                                            wire:model.defer="password_confirmation"
                                                                            class="form-control"
                                                                            placeholder="Confirm Password" />
                                                                        <span class="input-group-text bg-white">
                                                                            <i class="fa-solid fa-eye toggle-password"
                                                                                onclick="togglePassword('password_confirmation', this)"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary w-25">Change
                                                                    Password</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function togglePassword(fieldId, icon) {
                const input = document.getElementById(fieldId);
                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }
        </script>
    @endpush



</div>
