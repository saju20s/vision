<div>
    <section class="blog-section">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 mt-4">
                    <div class="page-start">
                        <h4>PACKAGES DETAILS</h4>
                        <h6><a href="/" wire:navigate><i class="fas fa-home i-breadcrump"></i> Home</a> <i
                                class="fas fa-angle-right"></i>
                            <a href="/view-notice/{{$notice->id}}" wire:navigate><i
                                    class="fa-solid fa-gift i-breadcrump"></i>
                                Package</a>
                        </h6>
                    </div>
                </div>

                <div class="col-lg-12">
                    {{-- If image exists --}}
                    @if ($notice?->image)
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('storage/' . $notice->image) }}"
                                class="img-fluid rounded shadow-sm border view-notice-img" alt="{{ $notice->title }}"
                                loading="lazy">
                        </div>

                        {{-- Show image description if available --}}
                        @if ($notice?->description)
                            <div class="view-notice-single">
                                <p class="text-light">{!! $notice->description !!}</p>
                            </div>
                        @endif

                        {{-- Download Image Button --}}
                        <div class="text-start">
                            <a href="{{ asset('storage/' . $notice->image) }}" class="btn btn-sm bg-success-light mr-2"
                                download>
                                <i class="fas fa-download"></i> Download Image
                            </a>
                        </div>

                        {{-- Else if file exists --}}
                    @elseif ($notice?->file)
                        @php
                            $fileExtension = pathinfo($notice->file, PATHINFO_EXTENSION);
                        @endphp

                        @if (strtolower($fileExtension) === 'pdf')
                            {{-- Show PDF full page --}}
                            <div class="position-relative">
                                <iframe id="pdfFrame" src="{{ asset('storage/' . $notice->file) }}"
                                    class="view-notice-iframe"></iframe>


                                {{-- Show image description if available --}}
                                @if ($notice?->description)
                                    <div class="text-center mb-3 view-notice-single">
                                        <p class="text-light">{!! $notice->description !!}</p>
                                    </div>
                                @endif

                                <div class="text-start my-3">
                                    <button class="btn view-button" onclick="openFullScreen()"><i
                                            class="fas fa-expand"></i> Full Screen</button>
                                </div>
                            </div>


                            {{-- Download PDF Button --}}
                            <div class="text-start my-3">
                                <a href="{{ asset('storage/' . $notice->file) }}"
                                    class="btn btn-sm bg-success-light mr-2" download>
                                    <i class="fas fa-download"></i> Download PDF
                                </a>
                            </div>
                        @else
                            {{-- Other file types --}}
                            <div class="text-start mt-4">
                                <a href="{{ asset('storage/' . $notice->file) }}"
                                    class="btn btn-sm bg-success-light mr-2" download>
                                    <i class="fas fa-download"></i> Download File
                                </a>
                            </div>
                        @endif
                    @else
                        <p class="text-center text-muted">No image or file available.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <hr>
</div>


<script>
    function openFullScreen() {
        let iframe = document.getElementById('pdfFrame');
        if (iframe.requestFullscreen) {
            iframe.requestFullscreen();
        } else if (iframe.mozRequestFullScreen) { // Firefox
            iframe.mozRequestFullScreen();
        } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari, Opera
            iframe.webkitRequestFullscreen();
        } else if (iframe.msRequestFullscreen) { // IE/Edge
            iframe.msRequestFullscreen();
        }
    }
</script>
