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
                        $('.file_label').empty().append('Upload Receipt');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                    }

                    // Check file format
                    if (!allowedFormats.includes(selectedFile.type)) {
                        alert("Unsupported file format. Please select a PDF, JPEG, or PNG file.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Upload Receipt').css('color', '#6c757d');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                        return;
                    }
                } else {
                    $(this).closest('label').find('.file_label').empty().append('Upload Receipt'); // Clear the file label
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
            padding-left: 120px;
            padding-right: 150px;
        }

        .container-navbar {
            padding: 0;
        }

        @media screen and (max-width: 768px) {
            .header {
                padding-left: 0px;
            }

            body,
            .container-fluid {
                padding: 0;
            }
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
                        {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                        <li class="breadcrumb-item" aria-current="page">Billing</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}

        @if (request()->has('dn'))
            {{-- region receipt form --}}
            <form class="form-floating p-0 mb-4" id="addPR_ReceiptForm">
                <input type="hidden" class="form-control" id="upload_limit" name="upload_limit" value="{{ $upload_limit }}">
                <input type="hidden" class="form-control" id="doc_track_no" name="doc_track_no" placeholder="xxx-xxxx.xx.xx-xx" value="{{ request('dn') ?? '' }}">
                <div class="accordion shadow" id="cliDashAccordionMain">
                    {{-- region client information --}}
                    <div class="accordion-item toggleSeachDocCont">
                        <h2 class="accordion-header border" id="cliDash-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cliDash-collapseOne" aria-expanded="true" aria-controls="cliDash-collapseOne">
                                <b><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;Upload Payment Receipt Form</b>
                            </button>
                        </h2>
                        <div id="cliDash-collapseOne" class="accordion-collapse collapse show" aria-labelledby="cliDash-headingOne">
                            <div class="accordion-body bg-white">
                                <div class="row toggleClientInfo">
                                    <div class="col-md-12 mb-3">
                                        <label for="addPR_doc_track" class="form-label fs-6">Document Tracking Number: </label>
                                        <input type="text" class="form-control" id="addPR_doc_track" name="doc_track" placeholder="xxx-xxxx.xx.xx-xx" value="{{ request('dn') ?? '' }}" disabled>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="btn btn-outline-secondary" style="width: 100%; height: 35px;">
                                            <span class="file_label">Upload Receipt</span>
                                            <input type="file" class="form-control file_input_tag" name="receipt" id="addPR_receipt" style="visibility:hidden;">
                                        </label>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        {{-- region Certification and Data Privacy Consent --}}
                                        <div class="p-3 my-2 shadow border rounded privacy_consent_container border border-4 border-danger toggleDocInfo">
                                            <div class="d-grid gap-2">
                                                <button class="btn shadow" type="button" data-bs-toggle="collapse" data-bs-target="#privacy_const_cont" aria-expanded="false" aria-controls="privacy_const_cont">
                                                    Certification and Data Privacy Consent
                                                </button>
                                            </div>
                                            <div class="collapse mt-2" id="privacy_const_cont">
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

                                    <div class="col-md-12 mb-3">
                                        <div class="row border border-warning border-2 mx-4 p-2">
                                            <div class="col-sm-1">
                                                Note:
                                            </div>
                                            <div class="col">
                                                <span class="fs-6">- File size limit per upload: <b>below {{ round($upload_limit / (1024 * 1024)) }}MB</b></span><br>
                                                <span class="fs-6">- File supported: <b>pdf</b>, <b>jpeg</b>, <b>jpg</b>, <b>png</b></span>
                                                <br>
                                                <span class="fs-6">- Click attachment name to see details</span><br>
                                                <span class="fs-6 text-primary disp_attachments_needed"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row-reverse bd-highlight">
                                        <div class="p-2 bd-highlight toggleClientInfo">
                                            <button class="btn btn-primary btn-submit-billing-receipt" tooltip="Submit receipt" flow="down">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endregion client information --}}
                    </div>
            </form>
            {{-- endregion receipt form --}}
        @else
            <div style="
                text-align: center; 
                background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); 
                font: small-caps bold 24px/1 sans-serif;
                height: 100%;
                padding-top: 10%;
                padding-bottom: 10%;
            ">
                <span>
                    <h2>𓆩♡𓆪</h2>
                    <h2>
                        <º))))>
                            < </h2>
                                <h2>No Document Tracking Number Found</h2>
                </span>
            </div>
        @endif
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
            // region file upload restriction
            $('#addPR_ReceiptForm').on('change', '.file_input_tag', function() {
                let allowedFormats = ["application/pdf", "image/jpeg", "image/jpg", "image/png"];
                let maxSizeByte = $('#upload_limit').val(); // Maximum allowed file size in megabytes
                let selectedFile = this.files[0];

                if (selectedFile) {
                    $(this).parent().find('.file_label').empty().append(selectedFile.name);
                    $(this).parent().css('background-color', '#6c757d').css('color', '#ffffff');
                    // Check file size
                    if (selectedFile.size > maxSizeByte) {
                        alert("File size exceeds the maximum allowed size of less than" + (Math.round(maxSizeByte / (1024 * 1024))) + "MB.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Upload Receipt');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                    }

                    // Check file format
                    if (!allowedFormats.includes(selectedFile.type)) {
                        alert("Unsupported file format. Please select a PDF file.");
                        $('.file_input_tag').val(''); // Clear the input
                        $('.file_label').empty().append('Upload Receipt').css('color', '#6c757d');
                        $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                        return;
                    }
                } else {
                    $(this).closest('label').find('.file_label').empty().append('Upload Receipt'); // Clear the file label
                    $(this).parent().css('background-color', '#ffffff').css('color', '#6c757d');
                }
            });

            // submit
            $('.btn-submit-billing-receipt').click(function(e) {
                e.preventDefault();

                let form = $('#addPR_ReceiptForm')[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "edit-payment-receipt",
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
                            if (r.receipt_upt) {
                                console.log(r);

                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>File has been uploaded, thank you</strong><br>' +
                                    '    always check the status of document using the document tracking' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                                // Close the message after 5 seconds
                                setTimeout(function() {
                                    console.log('remove notifs');
                                    $('#genDashNotifs').empty(); // Remove the message
                                }, 10000); // 5000 milliseconds = 5 seconds


                                $('.file_input_tag').val(''); // Clear the input
                                $('.file_label').empty().append('Upload Receipt').css('color', '#6c757d');
                                $('.file_label').parent().css('background-color', '#ffffff').css('color', '#6c757d');
                            } else {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>No file has been uploaded &nbsp;&nbsp;&nbsp;&nbsp;</strong><br>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                                // Close the message after 5 seconds
                                setTimeout(function() {
                                    console.log('remove notifs');
                                    $('#genDashNotifs').empty(); // Remove the message
                                }, 5000); // 5000 milliseconds = 5 seconds
                            }

                            if (r.doc_inf_exist == false) {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Document tracking number does not match or &nbsp;&nbsp;&nbsp;&nbsp;<br>document does not exist</strong><br>' +
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
                            if(r.data_privacy_consent == 0){
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>Please approve data privacy concent &nbsp;&nbsp;&nbsp;&nbsp;</strong><br>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }else{
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                    '    <strong>No file has been uploaded &nbsp;&nbsp;&nbsp;&nbsp;</strong><br>' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }
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
            })

             // region toggle client consent radio
             $('#addcliDashdata_privacy_consent').click(function() {
                if ($('#addcliDashdata_privacy_consent').is(":checked")) {
                    $('.privacy_consent_container').removeClass('border-danger').addClass('border-success');
                } else {
                    $('.privacy_consent_container').removeClass('border-success').addClass('border-danger');
                }
            });
            // endregion toggle client consent radio
        });
    </script>
    {{-- endregion document information queries --}}

    {{-- region navbar text display --}}
    <script>
        $(function() {
            $('.navbar-brand-govph').hide();
        });
    </script>
    {{-- endregion navbar text display --}}
@endsection
