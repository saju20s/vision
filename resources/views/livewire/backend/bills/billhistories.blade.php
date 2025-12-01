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
                                    class="user-table-add d-flex align-items-center flex-nowrap">

                                    <!-- Search Input -->
                                    <div class="input-group user-search-input-group me-2">
                                        <input type="text" class="form-control rounded-0"
                                            placeholder="Search Invoice..." wire:model.live="search">
                                        <button class="btn btn-primary" wire:click="$refresh">
                                            Search
                                        </button>
                                    </div>

                                    <!-- From Date -->
                                    <div class="input-group me-2" style="width: 200px;">
                                        <input type="date" wire:model.live="from_date"
                                            class="form-control rounded-0">
                                    </div>

                                    <!-- To Date -->
                                    <div class="input-group" style="width: 200px;">
                                        <input type="date" wire:model.live="to_date" class="form-control rounded-0">
                                    </div>

                                </div>


                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Invoice No</th>
                                        <th scope="col">Patient Info</th>
                                        <th scope="col">Total Bill</th>
                                        <th scope="col">Payment History</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="9">
                                            <div
                                                class="d-flex align-items-center justify-content-center all-loading-header">
                                                <div class="text-center">
                                                    <div class="spinner-border text-secondary mb-2" role="status">
                                                    </div><br>
                                                    <span class="text-muted">Loading invoices...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $data->invoice_number }}</td>
                                            <td>
                                                {{ $data->patient->name ?? 'N/A' }} <br>
                                                {{ $data->patient->phone ?? 'N/A' }}
                                            </td>
                                            <td>
                                                @php
                                                    $total = $data->total_amount ?? 0;
                                                    $paid = $data->histories->sum('paid_amount');
                                                    $due = $total - $paid;
                                                @endphp

                                                Total = {{ number_format($total, 2) }} ৳ <br>
                                                Paid = {{ number_format($paid, 2) }} ৳ <br>

                                                @if ($due > 0)
                                                    Due = <span class="badge bg-danger-light">
                                                        {{ number_format($due, 2) }} ৳
                                                    </span>
                                                @else
                                                    Due = <span class="badge bg-success-light">
                                                        0.00 ৳
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($data->histories as $history)
                                                    Date : {{ $history->created_at->format('d M Y h:i A') }} <br>
                                                    Amount : {{ number_format($history->paid_amount, 2) }} <br>

                                                    @php
                                                        $payment = is_array($history->payment)
                                                            ? $history->payment
                                                            : json_decode($history->payment, true);
                                                    @endphp

                                                    @if (($payment['method'] ?? '') === 'cash')
                                                        Method : Cash
                                                    @elseif(($payment['method'] ?? '') === 'banking')
                                                        Method : Banking <br>
                                                        Address : {{ $payment['payment_address'] ?? 'N/A' }} <br>
                                                        Transaction ID : {{ $payment['transaction_id'] ?? 'N/A' }}
                                                    @else
                                                        Method : {{ $payment['method'] ?? 'N/A' }}
                                                    @endif <br>
                                                    Enry by: {{ $history->entry_by }}
                                                    <br><br>
                                                @endforeach

                                            </td>
                                            <td>{{ $data->histories->first()->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('bill_history.invoice')
                                                    <a href="{{ route('bill.invoice', $data->invoice_number) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fa-regular fa-file-lines"></i> Invoice
                                                    </a>
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
