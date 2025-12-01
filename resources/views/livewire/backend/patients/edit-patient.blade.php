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
                                    <div class="mb-3">
                                        <label for="gender" class="form-label fw-semibold">Gender</label>
                                        <select wire:model.defer="gender" id="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label fw-semibold">Types</label>
                                        <select wire:model.defer="type" id="type" class="form-control">
                                            <option value="patient">Patient</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>

                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-6 col-md-4 mb-3">

                                    @if ($oldImage)
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Old Image</label><br>
                                            <img class="img-fluid rounded shadow image-preview" alt="Preview"
                                                loading="lazy" src="{{ asset('storage/' . $oldImage) }}">
                                        </div>
                                    @else
                                        <!-- This section will not be shown if there is no image -->
                                    @endif


                                    <div class="mb-3">
                                        {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">
                                                <img src="{{ $image->temporaryUrl() }}"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview"
                                                    loading="lazy">
                                            </div>
                                        @endif

                                        <label for="image" class="form-label fw-semibold">Thumbnail Image(736x736)</label>
                                        <input type="file" id="image" wire:model="image"
                                            class="form-control fImage" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label fw-semibold">Address</label>
                                        <textarea id="address" wire:model.defer="address" class="form-control" placeholder="Write the address here....."
                                            rows="5"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="note" class="form-label fw-semibold">Note for Testmonial</label>
                                        <div wire:ignore>
                                            <textarea id="summernote">{{ $note }}</textarea>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Update Patient</button>
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
                            @this.set('note', contents);
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
