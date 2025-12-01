<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12 column-twelve">

                        <div class="text-center m-0 bg-white py-3 position-relative">
                            <div class="position-absolute test-history-printt-div">
                                <button onclick="printDiv('printArea')"
                                    class="btn btn-primary d-flex align-items-center justify-content-center gap-2 h-100">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </div>
                            <p class="fw-bold mb-1">
                                {!! str_replace(',,', '<br>', e($setting->address)) !!}
                            </p>
                        </div>

                        <div class="row g-2 m-0 bg-white py-3 px-3">
                            <div class="col-md-3 col-12 position-relative">
                                <div class="input-group h-100">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                    <input type="search" class="form-control" placeholder="Search Marketing Name..."
                                        wire:model.defer="search" wire:keydown.enter="searchMarketing">
                                    <button class="btn btn-primary" wire:click="searchMarketing">Search</button>
                                </div>

                                @if ($showMarketingList)
                                    <ul class="list-group position-absolute w-100 shadow-sm"
                                        style="z-index:1000; max-height:200px; overflow-y:auto;">
                                        @forelse ($marketingResults as $mkt)
                                            <li class="list-group-item list-group-item-action"
                                                wire:click="selectMarketing({{ $mkt->id }})">
                                                {{ $mkt->name }} ({{ $mkt->id }})
                                            </li>
                                        @empty
                                            <li class="list-group-item text-muted">No marketing found</li>
                                        @endforelse
                                    </ul>
                                @endif
                            </div>

                            <div class="col-md-2 col-6">
                                <input type="date" class="form-control" wire:model="from_date">
                            </div>

                            <div class="col-md-2 col-6">
                                <input type="date" class="form-control" wire:model="to_date">
                            </div>

                            <div class="col-md-2 col-12 d-grid">
                                <button wire:click="filterByDate"
                                    class="btn btn-primary d-flex align-items-center justify-content-center gap-2 h-100">
                                    <i class="fa fa-filter"></i> Apply
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive bg-white" id="printArea">
                            @if ($from_date && $to_date)
                                <div class="text-center mb-3">
                                    <h5 class="fw-bold">
                                        ({{ \Carbon\Carbon::parse($from_date)->format('d/m/Y') }} -
                                        {{ \Carbon\Carbon::parse($to_date)->format('d/m/Y') }})
                                    </h5>
                                </div>
                            @endif
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Marketing Name</th>
                                        <th>Invoice Number</th>
                                        <th>Patient Name</th>
                                        <th>Commission (৳)</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bills as $key => $bill)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $bill->marketing->name ?? 'N/A' }} ({{ $bill->marketing->id ?? 'N/A' }})
                                            </td>
                                            <td>{{ $bill->invoice_number }}</td>
                                            <td>{{ $bill->patient->name ?? 'N/A' }}</td>
                                            <td>{{ number_format($bill->marketing_commision, 2) }}</td>
                                            <td>{{ $bill->created_at->format('d M, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                @if ($bills->count() > 0)
                                    <tfoot class="table-light">
                                        <tr>
                                            <th colspan="4" class="text-end">Total Commission:</th>
                                            <th colspan="2">৳ {{ number_format($total_commission, 2) }}</th>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>

                        @if ($bills->count() >= $perPage)
                            <div class="text-center my-3">
                                <button wire:click="loadMore" class="btn btn-outline-primary">
                                    <i class="fa fa-arrow-down"></i> Load More
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function printDiv(divId) {
        var printButtonDiv = document.querySelector('.test-history-printt-div');
        if (printButtonDiv) printButtonDiv.style.display = 'none';

        var addressDiv = document.querySelector('.text-center.m-0.bg-white.py-3.position-relative p')?.outerHTML || '';
        var divContents = document.getElementById(divId).innerHTML;

        var printWindow = window.open('', '', 'height=800,width=1000');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write(
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">'
        );
        printWindow.document.write(
            '<style>table{width:100%;border-collapse:collapse;}th,td{border:1px solid #000;padding:8px;text-align:center;} .fw-bold{font-weight:bold;} .text-center{text-align:center;}</style>'
        );
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div class="text-center mb-3">' + addressDiv + '</div>');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();

        if (printButtonDiv) printButtonDiv.style.display = 'block';
    }
</script>
