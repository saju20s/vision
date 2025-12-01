@php
    use App\Models\Setting;
    use App\Models\Link;
    $setting = Setting::find(1);
    $link_footer = Link::where('position', 'footer')->latest()->take(5)->get();
@endphp

<section class="footer-section">
    <footer class="footer-wrapper">
        <div class="container">
            <div class="row g-4">
                <!-- Logo & About -->
                <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
                    <div class="footer-col footer-about">
                        @if ($setting?->ftr_image)
                            <img src="{{ asset('storage/' . $setting->ftr_image) }}" alt="Logo"
                                 class="footer-logo img-fluid mb-3" loading="lazy" />
                        @endif
                        <p class="footer-description">{{ $setting->footer_text }}</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
                    <div class="footer-col footer-links">
                        <h3 class="footer-title">Quick Links</h3>
                        <ul class="list-unstyled">
                            @foreach ($link_footer as $link)
                                <li><a href="#" class="footer-link">■ {{ $link->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
                    <div class="footer-col footer-contact">
                        <h3 class="footer-title">Contact Us</h3>
                        <p><i class="fas fa-envelope"></i> <a href="mailto:{{ $setting->cemail }}">{{ $setting->cemail }}</a></p>
                        <p><i class="fas fa-phone"></i> <a href="tel:{{ $setting->cphone }}">{{ $setting->cphone }}</a></p>
                        <p><i class="fas fa-map-marker-alt"></i> {{ str_replace(',, ', '.', $setting->address) }}</p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
                    <div class="footer-col footer-social">
                        <h3 class="footer-title">Follow Us</h3>
                        <div class="social-links">
                            <a href="{{ $setting->facebook }}" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $setting->twitter }}" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $setting->youtube }}" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                            <a href="{{ $setting->linkedin }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>

<div class="footer-bottom text-center py-3">
    <p class="mb-0">{{ $setting->copyright_text }}</p>
</div>
