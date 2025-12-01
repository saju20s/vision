<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    use App\Models\Setting;
    $setting = Setting::find(1);
@endphp

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="{{ $setting->site_title }}">
    <meta name="keywords" content="{{ $setting->keyword }}">
    <meta name="description" content="{{ $setting->description }}">
    <title>{{ $setting->site_title }}</title>
    @if ($setting?->favicon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $setting->favicon) }}">
    @endif
    {{-- Bootstrap 5.3 --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    {{-- Slider --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/slider.css') }}">
    {{-- Animate --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">



    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @include('frontend.template.style')
    @include('frontend.template.responsive')
    @livewireStyles
</head>

<body>
    @include('frontend.template.header-menu')

    <main id="main">
        {{ $slot }}
    </main>

    @include('frontend.template.footer')
    @include('frontend.template.script')
    @livewireScripts

    {{-- ✅ Messenger Chat Plugin --}}
    @if (!empty($setting->messenger_page_id))
        <div id="fb-root"></div>
        <div id="fb-customer-chat" class="fb-customerchat"></div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "{{ $setting->messenger_page_id }}");
            chatbox.setAttribute("attribution", "biz_inbox");

            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v20.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/bn_BD/sdk/xfbml.customerchat.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    @endif

</body>

</html>
