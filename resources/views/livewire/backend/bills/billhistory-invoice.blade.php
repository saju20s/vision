<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                @if ($bills->count())
                    <div class="bill-page">
                        <div class="bill-content">
                            <div class="header clearfix position-relative">
                                <img src="{{ asset('backend/images/qr.png') }}" class="billhistory-header-img">
                                <div class="qr-code billhistory-qrcode-div">
                                    @if ($qrCode)
                                        <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code"
                                            class="billhistory-qrcode-img">
                                    @endif
                                </div>
                            </div>

                            <div class="bill-title">CASH MEMO/BILL</div>

                            <div class="patient-info-box">
                                <table class="info-table">
                                    <tr>
                                        <td><strong>Invoice No</strong></td>
                                        <td>: {{ $bills->first()->invoice_number }}</td>
                                        <td><strong>Date</strong></td>
                                        <td>: {{ $bills->first()->created_at->format('d M Y h:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Patient Name</strong></td>
                                        <td>: {{ $bills->first()->patient?->name ?? '-' }}</td>
                                        <td><strong>Age</strong></td>
                                        <td>: {{ $bills->first()->patient?->full_age ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Patient ID</strong></td>
                                        <td>: {{ $bills->first()->patient?->patient_id ?? '-' }}</td>
                                        <td><strong>Gender</strong></td>
                                        <td>:
                                            {{ $bills->first()->patient?->gender ? ucfirst($bills->first()->patient?->gender) : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone</strong></td>
                                        <td>: {{ $bills->first()->patient?->phone ?? '-' }}</td>
                                        <td><strong>Transection</strong></td>
                                        <td>:
                                            @if (
                                                $bills->first() &&
                                                    isset($bills->first()->payment['method']) &&
                                                    strtolower($bills->first()->payment['method']) === 'banking')
                                                Banking ({{ $bills->first()->payment['payment_address'] ?? '' }},
                                                {{ $bills->first()->payment['transaction_id'] ?? '' }})
                                            @else
                                                {{ ucfirst($bills->first()->payment['method'] ?? 'Cash') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ref Doctors</strong< /td>
                                        <td colspan="4"> <span>:
                                                {{ $bills->first()->doctor?->name ?? '' }}
                                                {{ $bills->first()->doctor?->qualification ?? '' }}
                                                ({{ $bills->first()->doctor?->designation ?? 'Self' }})</span></td>
                                    </tr>
                                </table>
                            </div>

                            <table>
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Code</th>
                                        <th>Test Name</th>
                                        <th>Qty</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bills->first()->items as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->investigation?->id ?? '-' }}</td>
                                            <td>{{ $item->investigation?->test_name ?? '-' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->total, 2) }} ৳</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @php
                                $last_bill = $bills->last();

                                $discount_amount = $last_bill->discount;
                                $discount_type = $last_bill->discount_type;

                                $gross_total = $last_bill->items->sum('total');

                                // Calculate total after discount
                                if ($discount_type === 'percentage') {
                                    $discount_value = round(($gross_total * $discount_amount) / 100, 2);
                                } else {
                                    $discount_value = $discount_amount;
                                }

                                $total_amount = $gross_total - $discount_value + $last_bill->vat;

                                $total_paid = $bills->sum('paid_amount');
                                $total_due = $total_amount - $total_paid;
                            @endphp


                            <div class="clearfix bg-white">
                                <div class="payment-status">
                                    <div class="paid-stamp {{ $total_due > 0 ? 'due' : 'paid' }}">
                                        {{ $total_due > 0 ? 'DUE' : 'PAID' }}
                                    </div>
                                </div>

                                <div class="payment-summary">
                                    <div class="payment-row">
                                        <div><strong>Gross Total:</strong></div>
                                        <div>{{ number_format($last_bill->items->sum('total'), 2) }}</div>
                                    </div>
                                    <div class="payment-row">
                                        <div><strong>VAT Amount :</strong></div>
                                        <div>{{ number_format($last_bill->vat, 2) }}
                                            {{ $last_bill->vat_type === 'percentage' ? '%' : '৳' }}</div>
                                    </div>
                                    <div class="payment-row text-success bill-border-bottom">
                                        <div><strong>Discount Amount :</strong></div>
                                        <div>
                                            - {{ number_format($discount_amount, 2) }}
                                            {{ $discount_type === 'percentage' ? '%' : '৳' }}
                                        </div>
                                    </div>

                                    <div class="payment-row">
                                        <div><strong>Total:</strong></div>
                                        <div>{{ number_format($last_bill->total_amount, 2) }} ৳</div>
                                    </div>                                    
                                    <div class="payment-row">
                                        <div><strong>Paid :</strong></div>
                                        <div>{{ number_format($total_paid, 2) }} ৳</div>
                                    </div>

                                    <div class="payment-row">
                                        <div><strong>Due :</strong></div>
                                        <div>
                                            <span
                                                class="fw-bold {{ $last_bill->due_amount > 0 ? 'text-danger' : '' }}">

                                            </span>
                                            <span
                                                class="text-end fw-bold {{ $last_bill->due_amount > 0 ? 'text-danger' : '' }}">
                                                {{ number_format($last_bill->due_amount, 2) }} ৳
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="note bg-white">
                                <p>In Words : {{ $amount_in_words }}</p>
                                <p>Note : <span class="text-danger">বি দ্রঃ সেচ্ছায় ক্যাশ রিটার্ন করলে ২০% চার্জ
                                        প্রযোজ্য হবে।</span></p>
                            </div>

                            {{-- Payment History --}}
                            <div class="mt-3">
                                <h6>Payment History</h6>
                                @foreach ($bills as $payment)
                                    <div class="border p-2 mb-1">
                                        <strong>Date:</strong> {{ $payment->created_at->format('d M Y h:i A') }}<br>
                                        <strong>Amount:</strong> {{ number_format($payment->paid_amount, 2) }} ৳<br>
                                        <strong>Method:</strong> {{ ucfirst($payment->payment['method'] ?? 'Cash') }}
                                        @if (strtolower($payment->payment['method'] ?? '') === 'banking')
                                            <br><strong>Address:</strong>
                                            {{ $payment->payment['payment_address'] ?? '-' }}
                                            <br><strong>Transaction ID:</strong>
                                            {{ $payment->payment['transaction_id'] ?? '-' }}
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="footer-sticky">
                            <div class="footer">
                                <div class="d-flex justify-content-between">
                                    <div>Auth. Signature</div>
                                    <div>Printed On :
                                        {{ now()->format('d-m-Y h:i A') }}
                                        @if ($bills->first()->marketing?->id)
                                            Code: ({{ $bills->first()->marketing?->id }},
                                            {{ $bills->first()->marketing?->name }})
                                        @endif
                                    </div>
                                    <div>Prepared By : {{ $bills->first()->entry_by }}</div>
                                </div>
                            </div>

                            <div class="department-links">
                                <strong>Pathology : 101</strong> &nbsp;&nbsp; <strong>X-ray : 103</strong>
                                &nbsp;&nbsp; <strong>USG/ECG : 102</strong> &nbsp;&nbsp; <strong>ECHO :
                                    105</strong>
                            </div>

                            <div class="footer text-center">
                                <p>Software developed By: Skyline Software BD, Contact: +8801601153971</p>
                            </div>

                            <div class="text-end mt-2">
                                <button class="btn btn-primary btn-sm" onclick="printInvoice()">
                                    <i class="fa-solid fa-print"></i> Print Invoice
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Print CSS --}}
                    @include('backend/template.billhistory')
                @endif
            </div>
        </div>
    </section>
</div>

<script>
    function printInvoice() {
        window.print();
    }
</script>
