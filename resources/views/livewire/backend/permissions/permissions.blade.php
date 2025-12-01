<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            <div class="table-add text-end d-flex justify-content-between align-items-center">
                                <div class="input-group w-25 search-input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="search" class="form-control search-box-input"
                                        placeholder="Search Here....." wire:model.live="search">
                                </div>
                                @can('permissions.add')
                                    <button type="button" class="btn btn-md btn-primary my-3" wire:click="openModal">
                                        <i class="fa-solid fa-plus"></i> Add New
                                    </button>
                                @endcan
                            </div>
                            <table class="table table-hover align-middle">
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
                                                    <span class="text-muted">Loading...</span>
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
                                                @can('permissions.edit')
                                                    <button class="btn btn-sm bg-success-light mr-2"
                                                        wire:click="edit({{ $data->id }})">
                                                        <i class="fa-solid fa-pencil"></i> Edit
                                                    </button>
                                                @endcan
                                                @can('permissions.delete')
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

    @include('backend.template.delete-modal')



    @if ($showModal)
        <div class="modal fade show d-block permission-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div
                    class="modal-content animate__animated {{ $showAnimatedModal ? 'animate__slideInDown' : 'animate__fadeOutUp' }}">
                    <form wire:submit.prevent="store">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ $permissionId ? 'Edit Permission' : 'Add Permission' }}
                            </h5>
                            <button type="button" class="btn-close" aria-label="Close"
                                wire:click="closeModal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="group_name" class="form-label">Group Name</label>
                                <input type="text" class="form-control" id="group_name" wire:model.live="group_name"
                                    placeholder="Group Name">
                                @error('group_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Choose Action</label><br>

                                <button type="button"
                                    class="btn btn-sm me-1 {{ $selectedAction === 'view' ? 'btn-primary active' : 'btn-outline-primary' }}"
                                    wire:click="setAction('view')">View</button>

                                <button type="button"
                                    class="btn btn-sm me-1 {{ $selectedAction === 'add' ? 'btn-success active' : 'btn-outline-success' }}"
                                    wire:click="setAction('add')">Add</button>

                                <button type="button"
                                    class="btn btn-sm me-1 {{ $selectedAction === 'edit' ? 'btn-warning active' : 'btn-outline-warning' }}"
                                    wire:click="setAction('edit')">Edit</button>

                                <button type="button"
                                    class="btn btn-sm me-1 {{ $selectedAction === 'delete' ? 'btn-danger active' : 'btn-outline-danger' }}"
                                    wire:click="setAction('delete')">Delete</button>
                            </div>



                            <div class="mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" class="form-control" id="name" wire:model.live="name"
                                    placeholder="Permission Name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                            <button type="submit" class="btn btn-primary">
                                {{ $permissionId ? 'Update Permission' : 'Save Permission' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif


    @push('scripts')
        <script>
            Livewire.on('closeModalAfterDelay', () => {
                setTimeout(() => {
                    Livewire.dispatch('finalClose');
                }, 500); // Animation duration in ms
            });

            Livewire.on('finalClose', () => {
                @this.set('showModal', false);
            });
        </script>
    @endpush





</div>
