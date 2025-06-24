<body id="body-pd">
    <header class="header border-bottom border-5 border-white" id="header">
        <div class="header-toggle-group" style="display: none;">
            <div class="header_toggle" id="header-toggle"> <i id="header_toggle_icon" class="fa fa-bars" aria-hidden="true"></i> </div>
            <div class="btn_header_toggle" data-bs-toggle="modal" data-bs-target="#navbar_mobile">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
        <div class="container-fluid container-navbar ps-2 pe-0 mt-4 border-radius-xl position-relative my-3 py-2 start-0 end-0 mx-1">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-center" href="/dashboard">
                <img src="../assets/img/logo.webp" class="navbar-brand-img navbar-brand-img-algn h-2 v-2" alt="main_logo" width="38px" height="35px" style="vertical-align: top;">
                <label class="text-black text-bold navbar-brand-label text-start pb-3">
                    <sub>
                        Department of Environment and Natural Resources, Region V
                    </sub>
                    <br>
                    ENHANCED REGIONAL ELECTRONIC DOCUMENT TRACKING SYSTEM
                </label>
                <label class="text-black text-bold navbar-brand-label-small text-start">
                    DENR V
                </label>
            </a>
        </div>
        <div class="me-2 status-overdue">
            {{-- urgent alert here --}}
        </div>
        <div class="me-2 status-past-deadline">
            {{-- overdue alert here --}}
        </div>
        <div class="me-2" id="internetStatusIndicator">
        </div>
        <div class="me-2">
            <a href="#">
                <div class="open-messenger-remove-this-to-enable" style="width: 40px; height: 40px; cursor: pointer;" tooltip="{{-- contact us through messenger --}}EREDTS messenger is unavailable." flow="left">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800">
                        {{-- messenger svg --}}
                        <radialGradient id="a" cx="101.9" cy="809" r="1.1" gradientTransform="matrix(800 0 0 -800 -81386 648000)" gradientUnits="userSpaceOnUse">
                            {{-- <stop offset="0" style="stop-color:#09f" /> --}}
                            {{-- <stop offset=".6" style="stop-color:#a033ff" /> --}}
                            {{-- <stop offset=".9" style="stop-color:#ff5280" /> --}}
                            {{-- <stop offset="1" style="stop-color:#ff7061" /> --}}
                            {{-- grayed --}}
                            <stop offset="0" style="stop-color:#999999" />
                            <stop offset=".6" style="stop-color:#868686" />
                            <stop offset=".9" style="stop-color:#a8a8a8" />
                            <stop offset="1" style="stop-color:#b2b2b2" />
                        </radialGradient>
                        <path fill="url(#a)" d="M400 0C174.7 0 0 165.1 0 388c0 116.6 47.8 217.4 125.6 287 6.5 5.8 10.5 14 10.7 22.8l2.2 71.2a32 32 0 0 0 44.9 28.3l79.4-35c6.7-3 14.3-3.5 21.4-1.6 36.5 10 75.3 15.4 115.8 15.4 225.3 0 400-165.1 400-388S625.3 0 400 0z" />
                        <path fill="#FFF" d="m159.8 501.5 117.5-186.4a60 60 0 0 1 86.8-16l93.5 70.1a24 24 0 0 0 28.9-.1l126.2-95.8c16.8-12.8 38.8 7.4 27.6 25.3L522.7 484.9a60 60 0 0 1-86.8 16l-93.5-70.1a24 24 0 0 0-28.9.1l-126.2 95.8c-16.8 12.8-38.8-7.3-27.5-25.2z" />
                    </svg>
                </div>
            </a>
        </div>
        <div class="dropdown">
            <a data-bs-toggle="dropdown" aria-expanded="false">
                <div class="header_img header_img_desktop" style="width: 40px; height: 40px; cursor: pointer;">
                    <img src="../assets/img/person.png" id="profileImg" alt="No image found">
                </div>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <div class="dropdown-item" href="#">
                        <div class="badge text-wrap header_uname" style="background-color:#2f6083 ;width: 15rem;">
                            user name here
                        </div>
                        <br>
                        <div class="badge text-wrap header_access_type" style="background-color:#2f6083 ;width: 15rem;">
                            access type here
                        </div>
                        <br>
                        <div class="badge text-wrap header_office" style="background-color:#2f6083 ;width: 15rem;">
                            Office here
                        </div>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li tooltip="Manage Profile" flow="left">
                    <a class="dropdown-item" style="cursor: pointer; display: inline-flex; align-items: center;" data-bs-toggle="modal" data-bs-target="#mnguaccModal">
                        <div class="header_img header_img_desktop mr-2" style="width: 40px; height: 40px;">
                            <img src="../assets/img/person.png" class="profileImg" alt="No image found">
                        </div>
                        <span class="header_uname_desktop text-black ps-1" style="margin-left: 5px;">
                            <span class="fw-bold m-0 p-0 ">{{ Auth::user()->username }}</span>
                        </span>
                    </a>
                </li>

                {{-- Process flow shortcut --}}
                {{-- 
                <li>
                    <a class="dropdown-item" style="cursor: pointer;"><i class="fa fa-question-circle" aria-hidden="true"></i> Process Flow</a>
                    <ul style="list-style-type: none;">
                        <li><a class="dropdown-item" style="cursor: pointer;" href="/client_req_flowchart" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Client Request Flow</a></li>
                        <li><a class="dropdown-item" style="cursor: pointer;" href="/client_req_processing_flowchart" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Request Processing Flow</a></li>
                    </ul>
                </li> 
                --}}

                <li>
                    <hr class="dropdown-divider">
                </li>

                {{-- Zoom Button --}}
                <li>
                    <a class="dropdown-item show-zoom" style="cursor: pointer;"><i class="fa fa-search" aria-hidden="true"></i> Zoom Display</a>
                </li>


                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item activate_theme" style="cursor: pointer;"><i class="fa fa-picture-o" aria-hidden="true"></i> Change Session Wallpaper</a>
                    <ul style="list-style-type: none;">
                        <li><a class="dropdown-item select-custom-theme" data-theme="0" style="cursor: pointer;"><i class="fa fa-picture-o" aria-hidden="true"></i> Input Custom Wallpaper</a></li>
                        <li><a class="dropdown-item select-activate-theme" data-theme="0" style="cursor: pointer;"><i class="fa fa-picture-o" aria-hidden="true"></i> Wallpaper 1</a></li>
                    </ul>
                </li>

                <li><a class="dropdown-item" style="cursor: pointer;" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a></li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="text-center my-3"><sub><a class="dropdown-item link-secondary" style="cursor: pointer;" href="#">{{ config('app.version') }}</a></sub></li>
            </ul>
        </div>
    </header>

    @if (config('app.version') == 'development version')
        <div class="alert alert-danger alert-dismissible fade show" role="alert" data-bs-dismiss="alert" aria-label="Close" style="cursor:pointer; position: fixed; top: 10px; left: 50%; z-index:999; opacity: 70%; height: 70px;">
            <h3>{{ config('app.version') }}</h3>
        </div>
    @endif

    {{-- for desktop --}}
    <div class="l-navbar" id="nav-bar">
        <nav class="nav navbar-expand-sm sidebar">
            <div class="row">
                <div class="col-12">
                    <span class="nav_logo" id="nav_logo_toggle">
                        <img src="{{ asset('assets/img/logoShine.webp') }}" alt="main_logo" width="30px" height="30px">
                    </span>

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-1 border-bottom"></div>

                    <div class="nav-list">
                        <a href="dashboard?active_sidebar=gen-dash-home" class="nav_link {{ request()->input('active_sidebar') == 'gen-dash-home' ? 'active_side_bar' : '' }}" title="Dashboard">
                            <i class="fa fa-home nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                    </div>


                    {{-- <div class="nav-list">
                        <a class="nav_link @if (request()->input('active_sidebar') == 'admin-dash-mng-cli' || request()->input('active_sidebar') == 'admin-dash-mng-cli-req') active @else @endif" data-bs-toggle="collapse" href="#sb_mng_req" aria-expanded="@if (request()->input('active_sidebar') == 'admin-dash-mng-cli' || request()->input('active_sidebar') == 'admin-dash-mng-cli-req') true @else  false @endif" aria-controls="sb_mng_req" title="Manage Requests">
                            <i class="fa fa-address-card nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                            <span class="nav_name">Manage Requests <i class="fa fa-caret-down"></i></span>
                        </a>
                        <div class="collapse @if (request()->input('active_sidebar') == 'admin-dash-mng-cli' || request()->input('active_sidebar') == 'admin-dash-mng-cli-req') show @else @endif" id="sb_mng_req">
                            @if (Auth::user()->access_id == 1 || Auth::user()->access_id == 2)
                                <a href="admin-dash-mng-cli?active_sidebar=admin-dash-mng-cli" class="nav_link {{ request()->input('active_sidebar') == 'admin-dash-mng-cli' ? 'active_side_bar' : '' }}" title="Clients">
                                    <i class='fa fa-user nav_icon px-2' style="color:rgb(107, 209, 50)"></i>
                                    <span class="nav_name">Clients</span>
                                </a>
                            @endif
                            <a href="admin-dash-mng-cli-req?active_sidebar=admin-dash-mng-cli-req" class="nav_link {{ request()->input('active_sidebar') == 'admin-dash-mng-cli-req' ? 'active_side_bar' : '' }}" title="Requests">
                                <i class='fa fa-file-o nav_icon  px-2' style="color:rgb(107, 209, 50)"></i>
                                <span class="nav_name">Requests</span>
                            </a>
                        </div>
                    </div> --}}

                    <div class="nav-list">
                        <a href="general-dash-doc-tracking?active_sidebar=gen-dash-req-tracking" class="nav_link {{ request()->input('active_sidebar') == 'gen-dash-req-tracking' ? 'active_side_bar' : '' }}" title="Document Tracking">
                            <i class="fa fa-search nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                            <span class="nav_name">Document Tracking</span>
                        </a>
                    </div>

                    @if (Auth::user()->access_id == 1)
                        <div class="nav-list">
                            <a href="admin-dash-req?active_sidebar=admin-dash-req" class="nav_link {{ request()->input('active_sidebar') == 'admin-dash-req' ? 'active_side_bar' : '' }}" title="Client Request">
                                <i class="fa fa-file-text nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                                <span class="nav_name">Client Request</span>
                            </a>
                        </div>
                    @endif

                    {{-- <div class="nav-list"> --}}
                    {{--     <a href="/gen-dashboard-stats" class="nav_link" title="UNDER DEVELOPMENT"> --}}
                    {{--         <i class="fa fa-bar-chart nav_icon" aria-hidden="true" style="color:rgb(137, 137, 137)"></i> {{-- Still on development --}}
                    {{--         <span class="nav_name">Statistics</span> --}}
                    {{--     </a> --}}
                    {{-- </div> --}}

                    <div class="nav-list">
                        <a href="admin-dash-gen-qr?active_sidebar=nav-qr-gen" class="nav_link {{ request()->input('active_sidebar') == 'nav-qr-gen' ? 'active_side_bar' : '' }}" title="Generate QR code">
                            <i class="fa fa-qrcode nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                            <span class="nav_name">Generate QR code</span>
                        </a>
                    </div>

                    <div class="nav-list">
                        <a href="general-dashboard-qr-scanner?active_sidebar=gen-dash-qr-scan" class="nav_link {{ request()->input('active_sidebar') == 'gen-dash-qr-scan' ? 'active_side_bar' : '' }}" title="QR Code Scanner">
                            <span class="fa-stack" style="margin-left: -9px;">
                                <i class="fa fa-qrcode fa-stack-2x nav_icon me-3" aria-hidden="true" style="color:rgb(82, 221, 251); font-size: 20px;"></i>
                                <i class="fa fa-search fa-stack-1x nav_icon ms-1 mt-1" aria-hidden="true" style="color:rgb(82, 221, 251); font-size: 20px;"></i>
                            </span>
                            <span class="nav_name">QR Code Scanner</span>
                        </a>
                    </div>

                    <div class="nav-list">
                        <a href="general-dash-img-to-pdf?active_sidebar=img-to-pdf" target="_blank" class="nav_link {{ request()->input('active_sidebar') == 'img-to-pdf' ? 'active_side_bar' : '' }}" title="Image to Pdf">
                            <i class="fa fa-file-pdf-o nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                            <span class="nav_name">Image to Pdf</span>
                        </a>
                    </div>

                </div>

            </div>
        </nav>
    </div>

    {{-- for mobile --}}
    <!-- #region mobile Modal -->
    <div class="modal fade" id="navbar_mobile" tabindex="-1" aria-labelledby="navbar_mobile_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <img src="{{ asset('assets/img/logoShine.webp') }}" alt="main_logo" width="35px" height="35px">
                    <h2 class="p-2 nav_logo-name">
                        DENR V - EREDTS
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="row">
                        <div class="col-12">
                            <div class="header_img" style="margin: auto; width: 100px; height: 100px;"><img src="../assets/img/person.png" style="width: 100px;" class="profileImg" alt=""></div>
                        </div>
                        <div class="col-12 py-2 text-center">
                            <span class="fs-3">{{ Auth::user()->username }}</span><br>(<span class="fw-bold header_access_type"></span>)
                            <br>
                        </div>
                    </div>
                    @if (Auth::user()->access_id == 1)
                        <hr>
                        <a href="/" class="nav_link {{ request()->input('active_sidebar') == 'admin-dash-mng-cli' ? 'active_side_bar' : '' }}">
                            <i class='fa fa-user nav_icon' style="color:rgb(82, 221, 251)"></i>
                            <span class="nav_name">Dashboard (Admin Control Panel)</span>
                        </a>
                    @endif

                    <hr>
                    <a href="/user-dashboard-mobile" class="nav_link">
                        <i class="fa fa-home nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                        <span class="nav_name">Dashboard</span>
                    </a>

                    <hr>
                    {{-- <a href="/user-dashboard-mobile?" class="nav_link {{ request()->input('active_sidebar') == 'admin-dash-mng-cli-req' ? 'active_side_bar' : '' }}">
                        <i class="fa fa-address-card nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                        <span class="nav_name">Manage Requests</span>
                    </a> --}}

                    @if (Auth::user()->access_id == 1 || Auth::user()->access_id == 2)
                        <hr>
                        <a href="/admin-dash-mng-cli?active_sidebar=admin-dash-mng-cli" class="nav_link {{ request()->input('active_sidebar') == 'admin-dash-mng-cli' ? 'active_side_bar' : '' }}">
                            <i class='fa fa-user nav_icon' style="color:rgb(82, 221, 251)"></i>
                            <span class="nav_name">Clients</span>
                        </a>
                    @endif

                    <hr>
                    <a href="/general-dash-doc-tracking?active_sidebar=gen-dash-req-tracking" class="nav_link {{ request()->input('active_sidebar') == 'gen-dash-req-tracking' ? 'active_side_bar' : '' }}">
                        <i class="fa fa-search nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                        <span class="nav_name">Document Tracking</span>
                    </a>

                    <hr>
                    <div class="nav-list">
                        <a href="/gen-dashboard-stats" class="nav_link" title="UNDER DEVELOPMENT">
                            <i class="fa fa-bar-chart nav_icon" aria-hidden="true" style="color:rgb(137, 137, 137)"></i> {{-- Still on development --}}
                            {{-- <i class="fa fa-bar-chart nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i> --}}
                            <span class="nav_name">Statistics</span>
                        </a>
                    </div>

                    <hr>
                    <a href="/admin-dash-gen-qr?active_sidebar=nav-qr-gen" class="nav_link {{ request()->input('active_sidebar') == 'nav-qr-gen' ? 'active_side_bar' : '' }}">
                        <i class="fa fa-qrcode nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                        <span class="nav_name">Generate QR code</span>
                    </a>

                    <hr>
                    <a href="/general-dashboard-qr-scanner?active_sidebar=gen-dash-qr-scan" class="nav_link {{ request()->input('active_sidebar') == 'gen-dash-qr-scan' ? 'active_side_bar' : '' }}">
                        <span class="fa-stack" style="margin-left: -9px;">
                            <i class="fa fa-qrcode fa-stack-2x nav_icon me-3" aria-hidden="true" style="color:rgb(82, 221, 251); font-size: 20px;"></i>
                            <i class="fa fa-search fa-stack-1x nav_icon ms-1 mt-1" aria-hidden="true" style="color:rgb(82, 221, 251); font-size: 20px;"></i>
                        </span>
                        <span class="nav_name">QR Code Scanner</span>
                    </a>

                    <hr>
                    <a href="/general-dash-img-to-pdf?active_sidebar=img-to-pdf" class="nav_link {{ request()->input('active_sidebar') == 'img-to-pdf' ? 'active_side_bar' : '' }}">
                        <i class="fa fa-file-pdf-o nav_icon" aria-hidden="true" style="color:rgb(82, 221, 251)"></i>
                        <span class="nav_name">Image to Pdf</span>
                    </a>

                    <hr>
                    <a href="{{ route('logout') }}" class="nav_link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                        <i class='fa fa-sign-out nav_icon'></i>
                        <span class="nav_name">Sign Out
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- #endregion mobile Modal -->

    <div style="z-index: 999; display: none;" class="border rounded position-fixed top-50 start-50 translate-middle bg-white p-2 zoom-container">
        <div class="row">
            <div class="col">
                <h2>ZOOM</h2>
            </div>
            <div class="col d-flex justify-content-end">
                <div>
                    <button class="btn btn-sm btn-danger exit-zoom">&times;</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col alert-container"></div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-sm btn-outline-primary browser-zoom-in"><i class="fa fa-minus" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-primary browser-zoom-out"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- region view my profile modal --}}
    {{-- <script type="text/javascript">
        /* FOR TESTING */
        $(window).on('load', function() {
            $('#mnguaccModal').modal('show');
        });
    </script> --}}
    <div class="modal fade" id="mnguaccModal" tabindex="-1" aria-labelledby="mnguaccLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-white" id="mnguaccLabel">MY PROFILE ( User No.: <span class="fs-5 label_user">{{ Auth::user()->id }}</span>-<span class="fs-5 label_user_access">{{ Auth::user()->access_id }}</span> )</h1> {{-- Combination of user id and access type id --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="mnguaccform">
                        <div class="row px-2">
                            <div class="col-md-3 p-2">
                                <div class="border border-secondary p-3">
                                    <img class="img-thumbnail" id="mnguaccimagedisp" src="" alt="" style="border-radius: 50%; width: 100%; height: 230px;">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="mnguaccimage" class="form-label fs-6">Update Profile Photo <span class="text-danger">*</span></label>
                                            <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;">
                                                <span class="file_label">Upload Image</span>
                                                <input type="file" class="form-control file_input_tag" name="uaccimage" id="mnguaccimage" style="visibility:hidden;">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="mnguaccfname" class="form-label fs-6">First Name: <span class="text-danger">*</span></label>
                                        <input type="text" id="mnguaccfname" name="fname" class="form-control" placeholder="first name here...">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="mnguaccmname" class="form-label fs-6">Middle Name: <span class="text-danger">*</span></label>
                                        <input type="text" id="mnguaccmname" name="mname" class="form-control" placeholder="middle name here...">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="mnguaccsname" class="form-label fs-6">SurName: <span class="text-danger">*</span></label>
                                        <input type="text" id="mnguaccsname" name="sname" class="form-control" placeholder="surname here...">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="mnguaccsuffix" class="form-label fs-6">Suffix: <span class="text-primary">( optional )</span></label>
                                        <input type="text" id="mnguaccsuffix" name="suffix" class="form-control" placeholder="suffix here...">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="mnguaccposition" class="form-label fs-6">Position: <span class="text-danger">*</span></label>
                                        <input type="text" id="mnguaccposition" name="position" class="form-control" placeholder="position here...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="mnguaccusername" class="form-label fs-6">Username: <span class="text-danger">*</span></label>
                                <input type="text" id="mnguaccusername" name="username" class="form-control" placeholder="username here..." value="{{ Auth::user()->username }}" autocomplete="username">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mnguaccemail" class="form-label fs-6">Email: <span class="text-danger">*</span></label>
                                <input type="email" id="mnguaccemail" name="email" class="form-control" placeholder="email here..." value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h5>Change Password: </h5>
                            <div class="password_change_msg"></div>
                            <div class="col-md-6 mb-3">
                                <label for="mnguaccpass" class="form-label fs-6">Password: <span class="text-danger">*</span></label>
                                <input type="password" id="mnguaccpass" name="pass" class="form-control" placeholder="password here..." autocomplete="new-password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mnguaccrepass" class="form-label fs-6">Re-enter password: <span class="text-danger">*</span></label>
                                <input type="password" id="mnguaccrepass" name="repass" class="form-control" placeholder="reenter here..." autocomplete="new-password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="mnguaccprevpass" class="form-label fs-6 prevpass">Enter current password:</label>
                                <input type="password" id="mnguaccprevpass" name="prevpass" class="form-control prevpass" placeholder="current password here..." autocomplete="current-password">
                            </div>
                        </div>
                    </form>
                    <div class="upt-mnguacc-msg"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-edit-user-profile">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- endregion view my profile modal --}}

    {{-- Custom Javascript --}}
    <script>
        $(function() {
            // #region defaul nav_logo
            sessionStorage.setItem("sidebar_fold", 'true');
            $('#nav_logo_toggle').empty();
            $('#nav_logo_toggle').append('' +
                '<img src="{{ asset('assets/img/logoShine.webp') }}" alt="main_logo" width="30px" height="30px"> ' +
                '');
            // #endregion defaul nav_logo

            // #region nav_logo toggle function
            $('.header_toggle').click(function() {
                let sidebar_fold = sessionStorage.getItem("sidebar_fold");
                if (sidebar_fold == 'true') {
                    $('#header_toggle_icon').removeClass('fa-bars').addClass('fa-times'); // change to x icon
                    $('#nav_logo_toggle').empty().append('' + //change logo size
                        '<img src="{{ asset('assets/img/logoShine.webp') }}" alt="main_logo" width="55px" height="55px"> ' +
                        '<span class="nav_logo-name">DENR V - EREDTS</span> ' +
                        '');
                    sessionStorage.setItem("sidebar_fold", 'false');
                } else {
                    $('#header_toggle_icon').removeClass('fa-times').addClass('fa-bars'); // change to bar icon
                    $('#nav_logo_toggle').empty().append('' + //change logo size
                        '<img src="{{ asset('assets/img/logoShine.webp') }}" alt="main_logo" width="30px" height="30px"> ' +
                        '');
                    sessionStorage.setItem("sidebar_fold", 'true');
                }
            });
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

            // region get other user info
            $.ajax({
                url: ("{{ url('get-otheruserinfo') }}"),
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {

                        let user_offices_uuid = r.user_offices_uuid;

                        if (user_offices_uuid == null) {
                            $('#genDashNotifs').append('' +
                                '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                '    <strong>Your account does\'nt have office designation</strong> ' +
                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div>'
                            );
                        }

                        // console.log(r);
                        $('.header_access_type').empty().append((r.access_type.type).toUpperCase());
                        $('.header_office').empty().append((r.user_offices.full_office_name).toUpperCase());

                        let fname = r.user_profile.fname;
                        let mname = r.user_profile.mname;
                        let sname = r.user_profile.sname;
                        let suffix = r.user_profile.suffix;
                        let uname = fname + ' ' + mname + ' ' + sname + ' ' + (suffix != null ? suffix : '');
                        let position = r.user_profile.position;

                        let image = r.user_profile.image;

                        $('.header_uname').empty().append((uname).toUpperCase());
                        sessionStorage.setItem("mb_user_access_uuid", r.access_type.uuid);
                        sessionStorage.setItem("mb_user_access_type", r.access_type.type);
                        sessionStorage.setItem("mb_user_office", r.user_offices.office);
                        sessionStorage.setItem("mb_user_full_office_name", r.user_offices.full_office_name);

                        // $('.label_user_profile').text(r.user_profile.id); //my profile label
                        // $('.label_user_offices_uuid').text(user_offices_uuid); //my profile label

                        $('#mnguaccfname').val(fname);
                        $('#mnguaccmname').val(mname);
                        $('#mnguaccsname').val(sname);
                        $('#mnguaccsuffix').val(suffix);
                        $('#mnguaccposition').val(position);
                        if (image != '') {
                            $('#mnguaccimagedisp, #profileImg, .profileImg').attr('src', image);
                        } else {
                            $('#mnguaccimagedisp, #profileImg, .profileImg').attr('src', '../assets/img/no_image.jpg');
                        }
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
            // endregion get other user info

            // region file upload restriction
            $('#mnguaccimage').change(function() {
                var allowedFormats = ["image/jpeg", "image/jpg", "image/png"];
                var maxSizeMB = 9; // Maximum allowed file size in megabytes
                var selectedFile = this.files[0];

                if (selectedFile) {
                    $(this).parent().find('.file_label').empty().append(selectedFile.name);
                    $(this).parent().css('background-color', '#6c757d').css('color', '#ffffff');

                    // Check file size
                    if (selectedFile.size > maxSizeMB * 1024 * 1024) {
                        alert("File size exceeds the maximum allowed size of less than" + (maxSizeMB + 1) + "MB.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Attach file');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                    }

                    // Check file format
                    if (!allowedFormats.includes(selectedFile.type)) {
                        alert("Unsupported file format. Please select a JPEG or PNG file.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Attach file').css('color', '#6c757d');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                        return;
                    }
                } else {
                    $(this).closest('label').find('.file_label').empty().append('Attach file'); // Clear the file label
                    $(this).parent().css('background-color', '#fff').css('color', '#6c757d');
                }
            });
            // endregion file upload restriction

            // region check password
            $('.prevpass').hide();
            $('#mnguaccpass, #mnguaccrepass').change(function() {
                let mnguaccpass = $('#mnguaccpass').val();
                let mnguaccrepass = $('#mnguaccrepass').val();

                if (mnguaccpass != '' || mnguaccrepass != '') {
                    if (mnguaccpass == mnguaccrepass) {
                        $('.password_change_msg').empty().append('<span class="text-success">Password reentered match</span>');
                        $('.prevpass').fadeIn();
                    } else {
                        $('.password_change_msg').empty().append('<span class="text-danger">Password does not match</span>');
                        $('.prevpass').hide();
                    }
                } else {
                    $('.password_change_msg').empty();
                    $('.prevpass').hide();
                }
            });
            // endregion check password

            function appendAlertMessage(selector, type, message) { // Append alert message
                $(selector).append(
                    '<div class="col-12 alert alert-' + type + ' alert-dismissible fade show p-2 pe-5" role="alert">' +
                    '    <strong>' + message + '</strong>' +
                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>'
                );
            }

            // region update profile
            $('.btn-edit-user-profile').click(function(e) {
                e.preventDefault();

                let form = $("#mnguaccform")[0];
                let submitForm = new FormData(form);

                $.ajax({
                    url: "{{ url('edit-user-profile') }}",
                    method: "POST",
                    data: submitForm,
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    async: true, // prevent the [Violation] 'click' handler took 1432ms 
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(r) {
                        if (r.success) {
                            // console.log(r);

                            if (r.profile_upt) {
                                appendAlertMessage('.upt-mnguacc-msg', 'success', 'Profile has been updated');
                            }
                            if (r.user_upt) {
                                appendAlertMessage('.upt-mnguacc-msg', 'success', 'Username / Email is updated');
                            } else {
                                appendAlertMessage('.upt-mnguacc-msg', 'danger', 'Username / Email already exist');
                            }

                            if (r.image_upt) {
                                appendAlertMessage('.upt-mnguacc-msg', 'success', '<i class="fa fa-picture-o" aria-hidden="true"></i> Profile photo has been updated');
                            }

                            if (r.pass_upt_no_act) {
                                if (r.prevpass_verified) {
                                    if (r.pass_upt) {
                                        appendAlertMessage('.upt-mnguacc-msg', 'success', 'Password has been updated');
                                    } else {
                                        appendAlertMessage('.upt-mnguacc-msg', 'warning', 'Password reentered doesn\'t match');
                                    }
                                } else {
                                    $('.upt-mnguacc-msg').append('' +
                                        '<div class="col-12 alert alert-warning alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                        '    <strong>Wrong current pasword</strong> ' +
                                        '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                        '</div>'
                                    );
                                }
                            }

                            // Close the message after 5 seconds
                            setTimeout(function() {
                                console.log('remove notifs');
                                $('.upt-mnguacc-msg').empty(); // Remove the message
                            }, 5000); // 5000 milliseconds = 5 seconds
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        $('.upt-mnguacc-msg').append('' +
                            '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                            '    <strong>' + err + '</strong> ' +
                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                            '</div>'
                        );
                    }
                });
            })
            // endregion update profile

            // region random num picker
            function getRandomInt(max) {
                return Math.floor(Math.random() * max);
            }
            // endregion random num picker

            // region activate theme wallpaper

            //defaul wallpapers
            let wallpaper = [
                "https://assets-global.website-files.com/5e9b440a1b847fe4c34e1cf3/6096e2e1ca7f00754cef23af_Underwater%20photo%20of%20the%20white%20belly%20of%20a%20manta.jpg",
            ]

            $('.activate_theme').click(function() {
                let theme = sessionStorage.getItem("bg_theme");
                if (theme == 1) {
                    sessionStorage.setItem("bg_theme", 0);
                    alert("Theme has been disabled\nReload page to see result");
                } else {
                    sessionStorage.setItem("bg_theme", 1);
                    sessionStorage.setItem("bg_theme_img", wallpaper[getRandomInt(wallpaper.length - 1)]);
                    alert("Theme has been activated\nReload page to see result");
                }
            });
            $('.select-activate-theme').click(function() {

                let theme_index = $(this).data('theme'); // select theme from given default wallpapers
                sessionStorage.setItem("bg_theme", 1);
                sessionStorage.setItem("bg_theme_img", wallpaper[theme_index]); // set theme from given default wallpapers to a session
                alert("Theme has been activated\nReload page to see result");
            });
            $('.select-custom-theme').click(function() {


                let url;
                let promptItem = prompt("Please enter your url of your theme:", "");
                if (promptItem == null || promptItem == "") {
                    alert("No URL has been registered");
                } else {
                    sessionStorage.setItem("bg_theme", 1);
                    sessionStorage.setItem("bg_theme_img", promptItem);
                    alert("Theme has been activated\nReload page to see result");
                }
            });
            // endregion activate theme wallpaper

            // region activate theme when session active
            let theme = sessionStorage.getItem("bg_theme");
            let theme_img = sessionStorage.getItem("bg_theme_img");
            if (theme == 1) {

                $('body').css({
                    'background-color': 'lightblue',
                    'background-image': 'url(' + theme_img + ')',
                    'background-repeat': 'no-repeat',
                    'background-attachment': 'fixed',
                    'background-position': 'center',
                    'background-size': 'cover', // or 'contain' based on your preference
                });

                $('.header').css({
                    'background': 'linear-gradient(to bottom, rgba(255, 255, 255, 255.70) , rgba(255, 255, 255, 0.70)), url(' + theme_img + ') no-repeat fixed center',
                    'background-size': 'cover', // You may want to include this for proper image scaling
                });
                $('.l-navbar').css({
                    'background': 'linear-gradient(to bottom, rgba(0, 0, 0, 0.49) , #3F51B5), url(' + theme_img + ') no-repeat fixed center',
                    'background-size': 'cover', // You may want to include this for proper image scaling
                });

                $('.apply_bg_theme').css({
                    'background': 'linear-gradient(to left, rgb(0 0 0 / 11%), rgb(0 0 0 / 40%)), url(' + theme_img + ') no-repeat fixed center',
                    'background-size': 'cover', // or 'contain' based on your preference
                });

                $('.footer_theme').css({
                    'background': 'linear-gradient(to left, rgb(0 0 0 / 11%), rgb(0 0 0 / 40%)), url(' + theme_img + ') no-repeat fixed center',
                    'color': '#fff',
                    'background-size': 'cover', // You may want to include this for proper image scaling
                });
            } else {
                // Handle the case when theme is not equal to 1
            }
            // region activate theme when session active

            // region browser zoom in and out
            let browserzoomLevel = 1; //zoom level indicator

            function showAlert(message) {
                $('.alert-container').empty();
                const alertDiv = $('<div class="alert alert-info alert-dismissible fade show" role="alert"></div>');
                alertDiv.text(message);
                $('.alert-container').append(alertDiv);

                setTimeout(function() {
                    alertDiv.alert('close');
                }, 3000);
            }

            $('.browser-zoom-out').click(function() {
                browserzoomLevel += 0.1;
                document.body.style.zoom = browserzoomLevel;
                showAlert('Zoom level increased to ' + browserzoomLevel.toFixed(1));
            });


            $('.browser-zoom-in').click(function() {
                browserzoomLevel -= 0.1;
                document.body.style.zoom = browserzoomLevel;
                showAlert('Zoom level decreased to ' + browserzoomLevel.toFixed(1));
            });

            $('.show-zoom').click(function() {
                $('.zoom-container').fadeIn();
            });
            $('.exit-zoom').click(function() {
                $('.zoom-container').fadeOut();
            });
            // endregion browser zoom in and out

            //region open messenger
            $('.open-messenger').click(function() {
                let appLink = "https://www.facebook.com/messages/t/25313121005000288";
                let webLink = "https://www.facebook.com/messages/t/25313121005000288";

                try {
                    // Attempt to open the app link
                    window.open(appLink, '_blank');
                } catch (error) {
                    alert('error messenger');
                    window.open(webLink, '_blank');
                }
            });
            //endregion open messenger
        });
    </script>

    {{-- region check if connected to internet --}}
    <script>
        function updateOnlineStatus() {
            let status = document.getElementById('internetStatusIndicator');
            if (navigator.onLine) {
                status.innerHTML = '<span class="badge text-bg-success" >🌏 ONLINE</span>';
            } else {
                status.innerHTML = '<span class="badge text-bg-danger skew-y-shakeing" >❌ OFFLINE</span>';
            }
        }

        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);

        // Initial check
        updateOnlineStatus();
    </script>
    {{-- endregion check if connected to internet --}}
