<div class="container">
    @php
        use App\Models\Setting;
        $setting = Setting::find(1);
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="topbar d-flex justify-content-between align-items-center">
                <div class="toggle-btn text-dark" id="toggleSidebar">
                    @if ($setting?->logo)
                        <img class="topbar-image" src="{{ asset('storage/' . $setting->logo) }}" alt="logo"
                            loading="lazy">
                    @endif
                </div>

                <div class="d-flex align-items-center gap-2">
                    <a href="/" target="_blank" id="see-website-link" class="text-dark text-decoration-none">
                        <i class="fa-brands fa-internet-explorer"></i> See Website
                    </a>

                    <livewire:backend.header-dropdown />
                </div>

            </div>
        </div>
    </div>
</div>
