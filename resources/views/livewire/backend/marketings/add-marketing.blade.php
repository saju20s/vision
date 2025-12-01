<div>


    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-6 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" id="name" wire:model.defer="name"
                                            class="form-control" placeholder="Name" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label fw-semibold">Phone</label>
                                        <input type="text" id="phone" wire:model.defer="phone"
                                            class="form-control" placeholder="Phone" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label fw-semibold">Age</label>
                                        <input type="text" id="age" wire:model.defer="age" class="form-control"
                                            placeholder="Age" />
                                    </div>

                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-6 col-md-4 mb-3">

                                    <div class="mb-3">
                                        <label for="address" class="form-label fw-semibold">Address</label>
                                        <input type="text" id="address" wire:model.defer="address"
                                            class="form-control" placeholder="address" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="gender" class="form-label fw-semibold">Gender</label>
                                        <select wire:model.defer="gender" id="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">
                                                <img src="{{ $image->temporaryUrl() }}" loading="lazy"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview">
                                            </div>
                                        @endif

                                        <label for="image" class="form-label fw-semibold">Thumbnail Image(736x736)</label>
                                        <input type="file" id="image" wire:model="image"
                                            class="form-control fImage" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Add Marketing</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
