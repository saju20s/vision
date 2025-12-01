<div>


    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            <table class="table table-hover align-middle ">
                                <div
                                    class="user-table-add d-flex flex-wrap justify-content-between align-items-start gap-3">
                                    <!-- Left Section -->
                                    <div class="d-flex flex-wrap align-items-center gap-3">

                                        <!-- Status Filter Buttons -->
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button
                                                class="btn btn-sm {{ $statusFilter === true ? 'btn-primary' : 'btn bg-success-light me-1' }}"
                                                wire:click="setStatusFilter(true)">
                                                Active ({{ $activeCount }})
                                            </button>
                                            <button
                                                class="btn btn-sm {{ $typeFilter === 'owner' ? 'btn-primary' : 'btn bg-success-light me-1' }}"
                                                wire:click="setTypeFilter('owner')">
                                                Owner
                                            </button>
                                            <button
                                                class="btn btn-sm {{ $statusFilter === false ? 'btn-primary' : 'btn bg-success-light me-1' }}"
                                                wire:click="setStatusFilter(false)">
                                                Inactive ({{ $inactiveCount }})
                                            </button>
                                        </div>

                                        <!-- Search Box -->
                                        <div class="input-group user-search-input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="search" class="form-control search-box-input"
                                                placeholder="Search Here....." wire:model.live="search">
                                        </div>
                                    </div>

                                    <!-- Right Section -->
                                    @can('marketings.add')
                                        <a href="/add-marketing" class="btn btn-md btn-primary" wire:navigate><i
                                                class="fa-solid fa-plus"></i> Add New</a>
                                    @endcan
                                </div>
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Marketing Info</th>
                                        <th scope="col">Commision</th>
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
                                                    <span class="text-muted">Loading blogs...</span>
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
                                                    <img class="img-fluid rounded shadow-sm product-img" loading="lazy"
                                                        src="{{ asset('storage/' . $data->image) }}" alt="Page Image">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span><i class="fa-solid fa-user-tie"></i>
                                                    {{ $data->name }}</span><br>
                                                <span><i class="fas fa-mobile-alt"></i> {{ $data->phone }}</span><br>
                                                <span><i class="fa-solid fa-person-half-dress"></i>
                                                    {{ ucfirst($data->gender) }}</span><br>
                                                <span><i class="fas fa-birthday-cake"></i>
                                                    {{ $data->age }}yrs</span><br>
                                                <span><i class="fa-regular fa-id-card"></i> ID:
                                                    {{ $data->id }}</span>
                                            </td>
                                            <td class="marketing-table">
                                                <div class="marketing-commision-div">
                                                    <div class="d-flex">
                                                        <span class="marketing-commision"><i
                                                                class="fas fa-user-injured"></i>
                                                            Total Patients</span> =
                                                        <span class="text-success">{{ $data->total_patients }}</span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="marketing-commision"><i
                                                                class="fas fa-money-bill-wave"></i> Total Amount</span>
                                                        =
                                                        <span
                                                            class="text-success">{{ number_format($data->total_amount, 2) }}
                                                            ৳</span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="marketing-commision"><i
                                                                class="fas fa-money-bill-wave"></i> Total
                                                            Commision</span> =
                                                        <span
                                                            class="text-success">{{ number_format($data->total_commission, 2) }}
                                                            ৳</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @can('marketings.edit')
                                                        <a href="{{ route('marketing.edit', $data->id) }}"
                                                            class="btn btn-sm bg-success-light me-2" wire:navigate>
                                                            <i class="fa-solid fa-pencil"></i> Edit
                                                        </a>

                                                        <a href="{{ route('marketing.history', $data->id) }}"
                                                            class="btn btn-sm bg-success-light me-2" wire:navigate>
                                                            <i class="fa-solid fa-circle-info"></i> Details
                                                        </a>
                                                    @endcan

                                                    @can('marketings.edit')
                                                        <button
                                                            class="btn btn-sm {{ $data->is_active ? 'btn-success' : 'btn-secondary' }} me-2"
                                                            wire:click="toggleStatus({{ $data->id }})">
                                                            {{ $data->is_active ? 'Active' : 'Inactive' }}
                                                        </button>
                                                    @endcan

                                                    @can('marketings.delete')
                                                        <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            wire:click="confirmDelete({{ $data->id }})">
                                                            <i class="fa-solid fa-trash-can"></i> Delete
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        <tr>
                                            <td colspan="7" class="text-center text-muted;"><i
                                                    class="fa-solid fa-location-dot"></i> {{ $data->address }}</td>
                                        </tr>

                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="7" class="text-center text-muted">No data available</td>
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

</div>
