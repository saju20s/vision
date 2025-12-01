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
                                <a href="/setting-header"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/setting-header') || window
                                            .location
                                            .pathname === '/setting-header'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="logotext" class="form-label fw-semibold">Logo Text
                                                        (Required)</label>
                                                    <input type="text" id="logotext" wire:model.defer="logotext"
                                                        class="form-control" placeholder="logo text" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="header_color" class="form-label fw-semibold">Header
                                                        Bg</label>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="header_color"
                                                            wire:model.defer="header_color"
                                                            class="form-control form-control-color w-25" />

                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setHeaderColor">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="header_text_color" class="form-label fw-semibold">Header
                                                        Text</label>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="header_text_color"
                                                            wire:model.defer="header_text_color"
                                                            class="form-control form-control-color w-25" />

                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setHeaderTextColor">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="menu_color" class="form-label fw-semibold">Menu
                                                        Bg</label>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="menu_color"
                                                            wire:model.defer="menu_color"
                                                            class="form-control form-control-color w-25" />

                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setMenuColor">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="menu_color" class="form-label fw-semibold">Menu
                                                        Text</label>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="menu_text_color"
                                                            wire:model.defer="menu_text_color"
                                                            class="form-control form-control-color w-25" />

                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setMenuTextColor">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>

                                                {{-- Banner Image --}}
                                                <div class="mb-3">
                                                    {{-- old banner Preview --}}
                                                    @if ($datas->banner)
                                                        <img class="img-fluid logo-identity-img rounded shadow w-100"
                                                            alt="Preview"
                                                            src="{{ asset('storage/' . $datas->banner) }}"
                                                            loading="lazy">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif

                                                    {{-- new banner Preview --}}
                                                    @if ($banner)
                                                        <div class="mt-3">
                                                            <img src="{{ $banner->temporaryUrl() }}"
                                                                class="img-fluid logo-identity-img rounded shadow w-25"
                                                                alt="Preview" loading="lazy">
                                                        </div>
                                                    @endif

                                                    <label for="banner" class="form-label fw-semibold mt-3">Banner
                                                        Image (Optional)</label>
                                                    <input type="file" id="banner" wire:model="banner"
                                                        class="form-control fImage" />
                                                </div>

                                                {{-- Lab Header Image --}}
                                                <div class="mb-3">
                                                    {{-- old lab header Preview --}}
                                                    @if ($datas->lab_header_img)
                                                        <img class="img-fluid logo-identity-img rounded shadow w-100"
                                                            alt="Preview"
                                                            src="{{ asset('storage/' . $datas->lab_header_img) }}"
                                                            loading="lazy">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif

                                                    {{-- new lab header Preview --}}
                                                    @if ($lab_header_img)
                                                        <div class="mt-3">
                                                            <img src="{{ $lab_header_img->temporaryUrl() }}"
                                                                class="img-fluid logo-identity-img rounded shadow w-100"
                                                                alt="Preview" loading="lazy">
                                                        </div>
                                                    @endif

                                                    <label for="lab_header_img" class="form-label fw-semibold mt-3">Lab
                                                        Header Image (Optional)</label>
                                                    <input type="file" id="lab_header_img"
                                                        wire:model="lab_header_img" class="form-control fImage" />
                                                </div>



                                            </div>
                                            @can('settings/header_setting.edit')
                                                <button type="submit"
                                                    class="btn btn-primary form-control w-25 setting-button"
                                                    wire:loading.attr="disabled">Save</button>
                                            @endcan
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



</div>
