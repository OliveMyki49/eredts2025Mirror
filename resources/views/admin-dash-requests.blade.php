@extends('layout.master')
@section('title', 'Client Request')
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
    <div class="bg-light p-2 rounded">
        {{-- region bread crumb --}}
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-white rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}

        {{-- region  --}}
        <div class="row load_stats">
            <div class="col-xl-2 gen-card-zoom">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4 cnt_in_transit_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-truck"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">In-Transit</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 cnt_in_transit">
                                    ---
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 gen-card-zoom">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4 cnt_received_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-check-circle"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Received</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 cnt_received">
                                    ---
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 gen-card-zoom">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4 cnt_released_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-fighter-jet"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Released</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 cnt_released">
                                    ---
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 gen-card-zoom">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4 cnt_arhived_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-archive"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Completed</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 cnt_arhived">
                                    ---
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 gen-card-zoom">
                <div class="card" style="background: linear-gradient(to right, #641220, #da1e37) !important; color: #fff;">
                    <div class="card-statistic-3 p-4 cnt_rejected_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-thumbs-down"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Rejected</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 cnt_rejected">
                                    ---
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- region tabs --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="container" style="background:#fefffe">
                            <div class="tabs">
                                {{-- region In-Transit --}}
                                <input type="radio" name="tabs" id="tabInTransit" @if ($active_tab == 'tabInTransit') checked="checked" @endif>
                                <label class="tab-label tabInTransit" for="tabInTransit" onclick="var updatedUrl='admin-dash-req?active_tab=tabInTransit';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-truck" aria-hidden="true"></i> In-Transit
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('general-dash-in-transit')
                                </div>
                                {{-- endregion In-Transit --}}

                                {{-- region Received --}}
                                <input type="radio" name="tabs" id="tabReceived" @if ($active_tab == 'tabReceived') checked="checked" @endif>
                                <label class="tab-label tabReceived" for="tabReceived" onclick="var updatedUrl='admin-dash-req?active_tab=tabReceived';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> Received
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('general-dash-received')
                                </div>
                                {{-- endregion Received --}}

                                {{-- region Released --}}
                                <input type="radio" name="tabs" id="tabReleased" @if ($active_tab == 'tabReleased') checked="checked" @endif>
                                <label class="tab-label tabReleased" for="tabReleased" onclick="var updatedUrl='admin-dash-req?active_tab=tabReleased';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-fighter-jet" aria-hidden="true"></i> Released
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('general-dash-released')
                                </div>
                                {{-- endregion Released --}}

                                {{-- region Archived --}}
                                <input type="radio" name="tabs" id="tabArchived" @if ($active_tab == 'tabArchived') checked="checked" @endif>
                                <label class="tab-label tabArchived" for="tabArchived" onclick="var updatedUrl='admin-dash-req?active_tab=tabArchived';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-archive" aria-hidden="true"></i> Completed
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('general-dash-archive')
                                </div>
                                {{-- endregion Archived --}}

                                {{-- region Archived --}}
                                <input type="radio" name="tabs" id="tabRejected" @if ($active_tab == 'tabRejected') checked="checked" @endif>
                                <label class="tab-label tabRejected" for="tabRejected" onclick="var updatedUrl='admin-dash-req?active_tab=tabRejected';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-archive" aria-hidden="true"></i> Rejected
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('general-dash-rejected')
                                </div>
                                {{-- endregion Archived --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- endregion tabs --}}
    </div>
    {{-- endregion main container --}}


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
        })
    </script>
    {{-- endregion general queries --}}

    {{-- dataTable datas --}}
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
@endsection