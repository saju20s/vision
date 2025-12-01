<div>
    <section class="pages-section">
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
                        <h4>PAGES DETAILS</h4>
                        <h6><a href="/" wire:navigate> <i class="fas fa-home i-breadcrump"></i> Home</a> <i
                                class="fas fa-angle-right"></i>
                            <a href="/page-view/{{ $page->slug }}" wire:navigate><i class="fa-solid fa-pager i-breadcrump"></i>
                                Page</a>
                        </h6>
                    </div>
                </div>

                <div class="col-lg-12 mt-3">
                    {{-- If image exists --}}
                    @if ($page?->image)
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('storage/' . $page->image) }}"
                                class="img-fluid rounded shadow-sm border w-100 pages-img" alt="{{ $page->title }}"
                                loading="lazy">
                        </div>
                    @endif
                    <p>{!! $page->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <hr>
</div>
