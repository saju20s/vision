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
                            <a href="/setting-profile" class="d-block text-dark text-decoration-none" wire:navigate>
                                <i class="fa-solid fa-user me-2"></i> Profile Setting
                            </a>
                            @can('report_signature.view')
                                <a href="/report-signature"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/report-signature') || window
                                            .location
                                            .pathname === '/report-signature'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                                    class="btn btn-primary w-100 toggle-btn profile-button">Prepared
                                                    By</button>
                                                <button id="showPasswordForm" type="button"
                                                    class="btn btn-outline-primary w-100 toggle-btn profile-button">Authorized
                                                    By</button>
                                            </div>

                                            <div class="my-3">
                                                <!-- Profile Form -->
                                                <div id="profileForm" class="form-section active">
                                                    <div class="card rounded-0 border-top-0 profile-password-card">
                                                        <form wire:submit.prevent="store">
                                                            <div class="card-body profile-password-card-body">
                                                                <div class="mb-3">
                                                                    <label for="name"
                                                                        class="form-label fw-semibold">Name</label>
                                                                    <input type="text" id="name"
                                                                        wire:model.defer="name" class="form-control"
                                                                        placeholder="enter your name" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="qualification"
                                                                        class="form-label fw-semibold">Qualification</label>
                                                                    <input type="text" id="qualification"
                                                                        wire:model.defer="qualification"
                                                                        class="form-control"
                                                                        placeholder="enter your qualification" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="designation"
                                                                        class="form-label fw-semibold">Designation</label>
                                                                    <input type="text" id="designation"
                                                                        wire:model.defer="designation"
                                                                        class="form-control"
                                                                        placeholder="enter your designation" />
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
                                                        <form wire:submit.prevent="Update">
                                                            <div class="card-body profile-password-card-body">

                                                                <div class="mb-3">
                                                                    <label for="a_name"
                                                                        class="form-label fw-semibold">Name</label>
                                                                    <input type="text" id="a_name"
                                                                        wire:model.defer="a_name" class="form-control"
                                                                        placeholder="enter your name" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="a_qualification"
                                                                        class="form-label fw-semibold">Qualification</label>
                                                                    <input type="text" id="a_qualification"
                                                                        wire:model.defer="a_qualification"
                                                                        class="form-control"
                                                                        placeholder="enter your qualification" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="a_designation"
                                                                        class="form-label fw-semibold">Designation</label>
                                                                    <input type="text" id="a_designation"
                                                                        wire:model.defer="a_designation"
                                                                        class="form-control"
                                                                        placeholder="enter your designation" />
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary w-25">Save
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- X-Ray Signature --}}
                                    <div class="col-12">
                                        <form wire:submit.prevent="reportSignatureStore"
                                            enctype="multipart/form-data">
                                            <div class="mb-3">
                                                {{-- Existing stored image --}}
                                                <label>X-Ray Report Signature(180x80)</label><br>
                                                <hr>
                                                @if (!$image && $report_signature)
                                                    <div class="mb-3">
                                                        <label>Current Report Signature:</label><br>
                                                        <img src="{{ asset('storage/' . $report_signature) }}"
                                                            loading="lazy"
                                                            class="img-fluid rounded shadow image-preview"
                                                            alt="Current Signature" style="max-height: 150px;">
                                                    </div>
                                                @endif

                                                {{-- New image preview --}}
                                                @if ($image)
                                                    <div class="mb-3">
                                                        <label>New Image Preview:</label><br>
                                                        <img src="{{ $image->temporaryUrl() }}" loading="lazy"
                                                            class="img-fluid rounded shadow image-preview"
                                                            alt="Preview" style="max-height: 150px;">
                                                    </div>
                                                @endif

                                                <label for="image" class="form-label fw-semibold">Image</label>
                                                <input type="file" id="image" wire:model="image"
                                                    class="form-control fImage" />
                                            </div>

                                            <button type="submit" class="btn btn-primary form-control my-2 w-25"
                                                wire:loading.attr="disabled">
                                                Save
                                            </button>
                                        </form>
                                    </div>
                                    {{-- USG Signature --}}
                                    <div class="col-12">
                                        <form wire:submit.prevent="usgSignatureStore">
                                            <div class="my-3">
                                                <label class="form-label fw-semibold">USG Report</label><br>
                                                <hr>
                                                <label for="u_name" class="form-label fw-semibold">Name</label>
                                                <input type="text" id="u_name" wire:model.defer="u_name"
                                                    class="form-control" placeholder="enter your name" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="u_qualification"
                                                    class="form-label fw-semibold">Qualification</label>
                                                <input type="text" id="u_qualification"
                                                    wire:model.defer="u_qualification" class="form-control"
                                                    placeholder="enter your qualification" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="u_designation"
                                                    class="form-label fw-semibold">Designation</label>
                                                <input type="text" id="u_designation"
                                                    wire:model.defer="u_designation" class="form-control"
                                                    placeholder="enter your designation" />
                                            </div>

                                            <button type="submit" class="btn btn-primary form-control my-2 w-25"
                                                wire:loading.attr="disabled">
                                                Save
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


</div>
