@php
    use App\Models\Setting;
    $setting = Setting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Message Conversation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
        }

        .email-container {
            max-width: 650px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, {{ $setting->header_color }}, {{ $setting->menu_color }});
            text-align: center;
            padding: 40px 30px 30px;
            color: #ffffff;
        }

        .header img {
            width: 70px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        /* Body */
        .content {
            padding: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 5px;
        }

        .message-box,
        .reply-box {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-left: 4px solid {{ $setting->menu_color }};
            border-radius: 6px;
            padding: 18px 20px;
            line-height: 1.6;
        }

        .reply-box {
            background-color: #ecfdf5;
            border-left-color: #10b981;
            color: #065f46;
            margin-bottom: 20px;
        }

        .admin-name {
            margin-top: 10px;
            text-align: right;
            font-size: 13px;
            color: #047857;
        }

        .timestamp {
            color: #6b7280;
            font-size: 12px;
            margin-top: 2px;
        }

        /* Footer */
        .footer {
            background-color: #f3f4f6;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #6b7280;
        }

        .footer a {
            color: {{ $setting->menu_color }};
        }

        @media (max-width: 600px) {
            .content {
                padding: 20px;
            }

            .header img {
                width: 60px;
            }

            .header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">

        <!-- Header -->
        <div class="header">
            <img src="{{ url('frontend/images/logo.jpg') }}" alt="Sharif">
            <h1>Message Conversation</h1>
        </div>

        <!-- Body -->
        <div class="content">

            <!-- User Message -->
            <div class="section">
                <div class="section-title">User Message</div>
                <div class="message-box">
                    <strong>Name:</strong> {{ $data->name }}<br>
                    <strong>Email:</strong> {{ $data->email }}<br>
                    <strong>Sent at:</strong>
                    {{ \Carbon\Carbon::parse($data->created_at)->format('F j, Y h:i A') }}<br><br>
                    <strong>Message:</strong><br>
                    {{ $data->message }}
                </div>
            </div>

            <!-- Admin Replies -->
            <div class="section">
                <div class="section-title">Admin Replies</div>
                @forelse($data->replies as $reply)
                    <div class="reply-box">
                        {{ $reply->reply }}
                        <div class="admin-name">
                            — {{ $reply->user->name }}
                            <div class="timestamp">
                                Replied at: {{ \Carbon\Carbon::parse($reply->created_at)->format('F j, Y h:i A') }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="message-box">
                        No replies yet.
                    </div>
                @endforelse
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            <span>{{ str_replace(',, ', '.', $setting->address) }}</span><br>
            &copy; Skyline Software BD {{ date('Y') }} |
            <a href="{{ url('/') }}">{{ config('app.name') }} Diagnostics</a>
        </div>
    </div>
</body>

</html>
