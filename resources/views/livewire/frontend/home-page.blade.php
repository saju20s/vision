<div>
    <section class="slider-section">
        <div class="container-fluid slider-box">
            <div class="content">
                <div id="slide_wrap">
                    <ul class="slider-ul-sec">
                        @foreach ($slider as $slide)
                            <li data-srcset="{{ asset('storage/' . $slide->image) }}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="doctor-section py-5">
        <div class="container">
            <h1 class="text-center text-primary mb-4 fw-bold three-d-text">Doctors Team</h1>           

            <!-- Splide slider -->
            <div id="doctors-slider" class="splide mb-3">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- Doctor Card -->
                        @foreach ($latestDoctors as $doctor)
                            <li class="splide__slide">
                                <div class="card with-underline shadow-sm text-center mx-auto mb-3 doctor-slider-div">
                                    <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('frontend/images/default.png') }}"
                                        class="card-img-top doctor-img mx-auto mt-4" alt="{{ $doctor->name }}" />
                                    <div class="card-body">
                                        <h5 class="with-line"></h5>
                                        <h5 class="card-title text-primary with-line">{{ $doctor->name }}</h5>
                                        <p class="card-text with-line">{{ $doctor->designation }}</p>
                                        <p class="card-text with-line">{{ $doctor->specialization }}</p>                                        
                                    </div>
                                    <div class="button text-center mb-1">
                                        <a href="{{ url('/doctor-view/' . $doctor->id) }}" class="btn btn-primary"
                                            wire:navigate>Profile</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                        <!-- Add more slides here -->
                    </ul>
                </div>
            </div>
            <!-- Splide slider -->
            <div id="doctors-slider" class="splide doctor-two">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- Doctor Card -->
                        @foreach ($randomDoctors as $doctor)
                            <li class="splide__slide">
                                <div class="card with-underline shadow-sm text-center mx-auto mb-3 doctor-slider-div">
                                    <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('frontend/images/default.png') }}"
                                        class="card-img-top doctor-img mx-auto mt-4" alt="{{ $doctor->name }}" />
                                    <div class="card-body">
                                        <h5 class="with-line"></h5>
                                        <h5 class="card-title text-primary with-line">{{ $doctor->name }}</h5>
                                        <p class="card-text with-line">{{ $doctor->designation }}</p>
                                        <p class="card-text with-line">{{ $doctor->specialization }}</p>

                                    </div>
                                    <div class="button text-center mb-1">
                                        <a href="{{ url('/doctor-view/' . $doctor->id) }}" class="btn btn-primary"
                                            wire:navigate>Profile</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <!-- Add more slides here -->
                    </ul>
                </div>
            </div>
            <div class="view text-center mt-3">
                <a href="/all-doctors-list" class="btn btn-primary text-center mx-auto d-inline-flex align-items-center gap-1" wire:navigate>
                    View All
                </a>
            </div>
        </div>
    </section>

    <section class="department-section py-5">
        <div class="container">
            <h1 class="text-center text-primary mb-4 fw-bold three-d-text">Department</h1>
            <div class="row">
                @foreach ($departments as $dept)
                    <div class="col-md-3 col-sm-6">
                        <div class="department-card">
                            <div class="icon-wrapper" style="background-color: {{ $dept->color }}">
                                <i class="{{ $dept->icon ?? 'fas fa-hospital' }}"></i>
                            </div>
                            <h3>{{ $dept->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($dept->description), 80) }}</p>
                            <div class="button text-center">
                                <a href="{{ url('/department-view/' . $dept->id) }}"
                                    class="btn btn-primary text-center mx-auto d-inline-flex align-items-center gap-1"
                                    wire:navigate>Read More <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="unique-section section-padding py-5">
        <div class="container">
            <h1 class="text-center text-primary mb-4 fw-bold three-d-text">Article & News</h1>
            <div class="row g-4">
                @foreach ($latestBlogs as $blog)
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
            </div>
            <div class="view text-center mt-5">
                <a href="/blogs" class="btn btn-primary text-center mx-auto d-inline-flex align-items-center gap-1" wire:navigate>
                    View All
                </a>
            </div>
        </div>
    </section>

    <section class="testimonial-section py-5">
        <h1 class="text-center text-primary mb-4 fw-bold three-d-text">Patient Testimonial</h1>

        <div id="doctors-slider" class="splide mb-3 patient-testmonial">
            <div class="splide__track">
                <ul class="splide__list">

                    @foreach ($patients as $patient)
                        @if (!empty(trim(strip_tags($patient->note))))
                            <li class="splide__slide">
                                <div class="card with-underline shadow-sm text-center h-100 mx-auto testmonial-slider-div">

                                    <!-- Image with quote badge -->
                                    <div class="card-image-wrapper position-relative pt-4">
                                        <img src="{{ $patient->image ? asset('storage/' . $patient->image) : 'No Image' }}"
                                            alt="{{ $patient->name }}" class="testimonial-img">
                                        <div class="quote-badge"><i class="fas fa-quote-left" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <!-- Testimonial Text -->
                                    <div class="card-body p-3">
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($patient->note), 150, '...') ?? 'কোন মন্তব্য নেই' }}
                                        </p>

                                        <span class="testmonial-slider-span">
                                            {{ $patient->name }}
                                        </span>

                                        @php
                                            $age = $patient->date_of_birth
                                                ? \Carbon\Carbon::parse($patient->date_of_birth)->age
                                                : null;
                                        @endphp

                                        <span class="testmonial-slider-subspan">
                                            বয়সঃ {{ $age ? $age : 'N/A' }}
                                        </span>

                                    </div>
                                    <div class="button text-center mb-1">
                                        <a href="{{ url('/Testimonial-view/' . $patient->id) }}"
                                            class="btn btn-primary text-center mx-auto d-inline-flex align-items-center gap-1"
                                            wire:navigate>
                                            বিস্তারিত <i class="fas fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        </div>
    </section>

    <section class="map-sectioin">
        <div class="map">
            <iframe src="{{ $setting->map }}" width="100%" height="400" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

</div>
