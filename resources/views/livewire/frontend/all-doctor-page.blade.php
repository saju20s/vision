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
                    <h1 class="text-primary mb-1 fw-bold three-d-text subheading">All Doctors</h1>
                    <hr>
                </div>

                <!-- Filter Form -->
                <form wire:submit.prevent="applyFilter" class="row justify-content-center mb-5 g-3">
                    <div class="col-12 col-md-4">
                        <select wire:model="departmentInput" class="form-select shadow-sm"
                            aria-label="Select Department">
                            <option value="All">All Department</option>
                            @foreach ($departments as $dept)
                                <option value="{{ $dept }}">{{ $dept }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <input wire:model="searchInput" type="search" class="form-control shadow-sm"
                            placeholder="Search Your Consultant" aria-label="Search Your Consultant" />
                    </div>
                    <div class="col-12 col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary shadow-sm">GO</button>
                    </div>
                </form>

                <!-- Doctors List -->
                @forelse ($datas as $doctor)
                    <div class="col-12 col-sm-6 col-md-3 d-flex">
                        <div class="card with-underline shadow-sm text-center mx-auto mb-3 doctor-slider-div">
                            <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('frontend/images/default.png') }}"
                                class="card-img-top doctor-img mx-auto mt-4" alt="{{ $doctor->name }}" />
                            <div class="card-body">
                                <p class="with-line"></p>
                                <h5 class="card-title text-primary with-line">{{ $doctor->name }}</h5>
                                <p class="card-text with-line">{{ $doctor->designation }}</p>
                                <p class="card-text with-line">{{ $doctor->specialization }}</p>
                            </div>
                            <div class="button text-center mb-1">
                                <a href="{{ url('/doctor-view/' . $doctor->id) }}" class="btn btn-primary"
                                    wire:navigate>
                                    Profile
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No doctors found.</p>
                    </div>
                @endforelse

                <div class="col-12 px-4">
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </section>
    <hr>
</div>
