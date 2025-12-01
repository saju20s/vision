<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <a href="{{ route('add.report', ['id' => $billId]) }}" class="btn bg-success-light mr-2"
                            wire:navigate>
                            <i class="fa-solid fa-arrow-left"></i> Back
                        </a>
                        <form wire:submit.prevent="update">
                            <div class="col-12">
                                <div class="my-3">
                                    <label>Test Category Name</label>
                                    <input type="text" wire:model.defer="test_category_name" class="form-control"
                                        placeholder="Test Category Name">
                                </div>
                            </div>

                            {{-- Search Investigation --}}
                            <div class="col-12 mb-3" style="position: relative;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Investigation"
                                        wire:model.defer="searchInvestigation">
                                    <button type="button" class="btn btn-primary" wire:click="searchInvestigations">
                                        Search
                                    </button>
                                </div>

                                @if (count($investigationList) > 0)
                                    <ul class="list-group position-absolute"
                                        style="z-index: 100; width: 100%; top: 38px;">
                                        @foreach ($investigationList as $inv)
                                            <li class="list-group-item list-group-item-action"
                                                wire:click="setInvestigation({{ $inv['id'] }})"
                                                style="cursor: pointer;">
                                                {{ $inv['test_name'] }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            {{-- যদি Laboratory হয় --}}
                            @if ($department === 'laboratory')
                                <div x-data x-init="Sortable.create($refs.testList, {
                                    animation: 150,
                                    handle: '.drag-handle',
                                    onEnd: function(evt) {
                                        let order = Array.from($refs.testList.children).map(el => el.getAttribute('data-index'));
                                        @this.call('reorderTestForms', order);
                                    }
                                });">
                                    <div x-ref="testList">
                                        @foreach ($testForms as $index => $form)
                                            <div class="row mb-2 align-items-center" data-index="{{ $index }}"
                                                wire:key="test-form-{{ $index }}-{{ $form['parameter_name'] ?? '' }}">
                                                <div class="col-auto drag-handle d-flex align-items-center"
                                                    style="cursor: grab;">
                                                    <i class="fa-solid fa-bars text-secondary"></i>
                                                </div>

                                                <div class="col-lg-3">
                                                    <input type="text"
                                                        wire:model.defer="testForms.{{ $index }}.parameter_name"
                                                        class="form-control" placeholder="Test Parameter Name" />
                                                </div>

                                                <div class="col-lg-2">
                                                    <input type="text"
                                                        wire:model.defer="testForms.{{ $index }}.result"
                                                        class="form-control" placeholder="Test Result" />
                                                </div>

                                                <div class="col-lg-2">
                                                    <input type="text"
                                                        wire:model.defer="testForms.{{ $index }}.normal_value"
                                                        class="form-control" placeholder="Normal Value" />
                                                </div>

                                                <div class="col-lg-2">
                                                    <input type="text"
                                                        wire:model.defer="testForms.{{ $index }}.unit"
                                                        class="form-control" placeholder="Unit (e.g. mg/dL)" />
                                                </div>

                                                <div class="col-lg-2 d-flex gap-2">
                                                    <button type="button" class="btn btn-success"
                                                        wire:click="addFormField" style="height: 38px;">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>

                                                    @if ($index > 0)
                                                        <button type="button" class="btn btn-danger"
                                                            wire:click="removeFormField({{ $index }})"
                                                            style="height: 38px;">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- যদি Radiology হয় --}}
                            @if ($department === 'radiology')
                                <hr class="my-4">
                                <div class="radio d-flex gap-1 justify-content-between">
                                    <h5>X-Ray Form</h5> <label>(Line Break e.g: <span class="text-danger">enter or ,,
                                        </span>)</label>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#symbolModal">
                                        <i class="fa-solid fa-omega"></i> Symbol
                                    </button>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 mb-2">
                                        <label>Finding</label>
                                        <textarea wire:model.defer="xrayForm.finding" class="form-control" rows="8" placeholder="Enter X-Ray findings"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Comment</label>
                                        <textarea wire:model.defer="xrayForm.comment" class="form-control" rows="3" placeholder="Enter X-Ray comments"></textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- যদি Ultrasonography হয় --}}
                            @if ($department === 'ultrasonography')
                                <div x-data x-init="Sortable.create($refs.usgList, {
                                    animation: 150,
                                    handle: '.drag-handle',
                                    onEnd: function(evt) {
                                        let order = Array.from($refs.usgList.children).map(el => el.getAttribute('data-index'));
                                        @this.call('reorderUSGForm', order);
                                    }
                                });">
                                    <div x-ref="usgList">
                                        @foreach ($usgForm as $index => $form)
                                            <div class="row mb-3 align-items-start" data-index="{{ $index }}">
                                                <div class="col-auto drag-handle d-flex align-items-start pt-2"
                                                    style="cursor: grab;">
                                                    <i class="fa-solid fa-bars text-secondary"></i>
                                                </div>

                                                <div class="col-lg-4">
                                                    <input type="text"
                                                        wire:model.defer="usgForm.{{ $index }}.parameter_name"
                                                        class="form-control" placeholder="Test Parameter Name" />
                                                </div>

                                                <div class="col-lg-5">
                                                    <textarea wire:model.defer="usgForm.{{ $index }}.result" class="form-control" rows="4"
                                                        placeholder="Enter USG Report"></textarea>
                                                </div>

                                                <div class="col-lg-2 d-flex gap-2">
                                                    <button type="button" class="btn btn-success"
                                                        wire:click="addUSGFormField" style="height: 38px;">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>

                                                    @if ($index > 0)
                                                        <button type="button" class="btn btn-danger"
                                                            wire:click="removeUSGFormField({{ $index }})"
                                                            style="height: 38px;">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Impression --}}
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label>Impression</label>
                                        <textarea wire:model.defer="usgFormImpression" class="form-control" rows="5"
                                            placeholder="Enter overall USG impression"></textarea>
                                    </div>
                                </div>
                            @endif


                            <button type="submit" class="btn btn-primary mt-3">Save Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div wire:ignore.self class="modal fade" id="symbolModal" tabindex="-1" aria-labelledby="symbolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="symbolModalLabel">
                    <i class="fa-solid fa-omega"></i> Report Symbols
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="d-flex flex-wrap gap-2">
                    @php
                        $symbols = [
                            '°', '±', '↑', '↓', 'µ', '²', '³', '→', '←', '↔', '≠', '≈', '≤', '≥', '√', '∞', '÷',
                            '×', 'Ω', 'α', 'β', 'γ', 'δ', 'λ', 'π', 'σ', 'θ', 'φ', 'Δ', 'Σ', '∑', '∂', '∫',
                            '≅', '∠', '⊕', '⊗', '♀', '♂','✔️','❌','🫁','%',
                        ];
                    @endphp

                    @foreach ($symbols as $symbol)
                        <button type="button" class="btn btn-outline-secondary symbol-btn"
                            data-symbol="{{ $symbol }}">{{ $symbol }}</button>
                    @endforeach
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

</div>


@push('scripts')
<script>
    // Livewire DOM update হলে modal event হারাবে, তাই পুনরায় bind করতে হবে
    document.addEventListener('livewire:navigated', initSymbolButtons);
    document.addEventListener('livewire:load', initSymbolButtons);

    function initSymbolButtons() {
        document.querySelectorAll('.symbol-btn').forEach(button => {
            button.removeEventListener('click', copySymbol); // আগের listener remove করো
            button.addEventListener('click', copySymbol);
        });
    }

    function copySymbol() {
        const symbol = this.getAttribute('data-symbol');
        navigator.clipboard.writeText(symbol);

        this.classList.add('btn-success');
        this.classList.remove('btn-outline-secondary');
        setTimeout(() => {
            this.classList.remove('btn-success');
            this.classList.add('btn-outline-secondary');
        }, 700);

        Livewire.dispatch('toastr:success', { message: `Symbol "${symbol}" copied!` });
    }
</script>
@endpush
