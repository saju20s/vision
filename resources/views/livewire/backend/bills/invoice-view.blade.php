<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-2">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-2">
                    <div class="col-md-12">

                        @if ($bill)
                            <div class="bill-page">
                                <div class="bill-content">
                                    <div class="header d-flex align-items-center justify-content-between px-3 py-3">
                                        <div class="header-left">
                                            <img src="{{ asset('backend/images/qr.png') }}" class="img-fluid"
                                                style="max-height:60px;">
                                        </div>
                                        <div class="header-center text-center flex-grow-1">
                                            <span class="mb-0 invoice-heading-text">{!! str_replace(',,', '<br>', e($settings->address)) !!}</span>
                                        </div>
                                        <div class="header-right">
                                            @if ($qrCode)
                                                <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code"
                                                    class="add-bill-qrcode-img" style="max-height:80px;">
                                            @endif
                                        </div>
                                    </div>


                                    <div class="bill-title">CASH MEMO/BILL</div>

                                    <div class="patient-info-box">
                                        <table class="info-table">
                                            <tr>
                                                <td><strong>Invoice No</strong></td>
                                                <td>: {{ $bill->invoice_number }}</td>
                                                <td><strong>Date</strong></td>
                                                <td>: {{ $bill->created_at->format('d M Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Patient Name</strong></td>
                                                <td>: {{ $bill->patient->name }}</td>
                                                <td><strong>Age</strong></td>
                                                <td>: {{ $bill->patient->full_age ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Patient ID</strong></td>
                                                <td>: {{ $bill->patient->patient_id }}</td>
                                                <td><strong>Gender</strong></td>
                                                <td>:
                                                    {{ $bill->patient->gender ? ucfirst($bill->patient->gender) : '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone</strong></td>
                                                <td>: {{ $bill->patient->phone }}</td>
                                                <td><strong>Transection</strong></td>
                                                <td>:
                                                    @if ($bill && isset($bill->payment['method']) && strtolower($bill->payment['method']) === 'banking')
                                                        Banking ({{ $bill->payment['payment_address'] ?? '' }},
                                                        {{ $bill->payment['transaction_id'] ?? '' }})
                                                    @else
                                                        {{ ucfirst($bill->payment['method'] ?? 'Cash') }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Referred By</strong></td>
                                                <td colspan="4">
                                                    <span>:
                                                        @if ($bill->labtolab)
                                                            {{ $bill->labtolab }}
                                                        @else
                                                            {{ $bill->doctor->name ?? '' }}
                                                            {{ $bill->doctor->qualification ?? '' }}
                                                            ({{ $bill->doctor->designation ?? 'Self' }})
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            @if ($bill->marketing && $bill->marketing->type == 'owner')
                                                <tr>
                                                    <td><strong>Remarks</strong></td>
                                                    <td colspan="4">
                                                        <span>
                                                            : Less by {{ $bill->marketing->name }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>

                                    <table>
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Code</th>
                                                <th>Test Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bill->items as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->investigation->id ?? '-' }}</td>
                                                    <td>{{ $item->investigation->test_name }}</td>
                                                    <td>{{ number_format($item->total, 2) }} ৳</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="clearfix bg-white">
                                        <strong class="mb-3">Delivery Date:
                                            {{ \Carbon\Carbon::parse($bill->delivery_date)->format('d-m-Y h:i A') }}
                                        </strong><br>
                                        <div class="payment-status">
                                            <div class="paid-stamp {{ $bill->due_amount > 0 ? 'due' : 'paid' }}">
                                                {{ $bill->due_amount > 0 ? 'DUE' : 'PAID' }}
                                            </div>
                                        </div>

                                        <div class="payment-summary">
                                            <div class="payment-row">
                                                <div><strong>Gross Total:</strong></div>
                                                <div>{{ number_format($bill->items->sum('total'), 2) }} ৳</div>
                                            </div>
                                            <div class="payment-row">
                                                <div><strong>VAT Amount :</strong></div>
                                                <div>{{ number_format($bill->vat, 2) }}
                                                    {{ $bill->vat_type === 'percentage' ? '%' : '৳' }}</div>
                                            </div>
                                            <div class="payment-row text-success bill-border-bottom">
                                                <div><strong>Discount Amount :</strong></div>
                                                <div> - {{ number_format($bill->discount, 2) }}
                                                    {{ $bill->discount_type === 'percentage' ? '%' : '৳' }}</div>
                                            </div>
                                            <div class="payment-row">
                                                <div><strong>Total:</strong></div>
                                                <div>{{ number_format($bill->total_amount, 2) }} ৳</div>
                                            </div>
                                            <div class="payment-row">
                                                <div><strong>Paid :</strong></div>
                                                <div>{{ number_format($bill->paid_amount, 2) }} ৳</div>
                                            </div>
                                            <div class="payment-row">
                                                <div><strong>Due :</strong></div>
                                                <div>
                                                    <span
                                                        class="fw-bold {{ $bill->due_amount > 0 ? 'text-danger' : '' }}">

                                                    </span>
                                                    <span
                                                        class="text-end fw-bold {{ $bill->due_amount > 0 ? 'text-danger' : '' }}">
                                                        {{ number_format($bill->due_amount, 2) }} ৳
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="note bg-white">
                                        <p>In Words : {{ $amount_in_words }}</p>
                                    </div>
                                </div>

                                <div class="footer-sticky">
                                    <div class="footer">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                @if ($bill->marketing && $bill->marketing->type == 'mark')
                                                    Code: ({{ $bill->marketing->id }})
                                                @endif
                                            </div>
                                            <div>Printed On :
                                                {{ now()->format('d-m-Y h:i A') }}
                                            </div>
                                            <div>Prepared By : {{ $bill->entry_by }}</div>
                                        </div>
                                    </div>

                                    <div class="department-links">
                                        <strong>Pathology : 101</strong> &nbsp;&nbsp; <strong>X-ray : 103</strong>
                                        &nbsp;&nbsp; <strong>USG/ECG : 102</strong> &nbsp;&nbsp; <strong>ECHO :
                                            105</strong>
                                    </div>

                                    <div class="footer text-center">
                                        <p>বিঃদ্রঃ-পরীক্ষা করার আগে রোগীর নাম,বয়স,ডাক্তারের নাম,পুরুষ/মহিলা ইত্যাদি তথ্য
                                            সঠিক আছে কিনা দেখে নিন।</p>
                                    </div>

                                    <div class="text-end mt-2">
                                        <button class="btn btn-primary btn-sm" onclick="printInvoice()">
                                            <i class="fa-solid fa-print"></i> Print Invoice
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Print CSS --}}
                            @include('backend.template.invoice-view')

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function printInvoice() {
        window.print();
    }
</script>
