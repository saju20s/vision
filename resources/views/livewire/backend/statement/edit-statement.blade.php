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
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="affidavit_one" class="form-label fw-semibold">Statement
                                            First</label>
                                        <div wire:ignore>
                                            <textarea id="summernote_one">{{ $affidavit_one }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="affidavit_two" class="form-label fw-semibold">Statement
                                            Second</label>
                                        <div wire:ignore>
                                            <textarea id="summernote_two">{{ $affidavit_two }}</textarea>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">
                                        Update Statement
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
                $('#summernote_one').summernote({
                    placeholder: 'Write here...',
                    height: 200,
                    callbacks: {
                        onChange: function(contents) {
                            @this.set('affidavit_one', contents);
                        }
                    }
                });

                $('#summernote_two').summernote({
                    placeholder: 'Write here...',
                    height: 200,
                    callbacks: {
                        onChange: function(contents) {
                            @this.set('affidavit_two', contents);
                        }
                    }
                });
            }

            document.addEventListener('livewire:navigated', function() {
                if ($('#summernote_one').next().hasClass('note-editor')) {
                    $('#summernote_one').summernote('destroy');
                }
                if ($('#summernote_two').next().hasClass('note-editor')) {
                    $('#summernote_two').summernote('destroy');
                }
                initializeSummernote();
            });

            document.addEventListener('DOMContentLoaded', function() {
                initializeSummernote();
            });
        </script>
    @endpush




</div>
