<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="updateBill">
                            {{-- Patient select and add investigations etc... --}}
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3 position-relative">
                                        <label>Patient</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Search by phone or id..."
                                                wire:model.debounce.300ms="patientSearch" readonly>
                                        </div>

                                        @if (!empty($patientResults))
                                            <ul class="list-group position-absolute w-100 employee-identify-ul">
                                                @foreach ($patientResults as $pat)
                                                    <li class="list-group-item list-group-item-action"
                                                        wire:click="selectPatient({{ $pat->id }})">
                                                        {{ $pat->name }}
                                                        @if ($pat->type === 'employee')
                                                            <span class="badge bg-primary text-white">Employee</span>
                                                        @endif
                                                        — {{ $pat->phone }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>

                                    @if ($selectedPatient)
                                        <div class="card mb-3 d-contents">
                                            <span class="badge bg-success">{{ $selectedPatient->name }}</span>
                                            <span
                                                class="badge bg-success">{{ $selectedPatient->full_age ?? 'N/A' }}</span>
                                            <span
                                                class="badge bg-success">{{ ucfirst($selectedPatient->gender ?? '-') }}</span>
                                            <span class="badge bg-success">{{ $selectedPatient->phone ?? '-' }}</span>
                                            <span class="badge bg-success">{{ $selectedPatient->address }}</span>
                                        </div>
                                    @endif

                                    {{-- New Code Start --}}
                                    <div class="d-flex gap-3 mt-2">
                                        <div class="mb-3 position-relative">
                                            <span class="badge bg-primary mb-2">Referred By</span>
                                            <input type="text" class="form-control"
                                                wire:model.debounce.300ms="doctorSearch" wire:keyup="searchDoctor"
                                                wire:focus="loadAllDoctors" placeholder="Search or select doctor...">

                                            @if (!empty($doctorResults))
                                                <ul class="list-group position-absolute w-100"
                                                    style="z-index: 1000; max-height: 200px; overflow-y: auto;">
                                                    @foreach ($doctorResults as $doctor)
                                                        <li class="list-group-item list-group-item-action"
                                                            wire:click="selectDoctor({{ $doctor->id }})">
                                                            {{ $doctor->name }}({{ $doctor->id }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Referred Other</span>
                                            <input type="text" class="form-control"
                                                placeholder="Write Diagnostics name..." wire:model.live="labtolab">
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <span class="badge bg-primary mb-2">Owner/Marketing</span>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Search or select marketing..."
                                                    wire:model.debounce.300ms="marketingSearch"
                                                    wire:keyup="searchMarketing" wire:focus="loadAllMarketings">
                                            </div>

                                            @if (!empty($marketingResults))
                                                <ul class="list-group position-absolute w-100"
                                                    style="z-index:1000; max-height:200px; overflow-y:auto;">
                                                    @foreach ($marketingResults as $marketing)
                                                        <li class="list-group-item list-group-item-action"
                                                            wire:click="selectMarketing({{ $marketing->id }})">
                                                            {{ $marketing->name }}
                                                            @if ($marketing->type === 'owner')
                                                                <span class="badge bg-primary text-white">Owner</span>
                                                            @endif
                                                            (ID: {{ $marketing->id }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Note</span>
                                            <input wire:model="note" type="text" class="form-control"
                                                placeholder="Write here">
                                        </div>

                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Payment Method</span>
                                            <select wire:model.live="payment" id="payment" class="form-control">
                                                <option value="">Select the payment method</option>
                                                <option value="cash">Cash</option>
                                                <option value="banking">Mobile Banking/Bank</option>
                                            </select>
                                        </div>

                                        @if ($payment === 'banking')
                                            <div class="mb-3">
                                                <input type="text" class="form-control mb-2"
                                                    wire:model.defer="payment_address"
                                                    placeholder="Enter payment address">

                                                <input type="text" class="form-control"
                                                    wire:model.defer="transaction_id"
                                                    placeholder="Enter transaction ID">
                                            </div>
                                        @endif

                                    </div>

                                    <div class="d-flex gap-3">
                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Gross Total</span>
                                            <input type="number" class="form-control"
                                                value="{{ $gross_total ?? ($total_amount ?? 0) }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">VAT</span>
                                            <div class="input-group">
                                                <input type="number" class="form-control rounded-0" wire:model="vat"
                                                    wire:input="calculateTotal" min="0">
                                                <select class="form-select rounded-0" wire:model="vat_type"
                                                    wire:change="calculateTotal" style="padding: 0px 5px;">
                                                    <option value="percentage">%</option>
                                                    <option value="amount">৳</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt-1">
                                            <small class="text-secondary">
                                                VAT Amount:
                                                <span class="fw-bold text-primary">
                                                    {{ number_format($vat_amount, 2) }} ৳
                                                </span>
                                            </small>
                                        </div>

                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Discount</span>
                                            <div class="input-group">
                                                <input type="number" class="form-control rounded-0"
                                                    wire:model="discount" wire:input="calculateTotal" min="0">
                                                <select class="form-select rounded-0" wire:model="discount_type"
                                                    wire:change="calculateTotal" style="padding: 0px 5px;">
                                                    <option value="amount">৳</option>
                                                    <option value="percentage">%</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Paid</span>
                                            <input type="number" class="form-control" wire:model="paid_amount"
                                                wire:input="calculateTotal" min="0">
                                        </div>
                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Total</span>
                                            <input type="number" class="form-control" value="{{ $total_amount }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <div class="mb-3">
                                            <span class="badge bg-danger mb-2">Due</span>
                                            <input type="number" class="form-control" value="{{ $due_amount }}"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">Delivery Date & Time</span>
                                            <input type="datetime-local" class="form-control"
                                                wire:model="delivery_date">
                                        </div>
                                    </div>
                                    {{-- New Code End --}}

                                    <div class="mb-3 position-relative">
                                        <label>Search Investigation</label>
                                        <input type="text" class="form-control"
                                            placeholder="Search by test name or price..."
                                            wire:model.debounce.300ms="investigationSearch"
                                            wire:input="searchInvestigation" wire:focus="loadAllInvestigations">

                                        @if (!empty($investigationResults))
                                            <ul class="list-group position-absolute w-100 search-investigation-input">
                                                @foreach ($investigationResults as $inv)
                                                    <li class="list-group-item list-group-item-action"
                                                        wire:click="selectInvestigation({{ $inv->id }})">
                                                        {{ $inv->test_name }} — {{ $inv->sell_price }}৳
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered align-middle text-center">
                                            <thead>
                                                <tr>
                                                    <th class="thead-twenty">SL No</th>
                                                    <th class="thead-twenty">Test</th>
                                                    <th class="thead-twenty">Price</th>
                                                    <th class="thead-twenty">Discount (%)</th>
                                                    <th class="thead-twenty">Discount Amount</th>
                                                    <th class="thead-twenty">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $totalDiscount = 0; @endphp
                                                @foreach ($items as $index => $item)
                                                    @php
                                                        $discAmount =
                                                            $item['price'] *
                                                            $item['quantity'] *
                                                            ($item['discount'] / 100);
                                                        $totalDiscount += $discAmount;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['price'] }}</td>
                                                        <td>
                                                            <input type="number" min="0" max="100"
                                                                class="form-control form-control-sm text-center"
                                                                wire:model.lazy="items.{{ $index }}.discount">
                                                        </td>
                                                        <td>{{ number_format($discAmount, 2) }} Tk</td>
                                                        <td>
                                                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                                                <button type="button"
                                                                    class="btn btn-sm bg-success-light d-flex align-items-center justify-content-center"
                                                                    wire:click="editItem({{ $index }})"
                                                                    title="Edit Test">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </button>

                                                                <button type="button"
                                                                    class="btn btn-sm bg-danger-light d-flex align-items-center justify-content-center"
                                                                    wire:click="removeItem({{ $index }})"
                                                                    title="Remove Test">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-end">Total Discount:</th>
                                                    <th>{{ number_format($totalDiscount, 2) }} Tk</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    @can('bill.add')
                                        <button type="submit" class="btn btn-primary form-control my-2"
                                            wire:loading.attr="disabled">
                                            Update Bill
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </form>
                    </div>


                    {{-- Invoice Show Section --}}
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
                                    <div class="add-bill-footer-auth">
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

                                <div class="footer add-bill-footer">
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
                        @include('backend.template.add-bill')

                    @endif

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
