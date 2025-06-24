@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    {{-- region important custom function --}}
    <script>
        $(function() {
            // region turn every key input to uppercase
            $('.toUpperCase').on('input', function() {
                $(this).val($(this).val().toUpperCase());
            });

            // for desgination appended input tags
            $('.upon-access-info').on('input', '.toUpperCase', function() {
                $(this).val($(this).val().toUpperCase());
            });

            // endregion turn every key input to uppercase

            // region change border to grey / default
            $('input, select').click(function() {
                $(this).css('border-color', 'grey');
            });
            // endregion change border to black / default

            // region format contact number
            // Add an event listener to the input field
            $('#addcliDashcontact_no').on('input', function() {
                // Remove any non-numeric characters from the input value
                let formattedValue = $(this).val().replace(/[^0-9]/g, '');

                // Limit the input to 11 numbers
                if (formattedValue.length > (11)) {
                    formattedValue = formattedValue.slice(0, 11);
                }

                // Apply the pattern (XXXX-XXX-XXXX)
                formattedValue = formattedValue.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');

                // Update the input value with the formatted text
                $(this).val(formattedValue);
            });
            $('.upon-access-info').on('input', '#editcliDashcontact_no', function() {
                // Remove any non-numeric characters from the input value
                let formattedValue = $(this).val().replace(/[^0-9]/g, '');

                // Limit the input to 11 numbers
                if (formattedValue.length > (11)) {
                    formattedValue = formattedValue.slice(0, 11);
                }

                // Apply the pattern (XXXX-XXX-XXXX)
                formattedValue = formattedValue.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');

                // Update the input value with the formatted text
                $(this).val(formattedValue);
            });
            // endregion format contact number

            // region file upload restriction
            $('.attachment_list_required').on('change', '.file_input_tag', function() {
                var allowedFormats = ["application/pdf", "image/jpeg", "image/jpg", "image/png"];
                var maxSizeMB = 9; // Maximum allowed file size in megabytes
                var selectedFile = this.files[0];

                if (selectedFile) {
                    // Check file size
                    if (selectedFile.size > maxSizeMB * 1024 * 1024) {
                        alert("File size exceeds the maximum allowed size of less than" + (maxSizeMB + 1) + "MB.");
                        $('.file_input_tag').val(''); // Clear the input
                    }

                    // Check file format
                    if (!allowedFormats.includes(selectedFile.type)) {
                        alert("Unsupported file format. Please select a PDF, JPEG, or PNG file.");
                        $('.file_input_tag').val(''); // Clear the input
                        return;
                    }
                }
            });
            // endregion file upload restriction
        });
    </script>
    {{-- endregion important custom function --}}

    {{-- region custom css --}}
    <link rel="stylesheet" href="../assets/css/bootstraptemplates/css@3.css">
    <style>
        .carousel-control-prev,
        .carousel-control-next {
            background-color: transparent !important;
            border: 0cm;
        }

        @media screen and (min-width: 768px) {
            #guest_carousel img {
                padding: 0px 0px 0px 0px;
                height: 250px;
            }

            body,
            .header,
            .banner_image,
            .carousel-padding,
            .carousel-item-with-text {
                padding-left: 15%;
                padding-right: 15%;
            }

            .banner_image,
            .carousel-padding {
                padding-top: 0.5%;
                padding-bottom: 1%;
            }

            /* Override carousel style */
            .carousel-caption {
                position: absolute;
                right: 0%;
                bottom: 1rem !important;
                left: 0%;
                padding-top: 1.25rem;
                /* padding-bottom: 1.25rem; */
                color: #fff;
                text-align: center;
            }

            .w-100 {
                width: 200% !important;
            }

            .custom-clock-style-up,
            .custom-clock-style-down {
                padding-right: 15% !important;
            }
        }

        /* will take effect in mobile */
        .banner_image {
            width: 100%;
            padding-top: 1%;
            padding-bottom: 1%;
        }

        /* region horizontal scrolling */
        div.scrollmenu {
            background-image: url('../assets/img/fern_plant.webp');
            background-color: #333;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow: auto;
            white-space: nowrap;
        }

        div.scrollmenu a {
            display: inline-block;
            color: white;
            text-align: center;
            text-decoration: none;
        }

        .activescrollmenu {
            background-color: rgba(119, 119, 119, 0.7);
        }

        div.scrollmenu a:hover {
            background-color: rgba(119, 119, 119, 0.5);
        }

        /* endregion horizontal scrolling */

        /* original pallete */
        .stat_kiosk_header {
            color: #fff;
            /* color: #00796B; */
            font-family: Georgia, Helvetica, sans-serif;
        }

        .stat_kiosk_nav {
            /* background: rgba(255, 255, 255, 0.4) url('../assets/img/denr-protected-area-blur.png');
                                                                                                                            background-color: #333;
                                                                                                                            background-size: cover;
                                                                                                                            background-repeat: no-repeat;
                                                                                                                            background-attachment: fixed; */

            /* original color gradient green to blue */
            /* background: linear-gradient(to bottom right, #4a9485, #4a9485, #328da9, #05a0f2); */

            /* all white */
            background: linear-gradient(to bottom right, #fefefe, #fefefe, #fefefe, #fefefe);
        }

        /* original pallete */

        /* region custom clock style */
        @media screen and (min-width: 2050px) {
            .banner_image {
                width: 88% !important;
            }

            .custom-clock-style-up,
            .custom-clock-style-down {
                padding-right: 0px !important;
                position: absolute;
                color: #000;
                font-family: "Nunito", sans-serif;
                font-size: 15px !important;
                font-weight: normal;
            }

            .custom-clock-style-up {
                top: 2%;
                right: 15%;
            }

            .custom-clock-style-down {
                top: 3.2%;
                right: 15%;
            }
        }

        .custom-clock-style-up,
        .custom-clock-style-down {
            color: #000;
            font-family: "Nunito", sans-serif;
            font-size: 12px;
            font-weight: normal;
        }

        /* endregion custom clock style */
    </style>
    {{-- endregion custom css --}}

    {{-- region carousel style --}}
    <style>
        .container-fluid {
            padding-left: 0px;
            padding-right: 0px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        /* region zoom img tag */
        .zoom-1-item {
            transition: transform 1s;
            /* Animation */
            margin: 0 auto;
        }

        .zoom-1-item p {
            display: none;
        }

        .zoom-1-item a {
            display: none;
        }

        .zoom-1-item:hover {
            transform: scale(1.1);
            z-index: 999;
            color: #000;
            background-color: rgba(101, 206, 185, 0.6);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            padding: 10px 10px;
            border-radius: 5px;
        }

        .zoom-1-item:hover .inner-service-border {
            border: 0 !important;
            padding: 0 !important;
        }

        .zoom-1-item:hover p {
            display: block;
        }

        .zoom-1-item:hover a {
            display: inline;
        }

        /* endregion zoom img tag */

        /* region hr text */
        .hr-container {
            position: relative;
            text-align: center;
        }

        .hr-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            /* Set background color to match your page background */
            padding: 0 10px;
            z-index: 1;
            /* Adjust padding as needed */
        }

        /* endregion hr text */

        /* region carousel image position */
        .carousel-caption img {
            margin-top: 10%;
        }

        @media screen and (max-width: 768px) {
            .carousel-caption {
                top: 1.25rem;
            }

            .carousel-caption {
                width: 70% !important;
            }

            .carousel-caption img {
                margin-top: 50%;
            }
        }

        /* endregion carousel image position */
    </style>
    {{-- endregion carousel style --}}

    {{-- region custom style --}}
    <style>
        .header {
            /* almost black */
            /* background: linear-gradient(to bottom right, #333, #333, #333, #333); */

            /* grey */
            background: linear-gradient(to bottom right, #f7f7f7, #f7f7f7, #f7f7f7, #f7f7f7);
            /* border-bottom: solid #fff 2px; */
            height: 50px;
        }

        .main_container {
            background: rgba(255, 255, 255, 0.4) url('../assets/img/PH-environment_blur.webp');
            background-color: #333;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow: auto;
            white-space: nowrap;
        }

        /* region disable horizontal scrolling */
        html,
        body {
            margin-top: 25px;
            padding: 0;
            max-width: 100%;
            overflow-x: hidden;
            background-color: #f7f7f7;
        }

        /* endregion disable horizontal scrolling */

        /* region service css */

        @media screen and (min-width: 768px) {

            .active-service-container {
                padding-left: 15%;
                padding-right: 15%;
            }
        }

        .active-services {
            color: #149D20;
            font-weight: 700;
            font-size: 20px;
            font-family: 'Montserrat', sans-serif !important;
            margin-top: 2%;
            margin-bottom: 30px;
            border-bottom: 2px solid;
            padding-bottom: 15px;
        }

        /* endregion service css */
    </style>
    {{-- endregion custom style --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu-client')
@endsection
@section('content')

    {{-- region fb embed --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0" nonce="sbto0gAO"></script>
    {{-- endregion fb embed --}}

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 50%; left: 40%; width: 10%; height: 10%;">
    </div>
    {{-- endregion loading indicator --}}

    {{-- region bread crumb --}}
    <div class="row">
        <div class="col p-0">
            <nav aria-label="breadcrumb" class="bg-white shadow stat_kiosk_nav">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item fs-2 px-3 fw-bold stat_kiosk_header" aria-current="page">

                        <img class="banner_image" src="../assets/img/rfsats_banner_black.webp" alt="DENR REGION V">

                        <div class="d-flex flex-row-reverse align-items-center me-2 custom-clock-style-up">
                            <div>
                                Philippine Standard time:
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse align-items-center me-2 custom-clock-style-down">
                            <div>
                                <div class="digital-clock-meridean">xx</div>
                            </div>
                            <div class="px-1">
                                <div class="digital-clock">00:00:00</div>
                            </div>
                            <div>
                                @php date_default_timezone_set('Asia/Manila'); @endphp {{-- Set the timezone to Manila --}}
                                {{ date('D') . ', ' . date('F d, Y') }},
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- endregion bread crumb --}}


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css/bootstraptemplates/carousel.css">
    </head>

    <main class="bg-white">
        
        <br>
        <h3 class="text-danger fw-bold d-flex justify-content-center">ENHANCE REGIONAL ELECTRONIC DOCUMENT TRACKING SYSTEM</h3>

        <div id="guestCarousel" class="carousel slide carousel-padding" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#guestCarousel" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#guestCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#guestCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#guestCarousel" data-bs-slide-to="3" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                {{-- <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url('../assets/img/denr_banner.webp'); background-color: #333; background-size: cover; background-repeat: no-repeat;">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <img src="../assets/img/denr_banner.webp" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div> --}}

                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url('../assets/img/PH-environment_blur.webp'); background-color: #333; background-size: cover; background-repeat: no-repeat;">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-start carousel-item-with-text">
                            <h1>DENR</h1>
                            <p class="opacity-75">Climate change is a reality that will continually grip us if we do not take action. Protecting the country’s peatlands is a solid step that the Department is taking to help reverse the impacts of climate change.</p>
                            <p>— Former DENR Secretary Roy A. Cimatu</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url('../assets/img/reef-manta-ray-tubbataha-reefs-credit-ryan-murray-lamave-1470497.webp'); background-color: #333; background-size: cover; background-repeat: no-repeat; background-position: center;">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption carousel-item-with-text">
                            <h1>Ticao Pass is one of the Bicol Region's marine key biodiversity areas known to be home of filter-feeding megafauna like whale sharks, megamouth sharks and mobulas.</h1>
                            <p>We have so much in Biodiversity. If we take care of our Biodiversity, it is our gift to our planet.</p>
                            <p>— Environmentalist and Former DENR Secretary Gina Lopez</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url('../assets/img/mayon2.webp'); background-color: #333; background-size: cover; background-repeat: no-repeat; background-position: center;">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-end carousel-item-with-text">
                            <h1>❝<br>Preserve and cherish the pale blue dot, the only home we've known.</h1>
                            <p>-Carl Sagan</p>
                            <p><a href="https://www.123rf.com/profile_glebstock" target="_blank">Photo by glebstock</a></p>
                            <a class="btn btn-lg btn-outline-primary" href="client-dashboard-kiosk">View our kiosk</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url('../assets/img/logo.webp'); background-color: #333; background-size: cover; background-repeat: no-repeat; background-position: center;">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-center carousel-item-with-text">
                            <h4>DENR BICOL FACEBOOK PAGE</h4>

                            <div class="row">
                                <div class="col overflow-auto">
                                    <div class="fb-page" data-href="https://www.facebook.com/DENR5Official" data-tabs="timeline" data-width="500" data-height="430" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                        <blockquote cite="https://www.facebook.com/DENR5Official" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DENR5Official">DENR Bicol</a></blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#guestCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#guestCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
                                                                                                                                                                                          ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            {{-- region dark horizontal rule --}}
            <div class="row">
                <div class="col py-2" style="background-color: #149D20">
                    &nbsp;
                </div>
            </div>
            {{-- endregion dark horizontal rule --}}

            <!-- Three columns of text below the carousel -->

            {{-- Original Forest Background --}}
            {{-- <div class="row pt-5" style="background-image: url('../assets/img/PH-environment_blur_transparent.webp'); background-size: cover; background-repeat: no-repeat;"> --}}

            {{-- active service color --}}
            <div class="row active-service-container" style="background-color: #fefefe">
                {{-- svg source: https://www.svgrepo.com/svg/340914/request-quote --}}

                <div class="active-services">
                    <h2>Services Offered</h2>
                </div>

                {{-- KIOSK --}}
                <div class="col-lg-4 zoom-1-item">
                    <div class="inner-service-border border border-2 border-success-subtle rounded p-2 pb-3">
                        <svg fill="#149D20" height="110" width="110" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 470.21 470.21" xml:space="preserve">
                            <g>
                                <path
                                    d="M370.15,369.011c0-2.68-1.429-5.156-3.75-6.496l-89.011-51.394V196.243l41.399-116.665c1.036-2.921,0.17-6.178-2.182-8.197 l-18.642-16.012c-0.348-0.299-0.727-0.571-1.136-0.808L204.071,1.005c-1.938-1.119-4.275-1.315-6.37-0.532 c-2.097,0.781-3.734,2.458-4.467,4.572l-46.378,133.886c-0.273,0.79-0.413,1.62-0.413,2.455v183.107l-42.634,24.619 c-2.321,1.34-3.75,3.816-3.75,6.496c0,0.025,0.005,0.049,0.005,0.073v26.721c0,2.68,1.43,5.156,3.751,6.496l139.136,80.307 c1.16,0.67,2.454,1.004,3.749,1.004s2.59-0.335,3.75-1.005l115.929-66.931c2.319-1.339,3.748-3.813,3.75-6.49 C370.129,395.784,370.15,369.026,370.15,369.011z M262.821,192.443c-0.285,0.806-0.432,1.654-0.432,2.508v196.486l-8.209,4.74 l0.002-199.963L296.555,73.93l6.377,5.478L262.821,192.443z M161.443,142.648l42.992-124.112l79.528,45.917l-44.368,128.042 c-0.273,0.79-0.413,1.62-0.413,2.456l-0.002,201.226l-77.737-44.882V142.648z M146.443,341.815v13.811 c0,2.68,1.43,5.155,3.75,6.495l92.737,53.542c1.16,0.67,2.455,1.005,3.75,1.005s2.59-0.335,3.75-1.005l23.209-13.4 c2.32-1.34,3.75-3.815,3.75-6.495v-67.325l70.259,40.567l-100.949,58.264l-124.14-71.666L146.443,341.815z M115.064,368.6 L239.2,440.263v9.458l-124.136-71.649V368.6z M254.2,449.719v-9.457l100.938-58.257l-0.007,9.441L254.2,449.719z" />
                                <path d="M272.609,63.586L215.001,30.33c-1.938-1.119-4.276-1.313-6.37-0.532c-2.097,0.782-3.734,2.458-4.467,4.573l-37.378,107.918 c-1.177,3.396,0.223,7.15,3.335,8.948l57.588,33.277c1.154,0.667,2.449,1.006,3.752,1.006c0.884,0,1.771-0.156,2.618-0.472 c2.098-0.781,3.736-2.458,4.469-4.572l37.398-107.938C277.123,69.139,275.723,65.384,272.609,63.586z M227.348,166.981 l-44.362-25.634l32.38-93.486l44.378,25.619L227.348,166.981z" />
                                <path d="M227.245,201.846l-46.361-26.788c-3.585-2.073-8.173-0.845-10.246,2.741c-2.072,3.587-0.845,8.174,2.742,10.247 l46.361,26.788c1.182,0.683,2.472,1.008,3.745,1.008c2.591,0,5.111-1.345,6.501-3.749 C232.059,208.506,230.832,203.919,227.245,201.846z" />
                            </g>
                        </svg>
                        <h2 class="fw-normal" style="color: #149D20">KIOSK</h2>
                        <p>This kiosk exclusively showcases DENR-related videos. Explore informative content about the Department of Environment and Natural Resources for an engaging and educational experience.</p>
                        <a class="btn btn-success" href="client-dashboard-kiosk">View page &raquo;</a>
                    </div>
                </div><!-- /.col-lg-4 -->

                {{-- Clien Request --}}
                <div class="col-lg-4 zoom-1-item">
                    <div class="inner-service-border border border-2 border-success-subtle rounded p-2 pb-3">
                        <svg class="bd-placeholder-img" fill="#149D20" width="110" height="110" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            {{-- <rect width="100%" height="100%" fill="var(--bs-secondary-color)" /> --}}

                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: none;
                                    }
                                </style>
                            </defs>
                            <title>request-quote</title>
                            <path d="M22,22v6H6V4H16V2H6A2,2,0,0,0,4,4V28a2,2,0,0,0,2,2H22a2,2,0,0,0,2-2V22Z" transform="translate(0)" />
                            <path d="M29.54,5.76l-3.3-3.3a1.6,1.6,0,0,0-2.24,0l-14,14V22h5.53l14-14a1.6,1.6,0,0,0,0-2.24ZM14.7,20H12V17.3l9.44-9.45,2.71,2.71ZM25.56,9.15,22.85,6.44l2.27-2.27,2.71,2.71Z" transform="translate(0)" />
                            <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" />
                        </svg>
                        <h2 class="fw-normal" style="color: #149D20">Create Request</h2>
                        <p>Dedicated page where clients can formally request essential documents, including but not limited to permits for tree cutting on both public and private lands, chainsaw registration, gratuitous permits, and other related documents.</p>
                        <a class="btn btn-success" href="client-dashboard?active_sidebar=client_dashboard">Go to page &raquo;</a>
                    </div>
                </div><!-- /.col-lg-4 -->

                {{-- Track / Search Document --}}
                <div class="col-lg-4 zoom-1-item">
                    <div class="inner-service-border border border-2 border-success-subtle rounded p-2 pb-3">
                        <svg fill="#149D20" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="110" height="110" viewBox="0 0 224.33 224.33" xml:space="preserve">
                            <g>
                                <path
                                    d="M187.744,119.241c0.67-31.958-24.781-58.503-56.731-59.179c-31.956-0.675-58.506,24.773-59.182,56.727 c-0.01,0.538,0.041,1.035,0.046,1.574h-0.005c0,0.162,0.02,0.324,0.02,0.497c0.021,1.635,0.089,3.28,0.251,4.885 c0.076,0.854,0.218,1.696,0.333,2.539c0.134,0.944,0.249,1.879,0.432,2.793c0.061,0.33,0.086,0.66,0.15,0.98 c0.025,0,0.051,0,0.083,0c0.681,3.199,1.569,6.316,2.755,9.303c-0.036,0-0.079,0-0.114,0c1.627,4.164,3.75,8.079,6.246,11.71 c0.083,0,0.16,0,0.249,0c5.543,7.937,13.01,14.426,21.762,18.783c-0.223,0-0.452,0-0.675,0c6.962,3.585,14.731,5.799,22.988,6.286 c0.011-0.102,0-0.233,0-0.34c0.741,0.046,1.463,0.143,2.214,0.162c6.957,0.138,13.619-1,19.855-3.133v0.346 c5.017-1.706,9.739-4.062,14.035-7.019v-0.365C177.353,155.604,187.327,138.644,187.744,119.241z M128.859,161.414 c-20.439-0.427-37.275-15.011-41.457-34.154c-0.135-0.65-0.294-1.29-0.399-1.94c-0.114-0.7-0.193-1.411-0.276-2.112 c-0.165-1.513-0.302-3.036-0.308-4.601c-0.005-0.508-0.056-0.995-0.045-1.513c0.041-2.021,0.269-4.002,0.582-5.952 c0.02,0,0.038,0,0.058,0c0.696-4.131,1.965-8.056,3.738-11.702c-0.056,0-0.12,0-0.175,0c7.117-14.965,22.503-25.202,40.111-24.829 c6.348,0.135,12.329,1.666,17.712,4.233v0.345c5.393,2.577,10.156,6.233,14.046,10.685V89.53 c6.86,7.868,10.963,18.169,10.729,29.401C172.671,142.864,152.787,161.926,128.859,161.414z M224.33,206.115l-13.086,12.543 l-43.579-45.463l13.081-12.543L224.33,206.115z M66.354,62.162c-10.087,0-20.175,0-30.267,0c-7.274,0-7.274-11.705,0-11.705 c10.092,0,20.18,0,30.267,0C73.633,50.457,73.633,62.162,66.354,62.162z M36.087,81.085c-7.274,0-7.274-11.705,0-11.705 c10.092,0,20.18,0,30.267,0c7.274,0,7.274,11.705,0,11.705C56.267,81.085,46.184,81.085,36.087,81.085z M162.455,98.629v39.374 c-3.442,5.668-8.287,10.37-14.04,13.63V85.025C154.198,88.27,159.027,92.983,162.455,98.629z M148.415,178.678 c4.971-1.554,9.663-3.772,14.04-6.448v44.401H0V5.672h132.271l30.184,29.27v29.432c-4.418-2.684-9.12-4.827-14.04-6.345V42.007 h-23.38V19.715H14.043v182.87h134.371V178.678z M120.958,151.07c-1.889,0-5.748,0-10.841,0c-4.898-2.95-9.084-6.957-12.225-11.71 c10.96,0,19.857,0,23.071,0C128.229,139.365,128.229,151.07,120.958,151.07z M34.505,139.365c4.385,0,19.375,0,35.749,0 c1.435,4.083,3.28,8.003,5.548,11.71c-18.428,0-36.419,0-41.297,0C27.236,151.07,27.236,139.365,34.505,139.365z M120.958,130.067 c-3.626,0-14.559,0-27.518,0c-1.196-3.696-1.846-7.627-1.846-11.71c13.759,0,25.555,0,29.358,0 C128.229,118.357,128.229,130.067,120.958,130.067z M34.505,118.357c4.062,0,17.222,0,32.156,0 c-0.005,3.966,0.338,7.887,1.056,11.71c-15.366,0-29.059,0-33.212,0C27.236,130.067,27.236,118.357,34.505,118.357z M120.958,111.152c-3.747,0-15.208,0-28.66,0c0.81-4.182,2.293-8.128,4.357-11.708c11.522,0,20.972,0,24.303,0 C128.229,99.444,128.229,111.152,120.958,111.152z M34.505,99.444c4.322,0,18.964,0,35.074,0c-1.201,3.77-2.064,7.68-2.531,11.708 c-15.097,0-28.444,0-32.542,0C27.236,111.152,27.236,99.444,34.505,99.444z M90.69,181.573c-7.274,0-7.274-11.699,0-11.699 c0.858,0,1.716,0,2.574,0c8.77,6.256,18.951,10.115,29.754,11.263c-0.604,0.244-1.279,0.437-2.057,0.437 C110.865,181.573,100.783,181.573,90.69,181.573z" />
                            </g>
                        </svg>
                        <h2 class="fw-normal" style="color: #149D20">Track Document</h2>
                        <p>Search requested document using there document tracking number.</p>
                        <a class="btn btn-success" href="client-dashboard-doc-tracking">Go to page &raquo;</a>
                    </div>
                </div><!-- /.col-lg-4 -->

                <hr>

            </div><!-- /.row -->

            <!-- START THE FEATURETTES -->
            {{-- <div class="hr-container">
                <h3 class="hr-text">FEATURES</h3>
                <hr class="featurette-divider">
            </div>

            <div class="row mx-5 featurette mt-3">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Climate Change Wreaking havoc: <a class="text-body-secondary">Misery</a></h2>
                    <p class="lead">The earth is now polluted due to destructive human activities. These activities contribute to the worsening effects of climate change including increase in temperature, drought, typhoons, landslide, wildfires, among others. Such catastrophes continue to threaten lives and properties all over the globe. <br><a href="https://r5.denr.gov.ph/index.php/news-events/features">read more . . . </a></p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" style="background-image: url('../assets/img/FEATURE_STORY_-_THE_REAL_FIGHT_2.webp'); background-color: #333; background-size: cover; background-position: center; background-repeat: no-repeat;" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row mx-5 featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Long term fight</h2>
                    <p class="lead">Now, that the world is facing climate crisis, we should acknowledge the fact that we have a stronger enemy – the environment. The National Aeronautics and Space Administration (NASA) has proven that climate change does exist. According to NASA, human activities since the mid-20th century affected the climate system of the Earth, which resulted to global temperature rise, warming ocean, ocean acidification and sea level rise. <br><a
                            href="https://r5.denr.gov.ph/index.php/news-events/features">read more . . . </a></p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" style="background-image: url('../assets/img/FEATURE_STORY_-_THE_REAL_FIGHT_3.webp'); background-color: #333; background-size: cover; background-position: center; background-repeat: no-repeat;" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row mx-5 featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Nature’s Combatants<span class="text-body-secondary"></span></h2>
                    <p class="lead">
                        On the brighter side, the Department of Environment and Natural Resources (DENR) and other concerned agencies and organizations are doing its best to safeguard the environment, allowing the earth to regain its health to ensure environment sustainability for everyone.
                        <br><a href="https://r5.denr.gov.ph/index.php/news-events/features">read more . . . </a>
                    </p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" style="background-image: url('../assets/img/FEATURE_STORY_-_THE_REAL_FIGHT_4.webp'); background-color: #333; background-size: cover; background-position: center; background-repeat: no-repeat;" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg>
                </div>
            </div> --}}

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->
        </div><!-- /.container -->


        {{-- region stop ajax loading --}}
        <script type="text/javascript">
            window.onload = function() {
                document.getElementById('loadingLogo').style.display = "none";
            }
        </script>
        {{-- endregion stop ajax loading --}}

        {{-- region navbar text display --}}
        <script>
            $(function() {
                $('.navbar-brand-img').hide();
                $('.navbar-brand-govph').show();
                $('.navbar-brand-label').hide();
                $('.navbar-brand-label-small').hide();
            });
        </script>
        {{-- endregion navbar text display --}}

        {{-- region fetch carousel --}}
        <script>
            $(function() {
                $.ajax({
                    url: "fetch-carouselImgs",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function(r) {
                        if (r.success) {
                            let firstActive = true;
                            // $('.carousel-inner').empty();
                            let carouselindicators = 4;

                            r.imgs.forEach(dt => {
                                let file_path = dt.file_path + '' + dt.file_name;
                                let status = '';
                                if (firstActive == true) {
                                    status = 'active';
                                    firstActive = false;
                                } else {
                                    status = '';
                                }

                                // carousel indicators
                                $('.carousel-indicators').append('<button type="button" data-bs-target="#guestCarousel" class="' + status + '" data-bs-slide-to="' + carouselindicators + '" aria-label="Slide ' + carouselindicators + '"></button>');
                                carouselindicators += 1;

                                file_path_tlrd = file_path.replaceAll("\\", '/');
                                if (dt.file_path != '') {
                                    $('.carousel-inner').append('' +
                                        '<div class="carousel-item ' + status + '"> ' +
                                        '    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url(\'../' + file_path_tlrd + '\'); background-color: #333; background-size: cover; background-repeat: no-repeat;"> ' +
                                        '        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" /> ' +
                                        '    </svg> ' +
                                        '    <div class="container"> ' +
                                        '        <div class="carousel-caption text-start" style="width: 50%; /* margin: auto; */"> ' +
                                        '            <a href="../' + file_path_tlrd + '" target="_blank"> ' +
                                        '               <img src="../' + file_path_tlrd + '" class="d-block w-100" alt="..."> ' +
                                        '            </a> ' +
                                        '        </div> ' +
                                        '    </div> ' +
                                        '</div> '
                                    );
                                } else {
                                    $('.carousel-inner').append('' +
                                        '<div class="carousel-item ' + status + '"> ' +
                                        '    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url(\'../assets/img/denr_banner.webp\'); background-color: #333; background-size: cover; background-repeat: no-repeat;"> ' +
                                        '        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" /> ' +
                                        '    </svg> ' +
                                        '    <div class="container"> ' +
                                        '        <div class="carousel-caption text-start" style="width: 50%; /* margin: auto; */"> ' +
                                        '            <a href="' + file_path_tlrd + '" target="_blank"> ' +
                                        '               <img src="' + file_path_tlrd + '" class="d-block w-100" alt="..."> ' +
                                        '            </a> ' +
                                        '        </div> ' +
                                        '    </div> ' +
                                        '</div> '
                                    );
                                }
                            });
                        }
                    },
                    error: function(err) {
                        console.log(r);
                    }
                });

                /* $.ajax({
                    url: "/log-cli-dash-home-visitor",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function(r){
                        if(r.success){
                            console.log(r);
                        }
                    },
                    error: function(err){
                        console.log(err);
                    }
                }); */
            });
        </script>
        {{-- endregion fetch carousel --}}
    @endsection
