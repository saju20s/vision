<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    use App\Models\Setting;
    $setting = Setting::find(1);
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Skyline Software BD')</title>
    @if ($setting?->favicon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $setting->favicon) }}">
    @endif
    <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @include('backend.template.style')
    @livewireStyles
</head>

<body>

    <main id="main">
        {{ $slot }}
    </main>

    @include('backend.template.script')
    @livewireScripts
    @stack('scripts')
</body>

</html>
