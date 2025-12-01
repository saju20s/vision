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
                                <a href="/setting-contact"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/setting-contact') || window
                                            .location
                                            .pathname === '/setting-contact'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                                    <label for="cphone" class="form-label fw-semibold">Phone
                                                        (Required)</label>
                                                    <input type="text" id="cphone" wire:model.defer="cphone"
                                                        class="form-control" placeholder="Phone" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cemail" class="form-label fw-semibold">Email
                                                        (Required)</label>
                                                    <input type="text" id="cemail" wire:model.defer="cemail"
                                                        class="form-control" placeholder="cemails" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address" class="form-label fw-semibold">Address
                                                        (Required)</label>
                                                    <input type="text" id="address" wire:model.defer="address"
                                                        class="form-control" placeholder="address" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="map" class="form-label fw-semibold">Map
                                                        Embed(Required)</label>
                                                    <input type="text" id="map" wire:model.defer="map"
                                                        class="form-control" placeholder="map embeded link" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="messenger_page_id"
                                                        class="form-label fw-semibold">Messenger Page ID</label>
                                                    <input type="text" id="messenger_page_id"
                                                        wire:model.defer="messenger_page_id" class="form-control"
                                                        placeholder="Enter Facebook Page ID" />
                                                    <small class="text-muted">Example: 123456789012345</small>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="country" class="form-label fw-semibold">Country</label>
                                                    <select wire:model="country" class="form-control">
                                                        <option value="">--Select Country--</option>
                                                        <option value="Australia/Sydney">Australia (Sydney)</option>
                                                        <option value="Europe/Vienna">Austria (Vienna)</option>
                                                        <option value="Asia/Dhaka">Bangladesh (Dhaka)</option>
                                                        <option value="Europe/Brussels">Belgium (Brussels)</option>
                                                        <option value="America/Sao_Paulo">Brazil (Sao Paulo)</option>
                                                        <option value="America/Toronto">Canada (Toronto)</option>
                                                        <option value="Asia/Shanghai">China (Shanghai)</option>
                                                        <option value="Europe/Copenhagen">Denmark (Copenhagen)</option>
                                                        <option value="Africa/Cairo">Egypt (Cairo)</option>
                                                        <option value="Europe/Paris">France (Paris)</option>
                                                        <option value="Europe/Berlin">Germany (Berlin)</option>
                                                        <option value="Asia/Kolkata">India (Kolkata)</option>
                                                        <option value="Asia/Jakarta">Indonesia (Jakarta)</option>
                                                        <option value="Europe/Rome">Italy (Rome)</option>
                                                        <option value="Asia/Tokyo">Japan (Tokyo)</option>
                                                        <option value="America/Mexico_City">Mexico (Mexico City)
                                                        </option>
                                                        <option value="Asia/Kathmandu">Nepal (Kathmandu)</option>
                                                        <option value="Europe/Amsterdam">Netherlands (Amsterdam)
                                                        </option>
                                                        <option value="Asia/Karachi">Pakistan (Karachi)</option>
                                                        <option value="Asia/Riyadh">Saudi Arabia (Riyadh)</option>
                                                        <option value="Asia/Singapore">Singapore (Singapore)</option>
                                                        <option value="Africa/Johannesburg">South Africa (Johannesburg)
                                                        </option>
                                                        <option value="Asia/Seoul">South Korea (Seoul)</option>
                                                        <option value="Europe/Madrid">Spain (Madrid)</option>
                                                        <option value="Europe/Stockholm">Sweden (Stockholm)</option>
                                                        <option value="Europe/Zurich">Switzerland (Zurich)</option>
                                                        <option value="Asia/Bangkok">Thailand (Bangkok)</option>
                                                        <option value="Asia/Dubai">UAE (Dubai)</option>
                                                        <option value="Europe/London">UK (London)</option>
                                                        <option value="America/New_York">USA (New York)</option>
                                                        <option value="Asia/Ho_Chi_Minh">Vietnam (Ho Chi Minh)</option>
                                                    </select>

                                                </div>



                                            </div>
                                            @can('settings/contact_setting.edit')
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
