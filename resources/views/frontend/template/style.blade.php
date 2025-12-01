@php
    use App\Models\Setting;
    $setting = Setting::find(1);
@endphp
<style>
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }



    /* ========== Typography ========== */
    body {
        font-family: var(--bodyFont);
        font-size: 16px;
        color: var(--black);
        width: 100%;
        background: url('frontend/images/body-bg.jpg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .scroll-arrow {
        max-width: 100%;
    }

    .animate__animated {
        position: relative;
    }

    h1 {
        font-size: 2.5rem;
    }

    h2 {
        font-size: 2rem;
    }

    h3 {
        font-size: 1.5rem;
    }

    .btn-primary {
        background-color: {{ $setting->menu_color }};
        border-color: {{ $setting->menu_color }};
        color: var(--white) !important;
    }

    .btn-primary:hover {
        background-color: {{ $setting->menu_color }};
        border-color: {{ $setting->menu_color }};
        color: var(--white) !important;
    }

    .border-primary {
        border-color: var(--button1);
    }

    .border-secondary {
        border-color: var(--primary) !important;
    }

    /* Search CSS Code */

    .search-input-group>span {
        border: 1px solid #d3d3d4 !important;
    }

    .form-control:focus {
        box-shadow: none !important;
    }

    .btn-close:focus {
        box-shadow: none !important;
    }

    .page-link:focus {
        box-shadow: none !important;
    }

    /* Search CSS Code */


    /* Responsive central container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
        width: 100%;
        box-sizing: border-box;
    }

    img,
    video {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* Fonts */
    @font-face {
        font-family: 'Poppins';
        src: url('frontend/fonts/Poppins-Regular.ttf') format('truetype');
        font-weight: 400;
    }

    @font-face {
        font-family: 'Poppins';
        src: url('frontend/fonts/Poppins-Bold.ttf') format('truetype');
        font-weight: 700;
    }

    @font-face {
        font-family: 'Roboto';
        src: url('frontend/fonts/Roboto-Regular.ttf') format('truetype');
        font-weight: 400;
    }

    @font-face {
        font-family: 'Roboto';
        src: url('frontend/fonts/Roboto-Bold.ttf') format('truetype');
        font-weight: 700;
    }

    /* Reset Code Start */

    .btn-primary:active,
    .btn-primary.active,
    .btn-primary:focus,
    .btn-primary:focus:active {
        background-color: {{ $setting->menu_color }} !important;
        border-color: {{ $setting->menu_color }} !important;
        box-shadow: none !important;
    }

    .btn:focus-visible {
        color: #FFF;
        background-color: {{ $setting->menu_color }} !important;
        border-color: {{ $setting->menu_color }} !important;
        outline: 0;
        box-shadow: none !important;
    }

    .btn-check:checked+.btn,
    .btn.active,
    .btn.show,
    .btn:first-child:active,
    :not(.btn-check)+.btn:active {
        background-color: {{ $setting->menu_color }} !important;
        border-color: {{ $setting->menu_color }} !important;
    }

    .btn-primary:disabled,
    .btn-primary[disabled] {
        background-color: {{ $setting->menu_color }} !important;
        border-color: {{ $setting->menu_color }} !important;
        opacity: 0.4;
    }



    /* Header font */
    h1,
    h2,
    h3 {
        font-family: var(--headingFont);
        font-weight: 700;
    }

    /* Paragraph font */
    p,
    li,
    a,
    span {
        font-family: var(--bodyFont);
        font-weight: 400;
        color: var(--black) !important;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    :root {
        --headingFont: 'Poppins', sans-serif;
        --bodyFont: 'Roboto', sans-serif;
        --text: #37474F;
        --bg: #FFFFFF;
        --white: #FFFFFF;
        --black: #000;
    }

    .text-primary {
        color: {{ $setting->menu_color }} !important;
    }

    .active>.page-link,
    .page-link.active {
        background-color: {{ $setting->menu_color }} !important;
        border-color: {{ $setting->menu_color }} !important;
        color: #FFF !important;
    }

    .page-link {
        color: {{ $setting->header_color }} !important;
    }

    .page-item:last-child .page-link {
        color: {{ $setting->header_color }} !important;
    }

    /* Reset Code End */


    .login-item::before {
        background-color: transparent !important;
    }

    /* Header Section css */
    .navbar-nav .nav-link {
        font-weight: 500;
        transition: 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
        color: {{ $setting->menu_color }} !important;
    }

    .navbar-nav .active>.nav-link,
    .navbar-nav .nav-link.active {
        color: {{ $setting->menu_color }} !important;
        font-weight: 600;
    }

    .contact-us-btn:hover {
        color: #FFF !important;
        background-color: {{ $setting->header_text_color }} !important;
    }

    /* Hover underline animation */
    .header-top {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        background-color: {{ $setting->header_color }};
    }

    .header-top-icon {
        color: {{ $setting->menu_color }};
    }

    .header-top-span {
        color: {{ $setting->menu_text_color }} !important;
        font-size: 12px;
    }

    .header-top-span>a {
        color: {{ $setting->menu_text_color }} !important;
        opacity: 0.8;
    }

    .header-top-span>a:hover {
        color: {{ $setting->menu_text_color }} !important;
        opacity: 1;
    }

    .custom-nav-link {
        position: relative;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .custom-nav-link:hover,
    .nav-item.active .custom-nav-link {
        color: #0d6efd !important;
        transform: translateY(-2px);
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .navbar {
        background: linear-gradient(to right, #ffffff, #f8f9fa);
        border-radius: 0 0 15px 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-size: 1.8rem;
        text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.1);
    }

    .nav-item {
        margin-left: 10px;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0%;
        height: 3px;
        left: 0;
        bottom: -5px;
        background-color: {{ $setting->menu_color }} !important;
        transition: 0.3s ease;
        border-radius: 5px;
    }

    .nav-link:hover::after,
    .nav-item.active .nav-link::after {
        width: 100%;
    }

    .dropdown-menu {
        border: none;
        background-color: #FCFDFD;
        --bs-dropdown-border-radius: 0px !important;
    }

    .dropdown-item:hover {
        background-color: transparent !important;
        color: {{ $setting->menu_color }} !important;
    }

    .dropdown-link-item {
        margin-left: 15px;
    }

    .navbar-toggler:focus {
        box-shadow: none !important;
    }

    .contact-button-item {
        margin-left: 15px;
        padding-right: 1rem;
    }

    /* Responsive tweaks */
    @media (max-width: 767px) {
        .navbar {
            border-radius: 0;
        }

        .nav-item {
            margin-left: 0;
        }

        .custom-nav-link {
            padding-left: 1rem;
        }

        .mobile-screen {
            justify-content: center !important;
        }
    }

    /* Slider CSS Code */
    .slider-ul-sec {
        display: none;
    }

    .slider-box {
        padding: 0px;
    }

    .content>h3 {
        font-size: 1.4em;
        margin: 35px auto -18px;
        max-width: 920px;
    }

    #slide_wrap {
        width: 100%;
        height: 82vh;
    }

    @media screen and (max-width:1030px) {
        #slide_wrap {
            height: 60vh;
            max-height: none;
        }

        .content>h3 {
            margin: 35px 5% -18px;
            text-align: center;
        }
    }

    /* doctor CSS Code */
    .with-line {
        border-bottom: 1px solid #ccc;
        padding-bottom: 0px;
        margin-bottom: 2px !important;
        margin-left: -15px;
        margin-right: -15px;
    }

    .doctor-img {
        width: 150px !important;
        height: 150px !important;
        object-fit: cover;
        transition: transform 0.3s ease;
        cursor: pointer;
        display: block;
        transform: scale(1.2);
    }


    .doctor-img:hover {
        transform: scale(1.27);
        transition: transform 0.3s ease;
    }

    .card {
        position: relative;
        cursor: pointer;
        padding-bottom: 10px;
    }

    .card.with-underline::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 0;
        background-color: {{ $setting->menu_color }} !important;
        transition: width 0.3s ease;
    }

    .card:hover::after {
        width: 100%;
    }

    .three-d-text {
        font-weight: 700;
        font-size: 3rem;
        background: linear-gradient(45deg, #00A654, #005FAA);
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        position: relative;
        text-shadow:
            2px 2px 0 #ccc,
            4px 4px 5px rgba(0, 0, 0, 0.5),
            6px 6px 10px rgba(0, 0, 0, 0.3);
    }

    .subheading {
        font-size: 2rem;
        text-shadow:
            1px 1px 0 #eee,
            2px 2px 3px rgba(0, 0, 0, 0.2),
            3px 3px 5px rgba(0, 0, 0, 0.1);
    }

    .three-d-text::before {
        content: attr(data-text);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        color: rgba(0, 0, 0, 0.15);
        z-index: -1;
        transform: translate(8px, 8px);
        filter: blur(3px);
    }

    .doctor-slider-div{
        width: 250px;
    }

    /* Department CSS Code */
    .department-section,
    .testimonial-section {
        background: linear-gradient(135deg, #f0f8ff, #dceeff) !important;
        padding: 60px 0 !important;
    }

    .department-card {
        background: white;
        border-radius: 10px;
        padding: 40px 20px;
        margin-bottom: 30px;
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
    }

    .department-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 18px 35px rgba(0, 0, 0, 0.15);
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }


    .department-card h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .department-card p {
        color: #666;
    }

    .department-img{
        max-height: 400px; object-fit: contain;
    }
    .department-description{
        font-size: 1.1rem; line-height: 1.8;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-8px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .department-card:hover .icon-wrapper {
        animation: float 2s infinite ease-in-out;
    }


    @media (max-width: 768px) {
        .three-d-text {
            font-size: 2rem;
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            font-size: 28px;
        }
    }

    /* Blogs CSS Code */
    .section-padding {
        padding: 70px 20px;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 50px;
        color: #1a1a1a;
    }

    .blog-img{
        object-fit: cover; transition: transform 0.3s;
    }
    .blog-related-img{
        height: 150px; object-fit: cover; transition: transform 0.3s;
    }


    /* Card */
    .unique-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .unique-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
    }

    /* Card Header (Image + Category Badge) */
    .card-header {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .category-badge {
        position: absolute;
        left: 0;
        bottom: 5px;
        background-color: {{ $setting->header_color }};
        color: #fff !important;
        padding: 3px 9px;
        font-size: 10px;
        font-weight: 600;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    /* Card Body */
    .card-body {
        padding: 20px;
    }

    .card-body h3 {
        font-size: 1.3rem;
        color: #0d1b2a;
        margin-bottom: 10px;
    }

    .card-body p {
        font-size: 0.95rem;
        color: #444;
        margin-bottom: 15px;
        line-height: 1.5;
    }

    /* Meta */
    .card-meta {
        font-size: 11px;
        color: #666;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .blog-image img:hover {
        transform: scale(1.05);
    }

    .related-posts .card:hover img {
        transform: scale(1.05);
    }

    .related-posts .card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s;
    }

    @media (max-width: 767px) {
        .blog-image {
            margin-bottom: 20px;
        }
    }

    /* Testmonial CSS Code */
    .testimonial-section {
        background: #f9f9f9;
    }

    .testmonial-description{
        font-size: 1.1rem; line-height: 1.8;
    }

    .splide__slide {
        padding: 10px;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        background: #fff;
    }


    .card.with-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }


    .doctor-card-body {
        margin-top: -7px;
        padding-left: 30px;
        padding-top: 0px;
    }

    .card-image-wrapper {
        position: relative;
        padding-top: 20px;
    }

    .testimonial-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        margin: 0 auto;
        border: 4px solid #eee;
        position: relative;
        z-index: 1;
    }

    .quote-badge {
        position: absolute;
        top: 10px;
        right: 55px;
        width: 40px;
        height: 40px;
        background-color: #f39c12;
        color: #fff;
        font-size: 28px;
        font-family: serif;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        z-index: 2;
        pointer-events: none;
        user-select: none;
    }

    .card-body p {
        letter-spacing: 0.5px;
    }

    .testmonial-slider-div{
        width: 250px; border-radius: 15px; overflow: hidden;
    }
    .testmonial-slider-span{
        display: block; font-weight: 700; font-size: 18px; color: #222;
    }
    .testmonial-slider-subspan{
        display: block; color: #888; font-size: 14px; margin-top: 4px;
    }

    /* MAP CSS Code */
    .map-sectioin {
        height: 400px !important;
        width: 100% !important;
        padding: 0px !important;
    }

    /* Footer CSS Code */
    .footer-text {
        font-size: 0.95rem;
        color: #ddd;
    }

    .footer-link:hover {
        color: #ffc107;
        text-decoration: underline;
    }

    .footer-contact-section i {
        color: #ffc107;
    }

    .social-link {
        transition: color 0.3s ease;
    }

    .social-link:hover {
        color: #ffc107;
    }

    /* Responsive tweak */
    @media (max-width: 576px) {

        .footer-contact-section,
        .follow-link {
            text-align: center;
        }
    }

    /* Footer CSS Code */
    .footer-section {
        color: #e0e0e0;
        font-family: 'Poppins', sans-serif;
        padding: 60px 20px 0px;
    }

    .footer-wrapper {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-col {
        min-width: 220px;
    }

    .footer-logo {
        max-width: 100px;
        margin-bottom: 35px!important;
        border-radius: 8px;
        object-fit: contain;
    }

    .footer-description {
        font-size: 1rem;
        line-height: 1.6;
        color: #ccc;
    }

    /* Footer Titles */
    .footer-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: {{ $setting->menu_color }} !important;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .footer-link {
        color: #e0e0e0;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: {{ $setting->menu_color }} !important;
        text-decoration: underline;
    }

    /* Contact */
    .footer-contact p {
        margin: 5px 0;
        font-size: 1rem;
    }

    .footer-contact i {
        margin-right: 12px;
        color: {{ $setting->menu_color }} !important;
    }

    .footer-contact a {
        color: #e0e0e0;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-contact a:hover {
        color: {{ $setting->menu_color }} !important;
        text-decoration: underline;
    }

    /* Social */
    .footer-social .social-links {
        display: flex;
        gap: 20px;
    }

    .footer-social a {
        color: #e0e0e0;
        font-size: 1.5rem;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background-color: rgba(255, 215, 0, 0.1);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .footer-social a:hover {
        color: {{ $setting->menu_text_color }} !important;
        background-color: {{ $setting->menu_color }} !important;
        box-shadow: 0 4px 12px {{ $setting->menu_color }} !important;
    }

    /* Footer Bottom */
    .footer-bottom {
        border-top: 1px solid {{ $setting->header_color }};
        font-size: 0.9rem;
        background-color: {{ $setting->header_color }};
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
    }

    .footer-bottom>p {
        padding: 5px 0px;
        margin: 0px;
        color: {{ $setting->header_text_color }} !important;
    }

    .footer-about {
        margin-top: -20px;
    }

    .footer-about>p {
        margin-top: -30px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .footer-col {
            text-align: left;
        }

        .footer-logo {
            max-width: 120px;
        }
    }

    @media (max-width: 576px) {
        .footer-col {
            margin-bottom: 20px;
        }
    }

    /* Doctor View CSS Code */
    .doctor-profile-img {
        width: 100%;
        height: 380px;
        display: inline;
        object-fit: cover;
        border-top: 4px solid {{ $setting->menu_color }} !important;
        border-left: 4px solid {{ $setting->menu_color }} !important;
        border-right: 4px solid {{ $setting->menu_color }} !important;
        border-radius: 3px 3px 0px 0px;
    }

    .doc-info {
        background-color: {{ $setting->menu_color }} !important;
    }

    @media (max-width: 768px) {
        .doctor-profile-img {
            object-fit: contain;
        }
    }

    /* Healthcare Checkup */
    .table-secondary {
        --bs-table-bg: {{ $setting->header_color }} !important;
        --bs-table-color: {{ $setting->header_text_color }} !important;
    }

    .bg-success-light {
        background-color: rgba(15, 183, 107, 0.12) !important;
        color: #26af48 !important;
    }

    /* Video CSS Code */

    .video-page iframe {
        width: 100%;
        height: 250px;
        margin: 0;
        padding: 0;
    }

    .video-page {
        margin: 0;
        padding: 0;
    }


    /* Gallery Custom Card Styling */
    .custom-card {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        height: 100%;
        padding: 0;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .custom-card-img {
        object-fit: cover;
        height: 220px;
        width: 100%;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .custom-card-img {
        transition: transform 0.3s ease-in-out;
    }

    /* Contact Page */
    .contact-row {
        display: flex;
        align-items: stretch;
    }

    .contact-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .page-start {
        margin-bottom: 40px;
        padding-bottom: 10px;
        border-bottom: 1px solid #d4d1d1;
    }

    .page-start h6 .fa-angle-right {
        padding-right: 8px;
        padding-left: 8px;
    }

    .i-breadcrump {
        color: {{ $setting->menu_color }};
    }

    /* Modal CSS Code */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.98);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .modal-close-btn {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
        z-index: 1050;
    }

    .modal-close-btn:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: rotate(90deg);
    }

    .modal-close-btn svg {
        display: block;
        margin: auto;
        pointer-events: none;
    }
    .gallery-modal-footer{
        background-color: {{$setting->menu_color}};
    }
    .patient-testmonial-image{
        border: 1px solid {{$setting->menu_color}};
        object-fit: cover; 
        margin:0; 
        padding:0;
    }
    .banner-img{
        height: 280px; object-fit: cover;
    }
    .doctor-related-img{
        width: 120px; height: 120px; object-fit: cover; border-radius: 3px;
    }
</style>
