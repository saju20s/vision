<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12 column-twelve">
                        {{-- Teat Info --}}
                        <div class="text-center m-0 bg-white py-3 position-relative">
                            <div class="position-absolute test-history-printt-div">
                                <button onclick="printDiv('printArea')"
                                    class="btn btn-primary d-flex align-items-center justify-content-center gap-2 h-100">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </div>
                            <h4 class="fw-bold mb-1">
                                {!! str_replace(',,', '<br>', e($setting->address)) !!}
                            </h4>
                        </div>

                        <!-- Filters -->
                        <div class="row g-2 m-0 bg-white py-3 px-3">

                            <!-- Filter -->
                            <div class="col-md-3 col-12">
                                <select class="form-select h-100" wire:model.live="filter">
                                    <option value="all">All Data</option>
                                    <option value="this_month">This Month</option>
                                    <option value="last_month">Last Month</option>
                                    <option value="last_year">Last 1 Year</option>
                                </select>
                            </div>

                            <!-- From Date -->
                            <div class="col-md-3 col-6">
                                <input type="date" class="form-control" wire:model="from_date">
                            </div>

                            <!-- To Date -->
                            <div class="col-md-3 col-6">
                                <input type="date" class="form-control" wire:model="to_date">
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-3 col-12 d-grid">
                                <button wire:click="filterByDate"
                                    class="btn btn-primary d-flex align-items-center justify-content-center gap-2 h-100">
                                    <i class="fa fa-filter"></i> Apply
                                </button>
                            </div>
                        </div>

                        {{-- Table --}}
                        <div class="table-responsive bg-white py-3 px-3" id="printArea">

                            <div class="text-center">
                                @if ($from && $to)
                                    <p class="mb-0"><strong>Test Report:</strong> ({{ $from }} -
                                        {{ $to }})</p>
                                @else
                                    <p class="mb-0"><strong>Test Report:</strong> All Data</p>
                                @endif
                                <p class="mb-0"><strong>Print Date:</strong>
                                    {{ now()->format('d-m-Y h:i A') }}</p>
                            </div>

                            <table class="table table-hover align-middle table-bordered mt-3">
                                <thead class="table-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Test Name</th>
                                        <th>Total Amount</th>
                                        <th>Dsc(%)</th>
                                        <th>Dsc Amount</th>
                                        <th>Pay Amount</th>
                                        <th>Remks</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $billRowCounts = $billItems->groupBy('bill_id')->map->count();
                                    @endphp

                                    @php
                                        $shownBillIds = [];
                                    @endphp

                                    @foreach ($billItems as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->investigation->test_name ?? 'N/A' }}</td>
                                            <td>
                                                {{ number_format($item->total, 2) }} ৳
                                            </td>
                                            <td>{{ $item->discount }}</td>
                                            <td>{{ $item->discount_amount }}</td>

                                            {{-- Pay Amount + Note (rowspan system) --}}
                                            @if (!isset($shownBillIds[$item->bill_id]))
                                                @php
                                                    $total = $item->bill->total_amount ?? 0;
                                                    $doctor = $item->bill->doctor_commision ?? 0;
                                                    $marketing = $item->bill->marketing_commision ?? 0;
                                                    $payAmount = $total - $doctor - $marketing;

                                                    $vat = $item->bill->vat;
                                                    $vatType = $item->bill->vat_type;

                                                    $vat = $item->bill->vat;
                                                    $vatType = $item->bill->vat_type;

                                                    if ($vatType === 'percentage') {
                                                        $finalAmount = $payAmount / (1 + $vat / 100);
                                                    } else {
                                                        $finalAmount = $payAmount - $vat;
                                                    }

                                                    $rowspan = $billItems->where('bill_id', $item->bill_id)->count();
                                                    $shownBillIds[$item->bill_id] = true;
                                                @endphp

                                                <td rowspan="{{ $rowspan }}"
                                                    class="bg-success-light fw-bold pay-col">
                                                    {{ $item->bill->created_at->format('d-m-Y') }}
                                                    <hr>
                                                    {{ $item->bill->invoice_number }}
                                                    <hr>
                                                    <span class="badge bg-secondary">
                                                        Subtotal= {{ number_format($finalAmount, 2) }} ৳
                                                    </span> <br>
                                                    <span class="badge bg-secondary">
                                                        {{ $item->bill->discount }}
                                                        @if ($item->bill->discount_type === 'amount')
                                                            ৳
                                                        @elseif($item->bill->discount_type === 'percentage')
                                                            %
                                                        @endif
                                                    </span><br>
                                                    <span class="badge bg-danger">VAT= {{ $item->bill->vat }}
                                                        {{ $item->bill->vat_type === 'percentage' ? '%' : '৳' }}
                                                    </span> <br>
                                                    <span class="badge bg-danger">Total=
                                                        {{ number_format($payAmount, 2) }}
                                                        ৳</span>
                                                </td>

                                                <td rowspan="{{ $rowspan }}"
                                                    class="bg-success-light fw-bold pay-col">
                                                    {{ $item->bill->marketing?->name }}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    @php
                                        $totalPayAmount = 0;
                                        $uniqueBillIds = [];

                                        foreach ($billItems as $item) {
                                            if (!in_array($item->bill_id, $uniqueBillIds)) {
                                                $bill = $item->bill;
                                                if ($bill) {
                                                    $total = $bill->total_amount ?? 0;
                                                    $doctor = $bill->doctor_commision ?? 0;
                                                    $marketing = $bill->marketing_commision ?? 0;
                                                    $totalPayAmount += $total - $doctor - $marketing;
                                                    $uniqueBillIds[] = $item->bill_id;
                                                }
                                            }
                                        }

                                        use Carbon\Carbon;

                                        $fromDate = null;
                                        $toDate = null;

                                        if (!empty($from_date) && !empty($to_date)) {
                                            $fromDate = Carbon::parse($from_date)->startOfDay();
                                            $toDate = Carbon::parse($to_date)->endOfDay();
                                        } else {
                                            switch ($filter ?? 'all') {
                                                case 'this_month':
                                                    $fromDate = Carbon::now()->startOfMonth();
                                                    $toDate = Carbon::now()->endOfMonth();
                                                    break;

                                                case 'last_month':
                                                    $fromDate = Carbon::now()->subMonth()->startOfMonth();
                                                    $toDate = Carbon::now()->subMonth()->endOfMonth();
                                                    break;

                                                case 'last_year':
                                                    $fromDate = Carbon::now()->subYear()->startOfDay();
                                                    $toDate = Carbon::now()->endOfDay();
                                                    break;

                                                default:
                                                    $fromDate = Carbon::createFromDate(2000)->startOfDay(); // Very old fallback
                                                    $toDate = Carbon::now()->endOfDay();
                                                    break;
                                            }
                                        }

                                        $totalExpense = \App\Models\Expense::whereBetween('date', [
                                            $fromDate,
                                            $toDate,
                                        ])->sum('amount');
                                    @endphp

                                    <tr>
                                        <th colspan="2" class="text-end">Total</th>
                                        <th>{{ $billItems->sum('quantity') }}</th>
                                        <th>{{ number_format($billItems->sum('total'), 2) }} ৳</th>
                                        <th>{{ number_format($totalPayAmount, 2) }} ৳</th>
                                    </tr>

                                    @if ($totalExpense > 0)
                                        <tr>
                                            <th colspan="4" class="text-end">Total Expenses</th>
                                            <th>{{ number_format($totalExpense, 2) }} ৳</th>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th colspan="4" class="text-end">Profit Total</th>
                                        <th>{{ number_format($totalPayAmount - $totalExpense, 2) }} ৳</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        {{-- Load More Button --}}
                        @if ($billItems instanceof \Illuminate\Pagination\LengthAwarePaginator && $billItems->hasMorePages())
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

{{-- Print Script --}}
<script>
    function printDiv(divId) {
        const now = new Date();
        const printDate =
            `${String(now.getDate()).padStart(2, '0')}/${String(now.getMonth() + 1).padStart(2, '0')}/${now.getFullYear()} ${now.toLocaleTimeString()}`;

        var divContents = document.getElementById(divId).innerHTML;

        var printWindow = window.open('', '', 'height=800,width=1000');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write(
            `<style>
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #000; padding: 8px; text-align: center; }
                    h4, p { margin: 0; text-align: center; }                    
                    .pay-amount-cell {
                        background-color: #d4edda !important;
                        font-weight: bold;
                    }

                    @media print {
                        body {
                            -webkit-print-color-adjust: exact;
                            print-color-adjust: exact;
                        }
                    }
                </style>
                `
        );
        printWindow.document.write('</head><body>');

        printWindow.document.write(`
            <h4>{!! str_replace(',,', '<br>', e($setting->address)) !!}</h4>
            <hr>
        `);

        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }
</script>
