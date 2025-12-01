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
                                <a href="/setting-logo-identity"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/setting-logo-identity') ||
                                            window
                                            .location
                                            .pathname === '/setting-logo-identity'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                                    <label for="site_title" class="form-label fw-semibold">Site Title
                                                        (Required)</label>
                                                    <input type="text" id="site_title" wire:model.defer="site_title"
                                                        class="form-control" placeholder="Site Title" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="site_url" class="form-label fw-semibold">Site URL
                                                        (Required)</label>
                                                    <input type="text" id="site_url" wire:model.defer="site_url"
                                                        class="form-control" placeholder="Site url" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="description"
                                                        class="form-label fw-semibold">Description</label>
                                                    <textarea id="description" wire:model.defer="description" class="form-control summernote" rows="10"
                                                        placeholder="Write here description....."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description"
                                                        class="form-label fw-semibold">Keyword</label>
                                                    <textarea id="keyword" wire:model.defer="keyword" class="form-control summernote" rows="10"
                                                        placeholder="Write here keywords....."></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    {{-- old logo Preview --}}
                                                    @if ($datas->logo)
                                                        <img class="img-fluid logo-identity-img rounded shadow"
                                                            alt="Preview" src="{{ asset('storage/' . $datas->logo) }}"
                                                            loading="lazy">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif
                                                    {{-- logo Preview --}}
                                                    @if ($logo)
                                                        <div class="mt-3">
                                                            <img src="{{ $logo->temporaryUrl() }}"
                                                                class="img-fluid logo-identity-img rounded shadow w-25"
                                                                alt="Preview" loading="lazy">
                                                        </div>
                                                    @endif
                                                    <label for="image" class="form-label fw-semibold mt-3">Logo Image
                                                        (Required)
                                                    </label>
                                                    <input type="file" id="logo" wire:model="logo"
                                                        class="form-control fImage" />
                                                </div>

                                                <div class="mb-3">
                                                    {{-- old favicon Preview --}}
                                                    @if ($datas->favicon)
                                                        <img class="img-fluid logo-identity-img rounded shadow"
                                                            alt="Preview"
                                                            src="{{ asset('storage/' . $datas->favicon) }}"
                                                            loading="lazy">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif
                                                    {{-- favicon Preview --}}
                                                    @if ($favicon)
                                                        <div class="mt-3">
                                                            <img src="{{ $favicon->temporaryUrl() }}"
                                                                class="img-fluid logo-identity-img rounded shadow w-25"
                                                                alt="Preview" loading="lazy">
                                                        </div>
                                                    @endif
                                                    <label for="favicon" class="form-label fw-semibold mt-3">Favicon
                                                        Image
                                                        (Required)
                                                    </label>
                                                    <input type="file" id="favicon" wire:model="favicon"
                                                        class="form-control fImage" />
                                                </div>

                                            </div>
                                            @can('settings/logo_&_identity.edit')
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
