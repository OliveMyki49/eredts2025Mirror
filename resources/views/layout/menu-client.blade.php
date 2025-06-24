<body id="body-pd">
    <header class="header" id="header">
        <div class="header-toggle-group" style="display: none;">
            {{-- <div class="header_toggle" id="header-toggle"> <i id="header_toggle_icon" class="fa fa-bars" aria-hidden="true"></i> </div>
            <div class="btn_header_toggle" data-bs-toggle="modal" data-bs-target="#navbar_mobile">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div> --}}
        </div>
        <div class="container-fluid container-navbar pe-0 mt-4 border-radius-xl position-relative my-3 start-0 end-0 mx-1 ">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-center" href="/" style="vertical-align: top;">
                <img src="../assets/img/logo.webp" class="navbar-brand-img h-2 v-2" alt="main_logo" width="35px" height="32px" style="vertical-align: top;">
                <a class="text-black text-bold text-start fw-bold navbar-brand-govph" href="http://www.gov.ph" target="_blank">
                    GOVPH
                </a>
                <label class="text-bold navbar-brand-label text-start">
                    Department of Environment and Natural Resources, Region V
                </label>
                <label class="text-bold navbar-brand-label-small text-start">
                    DENR V
                </label>
            </a>
        </div>

        {{-- clock moved to pages --}}
        {{-- <div class="d-flex flex-row-reverse align-items-center me-2" style="color: #000; font-family: Georgia, Helvetica, sans-serif;" tooltip="{{ date('F d, Y') }}" flow="down">
            <div>
                <div class="digital-clock-meridean">xx</div>
            </div>
            <div class="px-1">
                <div class="digital-clock">00:00:00</div>
            </div>
            <div class="">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
            </div>
            <div>
                <div>
                    {{ date('F d, Y') }}
                </div>
            </div>
        </div> --}}
        <a href="/sign-in" class="header_uname_desktop text-center header-toggle-group" style="color: #000; display: none;" onMouseOut="this.style.color=`#000`" onMouseOver="this.style.color=`#333`">
            <i class="fa fa-sign-in" aria-hidden="true"></i> Login
        </a>
    </header>

    @if (config('app.version') == 'development version')
        <div class="alert alert-danger alert-dismissible fade show" role="alert" data-bs-dismiss="alert" aria-label="Close" style="cursor:pointer; position: fixed; top: 10px; left: 50%; z-index:999; opacity: 70%; height: 70px;">
            <h3>{{ config('app.version') }}</h3>
        </div>
    @endif

    {{-- for desktop --}}
    {{-- <div class="l-navbar" id="nav-bar">
        <nav class="nav navbar-expand-sm sidebar" style="overflow-x: hidden;">
            <div class="row">
                <div class="col-12">
                    <span class="nav_logo" id="nav_logo_toggle">
                        <img src="{{ asset('assets/img/redtsLogo_v3.gif') }}" alt="main_logo" width="30px" height="30px">
                    </span>

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-1 border-bottom"></div>

                    <div class="nav-list">
                        <a href="client-dashboard-home?active_sidebar=client-dashboard-home" class="nav_link {{ request()->input('active_sidebar') == 'client-dashboard-home' ? 'active_side_bar' : '' }}">
                            <i class="fa fa-home nav_icon" aria-hidden="true" style="color:rgb(8, 160, 242)"></i>
                            <span class="nav_name">Home</span>
                        </a>
                    </div>

                    <div class="nav-list">
                        <a href="client-dashboard?active_sidebar=client_dashboard" class="nav_link {{ request()->input('active_sidebar') == 'client_dashboard' ? 'active_side_bar' : '' }}">
                            <i class="fa fa-plus nav_icon" aria-hidden="true" style="color:rgb(8, 160, 242)"></i>
                            <span class="nav_name">Create Request</span>
                        </a>
                    </div>

                    <div class="nav-list">
                        <a href="client-dashboard?active_sidebar=track_request" class="nav_link {{ request()->input('active_sidebar') == 'track_request' ? 'active_side_bar' : '' }}">
                            <i class="fa fa-search nav_icon" aria-hidden="true" style="color:rgb(8, 160, 242)"></i>
                            <span class="nav_name">Track Application</span>
                        </a>
                    </div>
                </div>

            </div>
        </nav>
    </div> --}}

    {{-- for mobile --}}
    {{-- region Modal --}}
    {{-- <div class="modal fade" id="navbar_mobile" tabindex="-1" aria-labelledby="navbar_mobile_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <img src="{{ asset('assets/img/redtsLogo_v3.gif') }}" alt="main_logo" width="35px" height="35px">
                    <h2 class="p-2 nav_logo-name">DENR - RFSOATS</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="row">
                        <div class="col-1">
                            <div class="header_img"><img src="../assets/img/person.png" alt=""></div>
                        </div>
                        <div class="col py-2">
                            &nbsp;Guest
                        </div>
                    </div>
                    <hr>
                    <a href="client-dashboard-home?active_sidebar=client-dashboard-home" class="nav_link">
                        <i class="fa fa-home nav_icon" aria-hidden="true" style="color:rgb(8, 160, 242)"></i>
                        <span class="nav_name">Home</span>
                    </a>
                    <a href="client-dashboard?active_sidebar=client_dashboard" class="nav_link">
                        <i class="fa fa-plus nav_icon" aria-hidden="true" style="color:rgb(8, 160, 242)"></i>
                        <span class="nav_name">Create Request</span>
                    </a>
                    <hr>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- endregion Modal --}}

    <script>
        $(function() {
            // #region defaul nav_logo
            /* sessionStorage.setItem("sidebar_fold", 'true');
            $('#nav_logo_toggle').empty();
            $('#nav_logo_toggle').append('' +
                '<img src="{{ asset('assets/img/redtsLogo_v3.gif') }}" alt="main_logo" width="30px" height="30px"> ' +
                ''); */
            // #endregion defaul nav_logo

            // #region nav_logo toggle function
            /* $('.header_toggle').click(function() {
                let sidebar_fold = sessionStorage.getItem("sidebar_fold");
                if (sidebar_fold == 'true') {
                    $('#header_toggle_icon').removeClass('fa-bars').addClass('fa-times'); // change to x icon
                    $('#nav_logo_toggle').empty().append('' + //change logo size
                        '<img src="{{ asset('assets/img/redtsLogo_v3.gif') }}" alt="main_logo" width="55px" height="55px"> ' +
                        '<span class="nav_logo-name">DENR - RFSOATS</span> ' +
                        '');
                    sessionStorage.setItem("sidebar_fold", 'false');
                } else {
                    $('#header_toggle_icon').removeClass('fa-times').addClass('fa-bars'); // change to bar icon
                    $('#nav_logo_toggle').empty().append('' + //change logo size
                        '<img src="{{ asset('assets/img/redtsLogo_v3.gif') }}" alt="main_logo" width="30px" height="30px"> ' +
                        '');
                    sessionStorage.setItem("sidebar_fold", 'true');
                }
            }); */
            // #endregion nav_logo toggle function

            // region hover open sidebar
            $(".header").hover(
                function() {
                    $(".header-toggle-group").show();
                },
                function() {
                    $(".header-toggle-group").hide();
                }
            );
            // endregion hover open sidebar
        });
    </script>

    {{-- region clock --}}
    {{-- src: https://codepen.io/iiSeptum/pen/LYWYop --}}
    <script>
        $(function() {
            $(document).ready(function() {
                clockUpdate();
                setInterval(clockUpdate, 1000);
            })

            function clockUpdate() {
                var date = new Date();
                /* $('.digital-clock').css({
                    'color': '#fff',
                    'text-shadow': '0 0 6px #ff0'
                }); */

                function addZero(x) {
                    if (x < 10) {
                        return x = '0' + x;
                    } else {
                        return x;
                    }
                }

                let meridiem = 'am';

                function twelveHour(x) {
                    if(x == 12 ){ // fix median time when 12nn should be pm
                        meridiem = 'pm';
                    }

                    if (x > 12) {
                        meridiem = 'pm';
                        return x = x - 12;
                    } else if (x == 0) {
                        return x = 12;
                    } else {
                        return x;
                    }
                }

                var h = addZero(twelveHour(date.getHours()));
                var m = addZero(date.getMinutes());
                var s = addZero(date.getSeconds());

                $('.digital-clock').text(h + ':' + m + ':' + s);
                $('.digital-clock-meridean').text(meridiem);
            }
        });
    </script>
    {{-- endregion clock --}}
