<div>
    <!-- Patient Details Section -->
    <section class="department-details">
        <!-- Banner -->
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>

        <!-- Content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-start">
                        <h4>TESTEMONIAL DETAILS</h4>
                        <h6><a href="/" wire:navigate><i class="fas fa-home i-breadcrump"></i> Home</a> <i
                                class="fas fa-angle-right"></i>
                            <a href="/Testimonial-view/{{ $patient->id }}" wire:navigate><i
                                    class="fas fa-blog i-breadcrump"></i>
                                Testmonial</a>
                        </h6>
                    </div>
                </div>
                <!-- Image Left -->
                @if ($patient->image)
                    <div class="col-lg-5">
                        <div class="shadow-sm">
                            <img src="{{ asset('storage/' . $patient->image) }}" alt="{{ $patient->name }}"
                                class="w-100 d-block patient-testmonial-image">
                        </div>
                    </div>
                @endif

                <!-- Details Right -->
                <div class="col-lg-7">
                    <h2 class="fw-bold text-primary mb-">
                        {{ $patient->name }}
                    </h2>
                    <h5 class="text-secondary mb-2">
                        Age: <span class="fw-semibold">{{ $patient->age }} years</span>
                    </h5>
                    <div class="bg-light p-4 rounded-3 shadow-sm">
                        <p class="mb-0 text-dark testmonial-description">
                            {!! $patient->note !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
</div>
