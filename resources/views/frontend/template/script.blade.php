<script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
{{-- Bootstrap --}}
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/slider.min.js') }}"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll/dist/js/splide-extension-auto-scroll.min.js">
</script>




<script>
    $(document).ready(function() {
        const timing = 8000;

        new lc_micro_slider('#slide_wrap', {
            fixed_slide_type: 'image',
            slide_fx: 'zoom-out',
            animation_time: 1000,
            slideshow_time: timing,
            nav_arrows: false,
            slideshow_cmd: false,
            autoplay: true,
            pause_on_hover: false,
            addit_classes: ['lcms_default_theme']
        });

        let ken_burns_intval,
            curr_comb = '';

        document.getElementById('slide_wrap').addEventListener('lcms_slide_shown', (e) => {
            const $subj = e.target,
                slide_index = e.detail.slide_index;

            if (ken_burns_intval) {
                clearInterval(ken_burns_intval);
            }
            ken_burns_intval = setInterval(() => {
                ken_burns_fx($subj, slide_index);
            }, timing);

            ken_burns_fx($subj, slide_index);
        });

        const ken_burns_fx = function($subj, slide_index) {
            const vert_opts = ["top", "bottom"],
                horiz_opts = ["left", "right"];

            if (document.getElementById('lcms_kenburns')) {
                document.getElementById('lcms_kenburns').remove();
            }

            const vert_rule = vert_opts[Math.floor(Math.random() * vert_opts.length)],
                horiz_rule = horiz_opts[Math.floor(Math.random() * horiz_opts.length)];

            if (curr_comb == vert_rule + horiz_rule) {
                ken_burns_fx($subj, slide_index);
                return;
            }

            let animation = {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            };
            animation[vert_rule] = '-20%';
            animation[horiz_rule] = '-20%';

            document.querySelector(`#slide_wrap .lcms_slide[data-index="${slide_index}"] .lcms_bg`)
                .animate(animation, {
                    duration: timing,
                    iterations: 1,
                    fill: 'forwards'
                });
        };

        function initSplide() {
            // Destroy existing Splide instances if any, then re-init
            // (Assuming you stored Splide instances globally)
            
            // Initialize First Splide
            if (document.querySelector('.splide')) {
                new Splide(".splide", {
                    type: "loop",
                    perPage: 4,
                    gap: "10rem",
                    arrows: false,
                    pagination: false,
                    breakpoints: {
                        375: { perPage: 1 },
                        480: { perPage: 1 },
                        640: { perPage: 2 },
                        768: { perPage: 2 },
                        1024: { perPage: 3 },
                        1280: { perPage: 4 },
                        1536: { perPage: 5 },
                        1920: { perPage: 5 }
                    },
                    autoScroll: { speed: 1 },
                }).mount(window.splide.Extensions);
            }

            // Initialize Second Splide
            if (document.querySelector('.doctor-two')) {
                new Splide(".doctor-two", {
                    type: "loop",
                    perPage: 4,
                    gap: "10rem",
                    arrows: false,
                    pagination: false,
                    breakpoints: {
                        375: { perPage: 1 },
                        480: { perPage: 1 },
                        640: { perPage: 2 },
                        768: { perPage: 2 },
                        1024: { perPage: 3 },
                        1280: { perPage: 4 },
                        1536: { perPage: 5 },
                        1920: { perPage: 5 }
                    },
                    autoScroll: { speed: 1 },
                }).mount(window.splide.Extensions);
            }

            // Initialize Third Splide
            if (document.querySelector('.patient-testmonial')) {
                new Splide(".patient-testmonial", {
                    type: "loop",
                    perPage: 4,
                    gap: "10rem",
                    arrows: false,
                    pagination: false,
                    breakpoints: {
                        375: { perPage: 1 },
                        480: { perPage: 1 },
                        640: { perPage: 2 },
                        768: { perPage: 2 },
                        1024: { perPage: 3 },
                        1280: { perPage: 4 },
                        1536: { perPage: 5 },
                        1920: { perPage: 5 }
                    },
                    autoScroll: { speed: 1 },
                }).mount(window.splide.Extensions);
            }
        }

        // Initial load
        initSplide();

        // Re-initialize after every Livewire update
        Livewire.hook('message.processed', (message, component) => {
            initSplide();
        });



    });

    document.addEventListener('DOMContentLoaded', function() {
        // First time page load
        initSlider();
    });

    // Livewire hook to reinitialize after DOM update
    Livewire.hook('message.processed', (message, component) => {
        initSlider();
    });

    // Department JS Code
</script>
