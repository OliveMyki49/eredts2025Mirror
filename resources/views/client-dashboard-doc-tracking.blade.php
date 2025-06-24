{{-- 
src: https://drive.google.com/drive/folders/1uO2YH6LSrJD12zf6z0Qn_xsqrRczEJMs
TAT does not include waiting time and
is the minimum processing time up to
twenty (20) working days    
--}}

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
            $('#getdocInfcontact_no').on('input', function() {
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
            $('.attachment_list_required, .attachment_list_additional').on('change', '.file_input_tag', function() {
                var allowedFormats = ["application/pdf", "image/jpeg", "image/jpg", "image/png"];
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
                        alert("Unsupported file format. Please select a PDF, JPEG, or PNG file.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Attach file').css('color', '#6c757d');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                        return;
                    }
                } else {
                    $(this).closest('label').find('.file_label').empty().append('Attach file'); // Clear the file label
                    $(this).parent().css('background-color', '#ffffff').css('color', '#6c757d');
                }
            });

            // for id upload
            $('.upon-access-info').on('change', '.file_input_tag', function() {
                var allowedFormats = ["application/pdf", "image/jpeg", "image/jpg", "image/png"];
                var maxSizeMB = 9; // Maximum allowed file size in megabytes
                var selectedFile = this.files[0];

                if (selectedFile) {
                    $(this).parent().find('.file_label').empty().append(selectedFile.name);
                    $(this).parent().css('background-color', '#6c757d').css('color', '#ffffff');

                    // Check file size
                    if (selectedFile.size > maxSizeMB * 1024 * 1024) {
                        alert("File size exceeds the maximum allowed size of less than" + (maxSizeMB + 1) + "MB.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Upload Image');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                    }

                    // Check file format
                    if (!allowedFormats.includes(selectedFile.type)) {
                        alert("Unsupported file format. Please select a PDF, JPEG, or PNG file.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Upload Image').css('color', '#6c757d');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                        return;
                    }
                } else {
                    $(this).closest('label').find('.file_label').empty().append('Upload Image'); // Clear the file label
                    $(this).parent().css('background-color', '#ffffff').css('color', '#6c757d');
                }
            });
            // endregion file upload restriction
        });
    </script>
    {{-- endregion important custom function --}}

    {{-- region custom css --}}
    <style>
        @media screen and (min-width: 768px) {

            body,
            .container-fluid {
                padding: 0;
            }

            .header,
            .padding-x-15 {
                padding-left: 15% !important;
                padding-right: 15% !important;
            }

            div.scrollmenu a {
                display: inline-block;
                color: #149D20;
                text-align: center;
                text-decoration: none;
                border: 3px solid #149D20;
                width: 31.6%;
            }
        }

        .header {
            /* almost black */
            /* background: linear-gradient(to bottom right, #333, #333, #333, #333); */

            /* grey */
            background: linear-gradient(to bottom right, #f7f7f7, #f7f7f7, #f7f7f7, #f7f7f7);
            /* border-bottom: solid #fff 2px; */
            height: 50px;
        }

        body,
        .container-fluid {
            padding: 0;
        }

        /* region horizontal scrolling */
        div.scrollmenu {
            /* background-image: url('../assets/img/fern_plant.webp'); */
            background-color: #f4f4f4;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow: auto;
            white-space: nowrap;
        }

        div.scrollmenu a {
            display: inline-block;
            color: #149D20;
            text-align: center;
            text-decoration: none;
            border: 3px solid #149D20;
        }

        .activescrollmenu {
            background-color: rgba(20, 157, 32, 0.2);
        }

        div.scrollmenu a:hover {
            border: 3px solid #149D20;
            background-color: rgba(20, 157, 32, 0.5);
            color: #f4f4f4;
        }

        /* endregion horizontal scrolling */

        /* region blinker */
        .blink_me {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
        /* endregion blinker */

        .breadcrumb-item+.breadcrumb-item::before {
            color: #fff !important;
        }
    </style>
    {{-- endregion custom css --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu-client')
@endsection
@section('content')

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 50%; left: 40%; width: 10%; height: 10%;">
    </div>
    {{-- endregion loading indicator --}}

    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 10px; z-index: 100;">
        <div id="genDashNotifs" class="p-1">
            {{-- Populate notifications here --}}
        </div>
    </div>
    {{-- endregion notification --}}


    {{-- region main container --}}
    <div>
        {{-- region bread crumb --}}
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="p-3" style="background-color: #149D20">
                    <ol class="breadcrumb mb-0 padding-x-15">
                        <li class="breadcrumb-item"><a href="/client-dashboard-home?active_sidebar=client-dashboard-home" class="text-white fw-bold">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                        <li class="breadcrumb-item text-white" aria-current="page">Document Tracking</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}

        {{-- region menu --}}
        <div class="scrollmenu text-center padding-x-15" id="choose_req_type">
            <a class="fw-bolder border btn btn-outline-secondary m-2" href="client-dashboard-home?active_sidebar=client-dashboard-home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a class="fw-bolder border btn btn-outline-secondary m-2" href="client-dashboard?active_sidebar=client_dashboard"><i class="fa fa-plus" aria-hidden="true"></i> Create Request</a>
            <a class="fw-bolder border btn btn-outline-secondary m-2 activescrollmenu" href="#"><i class="fa fa-search" aria-hidden="true"></i> Track Application</a>
        </div>
        {{-- endregion menu --}}

        {{-- region request form --}}
        <form class="form-floating p-0 mb-4" id="getdocInfRequestForm">
            <div class="accordion shadow" id="cliDashAccordionMain">

                {{-- region client information --}}
                <div class="accordion-item toggleSeachDocCont">
                    <h2 class="accordion-header border" id="cliDash-headingOne">
                        <button class="accordion-button padding-x-15 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseOne" aria-expanded="true" aria-controls="cliDash-collapseOne">
                            <b><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Document Tracking</b>
                        </button>
                    </h2>
                    <div id="cliDash-collapseOne" class="accordion-collapse collapse show" aria-labelledby="cliDash-headingOne">
                        <div class="accordion-body bg-white padding-x-15">
                            <div class="row toggleClientInfo">
                                <div class="col-md mb-3">
                                    <label for="getdocInf_doc_track_no" class="form-label fs-6">Input document tracking number: </label>
                                    {{-- <input type="text" class="form-control" id="getdocInf_doc_track_no" name="doc_track_no" placeholder="xxx-xxxx.xx.xx-xx"> --}}

                                    {{-- Sample with value --}}
                                    <input type="text" class="form-control" id="getdocInf_doc_track_no" name="doc_track_no" placeholder="xxx-xxxx.xx.xx-xx" value="{{ request('dn') ?? '' }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md text-center fs-bold text-primary blink_me loading_txt">
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight toggleClientInfo">
                                    <button class="btn btn-primary btn-submit-track-doc" @if (request()->has('dn')) @else @disabled(true) @endif>
                                        Track Document
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion client information --}}

                {{-- region document information --}}
                <div class="accordion-item toggleDocInfoCont">
                    <input type="hidden" name="new_id" id="new_id">

                    <h2 class="accordion-header border" id="cliDash-headingTwo">
                        <button class="accordion-button padding-x-15 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseTwo" aria-expanded="true" aria-controls="cliDash-collapseTwo">
                            <b><i class="fa fa-file" aria-hidden="true"></i> Document Information</b>
                        </button>
                    </h2>
                    <div id="cliDash-collapseTwo" class="accordion-collapse collapse show padding-x-15" aria-labelledby="cliDash-headingTwo">
                        <div style="position: relative">
                            <img src="{{ url('assets/img/denr_banner.webp') }}" style="width: 100%; height: 50%;">
                            <div class="d-flex flex-row-reverse bd-highlight" style="position: absolute; top:0; right: 0;">
                                <div class="p-2 bd-highlight toggleClientInfo">
                                    <button class="btn btn-primary btn-submit-track-ano-doc">
                                        Track Another Document
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInfdoc_no" class="form-label fs-6">Document Number </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInfdoc_no" name="doc_no"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInfcrnt_doc_no_stats" class="form-label fs-6">Current Status </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInfcrnt_doc_no_stats" name="crnt_doc_no_stats"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInfclientName" class="form-label fs-6">Requesting Client </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInfclientName" name="clientName"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInfapplication_type_id" class="form-label fs-6">Type of Applicant </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInfapplication_type_id" name="application_type_id"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInftransaction_type_id" class="form-label fs-6">Transaction Type </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInftransaction_type_id" name="transaction_type_id"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 getdocInfagency-container">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInfagency" class="form-label fs-6">Agency </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInfagency" name="agency"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInfclass_id" class="form-label fs-6">Document Classification </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInfclass_id" name="class_id"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-4 text-start">
                                            <label for="getdocInfsubclass_id" class="form-label fs-6">Request Type </label>
                                        </div>
                                        :
                                        <div class="col text-start border-bottom border-dark">
                                            <span class="fs-6 fw-bold" id="getdocInfsubclass_id" name="subclass_id"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col p-3 border shadow">
                                    <h5>Document Status:</h5>
                                    <div style="overflow: auto">
                                        <table class="table table-striped table-bordered table-sm">
                                            <tbody class="tbody-getdocInf-doc_status">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- endregion document information --}}
            </div>
        </form>
        {{-- endregion request form --}}
    </div>
    {{-- endregion main container --}}

    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}


    {{-- region document information queries --}}
    <script>
        $(function() {
            //region disable search when input is empty
            $('#getdocInf_doc_track_no').change(function() {
                if ($(this).val() != '') {
                    $('.btn-submit-track-doc').prop('disabled', false);
                } else {
                    $('.btn-submit-track-doc').prop('disabled', true);
                }
            });
            //endregion disable search when input is empty

            //region submit client request
            $('.toggleDocInfoCont').hide();
            $('.btn-submit-track-doc').click(function(e) {
                e.preventDefault();

                let getdocInf_doc_track_no = $('#getdocInf_doc_track_no').val();


                if (getdocInf_doc_track_no != 'unset') {
                    if (getdocInf_doc_track_no == '') {
                        getdocInf_doc_track_no = "no input";
                    }

                    $.ajax({
                        url: "get-trackDoc/" + getdocInf_doc_track_no + "/",
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        beforeSend: function() {
                            // This function will be executed before the request is sent
                            // You can set the loading message here
                            $(".loading_txt").append("Loading...");
                        },
                        success: function(r) {
                            if (r.success) {
                                console.log(r);

                                $(".loading_txt").empty();

                                if (r.doc_info != null) {
                                    $('.toggleSeachDocCont').fadeOut();
                                    $('.toggleDocInfoCont').fadeIn();

                                    $('#getdocInfdoc_no').empty().append(r.doc_info.doc_no);
                                    $('#getdocInfclientName').empty().append(r.doc_info.client_fname + ' ' + r.doc_info.client_mname + ' ' + r.doc_info.client_sname + ' ' + r.doc_info.client_suffix);
                                    $('#getdocInfapplication_type_id').empty().append((r.doc_info.applicant).toUpperCase());
                                    $('#getdocInftransaction_type_id').empty().append((r.doc_info.transaction_slug).toUpperCase());

                                    // hide agency if null
                                    if (r.doc_info.agency != null) {
                                        $('.getdocInfagency-container').show();
                                        $('#getdocInfagency').empty().append((r.doc_info.agency).toUpperCase());
                                    } else {
                                        $('.getdocInfagency-container').hide();
                                    }


                                    $('#getdocInfclass_id').empty().append((r.doc_info.doc_class_full).toUpperCase());
                                    $('#getdocInfsubclass_id').empty().append((r.doc_info.doc_type_full).toUpperCase());

                                    // region document status
                                    $('.tbody-getdocInf-doc_status').empty();
                                    r.doc_stats.forEach($dt => {
                                        // region action date normalized
                                        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                        const date_of_action = new Date($dt.released)
                                        // endregion action date normalized

                                        // region identify status
                                        let relese_stat_disp = '';
                                        console.log('action -> ' + $dt.final_action);
                                        if ($dt.final_action == null) {
                                            if ($dt.released == null) {
                                                if ($dt.received_uuid != null) {
                                                    relese_stat_disp = '<div class="border border-2 border-info bg-white text-info text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Received</div>';

                                                } else {
                                                    relese_stat_disp = '<div class="border border-2 border-warning bg-white text-warning text-center fs-5 fw-bold"><i class="fa fa-truck" aria-hidden="true"></i><br>In-Transit</div>';
                                                }
                                            } else {
                                                relese_stat_disp = '<div class="border border-2 border-success bg-white text-success text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Forwarded</div>';
                                            }
                                        } else {
                                            relese_stat_disp = '<div class="border border-2 border-success bg-white text-success text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Final Action</div>';
                                        }

                                        if ($dt.rejected != null) {
                                            relese_stat_disp = '<div class="border border-2 border-danger bg-white text-danger text-center fs-5 fw-bold"><i class="fa fa-times-circle" aria-hidden="true"></i><br>Rejected</div>';
                                        }
                                        // endregion identify status

                                        $('.tbody-getdocInf-doc_status').append('' +
                                            '<tr> ' +
                                            '    <td> ' +
                                            '       ' + relese_stat_disp +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">Received By</span> ' +
                                            '        <br> ' +
                                            '       ' + ($dt.received_uuid != null ? $dt.send_to_full_office_name : '') +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">Action Taken / Marginal Note</span> ' +
                                            '        <br> ' +
                                            '       ' + ($dt.action_remarks != null ? $dt.action_remarks : '<span class="fs-6 text-secondary">NO REMARKS</span>') +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">In-Transit Remark/s</span> ' +
                                            '        <br> ' +
                                            '       ' + ($dt.in_transit_remarks != null ? $dt.in_transit_remarks : '<span class="fs-6 text-secondary">NO REMARKS</span>') +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">Date Released</span> ' +
                                            '        <br> ' +
                                            '       ' + (date_of_action.getFullYear() > 2000 ? (months[date_of_action.getMonth()]).toUpperCase() + ' ' + date_of_action.getDate() + ', ' + date_of_action.getFullYear() + '<br>' + date_of_action.getHours() + ':' + (date_of_action.getMinutes() > 10 ? date_of_action.getMinutes() : '0' + date_of_action.getMinutes()) : '') +
                                            '    </td> ' +
                                            '</tr> ' +
                                            ''
                                        );
                                    });
                                    // endregion document status

                                    // region get last action
                                    const last_act = r.doc_stats[r.doc_stats.length - 1];
                                    console.log('last action: ' + last_act.final_action);
                                    console.log('last_act.final_action == null' + (last_act.final_action == null));

                                    if (last_act.final_action == null) {
                                        if (last_act.rejected != null) {
                                            $('#getdocInfcrnt_doc_no_stats').empty().append('<span class="fs-6 fw-bold text-danger">THE DOCUMENT REQUEST HAS BEEN REJECTED: <i>' + (last_act.action_taken).toUpperCase() + '</i></span>');
                                        } else {
                                            if (last_act.received_id != null) {
                                                $('#getdocInfcrnt_doc_no_stats').empty().append('RECEIVED BY OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i>');
                                            } else {
                                                $('#getdocInfcrnt_doc_no_stats').empty().append('SENT TO OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i>');
                                            }
                                        }
                                    } else {
                                        $('#getdocInfcrnt_doc_no_stats').empty().append('<span class="fs-6 fw-bold text-success">THE DOCUMENT REQUEST HAS BEEN APPROVED AND RELEASED IN THE OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i></span>');
                                    }
                                    // endregion get last action
                                } else {
                                    $('#genDashNotifs').append('' +
                                        '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                        '    <strong>No document was found.</strong> ' +
                                        '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                        '</div>'
                                    );
                                }
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });

                } else {
                    alert("value cannot be unset");
                }
            })

            $('.btn-submit-track-ano-doc').click(function(e) {
                e.preventDefault();

                $('.toggleSeachDocCont').fadeIn();
                $('.toggleDocInfoCont').fadeOut();
            })
            //endregion submit client request
        });
    </script>
    {{-- endregion document information queries --}}

    {{-- region automate opening of doc track info if found --}}
    @if (request()->has('dn'))
        @if (request('dn') != 'unset')
            <script>
                $(function() {
                    $('.btn-submit-track-doc').prop('disabled', false);


                    // region perform tracking automatically if value is identified or found
                    let getdocInf_doc_track_no = $('#getdocInf_doc_track_no').val();

                    if (getdocInf_doc_track_no == '') {
                        getdocInf_doc_track_no = "no input";
                    }

                    $.ajax({
                        url: "get-trackDoc/" + getdocInf_doc_track_no + "/",
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        beforeSend: function() {
                            // This function will be executed before the request is sent
                            // You can set the loading message here
                            console.log("append loading text");
                            $(".loading_txt").append("Loading...");
                        },
                        success: function(r) {
                            if (r.success) {
                                console.log(r);

                                $(".loading_txt").empty();

                                if (r.doc_info != null) {
                                    $('.toggleSeachDocCont').fadeOut();
                                    $('.toggleDocInfoCont').fadeIn();

                                    $('#getdocInfdoc_no').empty().append(r.doc_info.doc_no);
                                    $('#getdocInfclientName').empty().append(r.doc_info.client_fname + ' ' + r.doc_info.client_mname + ' ' + r.doc_info.client_sname + ' ' + r.doc_info.client_suffix);
                                    $('#getdocInfapplication_type_id').empty().append((r.doc_info.applicant).toUpperCase());
                                    $('#getdocInftransaction_type_id').empty().append((r.doc_info.transaction_slug).toUpperCase());

                                    // hide agency if null
                                    if (r.doc_info.agency != null) {
                                        $('.getdocInfagency-container').show();
                                        $('#getdocInfagency').empty().append((r.doc_info.agency).toUpperCase());
                                    } else {
                                        $('.getdocInfagency-container').hide();
                                    }


                                    $('#getdocInfclass_id').empty().append((r.doc_info.doc_class_full).toUpperCase());
                                    $('#getdocInfsubclass_id').empty().append((r.doc_info.doc_type_full).toUpperCase());

                                    // region document status
                                    $('.tbody-getdocInf-doc_status').empty();
                                    r.doc_stats.forEach($dt => {
                                        // region action date normalized
                                        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                        const date_of_action = new Date($dt.released)
                                        // endregion action date normalized

                                        // region identify status
                                        let relese_stat_disp = '';
                                        console.log('action -> ' + $dt.final_action);
                                        if ($dt.final_action == null) {
                                            if ($dt.released == null) {
                                                if ($dt.received_uuid != null) {
                                                    relese_stat_disp = '<div class="border border-2 border-info bg-white text-info text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Received</div>';

                                                } else {
                                                    relese_stat_disp = '<div class="border border-2 border-warning bg-white text-warning text-center fs-5 fw-bold"><i class="fa fa-truck" aria-hidden="true"></i><br>In-Transit</div>';
                                                }
                                            } else {
                                                relese_stat_disp = '<div class="border border-2 border-success bg-white text-success text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Forwarded</div>';
                                            }
                                        } else {
                                            relese_stat_disp = '<div class="border border-2 border-success bg-white text-success text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Final Action</div>';
                                        }

                                        if ($dt.rejected != null) {
                                            relese_stat_disp = '<div class="border border-2 border-danger bg-white text-danger text-center fs-5 fw-bold"><i class="fa fa-times-circle" aria-hidden="true"></i><br>Rejected</div>';
                                        }
                                        // endregion identify status

                                        $('.tbody-getdocInf-doc_status').append('' +
                                            '<tr> ' +
                                            '    <td> ' +
                                            '       ' + relese_stat_disp +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">Received By</span> ' +
                                            '        <br> ' +
                                            '       ' + ($dt.received_uuid != null ? $dt.send_to_full_office_name : '') +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">Action Taken / Marginal Note</span> ' +
                                            '        <br> ' +
                                            '       ' + ($dt.action_remarks != null ? $dt.action_remarks : '<span class="fs-6 text-secondary">NO REMARKS</span>') +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">In-Transit Remark/s</span> ' +
                                            '        <br> ' +
                                            '       ' + ($dt.in_transit_remarks != null ? $dt.in_transit_remarks : '<span class="fs-6 text-secondary">NO REMARKS</span>') +
                                            '    </td> ' +
                                            '    <td> ' +
                                            '        <span class="fw-bold">Date Released</span> ' +
                                            '        <br> ' +
                                            '       ' + (date_of_action.getFullYear() > 2000 ? (months[date_of_action.getMonth()]).toUpperCase() + ' ' + date_of_action.getDate() + ', ' + date_of_action.getFullYear() + '<br>' + date_of_action.getHours() + ':' + (date_of_action.getMinutes() > 10 ? date_of_action.getMinutes() : '0' + date_of_action.getMinutes()) : '') +
                                            '    </td> ' +
                                            '</tr> ' +
                                            ''
                                        );
                                    });
                                    // endregion document status

                                    // region get last action
                                    const last_act = r.doc_stats[r.doc_stats.length - 1];
                                    console.log('last action');

                                    if (last_act.final_action == null) {
                                        if (last_act.rejected != null) {
                                            $('#getdocInfcrnt_doc_no_stats').empty().append('THE DOCUMENT REQUEST HAS BEEN REJECTED: <i>' + (last_act.action_taken).toUpperCase() + '</i>');
                                        } else {
                                            if (last_act.received_id != null) {
                                                $('#getdocInfcrnt_doc_no_stats').empty().append('RECEIVED BY OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i>');
                                            } else {
                                                $('#getdocInfcrnt_doc_no_stats').empty().append('SENT TO OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i>');
                                            }
                                        }
                                    } else {
                                        $('#getdocInfcrnt_doc_no_stats').empty().append('<span class="fs-6 fw-bold text-success">THE DOCUMENT REQUEST HAS BEEN RELEASED IN THE OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i></span>');
                                    }
                                    // endregion get last action
                                } else {
                                    $('#genDashNotifs').append('' +
                                        '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                        '    <strong>No document was found.</strong> ' +
                                        '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                        '</div>'
                                    );
                                }
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                    // endregion perform tracking automatically if value is identified or found
                });
            </script>
        @endif
    @endif
    {{-- endregion automate opening of doc track info if found --}}

    {{-- region navbar text display --}}
    <script>
        $(function() {
            $('.navbar-brand-govph').hide();
        });
    </script>
    {{-- endregion navbar text display --}}
@endsection
