@extends('layout.master')
@section('title', 'Bulk Document Routing')
@section('head_extension')
    {{-- region custom css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/tab.css') }}">
    {{-- endregion custom css --}}

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

        .btn-refresh {
            transition: transform .2s;
            margin: 0 auto;
        }

        .btn-refresh:hover {
            transform: scale(1.1);
            z-index: 999;
        }

        .btn-refresh-label {
            display: none;
        }

        .btn-refresh:hover .btn-refresh-label,
        .btn-addndoc:hover .btn-refresh-label {
            display: inline-block;
        }

        table .fs-6 {
            font-size: 13px !important;
        }

        /* Bulk item styling */
        .bulk-item-set {
            background-color: #f8f9fa;
            border: 2px solid #dee2e6;
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 8px;
            position: relative;
        }

        .bulk-item-set:hover {
            border-color: #0d6efd;
            box-shadow: 0 0 10px rgba(13, 110, 253, 0.1);
        }

        .bulk-item-header {
            background-color: #e9ecef;
            padding: 10px 15px;
            margin: -20px -20px 15px -20px;
            border-radius: 6px 6px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-number {
            font-weight: bold;
            color: #0d6efd;
            font-size: 1.1em;
        }

        .btn-remove-bulk-item {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }

        .shared-destinations-info {
            background-color: #cfe2ff;
            border: 1px solid #9ec5fe;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .toUpperCase {
            text-transform: uppercase;
        }

        /* region for other requestee input custom css */
        .row-tab-leader {
            display: flex;
            justify-content: center;
            align-items: center;
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
    {{-- endregion extra customized style --}}

    {{-- region important custom function --}}
    <script>
        $(function() {
            // region turn every key input to uppercase
            $(document).on('input', '.toUpperCase', function() {
                $(this).val($(this).val().toUpperCase());
            });
            // endregion turn every key input to uppercase

            // region change border to grey / default
            $(document).on('click', 'input', function() {
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
    {{-- region If Authenticated --}}
    <input type="hidden" class="auth_userid" name="auth_userid" id="auth_userid" value="{{ Auth::user()->id }}">
    {{-- endregion If Authenticated --}}

    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Bulk Document Routing
                </h2>
                <p class="text-muted">Create and send multiple document routing slips at once with the same destination offices.</p>
            </div>
        </div>

        {{-- Notification area --}}
        <div class="row" style="position: fixed; top: 70px; right: 20px; z-index: 9999;">
            <div class="col-12 genDashNotifs"></div>
            <div class="col-12 addSendToListaddndocmsg"></div>
        </div>

        <form id="bulkDocForm" enctype="multipart/form-data">
            @csrf

            {{-- Shared Destination Offices Section --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="shared-destinations-info">
                        <h5><i class="fa fa-building" aria-hidden="true"></i> Destination Offices (Shared by All Documents)</h5>
                        <p class="mb-3">Select the offices that will receive ALL documents in this bulk submission.</p>

                        {{-- Search for offices --}}
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="sharedSendTo" class="form-label">Search Office</label>
                                <input type="text" class="form-control toUpperCase" id="sharedSendTo" placeholder="Type to search for offices...">
                                <div class="sharedPWB-searchResult mt-2"></div>
                            </div>
                        </div>

                        {{-- Selected offices display --}}
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Selected Offices:</label>
                                <div id="sharedSendToList" class="border rounded p-3 bg-white">
                                    <em class="text-muted">No offices selected yet</em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bulk Documents Container --}}
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5><i class="fa fa-file-text" aria-hidden="true"></i> Documents to Send</h5>
                        <button type="button" class="btn btn-success add-bulk-send-document-item">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Another Document
                        </button>
                    </div>
                </div>
            </div>

            <div class="bulk-send-document-items-container row">
                {{-- First document item (always present) --}}
                <div class="col-md-5 ms-1 bulk-item-set" data-item-index="1">
                    <div class="bulk-item-header">
                        <span class="item-number">Document #1</span>
                    </div>

                    <div class="row">
                        {{-- Document Date --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Document Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control doc-date" name="docs[0][doc_date]" required>
                        </div>

                        {{-- Document Classification --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Document Classification <span class="text-danger">*</span></label>
                            <input type="text" class="form-control toUpperCase doc-class-name searchClassSlug" name="docs[0][class_name]" placeholder="Type to search..." required>
                            <input type="hidden" class="doc-class-slug" name="docs[0][class_slug]">
                            <div class="searchResultClassSlug mt-2"></div>
                        </div>

                        {{-- Document Number --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Document Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control toUpperCase doc-no" name="docs[0][doc_no]" placeholder="e.g., DENR-2024-001" title="Document number will be generated automatically" required readonly>
                        </div>

                        {{-- Confidential --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confidential <span class="text-danger">*</span></label>
                            <select class="form-select doc-confidential" name="docs[0][confidential]" required>
                                <option value="">Select...</option>
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>

                        {{-- Compliance Deadline (Optional) --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Compliance Deadline (Optional)</label>
                            <input type="date" class="form-control doc-compliance-deadline" name="docs[0][compliance_deadline]">
                        </div>

                        {{-- Application Type --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Application Type <span class="text-danger">*</span></label>
                            <select class="form-select doc-app-type" name="docs[0][app_type_uuid]" required>
                                <option value="">Select Application Type...</option>
                                {{-- Will be populated via AJAX --}}
                            </select>
                            <input type="hidden" class="doc-transac-uuid" name="docs[0][transac_uuid]">
                        </div>

                        {{-- Subject --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Subject <span class="text-danger">*</span></label>
                            <textarea class="form-control toUpperCase doc-subject" name="docs[0][subject]" rows="3" placeholder="Enter document subject..." required></textarea>
                        </div>

                        {{-- Attachment Remarks --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Attachment Remarks (Optional)</label>
                            <textarea class="form-control toUpperCase doc-atch-remarks" name="docs[0][atch_remarks]" rows="2" placeholder="Enter any attachment remarks..."></textarea>
                        </div>

                        {{-- File Uploads --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">File Attachments (Optional)</label>
                            <input type="file" class="form-control doc-file-uploads" name="docs[0][files][]" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                            <small class="text-muted">You can upload multiple files. Accepted formats: PDF, JPG, PNG, DOC, DOCX</small>
                            <div class="file_list mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-bulk-submit">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit All Documents
                    </button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="confirmReload()">
                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Form
                    </button>

                </div>
            </div>
        </form>
    </div>

    {{-- region general queries --}}
    <script>
        function confirmReload() {
            if (confirm("Are you sure you want to reset the form? This will reload the page.")) {
                window.location.reload();
            }
        }
        window.onbeforeunload = function() {
            return "Are you sure you want to leave? Unsaved changes may be lost.";
        };

        $(function() {
            // Set the current date as the default value
            $('.doc-date').val(getCurrentDate());

            // region get current date
            function getCurrentDate() {
                const currentDate = new Date();
                const year = currentDate.getFullYear();
                const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
                const day = currentDate.getDate().toString().padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
            // endregion get current date

            let itemCounter = 1;
            let sharedOffices_selected = []; // Stores shared destination offices
            let bulkdoctransacuuid = null;

            // region Load Application Types on page load
            $.ajax({
                url: "/get-app-transact-type",
                method: "GET",
                success: function(response) {
                    let options = '<option value="">Select Application Type...</option>';
                    $.each(response.app_type, function(index, item) {
                        options += '<option value="' + item.app_uuid + '" data-transac_uuid="' + item.transac_uuid + '"' +
                            (index === 0 ? ' selected' : '') + '>' + item.applicant + '</option>';
                    });
                    $('.doc-app-type').html(options);

                    // 🔹 After setting options, also set hidden transac_uuid
                    $('.doc-app-type').each(function() {
                        let transac_uuid = $(this).find(':selected').data('transac_uuid');
                        $(this).closest('.bulk-item-set').find('.doc-transac-uuid').val(transac_uuid);
                        bulkdoctransacuuid = transac_uuid;
                    });
                }
            });
            // endregion Load Application Types

            // region Get transaction UUID when app type changes
            $(document).on('change', '.doc-app-type', function() {
                let transac_uuid = $(this).find(':selected').data('transac_uuid');
                $(this).closest('.bulk-item-set').find('.doc-transac-uuid').val(transac_uuid);
            });
            // endregion Get transaction UUID

            // region SHARED OFFICE SEARCH - Search for offices to add as destinations
            $('#sharedSendTo').keyup(function() {
                let search = $(this).val();
                if (search.length >= 2) {
                    $.ajax({
                        url: "/get-user-office-bulk", // <-- updated endpoint
                        method: "GET",
                        data: {
                            search: search,
                            type: 1
                        }, // <-- pass type=1
                        success: function(r) {
                            $('.sharedPWB-searchResult').empty();
                            if (r.length > 0) {
                                $.each(r, function(key, value) {
                                    if (!sharedOffices_selected.includes(value.uuid)) {
                                        $('.sharedPWB-searchResult').append(
                                            '<button type="button" ' +
                                            '   class="btn btn-sm btn-outline-primary m-1 btnsharedOfficeSelect" ' +
                                            '   data-id="' + value.id + '" ' +
                                            '   data-uuid="' + value.uuid + '" ' +
                                            '   data-office="' + value.office + '" ' +
                                            '   data-full-office-name="' + value.full_office_name + '">' +
                                            '   ' + value.full_office_name +
                                            '</button>'
                                        );
                                    }
                                });
                            } else {
                                $('.sharedPWB-searchResult').html('<p class="text-muted">No offices found</p>');
                            }
                        }
                    });
                } else {
                    $('.sharedPWB-searchResult').empty();
                }
            });

            // Select shared office
            $(document).on('click', '.btnsharedOfficeSelect', function() {
                let id = $(this).data('id');
                let uuid = $(this).data('uuid');
                let office = $(this).data('office');
                let full_office_name = $(this).data('full-office-name');

                sharedOffices_selected.push(uuid);

                if ($('#sharedSendToList em').length) {
                    $('#sharedSendToList').empty();
                }

                $('#sharedSendToList').append(
                    '<div class="sharedSendToListItem d-flex justify-content-between align-items-center p-2 mb-2 border rounded bg-light">' +
                    '   <div>' +
                    '       <strong>' + full_office_name + '</strong>' +
                    '       <input type="hidden" name="shared_offices[' + uuid + '][id]" value="' + id + '">' +
                    '       <input type="hidden" name="shared_offices[' + uuid + '][uuid]" value="' + uuid + '">' +
                    '       <input type="hidden" name="shared_offices[' + uuid + '][office]" value="' + office + '">' +
                    '   </div>' +
                    '   <button type="button" ' +
                    '       class="btn btn-sm btn-danger btnListItemRemove_shared" ' +
                    '       data-target="sharedSendToListItem" ' +
                    '       data-key="' + uuid + '">' +
                    '       <i class="fa fa-times" aria-hidden="true"></i>' +
                    '   </button>' +
                    '</div>'
                );

                $('.sharedPWB-searchResult').empty();
                $('#sharedSendTo').val('');
            });

            // Remove shared office
            $(document).on('click', '.btnListItemRemove_shared', function() {
                let uuid = $(this).data('key');
                const indexToRemove = sharedOffices_selected.indexOf(uuid);
                if (indexToRemove !== -1) {
                    sharedOffices_selected.splice(indexToRemove, 1);
                }
                $(this).closest('.sharedSendToListItem').remove();

                if ($('#sharedSendToList').children().length === 0) {
                    $('#sharedSendToList').html('<em class="text-muted">No offices selected yet</em>');
                }
            });
            // endregion SHARED OFFICE SEARCH

            // region DOCUMENT CLASSIFICATION SEARCH
            $(document).on('keyup', '.searchClassSlug', function() {
                let search = $(this).val();
                let $container = $(this).closest('.bulk-item-set');
                let $resultDiv = $container.find('.searchResultClassSlug');

                if (search.length >= 2) {
                    $.ajax({
                        url: "/get-class-slug-bulk",
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        data: {
                            search: search
                        },
                        success: function(r) {
                            $resultDiv.empty();
                            if (r.length > 0) {
                                $.each(r, function(key, value) {
                                    $resultDiv.append(
                                        '<button type="button" ' +
                                        '   class="btn btn-sm btn-outline-secondary m-1 btnClassSelect" ' +
                                        '   data-slug="' + value.slug + '" ' +
                                        '   data-class="' + value.description + '">' +
                                        '   ' + value.description +
                                        '</button>'
                                    );
                                });
                            } else {
                                $resultDiv.html('<p class="text-muted">No classifications found</p>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    $resultDiv.empty();
                }
            });

            // Select classification
            $(document).on('click', '.btnClassSelect', function() {
                let slug = $(this).data('slug');
                let className = $(this).data('class');
                let $container = $(this).closest('.bulk-item-set');

                // set classification fields inside this bulk item
                $container.find('.doc-class-name').val(className);
                $container.find('.doc-class-slug').val(slug);
                $container.find('.searchResultClassSlug').empty();

                // data for doc number
                let office_origin = "",
                    uId = $('.auth_userid').val();

                // Get the current date/time
                let date = new Date();
                let year = date.getFullYear();
                let month = (date.getMonth() + 1).toString().padStart(2, '0');
                let day = date.getDate().toString().padStart(2, '0');
                let hour = date.getHours().toString().padStart(2, '0');
                let minute = date.getMinutes().toString().padStart(2, '0');
                let second = date.getSeconds().toString().padStart(2, '0');

                let formattedDate = `${year}.${month}.${day}`;
                let formattedTime = `${hour}.${minute}.${second}`;

                $.ajax({
                    url: "/get-user-office",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function(r) {
                        if (r.success) {
                            office_origin = r.user_office;

                            if (office_origin !== "" && slug !== "") {
                                let generated_doc_no = office_origin + '-' + slug + '-' + formattedDate + '-' + uId + formattedTime;
                                // target the correct doc-no input inside this bulk item
                                $container.find('.doc-no').val(generated_doc_no.toUpperCase());
                            }
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
            // endregion DOCUMENT CLASSIFICATION SEARCH

            // region ADD BULK DOCUMENT ITEM
            $('.add-bulk-send-document-item').click(function(e) {
                e.preventDefault();
                itemCounter++;

                let bulkcurrentDate = getCurrentDate();

                $('.bulk-send-document-items-container').append(`
                    <div class="col-md-5 ms-1 bulk-item-set" data-item-index="${itemCounter}">
                        <div class="bulk-item-header">
                            <span class="item-number">Document #${itemCounter}</span>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger btn-remove-bulk-item" title="Remove this item">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Document Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control doc-date" name="docs[${itemCounter - 1}][doc_date]" value="${bulkcurrentDate}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Document Classification <span class="text-danger">*</span></label>
                                <input type="text" class="form-control toUpperCase doc-class-name searchClassSlug" 
                                       name="docs[${itemCounter - 1}][class_name]" placeholder="Type to search..." required>
                                <input type="hidden" class="doc-class-slug" name="docs[${itemCounter - 1}][class_slug]">
                                <div class="searchResultClassSlug mt-2"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Document Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control toUpperCase doc-no" 
                                       name="docs[${itemCounter - 1}][doc_no]" placeholder="e.g., DENR-2024-001"  title="Document number will be generated automatically" required readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confidential <span class="text-danger">*</span></label>
                                <select class="form-select doc-confidential" name="docs[${itemCounter - 1}][confidential]" required>
                                    <option value="">Select...</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Compliance Deadline (Optional)</label>
                                <input type="date" class="form-control doc-compliance-deadline" 
                                       name="docs[${itemCounter - 1}][compliance_deadline]">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Application Type <span class="text-danger">*</span></label>
                                <select class="form-select doc-app-type" name="docs[${itemCounter - 1}][app_type_uuid]" required>
                                    ${$('.doc-app-type').first().html()}
                                </select>
                                <input type="hidden" class="doc-transac-uuid" name="docs[${itemCounter - 1}][transac_uuid]" value="${bulkdoctransacuuid}">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Subject <span class="text-danger">*</span></label>
                                <textarea class="form-control toUpperCase doc-subject" name="docs[${itemCounter - 1}][subject]" 
                                          rows="3" placeholder="Enter document subject..." required></textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Attachment Remarks (Optional)</label>
                                <textarea class="form-control toUpperCase doc-atch-remarks" name="docs[${itemCounter - 1}][atch_remarks]" 
                                          rows="2" placeholder="Enter any attachment remarks..."></textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">File Attachments (Optional)</label>
                                <input type="file" class="form-control doc-file-uploads" name="docs[${itemCounter - 1}][files][]" 
                                       multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                <small class="text-muted">You can upload multiple files. Accepted formats: PDF, JPG, PNG, DOC, DOCX</small>
                                <div class="file_list mt-2"></div>
                            </div>
                        </div>
                    </div>
                `);

                // Update item numbers
                updateItemNumbers();
            });

            // Remove bulk item
            $(document).on('click', '.btn-remove-bulk-item', function(e) {
                e.preventDefault();
                $(this).closest('.bulk-item-set').remove();
                updateItemNumbers();
            });

            // Update item numbers after add/remove
            function updateItemNumbers() {
                $('.bulk-item-set').each(function(index) {
                    $(this).attr('data-item-index', index + 1);
                    $(this).find('.item-number').text('Document #' + (index + 1));
                });
                itemCounter = $('.bulk-item-set').length;
            }
            // endregion ADD BULK DOCUMENT ITEM

            // region SUBMIT BULK FORM
            $('.btn-bulk-submit').click(function(e) {
                e.preventDefault();

                // Validate shared offices
                if (sharedOffices_selected.length === 0) {
                    $('.addSendToListaddndocmsg').html(
                        '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert">' +
                        '    <strong>No destination offices selected!</strong> Please select at least one office.' +
                        '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                    return false;
                }

                // Validate all required fields
                let isValid = true;
                $('.bulk-item-set').each(function() {
                    $(this).find('[required]').each(function() {
                        if ($(this).val() === '' || $(this).val() === null) {
                            $(this).css('border-color', 'red');
                            isValid = false;
                        }
                    });
                });

                if (!isValid) {
                    $('.genDashNotifs').html(
                        '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>Please fill in all required fields for all documents.</strong>' +
                        '</div>'
                    );
                    return false;
                }

                // Submit form
                let form = $('#bulkDocForm')[0];
                let submitForm = new FormData(form);

                $.ajax({
                    url: "/insert-bulk-docs",
                    method: "POST",
                    data: submitForm,
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            console.log(response);
                            $('.genDashNotifs').html(
                                '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    <strong>Success!</strong> ' + response.total + ' document(s) submitted successfully.' +
                                '    <br><small>Successfully created: ' + response.successful + ' | Failed: ' + response.failed + '</small>' +
                                '</div>'
                            );

                            // Reset form after successful submission
                            setTimeout(function() {
                                window.location.reload();
                            }, 3000);
                        } else {
                            console.log(response);
                            $('.genDashNotifs').html(
                                '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    <strong>Error!</strong> Bulk submission failed. Please try again.' +
                                '</div>'
                            );
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        $('.genDashNotifs').html(
                            '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                            '    <strong>Error!</strong> An error occurred during submission.' +
                            '</div>'
                        );
                    }
                });
            });
            // endregion SUBMIT BULK FORM
        });
    </script>
    {{-- endregion general queries --}}
@endsection
