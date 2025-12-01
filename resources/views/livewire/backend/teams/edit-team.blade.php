<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">                       
                        <form wire:submit.prevent="update" enctype="multipart/form-data">
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-9 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" wire:model.defer="name" placeholder="Name"
                                            class="form-control" />                                       
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" id="phone" wire:model.defer="phone" placeholder="Phone"
                                            class="form-control" />                                      
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" wire:model.defer="email" placeholder="Email"
                                            class="form-control" />                                        
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" id="designation" wire:model.defer="designation" placeholder="Designation"
                                            class="form-control">                                        
                                    </div>

                                    <div class="mb-3">
                                        <label for="reg_id" class="form-label">Reg. No</label>
                                        <input type="text" id="reg_id" wire:model.defer="reg_id" placeholder="Reg. No"
                                            class="form-control">                                       
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Old Image</label><br>
                                        @if ($oldImage)
                                            <img class="img-fluid rounded shadow image-preview" alt="Preview"
                                                src="{{ asset('storage/' . $oldImage) }}" loading="lazy">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">                                                
                                                <img src="{{ $image->temporaryUrl() }}"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview" loading="lazy">
                                            </div>
                                        @endif
                                        
                                        <label for="image" class="form-label">Thumbnail Image</label>
                                        <input type="file" id="image" wire:model="image"
                                            class="form-control fImage" />                                                                               
                                    </div>

                                    <button type="submit" class="btn btn-primary form-control my-2" wire:loading.attr="disabled">Update Team</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
