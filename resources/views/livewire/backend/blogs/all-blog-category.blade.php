<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            <table class="table table-hover align-middle">
                                <!-- Search + Add -->
                                <div class="table-add text-end d-flex justify-content-between align-items-center">
                                    <div class="input-group w-25 search-input-group">
                                        <span class="input-group-text"><i
                                                class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="search" class="form-control search-box-input"
                                            placeholder="Search Here..." wire:model.live="search">
                                    </div>
                                    @can('expense_category.add')
                                        <button class="btn btn-md btn-primary my-3" wire:click="openAddModal">
                                            <i class="fa-solid fa-plus"></i> Add New
                                        </button>
                                    @endcan
                                </div>

                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="6">
                                            <div
                                                class="d-flex align-items-center justify-content-center all-loading-header">
                                                <div class="text-center">
                                                    <div class="spinner-border text-secondary mb-2" role="status">
                                                    </div><br>
                                                    <span class="text-muted">Loading categories...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('expense_category.edit')
                                                    <button class="btn btn-sm bg-success-light mr-2"
                                                        wire:click="openEditModal({{ $data->id }})">
                                                        <i class="fa-solid fa-pencil"></i> Edit
                                                    </button>
                                                @endcan
                                                @can('expense_category.delete')
                                                    <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        wire:click="confirmDelete({{ $data->id }})">
                                                        <i class="fa-solid fa-trash-can"></i> Delete
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="4" class="text-center text-muted">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('backend.template.pagination')
                </div>
            </div>
        </div>
    </section>

    <!-- Add/Edit Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="saveCategory">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $categoryId ? 'Edit Category' : 'Add Category' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="$set('categoryId', null)"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ $categoryId ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <div class="mb-3">
                        <i class="fa-regular fa-circle-xmark text-danger fa-3x animate__animated animate__bounceIn"></i>
                    </div>
                    <p class="fs-6 fw-semibold">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" wire:click="delete" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        window.addEventListener('openModal', event => {
            let modalEl = document.getElementById(event.detail.id);
            let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        });

        window.addEventListener('closeModal', event => {
            let modalEl = document.getElementById(event.detail.id);
            let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.hide();
        });
    </script>
@endpush
