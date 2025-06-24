@extends('layout.master')
@section('title', 'Manage Requests')
@section('head_extension')
    {{-- region custom css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/tab.css') }}">
    <style>
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
    </style>
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
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 20%; left: 20%; width: 50%; height: 50%;">
        Loading
    </div>
    {{-- endregion loading indicator --}}

    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 10px; z-index: 100;cursor: pointer;">
        <div id="genDashNotifs" class="genDashNotifs" class="p-1">
            {{-- Populate notifications here --}}
        </div>
    </div>
    {{-- endregion notification --}}

    {{-- region main container --}}
    <div class="bg-light p-2 apply_bg_theme">
        {{-- region bread crumb --}}
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-white rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                        <li class="breadcrumb-item" aria-current="page">Manage Client's Requests</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}


        {{-- region stats cards  --}}
        {{-- <div class="row load_stats">
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
        </div> --}}
        {{-- endregion stats cards --}}

        {{-- region designate info --}}
        <div class="collapse" style="width: 400px;" id="cllpsReqVwInf">
            <div class="card card-body">
                <div class="d-flex justify-content-start">
                    <div class="content">
                        <h4>Request Viewer</h4>
                        <hr>
                        <p class="fs-6"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Allow user to view request action from other users.</p>
                        <p class="fs-6 fw-bold">Note: Please contact admin to set-up this viewer.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#cllpsReqVwInf" aria-expanded="false" aria-controls="cllpsReqVwInf">Close</button>
                </div>
            </div>
        </div>
        {{-- endregion designate info --}}


        {{-- region tabs --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="container" style="background:#fefffe">
                            <div class="tabs">
                                {{-- region specific user total requests --}}
                                @if (Auth::user()->access_id == 1 || Auth::user()->access_id == 2)
                                    {{-- double protection for access all request records --}}
                                    <input type="radio" name="tabs" id="tabRegCli" @if ($active_tab == 'tabRegCli') checked="checked" @endif>
                                    <label class="tab-label tabRegCli" for="tabRegCli" onclick="var updatedUrl='admin-dash-mng-cli-req?active_tab=tabRegCli';window.history.replaceState(null,null,updatedUrl);">
                                        Registered Clients
                                    </label>
                                    <div class="tab">
                                        {{-- Call in separate file --}}
                                        @include('admin-dash-registered-client')
                                    </div>
                                @endif
                                {{-- endregion specific user total requests --}}

                                {{-- region specific user total requests --}}
                                <input type="radio" name="tabs" id="tabCliReqRec" @if ($active_tab == 'tabCliReqRec') checked="checked" @endif>
                                <label class="tab-label tabCliReqRec" for="tabCliReqRec" onclick="var updatedUrl='admin-dash-mng-cli-req?active_tab=tabCliReqRec';window.history.replaceState(null,null,updatedUrl);">
                                    My Received Requests
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('general-dash-manage-clients-requests-received')
                                </div>
                                {{-- endregion specific user total requests --}}

                                {{-- region specific user total requests --}}
                                <input type="radio" name="tabs" id="tabCliReqRecOASpecific" @if ($active_tab == 'tabCliReqRecOASpecific') checked="checked" @endif>
                                <label class="tab-label tabCliReqRecOASpecific" for="tabCliReqRecOASpecific" onclick="var updatedUrl='admin-dash-mng-cli-req?active_tab=tabCliReqRecOASpecific';window.history.replaceState(null,null,updatedUrl);">
                                    Requests Viewer
                                    <a class="badge rounded-pill bg-info text-dark fw-bold" data-bs-toggle="collapse" href="#cllpsReqVwInf" role="button" aria-expanded="false" aria-controls="cllpsReqVwInf">
                                        <b style="font-size: 12px;">?</b>
                                    </a>
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('general-dash-manage-clients-requests-received-specific')
                                </div>
                                {{-- endregion specific user total requests --}}

                                {{-- region specific user total requests --}}
                                @if (Auth::user()->access_id == 1 || Auth::user()->access_id == 2)
                                    {{-- double protection for access all request records --}}
                                    <input type="radio" name="tabs" id="tabCliReqRecOA" @if ($active_tab == 'tabCliReqRecOA') checked="checked" @endif>
                                    <label class="tab-label tabCliReqRecOA" for="tabCliReqRecOA" onclick="var updatedUrl='admin-dash-mng-cli-req?active_tab=tabCliReqRecOA';window.history.replaceState(null,null,updatedUrl);">
                                        Overall Received Requests
                                    </label>
                                    <div class="tab">
                                        {{-- Call in separate file --}}
                                        @include('general-dash-manage-clients-requests-received-all')
                                    </div>
                                @endif
                                {{-- endregion specific user total requests --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- endregion tabs --}}

        <div class="row">
            <div class="col-md-6">
                <a href="/dashboard?active_sidebar=gen-dash-home" class="btn-show-all">Go to dashboard</a>
            </div>
            <div class="col-md-6 text-end">
                <a href="/user-dashboard-mobile" class="btn-user-dashboard-mobile"><i class="fa fa-mobile" aria-hidden="true"></i> Mobile View</a>
            </div>
        </div>
    </div>
    {{-- endregion main container --}}

    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}

    {{-- region queries --}}
    <script>
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

        /* region unsecure copy to clipboard */
        //this function is called by child modules
        //since data is fetch through a non existing button in a table generated you need the table name to enable the copy button to work
        $('#dtCliReqRec, #dtCliReqRecOASpecific, #dtCliReqRecOA').on('click', '.admin-dash-mng-cli-req-copy-to-clipboard', function() {
            let copyVal = $(this).data('val');
            console.log('working in this module');
            unsecuredCopyToClipboard(copyVal)
        });
        /* endregion unsecure copy to clipboard */

        /* region unsecured copy text copy to clipboard */
        function unsecuredCopyToClipboard(text) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus({preventScroll:true});
            textArea.select();
            try {
                document.execCommand('copy');
                $('.genDashNotifs').append('' +
                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                    '    <strong>The document number has been copied to the clipboard.</strong><br>' +
                    '</div>'
                );
            } catch (err) {
                console.error('Unable to copy to clipboard', err);
            }
            document.body.removeChild(textArea);
        }
        /* endregion unsecured copy text copy to clipboard */
    </script>
    {{-- endregion queries --}}

    {{-- dataTable datas --}}
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
@endsection
