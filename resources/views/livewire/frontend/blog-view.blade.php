<div>
    <!-- Blog Content -->
    <section class="blog-content">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-start">
                        <h4>BLOG DETAILS</h4>
                        <h6><a href="/" wire:navigate><i class="fas fa-home i-breadcrump"></i> Home</a> <i
                                class="fas fa-angle-right"></i>
                            <a href="/blog-view/{{$blog->id}}" wire:navigate><i
                                    class="fas fa-blog i-breadcrump"></i>
                                Blog</a>
                        </h6>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row g-4 align-items-start">
                        @if ($blog->image)
                            <div class="col-lg-5 col-md-12">
                                <div class="blog-image shadow-sm rounded overflow-hidden h-100">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                        class="img-fluid w-100 h-100 blog-img">
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-7 col-md-12">
                            <div class="p-4 bg-white rounded shadow-sm h-100 d-flex flex-column">

                                <h1 class="blog-title text-dark fw-bold mb-3">
                                    {{ $blog->title }}
                                </h1>
                                <div class="text-muted mb-4">
                                    @if ($blog->author_name)
                                        <strong>{{ $blog->author_name }}</strong> |
                                    @endif
                                    {{ $blog->category->name }} |
                                    {{ $blog->created_at ? $blog->created_at->format('F j, Y') : '' }}
                                </div>

                                <div class="blog-description">
                                    {!! $blog->description !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts (Below Blog Details) -->
                    <div class="related-posts mt-5">
                        <h1 class="text-primary mb-1 fw-bold three-d-text subheading">Related Posts</h1>
                        <hr>
                        <div class="row g-3">
                            @forelse($relatedPosts as $related)
                                <div class="col-md-4 col-12">
                                    <a href="{{ url('/blog-view/' . $related->id) }}"
                                        class="text-decoration-none text-dark" wire:navigate>
                                        <div class="card h-100 shadow-sm border-0 overflow-hidden position-relative">
                                            <img src="{{ $related->image ? asset('storage/' . $related->image) : asset('frontend/images/top-img.png') }}"
                                                class="card-img-top" alt="{{ $related->title }} blog-related-img">

                                            <span
                                                class="position-absolute top-2 start-2 badge bg-primary text-white px-2 py-1">
                                                {{ $related->category->name ?? '' }}
                                            </span>

                                            <div class="card-body p-2">
                                                <h6 class="card-title mb-0">{{ $related->title }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p class="text-muted">No related posts found.</p>
                            @endforelse
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>
    <hr>
</div>
