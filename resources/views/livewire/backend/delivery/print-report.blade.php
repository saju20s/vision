<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12">
                        <div id="sharifITFirm" class="report-page bg-white">

                            <!-- Header -->
                            <div class="header position-relative">
                                <div class="qr-code laboratory-print-qrcode">
                                    
                                </div>
                            </div>

                            <!-- Patient & Invoice Details with aligned colons -->
                            <div class="patient-details d-flex justify-content-between align-items-start laboratory-patient-details">

                                <!-- Top Row -->
                                <div class="laboratory-patient-div">
                                    <!-- Left Column -->
                                    <div class="left laboratory-patient-left">
                                        <div><span class="laboratory-patient-span"><strong>Patient
                                                    Name</strong></span> : {{ $report->patient->name ?? 'N/A' }}</div>
                                        <div><span class="laboratory-patient-span"><strong>Patient
                                                    ID</strong></span> : {{ $report->patient->patient_id ?? 'N/A' }}
                                        </div>
                                        <div><span class="laboratory-patient-span"><strong>Gender</strong></span>
                                            : {{ ucfirst($report->patient->gender ?? 'N/A') }}</div>
                                        <div><span class="laboratory-patient-span"><strong>Invoice
                                                    No</strong></span> : {{ $report->bill->invoice_number ?? 'N/A' }}
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="right laboratory-patient-right">
                                        <div><span class="laboratory-patient-span"><strong>Date</strong></span>
                                            : {{ $report->created_at->format('d M Y') }}
                                        </div>
                                        <div><span class="laboratory-patient-span"><strong>Age</strong></span>
                                            : {{ $report->patient->full_age ?? 'N/A' }}</div>
                                        <div><span class="laboratory-patient-span"><strong>Phone</strong></span>
                                            : {{ $report->patient->phone ?? 'N/A' }}</div>
                                        <div><span class="laboratory-patient-span"><strong>Print
                                                    Date</strong></span> :
                                            {{ now()->format('d/m/Y h:i A') }}</div>
                                    </div>

                                </div>


                                <!-- Referred By Row: flex-row e align করা -->
                                <div class="laboratory-patient-refer">
                                    <strong class="laboratory-patient-strong">Referred By</strong> :
                                    @if ($report->bill->labtolab)
                                        Lab To Lab({{$report->bill->labtolab}})
                                    @else
                                        {{ $report->bill->doctor->name ?? '' }}
                                        {{ $report->bill->doctor->qualification ?? '' }}
                                        ({{ $report->bill->doctor->designation ?? 'Self' }})
                                    @endif
                                </div>
                            </div>




                            <!-- Report Title -->
                            <div class="report-title">{{ $report->test_category_name }}</div>

                            <!-- যদি X-Ray হয় -->
                            @if ($report->xray_form)
                                <div class="results-section flex-grow-1">
                                    <h6 class="fw-bold text-decoration-underline">X-Ray Report</h6>

                                    <div style="margin-bottom:30px;">
                                        <strong>Findings:</strong><br>
                                        <div style="padding-left:10px;">
                                            @php
                                                $findingString = $report->xray_form['finding'] ?? '';
                                                if (strpos($findingString, ',,') !== false) {
                                                    $findings = explode(',,', $findingString);
                                                } else {
                                                    $findings = preg_split('/\r\n|\r|\n/', $findingString);
                                                }
                                            @endphp                                           

                                            @if (!empty($findings))
                                                @foreach ($findings as $finding)
                                                    <div>{{ trim($finding) }}</div>
                                                @endforeach
                                            @else
                                                <div>N/A</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                        <strong>Comment:</strong><br>
                                        <div style="padding-left:10px;">
                                            {{ $report->xray_form['comment'] ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Signature Section -->
                                <div class="signature-section">
                                    <div class="signature-box">
                                        @if ($report->report_signature)
                                            <img src="{{ asset('storage/' . $report->report_signature) }}" class="xyar-sig-img"
                                                alt="signature" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            @elseif ($report->usg_form)
                                <div class="results-section flex-grow-1">
                                    <!-- Parameters Table -->
                                    <table class="results-table usg-table">
                                        <thead>
                                            <tr class="usg-th-tr-first">
                                                <th class="usg-th-tr-second"></th>
                                                <th class="usg-th-tr-third"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($report->usg_form['parameters'] ?? [] as $param)
                                                <tr style="border: 1px solid #ccc">
                                                    <td style="text-align:left; vertical-align: top;">
                                                        <strong>{{ $param['parameter_name'] ?? 'N/A' }}</strong>
                                                    </td>
                                                    <td>
                                                        {{ $param['result'] ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Impression -->
                                    <div style="margin-top:20px;">
                                        <strong>Impression:</strong><br>
                                        <div style="padding-left:10px; white-space: pre-line;margin-top:-20px;">
                                            {{ $report->usg_form['impression'] ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Signature Section -->
                                <div class="signature-section">
                                    <div class="signature-box">
                                        <div class="signature-text">Prepared By</div>
                                        <div class="signature-details">
                                            {{ $report->usg_signature['name'] ?? 'N/A' }}<br>
                                            {{ $report->usg_signature['qualification'] ?? 'N/A' }}<br>
                                            {{ $report->usg_signature['designation'] ?? 'N/A' }}
                                        </div>
                                    </div>
                                    <div class="signature-box">
                                        {{-- Blank --}}
                                    </div>
                                </div>
                            @else
                                <!-- যদি Laboratory হয় -->
                                <div class="results-section flex-grow-1">
                                    <table class="results-table">
                                        <thead>
                                            <tr>
                                                <th style="width:40%; text-align:left;">Test Name</th>
                                                <th style="width:20%;">Result</th>
                                                <th style="width:15%;">Unit</th>
                                                <th style="width:25%;">Reference Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($report->test_form as $test)
                                                @php
                                                    $onlyParameter =
                                                        isset($test['parameter_name']) &&
                                                        (trim($test['result'] ?? '') === '' &&
                                                            trim($test['unit'] ?? '') === '' &&
                                                            trim($test['normal_value'] ?? '') === '');
                                                    $normalValue = trim($test['normal_value'] ?? '');
                                                    $isMultiValue = str_contains($normalValue, ',');
                                                    $resultValue = trim(
                                                        preg_replace('/\s+/', ' ', $test['result'] ?? ''),
                                                    );
                                                    $parts = array_map('trim', explode(',', $resultValue));
                                                @endphp
                                                <tr
                                                    style="{{ $onlyParameter ? 'border:none;' : 'border:1px solid #ccc' }}">
                                                    <td class="{{ $onlyParameter ? 'test-name' : 'sub-test' }}"
                                                        style="text-align:left!important">
                                                        @if ($onlyParameter)
                                                            <strong>{{ $test['parameter_name'] }} :</strong>
                                                        @else
                                                            {{ $test['parameter_name'] ?? '' }}
                                                        @endif
                                                    </td>
                                                    <td>{!! implode('<br>', $parts) !!}</td>
                                                    <td>{{ trim($test['unit'] ?? '') }}</td>
                                                    <td>
                                                        @if ($isMultiValue)
                                                            {!! implode('<br>', array_map('trim', explode(',', $normalValue))) !!}
                                                        @else
                                                            {{ $normalValue }}
                                                        @endif
                                                    </td>
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
                                            {{ $report->prepared_by['name'] ?? 'N/A' }}<br>
                                            {{ $report->prepared_by['qualification'] ?? 'N/A' }}<br>
                                            {{ $report->prepared_by['designation'] ?? 'N/A' }}
                                        </div>
                                    </div>
                                    <div class="signature-box">
                                        <div class="signature-text">Authorized By</div>
                                        <div class="signature-details">
                                            {{ $report->authorized_by['name'] ?? 'N/A' }}<br>
                                            {{ $report->authorized_by['qualification'] ?? 'N/A' }}<br>
                                            {{ $report->authorized_by['designation'] ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Print Button -->
                            <div class="text-end mt-3 no-print">
                                <button class="btn btn-primary" onclick="window.print()"><i
                                        class="fa-solid fa-print"></i> Print</button>
                            </div>
                        </div>

                        <!-- Styles -->
                        @include('backend.template.print-report')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
