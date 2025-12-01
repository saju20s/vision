<div>


    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="store">
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-6 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="test_name" class="form-label fw-semibold">Test Name</label>
                                        <input type="text" id="test_name" wire:model.defer="test_name"
                                            class="form-control" placeholder="Test Name" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="sell_price" class="form-label fw-semibold">Sell Price</label>
                                        <input type="text" id="sell_price" wire:model.defer="sell_price"
                                            class="form-control" placeholder="Sell Price" />
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-6 col-md-4 mb-3">

                                    <div class="mb-3">
                                        <label for="department" class="form-label fw-semibold">Department</label>
                                        <select wire:model.defer="department" id="department" class="form-control">
                                            <option value="">Select the department name</option>
                                            <option value="laboratory">Laboratory</option>
                                            <option value="radiology">Radiology</option>
                                            <option value="cardiology">Cardiology</option>
                                            <option value="ultrasonography">Ultrasonography</option>
                                            <option value="surgery_charge">Surgery Charge</option>
                                            <option value="accessories">Accessories</option>
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Add Test</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
