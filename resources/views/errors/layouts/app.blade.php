<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Error')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; }
        #notfound { position: relative; height: 100vh; }
        #notfound .notfound-bg {
            position: absolute; width: 100%; height: 100%; background-size: cover;
        }
        #notfound .notfound-bg:after {
            content: ''; position: absolute; width: 100%; height: 100%; background-color: #980606!important;
        }
        #notfound .notfound {
            position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);
            text-align: center; max-width: 910px; width: 100%; line-height: 1.4;
        }
        .notfound .notfound-404 { position: relative; height: 200px; }
        .notfound .notfound-404 h1 {
            font-family: 'Montserrat', sans-serif;
            position: absolute; left: 50%; top: 50%;
            transform: translate(-50%, -50%);
            font-size: 220px; font-weight: 900; margin: 0;
            color: #fff; text-transform: uppercase; letter-spacing: 10px;
        }
        .notfound h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 22px; font-weight: 700; text-transform: uppercase;
            color: #fff; margin: 20px 0 15px;
        }
        .notfound .home-btn, .notfound .contact-btn {
            font-family: 'Montserrat', sans-serif;
            display: inline-block; font-weight: 700; text-decoration: none;
            background-color: transparent; border: 2px solid transparent;
            text-transform: uppercase; padding: 13px 25px; font-size: 18px;
            border-radius: 40px; margin: 7px; transition: 0.2s all;
        }
        .notfound .home-btn:hover, .notfound .contact-btn:hover { opacity: 0.9; }
        .notfound .home-btn { color: rgba(255, 0, 36, 0.7); background: #fff; }
        .notfound .contact-btn {
            border: 2px solid rgba(255, 255, 255, 0.9);
            color: rgba(255, 255, 255, 0.9);
        }
        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 h1 { font-size: 182px; }
        }
        @media only screen and (max-width: 480px) {
            .notfound .notfound-404 { height: 146px; }
            .notfound .notfound-404 h1 { font-size: 146px; }
            .notfound h2 { font-size: 16px; }
            .notfound .home-btn, .notfound .contact-btn { font-size: 14px; }
        }
    </style>
</head>
<body>
    <div id="notfound">
        <div class="notfound-bg"></div>
        <div class="notfound">
            <div class="notfound-404">
                <h1>@yield('code', 'Error')</h1>
            </div>
            <h2>@yield('message', 'Something went wrong')</h2>
            <a href="{{ url('/') }}" class="home-btn">Go Home</a>
            <a href="mailto:shariful971@gmail.com" class="contact-btn">Contact us</a>
        </div>
    </div>
</body>
</html>
