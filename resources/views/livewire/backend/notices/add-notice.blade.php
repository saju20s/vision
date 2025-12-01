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
                                        <label for="description" class="form-label fw-semibold">Description</label>
                                        <div wire:ignore>
                                            <textarea id="summernote"></textarea>
                                        </div>
                                        <input type="hidden" wire:model.defer="description" />                                        
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label for="type" class="form-label fw-semibold">Select</label>
                                        <select wire:model.defer="type"
                                            class="form-control">
                                            <option value="notice">Notice</option>
                                            <option value="apa">APA</option>
                                            <option value="noc">NOC</option>
                                        </select>                                        
                                    </div>

                                    <div class="mb-3">
                                        <label for="authority" class="form-label fw-semibold">Issuing Authority</label>
                                        <input type="text" id="authority" wire:model.defer="authority" placeholder="Authority Name"
                                            class="form-control" />                                        
                                    </div>

                                    <div class="mb-3">
                                        {{-- File Preview --}}
                                        @if ($file)
                                            @if (str_starts_with($file->getMimeType(), 'image/'))
                                                <div class="mb-2">
                                                    <img src="{{ $file->temporaryUrl() }}" alt="Preview" loading="lazy"
                                                        class="img-fluid rounded shadow image-preview" />
                                                </div>
                                            @else
                                                <div class="alert alert-secondary mt-2">
                                                    File selected: <strong>{{ $file->getClientOriginalName() }}</strong>
                                                </div>
                                            @endif
                                        @endif

                                        <label for="file" class="form-label fw-semibold">File Image / PDF</label>
                                        <input type="file" id="file" wire:model="file"
                                            class="form-control fImage" />                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">
                                        Add Notice
                                    </button>
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
                            @this.set('description', contents);
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
