<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BDMPPA Installer</title>
    <!-- fav icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .installation-welcome {
            max-width: 800px;
            margin: 0 auto;
        }

        .pre-requisites {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
        }

        .start-installation {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .version-info {
            font-size: 0.8rem;
        }

        .installation-requirements {
            max-width: 900px;
            margin: 0 auto;
        }

        .requirements-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .installation-permissions {
            max-width: 800px;
            margin: 0 auto;
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
        }

        .installer-container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .step-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .step {
            text-align: center;
            position: relative;
            flex: 1;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
        }

        .step.active .step-number {
            background: #0d6efd;
            color: white;
        }

        .step.completed .step-number {
            background: #198754;
            color: white;
        }

        .step-title {
            font-size: 14px;
            color: #6c757d;
        }

        .step.active .step-title {
            color: #0d6efd;
            font-weight: bold;
        }

        .step.completed .step-title {
            color: #198754;
        }

        .step:not(:last-child):after {
            content: '';
            position: absolute;
            top: 20px;
            left: 60%;
            width: 80%;
            height: 2px;
            background: #e9ecef;
            z-index: -1;
        }

        .step.completed:not(:last-child):after {
            background: #198754;
        }
    </style>
    @livewireStyles
</head>

<body>
    <div class="container installer-container">
        <div class="text-center mb-4">
            <h2>BDMPPA Application Setup</h2>
            <p class="text-muted">Follow these steps to install your application</p>
        </div>


        <main id="main">
            {{ $slot }}
        </main>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>

</html>
