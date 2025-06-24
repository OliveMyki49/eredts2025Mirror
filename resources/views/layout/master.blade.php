<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />

    {{-- Google search engine verifier --}}
    <meta name="google-site-verification" content="b8IPLIwDQsqDlpfwkDs0FsPPFJHCwM_z9tUbnBTkEy4" /> {{-- duckdns --}}
    <meta name="google-site-verification" content="7tWxAsGd_RD1BOclAu_4jm2_lQoaLcwOcZuA7j77SHg" /> {{-- ip --}}
    <meta name="google-site-verification" content="e1xY0U2_Tehe9edIakfeQj5zgQXkFIPqq4xgUzL7voE" /> {{-- govt.hu --}}

    {{-- Bing Search Console --}}
    <meta name="msvalidate.01" content="1D2B3CE63A23A648706FECB2182837BF" /> {{-- duckdns --}}

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logoAlone.webp">
    <link rel="icon" href="../assets/img/logoAlone.webp" type="image/x-icon">
    <link rel="icon" type="image/png" href="../assets/img/logoAlone.webp">
    <title>EREDTS - @yield('title')</title>

    @if (file_exists(public_path('assets/js/jquery.3.2.1.min.js')))
        <link href="{{ url('assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/all.min.css') }}" rel="stylesheet" />

        <link href="{{ url('assets/css/datatables.min.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/layout.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/headers.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/login.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/card.css') }}" rel="stylesheet" />

        <link href="{{ url('assets/css/codePenMagicToolTip.css') }}" rel="stylesheet" />

        <script src="{{ url('assets/js/jquery.3.2.1.min.js') }}"></script>
    @else
        <link href="../assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/all.min.css" rel="stylesheet" />

        <link href="../assets/css/datatables.min.css" rel="stylesheet" />
        <link href="../assets/css/layout.css" rel="stylesheet" />
        <link href="../assets/css/headers.css" rel="stylesheet" />
        <link href="../assets/css/login.css" rel="stylesheet" />
        <link href="../assets/css/card.css" rel="stylesheet" />

        <script src="../assets/js/jquery.3.2.1.min.js"></script>
    @endif

    <style>
        #nav-bar {
            height: 100%;
        }

        nav::-webkit-scrollbar {
            width: 4px;
            /* adjust the width as needed */
            height: 7px;
            /* adjust the height as needed */

        }

        nav::-webkit-scrollbar-thumb {
            background-color: #ccc;
            /* adjust the color as needed */
        }

        .sidebar {
            overflow-y: auto;
            overflow-x: auto;
            margin-bottom: 0;
            position: relative;
        }

        /* #region hide menu modal display */
        .btn_header_toggle {
            display: none;
        }

        /* #endregion hide menu modal display */

        label.navbar-brand-label {
            font-size: 18px;
            font-weight: bold;
        }

        img.navbar-brand-img-algn {
            margin-top: 10px;
        }

        label.navbar-brand-label-small {
            display: none;
        }

        @media screen and (max-width: 768px) {

            /* .header_img_desktop, */
            /* .header_uname_desktop */
            .header_toggle,
            .open-messenger {
                display: none;
            }

            .btn_header_toggle {
                display: block;
            }

            /* .container-navbar {
                text-align: center;
            } */

            .navbar-brand-img {
                height: 30px;
            }

            label.navbar-brand-label {
                /* font-size: 12px;
                font-weight: bold; */
                display: none;
            }

            img.navbar-brand-img-algn {
                margin-top: 0px;
            }

            label.navbar-brand-label-small {
                display: inline;
                font-size: 20px;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
                /* margin-right: 30px; */
            }

            .container-psipop {
                width: 100%;
                padding-right: var(--bs-gutter-x, 0.75rem);
                padding-left: var(--bs-gutter-x, 0.75rem);
                margin-right: auto;
                /* margin-left: 10%; */
            }

            .active_side_bar {
                color: rgb(8, 160, 242);
                ;
                /* color: #4a9485; */
            }

            .nav_link:hover i.nav_icon {
                color: white !important;
            }
        }

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 100%;
        }

        /* region labels and input tag */
        label.form-label {
            background-color: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* input.form-control,
        select.form-control {
            padding: 1px 4px 1px 4px !important;
        } */

        /* endregion labels and input tag */

        /* region Customize the group of row styles */
        table.dataTable tr.dtrg-group.dtrg-level-0 th,
        table.dataTable tr.dtrg-group.dtrg-level-0 td {
            font-weight: bold;
            background-color: cadetblue;
            border: 1px solid black;
            color: white;
        }

        /* endregion Customize the group of row styles */

        /* region zoom img tag */
        .zoom {
            transition: transform .2s;
            /* Animation */
            margin: 0 auto;
        }

        .zoom:hover {
            transform: scale(2);
            z-index: 999;
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }

        /* endregion zoom img tag */
    </style>

    {{-- region offline connection no internet animation --}}
    <style>
        @keyframes skew-y-shakeing {
            0% {
                transform: skewY(-15deg);
            }

            5% {
                transform: skewY(15deg);
            }

            10% {
                transform: skewY(-15deg);
            }

            15% {
                transform: skewY(15deg);
            }

            20% {
                transform: skewY(0deg);
            }

            100% {
                transform: skewY(0deg);
            }
        }

        .skew-y-shakeing { display: inline-block; animation: skew-y-shakeing 1s infinite; }
    </style>
    {{-- endregion offline connection no internet animation --}}

    {{-- region alert overdue animation --}}
    <style>
        .badge-status-overdue {
            animation: blink-animation 1s infinite; /* Apply blinking animation */
            color: white; /* Text color */
            background-color: #dc3545; /* Danger color (red) */
            padding: 5px 10px; /* Padding for badge */
            border-radius: 5px; /* Rounded corners */
            font-weight: bold; /* Bold text */
        }

        @keyframes blink-animation {
            0% { opacity: 1; } /* Fully visible */
            50% { opacity: 0; } /* Hidden */
            100% { opacity: 1; } /* Visible again */
        }
    </style>
    {{-- endregion alert overdue animation --}}

    @yield('head_extension')
</head>

<body class="g-sidenav-show bg-gray-200">
    @yield('sidebar')
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="container-fluid py-1 px-1">
        @include('layout.footer')
    </div>


    @if (file_exists(public_path('assets/js/layout.js')))
        <script src="{{ url('assets/js/fontawesome.js') }}"></script>
        <script src="{{ url('assets/js/layout.js') }}"></script>
        <script src="{{ url('assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_js_bootstrap.bundle.min.js') }}"></script>
    @else
        {{-- <script src="../assets/js/jquery.dataTables.min.js"></script> --}} {{-- moved in the admin dash --}}
        <script src="../assets/js/fontawesome.js"></script>

        <script src="../assets/js/layout.js"></script>
        {{-- <script src="../assets/js/datatables.min.js"></script> --}} {{-- moved in the admin dash --}}
        {{-- <script src="../assets/js/pdfmake.min.js"></script> --}}
        {{-- <script src="../assets/js/vfs_fonts.js"></script> --}}

        <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_js_bootstrap.bundle.min.js"></script>
    @endif
</body>

</html>
