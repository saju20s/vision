@php
    use App\Models\Setting;
    use App\Models\Page;

    $setting = Setting::find(1);
    $pages = Page::latest()->get();
@endphp

<!-- Header Top Bar -->
<section class="header-top py-2 border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <!-- Contact Info -->
            <div class="col-md-8 text-center text-md-start mb-2 mb-md-0 gap-3 d-flex mobile-screen">
                <span class="header-top-span">
                    <i class="fas fa-envelope me-1 header-top-icon"></i>
                    <a href="mailto:{{ $setting->cemail }}" style="color: inherit; text-decoration: none;">
                        {{ $setting->cemail }}
                    </a>
                </span>
                <span class="header-top-span">
                    <i class="fas fa-phone-square-alt me-1 header-top-icon"></i>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $setting->cphone) }}" target="_blank"
                        style="color: inherit; text-decoration: none;">
                        {{ $setting->cphone }}
                    </a>
                </span>
            </div>


            <!-- Right Side Phone or Call Action -->
            <div class="col-md-4 text-center text-md-end">
                <span class="header-top-span fw-bold d-flex gap-2 justify-content-end mobile-screen">
                    <a href="{{ $setting->facebook }}" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="{{ $setting->twitter }}" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="{{ $setting->youtube }}" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="{{ $setting->linkedin }}" target="_blank"><i class="fab fa-linkedin fa-lg"></i></a>

                </span>
            </div>
        </div>
    </div>
</section>

<!-- Navigation Menu -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="/" wire:navigate>
            <i class="fas fa-clinic-medical me-1"></i>
            <h1 class="text-primary mb-0 fw-bold three-d-text subheading">{{ $setting->logotext }}</h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="/" wire:navigate>Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="/all-doctors-list" wire:navigate>Consultant</a>
                </li>

                <li class="nav-item dropdown" x-data="{ open: false }">
                    <a href="#" @click.prevent="open = !open" class="nav-link dropdown-link-item">
                        Online Services <i class="fas fa-caret-down"></i>
                    </a>
                    <ul x-show="open" @click.outside="open = false" class="dropdown-menu show" style="display: none;">
                        @foreach ($pages as $page)
                            <li>
                                <a class="dropdown-item" href="{{ url('/page-view/' . $page->slug) }}" wire:navigate>
                                    {{ $page->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="/notice" wire:navigate>Health Checkup Packages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="/gallery" wire:navigate>Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="/video" wire:navigate>Video</a>
                </li>

                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link custom-nav-link contact-us-btn btn btn-primary py-1 contact-button-item" href="/contact-us"
                        wire:navigate>Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
