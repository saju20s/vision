<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="store">
                            {{-- Patient select and add investigations etc... --}}
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-9 col-md-8 mb-3">
                                    <div class="mb-3 position-relative">
                                        <label>Patient</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Search by phone or id..."
                                                wire:model.debounce.300ms="patientSearch" wire:focus="loadAllPatients">

                                            <button type="button" class="btn btn-primary" wire:click="searchByPhone">
                                                Search
                                            </button>

                                            <!-- Modal trigger button -->
                                            <button type="button" class="btn btn-danger d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#addPatientModal">
                                                <i class="fas fa-plus"></i>
                                            </button>
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
                                        </div>
                                    @endif




                                    <div class="mb-3 position-relative">
                                        <label>Search Procedure</label>
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
                                                    <th class="thead-twenty">Name</th>
                                                    <th class="thead-twenty">Price</th>
                                                    <th class="thead-twenty">Qty</th>
                                                    <th class="thead-twenty">Subtotal</th>
                                                    <th class="thead-twenty">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $index => $item)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['price'] }}</td>
                                                        <td>
                                                            <input type="number" min="1"
                                                                class="form-control form-control-sm text-center"
                                                                wire:change="updateQty({{ $index }}, $event.target.value)"
                                                                value="{{ $item['quantity'] }}">
                                                        </td>
                                                        <td>{{ $item['subtotal'] }}</td>
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
                                        </table>
                                        @if ($editIndex !== null)
                                            <div class="card mt-3 p-3 border-info">
                                                <h6 class="fw-bold text-info mb-2">Edit Test Item</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" wire:model="editName"
                                                            readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control"
                                                            wire:model="editPrice" min="0">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" class="form-control"
                                                            wire:model="editQuantity" min="1">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-primary form-control"
                                                            wire:click="updateItem">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>



                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-warning">Gross Total</label>
                                        <input type="number" class="form-control"
                                            value="{{ $gross_total ?? ($total_amount ?? 0) }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-info">Discount</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" wire:model="discount"
                                                wire:input="calculateTotal" min="0">
                                            <select class="form-select" wire:model="discount_type"
                                                wire:change="calculateTotal">
                                                <option value="amount">৳</option>
                                                <option value="percentage">%</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-success">Paid</label>
                                        <input type="number" class="form-control" wire:model="paid_amount"
                                            wire:input="calculateTotal" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-success">Total</label>
                                        <input type="number" class="form-control" value="{{ $total_amount }}"
                                            readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-danger">Due</label>
                                        <input type="number" class="form-control" value="{{ $due_amount }}"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="payment" class="form-label fw-semibold">Payment Method</label>
                                        <select wire:model.live="payment" id="payment" class="form-control">
                                            <option value="">Select the payment method</option>
                                            <option value="cash">Cash</option>
                                            <option value="banking">Mobile Banking/Bank</option>
                                        </select>
                                    </div>

                                    @if ($payment === 'banking')
                                        <div class="mb-3">
                                            <input type="text" class="form-control mb-2"
                                                wire:model.defer="payment_address" placeholder="Enter payment address">

                                            <input type="text" class="form-control" wire:model.defer="transaction_id"
                                                placeholder="Enter transaction ID">
                                        </div>
                                    @endif


                                    <div class="mb-3 position-relative">
                                        <label class="form-label fw-semibold">Referred By</label>
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

                                    <div class="mb-3 position-relative">
                                        <label for="marketing" class="form-label fw-semibold">Marketing</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Search or select marketing..."
                                                wire:model.debounce.300ms="marketingSearch"
                                                wire:keyup="searchMarketing" wire:focus="loadAllMarketings">
                                            <button type="button" class="btn btn-danger d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#addMarketingModal">
                                                <i class="fas fa-plus me-1"></i>
                                            </button>
                                        </div>

                                        @if (!empty($marketingResults))
                                            <ul class="list-group position-absolute w-100"
                                                style="z-index:1000; max-height:200px; overflow-y:auto;">
                                                @foreach ($marketingResults as $marketing)
                                                    <li class="list-group-item list-group-item-action"
                                                        wire:click="selectMarketing({{ $marketing->id }})">
                                                        {{ $marketing->name }} (ID: {{ $marketing->id }})
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Note</label>
                                        <input wire:model="note" type="text" class="form-control"
                                            placeholder="Write here">
                                    </div>

                                    @can('bill.add')
                                        <button type="submit" class="btn btn-primary form-control my-2"
                                            wire:loading.attr="disabled">Add Bill</button>
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
                                            style="max-height:80px;">
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
                                            <td><strong>Ref Doctors</strong< /td>
                                            <td colspan="4"> <span>:
                                                    {{ $bill->doctor->name ?? '' }}
                                                    {{ $bill->doctor->qualification ?? '' }}
                                                    ({{ $bill->doctor->designation ?? 'Self' }})</span></td>
                                        </tr>
                                    </table>
                                </div>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Code</th>
                                            <th>Procedure Name</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bill->items as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->investigation->id ?? '-' }}</td>
                                                <td>{{ $item->investigation->test_name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->total, 2) }} ৳</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="clearfix bg-white">
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
                                        <div class="payment-row text-success">
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
                                    <p>Note : <span class="text-danger">বি দ্রঃ সেচ্ছায় ক্যাশ রিটার্ন করলে ২০% চার্জ
                                            প্রযোজ্য হবে।</span></p>
                                </div>
                            </div>

                            <div class="footer-sticky">
                                <div class="footer">
                                    <div class="add-bill-footer-auth">
                                        <div>Auth. Signature</div>
                                        <div>Printed On :
                                            {{ now()->format('d-m-Y h:i A') }}
                                            @if ($bill->marketing?->id)
                                                Code: ({{ $bill->marketing?->id }})
                                            @endif
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
                                    <p>Software developed By: Sharif IT Solution, Contact: +8801601153971</p>
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
    
    <div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary-modal text-white">
                    <h5 class="modal-title">Add New Patient</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model.defer="newPatient.name"
                            placeholder="Enter name">
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" wire:model.defer="newPatient.phone"
                            placeholder="Enter phone number">
                    </div>

                    <!-- Age & Gender in one row -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" wire:model.defer="newPatient.age"
                                placeholder="Enter age">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label fw-semibold">Gender</label>
                            <select wire:model.defer="newPatient.gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="2" wire:model.defer="newPatient.address" placeholder="Enter address"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="savePatient">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addMarketingModal" tabindex="-1" aria-labelledby="addMarketingLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary-modal text-white">
                    <h5 class="modal-title">Add New Marketing</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model.defer="newMarketing.name"
                            placeholder="Enter name">
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" wire:model.defer="newMarketing.phone"
                            placeholder="Enter phone number">
                    </div>

                    <!-- Age & Gender in one row -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" wire:model.defer="newMarketing.age"
                                placeholder="Enter age">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label fw-semibold">Gender</label>
                            <select wire:model="newMarketing.gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="2" wire:model.defer="newMarketing.address" placeholder="Enter address"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="saveMarketing">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    
</div>

@push('scripts')
    <script>
        function printInvoice() {
            window.print();
        }

        document.addEventListener('livewire:load', () => {
            Livewire.on('close-patient-modal', () => {
                const modalEl = document.getElementById('addPatientModal');
                const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.hide();
            });

            Livewire.hook('message.processed', (message, component) => {
                const modalEl = document.getElementById('addPatientModal');
                if (modalEl && !bootstrap.Modal.getInstance(modalEl)) {
                    new bootstrap.Modal(modalEl);
                }
            });
        });

        document.addEventListener('livewire:load', () => {
            Livewire.on('close-marketing-modal', () => {
                const modalEl = document.getElementById('addMarketingModal');
                const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.hide();
            });

            Livewire.hook('message.processed', (message, component) => {
                const modalEl = document.getElementById('addMarketingModal');
                if (modalEl && !bootstrap.Modal.getInstance(modalEl)) {
                    new bootstrap.Modal(modalEl);
                }
            });
        });
    </script>
@endpush

