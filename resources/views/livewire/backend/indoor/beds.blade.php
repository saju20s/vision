<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            <table class="table table-bordered table-hover align-middle border-1">
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
                                        <th scope="col">Bed Category</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Floor No</th>
                                        <th scope="col">Room No</th>
                                        <th scope="col">Bed No</th>
                                        <th scope="col">Charge</th>
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
                                                    <span class="text-muted">Loading ...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @forelse($datas as $index => $data)
                                        @php
                                            $colorClass = match ($data->bed_category) {
                                                'Ward' => 'bg-danger-light text-danger fw-semibold',
                                                'Cabin' => 'bg-success-light text-success fw-semibold',
                                                'OPD' => 'bg-info-light text-info fw-semibold',
                                                default => 'bg-secondary-light text-secondary fw-semibold',
                                            };
                                        @endphp
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td class="btn btn-sm {{ $colorClass }}">
                                                {{ $data->bed_category }}
                                            </td>
                                            <td>{{ $data->bed_type }}</td>
                                            <td class="btn btn-sm bg-success-light">{{ $data->floor_no }}</td>
                                            <td>{{ $data->room_no }}</td>
                                            <td class="btn btn-sm bg-success-light">{{ $data->bed_no }}</td>
                                            <td>{{ $data->charge }}</td>
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
                                            <td colspan="9" class="text-center text-muted">No data available</td>
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
                <form wire:submit.prevent="saveBed">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $bedId ? 'Edit Bed' : 'Add Bed' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="$set('bedId', null)"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Floor No</label>
                            <select class="form-control" wire:model.defer="floor_no">
                                <option value="">Select Floor</option>
                                <option value="level_one">Level-1</option>
                                <option value="level_two">Level-2</option>
                                <option value="level_three">Level-3</option>
                                <option value="level_four">Level-4</option>
                                <option value="level_five">Level-5</option>
                                <option value="level_six">Level-6</option>
                                @error('floor_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bed Category</label>
                            <select class="form-control" wire:model.defer="bed_category">
                                <option value="">Select Category</option>
                                <option value="OPD">OPD</option>
                                <option value="Cabin">Cabin</option>
                                <option value="Ward">Ward</option>
                            </select>
                            @error('bed_category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Bed Type</label>
                            <select class="form-control" wire:model.defer="bed_type">
                                <option value="">Select Type</option>
                                <option value="AC">AC</option>
                                <option value="Non AC">Non AC</option>
                                <option value="VIP">VIP</option>
                            </select>
                            @error('bed_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Room No</label>
                            <input type="text" wire:model.defer="room_no" class="form-control">
                            @error('room_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bed No</label>
                            <input type="text" wire:model.defer="bed_no" class="form-control">
                            @error('bed_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bed Charge</label>
                            <input type="number" wire:model.defer="charge" class="form-control">
                            @error('charge')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ $bedId ? 'Update' : 'Save' }}</button>
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
                        <i
                            class="fa-regular fa-circle-xmark text-danger fa-3x animate__animated animate__bounceIn"></i>
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
