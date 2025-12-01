<style>
    /* ============ 992px and Up ============ */
    @media (min-width: 992px) {
        .header-title {
            font-size: 28px;
        }

        .navbar-nav .dropdown:hover>.dropdown-menu {
            display: block;
            margin-top: 0;
        }

        .navbar-nav .dropdown .dropdown-toggle::after {
            display: none;
        }

        .dropdown-menu {
            opacity: 0;
            transform: translateY(-15px);
            transform-origin: top center;
            transition: opacity 0.5s ease, transform 0.5s ease;
            display: block !important;
            pointer-events: none;
        }

        .dropdown:hover>.dropdown-menu {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .dropdown-toggle {
            cursor: pointer;
        }

        .dropdown-item {
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: color 0.3s ease;
        }

        .dropdown-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background-color: #FFF;
            /* orange-like background */
            transition: width 0.5s ease;
            z-index: -1;
        }

        .dropdown-item:hover::before {
            width: 100%;
        }

        .dropdown-item:hover {
            color: #000;
        }

        .navbar-toggler i {
            font-size: 1.5rem;
        }




    }


    /* ============ Below 768px ============ */
    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.6rem;
        }

        .header-title {
            font-size: 24px;
            text-align: left;
            width: auto;
            margin-top: 0;
        }

        .contact-info-wrapper {
            align-items: flex-end;
        }

        .contact-phone {
            font-size: 18px;
            margin-bottom: 0;
        }

        .datetime-text {
            font-size: 15px;
        }
    }
</style>
