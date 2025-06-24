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
        body,
        .container-fluid {
            padding-left: 240px;
            padding-right: 270px;
        }

        @media screen and (max-width: 768px) {

            body,
            .container-fluid {
                padding: 0;
            }

            body,
            .header {
                padding-left: 0px;
            }
        }

        .container-fluid {
            padding: 0;
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
    </style>
    {{-- endregion custom css --}}


    {{-- region generate qr code custom js --}}
    <script src="{{ asset('assets/js/easy.qrcode.min.js') }}"></script>
    <script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
    {{-- region generate qr code custom js --}}
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
    <div class="bg-light p-2">
        {{-- region bread crumb --}}
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-white rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/client-dashboard-home?active_sidebar=client-dashboard-home">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Request</a></li>
                        <li class="breadcrumb-item" aria-current="page">Published Document</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}

        {{-- region menu --}}
        <div class="scrollmenu text-center">
            <a class="fw-bolder border btn btn-outline-secondary m-2" href="/client-dashboard-home?active_sidebar=client-dashboard-home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a class="fw-bolder border btn btn-outline-secondary m-2" href="/client-dashboard?active_sidebar=client_dashboard"><i class="fa fa-plus" aria-hidden="true"></i> Create Request</a>
            <a class="fw-bolder border btn btn-outline-secondary m-2" href="/client-dashboard-doc-tracking"><i class="fa fa-search" aria-hidden="true"></i> Track Application</a>
        </div>
        {{-- endregion menu --}}

        {{-- region request form --}}
        <form class="form-floating p-0 mb-4" id="getdocInfRequestForm">
            <div class="accordion shadow" id="cliDashAccordionMain">

                {{-- region client information --}}
                <div class="accordion-item toggleSeachDocCont">
                    <h2 class="accordion-header border" id="cliDash-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseOne" aria-expanded="true" aria-controls="cliDash-collapseOne">
                            <b><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Published Document Viewer</b>
                        </button>
                    </h2>
                    <div id="cliDash-collapseOne" class="accordion-collapse collapse show" aria-labelledby="cliDash-headingOne">
                        <div class="accordion-body bg-white">
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
                                    <button style="display: none;" class="btn btn-primary btn-submit-track-doc" @if (request()->has('dn')) @else @disabled(true) @endif>
                                        View Documents
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
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseTwo" aria-expanded="true" aria-controls="cliDash-collapseTwo">
                            <b><i class="fa fa-file" aria-hidden="true"></i> Document Information</b>
                        </button>
                    </h2>
                    <div id="cliDash-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="cliDash-headingTwo">
                        {{-- <div style="position: relative">
                            <img src="{{ url('assets/img/denr_banner.webp') }}" style="width: 100%; height: 50%;">
                            <div class="d-flex flex-row-reverse bd-highlight" style="position: absolute; top:0; right: 0;">
                                <div class="p-2 bd-highlight toggleClientInfo">
                                    <button class="btn btn-primary btn-submit-track-ano-doc">
                                        Track Another Document
                                    </button>
                                </div>
                            </div>
                        </div> --}}
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


                            <p class="d-inline-flex gap-1">
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseQRCont" role="button" aria-expanded="false" aria-controls="collapseQRCont">
                                    <i class="fa fa-qrcode" aria-hidden="true"></i> View QR
                                </a>
                            </p>
                            <div class="collapse" id="collapseQRCont">
                                <div class="card card-body" style="width: 100%">
                                    <input type="hidden" id="qrval" value="{{ request('dn') ?? '' }}">

                                    <div class="container_content d-flex justify-content-center overflow-scroll px-5" id="container_content">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <div class="qrcontainer">
                                                    {{-- QR CODE BE GENERATED HERE --}}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Public Document Viewer Link (QR Content):</h5>
                                                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ request('dn') == '' ? 'No content found' : request('dn') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 fs-6">
                                                <div class="d-grid gap-2" tooltip="download qr" flow="right">
                                                    <button class="btn btn-outline-success btn-lg btn-download-qr" style="height: 90px;" type="button">
                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row px-3">
                                <div class="col p-3 rounded border shadow">
                                    <h5>Published Documents:</h5>
                                    <div class="action_attch_cont">
                                        {{-- Documents will be displayed here --}}
                                    </div>
                                    <hr>
                                    <div class="viewActAtchIframe_cont">
                                        {{-- <embed id="viewActAtchIframe" name="viewActAtchIframe" width="100%" height="80%" style="background:url(../assets/img/denrloadsmaller.webp) center center no-repeat;"> --}}
                                        <iframe id="viewActAtchIframe" name="viewActAtchIframe" width="100%" height="80%" style="background:url(../assets/img/denrloadsmaller.webp) center center no-repeat; display: none;" src="" frameborder="0" oncontextmenu="return false;" onkeydown="return false;" onmousedown="return false;"></iframe>
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

            $('.toggleDocInfoCont').hide();
            //endregion disable search when input is empty
        });
    </script>
    {{-- endregion document information queries --}}


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
                            $(".loading_txt").append("Loading...");
                        },
                        success: function(r) {
                            if (r.success) {
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

                                    // region get last action
                                    const last_act = r.doc_stats[r.doc_stats.length - 1];
                                    console.log('last action');

                                    if (last_act.final_action == null) {
                                        if (last_act.rejected != null) {
                                            $('#getdocInfcrnt_doc_no_stats').empty().append('<span class="fs-6 fw-bold text-danger">DOCUMENT PROCESS HAS BEEN REJECTED: <i>' + (last_act.action_taken).toUpperCase() + '</i></span>');
                                        } else {
                                            if (last_act.received_id != null) {
                                                $('#getdocInfcrnt_doc_no_stats').empty().append('RECEIVED BY OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i>');
                                            } else {
                                                $('#getdocInfcrnt_doc_no_stats').empty().append('SENT TO OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i>');
                                            }
                                        }
                                    } else {
                                        $('#getdocInfcrnt_doc_no_stats').empty().append('<span class="fs-6 fw-bold text-success">DOCUMENT PROCESS HAS BEEN APPROVED IN OFFICE OF THE <i>' + (last_act.send_to_full_office_name).toUpperCase() + '</i></span>');
                                    }
                                    // endregion get last action

                                    // region get action attach and display
                                    if (r.action_docs.length <= 0) {

                                        //identify if no document has been published
                                        if (r.order_of_payment != null) {
                                            if (r.order_of_payment.uploaded_oop != null) {
                                                //do nothing here
                                            } else {
                                                $('.action_attch_cont').append('' +
                                                    '<div class="row">' +
                                                    '   <div class="col text-center text-danger fw-bold">' +
                                                    '        - - - No document/s has been published - - - ' +
                                                    '   </div>' +
                                                    '</div>'
                                                );
                                            }
                                        } else {
                                            $('.action_attch_cont').append('' +
                                                '<div class="row">' +
                                                '   <div class="col text-center text-danger fw-bold">' +
                                                '        - - - No document/s has been published - - - ' +
                                                '   </div>' +
                                                '</div>'
                                            );
                                        }

                                    } else {
                                        r.action_docs.forEach(dt => {
                                            $('.action_attch_cont').append('' +
                                                '<div class="row">' +
                                                '   <div class="col">' +
                                                '       <span class="btn-viewActAtch fs-6" ' +
                                                '           style="cursor: pointer;" ' +
                                                '           onMouseOut="this.style.color=`#000`" ' +
                                                '           onMouseOver="this.style.color=`#0d6efd`" ' +
                                                '           data-act_atch_id="' + dt.id + '" ' +
                                                '           data-action_id="' + dt.action_id + '" ' +
                                                '           data-act_file_path="' + dt.file_path + '" ' +
                                                '           data-act_file_name="' + dt.file_name + '" ' +
                                                '       >' +
                                                '           View ' + dt.remarks +
                                                '       </span> | ' +
                                                '       <span class="btn-dlActAtch fs-6" ' +
                                                '           style="cursor: pointer;" ' +
                                                '           onMouseOut="this.style.color=`#000`" ' +
                                                '           onMouseOver="this.style.color=`#0d6efd`" ' +
                                                '           data-act_atch_id="' + dt.id + '" ' +
                                                '           data-action_id="' + dt.action_id + '" ' +
                                                '           data-act_file_path="' + dt.file_path + '" ' +
                                                '           data-act_file_name="' + dt.file_name + '" ' +
                                                '           data-act_file_remarks="' + dt.remarks + '" ' +
                                                '       >' +
                                                '          download document <i class="fa fa-download" aria-hidden="true"></i>' +
                                                '       </span>' +
                                                '   </div>' +
                                                '</div>'
                                            );
                                        });
                                    }
                                    // endregion get action attach and display

                                    // region display uploaded order of payment
                                    if (r.order_of_payment != null) {
                                        if (r.order_of_payment.uploaded_oop != null) {
                                            $('.action_attch_cont').append('' +
                                                '<div class="row">' +
                                                '   <div class="col">' +
                                                '       <span class="btn-viewUploadedOOPRcpt fs-6" ' +
                                                '           style="cursor: pointer;" ' +
                                                '           onMouseOut="this.style.color=`#000`" ' +
                                                '           onMouseOver="this.style.color=`#0d6efd`" ' +
                                                '           data-act_file_path="' + r.order_of_payment.uploaded_oop + '" ' +
                                                '       >' +
                                                '           View uploaded order of payment' +
                                                '       </span> | ' +
                                                '       <span class="btn-dlUploadedOOPRcpt fs-6" ' +
                                                '           style="cursor: pointer;" ' +
                                                '           onMouseOut="this.style.color=`#000`" ' +
                                                '           onMouseOver="this.style.color=`#0d6efd`" ' +
                                                '           data-act_file_path="' + r.order_of_payment.uploaded_oop + '" ' +
                                                '       >' +
                                                '          download document <i class="fa fa-download" aria-hidden="true"></i>' +
                                                '       </span>' +
                                                '   </div>' +
                                                '</div>'
                                            );
                                        }
                                    }
                                    // endregion display uploaded order of payment
                                } else {
                                    $('#genDashNotifs').append('' +
                                        '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                        '    <strong>No document was found.</strong> ' +
                                        '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                        '</div>'
                                    );
                                }
                            } else {

                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                    // endregion perform tracking automatically if value is identified or found

                    $('body').attr({
                        'oncontextmenu': 'return false;',
                        'onkeydown': 'return false;',
                        'onmousedown': 'return false;',
                        'onkeydown': 'if ((event.key && event.key === "F12") || (event.keyCode && event.keyCode === 123)) { return false; }'
                    });

                    // region display document in embed when clicked
                    $('.action_attch_cont').on('click', '.btn-viewActAtch', function() {
                        let act_atch_id = $(this).data('act_atch_id');
                        let action_id = $(this).data('action_id');
                        let file_path = $(this).data('act_file_path');
                        let file_name = $(this).data('act_file_name');

                        // compare href clicked and existing href then change it if not same
                        let iframeHref = '/' + file_path + '_pub/' + act_atch_id + '/' + action_id + '/' + file_name;
                        let content1 = iframeHref + '#toolbar=0';
                        let content2 = $('#viewActAtchIframe').attr('src');
                        if (content1 != content2) {
                            $('#viewActAtchIframe').attr('src', iframeHref + '#toolbar=0');
                        }

                        $('#viewActAtchIframe').css({
                            'height': '900px',
                            'overflow-y': 'scroll',
                        });
                        $('#viewActAtchIframe').show();
                    });
                    $('.action_attch_cont').on('click', '.btn-viewUploadedOOPRcpt', function() {
                        let file_path = $(this).data('act_file_path');

                        // compare href clicked and existing href then change it if not same
                        let iframeHref = '/pub_' + file_path;
                        let content1 = iframeHref + '#toolbar=0';
                        let content2 = $('#viewActAtchIframe').attr('src');
                        if (content1 != content2) {
                            $('#viewActAtchIframe').attr('src', iframeHref + '#toolbar=0');
                        }

                        $('#viewActAtchIframe').css({
                            'height': '900px',
                            'overflow-y': 'scroll',
                        });
                        $('#viewActAtchIframe').show();
                    });
                    // endregion display document in embed when clicked

                    // region download published document
                    $('.action_attch_cont').on('click', '.btn-dlActAtch', function() {
                        let act_atch_id = $(this).data('act_atch_id');
                        let action_id = $(this).data('action_id');
                        let file_path = $(this).data('act_file_path');
                        let file_name = $(this).data('act_file_name');
                        let act_file_remarks = $(this).data('act_file_remarks');

                        // Replace the URL with the actual path to your PDF file
                        var pdfUrl = '/' + file_path + '_pub/' + act_atch_id + '/' + action_id + '/' + file_name;

                        // Create a hidden link element
                        var link = document.createElement('a');
                        link.href = pdfUrl;

                        // Set the download attribute with the desired file name
                        link.download = act_file_remarks + '.pdf';

                        // Append the link to the document body
                        document.body.appendChild(link);

                        // Trigger the click event on the link
                        link.click();

                        // Remove the link from the document
                        document.body.removeChild(link);
                    });
                    $('.action_attch_cont').on('click', '.btn-dlUploadedOOPRcpt', function() {
                        let file_path = $(this).data('act_file_path');

                        // Replace the URL with the actual path to your PDF file
                        var pdfUrl = '/pub_' + file_path;

                        // Check if the file path ends with ".pdf"
                        if (file_path.toLowerCase().endsWith('.pdf')) {
                            // If it's a PDF, set the download attribute with the desired file name
                            var fileName = 'uploaded_oop.pdf';
                        } else {
                            // If not a PDF, set the download attribute with ".jpg" file extension
                            var fileName = 'uploaded_oop.jpg';
                        }

                        // Create a hidden link element
                        var link = document.createElement('a');
                        link.href = pdfUrl;

                        // Set the download attribute with the desired file name
                        link.download = fileName;

                        // Append the link to the document body
                        document.body.appendChild(link);

                        // Trigger the click event on the link
                        link.click();

                        // Remove the link from the document
                        document.body.removeChild(link);
                    });

                    // endregion download published document

                    // region view qr function
                    $('.btn-view-pub-qr').click(function() {
                        let doc_no = $(this).data('doc_no');
                        console.log(doc_no);
                    });
                    // endregion view qr function
                });
            </script>

            {{-- region qr code script --}}
            <script type="text/template" id="qrcodeTpl">
            <div class="imgblock">
                <!-- <div class="title">{title}</div> -->
                <div class="qr" id="qrcode_{i}"></div>
            </div>
        </script>
            <script type="text/javascript">
                $(function() {
                    let qrval = $('#qrval').val();
                    let toUrl = '58.69.249.98:9133/rfsoats/pdv?dn=' + qrval;

                    var demoParams = [{
                        title: "Logo + quietZoneColor",
                        config: {
                            text: toUrl, // Content
                            width: 400, // Widht
                            height: 400, // Height
                            colorDark: "#000000", // Dark color
                            colorLight: "#ffffff", // Light color
                            quietZone: 3,
                            quietZoneColor: '#249200',
                            logo: "/assets/img/qrlogo.webp",
                            logoBackgroundColor: '#ffffff', // Logo backgroud color, Invalid when `logBgTransparent` is true; default is '#ffffff'
                            logoBackgroundTransparent: false, // Whether use transparent image, default is false
                            correctLevel: QRCode.CorrectLevel.H // L, M, Q, H
                        }
                    }, ]
                    var qrcodeTpl = document.getElementById("qrcodeTpl").innerHTML;
                    var qrcontainer = $('.qrcontainer')[0];
                    for (var i = 0; i < demoParams.length; i++) {
                        var qrcodeHTML = qrcodeTpl.replace(/\{title\}/, demoParams[i].title).replace(/{i}/, i);
                        qrcontainer.innerHTML += qrcodeHTML;
                    }
                    for (var i = 0; i < demoParams.length; i++) {
                        var t = new QRCode(document.getElementById("qrcode_" + i), demoParams[i].config);
                    }
                });
            </script>
            {{-- endregion qr code script --}}


            {{-- region qr code downloader --}}
            <script>
                $(function() {
                    $('.btn-download-qr').click(function() {
                        // Select the qrcontainer element
                        let qrContainer = $('.qrcontainer')[0];
                        const date = new Date();
                        let dateFomrat = date.getFullYear() + "_" + date.getMonth() + "_" + date.getDate();

                        // Use html2canvas to capture the content as an image
                        html2canvas(qrContainer).then(function(canvas) {
                            // Create a temporary link to download the image
                            let link = document.createElement('a');
                            link.href = canvas.toDataURL('image/png');
                            link.download = 'qr_image_' + dateFomrat + '.png';
                            link.click();
                        });
                    });
                })
            </script>
            {{-- endregion qr code downloader --}}
        @endif
    @endif

    {{-- region navbar text display --}}
    <script>
        $(function() {
            $('.navbar-brand-govph').hide();
        });
    </script>
    {{-- endregion navbar text display --}}
@endsection
