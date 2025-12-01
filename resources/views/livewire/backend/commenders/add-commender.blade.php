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
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" id="name" wire:model.defer="name" placeholder="Name"
                                            class="form-control" />                                        
                                    </div>

                                    <div class="mb-3">
                                        <label for="message" class="form-label fw-semibold">Message</label>
                                        <div wire:ignore>
                                            <textarea id="summernote">{{ $message }}</textarea>
                                        </div>                                        
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label fw-semibold">Designation</label>
                                        <input type="text" id="designation" wire:model.defer="designation"
                                            class="form-control" />                                        
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label fw-semibold">Address</label>
                                        <input type="text" id="address" wire:model.defer="address"
                                            class="form-control" />                                        
                                    </div>


                                    <div class="mb-3">
                                        {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">
                                                <img src="{{ $image->temporaryUrl() }}"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview" loading="lazy">
                                            </div>
                                        @endif
                                        <label for="image" class="form-label fw-semibold">Commander Image</label>
                                        <input type="file" id="image" wire:model="image"
                                            class="form-control fImage" />                                       
                                    </div>

                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Add Commander</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function initializeSummernote() {
                $('#summernote').summernote({
                    placeholder: 'Write here...',
                    height: 200,
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('message', contents);
                        }
                    }
                });
            }

            document.addEventListener('livewire:navigated', function() {
                if ($('#summernote').next().hasClass('note-editor')) {
                    $('#summernote').summernote('destroy');
                }
                initializeSummernote();
            });

            document.addEventListener('DOMContentLoaded', function() {
                initializeSummernote();
            });
        </script>
    @endpush




</div>
