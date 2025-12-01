<div>
    <!-- Doctor Profile Section -->
    <section class="doctor-view-section">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container mt-5">
            <div class="row g-0">
                <div class="page-start">
                    <h4>DOCTORS DETAILS</h4>
                    <h6><a href="/" wire:navigate><i class="fas fa-home i-breadcrump"></i> Home</a> <i class="fas fa-angle-right"></i>
                        <a
                            href="/all-doctors-list" wire:navigate><i class="fa-solid fa-user-doctor i-breadcrump"></i> {{ $doctor->designation ?? 'N/A' }}</a>
                        <i class="fas fa-angle-right"></i>
                        <a href="/doctor-view/{{ $doctor->id }}" wire:navigate><i class="fa-solid fa-user-doctor i-breadcrump"></i> {{ $doctor->name }}</a>
                    </h6>
                </div>

                <!-- Doctor Image Left -->
                <div class="col-md-4 text-center mb-4">
                    <div class="doctor-card shadow-sm">
                        <!-- Profile Image Section -->
                        <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('frontend/images/default-doctor.png') }}"
                            alt="{{ $doctor->name }}" class="doctor-profile-img">

                        <!-- Doctor Name and Designation Section -->
                        <div class="doc-info text-white p-3">
                            <h5 class="mb-1">{{ $doctor->name }}</h5>
                            <p class="mb-0 text-white">{{ $doctor->designation ?? 'N/A' }} <span
                                    class="text-white">({{ $doctor->specialization ?? 'N/A' }})</span></p>
                        </div>

                        <!-- Social Links Section -->
                        <div class="footer-col footer-social">
                            <h3 class="footer-title mt-3 text-center">Follow Us</h3>
                            <div class="social-links justify-content-center pb-3">
                                <a href="{{ $setting->facebook }}" target="_blank" aria-label="Facebook"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="{{ $setting->twitter }}" target="_blank" aria-label="Twitter"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="{{ $setting->youtube }}" target="_blank" aria-label="YouTube"><i
                                        class="fab fa-youtube"></i></a>
                                <a href="{{ $setting->linkedin }}" target="_blank" aria-label="LinkedIn"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Doctor Details Right -->
                <div class="col-md-8">
                    <div class="card border-0 doctor-card">
                        <div class="card-body doctor-card-body">
                            <h2 class="card-title">{{ $doctor->name }}</h2>
                            <p class="mb-1"><strong style="color:{{$setting->menu_color}}">{{ $doctor->designation ?? 'N/A' }}</strong></p>
                            <p class="mb-1 text-muted">{{ $doctor->qualification ?? 'N/A' }}</p>
                            <p><strong>Department:</strong> {{ $doctor->specialization ?? 'N/A' }}</p>

                            <hr>

                            <h5 class="mt-3">Areas of Expertise</h5>
                            <p class="text-justify">
                                {!! $doctor->note !!}
                            </p>

                            <div class="mt-3">
                                <a href="tel:{{ $setting->cphone }}" class="btn btn-primary me-2">
                                    <i class="bi bi-telephone"></i> Call
                                </a>
                                <a href="mailto:{{ $setting->email }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-envelope"></i> Email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Doctors -->
            <div class="row mt-5">
                <div class="col-12">
                    <h1 class="text-primary mb-1 fw-bold three-d-text subheading mb-3">Related Doctors
                        ({{ $doctor->specialization }})</h1>
                </div>

                @forelse($relatedDoctors as $related)
                    <div class="col-md-3 mb-4">
                        <div class="card border-1 shadow-sm h-100 text-center p-3 position-relative overflow-hidden">
                            <!-- Doctor Image (Square) -->
                            <div class="position-relative mb-3">
                                <img src="{{ $related->image ? asset('storage/' . $related->image) : asset('frontend/images/default-doctor.png') }}"
                                    alt="{{ $related->name }}" class="mx-auto d-block doctor-related-img">
                            </div>

                            <!-- Doctor Info -->
                            <div class="card-body p-2">
                                <h6 class="fw-semibold mb-1">{{ $related->name }}</h6>
                                <p class="text-muted mb-1 small">{{ $related->qualification ?? 'N/A' }}</p>

                                <!-- Designation & Specialization Badges -->
                                <div class="mb-2">
                                    <span class="badge bg-primary me-1">{{ $related->designation ?? 'N/A' }}</span>
                                    <span
                                        class="badge bg-info text-dark">{{ $related->specialization ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="button text-center mb-1">
                                <a href="{{ url('/doctor-view/' . $related->id) }}"
                                    class="btn btn-sm btn-primary mt-2 w-100" wire:navigate>
                                    Profile
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">No related doctors found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <hr>
</div>
