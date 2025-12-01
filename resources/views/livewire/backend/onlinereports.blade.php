<div class="container mt-4">
    @if ($hasDue)
        <div class="alert alert-danger">
            এই বিলের বাকি টাকা আছে, তাই রিপোর্ট দেখতে পারবেন না।
        </div>
    @else
        {{-- Patient Info --}}
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Patient Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <strong>Name:</strong> {{ $bill->patient->name ?? 'N/A' }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Bill ID:</strong> {{ $bill->id }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Date:</strong> {{ $bill->created_at->format('d M Y, h:i A') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Reports Table --}}
        <h5 class="mb-3">Reports List</h5>
        <div class="table-responsive shadow-sm">
            <table class="table table-hover table-bordered align-middle text-center mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Invoice</th>
                        <th>SL</th>
                        <th>Test Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $index => $report)
                        <tr>
                            <td>{{ $bill->invoice_no ?? 'INV-' . $bill->id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-start ps-3">{{ $report->test_category_name }}</td>
                            <td>{{ $report->created_at->format('d M Y') }}</td>
                            <td>{{ $report->created_at->format('h:i A') }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" wire:click="showReport({{ $report->id }})">
                                    View Report
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">কোন রিপোর্ট পাওয়া যায়নি</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Selected Report Show --}}
        @if ($selectedReport)
            <div class="mt-4">
                <section class="product-section">
                    <div class="content">
                        <div class="container-fluid mt-5 pt-4">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div id="sharifITFirm" class="report-page bg-white">

                                        <!-- Header -->
                                        <div class="header">
                                            <div class="hospital-info"></div>
                                            <div class="qr-code ms-auto">
                                                @if ($barcode ?? false)
                                                    <img src="data:image/png;base64,{{ $barcode }}"
                                                        alt="Invoice Barcode"
                                                        style="width:100%; max-width:80px; height:80px; object-fit: contain;">
                                                @else
                                                    QR Code
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Patient Details -->
                                        <div class="patient-details d-flex justify-content-between"
                                            style="margin: 0 20px; padding:5px; border:1px solid #333">
                                            <div class="left d-flex flex-column">
                                                <span><strong>Invoice No:</strong>
                                                    {{ $selectedReport->bill->invoice_number ?? 'N/A' }}</span>
                                                <span><strong>Patient Name:</strong>
                                                    {{ $selectedReport->patient->name ?? 'N/A' }}</span>
                                                <span><strong>Patient ID:</strong> HCN-1235</span>
                                                <span><strong>Gender:</strong>
                                                    {{ ucfirst($selectedReport->patient->gender ?? 'N/A') }}</span>
                                                <span><strong>Referred By:</strong> Dr.
                                                    {{ $selectedReport->bill->doctor->name ?? '' }}</span>
                                            </div>
                                            <div class="right d-flex flex-column">
                                                <span><strong>Date:</strong>
                                                    {{ $selectedReport->created_at->timezone('Asia/Dhaka')->format('d/m/Y h:i A') }}
                                                </span>
                                                <span><strong>Age:</strong>
                                                    {{ $selectedReport->patient->full_age ?? 'N/A' }}</span>
                                                <span><strong>Phone:</strong>
                                                    {{ $selectedReport->patient->phone ?? 'N/A' }}</span>
                                            </div>
                                        </div>

                                        <!-- Report Title -->
                                        <div class="report-title">{{ $selectedReport->test_category_name }}</div>

                                        <!-- Test Results -->
                                        <div class="results-section flex-grow-1">
                                            <table class="results-table">
                                                <thead>
                                                    <tr>
                                                        <th style="width:40%; text-align:left;">Investigation</th>
                                                        <th style="width:20%;">Result</th>
                                                        <th style="width:15%;">Unit</th>
                                                        <th style="width:25%;">Reference Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($selectedReport->test_form as $test)
                                                        @php
                                                            $onlyParameter =
                                                                isset($test['parameter_name']) &&
                                                                (trim($test['result'] ?? '') === '' &&
                                                                    trim($test['unit'] ?? '') === '' &&
                                                                    trim($test['normal_value'] ?? '') === '');
                                                        @endphp
                                                        <tr
                                                            style="{{ $onlyParameter ? 'border:none;' : 'border:1px dotted #555;' }}">
                                                            <td class="{{ $onlyParameter ? 'test-name' : 'sub-test' }}"
                                                                style="text-align:left!important">
                                                                @if ($onlyParameter)
                                                                    <strong>{{ $test['parameter_name'] }} :</strong>
                                                                @else
                                                                    {{ $test['parameter_name'] ?? '' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ trim($test['result'] ?? '') }}</td>
                                                            <td>{{ trim($test['unit'] ?? '') }}</td>
                                                            <td>{{ trim($test['normal_value'] ?? '') }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-center text-muted">
                                                                No test data available
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Signature Section -->
                                        <div class="signature-section">
                                            <div class="signature-box">
                                                <div class="signature-text">Prepared By</div>
                                                <div class="signature-details">
                                                    {{ $selectedReport->prepared_by['name'] ?? 'N/A' }}<br>
                                                    {{ $selectedReport->prepared_by['qualification'] ?? 'N/A' }}<br>
                                                    {{ $selectedReport->prepared_by['designation'] ?? 'N/A' }}
                                                </div>
                                            </div>
                                            <div class="signature-box">
                                                <div class="signature-text">Authorized By</div>
                                                <div class="signature-details">
                                                    {{ $selectedReport->authorized_by['name'] ?? 'N/A' }}<br>
                                                    {{ $selectedReport->authorized_by['qualification'] ?? 'N/A' }}<br>
                                                    {{ $selectedReport->authorized_by['designation'] ?? 'N/A' }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Print Button -->
                                        <div class="text-end mt-3 no-print">
                                            <button class="btn btn-success" onclick="window.print()">🖨 Print</button>
                                        </div>
                                    </div>

                                    <!-- Styles -->
                                    <style>
                                        /* Patient Card */
                                        .card-header h5 {
                                            font-weight: 600;
                                            letter-spacing: 0.5px;
                                        }
                                        .card-body strong {
                                            color: #495057;
                                        }

                                        /* Reports Table */
                                        table th, table td {
                                            vertical-align: middle;
                                        }
                                        table th {
                                            font-size: 0.95rem;
                                            letter-spacing: 0.5px;
                                        }
                                        table td {
                                            font-size: 0.9rem;
                                            padding: 0.55rem;
                                        }
                                        .table-hover tbody tr:hover {
                                            background-color: rgba(0, 123, 255, 0.05);
                                            transition: 0.2s;
                                        }
                                        .btn-outline-primary {
                                            font-size: 0.8rem;
                                            padding: 0.25rem 0.5rem;
                                        }

                                        /* Report Page Print */
                                        .report-page {
                                            min-height: 95vh;
                                            display: flex;
                                            flex-direction: column;
                                            padding: 0 15px;
                                            background: #FFF;
                                        }

                                        .header {
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            padding: 15px 20px;
                                        }

                                        .qr-code {
                                            width: 80px;
                                            height: 80px;
                                            border: 1px solid #000;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            font-size: 8pt;
                                        }

                                        .report-title {
                                            text-align: center;
                                            font-size: 18pt;
                                            font-weight: bold;
                                            padding: 5px 0;
                                            background: #FFF;
                                            text-decoration: underline;
                                        }

                                        .results-section {
                                            padding: 20px;
                                            flex: 1;
                                        }

                                        .results-table {
                                            width: 100%;
                                            border-collapse: collapse;
                                            margin-bottom: 20px;
                                        }

                                        .results-table th {
                                            border: 1px solid #000;
                                            padding: 8px;
                                            text-align: center;
                                            font-weight: bold;
                                            font-size: 12pt;
                                        }

                                        .results-table td {
                                            padding: 8px;
                                            text-align: center;
                                        }

                                        .sub-test {
                                            padding-left: 15px;
                                        }

                                        .signature-section {
                                            display: flex;
                                            justify-content: space-between;
                                            padding: 0 35px;
                                            margin-top: 30px;
                                        }

                                        .signature-text {
                                            font-size: 10pt;
                                            font-weight: bold;
                                            text-align: left;
                                        }

                                        .signature-details {
                                            font-size: 9pt;
                                            margin-top: 3px;
                                            text-align: left;
                                        }

                                        .watermark {
                                            position: absolute;
                                            top: 50%;
                                            left: 50%;
                                            transform: translate(-50%, -50%) rotate(-45deg);
                                            font-size: 72pt;
                                            color: rgba(0, 123, 255, 0.1);
                                            z-index: -1;
                                            pointer-events: none;
                                        }

                                        @media print {
                                            body * {
                                                visibility: hidden;
                                            }

                                            #sharifITFirm,
                                            #sharifITFirm * {
                                                visibility: visible;
                                            }

                                            #sharifITFirm {
                                                position: absolute;
                                                left: 0;
                                                top: 0;
                                                width: 100%;
                                            }

                                            .no-print {
                                                display: none !important;
                                            }
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
    @endif
</div>
