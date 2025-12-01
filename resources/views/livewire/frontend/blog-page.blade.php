<div>
    <section class="blog-section">
        <!-- Banner -->
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 my-4">
                    <h1 class="text-primary mb-1 fw-bold three-d-text subheading">Blogs</h1>
                    <hr>
                </div>
                <!-- Blog Item -->
                @foreach ($datas as $blog)
                    <div class="col-12 col-sm-6 col-md-3 d-flex">
                        <div class="unique-card d-flex flex-column w-100">
                            <div class="card-header">
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                        class="img-fluid" />
                                @else
                                    <img src="{{ asset('default/blog.jpg') }}" alt="No Image" class="img-fluid" />
                                @endif
                                <span class="category-badge">{{ $blog->category->name ?? 'Uncategorized' }}</span>
                            </div>
                            <div class="card-body flex-grow-1">
                                <h3>{{ \Illuminate\Support\Str::limit($blog->title, 40) }}</h3>
                                <p>{!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 80) !!}</p>
                                <div class="card-meta">
                                    <span>📅 {{ $blog->created_at->format('d M Y') }}</span>
                                    <span>👤 {{ $blog->author_name ?? 'Admin' }}</span>
                                    <span>👁️ {{ $this->formatViews($blog->views ?? 0) }} views</span>
                                </div>
                            </div>
                            <div class="button text-center mb-3">
                                <a href="{{ url('/blog-view/' . $blog->id) }}"
                                    class="btn btn-primary text-center mx-auto d-inline-flex align-items-center gap-1"
                                    wire:click="incrementView({{ $blog->id }})" wire:navigate>
                                    Read More <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $datas->links() }}
            </div>
        </div>
    </section>
    <hr>
</div>
