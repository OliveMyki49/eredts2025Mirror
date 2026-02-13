@extends('layout.master')
@section('title', 'Main Dashboard')
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

        /* reload function custom show label */
        .btn-refresh {
            transition: transform .2s;
            /* Animation */
            margin: 0 auto;
        }

        .btn-refresh:hover {
            transform: scale(1.1);
            z-index: 999;
            /* (150% gen-card-zoom - Note: if the gen-card-zoom is too large, it will go outside of the viewport) */
        }

        .btn-refresh-label {
            display: none;
        }

        .btn-refresh:hover .btn-refresh-label,
        .btn-addndoc:hover .btn-refresh-label {
            display: inline-block;
        }

        /* standardize the font size */
        table .fs-6 {
            /* all font size 6 inside the table is standardized to 13px*/
            font-size: 13px !important;
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
            buttonVisibility();

            function buttonVisibility() {
                // region activate theme when session active
                let theme = sessionStorage.getItem("bg_theme");
                let theme_img = sessionStorage.getItem("bg_theme_img");
                if (theme == 1) {
                    $('.btn-user-dashboard-mobile').addClass('bg-primary text-white rounded mt-5 px-2 py-1');
                    $('.btn-show-all').addClass('bg-primary text-white rounded mt-5 px-2 py-1');
                } else {
                    // Handle the case when theme is not equal to 1
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
    <input type="hidden" class="auth_userid" name="auth_userid" id="auth_userid" value="{{ Auth::user()->id }}">
    <input type="hidden" class="auth_username" name="auth_username" id="auth_username" value="{{ Auth::user()->username }}">
    {{-- endregion If Authenticated --}}

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 50%; left: 40%; width: 10%; height: 10%;">
        loading. . .
    </div>
    {{-- endregion loading indicator --}}

    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 20px; z-index: 9999;">
        <div id="genDashNotifs" class="genDashNotifs" class="p-1">
            {{-- Populate notifications here --}}
        </div>
    </div>
    {{-- endregion notification --}}


    {{-- region main container --}}
    <div class="bg-light p-2 rounded apply_bg_theme" style="padding: 4px!important;">
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

        <div class="d-flex flex-row mb-3">
            <div class="p-2">
                <button class="btn btn-outline-primary btn-addndoc" tooltip="Create new document" flow="down" data-bs-toggle="modal" data-bs-target="#addndocModal">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    {{-- <span class="btn-refresh-label">Create</span> --}}
                    Create
                </button>
            </div>
            <div class="p-2">
                <button class="btn btn-outline-secondary btn-refresh" tooltip="Auto load tables every 10 seconds" flow="down">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    {{-- <span class="btn-refresh-label"> Autoload</span> --}}
                    Autoload
                </button>
            </div>
        </div>

        {{-- region stats cards  --}}
        <div class="row load_stats">
            <div class="col-xl-2 gen-card-zoom"> {{-- card for in-transit --}}
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
            <div class="col-xl-2 gen-card-zoom"> {{-- card for received --}}
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
            <div class="col-xl-2 gen-card-zoom"> {{-- card for forwarded / released --}}
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4 cnt_released_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-fighter-jet"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Forwarded</h5>
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
            <div class="col-xl-2 gen-card-zoom"> {{-- card for archived --}}
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4 cnt_arhived_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-archive"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Archived</h5>
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
            <div class="col-xl-2 gen-card-zoom"> {{-- card for archived --}}
                <div class="card l-bg-purple-dark">
                    <div class="card-statistic-3 p-4 cnt_snt_crtd_docs_card" style="cursor: pointer;">
                        <div class="card-icon card-icon-large"><i class="fas fa-paper-plane"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Created</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 cnt_snt_crtd_docs">
                                    ---
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- endregion stats cards --}}

        {{-- region tabs --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="container" style="background:#fefffe;padding: 0px;">
                            <div class="tabs">
                                {{-- region In-Transit --}}
                                <input type="radio" name="tabs" id="tabInTransit" @if ($active_tab == 'tabInTransit') checked="checked" @endif>
                                <label class="tab-label tabInTransit" for="tabInTransit" onclick="var updatedUrl='dashboard?active_tab=tabInTransit';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-truck" aria-hidden="true"></i> In-Transit
                                </label>
                                <div class="tab">
                                    <span style="cursor: pointer; font-size: 13px;" class="badge text-wrap bg-warning text-black mb-2 in-transit-msg-1" title="❌ click to close ">All users in the same office can see all in-transit documents within the same office.</span>
                                    {{-- Call in separate file --}}
                                    @include('gen1-in-transit')
                                </div>
                                {{-- endregion In-Transit --}}

                                {{-- region Received --}}
                                <input type="radio" name="tabs" id="tabReceived" @if ($active_tab == 'tabReceived') checked="checked" @endif>
                                <label class="tab-label tabReceived" for="tabReceived" onclick="var updatedUrl='dashboard?active_tab=tabReceived';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> Received
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('gen2-received')
                                </div>
                                {{-- endregion Received --}}

                                {{-- region Released --}}
                                <input type="radio" name="tabs" id="tabReleased" @if ($active_tab == 'tabReleased') checked="checked" @endif>
                                <label class="tab-label tabReleased" for="tabReleased" onclick="var updatedUrl='dashboard?active_tab=tabReleased';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-fighter-jet" aria-hidden="true"></i> Forwarded
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('gen3-released')
                                </div>
                                {{-- endregion Released --}}

                                {{-- region Archived --}}
                                <input type="radio" name="tabs" id="tabArchived" @if ($active_tab == 'tabArchived') checked="checked" @endif>
                                <label class="tab-label tabArchived" for="tabArchived" onclick="var updatedUrl='dashboard?active_tab=tabArchived';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-archive" aria-hidden="true"></i> Archived
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('gen4-archive')
                                </div>
                                {{-- endregion Archived --}}

                                {{-- region Created Documents --}}
                                <input type="radio" name="tabs" id="tabCreated" @if ($active_tab == 'tabCreated') checked="checked" @endif>
                                <label class="tab-label align-end tabCreated" for="tabCreated" onclick="var updatedUrl='dashboard?active_tab=tabCreated';window.history.replaceState(null,null,updatedUrl);">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Created Documents
                                </label>
                                <div class="tab">
                                    {{-- Call in separate file --}}
                                    @include('gen5-created') {{-- this is not yet implemented --}}
                                </div>
                                {{-- endregion Created Documents --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- endregion tabs --}}

        <div class="row">
            <div class="col-md-6">
                {{-- <a href="/admin-dash-mng-cli-req?active_sidebar=admin-dash-mng-cli-req" class="btn-show-all">Show all requests I received</a> --}}
                {{-- <a href="/admin-dash-mng-cli-req?active_sidebar=admin-dash-mng-cli-req" target="_blank" class="btn-show-all" title="open in separate tab"><i class="fa fa-external-link" aria-hidden="true"></i></a> --}}
            </div>
            <div class="col-md-6 text-end">
                {{-- <a href="/user-dashboard-mobile" class="btn-user-dashboard-mobile"><i class="fa fa-mobile" aria-hidden="true"></i> Mobile View</a> --}}
            </div>
        </div>
    </div>
    {{-- endregion main container --}}

    {{-- region add to new document modal --}}
    <div class="modal fade" id="addndocModal" tabindex="-1" aria-labelledby="addndocLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-white" id="addndocLabel">Create New Document <b><u><span class="sdf fs-6"></span></u></b></h1>
                    <a href="/index-bulk-doc" target="_blank" class="add-bulk-send-document-item btn btn-outline-light ms-3" title="Send document to an office in bulk with separate document tracking numbers">
                        <i class="fa fa-file-text" aria-hidden="true"></i> CREATE BULK DOCUMENT ROUTING
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="height: 800px; overflow-y: scroll;">
                    <form id="addndocForm">

                        <div class="row">
                            <div class="col mb-2">
                                <span class="fs-6 fw-bold">
                                    Document Information
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            {{-- document date --}}
                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <input type="date" id="addndocDashdoc_date" class="form-control" name="doc_date" placeholder="Document Date*">
                                    <label for="addndocDashdoc_date" class="fs-6">Document Date*</label>
                                </div>
                            </div>

                            {{-- classification --}}
                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <input class="form-control" list="addndocDashclass_id_list" id="addndocDashclass_name" placeholder="Document Classification*">
                                    <input class="form-control" type="text" id="addndocDashclass_slug" name="class_slug" hidden>
                                    <datalist id="addndocDashclass_id_list">
                                        {{-- Classification will be populated here --}}
                                    </datalist>
                                    <label for="addndocDashclass_name" class="fs-6">Classification*</label>
                                </div>
                            </div>

                            {{-- document number generated --}}
                            <div class="col-md-4 mb-2">
                                {{-- display only non editable data --}}
                                <div class="form-floating">
                                    <input type="text" class="form-control toUpperCase" style="color:#343a40;" id="addndocDocNo" name="doc_no" placeholder="Document Number (Generated)" required readonly>
                                    <label for="addndocDocNo" style="color:rgba(33, 37, 41, 0.75);;" class="fs-6">Document No.*</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- confidential choose --}}
                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <select type="text" class="form-control" id="addndocConfidential" name="confidential">
                                        <option value="0">NO</option>
                                        <option value="1">YES</option>
                                    </select>
                                    <label for="addndocConfidential" class="fs-6">Confidential*</label>
                                </div>
                            </div>

                            {{-- compliance deadline --}}
                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <input type="date" id="addndocDashcompliance_deadline" class="form-control" name="compliance_deadline" placeholder="Compliance Deadline (Optional)">
                                    <label for="addndocDashcompliance_deadline" class="fs-6">Compliance Date (Optional)</label>
                                </div>
                            </div>

                            {{-- spix governemtn application type --}}
                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <select type="text" class="form-control" id="addndocapp_type_uuid" name="app_type_uuid">
                                        {{-- insert application types here with transaction type --}}
                                    </select>
                                    <label for="addndocapp_type_uuid" class="fs-6">Application Type*</label>
                                    <input class="form-control" type="text" id="addndoctransac_uuid" name="transac_uuid" hidden>
                                </div>
                            </div>
                        </div>

                        {{-- region agency/business name --}}
                        <div class="row">
                            <div class="col-md mb-3">
                                <div class="form-floating" title="255 characters only">
                                    <textarea class="form-control toUpperCase" placeholder="Subject here" id="addndocSubject" name="subject" maxlength="255"></textarea>
                                    <label for="addndocSubject" style="font-size: 1rem;">Subject*</label>
                                </div>
                            </div>
                        </div>
                        {{-- endregion agency/business name --}}

                        <div class="row">
                            <div class="col mb-2">
                                <span class="fs-6 fw-bold">
                                    Document Destination
                                </span>
                            </div>
                        </div>

                        {{-- region document destination --}}
                        <div class="row">
                            {{-- choose where office to release --}}
                            <div class="col-md-12 mb-3 addndoc_action_other">
                                <div class="addSendToListaddndocmsg"></div>
                                <div class="addndoc_action_other_toggle border border-secondary px-2 rounded">
                                    <div id="addSendToListaddndoc" class="row">
                                        {{-- populate send to office here --}}
                                    </div>

                                    <div class="form-floating">
                                        <input type="text" class="form-control fs-6 border-0" placeholder="Search by office name . . ." id="addSendToaddndoc">
                                        <label for="addSendToaddndoc" style="font-size: 1rem;">Choose Office*</label>
                                    </div>
                                    <div class="col" style="position: relative">
                                        <ul class="list-group addPWB-searchResult" style="position:absolute ;z-index: 100"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endregion document destination --}}

                        <div class="row">
                            <div class="col mb-2">
                                <span class="fs-6 fw-bold">
                                    Document Attachment Details
                                </span>
                            </div>
                        </div>

                        {{-- region files and client input --}}
                        {{-- attachments --}}
                        <div class="row addndoc-file-input-container">
                            {{-- Attachment remarks for action --}}
                            <div class="col-md mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control toUpperCase" placeholder="AttchRemarks here" id="addndocAttchRemarks" name="AttchRemarks"></textarea>
                                    <label for="addndocAttchRemarks" style="font-size: 1rem;">Remarks (Optional)</label>
                                </div>
                            </div>

                            {{-- file attachments --}}
                            <div class="col-md mb-2">
                                <label class="btn btn-outline-secondary" style="width: 100%; height: 57px; padding: 10px; border-style: dashed;" title="
                                    allowed file formats: pdf, jpeg, jpg, png, doc, docx, xls, xlsx, ppt, pptx">
                                    <span class="file_label fs-6">📄 Attach Document/s (Optional)</span><br>
                                    <sup class="upload_limit_disp">{{-- upload size limit here --}}</sup><br>
                                    <input type="file" class="form-control file_input_tag addndocFileUploads" name="addndocFileUploads[]" data-label="Attach Permit / Certificate of Approval Here" style="visibility:hidden;" multiple>
                                </label>

                                <br>
                                <div class="file_list">
                                    {{-- files for upload will be displayed here --}}
                                </div>
                            </div>
                        </div>
                        {{-- endregion files and client input --}}

                    </form>{{-- end of addndocForm form --}}
                </div>{{-- end of modal-body --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary btn-addndoc-submit">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- endregion add to new document modal --}}

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
            let cnt_in_transit_notif = 0;

            function load_stats() {
                $.ajax({
                    url: "/get-action-stats",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function(r) {
                        if (r.success) {
                            cnt_in_transit_notif = r.cnt_in_transit

                            $('.cnt_in_transit').empty().append(r.cnt_in_transit);
                            $('.cnt_received').empty().append(r.cnt_received);
                            $('.cnt_released').empty().append(r.cnt_released);
                            $('.cnt_arhived').empty().append(r.cnt_arhived);
                            $('.cnt_snt_crtd_docs').empty().append(r.cnt_snt_crtd_docs);

                            if (r.urgent_count > 0) {
                                $('.status-urgent').empty().append('<span class="badge bg-warning text-black badge-status-overdue" style="cursor: pointer" title="No action taken for more than 24 hours">❗ URGENT (' + r.urgent_count + ')<span>');
                            }
                            if (r.overdue_count > 3) {
                                $('.status-overdue').empty().append('<span class="badge bg-danger badge-status-overdue" style="cursor: pointer" title="No action taken for more than 3 days">❗ OVERDUE (' + r.overdue_count + ')<span>');
                            }
                            if (r.past_deadline > 0) {
                                $('.status-past-deadline').empty().append('<span class="badge bg-danger badge-status-overdue" style="cursor: pointer"  title="Document routing that is past compliance date/deadline">❗ LATE (' + r.past_deadline + ')<span>');
                            }
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

            function flashTitle(pageTitle, newTitle) {
                if (cnt_in_transit_notif > 0) {
                    if (document.title == pageTitle) {
                        document.title = newTitle;
                    } else {
                        document.title = pageTitle;
                    }
                }

            }

            // setInterval(function() {
            flashTitle('RFSOATS', '(' + cnt_in_transit_notif + ') In-transit ⚠️⚠️⚠️');
            // }, 1500);
            //endregion count stats

            //region click overdue warning
            $('.status-overdue, .status-past-deadline').on('click', '.badge-status-overdue', function() {
                // console.log()
                // $(this).removeClass('badge-status-overdue');
                $('.tabInTransit').click();
            });
            //endregion click overdue warning

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
            $('.cnt_snt_crtd_docs_card').click(function() {
                $('.tabCreated').click();
            });
            // endregion click funciton

            //clear console
            $('.tabInTransit, .tabReceived, .tabReleased, .tabArchived, .tabRejected, .tabCreated').click(function() {
                console.clear();
            });

            //region auto load function
            //auto load function
            let intervalId;

            // only peform function when table is already loaded
            let tabInTransit_loaded = false;
            let tabReceived_loaded = false;
            let tabReleased_loaded = false;
            let tabArchived_loaded = false;
            let tabCreated_loaded = false;
            $('.tabInTransit').click(function() {
                document.title = "In-Transit"; // change page title
                if (tabInTransit_loaded == false) {
                    tabInTransit_loaded = true;
                }
            });
            $('.tabReceived').click(function() {
                document.title = "Received"; // change page title
                if (tabReceived_loaded == false) {
                    tabReceived_loaded = true;
                }
            });
            $('.tabReleased').click(function() {
                document.title = "Forwarded"; // change page title
                if (tabReleased_loaded == false) {
                    tabReleased_loaded = true;
                }
            });
            $('.tabArchived').click(function() {
                document.title = "Archived"; // change page title
                if (tabArchived_loaded == false) {
                    tabArchived_loaded = true;
                }
            });
            $('.tabCreated').click(function() {
                document.title = "Created"; // change page title
                if (tabCreated_loaded == false) {
                    tabCreated_loaded = true;
                }
            });

            $('.btn-refresh').click(function() {
                if (intervalId) {
                    // this will stop the auto reload
                    clearInterval(intervalId);
                    intervalId = null;
                    $('.btn-refresh-label').empty().append('Auto reload stopped');
                    $('.btn-refresh').removeClass('btn-success').addClass('btn-outline-secondary');
                } else {
                    intervalId = setInterval(function() {
                        // Auto load event will happen here

                        // reload the card
                        load_stats()

                        // reload the table
                        if (tabInTransit_loaded == true) {
                            $('#dTInTransit').DataTable().ajax.reload(null, false);
                        }
                        if (tabReceived_loaded == true) {
                            $('#dTReceived').DataTable().ajax.reload(null, false);
                        }
                        if (tabReleased_loaded == true) {
                            $('#dTReleased').DataTable().ajax.reload(null, false);
                        }
                        if (tabArchived_loaded == true) {
                            $('#dTArchived').DataTable().ajax.reload(null, false);
                        }
                        if (tabCreated_loaded == true) {
                            $('#dTCreated').DataTable().ajax.reload(null, false);
                        }
                    }, 10000);
                    $('.btn-refresh-label').empty().append('Auto reload started');
                    $('.btn-refresh').removeClass('btn-outline-secondary').addClass('btn-success');
                }
            });
            //endregion auto load function

            /* ============================================== region for add new document =========================================================== */
            // region on open modal add new doc
            let maxFileSize; // 10 MB in bytes will be overwritten
            let addndoc_first_open = true;
            $('.btn-addndoc').click(function() {
                if (addndoc_first_open == true) {
                    // region populate selection tags
                    $.ajax({
                        url: "/fetch-docInfoSelectTags",
                        method: 'GET',
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        success: function(r) {
                            if (r.success) {
                                r.classification.forEach(dt => {
                                    $('#addndocDashclass_id_list').append('' +
                                        '<option>' +
                                        '   ' + dt['description'] + ' [' + dt['slug'] + ']' +
                                        '</option>'
                                    );
                                });
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                    // endregion populate selection tags

                    // Set the current date as the default value
                    $('#addndocDashdoc_date').val(getCurrentDate());

                    // region get current upload size limit
                    $.ajax({
                        url: "/get-upload-size",
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        success: function(r) {
                            if (r.success) {
                                maxFileSize = r.upload

                                var bytes = maxFileSize;
                                var megabytes = (bytes / (1024 * 1024)).toFixed(2);

                                $('.upload_limit_disp').empty().append("upload limit: below " + megabytes + "MB each file")

                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                    // endregion get current upload size limit

                    // region get application and transaction type
                    $.ajax({
                        url: "/get-app-transact-type",
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        success: function(r) {
                            if (r.success) {
                                $('#addndocapp_type_uuid').empty();

                                $('#addndoctransac_uuid').val(r.app_type[0].transac_uuid); //this is supposed to be the first uuid fetched

                                r.app_type.forEach(x => {
                                    $('#addndocapp_type_uuid').append('<option value="' + x.app_uuid + '" data-transac_uuid="' + x.transac_uuid + '">' + x.applicant + ' (' + x.transac_slug + ')</option>')
                                });
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                    // region get application and transaction type

                    addndoc_first_open = false; //prevent reentering data or loading selection list again
                }
            });
            // endregion on open modal add new doc

            // region get current date
            function getCurrentDate() {
                const currentDate = new Date();
                const year = currentDate.getFullYear();
                const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
                const day = currentDate.getDate().toString().padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
            // endregion get current date

            // region when selected classification
            $('#addndocDashclass_name').change(function() {
                dt = $('#addndocDashclass_name').val();
                if (dt != "" && dt.includes('[') && dt.includes(']')) { //check if it inlcudes the format needed
                    cleanData = dt.replace(']', '');
                    dtArr = cleanData.split('[');

                    $('#addndocDashclass_slug').val(dtArr[1]);
                    $('#addndocDashclass_name').val(dtArr[0].toUpperCase());

                    //data for doc number
                    let office_origin = "",
                        classification = "",
                        uId = $('.auth_userid').val();

                    classification = dtArr[1]; //get class slug for the doc num

                    // Get the current date
                    let date = new Date();

                    // Extract the year, month, and day
                    let year = date.getFullYear();
                    let month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based, so add 1
                    let day = date.getDate().toString().padStart(2, '0'); // Pad single digits with leading zero

                    // Extract the hour and minute
                    let hour = date.getHours().toString().padStart(2, '0'); // Pad single digits with leading zero
                    let minute = date.getMinutes().toString().padStart(2, '0'); // Pad single digits with leading zero
                    let second = date.getSeconds().toString().padStart(2, '0'); // Pad single digits with leading zero

                    // Format the date as YYYY.MM.DD
                    let formattedDate = `${year}.${month}.${day}`;

                    // Format as HH.MM
                    let formattedTime = `${hour}.${minute}.${second}`;

                    // during on change get the slug of the request classification
                    //get the office of the user creating doc
                    $.ajax({
                        url: "/get-user-office",
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        success: function(r) {
                            if (r.success) {
                                office_origin = r.user_office;

                                //create document number
                                if (office_origin != "" && classification != "") {
                                    let generated_doc_no = office_origin + '-' + classification + '-' + formattedDate + '-' + uId + formattedTime;
                                    $('#addndocDocNo').val(generated_doc_no.toUpperCase());
                                }
                            };
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    //remove values from this
                    $('#addndocDashclass_slug').val('');
                    $('#addndocDocNo').val('');
                }
            });
            // endregion when selected classification

            //region select of confidential or not
            $('#addndocConfidential').change(function() {
                dt = $('#addndocConfidential :selected').val();
                if (dt == 0) {
                    $(this).css('color', '#198754'); //green
                } else {
                    $(this).css('color', '#dc3545'); //red
                }
            });
            //endregion select of confidential or not

            // region file upload viewer
            let fileArrayInput = [];

            $('.file_input_tag').on('change', function(event) {
                // Allowed file extensions
                let allowedExtensions = ['pdf', 'jpeg', 'jpg', 'png', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'];
                let maxFileSize = 10 * 1024 * 1024; // 10 MB
                let fileInput = event.target;
                let fileList = $('.file_list');
                let isValid = true;

                fileList.empty(); // Clear the previous file list
                let fileArrayInput = [];

                $.each(fileInput.files, function(i, file) {
                    // Get the file extension
                    let fileExtension = file.name.split('.').pop().toLowerCase();
                    // Convert file size to MB and format it to 1 decimal place
                    let fileSize = (file.size / (1024 * 1024)).toFixed(1);

                    // Check if the file extension is allowed and file size is within the limit
                    if (!allowedExtensions.includes(fileExtension) || file.size > maxFileSize) {
                        // Create an error message for disallowed or oversized files
                        let errorMessage = $('<div class="error_message text-danger badge border"></div>');
                        errorMessage.text(file.name + ' is not allowed or exceeds 10 MB and was not attached.');
                        fileList.append(errorMessage);
                        isValid = false;
                    } else {
                        if (isValid) { //will only display all attachement if all is valid if not it wont
                            // Add the file to the fileArrayInput
                            fileArrayInput.push(file);
                            // Create a file item to display the file name and size
                            let fileItem = $('<div class="file_item badge border text-black"></div>');
                            fileItem.html(file.name + ' (' + fileSize + ' MB)');
                            fileList.append(fileItem);
                        }
                    }
                });

                if (!isValid) {
                    fileInput.value = ''; // Clear the file input tag
                    let reuploadMessage = $('<div class="reupload_message text-warning bg-secondary badge border"></div>');
                    reuploadMessage.text('No files were attached. Please reupload valid attachments');
                    fileList.append(reuploadMessage);
                }
            });
            // endregion file upload viewer

            // region MINIFIED SEARCH MODAL 
            // Set Text to search box and get details
            let key = 0;
            const addcDIR_users_selected = [];
            $("#addSendToaddndoc").keyup(function() {
                console.log('searching');
                let search = $(this).val();
                if (search != "") {
                    $.ajax({
                        url: "/get-office_via_search",
                        type: 'POST',
                        data: {
                            search: search,
                            type: 1
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        dataType: 'json',
                        success: function(response) {
                            let len = response.data.length;
                            $(".addPWB-searchResult").empty();

                            // Add an empty field
                            // NOTE: NO EMPTY FIELD IS PROVIDED

                            // create new key
                            key += 1;

                            for (let i = 0; i < len; i++) {
                                let valueExist = false;

                                tin = response.data[i].tin;
                                addcDIR_users_selected.forEach(tsfs => {
                                    if (tsfs == tin) {
                                        valueExist = true;
                                    }
                                });

                                detail_status = '';
                                if (valueExist == true) {} else {
                                    let fetch_message = response.data[i].fetch_message;
                                    let id = response.data[i].id;
                                    let uuid = response.data[i].uuid;
                                    let region_id = response.data[i].region_id;
                                    let slug = response.data[i].slug;
                                    let office = response.data[i].office;
                                    let full_office_name = response.data[i].full_office_name;
                                    let office_type = response.data[i].office_type;
                                    let username = response.data[i].username;


                                    $(".addPWB-searchResult").append('' +
                                        '<li ' +
                                        '   class="list-group-item list-group-item-action badge text-wrap fs-6" style = "cursor: pointer;" ' +
                                        '   data-key = "' + id + '" ' +
                                        '   data-id = "' + id + '" ' +
                                        '   data-uuid = "' + uuid + '" ' +
                                        '   data-region_id = "' + region_id + '" ' +
                                        '   data-slug = "' + slug + '" ' +
                                        '   data-office = "' + office + '" ' +
                                        '   data-full_office_name = "' + full_office_name + '" ' +
                                        '   data-office_type = "' + office_type + '" ' +
                                        '   data-username = "' + username + '" ' +
                                        '>' +
                                        '   <span>' + (username == null ? full_office_name + ' (' + slug + ')' : '<span class="text-primary">[' + username + ']</span> ' + ' (' + slug + ')') + '</span>' +
                                        '</li>'
                                    );
                                }
                            }

                            // binding click event to li
                            $(".addPWB-searchResult li").bind("click", function() {
                                addSendToListaddndoc(this);
                            });
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                } else {
                    $(".addPWB-searchResult").empty();
                }
            });

            function addSendToListaddndoc(element) {
                let key = $(element).data('key');
                let id = $(element).data('id');
                let uuid = $(element).data('uuid');
                let region_id = $(element).data('region_id');
                let slug = $(element).data('slug');
                let office = $(element).data('office');
                let full_office_name = $(element).data('full_office_name');
                let office_type = $(element).data('office_type');
                let username = $(element).data('username');

                // check if key already exists before append
                let valueExist = false;
                addcDIR_users_selected.forEach(tsfs => {
                    if (tsfs == key) {
                        valueExist = true;
                    }
                });

                if (valueExist == true) {
                    $('.addSendToListaddndocmsg').append('' +
                        '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                        '    <strong>' + full_office_name + ' (' + office + ') already selected</strong> ' +
                        '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                        '</div>'
                    );

                    // delay before remove
                    setTimeout(() => {
                        $('.addSendToListaddndocmsg').empty();
                    }, 3000);
                } else {
                    // console.log("this data is unique");
                    addcDIR_users_selected.push(key);

                    $("#addSendToListaddndoc").append(' ' +
                        '<div class="col-md-5 d-flex flex-row bd-highlight p-0 m-2 addSendToListaddndocItem"> ' +
                        '   <div class="bd-highlight rounded-start bg-info border border-info border-end-0 ps-2">' +
                        '       <input type="hidden" name="addndoc_id[]" value="' + id + '">' +
                        '       <input type="hidden" name="addndoc_uuid[]" value="' + uuid + '">' +
                        '       <input type="hidden" name="addndoc_region_id[]" value="' + region_id + '">' +
                        '       <input type="hidden" name="addndoc_slug[]" value="' + slug + '">' +
                        '       <input type="hidden" name="addndoc_office[]" value="' + office + '">' +
                        '       <input type="hidden" name="addndoc_full_office_name[]" value="' + full_office_name + '">' +
                        '       <input type="hidden" name="addndoc_office_type[]" value="' + office_type + '">' +
                        '       <span class="fw-bold">' + full_office_name + ' (' + slug + ')</span>' +
                        '   </div> ' +
                        '   <div class="bd-highlight rounded-end bg-info border border-info border-start-0 pe-2">' +
                        '       <button ' +
                        '           class="rounded bg-danger border border-danger text-white m-1 btnListItemRemove_addndoc" ' +
                        '           data-target="addSendToListaddndocItem" ' +
                        '           data-key="' + key + '" ' +
                        '           onclick="return false;"' +
                        '       > ' +
                        '           <i class="fa fa-times" aria-hidden="true"></i>' +
                        '       </button> ' +
                        '   </div> ' +
                        '</div> ' +
                        '');
                }
                $(".addPWB-searchResult").empty();
                $("#addSendToaddndoc").val('');
            }
            // remove data when X is clicked
            $('#addSendToListaddndoc').on("click", ".btnListItemRemove_addndoc", function() {
                let target = $(this).data('target');
                $(this).closest('.' + target).remove();
                const indexToRemove = addcDIR_users_selected.indexOf($(this).data('key')); // find the index of the value to remove
                if (indexToRemove !== -1) {
                    addcDIR_users_selected.splice(indexToRemove, 1); // remove the value from the array
                }
                console.log("Data Remove in array: " + addcDIR_users_selected);
            });
            // endregion MINIFIED SEARCH MODAL 

            // region submit new doc form
            $(".btn-addndoc-submit").click(function(e) {
                e.preventDefault();
                //document information
                let Dashdoc_date = $('#addndocDashdoc_date').val();
                let Dashclass_name = $('#addndocDashclass_name').val();
                let Dashclass_slug = $('#addndocDashclass_slug').val(); //this is hidden
                let DocNo = $('#addndocDocNo').val();
                let Confidential = $('#addndocConfidential :selected').val();
                // let Dashcompliance_deadline = $('#addndocDashcompliance_deadline').val(); /* optional */
                let app_type_uuid = $('#addndocapp_type_uuid').val();
                let transac_uuid = $('#addndoctransac_uuid').val(); //hidden
                let Subject = $('#addndocSubject').val();

                let receiving_offices_count = $('input[name="addndoc_office[]"]').length;

                let AttchRemarks = $('#addndocAttchRemarks').val();

                //check if office are not empty
                if (
                    Dashdoc_date != '' &&
                    Dashclass_name != '' &&
                    Dashclass_slug != '' &&
                    DocNo != '' &&
                    Confidential != '' &&
                    // Dashcompliance_deadline != '' && /* optional */
                    app_type_uuid != '' &&
                    transac_uuid != '' &&
                    Subject != ''
                ) {
                    //count office receiving the transaction
                    if (receiving_offices_count > 0) {
                        //submit query
                        let form = $('#addndocForm')[0];
                        let submitForm = new FormData(form);
                        $.ajax({
                            url: "/insert-new-doc",
                            method: "POST",
                            data: submitForm,
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(r) {
                                if (r.success) {
                                    alert('Request Submission Successful');

                                    //erase input data for next query
                                    $('#addndocDashclass_name').val('');
                                    $('#addndocDocNo').val('');
                                    $('#addndocDashcompliance_deadline').val('');
                                    $('#addndocSubject').val('');
                                    $('#addndocAttchRemarks').val('');
                                    $('.addndocFileUploads').val(''); // Clear the file input field
                                    $('.file_list').empty(); //remove file listing view 
                                } else {
                                    alert('Request Submission Failed');
                                }
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    } else {
                        //add message no office was selected
                        $('.addSendToListaddndocmsg').append('' +
                            '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                            '    <strong>No office was selected</strong> ' +
                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                            '</div>'
                        );
                    }
                } else {
                    //set bg color to red when empty
                    $('.genDashNotifs').append('' +
                        '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Please fill in all required fields.</strong>' +
                        '</div>'
                    );
                    $(' #addndocDashdoc_date, #addndocDashclass_name, #addndocDashclass_slug, #addndocDocNo, #addndocConfidential, #addndocapp_type_uuid, #addndoctransac_uuid, #addndocSubject').each(function() {
                        $(this).val() == "" ? $(this).css('border-color', 'red') : '';
                    });
                }
            })
            // endregion submit new doc form

            // region get app and transac type
            $('#addndocapp_type_uuid').change(function() {
                $('#addndoctransac_uuid').val($('#addndocapp_type_uuid :selected').data('transac_uuid'));
            });
            // endregion get app and transac type

            // region in-transit-msg-1
            if (sessionStorage.getItem('in-transit-msg-1') != null) {
                $('.in-transit-msg-1').hide();
            }
            $('.in-transit-msg-1').click(function() {
                sessionStorage.setItem('in-transit-msg-1', true)
                $('.in-transit-msg-1').hide();
            });
            // endregion in-transit-msg-1
            /* ============================================== endregion for add new document =========================================================== */

            /* region unsecure copy to clipboard */
            //this function is called by child modules
            //since data is fetch through a non existing button in a table generated you need the table name to enable the copy button to work
            $('#dtCreated').on('click', '.doc-no-copy-to-clipboard', function() {
                let copyVal = $(this).data('val');
                console.log('working in this module');
                unsecuredCopyToClipboard(copyVal)
            });

            function unsecuredCopyToClipboard(text) {
                const textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.focus({
                    preventScroll: true
                });
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
            /* endregion unsecure copy to clipboard */
        })
    </script>
    {{-- endregion general queries --}}

    {{-- dataTable datas --}}
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
@endsection
