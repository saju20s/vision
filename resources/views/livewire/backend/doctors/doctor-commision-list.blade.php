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
                                    <input type="search" class="form-control" placeholder="Search Doctor Name..."
                                        wire:model.defer="search" wire:keydown.enter="searchDoctor">
                                    <button class="btn btn-primary" wire:click="searchDoctor">Search</button>
                                </div>

                                @if ($showDoctorList)
                                    <ul class="list-group position-absolute w-100 shadow-sm"
                                        style="z-index:1000; max-height:200px; overflow-y:auto;">
                                        @forelse ($doctorResults as $doc)
                                            <li class="list-group-item list-group-item-action"
                                                wire:click="selectDoctor({{ $doc->id }})">
                                                {{ $doc->name }} ({{ $doc->id }})
                                            </li>
                                        @empty
                                            <li class="list-group-item text-muted">No doctor found</li>
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
                                        <th>Ref. By</th>
                                        <th>Invoice Number</th>
                                        <th>Patient Name</th>
                                        <th>Total</th>
                                        <th>Commission (৳)</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bills as $key => $bill)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @if ($bill->labtolab)
                                                    {{ $bill->labtolab }}
                                                @else
                                                    {{ $bill->doctor->name ?? '' }}({{ $bill->doctor->id ?? 'Self' }})
                                                @endif
                                            </td>
                                            <td>{{ $bill->invoice_number }}</td>
                                            <td>{{ $bill->patient->name ?? 'N/A' }}</td>
                                            <td>{{ $bill->total_amount }}</td>
                                            <td>{{ number_format($bill->doctor_commision, 2) }}</td>
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
                                            <th colspan="4" class="text-end">Total:</th>
                                            <th colspan="3">৳ {{ $bills->sum('total_amount') }}</th>
                                        </tr>
                                        <tr>
                                            <th colspan="5" class="text-end">Total Commission:</th>
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
        // Hide print button before printing
        var printButtonDiv = document.querySelector('.test-history-printt-div');
        if (printButtonDiv) printButtonDiv.style.display = 'none';

        // Get address part
        var addressDiv = document.querySelector('.text-center.m-0.bg-white.py-3.position-relative').innerHTML;

        // Get table part
        var divContents = document.getElementById(divId).innerHTML;

        // Get the date range (if exists in page)
        var dateText = '';
        var dateRange = document.querySelector('#printDateRange');
        if (dateRange) {
            dateText = '<h5 class="fw-bold text-center mb-3">' + dateRange.textContent + '</h5>';
        }

        // Open print window
        var printWindow = window.open('', '', 'height=800,width=1000');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write(
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">'
        );
        printWindow.document.write(
            '<style>table{width:100%;border-collapse:collapse;}th,td{border:1px solid #000;padding:8px;text-align:center;} .fw-bold{font-weight:bold;} .text-center{text-align:center;}</style>'
        );
        printWindow.document.write('</head><body>');

        // Write address, date, and table
        printWindow.document.write('<div class="text-center mb-3">' + addressDiv + '</div>');
        if (dateText) printWindow.document.write(dateText);
        printWindow.document.write(divContents);

        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();

        // Restore print button after print
        if (printButtonDiv) printButtonDiv.style.display = 'block';
    }

    // When user clicks "Apply", show Print Date range
    document.addEventListener('DOMContentLoaded', function() {
        const applyBtn = document.querySelector('button[wire\\:click="filterByDate"]');
        const fromInput = document.querySelector('input[wire\\:model="from_date"]');
        const toInput = document.querySelector('input[wire\\:model="to_date"]');

        applyBtn?.addEventListener('click', function() {
            if (fromInput.value && toInput.value) {
                const from = new Date(fromInput.value);
                const to = new Date(toInput.value);
                const formatDate = (d) => String(d.getDate()).padStart(2, '0') + '/' + String(d
                    .getMonth() + 1).padStart(2, '0') + '/' + d.getFullYear();

                const formatted = `Print Date (${formatDate(from)} - ${formatDate(to)})`;
                let dateDiv = document.getElementById('printDateRange');

                if (!dateDiv) {
                    dateDiv = document.createElement('div');
                    dateDiv.id = 'printDateRange';
                    dateDiv.className = 'text-center fw-bold my-2';
                    const parent = document.getElementById('printArea');
                    parent?.insertAdjacentElement('beforebegin', dateDiv);
                }
                dateDiv.textContent = formatted;
            }
        });
    });
</script>
