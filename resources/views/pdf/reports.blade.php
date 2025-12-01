<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <style>
        @page {
            margin-top: 0px !important;
            margin-bottom: 20px;
            margin-left: 25px;
            margin-right: 25px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            margin: 0 !important;
            padding: 0 !important;
        }

        .report-page {
            background: #fff;
            padding: 0 5px;
            width: 900px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Header */
        .header-table {
            width: 100%;
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .hospital-info img {
            display: block;
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .header-table td {
            vertical-align: top;
        }

        .hospital-info h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .hospital-info p {
            margin: 2px 0;
            font-size: 12px;
            color: #444;
        }

        /* Patient Details */
        .patient-table {
            width: 100%;
            margin-bottom: 15px;
            padding: 3px 0px;
            background: #FFF;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .patient-table td {
            padding: 3px 6px;
            font-size: 12px;
            line-height: 1;
            word-wrap: break-word;
        }

        .patient-table .label {
            font-weight: bold;
        }

        /* Report Title */
        .report-title {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin: -10px 12px 10px 12px;
            color: #222;
            text-transform: uppercase;
            text-decoration: underline;
        }

        /* Results Table */
        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            padding: 3px 6px;
        }

        .results-table th,
        .results-table td {
            padding: 3px 6px;
            font-size: 12px;
        }

        .results-table th {
            background: #f1f1f1;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #ccc;
        }

        .results-table td.test-name {
            font-weight: bold;
            text-align: left;
            background: #fcfcfc;
        }

        .results-table td.sub-test {
            text-align: left;
        }

        /* Signature Section */
        .sharifITFirm {
            width: 210mm;
            margin: auto;
            position: relative;
            padding: 0 5px;
            box-sizing: border-box;
            page-break-after: always;
        }

        .footer {
            position: absolute;
            bottom: -40px;
            left: 0;
            right: 0;
            width: 100%;
            text-align: center;
        }


        .signature-table {
            width: 100%;
            position: absolute;
            bottom: 100px;
            left: 0;
            right: 0;
            font-size: 12px;
        }


        .signature-table td {
            font-size: 12px;
            vertical-align: top;
        }

        .signature-text {
            font-weight: bold;
            /* text-align: left; */
        }

        .signature-details {
            padding-top: 5px;
            font-size: 11px;
            color: #333;
        }

        .page-break {
            page-break-after: always;
            clear: both;
        }

        .results-table td.no-border {
            border: 1px solid #ccc !important;
            background: #FFF;
            font-weight: bold;
        }

        .results-table td.center-text {
            text-align: left !important;
        }
    </style>
</head>

<body>
    <div id="sharifITFirm">

        @foreach ($reports as $report)
            <!-- Header -->
            <table class="header-table" style="position: relative">
                <tr>
                    <td style="width:100%!important;">
                        <div class="hospital-info">
                            @if ($setting->lab_header_img)
                                <img src="{{ public_path('storage/' . $setting->lab_header_img) }}" alt="Lab Header Image"
                                    style="width: 100%;height:80px">
                            @endif
                        </div>
                    </td>
                </tr>
                <div class="qr-code" style="position: absolute;top:10px;right:36px">
                    @if (isset($report->qrCodeData))
                        <div class="qr-code">
                            <img src="{{ $report->qrCodeData }}" alt="QR Code"
                                style="width:50px; height:50px; border:1px solid #ccc; border-radius:4px;margin-top:5px;">
                        </div>
                    @endif
                </div>
            </table>

            <!-- Patient Details -->
            <table class="patient-table">
                <tr>
                    <td class="label">Patient Name</td>
                    <td>: {{ $bill->patient->name ?? 'N/A' }}</td>
                    <td class="label">Date</td>
                    <td>: {{ $report->created_at->timezone('Asia/Dhaka')->format('d M Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Patient ID</td>
                    <td>: {{ $bill->patient->patient_id ?? 'N/A' }}</td>
                    <td class="label">Age</td>
                    <td>: {{ $bill->patient->full_age ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Gender</td>
                    <td>: {{ ucfirst($bill->patient->gender ?? 'N/A') }}</td>
                    <td class="label">Phone</td>
                    <td>: {{ $bill->patient->phone ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Invoice No</td>
                    <td>: {{ $bill->invoice_number ?? 'N/A' }}</td>
                    <td class="label">Print Date</td>
                    <td>: {{ now()->timezone('Asia/Dhaka')->format('d/m/Y h:i A') }}</td>
                </tr>
                <tr>
                    <td class="label">Referred By</td>
                    <td colspan="4">
                        :
                        @if ($bill->labtolab)
                            Lab To Lab({{$bill->labtolab}})
                        @else
                            {{ $bill->doctor->name ?? '' }}
                            {{ $bill->doctor->qualification ?? '' }}
                            ({{ $bill->doctor->designation ?? 'Self' }})
                        @endif
                    </td>
                </tr>
            </table>


            <div class="report-title">{{ $report->test_category_name }}</div>

            <!-- যদি X-Ray হয় -->
            @if ($report->xray_form)
                <div class="results-section flex-grow-1">
                    <h3 style="font-weight:bold; text-decoration:underline;">X-Ray Report</h3>

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

                            {{-- @php
                                $findings = explode(',,', $report->xray_form['finding'] ?? '');
                            @endphp --}}

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
                <table class="signature-table" style="width: 100%; margin-top:-30px;">
                    <tr>
                        <td style="width:50%; text-align:left;">
                            <!-- Signature Section -->
                            <div class="signature-section">
                                <div class="signature-box">
                                    @if ($report->report_signature)
                                        <img src="{{ public_path('storage/' . $report->report_signature) }}"
                                            alt="signature" style="width: 150px; height:150px;object-fit:cover;">
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="width:50%; text-align:left; padding-left:170px;">
                            {{-- Blank --}}
                        </td>

                    </tr>
                </table>
            @elseif ($report->usg_form)
                <div class="results-section flex-grow-1">
                    <!-- Parameters Table -->
                    <table class="results-table"
                        style="border-collapse: collapse; width: 100%; border-top: 1px solid #ccc;">
                        <thead>
                            <tr style="border-bottom: 1px solid #ccc;">
                                <th style="width:30%; text-align:left; border-right: none; border-bottom:none;"></th>
                                <th style="width:70%; border-left: none; border-bottom:none;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report->usg_form['parameters'] ?? [] as $param)
                                <tr style="border: 1px solid #ccc">
                                    <td style="text-align:left; vertical-align: top;">
                                        <strong>{{ $param['parameter_name'] ?? 'N/A' }}</strong>
                                    </td>
                                    {{-- <td style="white-space: pre-line;"> --}}
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
                <table class="signature-table" style="width: 100%; margin-top:0px;">
                    <tr>
                        <td style="width:50%; text-align:left;">
                            <div class="signature-text">Prepared By</div>
                            <div class="signature-details">
                                {{ $report->usg_signature['name'] ?? 'N/A' }}<br>
                                {{ $report->usg_signature['qualification'] ?? 'N/A' }}<br>
                                {{ $report->usg_signature['designation'] ?? 'N/A' }}
                            </div>
                        </td>
                        <td style="width:50%; text-align:left; padding-left:170px;">
                            {{-- Blank --}}
                        </td>

                    </tr>
                </table>
            @else
                <!-- যদি Laboratory হয় -->
                <div class="results-section flex-grow-1">
                    <table class="results-table">
                        <thead>
                            <tr>
                                <th style="width:40%; text-align:left;">Test Name</th>
                                <th style="width:20%;text-align:left;">Result</th>
                                <th style="width:15%;text-align:left;">Unit</th>
                                <th style="width:25%;text-align:left;">Reference Value</th>
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
                                    $resultValue = trim(preg_replace('/\s+/', ' ', $test['result'] ?? ''));
                                    $parts = array_map('trim', explode(',', $resultValue));
                                @endphp
                                <tr style="{{ $onlyParameter ? 'border:none;' : 'border:1px solid #ccc' }}">
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
                <table class="signature-table" style="width: 100%; margin-top:0px;">
                    <tr>
                        <td style="width:50%; text-align:left;">
                            <div class="signature-text">Prepared By</div>
                            <div class="signature-details">
                                {{ $report->prepared_by['name'] ?? 'N/A' }}<br>
                                {{ $report->prepared_by['qualification'] ?? 'N/A' }}<br>
                                {{ $report->prepared_by['designation'] ?? 'N/A' }}
                            </div>
                        </td>
                        <td style="width:50%; text-align:left; padding-left:170px;">
                            <div class="signature-text">Authorized By</div>
                            <div class="signature-details">
                                {{ $report->authorized_by['name'] ?? 'N/A' }}<br>
                                {{ $report->authorized_by['qualification'] ?? 'N/A' }}<br>
                                {{ $report->authorized_by['designation'] ?? 'N/A' }}
                            </div>
                        </td>

                    </tr>
                </table>
            @endif



            <div class="footer">
                {{-- <img src="{{ $footer }}" style="width:100%; height:60px;"> --}}
            </div>


            @if ($loop->last == false)
                <div class="page-break"></div>
            @endif
        @endforeach

    </div>
</body>

</html>
