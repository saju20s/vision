@php
    use App\Models\Setting;
    $setting = Setting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
        }

        .email-wrapper {
            width: 100%;
            padding: 30px 0;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, {{ $setting->header_color }}, {{ $setting->menu_color }});
            position: relative;
            color: white;
            text-align: center;
            padding: 60px 20px 80px 20px;
        }

        .email-header img {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        .email-header h2 {
            margin: 0;
            font-size: 26px;
        }

        .wave-shape {
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            line-height: 0;
        }

        .wave-shape svg {
            display: block;
            width: 100%;
            height: 70px;
        }

        .email-body {
            padding: 30px;
            color: #333333;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
        }

        .email-button {
            display: inline-block;
            background-color: {{ $setting->menu_color }};
            color: #ffffff !important;
            padding: 12px 25px;
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .email-footer {
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #777777;
            background-color: #f9f9f9;
        }
        .email-footer >a{
            color: {{ $setting->menu_color }};
        }

        @media (max-width: 600px) {
            .email-body {
                padding: 20px;
            }

            .email-button {
                display: block;
                width: 100%;
                text-align: center;
            }

            .email-header img {
                width: 60px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-container">

            <!-- Wavy full header -->
            <div class="email-header">
                <img src="{{ url('frontend/images/logo.jpg') }}" alt="Sharif" loading="lazy">
                <h2>Password Reset Request</h2>
                <div class="wave-shape">
                    <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                        <path d="M0.00,49.98 C150.00,150.00 349.88,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                            style="stroke: none; fill: #ffffff;"></path>
                    </svg>
                </div>
            </div>

            <!-- Body -->
            <div class="email-body">
                <p>Hi {{ $data->name }},</p>
                <p>We received a request to reset your password. Click the button below to proceed:</p>
                <a href="{{ url('/account-reset-password/' . $token . '/' . $data->email) }}" class="email-button">Reset
                    Password</a>
                <p>If you didn’t request this, you can ignore this email. The link is valid for 60 minutes only.</p>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <span>{{ str_replace(',, ', '.', $setting->address) }}</span><br>
                &copy; Skyline Software BD {{ date('Y') }} |
                <a href="{{ url('/') }}">{{ config('app.name') }} Diagnostics</a>
            </div>

        </div>
    </div>
</body>

</html>
