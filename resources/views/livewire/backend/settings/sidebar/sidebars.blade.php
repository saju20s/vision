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
                                <a href="/setting-sidebar"
                                    :class="{
                                        'active': window.location.pathname.startsWith('/setting-sidebar') || window
                                            .location
                                            .pathname === '/setting-sidebar'
                                    }"
                                    class="d-block text-dark text-decoration-none" wire:navigate>
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
                                                    <label for="title" class="form-label fw-semibold">Title</label>
                                                    <input type="text" id="title" wire:model.defer="title"
                                                        placeholder="Title" class="form-control" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="link" class="form-label fw-semibold">Link</label>
                                                    <input type="text" id="link" wire:model.defer="link"
                                                        placeholder="Link" class="form-control" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label fw-semibold">Phone</label>
                                                    <input type="text" id="phone" wire:model.defer="phone"
                                                        placeholder="Phone" class="form-control" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label fw-semibold">Email</label>
                                                    <input type="text" id="email" wire:model.defer="email"
                                                        placeholder="Email" class="form-control" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="bg_one" class="form-label fw-semibold">Background
                                                        Color</label>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="bg_one" wire:model.defer="bg_one"
                                                            class="form-control form-control-color w-25" />
                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setBgColor1">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="bg_two" class="form-label fw-semibold">Background
                                                        Color 2</label>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="color" id="bg_two" wire:model.defer="bg_two"
                                                            class="form-control form-control-color w-25" />
                                                        <button type="button" class="btn btn-outline-primary"
                                                            wire:click="setBgColor2">
                                                            Default Color
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    @if ($image)
                                                        <div class="mb-3">
                                                            <img src="{{ $image->temporaryUrl() }}"
                                                                class="img-fluid rounded shadow sidebar-icon"
                                                                alt="Preview" loading="lazy">
                                                        </div>
                                                    @endif
                                                    <label for="image" class="form-label fw-semibold">Icon</label>
                                                    <input type="file" id="image" wire:model="image"
                                                        class="form-control fImage" />
                                                </div>


                                            </div>
                                            @can('settings/sidebar.add')
                                                <button type="submit"
                                                    class="btn btn-primary form-control w-25 setting-button"
                                                    wire:loading.attr="disabled">Save</button>
                                            @endcan


                                        </div>
                                    </form>

                                    <div class="link-section-form mt-5 position-relative">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover align-middle mt-5">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th scope="col">SL</th>
                                                                <th scope="col">Image</th>
                                                                <th scope="col">Title</th>
                                                                <th scope="col">Phone</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">BG-1</th>
                                                                <th scope="col">BG-2</th>
                                                                <th scope="col">Link</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr wire:loading wire:target="render">
                                                                <td colspan="9">
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
                                                            @forelse($datas as $index => $data)
                                                                <tr wire:loading.remove>
                                                                    <th scope="row">
                                                                        {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                                                    </th>
                                                                    <td>
                                                                        @if ($data->image)
                                                                            <img class="img-fluid rounded shadow-sm product-img"
                                                                                src="{{ asset('storage/' . $data->image) }}"
                                                                                alt="Page Image" loading="lazy">
                                                                        @else
                                                                            <span class="text-muted">No Image</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $data->title }}</td>
                                                                    <td>{{ $data->phone }}</td>
                                                                    <td>{{ $data->email }}</td>
                                                                    <td>{{ $data->bg_one }}</td>
                                                                    <td>{{ $data->bg_two }}</td>
                                                                    <td>{{ $data->link }}</td>
                                                                    <td>
                                                                        @can('settings/sidebar.delete')
                                                                            <button class="btn btn-sm bg-danger-light"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#deleteModal"
                                                                                wire:click="confirmDelete({{ $data->id }})">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                                Delete
                                                                            </button>
                                                                        @endcan
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr wire:loading.remove>
                                                                    <td colspan="9" class="text-center text-muted">
                                                                        No data available</td>
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
        </div>
    </section>
    @include('backend.template.delete-modal')



</div>
