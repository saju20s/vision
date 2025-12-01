<div>
    <section class="video-section">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12">
                    <h1 class="text-primary mb-3 fw-bold subheading">Videos</h1>
                    <hr>
                </div>
                @foreach ($datas as $video)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow border-0 d-flex flex-column video-page">
                            <iframe src="{{ $video->link }}" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
        <hr>
    </section>


</div>
