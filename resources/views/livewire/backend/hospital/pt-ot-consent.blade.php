<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-edit p-4 shadow-sm rounded bg-white">
                            <h5 class="fw-bold mb-3 text-center text-uppercase">
                                Patient OT Consent Form
                            </h5>

                            <form wire:submit.prevent="store">
                                <div class="row">

                                    @php
                                        $textareaFields = [
                                            'operation_diagnosis',
                                            'findings',
                                            'other_notes',
                                            'indication',
                                            'guardian_address',
                                            'address',
                                        ];
                                        $dateFields = ['ot_date', 'delivery_date_time'];
                                        $genderFields = ['gender', 'baby_gender'];
                                        $dropdownFields = [
                                            'religion',
                                            'marrital_status',
                                            'operation_category',
                                            'blood_transfusion',
                                        ];
                                    @endphp

                                    {{-- Loop through all fields --}}
                                    @foreach ($form as $key => $value)
                                        <div class="col-md-4 mb-3 @if(in_array($key, ['surgeon','admitted_under_doctor','anesthesiologist','reference_by'])) position-relative @endif">
                                            <label class="form-label fw-semibold text-capitalize">
                                                {{ str_replace('_', ' ', $key) }}
                                            </label>

                                            {{-- Surgeon --}}
                                            @if($key === 'surgeon')
                                                <input type="text" class="form-control" placeholder="Search Surgeon..."
                                                    wire:model.debounce.300ms="surgeonSearch" wire:input="searchSurgeon">
                                                @if(count($surgeonResults) > 0)
                                                    <ul class="list-group position-absolute w-100" style="z-index:1000; max-height:200px; overflow-y:auto;">
                                                        @foreach($surgeonResults as $doctor)
                                                            <li class="list-group-item list-group-item-action" style="cursor:pointer"
                                                                wire:click="selectSurgeon({{ $doctor->id }})">
                                                                {{ $doctor->name }} (ID: {{ $doctor->id }})
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                @if(isset($form['surgeon']) && $form['surgeon'])
                                                    <small class="text-success">{{ $form['surgeon'] }}</small>
                                                @endif

                                            {{-- Admitted under doctor --}}
                                            @elseif($key === 'admitted_under_doctor')
                                                <input type="text" class="form-control" placeholder="Search Doctor..."
                                                    wire:model.debounce.300ms="admittedDoctorSearch" wire:input="searchAdmittedDoctor">
                                                @if(count($admittedDoctorResults) > 0)
                                                    <ul class="list-group position-absolute w-100" style="z-index:1000; max-height:200px; overflow-y:auto;">
                                                        @foreach($admittedDoctorResults as $doctor)
                                                            <li class="list-group-item list-group-item-action" style="cursor:pointer"
                                                                wire:click="selectAdmittedDoctor({{ $doctor->id }})">
                                                                {{ $doctor->name }} (ID: {{ $doctor->id }})
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                @if(isset($form['admitted_under_doctor']) && $form['admitted_under_doctor'])
                                                    <small class="text-success">{{ $form['admitted_under_doctor'] }}</small>
                                                @endif

                                            {{-- Anesthesiologist --}}
                                            @elseif($key === 'anesthesiologist')
                                                <input type="text" class="form-control" placeholder="Search Doctor..."
                                                    wire:model.debounce.300ms="anesthesiologistSearch" wire:input="searchAnesthesiologist">
                                                @if(count($anesthesiologistResults) > 0)
                                                    <ul class="list-group position-absolute w-100" style="z-index:1000; max-height:200px; overflow-y:auto;">
                                                        @foreach($anesthesiologistResults as $doctor)
                                                            <li class="list-group-item list-group-item-action" style="cursor:pointer"
                                                                wire:click="selectAnesthesiologist({{ $doctor->id }})">
                                                                {{ $doctor->name }} (ID: {{ $doctor->id }})
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                @if(isset($form['anesthesiologist']) && $form['anesthesiologist'])
                                                    <small class="text-success">{{ $form['anesthesiologist'] }}</small>
                                                @endif

                                            {{-- Reference by (Marketing) --}}
                                            @elseif($key === 'reference_by')
                                                <input type="text" class="form-control" placeholder="Search Marketing..."
                                                    wire:model.debounce.300ms="referenceBySearch" wire:input="searchReferenceBy">
                                                @if(count($referenceByResults) > 0)
                                                    <ul class="list-group position-absolute w-100" style="z-index:1000; max-height:200px; overflow-y:auto;">
                                                        @foreach($referenceByResults as $marketing)
                                                            <li class="list-group-item list-group-item-action" style="cursor:pointer"
                                                                wire:click="selectReferenceBy({{ $marketing->id }})">
                                                                {{ $marketing->name }} (ID: {{ $marketing->id }})
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                @if(isset($form['reference_by']) && $form['reference_by'])
                                                    <small class="text-success">{{ $form['reference_by'] }}</small>
                                                @endif

                                            {{-- Textareas --}}
                                            @elseif(in_array($key, $textareaFields))
                                                <textarea class="form-control" rows="2" wire:model.defer="form.{{ $key }}">{{ $value }}</textarea>

                                            {{-- Date fields --}}
                                            @elseif(in_array($key, $dateFields))
                                                <input type="date" class="form-control" wire:model.defer="form.{{ $key }}" value="{{ $value }}">

                                            {{-- Gender --}}
                                            @elseif(in_array($key, $genderFields))
                                                <select class="form-control" wire:model.defer="form.{{ $key }}">
                                                    <option value="">Select</option>
                                                    <option value="male" {{ $value == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ $value == 'female' ? 'selected' : '' }}>Female</option>
                                                </select>

                                            {{-- Dropdowns --}}
                                            @elseif(in_array($key, $dropdownFields))
                                                <select class="form-control" wire:model.defer="form.{{ $key }}">
                                                    <option value="">Select</option>
                                                    @if($key === 'religion')
                                                        <option value="Islam" {{ $value=='Islam'?'selected':'' }}>Islam</option>
                                                        <option value="Hinduism" {{ $value=='Hinduism'?'selected':'' }}>Hinduism</option>
                                                        <option value="Christianity" {{ $value=='Christianity'?'selected':'' }}>Christianity</option>
                                                        <option value="Buddhism" {{ $value=='Buddhism'?'selected':'' }}>Buddhism</option>
                                                    @elseif($key === 'marrital_status')
                                                        <option value="Married" {{ $value=='Married'?'selected':'' }}>Married</option>
                                                        <option value="Unmarried" {{ $value=='Unmarried'?'selected':'' }}>Unmarried</option>
                                                    @elseif($key === 'operation_category')
                                                        <option value="General" {{ $value=='General'?'selected':'' }}>General</option>
                                                        <option value="Emergency" {{ $value=='Emergency'?'selected':'' }}>Emergency</option>
                                                    @elseif($key === 'blood_transfusion')
                                                        <option value="Yes" {{ $value=='Yes'?'selected':'' }}>Yes</option>
                                                        <option value="No" {{ $value=='No'?'selected':'' }}>No</option>
                                                    @endif
                                                </select>

                                            {{-- Default text input --}}
                                            @else
                                                <input type="text" class="form-control" wire:model.defer="form.{{ $key }}" value="{{ $value }}" placeholder="{{ ucfirst(str_replace('_',' ',$key)) }}">
                                            @endif
                                        </div>
                                    @endforeach

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100 mt-3" wire:loading.attr="disabled">
                                            <i class="fa-solid fa-floppy-disk me-1"></i> Save OT Consent
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
