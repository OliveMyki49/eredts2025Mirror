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
                height: 287px;
            }

            body,
            .header {
                padding-left: 16px;
            }
        }

        /* region horizontal scrolling */
        div.scrollmenu {
            background-image: url('../assets/img/fern_plant.jpg');
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
            color: #00796B;
            font-family: Georgia, Helvetica, sans-serif;
        }

        .stat_kiosk_nav {
            background: rgb(239, 239, 239);
            background: linear-gradient(90deg, rgba(239, 239, 239, 1) 0%, rgb(0, 121, 107) 100%, rgba(0, 212, 255, 1) 100%);
        }

        /* original pallete */
    </style>
    {{-- endregion custom css --}}

    {{-- region halloween styles --}}
    <style>
        .header {
            background: linear-gradient(to bottom right, #EEB76B, #E2703A, #9C3D54, #310B0B);
        }

        .stat_kiosk_nav {
            background: rgb(239, 239, 239);
            background: linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(226, 112, 58) 100%, rgba(156, 61, 84, 1) 100%);
        }

        .stat_kiosk_header {
            color: #E2703A;
            font-family: Georgia, Helvetica, sans-serif;
        }

        div.scrollmenu {
            background-image: url('../assets/img/halloween_imgs/halloween.png');
        }

        .main_content {
            /* background: rgba(255, 255, 255, 0.4) url('../assets/img/halloween_imgs/pumpkins.jpg'); */
            /* background-color: #333;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; */
            overflow: auto;
            white-space: nowrap;
        }

        /* region bird animation */
        .bird {
            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/174479/bird-cells-new.svg');
            filter: invert(34%) sepia(55%) saturate(427%) hue-rotate(141deg) brightness(93%) contrast(91%);
            background-size: auto 100%;
            width: 88px;
            height: 125px;
            will-change: background-position;

            animation-name: fly-cycle;
            animation-timing-function: steps(10);
            animation-iteration-count: infinite;
        }

        .bird-one {
            animation-duration: 1s;
            animation-delay: -0.5s;

        }

        .bird-two {
            animation-duration: 0.9;
            animation-delay: -0.75.s;

        }

        .bird-three {
            animation-duration: 1.25s;
            animation-delay: -0.25s
        }

        .bird-four {
            animation-duration: 1.1s;
            animation-delay: -0.5s;
        }

        .bird-container {
            position: absolute;
            top: 10%;
            left: -3%;
            transform: scale(0) translateX(-10vw);
            will-change: transform;

            animation-name: fly-right-one;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        .bird-container-one {
            animation-duration: 15s;
            animation-delay: 0;
        }

        .bird-container-two {
            animation-duration: 16s;
            animation-delay: 1s;
        }

        .bird-container-three {
            animation-duration: 14.6s;
            animation-delay: 9.5s;
        }

        .bird-container-four {
            animation-duration: 16s;
            animation-delay: 10.25s;
        }

        /* @keyframes fly-cycle {
            100%{
                background-position: -3600px 0;
            }
        } */
        @keyframes fly-cycle {

            100% {
                background-position: -900px 0;
            }

        }

        @keyframes fly-right-one {

            0% {
                transform: scale(0.3) translateX(-10vw);
            }

            10% {
                transform: translateY(2vh) translateX(10vw) scale(0.4);
            }

            20% {
                transform: translateY(0vh) translateX(30vw) scale(0.5);
            }

            30% {
                transform: translateY(4vh) translateX(50vw) scale(0.6);
            }

            40% {
                transform: translateY(2vh) translateX(70vw) scale(0.6);
            }

            50% {
                transform: translateY(0vh) translateX(90vw) scale(0.6);
            }

            60% {
                transform: translateY(0vh) translateX(110vw) scale(0.6);
            }

            100% {
                transform: translateY(0vh) translateX(110vw) scale(0.6);
            }

        }

        @keyframes fly-right-two {

            0% {
                transform: translateY(-2vh) translateX(-10vw) scale(0.5);
            }

            10% {
                transform: translateY(0vh) translateX(10vw) scale(0.4);
            }

            20% {
                transform: translateY(-4vh) translateX(30vw) scale(0.6);
            }

            30% {
                transform: translateY(1vh) translateX(50vw) scale(0.45);
            }

            40% {
                transform: translateY(-2.5vh) translateX(70vw) scale(0.5);
            }

            50% {
                transform: translateY(0vh) translateX(90vw) scale(0.45);
            }

            51% {
                transform: translateY(0vh) translateX(110vw) scale(0.45);
            }

            100% {
                transform: translateY(0vh) translateX(110vw) scale(0.45);
            }

        }

        /* endregion bird animation */

        /* region spider crawling */
        .spider_container {
            display: flex;
            position: fixed;
            left: 0;
            bottom: -100px;
            width: 30%;
            pointer-events: none;
            transform: rotate(30deg);
        }

        .fog {
            min-width: 0px;
            right: 170px;
            position: relative;
            animation-name: fog;
            animation-direction: left;
            animation-iteration-count: infinite;
            animation-timing-function: linear
        }

        @keyframes fog {
            from {
                left: 0px;
            }

            to {
                left: 500px;
            }
        }

        /* region spider crawling */

        /* region ghost */
        .ghost {
            display: flex;
            position: fixed;
            z-index: 2;
            right: -273px;
            bottom: -200px;
            width: 30%;
            pointer-events: none;
            transform: rotate(347deg);
            animation-name: ghost_anim;
            animation-duration: 4s;
        }

        .ghost img {
            opacity: 0.7;
        }

        @keyframes example {
            0% {
                right: -263px;
                bottom: -142px;
            }

            100% {
                right: -263px;
                bottom: -142px;
            }
        }

        /* endregion ghost */

        /* region disable horizontal scrolling */
        html,
        body {
            padding: 0;
            max-width: 100%;
            overflow-x: hidden;
            background-color: #9c3d541c;
        }
        /* endregion disable horizontal scrolling */
    </style>
    {{-- endregion halloween styles --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu-client')
@endsection
@section('content')

    {{-- region ghost --}}
    {{-- <div class="ghost">
        <img class="fog" src="../assets/img/halloween_imgs/spooker.gif" />
    </div> --}}
    {{-- endregion ghost --}}

    {{-- region birds --}}
    <div class="bird-container bird-container-one" style="z-index: 9999;">
        <div class="bird bird-one"></div>
    </div>
    <div class="bird-container bird-container-two" style="z-index: 9999;">
        <div class="bird bird-two"></div>
    </div>
    <div class="bird-container bird-container-three" style="z-index: 9999;">
        <div class="bird bird-three"></div>
    </div>
    <div class="bird-container bird-container-four" style="z-index: 9999;">
        <div class="bird bird-four"></div>
    </div>
    {{-- region birds --}}

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 20%; left: 20%; width: 50%; height: 50%;">
    </div>
    {{-- endregion loading indicator --}}

    {{-- region bread crumb --}}
    <div class="row">
        <div class="col p-0">
            <nav aria-label="breadcrumb" class="bg-white shadow pt-3 mt-1 stat_kiosk_nav" style="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item fs-2 px-2 fw-bold stat_kiosk_header" aria-current="page">
                        STATISTICAL KIOSK
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- endregion bread crumb --}}


    {{-- region banner message --}}
    <div class="scrollmenu text-center">
        <span class="text-white fw-bold" style="font-size: 3vw" data-bs-toggle="collapse" href="#collapsibleMenuBar" role="button" aria-expanded="false" aria-controls="collapsibleMenuBar">
            🎃👻🎃HAPPY HALLOWEEN DENR V🎃👻🎃
        </span>
        <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
            Click the "🎃👻🎃HAPPY HALLOWEEN DENR V🎃👻🎃" <strong>☝️</strong> to show menu bar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    {{-- endregion banner message --}}

    {{-- region menu --}}
    <div class="scrollmenu text-center collapse" id="collapsibleMenuBar">
        <a class="fw-bolder border btn btn-outline-secondary m-2 activescrollmenu" href="client-dashboard-home?active_sidebar=client-dashboard-home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class="fw-bolder border btn btn-outline-secondary m-2" href="client-dashboard?active_sidebar=client_dashboard"><i class="fa fa-plus" aria-hidden="true"></i> Create Request</a>
        <a class="fw-bolder border btn btn-outline-secondary m-2" href="client-dashboard-doc-tracking"><i class="fa fa-search" aria-hidden="true"></i> Track Application</a>
    </div>
    {{-- endregion menu --}}


    <div class="row pb-3 mt-3 bg-light shadow main_content">
        {{-- region video presentation --}}
        <div class="col-md-8 mt-4">
            <div class="carousel-item active bg-dark">

                {{-- localpublic video player --}}
                {{-- <video width="800px" height="500px" class="d-block w-100 border border-5 border-white" controls loop>
                    <source src="{{ asset('assets\video\KIOSK2023_.webm') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video> --}}

                {{-- youtube embed --}}
                <iframe class="d-block w-100 border border-5 border-white" src="https://www.youtube-nocookie.com/embed/wM8A9yBAioM?playlist=wM8A9yBAioM,RUATGCTusIo,3tFcCL0Orh8,ow25S6wl7As,WmB2kKCM4Hg,Z75dDSlNeYA,BC9vF3qhmt4,YK2XYU1zTGk&autoplay=1&iv_load_policy=3&loop=1&modestbranding=1&start=" frameborder="0" id="clientdashboardyoutube" style="width: 800px; height: 480px"></iframe>

                {{-- facebook embed --}}
                {{-- <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FDENROfficial%2Fvideos%2F1501410960635119%2F&show_text=true&width=560&t=0" style="width: 800px; height: 480px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe> --}}
            </div>
        </div>
        {{-- endregion video presentation --}}

        <div class="col-md-4 mt-4">
            {{-- region original --}}
            {{-- <div class="row mb-3">
                <div class="col">
                    <div id="ww_10542e4e1817c" class="border border-5 border-white" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":["wl5260"],"font":"Arial","sl_ics":"one","sl_sot":"celsius","cl_bkg":"#00796B","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#FFFFFF","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#0000000a"}'>
                        More forecasts:
                        <a href="https://oneweather.org/de/deutschland/30_tage/" id="ww_10542e4e1817c_u" target="_blank">
                            oneweather.org</a>
                    </div>
                    <script async src="https://app2.weatherwidget.org/js/?id=ww_10542e4e1817c"></script>
                </div>
            </div> --}}
            {{-- endregion original --}}

            {{-- region halloween --}}
            <div class="row mb-3">
                <div class="col">
                    <iframe class="border border-5 border-white" src="https://www.youtube-nocookie.com/embed/YAS3xCvHCO4?playlist=YAS3xCvHCO4,B230plas5sE,HU_A15w-pjw&autoplay=1&iv_load_policy=3&loop=1&modestbranding=1&start=" frameborder="0" id="clientdashboardyoutube" style="width: 100%; height: 100%"></iframe> {{-- Live youtube frame --}}
                    {{-- <iframe class="border border-5 border-white" src="client-dashboard-youtube" frameborder="0" id="clientdashboardyoutube" style="width: 100%; height: 100%"></iframe> --}}
                </div>
            </div>
            {{-- endregion halloween --}}

            {{-- region carousel --}}
            <div class="row">
                <div class="col">
                    <div id="guest_carousel" class="carousel slide carousel-fade border border-5 border-white" data-bs-ride="carousel">
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
        </div>

        {{-- region map display --}}
        {{-- <div class="col-md-12 mt-4">
            <div class="content-fluid">
                <iframe class="border border-5 border-white" src="client-dashboard-map" frameborder="0" id="clientdashboardmap" style="width: 100%; height: 500px"></iframe>
            </div>
        </div> --}}

        {{-- <div class="col-md-12 mt-4">
            <div class="content-fluid">
                <iframe class="border border-5 border-white" width="100%" height="500px" src="https://embed.windy.com/embed2.html?lat=11.953&lon=124.805&detailLat=16.412&detailLon=120.593&width=650&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
            </div>
        </div> --}}
        {{-- endregion map display --}}

        {{-- region spider --}}
        {{-- <div class="spider_container">
            <img class="fog" src="../assets/img/halloween_imgs/spuder.gif" />
        </div> --}}
        {{-- endregion spider --}}
    </div>

    {{-- region fixed bottom weather widget --}}
    {{-- <div style="position: fixed; bottom: 0; left: 0; z-index: 9999; width: 100%;" id="ww_b3478f8af14ed" v='1.3' loc='auto' a='{"t":"ticker","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFB300","cl_font":"#000000","cl_cloud":"rgba(156,61,84,1)","cl_persp":"#000000","cl_sun":"#000000","cl_moon":"#000000","cl_thund":"#000000"}'> More forecasts: <a href="https://oneweather.org/de/deutschland/30_tage/" id="ww_b3478f8af14ed_u" target="_blank"> Wetter 30 tage Deutschland </a>
    </div>
    <script async src="https://app2.weatherwidget.org/js/?id=ww_b3478f8af14ed"></script> --}}
    <div style="position: fixed; bottom: 0; left: 0; z-index: 9999; width: 100%;" class="p-0 m-0">
        <a class="btn btn-warning" data-bs-toggle="collapse" href="#fixedweatherwidget" role="button" aria-expanded="false" aria-controls="fixedweatherwidget" tooltip="Toggle weather forecast" flow="right">
            <i class="fa fa-sun-o" aria-hidden="true"></i>
        </a>
        <div class="collapse p-0 m-0" id="fixedweatherwidget">
            <div class="card card-body p-0 m-0">
                <div id="ww_e0cd57a008b0a" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":["wl5260"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFB300","cl_font":"#000000","cl_cloud":"rgba(156,61,84,1)","cl_persp":"#000000","cl_sun":"#000000","cl_moon":"#000000","cl_thund":"#000000","cl_odd":"#00000000"}'>More forecasts: <a href="https://cuacalab.id/cuaca_medan/"
                        id="ww_e0cd57a008b0a_u" target="_blank">Prakiraan cuaca medan</a></div>
                <script async src="https://app2.weatherwidget.org/js/?id=ww_e0cd57a008b0a"></script>
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
                url: "{{ url('fetch-carouselImgs') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        console.log(r);

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
                                    '    <img src="/' + file_path + '" class="d-block w-100" alt="..."> ' +
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
    <script>
        $(function() {
            s();

            function s() {
                window.history.pushState({}, '', '/');
            }
        });
    </script>
    {{-- endregion change url --}}
@endsection
