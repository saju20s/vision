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
                                <div class="col-lg-8 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-semibold">Title</label>
                                        <textarea id="title" wire:model.defer="title" class="form-control" placeholder="Write the title here....."
                                            rows="10"></textarea>                                        
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-4 col-md-4 mb-3">
                                    <div class="mb-3">
                                        {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">
                                                <img src="{{ $image->temporaryUrl() }}"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview" loading="lazy">
                                            </div>
                                        @endif

                                        <label for="image" class="form-label fw-semibold">Slider Image (Required
                                            2000x988)</label>
                                        <input type="file" id="image" wire:model.defer="image"
                                            class="form-control fImage" />                                       
                                    </div>

                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Add Slider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
