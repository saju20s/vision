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
                                <div class="col-lg-9 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-semibold">Title</label>
                                        <input type="text" id="title" wire:model.defer="title" placeholder="Title"
                                            class="form-control" />                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label fw-semibold">Link</label>
                                        <input type="text" id="link" wire:model.defer="link" placeholder="Link"
                                            class="form-control" />                                        
                                    </div>


                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label for="position" class="form-label fw-semibold">Menu Position</label>
                                        <select wire:model.defer="position"
                                            class="form-control ">
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                        </select>                                        
                                    </div>
                                    <div class="mb-3">
                                         {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">                                                
                                                <img src="{{ $image->temporaryUrl() }}"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview" loading="lazy">
                                            </div>
                                        @endif
                                        <label for="image" class="form-label fw-semibold">Icon Image</label>
                                        <input type="file" id="image" wire:model="image"
                                            class="form-control fImage" />                                                                             
                                    </div>

                                    <button type="submit" class="btn btn-primary form-control my-2" wire:loading.attr="disabled">Add Link</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

</div>

