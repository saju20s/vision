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
                                <div class="table-add text-end d-flex justify-content-between align-items-center">
                                    <div class="input-group w-25 search-input-group">
                                        <span class="input-group-text"><i
                                                class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="search" class="form-control search-box-input"
                                            placeholder="Search Here....." wire:model.live="search">
                                    </div>
                                    @can('employees.add')
                                        <a href="/add-employee" class="btn btn-md btn-primary my-3" wire:navigate><i class="fa-solid fa-plus"></i> Add
                                            New</a>
                                    @endcan
                                </div>
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Employee Details</th>
                                        <th scope="col">History</th>
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
                                            <td class="employee-table">
                                                @php
                                                    // Total Discount
                                                    $totalDiscount = $data->bills->sum(function ($bill) {
                                                        if ($bill->discount_type === 'percentage') {
                                                            // reverse calculate from discounted total_amount
                                                            return ($bill->total_amount * $bill->discount) /
                                                                (100 - $bill->discount);
                                                        }
                                                        return $bill->discount;
                                                    });

                                                    // Gross Total
                                                    $grossTotal = $data->bills->sum('total_amount') + $totalDiscount;
                                                @endphp

                                                <div class="employee-history-div">
                                                    {{-- Total Tests --}}
                                                    <div class="d-flex">
                                                        <span class="employee-history">Total Tests</span> =
                                                        <span class="text-success">{{ $data->bills_count }}</span>
                                                    </div>

                                                    {{-- Gross Total --}}
                                                    <div class="d-flex">
                                                        <span class="employee-history">Gross Total</span> =
                                                        <span class="text-success">{{ number_format($grossTotal, 2) }}
                                                            ৳</span>
                                                    </div>

                                                    {{-- Total Amount (after discount) --}}
                                                    <div class="d-flex">
                                                        <span class="employee-history">Pay Amount</span> =
                                                        <span
                                                            class="text-success">{{ number_format($data->bills->sum('total_amount'), 2) }}
                                                            ৳</span>
                                                    </div>

                                                    {{-- Total Discount --}}
                                                    <div class="d-flex">
                                                        <span class="employee-history">Total Discount</span> =
                                                        <span
                                                            class="text-success">{{ number_format($totalDiscount, 2) }}
                                                            ৳</span>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('employees.edit')
                                                    <a href="{{ route('patient.edit', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate><i
                                                            class="fa-solid fa-pencil"></i> Edit</a>
                                                @endcan
                                                @can('employees.view')
                                                    <a href="{{ route('employee.history', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fa-solid fa-circle-info"></i> Details
                                                    </a>
                                                @endcan
                                                @can('employees.delete')
                                                    <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        wire:click="confirmDelete({{ $data->id }})"> <i
                                                            class="fa-solid fa-trash-can"></i> Delete </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="8" class="text-center text-muted">No data available</td>
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
