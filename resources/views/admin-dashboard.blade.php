@extends('layout.master')
@section('title', 'Admin Dashboard')
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

    {{-- region custom style --}}
    <style>
        /* region zoom img tag */
        .zoom_admin_card {
            transition: transform .2s;
            /* Animation */
            margin: 0 auto;
        }

        .zoom_admin_card:hover {
            transform: scale(1.4);
            z-index: 999;
            background-color: rgba(0, 0, 0, 0.3);
            border: solid 3px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            color: #ffffff;
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        /* endregion zoom img tag */
    </style>
    {{-- endregion custom style --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu')
@endsection
@section('content')
    {{-- region set variable to  active_tab for iframe --}}
    @php
        $active_tab = '';
    @endphp
    @if (request()->has('active_tab'))
        @php
            $active_tab = request()->input('active_tab');
        @endphp
        @if ($active_tab == 'tabLR')
            <script type="text/javascript">
                $(function() {
                    $('#iframeLogRecs').attr('src', "{{ url('/admin-dashboard-logs') }}");
                    document.getElementById('iframeLogRecs').src = document.getElementById('iframeLogRecs').src;
                    tabLR = true;
                });
            </script>
        @endif
        @if ($active_tab == 'tabGS')
            <script type="text/javascript">
                $(function() {
                    $('#iframeGenSet').attr('src', "{{ url('/admin-dashboard-gen-set') }}");
                    document.getElementById('iframeGenSet').src = document.getElementById('iframeGenSet').src;
                    tabGS = true;
                });
            </script>
        @endif
    @else
        @php
            $active_tab = 'tabVP';
        @endphp
    @endif
    {{-- endregion set variable to  active_tab for iframe --}}

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 20%; left: 20%; width: 50%; height: 50%;">
        Loading
    </div>
    {{-- endregion loading indicator --}}

    {{-- region If Authenticated --}}
    <input type="hidden" class="auth_username" name="auth_username" id="auth_username" value="{{ Auth::user()->username }}">
    {{-- endregion If Authenticated --}}

    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 10px; z-index: 100;">
        <div id="genDashNotifs" class="p-1">
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
                        <li class="breadcrumb-item" aria-current="page">Admin Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}

        {{-- region stats card --}}
        <div class="row stat_cards" tooltip="click to load status" flow="down">
            {{-- region documents --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-blue-dark">{{-- original: l-bg-cherry --}}
                    <div class="card-statistic-3 p-3">
                        <div class="card-icon card-icon-large"><i class="fas fa-file"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Documents</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6">
                                <h2 class="d-flex align-items-center mb-0 disp_doc_all">
                                    ---
                                </h2>
                            </div>
                            <div class="col-6 text-right">
                                <div class="row">
                                    <div class="col">
                                        🠮<span class="disp_doc pe-1">---</span><span>Doc Atch</span><br>
                                        🠮<span class="disp_act_atch pe-1">---</span><span>Act Atch</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endregion documents --}}

            {{-- region classifications --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-green-dark"> {{-- original: l-bg-blue-dark --}}
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-tags"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Document Classifications</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6">
                                <h2 class="d-flex align-items-center mb-0 disp_classifications zoom_admin_card">
                                    ---
                                </h2>
                            </div>
                            <div class="col-6 text-right">
                                <div class="row">
                                    <div class="col">
                                        🠮<span class="disp_subclassifications pe-1">---</span><span>Sub-Class</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endregion classifications --}}

            {{-- region users --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-orange-dark">{{-- original: l-bg-green-dark --}}
                    <div class="card-statistic-3 p-3">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Users</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6">
                                <h2 class="d-flex align-items-center mb-0 disp_users zoom_admin_card">
                                    ---
                                </h2>
                            </div>
                            <div class="col-6 text-right">
                                <div class="row">
                                    <div class="col">
                                        🠮<span class="disp_users_active pe-1">---</span><span>Active User</span><br>
                                        🠮<span class="disp_users_inactive pe-1">---</span><span>Inactive User</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endregion users --}}

            {{-- region logs --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card"  style="background: linear-gradient(to right, #2c1264, #891eda) !important; color: #fff;">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-history"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Log Reports</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 disp_logs zoom_admin_card">
                                    ---
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endregion logs --}}
        </div>
        {{-- endregion stats card --}}

        {{-- region tabs --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="container" style="background:#fefffe">
                            <div class="tabs">
                                {{-- region Document Classifications --}}
                                <input type="radio" name="tabs" id="tabDC" @if ($active_tab == 'tabDC') checked="checked" @endif>
                                <label class="tab-label tabDC" for="tabDC" onclick="var updatedUrl='dashboard?active_tab=tabDC';window.history.replaceState(null,null,updatedUrl);">
                                    Document Classifications
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('admin-dash-classifications')
                                </div>
                                {{-- endregion Document Classifications --}}

                                {{-- region Document Sub-Classifications --}}
                                <input type="radio" name="tabs" id="tabDSC" @if ($active_tab == 'tabDSC') checked="checked" @endif>
                                <label class="tab-label tabDSC" for="tabDSC" onclick="var updatedUrl='dashboard?active_tab=tabDSC';window.history.replaceState(null,null,updatedUrl);">
                                    Document Sub-Classifications</label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('admin-dash-sub-classifications')
                                </div>
                                {{-- endregion Document Sub-Classifications --}}

                                {{-- region Document Sub-Class Requirements --}}
                                <input type="radio" name="tabs" id="tabDSCR" @if ($active_tab == 'tabDSCR') checked="checked" @endif>
                                <label class="tab-label" for="tabDSCR" onclick="var updatedUrl='dashboard?active_tab=tabDSCR';window.history.replaceState(null,null,updatedUrl);">
                                    Sub-Class Requirments</label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('admin-dash-sub-class-requirements')
                                    Tab Class Requirments
                                </div>
                                {{-- endregion Document Sub-Class Requirements --}}

                                {{-- region Users --}}
                                <input type="radio" name="tabs" id="tabUsers" @if ($active_tab == 'tabUsers') checked="checked" @endif>
                                <label class="tab-label tabUsers" for="tabUsers" onclick="var updatedUrl='dashboard?active_tab=tabUsers';window.history.replaceState(null,null,updatedUrl);">
                                    Users</label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('admin-dash-users')
                                </div>
                                {{-- endregion Users --}}

                                {{-- region Users --}}
                                <input type="radio" name="tabs" id="tabOffices" @if ($active_tab == 'tabOffices') checked="checked" @endif>
                                <label class="tab-label" for="tabOffices" onclick="var updatedUrl='dashboard?active_tab=tabOffices';window.history.replaceState(null,null,updatedUrl);">
                                    Offices</label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('admin-dash-offices')
                                </div>
                                {{-- endregion Users --}}
                                
                                {{-- region Users --}}
                                <input type="radio" name="tabs" id="tabUDO" @if ($active_tab == 'tabUDO') checked="checked" @endif>
                                <label class="tab-label tabUDO" for="tabUDO" onclick="var updatedUrl='dashboard?active_tab=tabUDO';window.history.replaceState(null,null,updatedUrl);">
                                    Office Designation</label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('admin-dash-users-desig-office')
                                </div>
                                {{-- endregion Users --}}

                                {{-- region Users --}}
                                <input type="radio" name="tabs" id="tabCrslImgs" @if ($active_tab == 'tabCrslImgs') checked="checked" @endif>
                                <label class="tab-label" for="tabCrslImgs" onclick="var updatedUrl='dashboard?active_tab=tabCrslImgs';window.history.replaceState(null,null,updatedUrl);">
                                    Carousel Images</label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('admin-dash-carousel-imgs')
                                </div>
                                {{-- endregion Users --}}

                                {{-- region Log Reports --}}
                                <input type="radio" name="tabs" id="tabLR" @if ($active_tab == 'tabLR') checked="checked" @endif>
                                <label class="tab-label tabLR" for="tabLR" onclick="var updatedUrl='dashboard?active_tab=tabLR';window.history.replaceState(null,null,updatedUrl);">
                                    Log Reports
                                    <a class="badge rounded-pill text-dark" style="background-color: #00ffaa" href="javascript:void(0)" onclick="document.getElementById('iframeLogRecs').src = document.getElementById('iframeLogRecs').src;" data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                    <a class="badge rounded-pill bg-info text-dark" href="/admin-dashboard-logs" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Open Full View"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    {{-- contractOfServiceHRStartisticsReportFull --}}
                                    <iframe id="iframeLogRecs" frameborder="0" width="100%" height="700px"></iframe>
                                </div>
                                {{-- endregion Log Reports --}}

                                {{-- region General Settings --}}
                                <input type="radio" name="tabs" id="tabGS" @if ($active_tab == 'tabGS') checked="checked" @endif>
                                <label class="tab-label" for="tabGS" onclick="var updatedUrl='dashboard?active_tab=tabGS';window.history.replaceState(null,null,updatedUrl);">
                                    General Settings
                                    <a class="badge rounded-pill text-dark" style="background-color: #00ffaa" href="javascript:void(0)" onclick="document.getElementById('iframeGenSet').src = document.getElementById('iframeGenSet').src;" data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                    <a class="badge rounded-pill bg-info text-dark" href="/admin-dashboard-gen-set" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Open Full View"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}} {{-- using iframe do not remove --}}
                                    <iframe id="iframeGenSet" frameborder="0" width="100%" height="700px"></iframe>
                                </div>
                                {{-- endregion General Settings --}}
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

    {{-- region queries --}}
    <script>
        // region get statistics
        $('.stat_cards').click(function() {
            $.ajax({
                url: "{{ url('get-redtsstats') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                success: function(r) {
                    if (r.success) {
                        $('.disp_doc_all').empty().append(r.documents + r.action_atch);
                        $('.disp_doc').empty().append(r.documents);
                        $('.disp_act_atch').empty().append(r.action_atch);
                        $('.disp_classifications').empty().append(r.classifications);
                        $('.disp_subclassifications').empty().append(r.subclassifications);
                        $('.disp_users').empty().append(r.users);
                        $('.disp_users_active').empty().append(r.users_active);
                        $('.disp_users_inactive').empty().append(r.users_inactive);
                        $('.disp_logs').empty().append(r.logs);

                        $('.disp_classifications, .disp_subclassifications, .disp_users, .disp_logs').css('cursor', 'pointer').hover(
                            function() {
                                $(this).addClass('text-primary');
                            },
                            function() {
                                $(this).removeClass('text-primary');
                            }
                        );
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion get statistics

        // region click card
        $('.disp_classifications').click(function() {
            $('.tabDC').click();
        });
        $('.disp_subclassifications').click(function() {
            $('.tabDSC').click();
        });
        $('.disp_users').click(function() {
            $('.tabUsers').click();
        });
        $('.disp_logs').click(function() {
            $('.tabLR').click();
        });

        // load table once for iframe
        let tabLR = false;
        $('label[for=tabLR]').click(function() {
            if (tabLR == false) {
                $('#iframeLogRecs').attr('src', "{{ url('/admin-dashboard-logs') }}");
                document.getElementById('iframeLogRecs').src = document.getElementById('iframeLogRecs').src;
                tabLR = true;
            }
        });

        let tabGS = false;
        $('label[for=tabGS]').click(function() {
            if (tabGS == false) {
                $('#iframeGenSet').attr('src', "{{ url('/admin-dashboard-gen-set') }}");
                document.getElementById('iframeGenSet').src = document.getElementById('iframeGenSet').src;
                tabGS = true;
            }
        });
        // endregion click card for iframe
    </script>
    {{-- endregion queries --}}

    {{-- dataTable datas --}}
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
@endsection
