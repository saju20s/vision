<div>
    <!-- Department Details -->
    <section class="department-details">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="page-start">
                        <h4>DEPARTMENT DETAILS</h4>
                        <h6><a href="/" wire:navigate> <i class="fas fa-home i-breadcrump"></i> Home</a> <i
                                class="fas fa-angle-right"></i>
                            <a href="/department-view/{{ $department->id }}" wire:navigate><i
                                    class="fa-solid fa-layer-group i-breadcrump"></i> Department</a>
                            <i class="fas fa-angle-right"></i>
                            <a href="/" wire:navigate
                                style="color: {{ $department->color ?? '#333' }}!important; font-weight: 700;
                                         text-shadow: 1px 1px 3px rgba(0,0,0,0.2);"><i
                                    class="{{ $department->icon }}"></i> {{ $department->title }}</a>
                        </h6>
                    </div>
                </div>


                <!-- Image বামে -->
                @if ($department->image)
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="{{ asset('storage/' . $department->image) }}" alt="{{ $department->title }}"
                            class="img-fluid rounded shadow-sm w-100 department-img">
                    </div>
                @endif

                <!-- Description ডানে -->
                <div class="col-lg-6">
                    <h2 class="mb-3"
                        style="color: {{ $department->color ?? '#333' }}; font-weight: 700;
                                         text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
                        {{ $department->title }}
                    </h2>
                    <p class="lead text-muted department-description">
                        {!! $department->description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <hr>
</div>
