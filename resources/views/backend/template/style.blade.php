@php
    use App\Models\Setting;
    $setting = Setting::find(1);
@endphp
<style>
    /* RESET CSS Code */
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html,
    body {
        width: 100%;
        height: 100%;
        line-height: 1.5;
        scroll-behavior: smooth;
        overflow-x: hidden;
        background-color: #f3f3f3;
        /* background-color: #fff; */
        color: var(--black);
        font-family: var(--font-body);
    }

    th {
        color: var(--textMuted) !important;
        text-transform: uppercase;
        font-weight: normal;
    }

    td {
        color: var(--textMuted) !important;
    }

    /* Responsive Media */
    img,
    video,
    iframe {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* Typography Reset */
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        margin: 0;
        padding: 0;
    }

    /* List & Link Reset */
    ul,
    ol {
        list-style: none;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    input {
        height: 50px;
        border: 1px solid {{ $setting->header_color }} !important;
        border-radius: 3px !important;
    }

    .list-group-item-action {
        cursor: pointer;
    }

    textarea,
    select {
        border: 1px solid {{ $setting->header_color }} !important;
        border-radius: 3px !important;
    }

    select {
        height: 50px;
    }

    .toggle-password {
        cursor: pointer;
    }

    .input-group-text {
        border: 1px solid #d3d3d4;
    }

    .form-control:focus {
        box-shadow: none !important;
    }

    label {
        color: var(--textMuted);
    }

    .toast-top-right {
        margin-top: 50px !important;
    }

    .fImage {
        height: 38px;
    }

    .image-preview {
        height: 150px;
        width: 150px;
        object-fit: cover;
    }

    .form-control {
        padding-left: 10px !important;
    }

    .bg-danger-light {
        background-color: rgba(242, 17, 54, 0.12) !important;
        color: var(--buttonPink) !important;
    }

    .bg-success-light {
        background-color: rgba(15, 183, 107, 0.12) !important;
        color: #26af48 !important;
    }

    .delete-close {
        font-size: 80px !important;
    }

    .modal-backdrop.show {
        opacity: 0.3 !important;
        background-color: rgba(0, 0, 0, 0.15) !important;
    }


    /* Form Reset */
    input,
    textarea,
    select,
    button {
        font: inherit;
        border: none;
        outline: none;
        background: none;
    }

    /* Button Style */
    button {
        cursor: pointer;
    }
    
    .bill-border-bottom{
        border-bottom: 2px solid #ccc!important;
    }

    /* ====== POPPINS FONT ====== */
    @font-face {
        font-family: 'Poppins';
        src: url('frontend/fonts/Poppins-Regular.ttf') format('truetype');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
    }


    @font-face {
        font-family: 'Poppins';
        src: url('frontend/fonts/Poppins-Bold.ttf') format('truetype');
        font-weight: 700;
        font-style: normal;
        font-display: swap;
    }


    /* ====== ROBOTO FONT ====== */
    @font-face {
        font-family: 'Roboto';
        src: url('frontend/fonts/Roboto-Regular.ttf') format('truetype');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Roboto';
        src: url('frontend/fonts/Roboto-Bold.ttf') format('truetype');
        font-weight: 700;
        font-style: normal;
        font-display: swap;
    }

    :root {
        --font-heading: 'Poppins', sans-serif;
        --font-body: 'Roboto', sans-serif;
        --primaryColor: #0d6efd;
        --secondaryColor: #6f2bdc;
        --sectionColor: #f8f9fa;
        --buttonPink: #D61F69;
        --buttonPinkHover: #f43f8b;
        --buttonBlue: #1C64F2;
        --buttonBlueHover: #1752c9;
        --white: #fff;
        --black: #111;
        --textMuted: #6c757d;
        --bgColor: #F6F6F6;
    }

    .bg-fuchsia {
        background-color: #D946EF;
    }

    .bg-fuchsia-opacity {
        background-color: rgba(217, 70, 239, 0.7);
    }

    .bg-red {
        background-color: #e11d48;
    }

    .bg-red-opacity {
        background-color: #e11d48b3;
    }

    .bg-cyan {
        background-color: #164e63;
    }

    .bg-cyan-opacity {
        background-color: #164e63b3;
    }

    .bg-green {
        background-color: #15803d;
    }

    .bg-green-opacity {
        background-color: #15803db3;
    }

    .bg-sky-blue {
        background-color: #0284c7;
    }

    .bg-sky-opacity {
        background-color: rgba(2, 132, 199, 0.7);
    }

    .bg-fuchsia-opacity {
        background-color: rgba(217, 70, 239, 0.7);
    }

    .hover-box:hover .icon-zoom {
        transform: scale(1.15);
    }

    .icon-zoom {
        transition: transform 0.3s ease-in-out;
    }

    .bg-fuchsia-orange {
        background-color: #F97316;
    }

    .bg-fuchsia-opacity-orange {
        background-color: rgba(249, 115, 22, 0.7)
    }

    .bg-fuchsia-rose {
        background-color: #ec4899;
        ;
    }

    .bg-fuchsia-opacity-rose {
        background-color: rgba(236, 72, 153, 0.7);
    }

    .bg-success {
        background-color: #0E9F6E !important;
        border-color: #0E9F6E !important;
    }

    .table-secondary {
        border-color: #f3f3f3 !important;
        /* border-color: none!important; */
        --bs-table-bg: #f3f3f3 !important;
        box-shadow: 0 10px 20px #f3f3f3 !important;
        opacity: 1 !important;
    }

    .alert-success {
        --bs-alert-bg: #0E9F6E !important;
        color: #FFF !important;
        height: 40px;
        align-items: center;
        display: flex;
        z-index: 9;
    }

    .alert-dismissible .btn-close {
        top: -11px;
    }


    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: var(--font-heading);
        font-weight: 700;
    }

    p,
    li,
    a,
    span {
        font-family: var(--body-font);
        font-weight: 400;
    }

    /* Error Message CSS Code */
    .err-message {
        position: relative !important;
    }

    .err-button {
        position: absolute !important;
        top: -8px !important;
    }

    .btn-close:focus {
        box-shadow: none !important;
    }

    .pagination {
        margin-top: 9px !important;
    }

    .small,
    small {
        margin-top: -5px !important;
    }

    .page-link:focus {
        box-shadow: none !important;
    }

    /* Header and left sidebar CSS Code==================================================================== */
    .header-auth-name {
        color: {{ $setting->header_text_color }} !important;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: var(--white);
        color: var(--black) !important;
        padding-top: 80px;
        transition: all 0.3s;
        z-index: 1040;
        border-right: 1px solid #dee2e6;
        overflow-y: auto;
        scrollbar-width: none;
    }

    .scroll-arrow {
        position: fixed;
        bottom: 0;
        left: 200px;
        transform: translateX(-50%);
        font-size: 30px;
        color: #888;
        cursor: pointer !important;
        opacity: 0.8;
        z-index: 1000;
        transition: opacity 0.3s ease;
    }

    .scroll-arrow>.fa-bounce {
        color: #ec4899;
    }

    .scroll-arrow.hide {
        opacity: 0;
        pointer-events: none;
    }

    .sidebar.collapsed {
        width: 70px;
    }


    .sidebar a {
        padding: 15px 20px;
        display: block;
        color: var(--black);
        transition: 0.3s;
    }

    .sidebar a:hover {
        background: {{ $setting->menu_color }};
        color: var(--white);
    }

    .sidebar .nav-link i {
        width: 20px;
    }

    .sidebar.collapsed .nav-link span {
        display: none;
    }

    /* Sidebar nav-link animation */
    .sidebar .nav-link {
        transition: all 0.3s ease-in-out;
        transform: scale(1);
    }

    /* On hover - scale up */
    .sidebar .nav-link:hover {
        transform: scale(1.05);
    }


    .sidebar-icon {
        width: 80px !important;
        height: 80px !important;
        object-fit: cover;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        transition: all 0.3s;
    }

    .collapsed+.content {
        margin-left: 70px;
    }

    .topbar {
        position: fixed;
        top: 0;
        left: 0;
        height: 80px;
        width: 100%;
        background: #ffffff;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        z-index: 1050;
    }

    .topbar-image {
        height: 70px;
    }

    .topbar .toggle-btn {
        font-size: 20px;
        cursor: pointer;
    }

    /* .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
    } */

    /* Responsive */
    @media (max-width: 991.98px) {
        .sidebar {
            left: -250px;
        }

        .sidebar.show {
            left: 0;
        }

        .content {
            margin-left: 0;
        }
    }

    .submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 1s ease, opacity 1s ease;
        opacity: 0;
        background: var(--white);
    }

    .submenu.open {
        max-height: 500px;
        opacity: 1;
    }

    .submenu .nav-link {
        padding: 10px 20px;
        font-size: 14px;
        color: var(--black);
    }

    .submenu .nav-link:hover {
        background: {{ $setting->menu_color }};
        color: var(--white);
    }

    .nav-item {
        position: relative;
    }

    .sidebar-toggle {
        position: absolute;
        right: 18px;
        top: 18px;
    }

    .dropdown-item:hover {
        background-color: {{ $setting->header_color }} !important;
        color: var(--white) !important;
    }

    .dropdown {
        border-radius: 0px !important;
        min-width: 180px;
    }

    .dropdown-menu {
        width: 100% !important;
        border-radius: 0px;
    }


    /* Dashboard CSS Code=========================== */
    .dashboard-content {
        padding: 20px 10px 20px 20px !important;
    }

    .dashboard-container {
        background-color: #FFF;
        min-height: 90vh;
        margin-top: 70px !important;
        margin-left: -7px !important;
        border: 1px solid #d3d3d4;
    }

    .active {
        background-color: {{ $setting->header_color }};
        color: var(--white) !important;
    }

    .sactive {
        background-color: rgba(28, 100, 242, 0.12) !important;
        color: var(--buttonBlue) !important;
    }

    .dbox {
        align-items: center;
        justify-content: space-between;
        margin: 0px 20px;
    }

    .dashboard-section .card {
        transition: transform 0.3s ease;
        height: 200px !important;
        cursor: pointer;
    }

    .dashboard-section .card:hover {
        transform: translateY(-5px);
    }

    .dashboard-section .card .icon i {
        opacity: 0.8;
    }

    /* Permission Modal css */
    .permission-modal {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .top-header-logo {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 3px solid #fff;
    }

    /* Table Design CSS Code============================== */

    .btn-danger {
        background-color: var(--buttonPink);
        border-color: var(--buttonPink);
    }

    .product-img {
        max-width: 100px;
        border-radius: 0.25rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .table-add {
        padding: 10px 0px;
    }

    .user-table-add {
        padding: 15px;
    }

    /* Search CSS Code */

    .search-box {
        margin-left: 10px;
    }

    .search-box-input {
        height: 40px !important;
        border: 1px solid #d3d3d4 !important;

    }

    .search-box-input-report {
        height: auto !important;
        border: 1px solid #d3d3d4 !important;

    }

    .date {
        height: auto !important;
        border: 1px solid #d3d3d4 !important;

    }

    .report-heading {
        width: 100% !important;
        border: 1px solid #d3d3d4 !important;

    }

    /* Search CSS Code */
    .search-input-group {
        margin-left: 10px !important;
    }

    .user-search-input-group {
        margin-left: 3px !important;
        width: 250px;
        min-width: 250px !important;
    }

    .search-input-group>span,
    .user-search-input-group>span {
        border: 1px solid #d3d3d4 !important;
    }

    /* Search CSS Code */

    .table-show {
        margin: -3px -15px 0px -20px;
        min-height: 90vh;
        background: white;
        border: 1px solid #d3d3d4;
    }


    .table-edit {
        border: 1px solid #d3d3d4;
        padding: 20px;
        margin: 23px -10px !important;
        min-height: 90vh;
        background: white;
        border: 1px solid #d3d3d4;
    }

    .table-edit>a {
        margin-right: 10px;
    }

    .btn-md {
        margin-right: 10px;
    }

    .bg-success {
        background-color: rgba(15, 183, 107, 0.12) !important;
        color: #26af48 !important;
    }

    /* Login CSS Code================================================= */
    .account-img {
        height: 150px !important;
        width: auto;
        object-fit: cover;
    }

    .login-section {
        background-image: linear-gradient(135deg, {{ $setting->header_color }}, #cfd9df, {{ $setting->menu_color }});
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: var(--font-heading);

    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-style {
        background-color: var(--white);
        padding: 40px 30px;
        border-radius: 18px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 500px;
        animation: fadeIn 1.2s ease-in-out;
    }

    .card-style a>img {
        width: 100%;
        max-width: 150px;
        object-fit: cover;
        margin-bottom: 10px !important;
    }


    .btn-primary:active,
    .btn-primary.active,
    .btn-primary:focus,
    .btn-primary:focus:active {
        background-color: {{ $setting->header_color }} !important;
        border-color: {{ $setting->header_color }} !important;
        box-shadow: none !important;
    }

    .bg-primary:active,
    .bg-primary.active,
    .bg-primary:focus,
    .bg-primary:focus:active {
        background-color: {{ $setting->header_color }} !important;
        border-color: {{ $setting->header_color }} !important;
        box-shadow: none !important;
    }

    .btn:focus-visible {
        color: #FFF;
        background-color: {{ $setting->header_color }} !important;
        border-color: {{ $setting->header_color }} !important;
        outline: 0;
        box-shadow: none !important;
    }

    .btn-check:checked+.btn,
    .btn.active,
    .btn.show,
    .btn:first-child:active,
    :not(.btn-check)+.btn:active {
        background-color: {{ $setting->header_color }} !important;
        border-color: {{ $setting->header_color }} !important;
    }

    .btn-primary:disabled,
    .btn-primary[disabled] {
        background-color: {{ $setting->header_color }} !important;
        border-color: {{ $setting->header_color }} !important;
        opacity: 0.4;
    }

    .btn-primary {
        background-color: {{ $setting->header_color }};
        border-color: {{ $setting->header_color }};
        transition: all 0.3s ease-in-out;
        border-radius: 3px !important;
    }

    .bg-primary {
        background-color: {{ $setting->header_color }} !important;
        border-color: {{ $setting->header_color }};
        transition: all 0.3s ease-in-out;
        border-radius: 10px !important;
    }

    .btn-outline-primary {
        --bs-btn-hover-bg: {{ $setting->menu_color }};
        --bs-btn-border-color: {{ $setting->header_color }};
        --bs-btn-color: {{ $setting->header_color }};
    }

    .btn-primary:hover {
        background-color: {{ $setting->header_color }};
        transform: scale(1.03);
    }

    .form-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
    }


    .form-link {
        color: var(--secondary-color);
        text-decoration: none;
    }

    .form-link:hover {
        text-decoration: underline;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
    }

    /* Register CSS Code============================================================ */
    .register-section {
        background-color: var(--bgColor);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: var(--font-heading);

    }

    /* Loading CSS========================================================================= */
    .all-loading-header {
        height: 200px;
    }

    /* Settings CSS code============================================================== */
    .logo-identity-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .setting-sidebar-left,
    .setting-content {
        display: flex;
        flex-direction: column;
        height: 100%;
        background-color: #fff;
        margin-left: -20px;
        margin-right: -20px;
        min-height: 90vh;
    }

    .setting-sidebar-left {
        border: 1px solid #d3d3d4;
    }

    .setting-sidebar-left h5 {
        color: #1C64F2;
    }

    .setting-sidebar-left a {
        display: block;
        text-decoration: none;
        transition: all 0.3s ease;
        padding: 10px;
        border: 1.5px solid #d3d3d4
    }

    .setting-sidebar-left a:hover {
        color: var(--white) !important;
        background-color: {{ $setting->menu_color }};
    }

    /* Form Section */
    .setting-content {
        background-color: #fff;
        padding: 2rem;
        transition: all 0.3s ease;
        border: 1px solid #dee2e6;
        position: relative;
    }

    .setting-content h4 {
        color: #D61F69;
    }

    .setting-content input,
    .setting-content textarea {
        border-radius: 10px;
    }

    .setting-button {
        margin-left: 13px;
        ;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .setting-sidebar-left {
            min-height: auto;
            border-right: none;
            border-bottom: 1px solid #d3d3d4;
            border-radius: 0px;
        }

        .setting-content {
            padding: 1rem;
            border-radius: 0;
        }

        .setting-sidebar-left,
        .setting-content {
            margin-left: -20px;
            margin-right: -20px;
        }
    }

    /* Scrollbar CSS Code */
    ::-webkit-scrollbar {
        width: 3px;
    }

    /* Scrollbar Track */
    ::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Scrollbar Thumb */
    ::-webkit-scrollbar-thumb {
        background-color: #dee2e6;
        border-radius: 10px;
    }

    ::-webkit-scrollbar {
        height: 3px;
    }

    /* Setting Profile CSS Code */
    .profile-password-sec {
        display: none;
    }

    .profile-button {
        border-radius: 0px !important
    }

    .profile-img-sec {
        width: 150px;
        height: auto;
        object-fit: cover;
    }

    .profile-password-card {
        all: unset;
    }

    .profile-password-card-body {
        background-color: #FFF;
        padding: 0px;
    }

    /* Message CSS */
    .message-user-info {
        min-width: 200px !important;
    }

    .reply-card {
        margin: 0px -15px !important;
        border-radius: 3px !important;
        border: 1px solid #d3d3d4 !important;
    }

    .chat-box {
        background: #FFF;
        border-radius: 15px;
        padding: 15px;
        height: 400px;
        overflow-y: auto;
    }

    .chat-box img {
        object-fit: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    /* User Photo Specific */
    .user-photo {
        margin-right: 0.5rem;
    }

    /* Admin Photo Specific */
    .admin-photo {
        margin-left: 0.5rem;
    }

    /* User Message Bubble */
    .user-message {
        background-color: #f8f9fa;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 75%;
        color: #212529;
    }

    /* Admin Message Bubble */
    .admin-message {
        background-color: {{ $setting->header_color }};
        color: #fff;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 75%;
        text-align: right;
    }


    .message-show {
        text-align: justify;
    }

    .profile-toggle-password {
        position: absolute;
        top: 50px;
        right: 20px;
        cursor: pointer;
        color: #6c757d;
        z-index: 999;
    }

    /* Login CSS */
    @keyframes fadeSlideUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-section {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    .login-section>.login-content {
        margin: 0 !important;
        padding: 0 !important;
        width: 100%;
        max-width: 480px;
    }

    .login-card {
        background-color: #FFF;
        padding: 40px 30px;
        border-radius: 10px;
        width: 100%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        animation: fadeSlideUp 1.5s ease forwards;
    }

    .login-input-email,
    .login-input-password {
        padding-left: 35px !important;
    }

    .form-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #888;
        pointer-events: none;
    }

    .position-relative {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
    }


    h4 {
        text-align: center;
        margin-bottom: 30px;
    }

    /* Responsive fixes */
    @media (max-width: 576px) {
        .login-card {
            padding: 30px 20px;
            border-radius: 8px;
        }

        .login-section {
            padding: 15px;
        }

        .logo-img {
            max-width: 120px;
            height: auto;
        }
    }

    .login-feedback {
        top: -30px;
        z-index: 9;
    }

    .password-feedback {
        top: 45px;
        z-index: 9;
    }

    .msg-code {
        top: -40px;
        right: 0;
    }

    /* Toastr CSS Code */
    #toast-container>.toast-success .toast-progress {
        background-color: #FFF !important;
        opacity: 0.8;
    }

    #toast-container>.toast-error .toast-progress {
        background-color: #FFF !important;
        opacity: 0.8;
    }

    #toast-container>.toast-info .toast-progress {
        background-color: #FFF !important;
        opacity: 0.8;
    }

    #toast-container>.toast-warning .toast-progress {
        background-color: #FFF !important;
        opacity: 0.8;
    }

    /* Role CSS */
    .role-card {
        margin: 0px -15px !important;
        padding: 20px;
        border: 1px solid #d3d3d4;
        border-radius: 3px;
    }

    .role-header-m {
        margin: 0px;
    }

    select.custom-select-highlight {
        background-color: #F3F3F3 !important;
        color: #000;
        border: 1px solid #26af48 !important;
    }

    select.custom-select-highlight:focus {
        background-color: #FFF !important;
        border: 1px solid #26af48 !important;
    }

    .user-select-height {
        height: 100px;
    }

    /* Pagination Color Change */
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

    /* Invoice CSS Code */
    .invoice {
        /* invoice show always */
    }

    /* Print Mode */
    @media print {

        body * {
            visibility: hidden;
        }

        .invoice,
        .invoice * {
            visibility: visible;
        }

        @media print {
            button {
                display: none !important;
            }
        }

        .invoice {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
    }

    .after-line {
        border-bottom: 1px solid #dee2e6;
        margin-top: 5px;
    }

    .table-show {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-show table {
        min-width: 1000px;
    }

    .table-show::-webkit-scrollbar {
        height: 10px;
    }

    .table-show::-webkit-scrollbar-track {
        background: #f0f0f0;
        border-radius: 5px;
    }

    .table-show::-webkit-scrollbar-thumb {
        background-color: #000000;
        border-radius: 5px;
        border: 2px solid #f0f0f0;
    }

    .table-show::-webkit-scrollbar-thumb:hover {
        background-color: #333;
    }

    /* Dashboard Animation */
    .icon-animate {
        position: relative;
        display: inline-block;
    }

    .icon-animate::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50px;
        height: 50px;
        background: radial-gradient(circle, rgba(25, 135, 84, 0.6) 0%, rgba(25, 135, 84, 0) 70%);
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0.8);
        animation: wave 2s infinite;
        z-index: 1;
    }

    @keyframes wave {
        0% {
            transform: translate(-50%, -50%) scale(0.8);
            opacity: 0.8;
        }

        100% {
            transform: translate(-50%, -50%) scale(2);
            opacity: 0;
        }
    }

    .dashboard-hr {
        background-color: #e9e9e9;
    }

    .dashboard-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .dashboard-card .card-body {
        flex-grow: 1;
    }

    .dashboard-card a {
        margin-top: auto;
    }

    .department-card {
        transition: all 0.3s ease;
        background: linear-gradient(145deg, #ffffff, #f1f1f1);
        border: 1px solid #f0f0f0;
    }

    .department-card:hover {
        transform: translateY(-5px) scale(1.03);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        background: linear-gradient(135deg, #e9f0ff, #ffffff);
    }

    .department-card .icon {
        transition: transform 0.3s ease;
    }

    .department-card:hover .icon {
        transform: scale(1.1);
    }

    /* Activity CSS Code */
    .activity-input {
        height: 13px !important;
        margin-bottom: 0px;
    }

    /* USG Report CSS Code */
    .fa-copy {
        cursor: pointer;
        color: {{ $setting->menu_color }};
    }

    /* Doctors CSS Code */
    .doctor-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .doctor-info-commision {
        width: 150px;
    }

    .doctor-info-commision-td {
        width: 25%;
    }

    .table-ten {
        width: 10%;
    }

    /* Doctor History CSS Code */
    .doctor-history-div {
        top: 10px;
        right: 24px;
    }

    /* Patient */
    .patient-table-border {
        border: 1px solid #d3d3d4;
    }


    /* Add Bill CSS Code */
    .employee-identify-ul {
        z-index: 1000;
        max-height: 250px;
        overflow-y: auto;
    }

    .search-investigation-input {
        z-index: 1000;
        max-height: 250px;
        overflow-y: auto;
    }

    .thead-twenty {
        width: 20%;
    }

    .add-bill-header-qrcode-img {
        width: 100%;
        height: 80px;
    }

    .add-bill-qrcode-div {
        position: absolute;
        top: 25px;
        right: 40px;
    }

    .add-bill-qrcode-img {
        width: 60px;
        height: 60px;
    }

    .add-bill-footer-auth {
        display: flex;
        justify-content: space-between;
    }

    .add-bill-footer {
        text-align: center;
        font-size: 10px;
    }

    /* Test history CSS Code */
    .column-twelve {
        padding: 0px;
        border: 1px solid #ccc;
    }

    .test-history-printt-div {
        top: 10px;
        right: 24px;
    }

    /* investigation CSS Code */
    .inv-search-input {
        max-width: 250px;
        min-width: 200px;
    }

    /* Employees */
    .employee-table {
        width: 25%;
    }

    .employee-history {
        width: 150px;
    }

    .employee-history-div {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    /* Expense CSS Code*/
    .expense-date {
        width: 160px;
    }

    .expense-input {
        width: 250px;
    }

    /* Marketing CSS Code */
    .marketing-table {
        width: 25%;
    }

    .marketing-commision-div {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .marketing-commision {
        width: 150px;
    }

    /* Laboraty Print */
    .laboratory-print-qrcode {
        position: absolute;
        top: 20px;
        right: 36px;
    }

    .laboratory-qrcode-img {
        width: 50px;
        height: 50px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 5px;
    }

    .laboratory-patient-details {
        margin: 0 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        line-height: 1.6;
        flex-direction: column;
    }

    .laboratory-patient-div {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center;
    }

    .laboratory-patient-left {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .laboratory-patient-span {
        display: inline-block;
        min-width: 120px;
    }

    .laboratory-patient-right {
        display: flex;
        flex-direction: column;
        text-align: left;
        gap: 2px;
    }

    .laboratory-patient-refer {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .laboratory-patient-strong {
        display: inline-block;
        min-width: 124px;
    }

    .xyar-sig-img {
        width: 100%;
        height: 150px;
    }

    .usg-table {
        border-collapse: collapse;
        width: 100%;
        border-top: 1px solid #ccc;
    }

    .usg-th-tr-first {
        border-bottom: 1px solid #ccc;
    }

    .usg-th-tr-second {
        width: 30%;
        text-align: left;
        border-right: none;
        border-bottom: none;
    }

    .usg-th-tr-third {
        width: 70%;
        border-left: none;
        border-bottom: none;
    }

    /* Billhistory */
    .billhistory-header-img {
        width: 100%;
        height: 80px;
    }

    .billhistory-qrcode-img {
        width: 45px;
        height: 45px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .billhistory-qrcode-div {
        position: absolute;
        top: 20px;
        right: 36px;
    }

    /* add-report */
    .add-report-sms {
        top: 45px;
        right: 15px;
    }

    .d-contents {
        display: contents !important;
    }

    .invoice-heading-text {
        font-size: 12px !important;
    }

    /* Admission CSS List */
    .adm-list-button {
        margin-right: 10px !important;
    }

    /* Consent Css Code */
    .consent-img {
        position: absolute;
        top: -15px;
        left: 250px;
        width: 50px;
    }

    .consent-card {
        background: #fff;
        border: 1px solid #dce3ec;
        border-radius: 8px;
    }

    .form-table td {
        vertical-align: middle;
        font-size: 14px;
        padding: 8px 10px;
        color: #333;
    }

    .table-bordered {
        border: 1px solid #bfc9d4 !important;
    }

    .table-bordered td {
        border: 1px solid #bfc9d4 !important;
    }

    @media print {
        .consent-card {
            box-shadow: none !important;
            border: none !important;
        }

        body {
            background: #fff;
        }
    }
    /* Patient and Marketing CSS Code */
    .bg-primary-modal{
        background-color: {{$setting->header_color}}!important;
    }
    /* Switch */
    .ios-switch .form-check-input {
        width: 55px;
        height: 26px;
        background-color: #c6c6c6;
        border-radius: 20px !important;
        position: relative;
        transition: 0.3s ease-in-out;
        cursor: pointer;
        border: none !important;
    }

    .ios-switch .form-check-input:focus {
        box-shadow: none;
        border-radius: 20px !important;
    }

    .ios-switch .form-check-input:before {
        content: "";
        position: absolute;
        width: 22px;
        height: 22px;
        top: 2px;
        left: 2px;
        background: white;
        border-radius: 50%;
        transition: 0.3s ease-in-out;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* When Active */
    .ios-switch .form-check-input:checked {
        background-color: {{ $setting->header_color }} !important;
        border-radius: 20px !important;
    }

    .ios-switch .form-check-input:checked:before {
        transform: translateX(29px);
    }
</style>
