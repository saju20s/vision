<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12 column-twelve">

                        {{-- Doctor Info --}}
                        <div class="text-center m-0 bg-white py-3 position-relative">
                            <div class="position-absolute doctor-history-div">
                                <button onclick="printDiv('printArea')"
                                    class="btn btn-primary d-flex align-items-center justify-content-center gap-2 h-100">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </div>
                            <h4 class="fw-bold mb-1">
                                {{ $doctor->name }}
                                <span class="btn btn-sm btn-primary ms-2">ID: {{ $doctor->id }}</span>
                            </h4>
                            <p class="mb-0"><strong>Phone:</strong> {{ $doctor->phone }}</p>
                            <p class="mb-0"><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                        </div>


                        <!-- Filters -->
                        <div class="row g-2 m-0 bg-white py-3 px-3">

                            <!-- Search -->
                            <div class="col-md-3 col-12">
                                <div class="input-group h-100">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                    <input type="search" class="form-control" placeholder="Search Invoice..."
                                        wire:model.live="search">
                                </div>
                            </div>

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
                            <div class="col-md-2 col-6">
                                <input type="date" class="form-control" wire:model="from_date">
                            </div>

                            <!-- To Date -->
                            <div class="col-md-2 col-6">
                                <input type="date" class="form-control" wire:model="to_date">
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-2 col-12 d-grid">
                                <button wire:click="filterByDate"
                                    class="btn btn-primary d-flex align-items-center justify-content-center gap-2 h-100">
                                    <i class="fa fa-filter"></i> Apply
                                </button>
                            </div>
                        </div>



                        {{-- Table --}}
                        <div class="table-responsive" id="printArea">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Invoice Number</th>
                                        <th>Patient Name</th>
                                        <th>Phone</th>
                                        <th>Total Amount</th>
                                        <th>Commission</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bills as $bill)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bill->invoice_number }}</td>
                                            <td>{{ $bill->patient->name ?? 'N/A' }}</td>
                                            <td>{{ $bill->patient->phone ?? 'N/A' }}</td>
                                            <td>{{ number_format($bill->total_amount, 2) }} ৳</td>
                                            <td>{{ number_format($bill->doctor_commision, 2) }} ৳</td>
                                            <td>{{ $bill->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('bill.view', $bill->id) }}"
                                                    class="btn btn-sm bg-success-light mr-2" wire:navigate><i
                                                        class="fa-regular fa-file-lines"></i> Invoice</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">No Data found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                @if ($bills->count())
                                    <tfoot class="table-light">
                                        <tr>
                                            <th colspan="4" class="text-end">Total</th>
                                            <th>{{ number_format($bills->sum('total_amount'), 2) }} ৳</th>
                                            <th>{{ number_format($bills->sum('doctor_commision'), 2) }} ৳</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                        {{-- Load More Button --}}
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

{{-- Print Script --}}
<script>
    function printDiv(divId) {
        var divContents = document.getElementById(divId).innerHTML;

        // Doctor info
        var doctorInfo = `
            <h3 style="text-align:center; margin:0px;">
                Dr. {{ $doctor->name }}
                <small style="font-size:14px; color:#000;">(ID: {{ $doctor->id }})</small>
            </h3>
            <p style="text-align:center; margin:0;"><strong>Phone:</strong> {{ $doctor->phone }}</p>
            <p style="text-align:center; margin:0;"><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
            <hr style="margin:15px 0;">
        `;

        var printWindow = window.open('', '', 'height=800,width=1000');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write(
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">'
        );
        printWindow.document.write(
            '<style> table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #000; padding: 8px; text-align: center; } </style>'
        );
        printWindow.document.write('</head><body>');
        printWindow.document.write(doctorInfo);
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }
</script>
