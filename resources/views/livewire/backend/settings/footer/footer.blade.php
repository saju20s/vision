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
                                <a href="/setting-footer"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/setting-footer') || window
                                            .location
                                            .pathname === '/setting-footer'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                                    <label for="footer_text" class="form-label fw-semibold">Footer Short
                                                        Description
                                                        (Required)</label>
                                                    <textarea id="footer_text" wire:model.defer="footer_text" class="form-control" rows="5"
                                                        placeholder="Write here  short description....."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="copyright_text" class="form-label fw-semibold">Copy
                                                        Right Text
                                                        (Required)</label>
                                                    <input type="text" id="copyright_text"
                                                        wire:model.defer="copyright_text" class="form-control"
                                                        placeholder="logo text" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="facebook" class="form-label fw-semibold">Facebook
                                                    </label>
                                                    <input type="text" id="facebook" wire:model.defer="facebook"
                                                        class="form-control" placeholder="Facebook link" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="youtube" class="form-label fw-semibold">Instragram
                                                    </label>
                                                    <input type="text" id="youtube" wire:model.defer="youtube"
                                                        class="form-control" placeholder="YouTube link" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="twitter" class="form-label fw-semibold">Twitter
                                                    </label>
                                                    <input type="text" id="twitter" wire:model.defer="twitter"
                                                        class="form-control" placeholder="Twitter link" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="linkedin" class="form-label fw-semibold">Linkedin
                                                    </label>
                                                    <input type="text" id="linkedin" wire:model.defer="linkedin"
                                                        class="form-control" placeholder="Linkedin link" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="footer_color" class="form-label fw-semibold">Footer
                                                        Color</label>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="footer_color"
                                                            wire:model.defer="footer_color"
                                                            class="form-control form-control-color w-25" />

                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setFooterColor">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="copyright_color" class="form-label fw-semibold">Copy
                                                        Right
                                                        Color</label>

                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="copyright_color"
                                                            wire:model.defer="copyright_color"
                                                            class="form-control form-control-color w-25" />

                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setCopyrightColor">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    {{-- old logo Preview --}}
                                                    @if ($datas->ftr_image)
                                                        <img class="img-fluid rounded shadow profile-img-sec" alt="Preview"
                                                            src="{{ asset('storage/' . $datas->ftr_image) }}"
                                                            loading="lazy">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif
                                                    {{-- logo Preview --}}
                                                    @if ($ftr_image)
                                                        <div class="mt-3">
                                                            <img src="{{ $ftr_image->temporaryUrl() }}"
                                                                class="img-fluid rounded shadow profile-img-sec" alt="Preview"
                                                                loading="lazy">
                                                        </div>
                                                    @endif
                                                    <label for="ftr_image" class="form-label fw-semibold mt-3">Footer
                                                        Image
                                                        (Required)
                                                    </label>
                                                    <input type="file" id="ftr_image" wire:model="ftr_image"
                                                        class="form-control fImage" />
                                                </div>


                                            </div>
                                            @can('settings/footer_setting.edit')
                                                <button type="submit"
                                                    class="btn btn-primary form-control w-25 setting-button"
                                                    wire:loading.attr="disabled">Save</button>
                                            @endcan


                                        </div>
                                    </form>

                                    <div class="link-section-form mt-5 position-relative">
                                        <form wire:submit.prevent="linkStore">
                                            <div class="row g-3 align-items-stretch">
                                                <h3 class="text-muted">Important Links</h3>
                                                <div class="col-lg-5">
                                                    <input type="text" id="title" wire:model.defer="title"
                                                        class="form-control h-100" placeholder="Title" />
                                                </div>

                                                <div class="col-lg-5">
                                                    <input type="text" id="link" wire:model.defer="link"
                                                        class="form-control h-100" placeholder="Link" />
                                                </div>

                                                <div class="col-lg-2 d-grid">
                                                    @can('settings/footer_setting.add')
                                                        <button type="submit" class="btn btn-primary setting-button"
                                                            wire:loading.attr="disabled">
                                                            <i class="fa-solid fa-plus"></i> Add
                                                        </button>
                                                    @endcan
                                                </div>
                                            </div>


                                        </form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover align-middle  mt-5">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th scope="col">SL</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Link</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr wire:loading wire:target="render">
                                                            <td colspan="6">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-center all-loading-header">
                                                                    <div class="text-center">
                                                                        <div class="spinner-border text-secondary mb-2"
                                                                            role="status">
                                                                        </div><br>
                                                                        <span class="text-muted">Loading
                                                                            ...</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @forelse($links as $index => $data)
                                                            <tr wire:loading.remove>
                                                                <th scope="row">
                                                                    {{ $loop->index + 1 }}
                                                                </th>
                                                                <td>{{ $data->title }}</td>
                                                                <td>{{ $data->link }}</td>
                                                                <td>
                                                                    @can('settings/footer_setting.delete')
                                                                        <button class="btn btn-sm bg-danger-light"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal"
                                                                            wire:click="confirmDelete({{ $data->id }})">
                                                                            <i class="fa-solid fa-trash-can"></i> Delete
                                                                        </button>
                                                                    @endcan
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr wire:loading.remove>
                                                                <td colspan="6" class="text-center text-muted">No
                                                                    data available</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
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
    @include('backend.template.delete-modal')



</div>
