<div>
    <section class="product-section py-4">
        <div class="content">
            <div class="container-fluid mt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4 col-sm-12">
                            <label for="floorSelect" class="form-label fw-bold text-primary">
                                <i class="fa-solid fa-layer-group me-1"></i> Select Floor
                            </label>
                            <select id="floorSelect" class="form-select shadow-sm" wire:model="selectedFloor">
                                <option value="">-- Choose Floor --</option>
                                @foreach ($floors as $floor)
                                    <option value="{{ $floor->floor_no }}">Floor {{ $floor->floor_no }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-12 d-flex align-items-end flex-column flex-sm-row gap-2">
                            <button wire:click="showBeds" class="btn btn-primary btn-sm me-2">
                                <i class="fa-solid fa-search me-1"></i> Submit
                            </button>

                            @if ($selectedFloor)
                                <span class="badge bg-info text-dark fs-6 px-3 py-2 shadow-sm">
                                    {{ $bedCount }} Beds
                                </span>

                                <span class="badge bg-success text-white fs-6 px-3 py-2 shadow-sm">
                                    Floor Admissions: {{ $totalAdmissionsOnFloor }}
                                </span>

                                <span class="badge bg-primary text-white fs-6 px-3 py-2 shadow-sm">
                                    All Floors Admissions: {{ $totalAdmissionsAllFloors }}
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                @if ($confirmedFloor)
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap">
                            <h5 class="fw-bold mb-0 text-primary">
                                <i class="fa-solid fa-bed me-1"></i> Beds on Floor {{ $confirmedFloor }}
                            </h5>
                            <span class="text-muted small">Total: {{ count($beds) }}</span>
                        </div>

                        @if (count($beds) > 0)
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                                @foreach ($beds as $bed)
                                    <div class="col">
                                        <div class="card border-0 shadow-sm rounded-3 h-100 bed-card 
                                            {{ $bed->is_occupied ? 'bg-danger-subtle' : 'bg-success-subtle' }}"
                                            wire:click="openAdmissionForm({{ $bed->id }})" style="cursor:pointer;">
                                            <div class="card-body text-center py-4">
                                                <div class="fs-5 fw-bold mb-1 text-dark">
                                                    Bed {{ $bed->bed_no }}
                                                </div>
                                                <div class="text-muted mb-2">
                                                    <div>Room No: {{ $bed->room_no ?? 'N/A' }}</div>
                                                    <div>Bed Cat: {{ $bed->bed_category ?? 'N/A' }}</div>
                                                    <div>Bed Cat: {{ $bed->floor_no ?? 'N/A' }}</div>
                                                    <div>Type: {{ $bed->bed_type ?? 'N/A' }}</div>
                                                </div>

                                                @if ($bed->admission && $bed->admission->patient)
                                                    <span class="badge bg-danger-light mb-2">Occupied</span>
                                                    <div class="small mt-1">
                                                        <strong>Patient:</strong> {{ $bed->admission->patient->name }}
                                                    </div>
                                                    <div class="small mt-1">
                                                        <strong>Admission Id:</strong>
                                                        {{ $bed->admission->admission_id }}
                                                    </div>
                                                    <div class="small mt-1">
                                                        <strong>Patient HID:</strong>
                                                        <span
                                                            class="bg-success-light">{{ $bed->admission->patient->patient_id }}</span>
                                                        <i class="fa-regular fa-copy" role="button"
                                                            onclick="copyToClipboard('{{ $bed->admission->patient->patient_id }}')"></i>
                                                    </div>
                                                    <div class="small mt-1">
                                                        <strong>Phone:</strong>
                                                        {{ $bed->admission->patient->phone ?? '—' }}
                                                    </div>
                                                    <div class="small mt-1">
                                                        <strong>Admitted:</strong>
                                                        {{ \Carbon\Carbon::parse($bed->admission->admit_date)->format('d M Y, h:i A') }}
                                                    </div>

                                                    <div class="mt-3">
                                                        <label class="small fw-bold text-secondary">Bill ID:</label>

                                                        @php
                                                            $billIds = is_array($bed->admission->bill_id)
                                                                ? preg_split(
                                                                    '/[\s,]+/',
                                                                    implode(',', $bed->admission->bill_id),
                                                                )
                                                                : preg_split(
                                                                    '/[\s,]+/',
                                                                    $bed->admission->bill_id ?? '—',
                                                                );
                                                        @endphp

                                                        <div class="d-flex flex-wrap gap-1">
                                                            @foreach ($billIds as $id)
                                                                @if (!empty($id) && $id !== '—')
                                                                    <span class="badge text-wrap"
                                                                        style="background-color: rgba(214, 31, 105, 0.1); color: #D61F69; cursor: pointer;margin:auto;"
                                                                        title="Click to copy {{ $id }}"
                                                                        onclick="
                                                                            navigator.clipboard.writeText('{{ $id }}').then(() => {
                                                                                window.dispatchEvent(new CustomEvent('toastr:success', { detail: { message: 'Copied: {{ $id }}' } }));
                                                                            });
                                                                        ">
                                                                        {{ $id }}
                                                                    </span>
                                                                @endif
                                                            @endforeach
                                                        </div>

                                                        <div class="input-group input-group-sm mt-2">
                                                            <input type="text" class="form-control"
                                                                wire:model.defer="billValues.{{ $bed->admission->id }}">
                                                            <button class="btn btn-outline-success"
                                                                wire:click="updateBillId({{ $bed->admission->id }})">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </div>



                                                    <div class="mt-3">
                                                        <a href="{{ route('pt.ot.consent', $bed->admission->id) }}"
                                                            class="btn btn-outline-primary btn-sm" wire:navigate>
                                                            <i class="fa-solid fa-pencil me-1"></i> Consent
                                                        </a>

                                                        <button class="btn btn-sm btn-outline-danger"
                                                            wire:click.stop="dischargePatient({{ $bed->admission->id }})">
                                                            <i class="fa-solid fa-person-walking-arrow-right me-1"></i>
                                                            Discharge
                                                        </button>
                                                    </div>
                                                @else
                                                    <span class="badge bg-success">Available</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5 text-muted">
                                <i class="fa-solid fa-circle-info fa-2x mb-2"></i>
                                <p class="mb-0">No beds found on this floor.</p>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="text-center py-5 text-muted">
                        <i class="fa-solid fa-circle-info fa-2x mb-2"></i>
                        <p class="mb-0">Please select the Floor.</p>
                    </div>
                @endif

                @if ($showAdmissionForm && $selectedBed)
                    <div class="card border-0 shadow-sm rounded-4 p-4 mt-4">
                        <h5 class="fw-bold text-primary mb-3">Admit Patient to Bed {{ $selectedBed->bed_no }}</h5>
                        <div class="row g-3 align-items-end">
                            <div class="col-md-6">
                                <input type="text" class="form-control" wire:model="patientSearch"
                                    placeholder="Search Patient by e.g: name,HID,phone">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" wire:model="selectedPatientId">
                                    <option value="">-- Select Patient --</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}
                                            ({{ $patient->phone ?? '' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 d-grid">
                                <button class="btn btn-success" wire:click="admitPatient">Admit</button>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($showDischargeModal)
                    <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title fw-bold text-danger">Confirm Discharge</h5>
                                    <button type="button" class="btn-close" wire:click="resetModalState"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Patient:</strong> {{ $selectedPatientName }}</p>
                                    <p><strong>Room No:</strong> {{ $selectedRoomNo }}</p>
                                </div>
                                <div class="modal-footer border-0">
                                    <button class="btn btn-secondary" wire:click="resetModalState">Cancel</button>
                                    <button class="btn btn-danger" wire:click="confirmDischarge">Yes,
                                        Discharge</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                Livewire.dispatch('toastr:success', {
                    message: 'Copied: ' + text
                });
            }, function(err) {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
@endpush
