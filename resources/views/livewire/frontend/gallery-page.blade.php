<div>
    <section class="gallery-section">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @endif
        </div>

        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h1 class="text-primary mb-3 fw-bold subheading">{{$setting->logotext}} Gallery</h1>
                    <hr>
                </div>
            </div>

            <!-- Gallery Items -->
            <div class="row g-4">
                @foreach ($datas as $gallery)
                    <div class="col-md-6 col-lg-3">
                        <div class="custom-card h-100 shadow-lg border-1 rounded-3 overflow-hidden">
                            @if ($gallery?->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" class="custom-card-img blog-image"
                                    alt="{{ $gallery->title }}" loading="lazy"
                                    wire:click="openModal('{{ $gallery->image }}', '{{ addslashes($gallery->title) }}')"
                                    style="transition: transform 0.3s; cursor: pointer;">
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="col-12 text-center mt-4">
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
        <hr>
    </section>

    <!-- Premium Modal -->
    <div class="modal fade @if ($showModal) show d-block @endif {{ $showModal ? 'modal-overlay-show' : 'd-none' }}"
        tabindex="-1" aria-modal="true" role="dialog" wire:keydown.escape="closeModal"
        style="background-color: rgba(0, 0, 0, 0.9); z-index: 9999; backdrop-filter: blur(5px);">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg"
                style="background-color: #000; position: relative;">

                <!-- Stylish Close Button -->
                <button type="button" wire:click="closeModal"
                    class="modal-close-btn position-absolute top-0 end-0 m-3 d-flex justify-content-center align-items-center"
                    aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                        viewBox="0 0 24 24">
                        <path
                            d="M18.3 5.71a1 1 0 0 0-1.42 0L12 10.59 7.12 5.7a1 1 0 1 0-1.41 1.42L10.59 12l-4.88 4.88a1 1 0 1 0 1.41 1.41L12 13.41l4.88 4.88a1 1 0 0 0 1.42-1.41L13.41 12l4.88-4.88a1 1 0 0 0 0-1.41z" />
                    </svg>
                </button>

                <!-- Full Image Body -->
                <div class="modal-body p-0 m-0 d-flex justify-content-center align-items-center"
                    style="height: 85vh; overflow: hidden; animation: fadeIn 0.5s ease;">
                    @if ($modalImage)
                        <img src="{{ asset('storage/' . $modalImage) }}" alt="{{ $modalTitle }}" loading="lazy"
                            style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;"
                            onmouseover="this.style.transform='scale(1.05)'"
                            onmouseout="this.style.transform='scale(1)'">
                    @endif
                </div>

                <!-- Footer -->
                <div
                    class="modal-footer d-flex justify-content-between align-items-center border-0 text-white px-4 py-3 gallery-modal-footer">
                    <h5 class="modal-title mb-0 fw-semibold">{{ $modalTitle }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
