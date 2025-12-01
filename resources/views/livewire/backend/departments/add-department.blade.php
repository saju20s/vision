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
                                        <input type="text" id="title" wire:model.defer="title"
                                            class="form-control" placeholder="Title" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label fw-semibold">Description</label>
                                        <div wire:ignore>
                                            <textarea id="summernote">{{ $description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label for="color" class="form-label fw-semibold">Color</label>
                                        <input type="color" id="color" wire:model.defer="color"
                                            class="form-control" placeholder="color" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="icon" class="form-label fw-semibold">Icon</label>
                                        <div class="input-group">
                                            <input type="text" id="icon" wire:model="icon" class="form-control"
                                                placeholder="Click to select icon" readonly data-bs-toggle="modal"
                                                data-bs-target="#iconPickerModal" />
                                            <span class="input-group-text">
                                                @if ($icon)
                                                    <i class="{{ $icon }}"></i>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">
                                                <img src="{{ $image->temporaryUrl() }}" loading="lazy"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview">
                                            </div>
                                        @endif

                                        <label for="image" class="form-label fw-semibold">Thumbnail Image</label>
                                        <input type="file" id="image" wire:model="image"
                                            class="form-control fImage" />
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Add Department</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Livewire 3 Modal -->
    <div wire:ignore.self class="modal fade" id="iconPickerModal" tabindex="-1" aria-labelledby="iconPickerLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Select an Icon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        @foreach ($this->icons as $iconClass)
                            <div class="col-2 text-center">
                                <div class="icon-item border rounded p-3" style="cursor:pointer;"
                                    wire:click="selectIcon('{{ $iconClass }}')" data-bs-dismiss="modal">
                                    <i class="{{ $iconClass }} fa-2x"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

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
