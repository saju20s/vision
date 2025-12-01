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

                                {{-- 🔹 Filters and Search --}}
                                <div class="user-table-add row g-2 align-items-center mb-3">

                                    <div class="col-12 col-lg-5 d-flex flex-wrap gap-2">
                                        <button wire:click="setFilter('all')"
                                            class="btn bg-success-light {{ $filter === 'all' ? 'active' : '' }}">
                                            All ({{ $countAll }})
                                        </button>

                                        <button wire:click="setFilter('due')"
                                            class="btn bg-danger-light {{ $filter === 'due' ? 'active' : '' }}">
                                            Due ({{ $countDue }})
                                        </button>

                                        <button wire:click="setFilter('paid')"
                                            class="btn bg-success-light {{ $filter === 'paid' ? 'active' : '' }}">
                                            Paid ({{ $countPaid }})
                                        </button>
                                    </div>

                                    <div class="col-6 col-lg-2">
                                        <input type="date" class="form-control" wire:model="from_date">
                                    </div>
                                    <div class="col-6 col-lg-2">
                                        <input type="date" class="form-control" wire:model="to_date">
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="search" class="form-control" placeholder="Search Here..."
                                                wire:model.debounce.300ms="search">
                                        </div>
                                    </div>
                                </div>

                                {{-- 🔹 Table Header --}}
                                <thead class="table-secondary">
                                    <tr>
                                        <th>SL</th>
                                        <th>Invoice No</th>
                                        <th>Patient</th>
                                        <th>Phone</th>
                                        <th>Due</th>
                                        <th>Paid</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                {{-- 🔹 Table Body --}}
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="9" class="text-center">
                                            <div class="spinner-border text-secondary mb-2"></div><br>
                                            <span class="text-muted">Loading invoices...</span>
                                        </td>
                                    </tr>

                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <th>{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>
                                                <span>{{ $data->invoice_number }}</span>
                                                <i class="fa-regular fa-copy" role="button"
                                                    onclick="copyToClipboard('{{ $data->invoice_number }}')"></i>
                                            </td>

                                            <td>{{ $data->patient->name }}</td>
                                            <td>{{ $data->patient->phone }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $data->due_amount > 0 ? 'bg-danger-light' : 'bg-success-light' }}">
                                                    {{ number_format($data->due_amount, 2) }} ৳
                                                </span>
                                            </td>
                                            <td>{{ number_format($data->paid_amount, 2) }} ৳</td>
                                            <td>{{ number_format($data->total_amount, 2) }} ৳</td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @can('invoice.invoice')
                                                        <a href="{{ route('bill.view', $data->id) }}"
                                                            class="btn btn-sm bg-success-light" wire:navigate>
                                                            <i class="fa-regular fa-file-lines"></i> Invoice
                                                        </a>
                                                    @endcan

                                                    @can('invoice.edit')
                                                        @can('invoice.edit')
                                                            <a href="{{ route('bill.edit', $data->id) }}"
                                                                class="btn btn-sm bg-success-light" wire:navigate>
                                                                <i class="fa-solid fa-arrows-rotate"></i> Update
                                                            </a>
                                                        @endcan
                                                    @endcan

                                                    {{-- 🔹 Barcode Section --}}
                                                    <div id="barcode-{{ $data->id }}" class="d-none">
                                                        <div>
                                                            <img src="{{ $this->generateBarcode($data->invoice_number) }}"
                                                                alt="barcode">
                                                            <div class="info-line">
                                                                <span>{{ $data->patient->name }}</span>&nbsp;
                                                                <span>{{ $data->invoice_number }}</span>&nbsp;
                                                                <span>{{ $data->created_at->format('d/m/Y') }}</span>
                                                                <span>{{ $data->created_at->format('h:i A') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="button" class="btn btn-sm bg-success-light"
                                                        onclick="printBarcode({{ $data->id }})">
                                                        <i class="fa fa-barcode"></i>
                                                    </button>
                                                </div>
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

                        {{-- 🔹 Total Due --}}
                        <div class="mt-3 text-end pe-3">
                            <h6 class="fw-bold text-danger">Total Due: {{ number_format($totalDue, 2) }} ৳</h6>
                        </div>
                    </div>

                    @include('backend.template.pagination')
                </div>
            </div>
        </div>
    </section>

    @include('backend.template.delete-modal')
</div>

@push('scripts')
    <script>
        function printBarcode(id) {
            const el = document.getElementById('barcode-' + id);
            if (!el) return alert('Barcode element not found');

            const content = el.innerHTML;
            const win = window.open('', '_blank', 'width=400,height=600');
            win.document.open();
            win.document.write(`
            <html>
                <head>
                    <title>Print Barcode</title>
                    <style>
                        @page { size: 80mm auto; margin: 0; }
                        body { width:80mm; margin:0; font-family:'Courier New', monospace; text-align:center; }
                        img { max-width:100%; }
                        .info-line { font-size:12px; display:flex; justify-content:space-between; width:100%; text-align:center; }
                    </style>
                </head>
                <body>
                    ${content}
                    <script>
                        window.onload = () => setTimeout(() => window.print(), 300);
                    <\/script>
                </body>
            </html>
        `);
            win.document.close();
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                Livewire.dispatch('toastr:success', {
                    message: 'Copied: ' + text
                });
            }, function(err) {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
@endpush
