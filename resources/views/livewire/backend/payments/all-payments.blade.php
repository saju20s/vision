<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-12">
                        <div class="table-responsive table-show">
                            <table class="table table-hover align-middle">
                                <div class="table-add text-end d-flex justify-content-between align-items-center">
                                    <div class="input-group w-25 search-input-group">
                                        <span class="input-group-text"><i
                                                class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="search" class="form-control search-box-input"
                                            placeholder="Search Here....." wire:model.live="search">
                                    </div>
                                    @can('patients.add')
                                        <a href="/add-payment" class="btn btn-md btn-primary my-3" wire:navigate><i
                                                class="fa-solid fa-plus"></i> Add New</a>
                                    @endcan
                                </div>
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">P.Method</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">TrxID</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="8">
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
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $data->payment_method }}</td>
                                            <td>{{ $data->amount }}</td>
                                            <td class="text-success fw-semibold text-primary small">{{ $data->phone }}
                                            </td>
                                            <td class="text-uppercase text-success fw-semibold text-primary small">
                                                {{ $data->transaction_id }}</td>
                                            <td>{{ $data->paid_for_month }}</td>
                                            <td>
                                                @php
                                                    $badgeClass = match ($data->status) {
                                                        'pending' => 'bg-warning text-dark',
                                                        'approved' => 'bg-success',
                                                        'rejected' => 'bg-danger',
                                                    };
                                                @endphp

                                                <span class="badge {{ $badgeClass }}">
                                                    {{ ucfirst($data->status) }}
                                                </span>
                                            </td>

                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('patients.edit')
                                                    <a href="{{ route('admin.payment.invoice', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fa-regular fa-file-lines"></i> Invoice
                                                    </a>
                                                @endcan
                                                @can('patients.edit')
                                                    <a href="{{ route('admin.payment.edit', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fa-solid fa-pencil"></i> Edit
                                                    </a>
                                                @endcan
                                                @can('patients.delete')
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
    @include('backend.template.delete-modal')
</div>
