<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="update">
                            <div class="col-12">
                                <div class="my-3">
                                    <label>Test Category Name</label>
                                    <input type="text" wire:model.defer="test_category_name" class="form-control"
                                        placeholder="Test Category Name">
                                </div>
                            </div>

                            {{-- যদি Laboratory হয় --}}
                            @if ($investigation->department === 'laboratory')
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
                                            <div class="row mb-2 align-items-center" data-index="{{ $index }}">

                                                {{-- Drag Handle --}}
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

                                                {{-- All buttons at right --}}
                                                <div class="col-lg-2 d-flex gap-2">
                                                    <button type="button" class="btn btn-success"
                                                        wire:click="addFormField">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>

                                                    @if ($index > 0)
                                                        <button type="button" class="btn btn-danger"
                                                            wire:click="removeFormField({{ $index }})">
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
                            @if ($investigation->department === 'radiology')
                                <hr class="my-4">
                                <h5>X-Ray Form</h5>
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

                            @if ($investigation->department === 'ultrasonography')
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

                                                {{-- Drag Handle --}}
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
                                                        wire:click="addUSGFormField">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>

                                                    @if ($index > 0)
                                                        <button type="button" class="btn btn-danger"
                                                            wire:click="removeUSGFormField({{ $index }})">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                {{-- Impression field outside the loop --}}
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label>Impression</label>
                                        <textarea wire:model.defer="usgFormImpression" class="form-control" rows="5"
                                            placeholder="Enter overall USG impression"></textarea>
                                    </div>
                                </div>
                            @endif


                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
