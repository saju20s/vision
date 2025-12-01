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
                                <a href="/setting-smtp"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/setting-smtp') || window
                                            .location
                                            .pathname === '/setting-smtp'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                                    <label for="mail_mailer" class="form-label fw-semibold">Mail Mailer
                                                    </label>
                                                    <input type="text" id="mail_mailer"
                                                        wire:model.defer="mail_mailer" class="form-control"
                                                        placeholder="Mail Mailer" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_host" class="form-label fw-semibold">Mail Host
                                                    </label>
                                                    <input type="text" id="mail_host" wire:model.defer="mail_host"
                                                        class="form-control" placeholder="Mail Host" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="mail_port" class="form-label fw-semibold">Mail Port
                                                    </label>
                                                    <input type="text" id="mail_port" wire:model.defer="mail_port"
                                                        class="form-control" placeholder="Mail Port" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="mail_username" class="form-label fw-semibold">Mail
                                                        Username
                                                    </label>
                                                    <input type="text" id="mail_username"
                                                        wire:model.defer="mail_username" class="form-control"
                                                        placeholder="Mail Username" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="mail_password" class="form-label fw-semibold">Mail
                                                        Password
                                                    </label>
                                                    <input type="text" id="mail_password"
                                                        wire:model.defer="mail_password" class="form-control"
                                                        placeholder="Mail Password" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="mail_encryption" class="form-label fw-semibold">Mail
                                                        Encryption (e.g. ssl, tls)
                                                    </label>
                                                    <input type="text" id="mail_encryption"
                                                        wire:model.defer="mail_encryption" class="form-control"
                                                        placeholder="Mail Encryption" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="mail_address" class="form-label fw-semibold">Mail
                                                        Address
                                                    </label>
                                                    <input type="text" id="mail_address"
                                                        wire:model.defer="mail_address" class="form-control"
                                                        placeholder="Mail Address" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_from_name" class="form-label fw-semibold">Mail
                                                        From Name
                                                    </label>
                                                    <input type="text" id="mail_from_name"
                                                        wire:model.defer="mail_from_name" class="form-control"
                                                        placeholder="Mail From Name" />
                                                </div>



                                            </div>
                                            @can('settings/smtp.edit')
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
