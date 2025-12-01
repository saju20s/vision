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
                                <a href="/setting-academic"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/setting-academic') || window
                                            .location
                                            .pathname === '/setting-academic'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                    <form wire:submit.prevent="store">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="years" class="form-label fw-semibold">Years
                                                        (Required)</label>
                                                    <input type="text" id="years" wire:model.defer="years"
                                                        class="form-control" placeholder="years" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="course" class="form-label fw-semibold">Course
                                                        (Required)</label>
                                                    <input type="text" id="course" wire:model.defer="course"
                                                        class="form-control" placeholder="courses" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="students" class="form-label fw-semibold">Students
                                                        (Required)</label>
                                                    <input type="text" id="students" wire:model.defer="students"
                                                        class="form-control" placeholder="students" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="peoples" class="form-label fw-semibold">Peoples
                                                        (Required)</label>
                                                    <input type="text" id="peoples" wire:model.defer="peoples"
                                                        class="form-control" placeholder="peoples" />
                                                </div>



                                            </div>
                                            @can('settings/academic_information.edit')
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
