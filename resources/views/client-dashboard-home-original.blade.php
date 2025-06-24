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
    <style>
        .carousel-control-prev,
        .carousel-control-next {
            background-color: transparent !important;
            border: 0cm;
        }

        @media screen and (min-width: 768px) {

            #guest_carousel img {
                padding: 0px 0px 0px 0px;
                height: 300px;
            }

            .main_container,
            .header,
            .banner_image,
            .carousel-padding,
            .fixedweatherwidget,
            .padding-x-15 {
                padding-left: 15% !important;
                padding-right: 15% !important;
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
                bottom: 1.25rem;
                left: 0%;
                padding-top: 1.25rem;
                padding-bottom: 1.25rem;
                color: #fff;
                text-align: center;
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
                top: 3.6%;
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
            /* background: rgba(255, 255, 255, 0.4) url('../assets/img/PH-environment_blur.webp'); */
            background-color: #f7f7f7;
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

        /* region active services */
        .active-services {
            /* color: #149D20;
                                                    font-weight: 700;
                                                    font-family: 'Montserrat', sans-serif !important; */
            /* margin-top: 2%; */
            /* margin-bottom: 30px; */
            /* border-bottom: 2px solid; */
            /* padding-bottom: 15px; */
        }

        .active-services h4 {
            color: #149D20;
            font-weight: 700;
            /* font-size: 20px; */
            font-family: 'Montserrat', sans-serif !important;
        }

        /* endregion active services */
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
            <nav aria-label="breadcrumb" class="bg-white shadow stat_kiosk_nav" style="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item fs-2 px-3 fw-bold stat_kiosk_header" aria-current="page">
                        <a href="/" target="_self">
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
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- endregion bread crumb --}}

    {{-- region dark horizontal rule --}}
    <div class="row">
        <div class="col py-2" style="background-color: #f7f7f7f7">
        </div>
    </div>

    <div class="row pb-5 bg-light shadow main_container">
        {{-- <div class="col-md-12 mt-2 main_content"> --}}
        {{-- region horizontal scrolling --}}
        {{-- <div class="scrollmenu text-center border border-2 border-white">
                <a class="fw-bolder border btn btn-outline-secondary m-2 activescrollmenu" href="client-dashboard-home?active_sidebar=client-dashboard-home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                <a class="fw-bolder border btn btn-outline-secondary m-2" href="client-dashboard?active_sidebar=client_dashboard"><i class="fa fa-plus" aria-hidden="true"></i> Create Request</a>
                <a class="fw-bolder border btn btn-outline-secondary m-2" href="client-dashboard-doc-tracking"><i class="fa fa-search" aria-hidden="true"></i> Track Application</a>
            </div> --}}
        {{-- endregion horizontal scrolling --}}
        {{-- </div> --}}

        {{-- region video presentation --}}
        <div class="col-md-8 mt-2 main_content">
            <div class="active-services">
                <h4>FEATURED VIDEOS</h4>
            </div>

            <div class="bg-dark">
                {{-- youtube embed --}}
                <iframe class="d-block w-100 border border-2 border-white" src="https://www.youtube-nocookie.com/embed/3KUTligbwls?playlist=3KUTligbwls,xpn17isG1eQ,wM8A9yBAioM,RUATGCTusIo,3tFcCL0Orh8,ow25S6wl7As,WmB2kKCM4Hg,BC9vF3qhmt4,YK2XYU1zTGk&autoplay=1&iv_load_policy=3&loop=1&modestbranding=1&start=" frameborder="0" id="clientdashboardyoutube" style="width: 800px; height: 700px"></iframe>
            </div>
        </div>
        {{-- endregion video presentation --}}

        {{-- region right side bar --}}
        <div class="col-md-4 mt-2  main_content">

            {{-- region side bar vid --}}
            {{-- <div class="row mb-3"> --}}
            {{-- <div class="col"> --}}
            {{-- <iframe class="border border-2 border-white" src="https://www.youtube-nocookie.com/embed/ryFkPu3mFEw?playlist=ryFkPu3mFEw,gV7z9BLFYC0,JzUhJRpSOVk-pjw&autoplay=1&iv_load_policy=3&loop=1&modestbranding=1&start=" frameborder="0" id="clientdashboardyoutube" style="width: 100%; height: 205px"></iframe> --}}
            {{-- Live youtube frame --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- endregion side bar vid --}}

            {{-- region carousel --}}
            <div class="row">
                <div class="col">
                    <div class="active-services">
                        <h4>ANNOUNCEMENTS & EVENTS</h4>
                    </div>

                    <div id="guest_carousel" class="carousel slide carousel-fade border border-2 border-white" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            {{-- populate data --}}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#guest_carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#guest_carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- endregion carousel --}}

            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="active-services">
                        <h4>MAP KIOSK</h4>
                    </div>

                    <div class="content-fluid">
                        <iframe class="border border-2 border-white" src="client-dashboard-map" frameborder="0" id="clientdashboardmap" style="width: 100%; height: 338px"></iframe>
                    </div>
                </div>
            </div>
        </div>
        {{-- region right side bar --}}

        {{-- region map display --}}
        {{-- <div class="col-md-12 mt-4">
            <div class="content-fluid">
                <iframe class="border border-2 border-white" src="client-dashboard-map" frameborder="0" id="clientdashboardmap" style="width: 100%; height: 500px"></iframe>
            </div>
        </div> --}}

        <div class="col-md-12 mt-4">
            <div class="content-fluid">
                <div class="active-services">
                    <h4>WEATHER FORECAST</h4>
                </div>
                <iframe class="border border-2 border-white" width="100%" height="500px" src="https://embed.windy.com/embed.html?type=map&location=coordinates&metricRain=in&metricTemp=°C&metricWind=km/h&zoom=7&overlay=wind&product=ecmwf&level=surface&lat=13.24&lon=123.047&detailLat=13.464&detailLon=123.256&marker=true&message=true" frameborder="0"></iframe>
            </div>
        </div>
        {{-- endregion map display --}}


        {{-- region fb plugin --}}
        <div class="col-md-6">
            <div class="active-services">
                <h4>DENR OFFICIAL FACEBOOK PAGE</h4>
            </div>

            <div class="fb-page" data-href="https://www.facebook.com/DENROfficial" data-tabs="timeline" data-width="500" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/DENROfficial" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DENROfficial">DENR Bicol</a></blockquote>
            </div>
        </div>
        {{-- region fb plugin --}}
        <div class="col-md-6">
            <div class="active-services">
                <h4>DENR BICOL FACEBOOK PAGE</h4>
            </div>

            <div class="fb-page" data-href="https://www.facebook.com/DENR5Official" data-tabs="timeline" data-width="500" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/DENR5Official" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DENR5Official">DENR Bicol</a></blockquote>
            </div>
        </div>
        {{-- endregion fb plugin --}}
    </div>

    {{-- region fixed bottom weather widget --}}
    {{-- {{-- <div style="position: fixed; bottom: 0; left: 0; z-index: 9999; width: 100%;" id="ww_b3478f8af14ed" v='1.3' loc='auto' a='{"t":"ticker","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFB300","cl_font":"#000000","cl_cloud":"rgba(156,61,84,1)","cl_persp":"#000000","cl_sun":"#000000","cl_moon":"#000000","cl_thund":"#000000"}'> More forecasts: <a href="https://oneweather.org/de/deutschland/30_tage/" id="ww_b3478f8af14ed_u" target="_blank"> Wetter 30 tage Deutschland </a>
    </div>
    <script async src="https://app2.weatherwidget.org/js/?id=ww_b3478f8af14ed"></script> --}}
    <div style="position: fixed; bottom: 0; left: 0; z-index: 9999; width: 100%;" class="p-0 m-0">
        <a class="btn btn-outline-success btn-sm" data-bs-toggle="collapse" href="#fixedweatherwidget" role="button" aria-expanded="false" aria-controls="fixedweatherwidget" tooltip="Toggle weather forecast" flow="right">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </a>
        <div class="collapse p-0 m-0 show" id="fixedweatherwidget">
            <div class="card card-body p-0 m-0 fixedweatherwidget">
                <div id="ww_f83d6f0521619" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":["wl5260"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFFFFF","cl_font":"#000000","cl_cloud":"#d4d4d4","cl_persp":"#2196F3","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#0000000a"}'><a href="https://weatherwidget.org/" id="ww_f83d6f0521619_u" target="_blank">Free weather widget</a></div>
                <script async src="https://app2.weatherwidget.org/js/?id=ww_f83d6f0521619"></script>
            </div>
        </div>
    </div>
    {{-- endregion fixed bottom weather widget --}}

    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}

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
                        $('.carousel-inner').empty();
                        r.imgs.forEach(dt => {
                            let file_path = dt.file_path + '' + dt.file_name;
                            let status = '';
                            if (firstActive == true) {
                                status = 'active';
                                firstActive = false;
                            } else {
                                status = '';
                            }

                            if (dt.file_path != '') {
                                $('.carousel-inner').append('' +
                                    '<div class="carousel-item ' + status + '"> ' +
                                    '    <img src="../' + file_path + '" class="d-block w-100" alt="..."> ' +
                                    '</div> '
                                );
                            } else {
                                $('.carousel-inner').append('' +
                                    '<div class="carousel-item ' + status + '"> ' +
                                    '    <img src="' + file_path + '" class="d-block w-100" alt="..."> ' +
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
        });
    </script>
    {{-- endregion fetch carousel --}}

    {{-- region change url --}}
    {{-- <script>
        $(function() {
            s();

            function s() {
                window.history.pushState({}, '', '?regionalfrontlineservicesapplicationtrackingsystem');
            }
        });
    </script> --}}
    {{-- endregion change url --}}

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
@endsection
