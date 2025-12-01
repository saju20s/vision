<div>
    <section class="contact-section-vision">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container">
            <div class="row g-4">
                <!-- Title -->
                <div class="col-12">
                    <h1 class="text-primary mb-3 fw-bold subheading">Contact Us</h1>
                    <hr>
                </div>

                <!-- Map -->
                <div class="col-12 my-3">
                    <div class="map shadow rounded overflow-hidden">
                        <iframe src="{{ $setting->map }}" width="100%" height="400" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row g-3">
                        <!-- Contact Details -->
                        <div class="col-lg-5 my-4 bg-light shadow p-4 rounded d-flex flex-column">
                            <h6 class="contact-title mb-4 fw-bold text-muted">You are welcome to contact us for any
                                vision diagnostics-related questions</h6>

                            <div class="contact-details d-flex align-items-center my-3 p-3 rounded shadow-sm">
                                <div class="contact-icon me-3">
                                    <i class="fa-solid fa-location-dot fs-4 text-primary"></i>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">Address</h5>
                                    <p class="mb-0 text-muted">{!! str_replace(',,', '<br>', e($setting->address)) !!}</p>
                                </div>
                            </div>

                            <div class="contact-details d-flex align-items-center my-3 p-3 rounded shadow-sm">
                                <div class="contact-icon me-3">
                                    <i class="fa-solid fa-phone-volume fs-4 text-success"></i>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">Phone</h5>
                                    <p class="mb-0 text-muted">{{ $setting->cphone }}</p>
                                </div>
                            </div>

                            <div class="contact-details d-flex align-items-center my-3 p-3 rounded shadow-sm">
                                <div class="contact-icon me-3">
                                    <i class="fa-solid fa-envelope fs-4 text-danger"></i>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">Email</h5>
                                    <p class="mb-0 text-muted">{{ $setting->cemail }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="col-lg-7 my-4 d-flex flex-column">
                            <div class="contact-form shadow p-4 rounded bg-light flex-grow-1">
                                <h6 class="contact-title mb-4 fw-bold text-muted">For further information about our
                                    organization, please contact us via
                                    email</h6>

                                <div>
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show shadow-sm my-2"
                                            role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form wire:submit.prevent="store" class="row g-2">
                                        <div class="col-md-6">
                                            <input type="text" wire:model="name" placeholder="Name"
                                                class="form-control shadow-sm">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" wire:model="phone" placeholder="Mobile"
                                                class="form-control shadow-sm">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <input type="email" wire:model="email" placeholder="Email"
                                                class="form-control shadow-sm">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <textarea wire:model="message" rows="6" placeholder="Message" class="form-control shadow-sm"></textarea>
                                            @error('message')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                            <button type="submit"
                                                class="btn btn-primary w-100 mt-2 shadow-sm">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </section>
</div>
