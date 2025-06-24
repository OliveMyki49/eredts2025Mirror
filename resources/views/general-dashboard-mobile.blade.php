@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    {{-- region custom css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/tab.css') }}">
    {{-- endregion custom css --}}

    {{-- region Tab Event Handler --}}
    <script>
        $(".tab_content").hide();
        $(".tab_content:first").show();
        /* if in tab mode */
        $("ul.tabs li").click(function() {
            $(".tab_content").hide();
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn();
            $("ul.tabs li").removeClass("active");
            $(this).addClass("active");
            $(".tab_drawer_heading").removeClass("d_active");
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
        });
        /* if in drawer mode */
        $(".tab_drawer_heading").click(function() {
            $(".tab_content").hide();
            var d_activeTab = $(this).attr("rel");
            $("#" + d_activeTab).fadeIn();
            $(".tab_drawer_heading").removeClass("d_active");
            $(this).addClass("d_active");
            $("ul.tabs li").removeClass("active");
            $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
        });
        /* Extra class "tab_last"
            to add border to right side
            of last tab */
        $('ul.tabs li').last().addClass("tab_last");
    </script>
    {{-- endregion Tab Event Handler --}}

    {{-- region custom style --}}
    <style>
        /* region gen-card-zoom img tag */
        .gen-card-zoom {
            transition: transform .2s;
            /* Animation */
            margin: 0 auto;
        }

        .gen-card-zoom:hover {
            transform: scale(1.1);
            z-index: 999;
            /* (150% gen-card-zoom - Note: if the gen-card-zoom is too large, it will go outside of the viewport) */
        }

        /* endregion gen-card-zoom img tag */

        /* region for other requestee input custom css */
        .row-tab-leader {
            display: flex;
            justify-content: center;
            align-items: center;
            /* max-width: 40em; */
            padding: 0;
            overflow-x: hidden;
        }

        .col-tab-leader {
            position: relative;
        }

        .col-tab-leader::before {
            float: left;
            width: 0;
            white-space: nowrap;
            content:
                "----------------------------------------"
                "----------------------------------------"
                "----------------------------------------"
                "----------------------------------------"
                "----------------------------------------"
                "----------------------------------------";
        }

        .col-tab-leader span:first-child {
            padding-right: 0.33em;
            background: white;
        }

        .col-tab-leader span+span {
            float: right;
            padding-left: 0.33em;
            background: white;
        }

        /* endregion for other requestee input custom css */
    </style>
    {{-- endregion custom style --}}

    {{-- region extra customized style --}}
    <style>
        @media (min-width: 1200px) {
            .modal-xxl {
                --bs-modal-width: 95%;
            }
        }

        .container-fluid {
            padding: 0;
        }

        .compact-text-view {
            font-size: 13px !important;
            line-height: 1.3 !important;
        }

        body {
            font-size: 13px !important;
            line-height: 1.3 !important;
            padding-top: 7vh;
            padding-left: 0px;
            padding-right: 0px;
        }
    </style>
    {{-- endregion extra customized style --}}

    {{-- region important custom function --}}
    <script>
        $(function() {
            // region turn every key input to uppercase
            $('.toUpperCase').on('input', function() {
                $(this).val($(this).val().toUpperCase());
            });
            // endregion turn every key input to uppercase

            // region change border to grey / default
            $('input').click(function() {
                $(this).css('border-color', 'grey');
            });
            // endregion change border to black / default

            // region check if im in browser mode size
            checkBrowserSize();

            function checkBrowserSize() {
                if (window.innerWidth < 768) {
                    // alert('You are in mobile browser size.');
                    // region activate theme when session active
                    let theme = sessionStorage.getItem("bg_theme");
                    let theme_img = sessionStorage.getItem("bg_theme_img");
                    if (theme == 1) {
                        console.log('in mobile form');
                        $('.btn-tbl-mobile-table-view').removeClass('btn-outline-primary').addClass('btn-primary');
                        $('.link-desktop-view').addClass('bg-primary text-white rounded mt-5 px-2 py-1');
                        $('.lbl-crrntly-vw').addClass('text-white');
                    } else {
                        // Handle the case when theme is not equal to 1
                    }
                } else {
                    // alert('You are not in mobile browser size.');
                }
            }
            // endregion check if im in browser mode size
        });
    </script>
    {{-- endregion important custom function --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu')
@endsection
@section('content')
    {{-- region set variable to  active_tab --}}
    @php
        $active_tab = '';
        if (request()->has('active_tab')) {
            $active_tab = request()->input('active_tab');
        } else {
            $active_tab = 'tabVP';
        }
    @endphp
    {{-- endregion set variable to  active_tab --}}

    {{-- region If Authenticated --}}
    <input type="hidden" class="auth_username" name="auth_username" id="auth_username" value="{{ Auth::user()->username }}">
    {{-- endregion If Authenticated --}}

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 50%; left: 40%; width: 10%; height: 10%;">
        loading. . .
    </div>
    {{-- endregion loading indicator --}}

    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 10px; z-index: 9999;">
        <div id="genDashNotifs" class="p-1">
            {{-- Populate notifications here --}}
        </div>
    </div>
    {{-- endregion notification --}}


    {{-- region main container --}}
    <div class="bg-light p-2 rounded apply_bg_theme">
        <div class="row">
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-outline-primary btn-sm dropdown-toggle btn-tbl-mobile-table-view" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Table View
                    </button>
                    <ul class="dropdown-menu">
                        {{-- region status list --}}
                        <li>
                            <h6 class="dropdown-header">Status List:</h6>
                        </li>
                        <li>
                            <button class="dropdown-item collapsed btn_collapse_tabInTransit" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_tabInTransit" aria-expanded="true" aria-controls="collapse_tabInTransit" onclick="var updatedUrl='user-dashboard-mobile?active_tab=tabInTransit';window.history.replaceState(null,null,updatedUrl);">
                                In-Transit (<span class="cnt_in_transit"></span>)
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item collapsed btn_collapse_tabReceived" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_tabReceived" aria-expanded="false" aria-controls="collapse_tabReceived" onclick="var updatedUrl='user-dashboard-mobile?active_tab=tabReceived';window.history.replaceState(null,null,updatedUrl);">
                                Received (<span class="cnt_received"></span>)
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item collapsed btn_collapse_tabReleased" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_tabReleased" aria-expanded="false" aria-controls="collapse_tabReleased" onclick="var updatedUrl='user-dashboard-mobile?active_tab=tabReleased';window.history.replaceState(null,null,updatedUrl);">
                                Released (<span class="cnt_released"></span>)
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item collapsed btn_collapse_tabArchived" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_tabArchived" aria-expanded="false" aria-controls="collapse_tabArchived" onclick="var updatedUrl='user-dashboard-mobile?active_tab=tabArchived';window.history.replaceState(null,null,updatedUrl);">
                                Approved (<span class="cnt_arhived"></span>)
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item collapsed btn_collapse_tabRejected" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_tabRejected" aria-expanded="false" aria-controls="collapse_tabRejected" onclick="var updatedUrl='user-dashboard-mobile?active_tab=tabRejected';window.history.replaceState(null,null,updatedUrl);">
                                Rejected (<span class="cnt_rejected"></span>)
                            </button>
                        </li>
                        {{-- endregion status list --}}

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <button class="dropdown-item collapsed btn_collapse_tabCliReqRec" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_tabCliReqRec" aria-expanded="false" aria-controls="collapse_tabCliReqRec" onclick="var updatedUrl='user-dashboard-mobile?active_tab=tabCliReqRec';window.history.replaceState(null,null,updatedUrl);">
                                All Requests
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col text-start compact-text-view lbl-crrntly-vw" style="display: flex; align-items: center; justify-content: center; text-align: center;">
                Currently viewing: <span class="fw-bold currently_viewing">None</span>
            </div>
        </div>
    </div>

    <div class="accordion" id="user_tbl_mobile-coll">
        <div class="accordion-item">
            <div id="onloadmessage" class="accordion-collapse collapse show" data-bs-parent="#user_tbl_mobile-coll">
                <div class="accordion-body px-1 m-0 text-center">
                    -- Choose table to view --
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div id="collapse_tabInTransit" class="accordion-collapse collapse {{-- show --}}" data-bs-parent="#user_tbl_mobile-coll">
                <div class="accordion-body px-1 m-0">
                    @include('general-dash-mobile-in-transit')
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div id="collapse_tabReceived" class="accordion-collapse collapse" data-bs-parent="#user_tbl_mobile-coll">
                <div class="accordion-body p-0 m-0">
                    @include('general-dash-mobile-received')
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div id="collapse_tabReleased" class="accordion-collapse collapse" data-bs-parent="#user_tbl_mobile-coll">
                <div class="accordion-body p-0 m-0">
                    @include('general-dash-mobile-released')
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div id="collapse_tabArchived" class="accordion-collapse collapse" data-bs-parent="#user_tbl_mobile-coll">
                <div class="accordion-body p-0 m-0">
                    @include('general-dash-mobile-archive')
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div id="collapse_tabRejected" class="accordion-collapse collapse" data-bs-parent="#user_tbl_mobile-coll">
                <div class="accordion-body p-0 m-0">
                    @include('general-dash-mobile-rejected')
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div id="collapse_tabCliReqRec" class="accordion-collapse collapse" data-bs-parent="#user_tbl_mobile-coll">
                <div class="accordion-body p-0 m-0">
                    @include('general-dash-mobile-manage-clients-requests-received')
                </div>
            </div>
        </div>
    </div>
    {{-- endregion main container --}}


    <br>
    <div class="row">
        <div class="col-md text-end">
            <a class="link-desktop-view" href="/dashboard"><i class="fa fa-desktop" aria-hidden="true"></i> Go back to desktop view</a>
        </div>
    </div>


    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}

    {{-- region general queries --}}
    <script>
        $(function() {

            //region count stats
            load_stats();

            function load_stats() {
                $.ajax({
                    url: "{{ url('get-action-stats') }}",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function(r) {
                        if (r.success) {
                            // console.log(r);
                            $('.cnt_in_transit').empty().append(r.cnt_in_transit);
                            $('.cnt_received').empty().append(r.cnt_received);
                            $('.cnt_released').empty().append(r.cnt_released);
                            $('.cnt_arhived').empty().append(r.cnt_arhived);
                            $('.cnt_rejected').empty().append(r.cnt_rejected);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            }
            $('.load_stats').click(function() {
                load_stats();
            });
            //endregion count stats

            // region click funciton
            $('.cnt_in_transit_card').click(function() {
                $('.tabInTransit').click();
            });
            $('.cnt_received_card').click(function() {
                $('.tabReceived').click();
            });
            $('.cnt_released_card').click(function() {
                $('.tabReleased').click();
            });
            $('.cnt_arhived_card').click(function() {
                $('.tabArchived').click();
            });
            $('.cnt_rejected_card').click(function() {
                $('.tabRejected').click();
            });
            // endregion click funciton

            //clear console
            $('.tabInTransit, .tabReceived, .tabReleased, .tabArchived, .tabRejected').click(function() {
                console.clear();
            });
        })
    </script>
    {{-- endregion general queries --}}

    {{-- dataTable datas --}}
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
@endsection
