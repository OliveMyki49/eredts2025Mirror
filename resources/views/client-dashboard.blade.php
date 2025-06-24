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
            $('.attachment_list_required, .attachment_list_additional').on('change', '.file_input_tag', function() {
                var allowedFormats = ["application/pdf", "image/jpeg", "image/jpg", "image/png"];
                var allowedFormats = ["application/pdf"];
                var maxSizeMB = 10; // Maximum allowed file size in megabytes
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
                        alert("Unsupported file format. Please select a PDF file.");
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

            $('.app_form_container').on('change', '.app_form_additional .file_input_tag', function() {
                // var allowedFormats = ["application/pdf", "image/jpeg", "image/jpg", "image/png"];
                var allowedFormats = ["application/pdf"];
                var maxSizeMB = 10; // Maximum allowed file size in megabytes
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
                        alert("Unsupported file format. Please select a PDF file.");
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
                var maxSizeMB = 10; // Maximum allowed file size in megabytes
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

        body {
            padding: 0;
        }

        .container-fluid {
            padding-left: 0px;
            padding-right: 0px;
        }

        .header {
            /* almost black */
            /* background: linear-gradient(to bottom right, #333, #333, #333, #333); */

            /* grey */
            background: linear-gradient(to bottom right, #f7f7f7, #f7f7f7, #f7f7f7, #f7f7f7);
            /* border-bottom: solid #fff 2px; */
            height: 50px;
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
    </style>
    {{-- endregion custom css --}}

    {{-- region shake css custom css --}}
    <style>
        @keyframes shake {
            0% {
                transform: translateY(0px);
            }

            25% {
                transform: translateY(-5px);
            }

            50% {
                transform: translateY(0px);
            }

            75% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .click-me-to-learn-how {
            animation: shake 2s cubic-bezier(.36, .07, .19, .97) infinite;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            perspective: 1000px;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: #fff !important;
        }
    </style>
    {{-- endregion shake css custom css --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu-client')
@endsection
@section('content')

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 50%; left: 40%; width: 10%; height: 10%;">
    </div>
    {{-- endregion loading indicator --}
    
    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}

    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 10px; z-index: 100;">
        <div id="genDashNotifs" class="p-1">
            {{-- Populate notifications here --}}
        </div>
    </div>
    {{-- endregion notification --}}

    {{-- region resend code to email Modal --}}
    <div class="modal fade" id="resendEmailModal" tabindex="-1" aria-labelledby="resendEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h1 class="modal-title fs-5" id="resendEmailModalLabel">RESEND CODE TO EMAIL</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="resendmail" class="form-label fs-6">Email</label>
                            <input type="email" class="form-control" id="resendmail" name="email" placeholder="Input email address here">
                        </div>
                    </div>

                    <div class="alert alert-info py-2 text-center" data-bs-dismiss="alert" role="alert">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> check your inbox or spam messages <br> to get your access code
                    </div>
                    <div class="resendmailmsg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-resend-code-to-email">Resend Code</button>
                </div>
            </div>
        </div>
    </div>
    {{-- endregion resend code to email Modal --}}

    {{-- region main container --}}
    <div>
        {{-- region bread crumb --}}
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="p-3" style="background-color: #149D20">
                    <ol class="breadcrumb mb-0 padding-x-15">
                        <li class="breadcrumb-item"><a href="/client-dashboard-home?active_sidebar=client-dashboard-home" class="text-white fw-bold">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                        <li class="breadcrumb-item text-white" aria-current="page">Client Request</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}

        {{-- region menu --}}
        <div class="scrollmenu text-center padding-x-15" id="choose_req_type">
            <a class="fw-bolder btn m-2" href="client-dashboard-home?active_sidebar=client-dashboard-home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a class="fw-bolder btn m-2 activescrollmenu" href="client-dashboard?active_sidebar=client_dashboard"><i class="fa fa-plus" aria-hidden="true"></i> Create Request</a>
            <a class="fw-bolder btn m-2" href="client-dashboard-doc-tracking"><i class="fa fa-search" aria-hidden="true"></i> Track Application</a>
        </div>
        {{-- endregion menu --}}

        {{-- region request form --}}
        <form class="form-floating p-0 mb-4" id="addcliDashRequestForm">
            <div class="row">
                <div class="col py-3 px-4">
                    <div class="padding-x-15" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#createReqTut">
                        <span class="text-success" style="font-size: 25px">
                            <i class="fa fa-question-circle click-me-to-learn-how" aria-hidden="true"></i>
                            How to create request?
                        </span>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush shadow" id="cliDashAccordionMain">

                {{-- region Request --}}
                <div class="accordion-item">
                    <h2 class="accordion-header border" id="cliDash-headingTwo" style="position: relative">
                        <button class="accordion-button padding-x-15 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseReqChoose" aria-expanded="true" aria-controls="cliDash-collapseReqChoose">
                            <b><i class="fa fa-file" aria-hidden="true"></i> Request</b>
                        </button>

                        {{-- <div style="position: absolute; left: 100px; top: 8px; z-index: 100;">
                            <div class="cliDash-collapseReqChoose-stat1" style="display: none;">
                                ✔️
                            </div>
                            <div class="cliDash-collapseReqChoose-stat2" style="display: none;">
                                ❌
                            </div>
                            <div class="cliDash-collapseReqChoose-stat3" style="display: block;">
                                ❓
                            </div>
                        </div> --}}
                    </h2>
                    <div id="cliDash-collapseReqChoose" class="accordion-collapse collapse show" data-bs-parent="#cliDashAccordionMain" aria-labelledby="cliDash-headingTwo">
                        <div class="accordion-body padding-x-15">

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashclass_id" class="form-label fs-6">Document Classification <span class="text-danger">*</span></label>
                                    <select class="form-select" id="addcliDashclass_id" name="class_id">
                                        <option value="" class="text-danger">--- Choose document classification ---</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashsubclass_id" class="form-label fs-6" tooltip="Choose your document request" flow="right">Request Type <span class="text-danger">*</span></label>
                                    <select class="form-select" id="addcliDashsubclass_id" name="subclass_id">
                                        <option value="" class="text-danger">--- Choose document classification ---</option>
                                    </select>
                                    <div class="addcliDashsubclass_id_desc fs-6 text-primary mt-2">

                                    </div>
                                </div>
                            </div>


                            <div class="row toggleDocInfo">
                                <div class="col-md-12">
                                    <div class="d-grid gap-2 mb-1">
                                        <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseTwo" aria-expanded="false" aria-controls="cliDash-collapseTwo" tooltip="Make sure to validate client first" flow="right">
                                            <b><i class="fa fa-file-text" aria-hidden="true"></i> Go to document information</b>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-clpsCliIInf" aria-expanded="false" aria-controls="cliDash-clpsCliIInf">
                                            <i class="fa fa-angle-double-down" aria-hidden="true"></i> Go to next (Client Information)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion Request --}}

                {{-- region client information --}}
                <div class="accordion-item">
                    <h2 class="accordion-header border" id="cliDash-headingOne" style="position: relative">
                        <button class="accordion-button collapsed padding-x-15 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-clpsCliIInf" aria-expanded="false" aria-controls="cliDash-clpsCliIInf">
                            <b><i class="fa fa-info-circle" aria-hidden="true"></i> Client Information</b>
                        </button>

                        {{-- <div style="position: absolute; left: 180px; top: 8px; z-index: 100;">
                            <div style="display: none;">
                                ✔️
                            </div>
                            <div style="display: none;">
                                ❌
                            </div>
                            <div style="display: block;">
                                ❓
                            </div>
                        </div> --}}
                    </h2>
                    <div id="cliDash-clpsCliIInf" class="accordion-collapse collapse" data-bs-parent="#cliDashAccordionMain" aria-labelledby="cliDash-headingOne">
                        <div class="accordion-body bg-white padding-x-15">
                            <div class="row toggleClientInfo">
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashfname" class="form-label fs-6">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control toUpperCase" id="addcliDashfname" name="fname" placeholder="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashmname" class="form-label fs-6">M.I.<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control toUpperCase" id="addcliDashmname" name="mname" placeholder="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashsname" class="form-label fs-6">Surname <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control toUpperCase" id="addcliDashsname" name="sname" placeholder="">
                                </div>
                                <div class="col-md-12 mb-3" tooltip="You can leave this blank" flow="down">
                                    <label for="addcliDashsuffix" class="form-label fs-6">Suffix <span class="text-primary">(optional)</span></label>
                                    <input type="text" class="form-control toUpperCase" id="addcliDashsuffix" name="suffix" placeholder="Jr., Sr., etc..">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashsex" class="form-label fs-6">Sex <span class="text-danger">*</span></label>
                                    <select type="text" class="form-select toUpperCase" id="addcliDashsex" name="sex">
                                        <option value="" class="text-danger">--- Choose your sex ---</option>
                                        <option value="M">♂️ Male</option>
                                        <option value="F">♀️ Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row toggleClientInfo">
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashemail" class="form-label fs-6">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="addcliDashemail" name="email" placeholder="denrR5@gmail.com">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashcontact_no" class="form-label fs-6">Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control toUpperCase" id="addcliDashcontact_no" name="contact_no" placeholder="09xx-xxx-xxxx">
                                </div>
                            </div>

                            <div class="row toggleClientInfo">
                                <div class="col-md-12 mb-3">
                                    <label for="addcliDashaddress" class="form-label fs-6">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control toUpperCase" id="addcliDashaddress" name="address" placeholder="Street, Barangay, Municipality, Province">
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight toggleClientInfo">
                                    <button class="btn btn-primary btn-submit-verify-client" tooltip="Submit client info and verify email">
                                        Sign up
                                    </button>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <button class="btn btn-outline-primary btn-toggleClientInfo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRememberToken" aria-expanded="false" aria-controls="collapseRememberToken" tooltip="Check your email for access code" flow="down">
                                        Use Code
                                    </button>
                                </div>
                            </div>

                            <div class="collapse" id="collapseRememberToken">
                                <div class="card-body">
                                    <div class="row">
                                        <h5>Use access code</h5>
                                        <hr>
                                        <div class="col-md-12 mb-2">
                                            <label for="addcliDashrememberfname" class="form-label fs-6">Client Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control toUpperCase" id="addcliDashrememberfname" name="rememberfname" placeholder="Enter your First Name: John Juan" value="{{ request('fn') ?? '' }}">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="addcliDashrememberEmail" class="form-label fs-6">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="addcliDashrememberEmail" name="rememberEmail" placeholder="Enter your email: denrR5@gmail.com" value="{{ request('email') ?? '' }}">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="addcliDashrememberToken" class="form-label fs-6">Access Code <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control toUpperCase" id="addcliDashrememberToken" name="rememberToken" placeholder="Enter your access code">
                                        </div>
                                        <div class="col-md-12 mb-2 d-flex justify-content-end">
                                            <button class="btn btn-primary btn-verifyToken">Submit</button>
                                        </div>
                                    </div>

                                    <div class="upon-access-info"></div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    {{-- Button trigger modal --}}
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#resendEmailModal" tooltip="Resend email">
                                            Haven't received an email yet?
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row toggleDocInfo">
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseReqChoose" aria-expanded="true" aria-controls="cliDash-collapseReqChoose">
                                            <i class="fa fa-angle-double-up" aria-hidden="true"></i> Go to previous (Request)
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseTwo" aria-expanded="false" aria-controls="cliDash-collapseTwo">
                                            <i class="fa fa-angle-double-down" aria-hidden="true"></i> Go to next (Document Information)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion client information --}}

                {{-- region document information --}}
                <div class="accordion-item toggleDocInfo" id="doc_info_colps">
                    <input type="hidden" name="new_id" id="new_id">
                    <h2 class="accordion-header border" id="cliDash-headingTwo" style="position: relative">
                        <button class="accordion-button collapsed padding-x-15 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseTwo" aria-expanded="false" aria-controls="cliDash-collapseTwo">
                            <b><i class="fa fa-file-text" aria-hidden="true"></i> Document Information</b>
                        </button>

                        {{--  <div style="position: absolute; left: 205px; top: 8px; z-index: 100;">
                            <div style="display: none;">
                                ✔️
                            </div>
                            <div style="display: none;">
                                ❌
                            </div>
                            <div style="display: block;">
                                ❓
                            </div>
                        </div> --}}
                    </h2>
                    <div id="cliDash-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#cliDashAccordionMain" aria-labelledby="cliDash-headingTwo">
                        {{-- <img src="assets/img/denr_banner.webp" style="width: 100%; height: 50%;"> --}}
                        <div class="accordion-body padding-x-15">

                            {{-- <div class="text-center mb-3">
                                <a href="#choose_req_type" class="toggleDocInfo"><i class="fa fa-file" aria-hidden="true"></i> Go to request type</a>
                            </div> --}}
                            <div class="text-center mb-3">
                                <button class="text-center text-primary border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseReqChoose" aria-expanded="true" aria-controls="cliDash-collapseReqChoose">
                                    <b><i class="fa fa-file" aria-hidden="true"></i> Go to request type</b>
                                </button>
                            </div>

                            <div class="doc_info_msg"></div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="addcliDashapplication_type_id" class="form-label fs-6">Type of Applicant <span class="text-danger">*</span></label>
                                    <select class="form-select" id="addcliDashapplication_type_id" name="application_type_id">
                                        <option value="" data-transaction_id="" data-transaction="" data-transaction_slug="" class="text-danger">--- Choose application type ---</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="addcliDashtransaction_type_id" class="form-label fs-6">Transaction Type <span class="text-danger">*</span></label>
                                    <select class="form-select fw-bold" style="background-color: rgb(226, 226, 226)" id="addcliDashtransaction_type_id" name="transaction_type_id" @readonly(true)>
                                        <option value="" class="text-danger">--- Choose application type ---</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3 addcliDashagencyInputForm" id="addcliDashagencyInputForm">
                                    <label for="addcliDashagency" class="form-label fs-6">Agency </label>
                                    <input type="text" class="form-control toUpperCase" id="addcliDashagency" name="agency" placeholder="Enter complete business name here">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2 d-md-block">
                                        <p class="d-inline-flex gap-1">
                                            <button class="btn btn-outline-primary border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                <u>Multiple inputs 🎯(Advance) . . . </u>
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <span class="text-primary fs-6">- Date format in multiple input <b>yyyy-MM-dd</b></span>
                                                <span class="text-primary fs-6">- Multiple inputs separated by <b>comma (,)</b></span>
                                                <div class="form-floating">
                                                    <textarea class="form-control multi-paste-field" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                    <label for="floatingTextarea">Inputs here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2 d-md-block">
                                        <p class="d-inline-flex gap-1">
                                            <a href="client-dashboard-img-to-pdf" target="_blank" class="btn btn-outline-primary border-0">
                                                <u>Image to PDF file converter 🖼️➜📃 </u>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center app_form_container">
                                <div class="col-lg-12 m2 app_form_main">
                                    <div class="p-3 mb-2 shadow border rounded" style="position: relative">
                                        <button class="btn btn-outline-primary btn-add-app-form btn-add-app-form-toggle" style="position: absolute; top: 12px; right: 12px; border-radius: 50%;" tooltip="Add another form" flow="right">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                        <h5 class="p3">Application Form (1):</h5>
                                        <hr>

                                        {{-- Field Inputs --}}
                                        <div class="atch_cntn_inputs">
                                            <div class="row border border-warning border-2 p-2">
                                                <div class="col-sm-1">
                                                    Note:
                                                </div>
                                                <div class="col">
                                                    <span class="fs-6">- Click attachment name to see details</span><br>
                                                    <span class="fs-6 text-primary disp_inputs_needed"></span>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row attachment_list_inputs">
                                            </div>
                                            <hr>
                                        </div>

                                        {{-- attachments --}}
                                        <div class="atch_cntnr">
                                            <h5 class="p3">
                                                Attachments:
                                                <div class="row border border-warning border-2 p-2">
                                                    <div class="col-md-1">
                                                        Note:
                                                    </div>
                                                    <div class="col-md-11">
                                                        <span class="fs-6">- File size limit per upload: <b>below 10MB</b></span><br>
                                                        <span class="fs-6">- File supported: <b>pdf</b></span><br>
                                                        <span class="fs-6">- Click attachment name to see details</span><br>
                                                        <span class="fs-6 text-primary disp_attachments_needed"></span>
                                                    </div>
                                                </div>
                                                <span class="text-white rounded px-2 disp_attachments_needed"></span>
                                                <input type="hidden" name="disp_attachments_needed_cont" class="disp_attachments_needed_cont">
                                            </h5>

                                            <div class="row attachment_list_required">
                                            </div>

                                            <div class="row attachment_list_additional">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-clpsCliIInf" aria-expanded="false" aria-controls="cliDash-clpsCliIInf">
                                            <i class="fa fa-angle-double-up" aria-hidden="true"></i> Go to previous (Client Information)
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseThree" aria-expanded="false" aria-controls="cliDash-collapseThree">
                                            <i class="fa fa-angle-double-down" aria-hidden="true"></i> Go to next (Document Destination)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion document information --}}

                {{-- region document destination --}}
                <div class="accordion-item toggleDocInfo">
                    <h2 class="accordion-header border" id="cliDash-headingThree" style="position: relative">
                        <button class="accordion-button collapsed padding-x-15 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseThree" aria-expanded="false" aria-controls="cliDash-collapseThree">
                            <b><i class="fa fa-paper-plane" aria-hidden="true"></i> Document Destination</b>
                        </button>

                        {{-- <div style="position: absolute; left: 210px; top: 8px; z-index: 100;">
                            <div style="display: none;">
                                ✔️
                            </div>
                            <div style="display: none;">
                                ❌
                            </div>
                            <div style="display: block;">
                                ❓
                            </div>
                        </div> --}}
                    </h2>
                    <div id="cliDash-collapseThree" class="accordion-collapse collapse" data-bs-parent="#cliDashAccordionMain" aria-labelledby="cliDash-headingThree">
                        <div class="accordion-body padding-x-15">
                            <div class="row">
                                <div class="col-8 mb-3">
                                    <label for="addcliDashoffice_id" class="form-label fs-6">Send to <span class="text-danger">*</span></label>
                                    <select class="form-select" id="addcliDashoffice_id" name="office_id">
                                        <option value="" class="text-danger">--- Choose office ---</option>
                                    </select>
                                    <span class="text-primary addcliDashoffice_id_msg fs-6"> </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseTwo" aria-expanded="false" aria-controls="cliDash-collapseTwo">
                                            <i class="fa fa-angle-double-up" aria-hidden="true"></i> Go to previous (Document Information)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion document destination --}}
            </div>

            {{-- Modal --}}
            <div class="modal fade" id="privacy_consent_modal" tabindex="-1" aria-labelledby="privacy_consent_modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="privacy_consent_modalLabel">Certification and Data Privacy Consent</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- region Certification and Data Privacy Consent --}}
                            <div class="p-3 my-2 shadow border rounded privacy_consent_container border border-4 border-danger toggleDocInfo">
                                <div>
                                    <div class="card card-body">
                                        <hr>
                                        <p class="fs-6 px-3 text-start">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            By completing this form, I hereby certify that the information I have provided
                                            is true, correct and complete. Any false information provided herein will render
                                            this application null and void.
                                        </p>
                                        <p class="fs-6 px-3 text-start">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            I hereby express my consent for the DENR Region Office V to collect and
                                            process my personal information, record, transmit and store the data provided
                                            herein subject to the rules and regulations set by Republic Act NO. 10173,
                                            otherwise known as the Data Privacy Act of 2012.
                                        </p>
                                        <p class="fs-6 px-3 text-start">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <u>Please bring all hard-copy documents related to the request during the inspection,
                                                or when claiming the approved certificate or permit, for cross-validation.</u>
                                            Failure to provide these documents will prevent you from claiming your
                                            request and may even result in the rejection of your request.
                                        </p>

                                        <hr>


                                        <p class="fs-6 px-3 text-start">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            NOTE: If you’re having an issue with submitting a request, kindly contact us through
                                            email <a href="denr5.rfsoats.mailer@gmail.com" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> denr5.rfsoats.mailer@gmail.com</a> or
                                            fb messenger <a href="https://www.facebook.com/jack.buelva/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Olive Myki Barcelon (Barcellano Olive)</a>
                                        </p>

                                        <div class="d-flex flex-row mb-3 px-3">
                                            <div class="p-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="addcliDashdata_privacy_consent" name="data_privacy_consent" style="width: 20px !important; height: 20px !important;">
                                                    <label class="form-check-label fs-6" for="addcliDashdata_privacy_consent">
                                                        I Agree
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="#">Terms of reference</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- endregion Certification and Data Privacy Consent --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn-submit-client-request" data-bs-dismiss="modal">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- endregion request form --}}

        {{-- region modal for creating request tutorial --}}
        <div class="modal fade" id="createReqTut" tabindex="-1" aria-labelledby="createReqTutLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-success fw-bold" id="createReqTutLabel">How to Create a Request</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- region Content Here --}}
                        <iframe id="createReqTutIframe" name="createReqTutIframe" src="/how-to-request" style="width: 100%; height: 800px;"></iframe>
                        {{-- endregion Content Here --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- endregion modal for creating request tutorial --}}

        {{-- region submit request button --}}
        <div class="mx-4 toggleDocInfo">
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#privacy_consent_modal">
                        Submit Request
                    </button>
                </div>
            </div>
            <div class="submit-btn-div"></div>
        </div>
        {{-- endregion submit request button --}}
    </div>
    {{-- endregion main container --}}

    {{-- sample email tester --}}
    {{-- <div class="row">
        <div>
            <button class="btn btn-primary testMailer">
                test emailer
            </button>
        </div>
        <script>
            $(function() {
                $('.testMailer').click(function() {
                    console.log('test mailer button clicked')

                    const dataArr = [{
                        'access_token': 'TOKEN123',
                        'email': 'olivemyki49@gmail.com',
                        'fname': 'CLIVE MARK',
                    }, ]

                    toEmailer_test('olivemyki49@gmail.com', 'DENR RFSOATS - NOTIFY tester ', dataArr);
                });

                // region client email notify
                function toEmailer_test(sendTo, toSubject, toMessage) {
                    $('#genDashNotifs').append('' +
                        '<div class="alert alert-info alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    Please wait while sending email to <strong>' + sendTo + '</strong> . . . ' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );

                    $.ajax({
                        url: "{{ url('send-acknowledgementNotifier') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        data: {
                            email: sendTo,
                            subject: toSubject,
                            message: toMessage,
                        },
                        dataType: 'json',
                        success: function(r) {
                            // console.log(r);
                            if (r.success) {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    The email was sent successfully to <strong>' + sendTo + '</strong>, check your inbox or spam messages to get your access code' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            } else {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    Sending email to <strong>' + sendTo + '</strong> failed <br>' +
                                    '    ' + r.error +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                };
                // endregion client email notify
            })
        </script>
    </div> --}}
    {{-- sample email tester --}}

    {{-- region client information queries --}}
    <script>
        $(function() {
            // region copy email to verify email input tag
            $('#addcliDashemail').change(function() {
                if ($(this).val().indexOf('@') !== -1 && $(this).val().indexOf('.') !== -1) {
                    $('.btn-submit-verify-client').prop('disabled', false);
                } else {
                    $('alert-messages').append('' +
                        '<div class="alert alert-warning alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    Email should be completed, example: <strong>myAccount@gmail.com</strong>' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                    $('.btn-submit-verify-client').prop('disabled', true);
                }

                $('#addcliDashrememberEmail').val($(this).val());
            })
            // endregion copy email to verify email input tag

            // region submit and verify email
            $('.btn-submit-verify-client').click(function(e) {
                e.preventDefault();

                let fname = $('#addcliDashfname').val();
                let mname = $('#addcliDashmname').val();
                let sname = $('#addcliDashsname').val();
                let suffix = $('#addcliDashsuffix').val();
                let sex = $('#addcliDashsex :selected').val();
                let email = $('#addcliDashemail').val();
                let contact_no = $('#addcliDashcontact_no').val();
                let address = $('#addcliDashaddress').val();

                if (fname != '' && sname != '' && sex != '' && email != '' && contact_no != '' && address != '') {
                    $.ajax({
                        url: "{{ url('insert-clientInfo') }}",
                        method: "POST",
                        data: {
                            fname: fname,
                            mname: mname,
                            sname: sname,
                            suffix: suffix,
                            email: email,
                            sex: sex,
                            contact_no: contact_no,
                            address: address,
                        },
                        dataType: 'json',
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        success: function(r) {
                            if (r.success) {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Client info submitted successfully</strong>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                                $('#addcliDashfname, #addcliDashmname, #addcliDashsname, #addcliDashsuffix, #addcliDashemail, #addcliDashcontact_no, #addcliDashaddress').each(function() {
                                    $(this).val('');
                                });
                                $('#addcliDashrememberEmail').val(email);

                                const payload = [{
                                    'access_token': r.access_token,
                                    'email': email,
                                    'fname': fname,
                                }, ]

                                toEmailer(email, 'DENR RFSOATS - NOTIFY ' + fname + ' ', payload);
                            } else {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Client email already exist</strong>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    $('#genDashNotifs').append('' +
                        '<div class="alert alert-warning alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Please fill-in all important fields</strong>' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );

                    $('#addcliDashfname, #addcliDashmname, #addcliDashsname, #addcliDashemail, #addcliDashsex, #addcliDashcontact_no, #addcliDashaddress').each(function() {
                        if ($(this).val() == "") {
                            $(this).css('border-color', 'red');
                        }
                    });
                }
            });
            // endregion submit and verify email

            // region client email notify
            function toEmailer(sendTo, toSubject, toMessage) {
                $('#genDashNotifs').append('' +
                    '<div class="alert alert-info alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                    '    Please wait while sending email to <strong>' + sendTo + '</strong> . . . ' +
                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>'
                );

                $.ajax({
                    url: "{{ url('send-ClientEmailNotify') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    data: {
                        email: sendTo,
                        subject: toSubject,
                        message: toMessage,
                    },
                    dataType: 'json',
                    success: function(r) {
                        // console.log(r);
                        if (r.success) {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    The email was sent successfully to <strong>' + sendTo + '</strong>, check your inbox or spam messages to get your access code' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                        } else {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    Sending email to <strong>' + sendTo + '</strong> failed <br>' +
                                '    ' + r.error +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            };
            // endregion client email notify

            // region toggle client input tags
            let switcher = false;
            $('.btn-toggleClientInfo').click(function() {
                $('.toggleClientInfo').toggle();
                $('.toggleDocInfo').toggle();

                if (switcher == false) {
                    $('.btn-toggleClientInfo').text('Register');
                    $('.btn-toggleClientInfo').attr('tooltip', '');
                    switcher = true;
                } else {
                    $('.btn-toggleClientInfo').text('Use Code');
                    $('.btn-toggleClientInfo').attr('tooltip', 'Check email for access code');
                    switcher = false;
                }
            });
            // endregion toggle client input tags

            // region toggle doc infos
            $('.toggleDocInfo').toggle();
            // endregion toggle doc infos

            // region verify code with email
            $('#addcliDashrememberToken').change(function() {
                func_verify_token()
            });
            $('.btn-verifyToken').click(function(e) {
                e.preventDefault();
                func_verify_token();
            });

            function func_verify_token() {
                let fname = $('#addcliDashrememberfname').val();
                let email = $('#addcliDashrememberEmail').val();
                let access_token = $('#addcliDashrememberToken').val();

                if (email != '' && access_token != '') {
                    $.ajax({
                        url: "{{ url('verify-token-email') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        data: {
                            fname: fname,
                            email: email,
                            access_token: access_token,
                        },
                        dataType: "json",
                        success: function(r) {
                            if (r.success) {
                                // region upon access info display
                                $('.upon-access-info').empty().append('' +
                                    '<hr>' +
                                    '<input type="hidden" class="form-control toUpperCase" id="editcliDashid" name="id" value="' + r.id + '"> ' +
                                    '<div class="row"> ' +
                                    '    <div class="col-md-3 mb-3"> ' +
                                    '        <label for="editcliDashfname" class="form-label fs-6">First Name <span class="text-danger">*</span></label> ' +
                                    '        <input type="text" class="form-control toUpperCase" id="editcliDashfname" name="fname" value="' + r.fname + '"> ' +
                                    '    </div> ' +
                                    '    <div class="col-md-3 mb-2"> ' +
                                    '        <label for="editcliDashmname" class="form-label fs-6">M.I.<span class="text-danger">*</span></label> ' +
                                    '        <input type="text" class="form-control toUpperCase" id="editcliDashmname" name="mname" value="' + r.mname + '"> ' +
                                    '    </div> ' +
                                    '    <div class="col-md-3 mb-3"> ' +
                                    '        <label for="editcliDashsname" class="form-label fs-6">Surname <span class="text-danger">*</span></label> ' +
                                    '        <input type="text" class="form-control toUpperCase" id="editcliDashsname" name="sname" value="' + r.sname + '"> ' +
                                    '    </div> ' +
                                    '    <div class="col-md-3 mb-2"> ' +
                                    '        <label for="editcliDashsuffix" class="form-label fs-6">Suffix</label> ' +
                                    '        <input type="text" class="form-control toUpperCase" id="editcliDashsuffix" name="suffix" placeholder="Jr., Sr., etc.." value="' + r.suffix + '"> ' +
                                    '    </div> ' +
                                    '    <div class="col-md-12 mb-2">' +
                                    '        <label for="editcliDashsex" class="form-label fs-6">Sex <span class="text-danger">*</span></label>' +
                                    '        <select type="text" class="form-select toUpperCase" id="editcliDashsex" name="sex">' +
                                    '            <option value="" class="text-danger">--- Choose your sex ---</option>' +
                                    '            <option value="M" ' + (r.sex == "M" ? 'selected' : '') + ' >♂️ Male</option>' +
                                    '            <option value="F" ' + (r.sex == "F" ? 'selected' : '') + ' >♀️ Female</option>' +
                                    '        </select>' +
                                    '    </div>' +
                                    '</div> ' +
                                    ' ' +
                                    '<div class="row"> ' +
                                    '    <div class="col-md-12 mb-3"> ' +
                                    '        <label for="editcliDashcontact_no" class="form-label fs-6">Contact Number <span class="text-danger">*</span></label> ' +
                                    '        <input type="text" class="form-control toUpperCase" id="editcliDashcontact_no" name="contact_no" placeholder="09xx-xxx-xxxx" value="' + r.contact_no + '"> ' +
                                    '    </div> ' +
                                    '    <div class="col-md-12 mb-3"> ' +
                                    '        <label for="editcliDashaddress" class="form-label fs-6">Address <span class="text-danger">*</span></label> ' +
                                    '        <input type="text" class="form-control toUpperCase" id="editcliDashaddress" name="address" placeholder="Street, Barangay, Municipality, Province" value="' + r.address + '"> ' +
                                    '    </div> ' +
                                    '</div> '
                                );
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Email and Access Code is verified</strong><br>' +
                                    '    <button type="button" class="btn-close p-2" aria-label="Close"></button>' +
                                    '</div>'
                                );
                                // endregion upon access info display

                                // region check if id upload is already available
                                let upload_id_msg = ''
                                if (r.no_id_upload == true) {
                                    upload_id_msg = '<h3>Upload Valid ID</h3><span class="text-danger fs-4">no id uploaded yet</span>'
                                } else {
                                    upload_id_msg = '<h3>Update Valid ID</h3>'
                                }
                                $('.upon-access-info').append('' +
                                    '<hr>' +
                                    upload_id_msg +
                                    '<div class="row">' +
                                    '    <div class="col-md-6 mb-3"> ' +
                                    '        <label for="editcliDashvalid_id_front" class="form-label fs-6">Valid ID (Front) <span class="text-danger">*</span></label> ' +
                                    '        <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;">' +
                                    '           <span class="file_label">Upload Image</span>' +
                                    '           <input type="file" class="form-control file_input_tag" name="valid_id_front" id="editcliDashvalid_id_front" style="visibility:hidden;"> ' +
                                    '        </label> ' +
                                    '    </div> ' +
                                    '    <div class="col-md-6 mb-3"> ' +
                                    '        <label for="editcliDashvalid_id_back" class="form-label fs-6">Valid ID (Back) <span class="text-primary">(optional)</span></label> ' +
                                    '        <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;"> ' +
                                    '           <span class="file_label">Upload Image</span>' +
                                    '           <input type="file" class="form-control file_input_tag" name="valid_id_back" id="editcliDashvalid_id_back" style="visibility:hidden;"> ' +
                                    '       </label> ' +
                                    '    </div> ' +
                                    '</div>'
                                );
                                // endregion check if id upload is already available

                                // region save update button
                                $('.upon-access-info').append('' +
                                    '<hr>' +
                                    '<div class="d-flex flex-row-reverse bd-highlight"> ' +
                                    '    <div class="p-2 bd-highlight"> ' +
                                    '       <button class="btn btn-primary btn-saveChangescliDash">' +
                                    '           Save Changes' +
                                    '       </button>' +
                                    '    </div>' +
                                    '</div>'
                                );
                                // endregion save update button
                            } else {
                                $('#genDashNotifs').empty().append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Name, Email or access code is not found</strong>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    $('#addcliDashrememberEmail, #addcliDashrememberfname, #addcliDashrememberToken').each(function() {
                        if ($(this).val() == '') {
                            $(this).css('border-color', 'red');
                        }
                    })
                }
            }
            // endregion verify code with email

            // region update changes
            $('.upon-access-info').on('click', '.btn-saveChangescliDash', function(e) {
                e.preventDefault();

                let fname = $('.upon-access-info').find('#editcliDashfname').val();
                let mname = $('.upon-access-info').find('#editcliDashmname').val();
                let sname = $('.upon-access-info').find('#editcliDashsname').val();
                let suffix = $('.upon-access-info').find('#editcliDashsuffix').val();
                let sex = $('.upon-access-info').find('#editcliDashsex').val();
                let contact_no = $('.upon-access-info').find('#editcliDashcontact_no').val();
                let address = $('.upon-access-info').find('#editcliDashaddress').val();

                if (fname != '' && sname != '' && sex != '' && contact_no != '' && address != '') {
                    var form = $("#addcliDashRequestForm")[0];
                    var submitForm = new FormData(form);
                    $.ajax({
                        url: "{{ url('edit-clientInfo') }}",
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
                                console.log(r);
                                func_verify_token(); //reload if updated

                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Client Information has been updated</strong>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    $('#genDashNotifs').append('' +
                        '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Please fill-in all important field before updating client information</strong>' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                }
            });
            // endregion update changes

            // region toggle client consent radio
            $('#addcliDashdata_privacy_consent').click(function() {
                if ($('#addcliDashdata_privacy_consent').is(":checked")) {
                    $('.privacy_consent_container').removeClass('border-danger').addClass('border-success');
                } else {
                    $('.privacy_consent_container').removeClass('border-success').addClass('border-danger');
                }
            });
            // endregion toggle client consent radio

            // region sample input access code
            /* $('#addcliDashrememberfname').val('HILDA HOLMAN')
            $('#addcliDashrememberEmail').val('alorajean49@gmail.com')
            $('#addcliDashrememberToken').val('PDAGS162') */
            // endregion sample input access code

            // region resend email function
            $('.btn-resend-code-to-email').click(function() {

                let resendmail = $('#resendmail').val();
                if (resendmail != '') {
                    $.ajax({
                        url: "{{ url('get-resendEmail') }}",
                        method: "POST",
                        data: {
                            email: resendmail,
                        },
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        dataType: "json",
                        success: function(r) {
                            if (r.success) {
                                if (r.data != null) {

                                    const payload = [{
                                        'access_token': r.data.decryptedaccess_token,
                                        'email': resendmail,
                                        'fname': r.data.fname,
                                    }, ]

                                    toEmailer(resendmail, 'DENR RFSOATS - NOTIFY ' + r.data.fname + ' ', payload);
                                } else {
                                    $('.resendmailmsg').empty().append('' +
                                        '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                        '    <strong>Client email information not found</strong>' +
                                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                        '</div>'
                                    );

                                    // Close the message after 5 seconds
                                    setTimeout(function() {
                                        console.log('remove')
                                        $('.resendmailmsg').empty(); // Remove the message
                                    }, 5000); // 5000 milliseconds = 5 seconds
                                }
                            } else {
                                $('.resendmailmsg').empty().append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Client email information not found</strong>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );

                                // Close the message after 5 seconds
                                setTimeout(function() {
                                    console.log('remove')
                                    $('.resendmailmsg').empty(); // Remove the message
                                }, 5000); // 5000 milliseconds = 5 seconds
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    $('.resendmailmsg').empty().append('' +
                        '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Enter email address</strong>' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );

                    // Close the message after 5 seconds
                    setTimeout(function() {
                        console.log('remove')
                        $('.resendmailmsg').empty(); // Remove the message
                    }, 5000); // 5000 milliseconds = 5 seconds
                }


            });
            // endregion resend email function
        });
    </script>
    {{-- endregion client information queries --}}

    {{-- region document information queries --}}
    <script>
        $(function() {
            // region populate selection tags
            $.ajax({
                url: "{{ url('fetch-docInfoSelectTags') }}",
                method: 'GET',
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        r.applicant_type.forEach(dt => {
                            $('#addcliDashapplication_type_id').append('' +
                                '<option ' +
                                '   value="' + dt['id'] + '" ' +
                                '   data-transaction_id="' + dt['transaction_id'] + '" ' +
                                '   data-transaction="' + dt['transaction'] + '" ' +
                                '   data-transaction_slug="' + dt['slug'] + '" ' +
                                '>' +
                                '   ' + dt['applicant'] +
                                '</option>'
                            );
                        });
                        r.classification.forEach(dt => {
                            $('#addcliDashclass_id').append('' +
                                '<option value="' + dt['id'] + '">' +
                                '   ' + dt['description'] +
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

            // region identify transaction type
            $('#addcliDashapplication_type_id').change(function() {
                let id = $('#addcliDashapplication_type_id :selected').data('transaction_id');
                let transaction = $('#addcliDashapplication_type_id :selected').data('transaction');
                let slug = $('#addcliDashapplication_type_id :selected').data('transaction_slug');

                if (id != '') {
                    $('#addcliDashtransaction_type_id').empty().append('' +
                        '<option value="' + id + '">' + slug + '</option>'
                    );
                } else {
                    $('#addcliDashtransaction_type_id').empty().append('' +
                        '<option value="" class="text-danger">--- Choose application type ---</option>'
                    );
                }

                // if transaction type is government to goverment populate agencies
                if (slug == "G2G" || slug == "G2B") {
                    $('#addcliDashagencyInputForm').fadeIn();
                    if (slug == "G2G") {
                        $('#addcliDashagencyInputForm label').empty().append('Agency <span class="text-primary">( do not abbreviate )</span>');
                    } else if (slug == "G2B") {
                        $('#addcliDashagencyInputForm label').empty().append('Business Name <span class="text-primary">( do not abbreviate )</span>');
                    }

                    /* $.ajax({
                        url: "{{ url('fetch-docInfoSelectTags') }}",
                        method: 'GET',
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        success: function(r) {
                            if (r.success) {
                                $('#addcliDashagency').empty();
                                r.agencies.forEach(dt => {
                                    $('#addcliDashagency').append('' +
                                        '<option value="' + dt['slug'] + '">' +
                                        '   ' + dt['agency'] + ' (' + dt['slug'] + ')' +
                                        '</option>'
                                    );
                                });
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    }); */
                } else {
                    $('#addcliDashagencyInputForm').fadeOut()
                    /* $('#addcliDashagency').empty().append('' +
                        '<option value="">' +
                        '   None' +
                        '</option>'
                    ); */
                }

                identify_attachments();
            });
            // endregion identify transaction type

            // region pupolate subclass via class
            $('#addcliDashclass_id').change(function() {
                let class_id = $('#addcliDashclass_id :selected').val();

                if (class_id != '') {
                    $.ajax({
                        url: "/fetch-redtsSubClass_by/" + class_id + "/",
                        method: "GET",
                        data: {
                            id: class_id,
                        },
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        dataType: "json",
                        success: function(r) {
                            if (r.success) {
                                if (r.subclass.length > 0) {
                                    $('#addcliDashsubclass_id').empty();

                                    let first_description = true;
                                    r.subclass.forEach(dt => {
                                        let full_description = dt['full_description'];
                                        tooltip = full_description
                                        if (full_description == null) {
                                            tooltip = 'no description';
                                            full_description = 'no description';
                                        }

                                        $('#addcliDashsubclass_id').append('' +
                                            '<option value="' + dt['id'] + '" data-desc="' + tooltip + '">' +
                                            '   ' + dt['description'] + ' (' + dt['slug'] + ')' +
                                            '</option>'
                                        );

                                        //description
                                        if (first_description == true) {
                                            $('.addcliDashsubclass_id_desc').empty().append("<b>Description: </b>" + full_description.replaceAll('***', '<hr><b>Note: </b>'));
                                            first_description = false;
                                        }
                                    });

                                    identify_attachments();

                                    //identify restricted offices for this service
                                    let first_subclass = r.subclass[0].id;
                                    let first_subclass_description = r.subclass[0].description;
                                    console.log('description' + first_subclass_description);
                                    restricted_office_for_up(first_subclass);
                                } else {
                                    $('#addcliDashsubclass_id').empty().append('' +
                                        '<option value="">' +
                                        '   No Document Type Found' +
                                        '</option>'
                                    );
                                }
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });

                } else {
                    $('#addcliDashsubclass_id').empty().append('' +
                        '<option value="">' +
                        '   No Document Type Found' +
                        '</option>'
                    );
                }

                // if($('#addcliDashclass_id :selected').)
            });
            // endregion pupolate subclass via class

            // region identify attachments to upload
            $('#addcliDashsubclass_id').change(function() {
                identify_attachments();

                //get subclass id
                let subclass_id = $('#addcliDashsubclass_id :selected').val();
                let subclass_desc = $('#addcliDashsubclass_id :selected').data('desc');

                $('.addcliDashsubclass_id_desc').empty().append("<b>Description: </b> " + subclass_desc.replaceAll('***', '<hr><b>Note: </b>'));

                //identify restricted offices for this service
                restricted_office_for_up(subclass_id);
            });

            $('#addcliDashagencyInputForm').hide(); //hide agency
            $('.atch_cntn_inputs').hide();


            //count remove optional requirement
            let remove_optional_item = 0;

            //remove optional requirement
            $('.attachment_list_required').on('click', '.btn-remove-optional-item', function(e) {
                e.preventDefault();

                $(this).closest('.optional-item-parent').addClass("bg-secondary rounded text-white").text('Item has been removed');
                remove_optional_item += 1;
            });

            //remove optional requirement
            $('.app_form_container').on('click', '.btn-remove-optional-item', function(e) {
                e.preventDefault();

                $(this).closest('.optional-item-parent').addClass("bg-secondary rounded text-white").text('Item has been removed');
            });


            $('.btn-add-app-form-toggle').hide(); //hide add app form by default
            let app_form = 1; // starts at 1 application
            function identify_attachments() {
                let subclass = $('#addcliDashsubclass_id :selected').val();
                let transaction_type = $('#addcliDashtransaction_type_id :selected').val();

                if (subclass != '' && transaction_type != '') {
                    $.ajax({
                        url: "fetch-redtsReqStats_by/" + subclass + "/" + transaction_type + "/",
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        success: function(r) {
                            if (r.success) {
                                $('.attachment_list_required').empty();
                                $('.attachment_list_additional').empty();
                                $('.attachment_list_inputs').empty();
                                $('.disp_inputs_needed').empty(); //show number of inputs needed
                                $('.attachment_list_msg').empty().append('<span class="text-primary fs-6">--- proceed to add attachments ---</span>');

                                remove_optional_item = 0; //reset count;
                                let list_inputs = 1;
                                let list_docs = 1;

                                $('.disp_attachments_needed_cont').val(r.get_req.length);
                                r.get_req.forEach(dt => {
                                    $('.atch_cntn_inputs').show();
                                    switch (dt.requirement_type) {
                                        case "required":
                                            if (dt.attachment_type == 'file') {
                                                $('.disp_attachments_needed').empty().append('<b>Attachment needed: ' + list_docs + '</b>'); //show number of attachments needed
                                                $('.attachment_list_required').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_docs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;"><span class="file_label">Attach file</span><input type="file" class="form-control file_input_tag" name="req_attachement_file[]" style="visibility:hidden;"></label>' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_docs += 1;
                                            } else if (dt.attachment_type == 'text') {
                                                $('.disp_inputs_needed').empty().append('<b>fields needed to be filled: ' + list_inputs + '</b>'); //show number of inputs needed
                                                $('.attachment_list_msg').empty().append('Click attachment name to see more details');
                                                $('.attachment_list_inputs').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="text" class="form-control string_input_tag multi-input" name="req_input_text[]" placeholder="input ' + (dt.title).toLowerCase() + ' here" > ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            } else if (dt.attachment_type == 'date') {
                                                $('.disp_inputs_needed').empty().append('<b>Attachment needed: ' + list_docs + '</b>'); //show number of attachments needed
                                                $('.attachment_list_msg').empty().append('Click attachment name to see more details');
                                                $('.attachment_list_inputs').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="date" class="form-control string_input_tag multi-input" name="req_input_text[]"> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            };
                                            break;

                                        case "additional":
                                            if (dt.attachment_type == 'file') {
                                                $('.disp_attachments_needed').empty().append('<b>Attachment needed: ' + list_docs + '</b>'); //show number of attachments needed
                                                $('.attachment_list_additional').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_docs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ' & required)</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;"><span class="file_label">Attach file</span><input type="file" class="form-control file_input_tag" name="req_attachement_file[]" style="visibility:hidden;"></label>' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_docs += 1;
                                            } else if (dt.attachment_type == 'text') {
                                                $('.disp_inputs_needed').empty().append('<b>Attachment needed: ' + list_docs + '</b>'); //show number of attachments needed
                                                $('.attachment_list_msg').empty().append('Click attachment name to see more details');
                                                $('.attachment_list_inputs').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ' & required)</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="text" class="form-control string_input_tag multi-input" name="req_input_text[]" placeholder="input ' + (dt.title).toLowerCase() + ' here" > ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            } else if (dt.attachment_type == 'date') {
                                                $('.disp_inputs_needed').empty().append('<b>Attachment needed: ' + list_docs + '</b>'); //show number of attachments needed
                                                $('.attachment_list_msg').empty().append('Click attachment name to see more details');
                                                $('.attachment_list_inputs').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="date" class="form-control string_input_tag multi-input" name="req_input_text[]"> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            };
                                            break;

                                        case "optional":
                                            if (dt.attachment_type == 'file') {
                                                $('.disp_attachments_needed').empty().append('<b>Attachment needed: ' + list_docs + '</b>'); //show number of attachments needed
                                                $('.attachment_list_required').append('' +
                                                    '<div class="col-md-6 mb-3 optional-item-parent"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_docs + '</b>. ' + dt.title + ' <span class="text-primary">(' + dt.requirement_type + ')</span> <br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '           <div class="row">' +
                                                    '               <div class="col-10">' +
                                                    '                   <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;"><span class="file_label">Attach file</span><input type="file" class="form-control file_input_tag" name="req_attachement_file[]" style="visibility:hidden;"></label>' +
                                                    '               </div> ' +
                                                    '               <div class="col-1">' +
                                                    '                   <button class="btn btn-danger btn-sm rounded btn-remove-optional-item" tooltip="Remove this item" flow="right">X</button> ' +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_docs += 1;
                                            } else if (dt.attachment_type == 'text') {
                                                $('.disp_inputs_needed').empty().append('<b>fields needed to be filled: ' + list_inputs + '</b>'); //show number of inputs needed
                                                $('.attachment_list_msg').empty().append('Click attachment name to see more details');
                                                $('.attachment_list_inputs').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="text" class="form-control string_input_tag multi-input" name="req_input_text[]" placeholder="input ' + (dt.title).toLowerCase() + ' here" > ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            } else if (dt.attachment_type == 'date') {
                                                $('.disp_inputs_needed').empty().append('<b>Attachment needed: ' + list_docs + '</b>'); //show number of attachments needed
                                                $('.attachment_list_msg').empty().append('Click attachment name to see more details');
                                                $('.attachment_list_inputs').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="date" class="form-control string_input_tag multi-input" name="req_input_text[]"> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            };
                                            break;

                                        default:
                                            $('#genDashNotifs').append('' +
                                                '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" data-bs-dismiss="alert" role="alert"> ' +
                                                '    <strong>Attachment type not determined</strong> ' +
                                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                                '</div>'
                                            );
                                    }
                                });

                                // determine if text input form while showup
                                if ((list_inputs - 1) == 0) {
                                    console.log('hiding input application form because its empty');
                                    $('.atch_cntn_inputs').hide();
                                } else {
                                    console.log('showing application form');
                                    $('.atch_cntn_inputs').show();
                                }

                                //show add app form to add multipple inputfield or attachments
                                $('.btn-add-app-form-toggle').show(); //show app form

                                // remove the additional forms
                                $('.app_form_additional').remove();
                                app_form = 1; //reset form number
                            } else {
                                $('.btn-add-app-form-toggle').hide(); //hide app form

                                // remove the additional forms
                                $('.app_form_additional').remove();
                                app_form = 1; //reset form number
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                } else {
                    $('.doc_info_msg').append('' +
                        '<div class="alert alert-warning alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Request type and transaction type must contain a value</strong>' +
                        '    <button class="text-center text-primary border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseReqChoose" aria-expanded="true" aria-controls="cliDash-collapseReqChoose">' +
                        '         <b><i class="fa fa-file" aria-hidden="true"></i> Go to request type</b> ' +
                        '    </button>' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                    // Close the message after 5 seconds
                    setTimeout(function() {
                        console.log('remove notifs');
                        $('.doc_info_msg').empty(); // Remove the message
                    }, 5000); // 5000 milliseconds = 5 seconds

                    $('.btn-add-app-form-toggle').hide(); //hide app form

                    // empty the  input attachments
                    $('.attachment_list_inputs').empty();
                    $('.attachment_list_required').empty();
                    $('.attachment_list_additional').empty();

                    // remove the additional forms
                    $('.app_form_additional').remove();
                    app_form = 1; //reset form number
                }
            }
            // endregion identify attachments to upload

            // region get restrictions office for submission
            function restricted_office_for_up(subclass_id) {
                console.clear();
                console.log('sublass_id :' + subclass_id);

                $.ajax({
                    url: "fetch-office-restriction-for/" + subclass_id,
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function(r) {
                        if (r.success) {

                            // populate office where data will be sent
                            $('#addcliDashoffice_id').empty();
                            $('#addcliDashoffice_id').append('' +
                                '<option value="" class="text-danger">' +
                                '   --- Choose office ---' +
                                '</option>'
                            );

                            $('#addcliDashoffice_id_msg').empty();
                            r.rcv_offices.forEach(dt => {
                                let is_disabled = "";
                                if (dt.disabled == true) {
                                    is_disabled = "disabled";

                                    $('.addcliDashoffice_id_msg').empty().append('<b>Note </b>: Disabled office in the destination list are not allowed to receive your request');
                                }

                                $('#addcliDashoffice_id').append('' +
                                    '<option value="' + dt.id + '" ' + is_disabled + '>' +
                                    '   ' + dt.full_office_name +
                                    '</option>'
                                );
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            // endregion get restrictions office for submission

            // region add appform
            $('.btn-add-app-form').click(function(e) { //add aditional form
                e.preventDefault();
                add_another_form();
            });
            $('.app_form_container').on('click', '.btn-remove-app-form', function(e) { //remove the added form
                e.preventDefault();
                $(this).closest('.app_form_additional').empty().addClass('bg-secondary text-white rounded p-1').append("Application form has been removed");
            });

            function add_another_form() {
                app_form += 1;

                $('.app_form_container').append('' +
                    '<div class="col-lg-12 m2 app_form_additional" id="afa' + app_form + '"> ' +
                    '    <div class="p-3 mb-2 shadow border rounded" style="position: relative"> ' +
                    '    <button class="btn btn-danger btn-remove-app-form" style="position: absolute; top: 12px; right: 12px; border-radius: 50%;" tooltip="Remove this form" flow="right"> ' +
                    '        <i class="fa fa-times" aria-hidden="true"></i> ' +
                    '    </button> ' +
                    '    <h5 class="p3">Application Form (' + app_form + '):</h5> ' +
                    '    <hr> ' +
                    '    <div class="px-3"> ' +
                    '        <div class="row attachment_list_inputs attachment_list_inputs' + app_form + '"> ' +
                    '        </div> ' +
                    '        <hr> ' +
                    '    </div> ' +
                    '    <div class="px-3"> ' +
                    '        <h5 class="p3">Attachments:</h5> ' +
                    '        <div class="row attachment_list_required attachment_list_required' + app_form + ' "> ' +
                    '        </div> ' +
                    '        <div class="row attachment_list_additional attachment_list_additional' + app_form + '"> ' +
                    '        </div> ' +
                    '    </div> ' +
                    ''
                );

                let list_inputs = 1;
                let list_docs = 1;

                let subclass = $('#addcliDashsubclass_id :selected').val();
                let transaction_type = $('#addcliDashtransaction_type_id :selected').val();

                if (subclass != '' && transaction_type != '') {
                    $.ajax({
                        url: "fetch-redtsReqStats_by/" + subclass + "/" + transaction_type + "/",
                        method: "GET",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        success: function(r) {
                            if (r.success) {
                                r.get_req.forEach(dt => {
                                    switch (dt.requirement_type) {
                                        case "required":
                                            if (dt.attachment_type == 'file') {
                                                $('.attachment_list_required' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_docs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;"><span class="file_label">Attach file</span><input type="file" class="form-control file_input_tag" name="req_attachement_file[]" style="visibility:hidden;"></label>' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_docs += 1;
                                            } else if (dt.attachment_type == 'text') {
                                                $('.attachment_list_inputs' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="text" class="form-control string_input_tag multi-input" name="req_input_text[]" placeholder="input ' + (dt.title).toLowerCase() + ' here" > ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            } else if (dt.attachment_type == 'date') {
                                                $('.attachment_list_inputs' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="date" class="form-control string_input_tag multi-input" name="req_input_text[]"> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            };
                                            break;

                                        case "additional":
                                            if (dt.attachment_type == 'file') {
                                                $('.attachment_list_additional' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_docs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ' & required)</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;"><span class="file_label">Attach file</span><input type="file" class="form-control file_input_tag" name="req_attachement_file[]" style="visibility:hidden;"></label>' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_docs += 1;
                                            } else if (dt.attachment_type == 'text') {
                                                $('.attachment_list_inputs' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ' & required)</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="text" class="form-control string_input_tag multi-input" name="req_input_text[]" placeholder="input ' + (dt.title).toLowerCase() + ' here" > ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            } else if (dt.attachment_type == 'date') {
                                                $('.attachment_list_inputs' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="date" class="form-control string_input_tag multi-input" name="req_input_text[]"> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            };
                                            break;

                                        case "optional":
                                            if (dt.attachment_type == 'file') {
                                                $('.attachment_list_required' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3 optional-item-parent"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_docs + '</b>. ' + dt.title + ' <span class="text-primary">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '           <div class="row">' +
                                                    '               <div class="col-10">' +
                                                    '                   <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;"><span class="file_label">Attach file</span><input type="file" class="form-control file_input_tag" name="req_attachement_file[]" style="visibility:hidden;"></label>' +
                                                    '               </div> ' +
                                                    '               <div class="col-1">' +
                                                    '                   <button class="btn btn-danger btn-sm rounded btn-remove-optional-item" tooltip="Remove this item" flow="right">X</button> ' +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_docs += 1;
                                            } else if (dt.attachment_type == 'text') {
                                                $('.attachment_list_inputs' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="text" class="form-control string_input_tag multi-input" name="req_input_text[]" placeholder="input ' + (dt.title).toLowerCase() + ' here" > ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            } else if (dt.attachment_type == 'date') {
                                                $('.attachment_list_inputs' + app_form + '').append('' +
                                                    '<div class="col-md-6 mb-3"> ' +
                                                    '    <div class="row"> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <h6 data-bs-toggle="collapse" href="#collapseReq' + dt.id + '" role="button" aria-expanded="false" aria-controls="collapseReq' + dt.id + '">' +
                                                    '              <b>' + list_inputs + '</b>. ' + dt.title + ' <span class="text-danger">(' + dt.requirement_type + ')</span><br> ' +
                                                    '           </h6> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_id[]" value="' + dt.id + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_app_form[]" value="' + app_form + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_slug[]" value="' + dt.slug + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_title[]" value="' + dt.title + '"> ' +
                                                    '          <input type="hidden" class="form-control" name="req_input_attachment_type[]" value="' + dt.attachment_type + '"> ' +
                                                    '          <input type="date" class="form-control string_input_tag multi-input" name="req_input_text[]"> ' +
                                                    '       </div> ' +
                                                    '       <div class="col-12"> ' +
                                                    '           <div class="collapse show" id="collapseReq' + dt.id + '"> ' +
                                                    '               <div class="card card-body"> ' +
                                                    '                  <label>Description: </label>' +
                                                    '                  ' + dt.description.replaceAll('***', '</br> ➤') +
                                                    '               </div> ' +
                                                    '           </div> ' +
                                                    '       </div> ' +
                                                    '    </div> ' +
                                                    '</div> '
                                                );
                                                list_inputs += 1;
                                            };
                                            break;

                                        default:
                                            $('#genDashNotifs').append('' +
                                                '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" data-bs-dismiss="alert" role="alert"> ' +
                                                '    <strong>Attachment type not determined</strong> ' +
                                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                                '</div>'
                                            );
                                    }
                                });
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                } else {
                    $('.doc_info_msg').append('' +
                        '<div class="alert alert-warning alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Request type and transaction type must contain a value</strong>' +
                        '    <a href="#choose_req_type" class="toggleDocInfo" style=""><i class="fa fa-caret-right" aria-hidden="true"></i> Go to request type</a>' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                    // Close the message after 5 seconds
                    setTimeout(function() {
                        console.log('remove notifs');
                        $('.doc_info_msg').empty(); // Remove the message
                    }, 5000); // 5000 milliseconds = 5 seconds
                }

                $('.app_form_container').append('' +
                    '    </div> ' +
                    '</div> ' +
                    ''
                );

                // focus scroll in the created new form
                // document.getElementById("afa" + app_form + "").scrollIntoView();

                $('#genDashNotifs').append('' +
                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" data-bs-dismiss="alert" role="alert"> ' +
                    '    <strong>Form has been added</strong> ' +
                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                    '</div>'
                );
                // Close the message after 5 seconds
                setTimeout(function() {
                    console.log('remove notifs');
                    $('#genDashNotifs').empty(); // Remove the message
                }, 3000); // 5000 milliseconds = 5 seconds
            }
            // endregion add appform

            // region populate send to office for client
            /* $.ajax({
                url: "{{ url('fetch-clientReceivingOffice') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        $('#addcliDashoffice_id').empty();
                        $('#addcliDashoffice_id').append('' +
                            '<option value="" class="text-danger">' +
                            '   --- Choose office ---' +
                            '</option>'
                        );
                        r.offices.forEach(dt => {
                            $('#addcliDashoffice_id').append('' +
                                '<option value="' + dt.id + '">' +
                                '   ' + dt.full_office_name +
                                '</option>'
                            );
                        });
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            }); */
            // endregion populate send to office for client

            // region multi paste
            $('.multi-paste-field').change(function() {
                // Split the data by commas
                let data = $(this).val();
                const dataArray = data.split(',');

                // Assign data to respective input fields using class
                $('.attachment_list_inputs .multi-input').each(function(index) {
                    $(this).val(dataArray[index] || '');
                });
            });
            // endregion multi paste

            // {{-- endregion document information queries --}}

            // joined the both script tags to share variables

            // {{-- region submit client request queries --}}

            // region submit client request
            $('.btn-submit-client-request').click(function(e) {
                e.preventDefault();

                $('#genDashNotifs').append('' +
                    '<div class="alert alert-info alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                    '    <strong>Sending your request . . . </strong><br>' +
                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>'
                );

                let clientId = $('.upon-access-info').find('#editcliDashid').val();
                let application_type_id = $('#addcliDashapplication_type_id :selected').val();
                let transaction_type_id = $('#addcliDashtransaction_type_id :selected').val();
                let agency = $('#addcliDashagency').val();
                let class_id = $('#addcliDashclass_id :selected').val();
                let subclass_id = $('#addcliDashsubclass_id :selected').val();

                if (clientId == undefined) {
                    clientId = '';
                }

                let allow_agency_blank_depending_to_transact = false;

                if (transaction_type_id == 1 && agency != '') {
                    allow_agency_blank_depending_to_transact = true;
                } else if (transaction_type_id == 2 && agency != '') {
                    allow_agency_blank_depending_to_transact = true;
                } else if (transaction_type_id == 3) {
                    allow_agency_blank_depending_to_transact = true;
                } else if (transaction_type_id == 4) {
                    allow_agency_blank_depending_to_transact = true;
                } else {
                    allow_agency_blank_depending_to_transact = false;
                }

                if (clientId != '') {
                    if (application_type_id != '' && transaction_type_id != '' && class_id != '' && subclass_id != '') {
                        if (allow_agency_blank_depending_to_transact == true) {
                            // count application forms
                            let app_form_main = $('.app_form_main').length;
                            let app_form_additional = $('.app_form_additional').length;
                            let total_app_form = app_form_main + app_form_additional;
                            console.log('app_form_main = ' + app_form_main);
                            console.log('app_form_additional = ' + app_form_additional);
                            console.log('total_app_form = ' + total_app_form);


                            // region verify all files to be uploaded if it is equal to how many doc is needed
                            let required = $('.attachment_list_required .file_input_tag').filter(function() {
                                return $(this).get(0).files.length > 0;
                            }).length;
                            let additional = $('.attachment_list_additional .file_input_tag').filter(function() {
                                return $(this).get(0).files.length > 0;
                            }).length;
                            let other_inputs = $('.attachment_list_inputs .string_input_tag').filter(function() {
                                return $(this).val().length > 0;
                            }).length;
                            let file_up_filled = required + additional + other_inputs;
                            let disp_attachments_needed = $('.disp_attachments_needed_cont').val()
                            console.log('required: ' + required);
                            console.log('additional: ' + additional);
                            console.log('other_inputs: ' + other_inputs);

                            if (file_up_filled == ((disp_attachments_needed * total_app_form) - remove_optional_item)) { // deduct remove_optional_item in the calculation
                                if ($('#addcliDashoffice_id :selected').val() != '') {
                                    if ($('#addcliDashdata_privacy_consent').is(":checked")) {
                                        var form = $("#addcliDashRequestForm")[0];
                                        var submitForm = new FormData(form);
                                        $.ajax({
                                            url: "{{ url('insert-clientRequest') }}",
                                            method: "POST",
                                            data: submitForm,
                                            headers: {
                                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                            },
                                            async: false,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function(r) {
                                                if (r.success) {
                                                    console.log(r);
                                                    $('#genDashNotifs').append('' +
                                                        '<div class="alert alert-info alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                                        '    <strong>Uploading documents . . .</strong>' +
                                                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                                        '</div>'
                                                    );

                                                    let doc_id = r.new_id;
                                                    $('#new_id').val(doc_id);
                                                    // region upload document here
                                                    form = $("#addcliDashRequestForm")[0];
                                                    submitForm = new FormData(form);
                                                    $.ajax({
                                                        url: "{{ url('insert-clientDocFiles') }}",
                                                        method: "POST",
                                                        data: submitForm,
                                                        headers: {
                                                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                                        },
                                                        async: false,
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(r_doc_up) {
                                                            if (r_doc_up.success) {
                                                                console.log(r_doc_up);

                                                                $('#genDashNotifs').append('' +
                                                                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                                                    '    <strong>✅ Documents has been uploaded</strong>' +
                                                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                                                    '</div>'
                                                                );

                                                                //send mail acknowledgement
                                                                const payload = [{
                                                                    'doc_id': doc_id,
                                                                    'email': r.client_email,
                                                                    'fname': r.client_fname,
                                                                    'request_type': r.request_type,
                                                                    'office_receiving_req': r.office_receiving_req,
                                                                }, ]

                                                                $('#genDashNotifs').append('' +
                                                                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                                                    '    <strong>Request has been succesfully created</strong><br>' +
                                                                    '    Tracking code will be sent to your email once validated and approved,' +
                                                                    '    📩 Please check your email for updates' +
                                                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                                                    '</div>'
                                                                );

                                                                toEmailer_acknowledgement(r.client_email, 'DENR RFSOATS - ACKNOWLEDGEMENT OF REQUEST FOR ' + r.client_fname + ' (' + r.request_type + ')', payload);

                                                                $('.file_input_tag').val(''); // Clear the input
                                                                $('.file_label').empty().append('Attach file');
                                                                $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');

                                                                // Close the message after 5 seconds
                                                                /* setTimeout(function() {
                                                                    console.log('remove notifs');
                                                                    $('#genDashNotifs').empty(); // Remove the message
                                                                }, 10000); // 10000 milliseconds = 10 seconds */
                                                            } else {

                                                                //uploading files failed
                                                                $('#genDashNotifs').append('' +
                                                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                                                    '    <strong>Uploading documents failed, restrictions triggered or internet connection interrupted</strong>' +
                                                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                                                    '</div>'
                                                                );
                                                                // Close the message after 5 seconds
                                                                setTimeout(function() {
                                                                    console.log('remove notifs');
                                                                    $('#genDashNotifs').empty(); // Remove the message
                                                                }, 5000); // 5000 milliseconds = 5 seconds
                                                            }
                                                        },
                                                        error: function(err) {
                                                            console.log(err);
                                                        }
                                                    });
                                                    // endregion upload document here
                                                } else {
                                                    if (r.no_id) {
                                                        $('#genDashNotifs').append('' +
                                                            '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                                            '    <strong>Request denied:<br>Please upload valid id</strong><br>' +
                                                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                                            '</div>'
                                                        );
                                                        // Close the message after 5 seconds
                                                        setTimeout(function() {
                                                            console.log('remove notifs');
                                                            $('#genDashNotifs').empty(); // Remove the message
                                                        }, 5000); // 5000 milliseconds = 5 seconds
                                                    }
                                                }
                                            },
                                            error: function(err) {
                                                console.log(err);
                                            }
                                        });
                                    } else {
                                        $('#genDashNotifs').append('' +
                                            '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                            '    <strong>Check data privacy consent</strong>' +
                                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                            '</div>'
                                        );
                                    }
                                } else {
                                    $('#genDashNotifs').append('' +
                                        '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                        '    <strong>Please select office</strong>' +
                                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                        '</div>'
                                    );

                                    $('#addcliDashoffice_id').each(function() {
                                        $(this).css('border-color', 'red');
                                    });
                                }
                            } else {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Please fill-in all required fields and attach all needed files</strong><br>' +
                                    '    Total application form: <strong>' + total_app_form + '</strong><br>' +
                                    '    Total inputs and attachments needed: <strong>' + ((disp_attachments_needed * total_app_form) - remove_optional_item) + '</strong><br>' +
                                    '    <hr>' +
                                    '    Your inputs and attachments: <strong>' + file_up_filled + '</strong>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                                // Close the message after 5 seconds
                                setTimeout(function() {
                                    console.log('remove notifs');
                                    $('#genDashNotifs').empty(); // Remove the message
                                }, 5000); // 5000 milliseconds = 5 seconds
                            }
                            // endregion verify all files to be uploaded if it is equal to how many doc is needed
                        } else {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    <strong>Client must input business name if requesting as government or business</strong>' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                            // Close the message after 5 seconds
                            setTimeout(function() {
                                console.log('remove notifs');
                                $('#genDashNotifs').empty(); // Remove the message
                            }, 5000); // 5000 milliseconds = 5 seconds
                        }
                    } else {
                        // check if value is empty
                        if (application_type_id == '') {
                            $('#addcliDashapplication_type_id').css('border-color', 'red');
                        }
                        if (transaction_type_id == '') {
                            $('#addcliDashtransaction_type_id').css('border-color', 'red');
                        }
                        /* if(agency == ''){
                            $('#addcliDashagency').css('border-color', 'red');
                        } */
                        if (class_id == '') {
                            $('#addcliDashclass_id').css('border-color', 'red');
                        }
                        if (subclass_id == '') {
                            $('#addcliDashsubclass_id').css('border-color', 'red');
                        }

                        $('#genDashNotifs').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                            '    <strong>Fill-in document information needed</strong>' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );
                        // Close the message after 5 seconds
                        setTimeout(function() {
                            console.log('remove notifs');
                            $('#genDashNotifs').empty(); // Remove the message
                        }, 5000); // 5000 milliseconds = 5 seconds
                    }
                } else {
                    $('#genDashNotifs').append('' +
                        '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Please verify access code on client information</strong>' +
                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                    // Close the message after 5 seconds
                    setTimeout(function() {
                        console.log('remove notifs');
                        $('#genDashNotifs').empty(); // Remove the message
                    }, 5000); // 5000 milliseconds = 5 seconds
                }
            });
            // endregion submit client request

            // region acknowledgement mailer
            function toEmailer_acknowledgement(sendTo, toSubject, toMessage) {
                $('#genDashNotifs').append('' +
                    '<div class="alert alert-info alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                    '    Please wait while sending acknowledgement email to <strong>' + sendTo + '</strong> . . . ' +
                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>'
                );

                $.ajax({
                    url: "{{ url('send-acknowledgementNotifier') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    data: {
                        email: sendTo,
                        subject: toSubject,
                        message: toMessage,
                    },
                    dataType: 'json',
                    success: function(r) {
                        // console.log(r);
                        if (r.success) {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    📩 The acknowledgement email was sent successfully to <strong>' + sendTo + '</strong>, check your inbox or spam messages' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );

                            console.clear();

                            window.open("/client-dashboard-ty-msg", "_blank");
                        } else {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    Sending email to <strong>' + sendTo + '</strong> failed <br>' +
                                '    ' + r.error +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            };
            // endregion acknowledgement mailer
        });
    </script>
    {{-- endregion submit client request queries --}}

    {{-- region navbar text display --}}
    <script>
        $(function() {
            $('.navbar-brand-govph').hide();
        });
    </script>
    {{-- endregion navbar text display --}}

    {{-- region check if url valu exists --}}
    @if (request()->has('fn'))
        <script>
            $(function() {
                $('.btn-toggleClientInfo').click();
            });
        </script>
    @endif
    {{-- endregion check if url valu exists --}}


    {{-- region prevent accidental reload of page --}}
    <script>
        // Listen for the 'beforeunload' event to handle page reload attempts
        window.addEventListener('beforeunload', function(event) {
            // Prompt the user for confirmation
            var confirmationMessage = "Are you sure you want to leave? Your changes may not be saved.";

            // Standard for most browsers
            event.returnValue = confirmationMessage;

            // For some older browsers
            return confirmationMessage;
        });
    </script>
    {{-- endregion prevent accidental reload of page --}}

    {{-- region css shake animate css --}}
    <script>
        setInterval(function() {
            var span = document.querySelector('.click-me-to-learn-how');
            span.style.animation = 'none';
            setTimeout(function() {
                span.style.animation = '';
            }, 10);
        }, 5000);
    </script>
    {{-- endregion css shake animate css --}}
@endsection
