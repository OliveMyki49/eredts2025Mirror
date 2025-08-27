{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTReleased" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead style="border-bottom: 1px solid #000;">
        <tr>
            <th>ID</th>
            <th>Document No.</th>
            <th>Subject</th>
            <th>Action Taken</th>
            <th>Document Attachments</th>
            <th>Action Attachments</th>
            <th>Application Type</th>
            <th>Sent By</th>
            <th>Date & Time Released</th>
            <th>TimeStamp Update</th>
            <th>Status & Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Document No.</th>
            <th>Subject</th>
            <th>Action Taken</th>
            <th>Document Attachments</th>
            <th>Action Attachments</th>
            <th>Application Type</th>
            <th>Sent By</th>
            <th>Date & Time Released</th>
            <th>TimeStamp Update</th>
            <th>Status & Action</th>
        </tr>
    </tfoot>
    <tbody style="height: 200px">
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region view doc attachment modal --}}
<div class="modal fade" id="vDocAtchRlsdModal" tabindex="-1" aria-labelledby="vDocAtchRlsdLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDocAtchRlsdLabel">Document Attachment: <b><u><span class="vDocAtchRlsdNameReceived fs-6"></span></u></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px; overflow-y: scroll;">
                <div class="vDocAtchRlsdCollection"></div>
                <embed id="vDocAtchRlsdIframe" name="vDocAtchRlsdIframe" width="100%" height="80%" style="background:url(../assets/img/denrloadsmaller.webp) center center no-repeat;">
                <div class="vDocAtchRlsd_other_req_inputs"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view doc attachment modal --}}

{{-- region view Document Info View --}}
<div class="modal fade" id="vDIRlsdModal" tabindex="-1" aria-labelledby="vDIRlsdLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDIRlsdLabel">DOCUMENT INFORMATION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="text-center fs-3 border border-3 vDIRlsdheader-status">
                STATUS UNKNOWN
            </div>

            <div class="modal-body p-0">

                {{-- region accordian --}}
                <div class="accordion" id="vDIRlsd_accordian">
                    {{-- GENERAL INFORMATION --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#vDIRlsd_collapsible_gen_info" aria-expanded="true" aria-controls="vDIRlsd_collapsible_gen_info">
                                GENERAL INFORMATION
                            </button>
                        </h2>
                        <div id="vDIRlsd_collapsible_gen_info" class="accordion-collapse collapse" data-bs-parent="#vDIRlsd_accordian">
                            <div class="accordion-body">
                                <div class="row vDIRlsd-content">
                                    {{-- Document Info Contents generated here --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- DOCUMENT REMARKS AND ATTACHMENTS --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIRlsd_collapsible_req_info" aria-expanded="false" aria-controls="vDIRlsd_collapsible_req_info">
                                DOCUMENT REMARKS AND ATTACHMENTS
                            </button>
                        </h2>
                        <div id="vDIRlsd_collapsible_req_info" class="accordion-collapse collapse" data-bs-parent="#vDIRlsd_accordian">
                            <div class="accordion-body">
                                <div class="row vDIRlsd_doc_inpts">
                                    --- no other information ---
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- PAYMENT STATUS ==================================================================================================> HIDE --}}
                    <div class="accordion-item" style="display: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIRlsd_collapsible_pymnt_stat" aria-expanded="false" aria-controls="vDIRlsd_collapsible_pymnt_stat">
                                PAYMENT STATUS
                            </button>
                        </h2>
                        <div id="vDIRlsd_collapsible_pymnt_stat" class="accordion-collapse collapse" data-bs-parent="#vDIRlsd_accordian">
                            <div class="accordion-body">
                                {{-- region order of payment --}}
                                <div class="row">
                                    <div class="col">
                                        <hr>
                                        <a class="btn btn-outline-primary btn-sm btn-view-order-of-payment" href="" target="_blank" tooltip="View order of payment" flow="right">
                                            View order of payment
                                        </a>

                                        <div class="row m-3 border border-secondary">
                                            <div class="col-12 pt-3 px-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="fs-6 fw-bold">Uploaded order of payment and/or receipt preview</span>
                                                        <hr style="margin: 10px 0;">
                                                    </div>
                                                    <div class="col-md px-5 mb-3">
                                                        <label for="none" class="vDIRlsd_ofp_signed_link"></label><br>
                                                        <label for="none" class="vDIRlsd_cli_rcpt_link"></label>
                                                        <div class="vDIRlsd-ofp-and-rcpt-uploads"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-3 border border-secondary">
                                            <div class="col-12 pt-3 px-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span class="fs-6 fw-bold">Cost Preview</span>
                                                    </div>

                                                    {{-- per bill only visible for credit and accounting officer --}}
                                                    @php
                                                        $acc_id = Auth::user()->access_id;
                                                    @endphp
                                                    @if ($acc_id == 10 || $acc_id == 11 || $acc_id == 12 || $acc_id == 14)
                                                        <div class="col-6">
                                                            <div class="row pe-4">
                                                                <div class="p-0 col-2 text-end">Per Bill No.: &nbsp;</div>
                                                                <div class="p-0 col-3 border-bottom border-dark fw-bold vDIRlsd_per_bill_no"></div>
                                                                <div class="p-0 col-1"></div>
                                                                <div class="p-0 col-2 text-end">Dated: &nbsp;</div>
                                                                <div class="p-0 col-4 border-bottom border-dark fw-bold vDIRlsd_per_bill_no_dated"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6"></div>
                                                        {{-- <div class="col-6 text-primary p-1">Note: <b>per bill no.</b> is only visible for credit and accounting officer</div> --}}
                                                    @endif
                                                </div>
                                                <hr style="margin: 10px 0;">
                                            </div>
                                            <div class="col-12 px-5 vDIRlsd_prev_cost_breakdown"></div>
                                            <div class="col-12 px-5 pb-3 vDIRlsd_prev_ttl_cost"></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- endregion order of payment --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion accordian --}}

                {{-- region document status --}}
                <div class="row mt-3 mx-3 px-3">
                    <div class="col p-3 rounded border shadow">
                        <span class="fs-6 fw-bold">DOCUMENT STATUS</span>
                        <hr>
                        <div style="overflow: auto">
                            <table class="table table-striped table-bordered table-sm">
                                <tbody class="tbody-viewDocInfoReleased-doc_status">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 mx-3 px-3">
                    <div class="col p-3 rounded border shadow">
                        <span class="fs-6 fw-bold">Total Turn Around Time</span>
                        <hr>
                        <div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIRlsd_ttlDays_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIRlsd_ttlHours_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIRlsd_ttlMinutes_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIRlsd_ttlSeconds_ttl_tat btn btn-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion document status --}}

                <div class="row m-3 text-center">
                    <button class="btn btn-outline-primary border-0 vDIRlsdscrollToTop">Return to top</button>
                    <script>
                        $(document).ready(function() {
                            $('.vDIRlsdscrollToTop').click(function() {
                                $('#vDIRlsdModal').scrollTop(0);
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
</div>
{{-- endregion view Document Info View --}}

{{-- region table data loadder --}}
@if (request()->has('active_tab'))
    @php
        $active_tab = request()->input('active_tab');
    @endphp
    <input type="hidden" id="dTReleased_loader" @if ($active_tab == 'tabReleased') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTReleased_func() {
            // Setup - add a text input to each footer cell
            $('#dTReleased tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTReleased').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-clientReqReleased",
                    "type": "POST",
                    "headers": {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    async: true,
                    error: function(xhr, error, code) {
                        console.log(xhr, code);
                    }
                },
                deferRender: true,
                'language': {
                    'loadingRecords': '&nbsp;',
                    'processing': '<img src="{{ url('/assets/img/denrloadsmaller.webp') }}" class="mt-2" alt="main_logo" width="100px" height="100px" style="margin-bottom: -40pt">'
                },
                columns: [
                    /* column 0 : id */
                    {
                        data: 'id',
                    },
                    /* column 1 : doc_no */
                    {
                        data: 'doc_no',
                        render: function(data, typw, row) {
                            return '<a' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   class="btn-fetchdocInfo_vDIRlsd dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#vDIRlsdModal"' +
                                '   data-action_id="' + row['id'] + '"' +
                                '   data-action_uuid="' + row['uuid'] + '"' +
                                '   data-doc_id="' + row['doc_id'] + '"' +
                                '   data-doc_uuid="' + row['doc_uuid'] + '"' +
                                '>' + row['doc_no'] + '</a>';
                        }
                    },
                    /* column 2 : subject */
                    {
                        data: 'subject',
                        render: function(data, type, row) {
                            return '<span class="text-primary text-uppercase">' + row['class_slug'] + '</span>: ' + (row['subject']).toUpperCase();
                        }
                    },
                    /* column 3 : action_remarks */
                    {
                        data: 'action_remarks',
                        render: function(data, type, row) {
                            let action_remarks = row['action_remarks'];
                            disp = '';
                            if (action_remarks == null) {
                                disp = '<span class="text-danger text-uppercase">NO ACTION TAKEN YET</span>';
                            } else {
                                disp = action_remarks.toUpperCase();
                            }

                            return disp;
                        }
                    },
                    /* column 4 : Doc Attachments */
                    {
                        data: 'req_attachments',
                        render: function(data, type, row) {
                            let req_attachments = row['req_attachments'];
                            let disp = '';
                            let file_names = '';
                            let count = 1;

                            req_attachments.forEach(dt => {
                                disp += '' +
                                    '<span ' +
                                    '   class="btnvDIRlsd-viewDocAtch mb-1" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDocAtchRlsdModal"' +
                                    '   data-file_type="doc" ' +
                                    '   data-doc_id="' + row['id'] + '" ' + // this is the id of action but named doc id because there is action id for attachment below
                                    '   data-real_doc_id="' + row['doc_id'] + '" ' + // real document id
                                    '   data-doc_file_path="' + dt.file_path + '" ' +
                                    '   data-doc_file_name="' + dt.file_name + '" ' +
                                    '   tooltip="' + dt.file_name + '" ' +
                                    '   flow="right" ' +
                                    '>' +
                                    '   <span class="text-primary">' + count + '. </span> F' + dt.app_form_no + '-' + (dt.slug).toUpperCase() +
                                    '</span>';
                                file_names += dt.file_name + ',';
                                count += 1;
                            });

                            if (req_attachments.length == 0) {
                                disp += '' +
                                    '<span class="text-danger">' +
                                    '   No Attachments Found' +
                                    '</span>';
                            }

                            let req_atchs_collapsible = '' +
                                '<p class="d-inline-flex gap-1">' +
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#doc_clps_atch_DIRlsd' + row['id'] + '" role="button" aria-expanded="false" aria-controls="doc_clps_atch_DIRlsd' + row['id'] + '">' +
                                '        SHOW FILES' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="doc_clps_atch_DIRlsd' + row['id'] + '">' +
                                '    <div class="card card-body">' +
                                '       ' + disp +
                                '    </div>' +
                                '</div>' +
                                '';

                            if (req_attachments.length == 0) {
                                req_atchs_collapsible = '' +
                                    '    <a class="fs-6 text-danger">' +
                                    '        NO ATTACHMENT/S' +
                                    '    </a>';
                            }

                            return '' +
                                '<div class="row ps-1">' +
                                '   <div class="col">' +
                                '       ' + req_atchs_collapsible +
                                '       <input type="hidden" id="vDIRlsddoc_fileCollection' + row['id'] + '" value="' + file_names + '">' +
                                '   </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* column 5 : Action Attachments */
                    {
                        data: 'act_attachments',
                        render: function(data, type, row) {
                            let attachment_remarks = (row['attachment_remarks'] != null ? row['attachment_remarks'] + '<br>' : '');
                            let act_attachments = row['act_attachments'];
                            let disp = '';
                            let file_names = '';
                            let count = 1;

                            act_attachments.forEach(dt => {
                                disp += '' +
                                    '<span ' +
                                    '   class="btnvDIRlsd-viewDocAtch" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDocAtchRlsdModal"' +
                                    '   data-file_type="act" ' +
                                    '   data-act_id="' + row['id'] + '" ' +
                                    '   data-act_file_path="' + dt.file_path + '" ' +
                                    '   data-act_file_name="' + dt.file_name + '" ' +
                                    '>' +
                                    '   <span class="text-primary">' + count + '. </span>' + (dt.remarks).toUpperCase() +
                                    '</span>';
                                file_names += dt.file_name + ',';
                                count += 1;
                            });

                            let req_atchs_collapsible = '' +
                                '<p class="d-inline-flex gap-1">' +
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#act_clps_atch_DIRlsd' + row['id'] + '" role="button" aria-expanded="false" aria-controls="act_clps_atch_DIRlsd' + row['id'] + '">' +
                                '        SHOW FILES' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="act_clps_atch_DIRlsd' + row['id'] + '">' +
                                '    <div class="card card-body">' +
                                '       ' + disp +
                                '    </div>' +
                                '</div>' +
                                '';

                            if (act_attachments.length == 0) {
                                if (attachment_remarks == '') {
                                    disp += '' +
                                        '<span class="text-danger">' +
                                        '   No Attachments Found' +
                                        '</span>';

                                    req_atchs_collapsible = '' +
                                        '    <a class="fs-6 text-danger">' +
                                        '        NO ATTACHMENT/S' +
                                        '    </a>';
                                }
                            }

                            return '' +
                                '<div class="row ps-1">' +
                                '   <div class="col">' +
                                '       ' + attachment_remarks +
                                '       ' + req_atchs_collapsible +
                                '       <input type="hidden" id="vDIRlsdact_fileCollection' + row['id'] + '" value="' + file_names + '">' +
                                '   </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* column 6 : application_type */
                    {
                        data: 'applicant',
                        render: function(data, type, row) {
                            return (row['applicant']).toUpperCase();
                        }
                    },
                    /* column 7 : sender */
                    {
                        data: 'sender_type',
                        render: function(data, type, row) {
                            let sender = row['sender_username'];
                            let sender_type = row['sender_type'];

                            sender_UpC = (sender != null ? sender.toUpperCase() + '<br>' : '');
                            sender_type_UpC = (row['sender_type']).toUpperCase();

                            return sender_UpC + '(' + sender_type_UpC + ')';
                        }
                    },
                    /* column 8 : created at */
                    {
                        data: 'created_at',
                        render: function(data, type, row) {
                            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            const d = new Date(row['created_at']);
                            let month = months[d.getMonth()];
                            return '' +
                                '' + month.toUpperCase() + ' ' + d.getDate() + ', ' + d.getFullYear() +
                                '<br>' + d.getHours() + ':' + (d.getMinutes() >= 10 ? d.getMinutes() : '0' + d.getMinutes()) +
                                '';
                        }
                    },
                    /* column 9 : updated at */
                    {
                        data: 'updated_at',
                    },
                    /* column 10 : status & action */
                    {
                        data: 'updated_at',
                        render: function(data, type, row) {
                            let releasing_route = row['releasing_route'];

                            let receiving_break = '';
                            let receiving_office = '';
                            let received_status = '';
                            let disp_received_status = '';
                            if (releasing_route != null) {
                                //this will only allow last sent transaction to a recipient to be displayed
                                releasing_route.forEach(dt => {
                                    if (dt.received_id != null) {
                                        if (dt.act_seen_id == null) { //if seen is null, then it is not yet seen
                                            received_status = '<span class="text-success fw-bold"><i class="fa fa-envelope" aria-hidden="true"></i> Received</span>';
                                        } else { //if seen is not null, then it is already seen
                                            received_status = '<span class="text-success fw-bold"><i class="fa fa-envelope-open" aria-hidden="true"></i> Received (Seen)</span>';
                                        }
                                    } else {
                                        received_status = '<span class="text-warning fw-bold" style="text-shadow: -1px -1px 0 #8b6800, 1px -1px 0 #8b6800, -1px 1px 0 #8b6800, 1px 1px 0 #8b6800;"><i class="fa fa-plane" aria-hidden="true"></i>  In-Transit</span>';
                                    }

                                    if (row['doc_archived'] == true) {
                                        received_status = '<span class="text-secondary fw-bold"><i class="fa fa-archive" aria-hidden="true"></i> Archived</span>';
                                    }
                                    receiving_office += dt.send_to_abbrv;

                                    disp_received_status = '<div class="text-center border text-secondary"> ' + receiving_office + ' ' + received_status + '</div>';
                                });
                            }else{
                                disp_received_status = '<div class="text-center border text-secondary"> ACTION PERFOMED OFFLINE</div>';
                            }

                            let more_info = '' +
                                '<a' +
                                '   style="cursor: pointer" ' +
                                '   class="btn-fetchdocInfo_vDIRlsd dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#vDIRlsdModal"' +
                                '   data-action_id="' + row['id'] + '"' +
                                '   data-action_uuid="' + row['uuid'] + '"' +
                                '   data-doc_id="' + row['doc_id'] + '"' +
                                '   data-doc_uuid="' + row['doc_uuid'] + '"' +
                                '>' +
                                '   <i class="fa fa-info-circle" aria-hidden="true"></i> Show more details' +
                                '</a>' +
                                '';

                            let showRoutingSlip = ''; //show or allow users view public documents when the request is already approved
                            let showPubDocs = ''; //show or allow users view public documents when the request is already approved
                            if (row['doc_no'] != 'unset') {
                                showRoutingSlip = '<li><a class="dropdown-item" href="/grsid/' + row['doc_uuid'] + '" target="_blank" ><i class="fa fa-map-marker" aria-hidden="true"></i> Show routing slip</a></li>';
                            } else {
                                showRoutingSlip = '<li><a class="dropdown-item bg-secondary-subtle"><i class="fa fa-map-marker" aria-hidden="true"></i> Routing slip not Available<br><sup>(Request not yet approved)</sup></a></li>';
                            }

                            //check if synced
                            let synced = row['downloaded'] != null ? ' <spanc class="badge bg-success text-white  mb-1 me-2" >SYNCED</spanc> ' : ' <spanc class="badge bg-danger text-white  mb-1 me-2 badge-status-overdue" >NOT YET SYNCED</spanc> ';

                            let dropdownMenu = '' +
                                '<div class="mb-1">' + synced + disp_received_status + '</div>' + 
                                '<div class="dropdown">' +
                                '    <div ' +
                                '       data-bs-toggle="dropdown" ' +
                                '       aria-expanded="false" ' +
                                '       style="cursor: pointer" ' +
                                '       onMouseOut="this.style.color=`#000`" ' +
                                '       onMouseOver="this.style.color=`#0d6efd`" ' +
                                '    >' +
                                '        <span class="btn btn-sm btn-outline-primary" style="font-size: 13px;">ACTION</span>' +
                                '       ' +
                                '    </div>' +
                                '    <ul class="dropdown-menu">' +
                                '        <li>' + more_info + '</li>' +
                                '       ' + showRoutingSlip +
                                '       ' + showPubDocs +
                                '    </ul>' +
                                '</div>' +
                                '';

                            return dropdownMenu;
                        }
                    },
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                columnDefs: [{
                        width: '5%',
                        targets: [0],
                        visible: false,
                    },
                    {
                        targets: [6, 7, 8, 9],
                        visible: false,
                    }
                ],
                /* reason for disabling: Causes error for dropdown will overlap */
                /* fixedColumns: {
                    left: 1
                }, */
                order: [
                    [9, 'desc'] /* update by last updated action */
                ],
                lengthChange: true,
                "pageLength": 10,
                dom: 'Bprtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: `RELEASED CLIENT REQUESTS ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print <i class="fa fa-print" aria-hidden="true"></i>',
                        exportOptions: {
                            columns: ':visible'
                        },
                        customize: function(win) {
                            // Add a <style> tag to the <head> element
                            $('head', win.document).append(
                                '<style> ' +
                                '   thead{ ' +
                                '       content: " "; ' +
                                '       position: relative; ' +
                                '       z-index: -1; ' +
                                '       background: linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.9)), url("{{ asset('assets/img/logo.webp') }}"); ' +
                                '       background-repeat: no-repeat; background-position: bottom; background-size: 1%;' +
                                '   }' +
                                '   thead::before{ ' +
                                '       content: " "; ' +
                                '       position: absolute; ' +
                                '       width: 100%; ' +
                                '       height: 1000px; ' +
                                '       z-index: -1; ' +
                                '       background: linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.9)), url("{{ asset('assets/img/logo.webp') }}"); ' +
                                '       background-repeat: no-repeat; ' +
                                '       background-position: top; ' +
                                '       background-size: 50%;' +
                                '   }' +
                                '   @media print {' +
                                '       body { ' +
                                '           zoom: 60%;' +
                                '           background-color: #ffffff;' +
                                '       }' +
                                '   }' +
                                '</style>'
                            );
                            $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                            let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                            let currentDate = new Date();
                            let formattedDate = months[currentDate.getMonth()] + ' ' + currentDate.getDate() + ', ' + currentDate.getFullYear();
                            let auth_username = $('#auth_username').val();
                            $(win.document.body).find('h1').text('');
                            $(win.document.body).find('h1').parent().prepend('' +
                                '<div style="text-align: center; font-size: 15pt;">' +
                                '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/logo.webp') }}" > ' +
                                '   <span style="display: inline-block;  vertical-align:middle; font-size: 20px;">' +
                                '      Republic of The Philippines<br> ' +
                                '      <b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</b><br> ' +
                                '      Regional Center Site, Rawis, Legazpi City<br> ' + formattedDate + ' <br><br>' +
                                '      <h2>RELEASED CLIENT REQUESTS</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTReleased thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTReleased tbody').clone());
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'COPY <i class="fa fa-clipboard" aria-hidden="true"></i>',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis',
                    {
                        // Custom Search Button
                        text: '<input class="form-control form-control-sm border-0 dTReleased_search" type="text" placeholder="Search (Click to refresh)">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTReleased_search').val();
                            dt.search(searchValue).draw();
                        }
                    }
                ],
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            let that = this;

                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
        }
        // endregion populate table

        /* region Call tab on click */
        let tabReleased = false;
        $('label[for=tabReleased]').click(function() {
            if (tabReleased == false) {
                dTReleased_func();
                tabReleased = true;
            }
        });

        if ($('#dTReleased_loader').val() == 'load') {
            if (tabReleased == false) {
                dTReleased_func();
                tabReleased = true;
            }
        }
        /* endregion Call tab on click */

        $('#dTReleased_wrapper .btn-group button').removeClass('btn-secondary').addClass('btn-outline-success');
    });
</script>
{{-- endregion populate table --}}

{{-- region queries --}}
<script>
    $(function() {
        // region view client id
        $('#dTReleased').on('click', '.btnvDIRlsd-viewClientId', function() {
            let username = $('#auth_username').val();
            let client_id = $(this).data('client_id');

            let iframeHref = '/get-clientId-view/' + username + '/' + client_id + '/';
            $('#vDocAtchRlsdClientIdIframe').attr('src', iframeHref);
            $('#vDocAtchRlsdreencryptId').val(client_id);
        });
        // endregion view client id

        // region view document attachment
        $('#dTReleased').on('click', '.btnvDIRlsd-viewDocAtch', function() {
            let username = $('#auth_username').val();
            let file_type = $(this).data('file_type');

            if (file_type == 'doc') {
                let id = $(this).data('doc_id'); // this is the id of action but named doc id because there is action id for attachment below
                let real_doc_id = $(this).data('real_doc_id'); // real document id
                let file_path = $(this).data('doc_file_path');
                let file_name = $(this).data('doc_file_name');
                let fileCollection = $('#dTReleased #vDIRlsddoc_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.vDocAtchRlsdCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.vDocAtchRlsdCollection').append(' <button class="btnvDIRlsd-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>')
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#vDocAtchRlsdIframe').attr('src');
                if (content1 != content2) {
                    $('.vDocAtchRlsdNameReceived').empty().append(file_name);
                    $('#vDocAtchRlsdIframe').attr('src', iframeHref + '#toolbar=0');
                }

                // region get other requestee input
                $('.vDocAtchRlsd_other_req_inputs').empty()
                $.ajax({
                    url: "get-other-cli-req-inputs/" + real_doc_id + "/",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(r) {
                        if (r.success) {
                            $('.vDocAtchRlsd_other_req_inputs').append('<hr><h6>Other Requestee Input:</h6><br>');

                            if (r.req_inputs.length >= 1) {
                                r.req_inputs.forEach(dt => {
                                    $('.vDocAtchRlsd_other_req_inputs').append('' +
                                        '<div class="row row-tab-leader">' +
                                        '   <div class="col-md-12 col-tab-leader">' +
                                        '       <div>' +
                                        '          <span>' + dt.req_title + '</span>' +
                                        '          <span> ' + dt.text_input + '</span>' +
                                        '       </div>' +
                                        '   </div>' +
                                        '</div>'
                                    );
                                });
                            } else {
                                $('.vDocAtchRlsd_other_req_inputs').append('' +
                                    '<div class="row row-tab-leader">' +
                                    '   <div class="col-md-12">' +
                                    '       - - NO OTHER REQUESTEE INPUT - -' +
                                    '   </div>' +
                                    '</div>'
                                );
                            }
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }

                });
                // endregion get other requestee input
            } else if (file_type == 'act') {
                let id = $(this).data('act_id');
                let file_path = $(this).data('act_file_path');
                let file_name = $(this).data('act_file_name');
                let fileCollection = $('#dTReleased #vDIRlsdact_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.vDocAtchRlsdCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.vDocAtchRlsdCollection').append(' <button class="btnvDIRlsd-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>')
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#vDocAtchRlsdIframe').attr('src');
                if (content1 != content2) {
                    $('.vDocAtchRlsdNameReceived').empty().append(file_name);
                    $('#vDocAtchRlsdIframe').attr('src', iframeHref + '#toolbar=0');
                }

                //remove content
                $('.vDocAtchRlsd_other_req_inputs').empty();
            }
        });
        // endregion view document attachment

        // region view document attachment collection
        $('.vDocAtchRlsdCollection').on('click', '.btnvDIRlsd-view-file', function() {
            let file_path = $(this).data('file_path');
            let file_name = $(this).data('file_name');

            let iframeHref = '/' + file_path + '/' + file_name;
            $('.vDocAtchRlsdNameReceived').empty().append(file_name);
            $('#vDocAtchRlsdIframe').attr('src', iframeHref + '#toolbar=0');
        });
        // endregion view document attachment collection

        // region document info
        $('#dTReleased').on('click', '.btn-fetchdocInfo_vDIRlsd', function() {
            console.clear();
            let action_id = $(this).data('action_id');
            let action_uuid = $(this).data('action_uuid');
            let doc_id = $(this).data('doc_id');
            let doc_uuid = $(this).data('doc_uuid');

            $.ajax({
                url: "/get-docInfos/" + doc_uuid + "/",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {

                        let doc_no = r.doc_info.doc_no;

                        // application type
                        let applicant = r.doc_info.applicant;

                        // transaction type
                        let transaction = r.doc_info.transaction;
                        let transaction_slug = r.doc_info.transaction_slug;

                        // agency
                        let agency = r.doc_info.agency;

                        // document classification
                        let class_slug = r.doc_info.class_slug;
                        let doc_class_full = r.doc_info.doc_class_full;

                        // doc inputs and attachmetns
                        let doc_attachments = r.doc_info.attachments;

                        // document type
                        let subclass_slug = r.doc_info.subclass_slug;
                        let doc_type_full = r.doc_info.doc_type_full;

                        // other
                        let remarks = r.doc_info.remarks;
                        let validated = r.doc_info.validated;
                        let compliance_deadline = r.doc_info.compliance_deadline;

                        // region status bar
                        if (validated != null) {
                            $('.vDIRlsdheader-status').empty().append('<i class="fa fa-check-circle" aria-hidden="true"></i> VERIFIED');
                            $('.vDIRlsdheader-status').removeClass('border-danger text-danger').addClass('border-success text-success');
                        } else {
                            $('.vDIRlsdheader-status').empty().append('<i class="fa fa-hourglass" aria-hidden="true"></i> NOT YET VERIFIED');
                            $('.vDIRlsdheader-status').removeClass('border-success text-success').addClass('border-danger text-danger');
                        }
                        // endregion status bar


                        $('.vDIRlsd-content').empty().append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Tracking No.: <br>' + (doc_no != 'unset' ? '<span class="fw-bold fs-6">' + doc_no + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT AVAILABLE</span>') + '</div>' +
                            '<div class="col-md-4 mb-2 fs-6">Compliance Date: <br>' + (compliance_deadline != null ? '<span class="fw-bold fs-6">' + compliance_deadline + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT AVAILABLE</span>') + '</div>' +
                            '<hr>' +
                            ''
                        );

                        $('.vDIRlsd-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Classification: <br><span class="fw-bold fs-6">' + doc_class_full.toUpperCase() + ' — (' + class_slug + ')</span></div>' +
                            ''
                        );

                        $('.vDIRlsd-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Application type: <br><span class="fw-bold fs-6">' + applicant.toUpperCase() + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Transaction Type: <br><span class="fw-bold fs-6">' + transaction.toUpperCase() + ' (' + transaction_slug + ')</span></div>' +
                            ''
                        );

                        $('#vDIRlsdremarks').val(remarks);

                        // region document attachments and inputs
                        let filecount = 0;
                        let inptcount = 0;
                        let app_doc_form_no = 0; //appform start from 0 
                        $('.vDIRlsd_doc_atch').empty(); // make sure to empty the list
                        $('.vDIRlsd_doc_inpts').empty(); // make sure to empty the list
                        doc_attachments.forEach(dt => {
                            if (dt.attachment_type == 'file') {
                                // file attachments
                                filecount += 1;
                                if (app_doc_form_no != dt.app_form_no) {
                                    $('.vDIRlsd_doc_inpts').append('' +
                                        '<div class="col-md-12 fs-6 mb-3"> ' +
                                        '   <hr>' +
                                        '   <span class="fw-bold"><i class="fa fa-file" aria-hidden="true"></i> Attachment Form ' + dt.app_form_no + '</span>: ' +
                                        '</div>' +
                                        ''
                                    );
                                    app_doc_form_no = dt.app_form_no;
                                }
                                $('.vDIRlsd_doc_inpts').append('' +
                                    '<a class="col-md-2 ms-3 mb-1 fs-6 border border-primary rounded" href="/' + dt.file_path + '/' + dt.file_name + '" target="_blank" tooltip="' + dt.file_name + '" flow="down"><i class="fa fa-file-o" aria-hidden="true"></i> ' + dt.req_slug + '</a>'
                                );
                            } else {
                                // field inputs
                                inptcount += 1;
                                $('.vDIRlsd_doc_inpts').append('' +
                                    '<div class="col-md-12 px-3 fs-6"> ' +
                                    '    <div class="row"> ' +
                                    '       <div class="col"> ' +
                                    '           <span class="fw-bold">' + dt.req_slug + '</span>: ' +
                                    '       </div> ' +
                                    '       <div class="col border-bottom border-dark"> ' +
                                    '           ' + dt.text_input +
                                    '       </div> ' +
                                    '    </div> ' +
                                    '    </div> ' +
                                    '</div>' +
                                    ''
                                );
                            }
                        });
                        if (filecount == 0) {
                            $('.vDIRlsd_doc_atch').append('' +
                                '--- no attachment found ---'
                            );
                        }
                        /* if (inptcount == 0) {
                            $('.vDIRlsd_doc_inpts').append('' +
                                '--- no other information ---'
                            );
                        } */
                        // endregion document attachments and inputs

                        // region document status
                        let doc_stat_len = r.doc_stats.length - 1;
                        let doc_stat_inactive_len_counter = 0;
                        let total_turn_around_time = 0;
                        $('.tbody-viewDocInfoReleased-doc_status').empty();
                        let identified_verify_date;
                        r.doc_stats.forEach($dt => {
                            const verification_date = new Date($dt.verification_date);
                            if (verification_date.getFullYear() > 2000) {
                                identified_verify_date = verification_date;
                            }
                        });
                        r.doc_stats.forEach($dt => {
                            // region action date normalized
                            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            const date_of_received = new Date($dt.received);
                            const date_of_action = new Date($dt.released);
                            // endregion action date normalized

                            //region attachments
                            let attach_disp_count = 1;
                            let attach_disp = '';
                            let attachment_remarks = ($dt.attachment_remarks != null ? $dt.attachment_remarks + '<br><hr>' : '');
                            if ($dt.attachments.length > 0) {
                                $dt.attachments.forEach($attachment => {
                                    if ($attachment.file_name != 'n/a') {
                                        attach_disp += attach_disp_count + '. <a href="/' + $attachment.file_path + '/' + $attachment.file_name + '" target="_blank">' + $attachment.remarks + '</a><br>';

                                        attach_disp_count += 1;
                                    }
                                    if ($attachment.file_link != 'n/a') {
                                        attach_disp += attach_disp_count + '. <a href="' + $attachment.file_link + '" target="_blank">' + $attachment.remarks + '</a><br>';

                                        attach_disp_count += 1;
                                    }
                                });
                            } else {
                                attach_disp = '<span class="text-secondary">NO DOCUMENTS / LINKS ATTACHED</span>';
                            }
                            //endregion attachments

                            // region identify status
                            let release_stat_disp = '';
                            if ($dt.final_action == null) {
                                if ($dt.released == null) {
                                    if ($dt.received_uuid != null) {
                                        release_stat_disp = '<div class="border border-2 border-info bg-white text-info text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Received</div>';

                                    } else {
                                        release_stat_disp = '<div class="border border-2 border-warning bg-white text-warning text-center fs-5 fw-bold"><i class="fa fa-truck" aria-hidden="true"></i><br>In-Transit</div>';
                                    }
                                } else {
                                    release_stat_disp = '<div class="border border-2 border-success bg-white text-success text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Forwarded</div>';
                                }
                            } else {
                                release_stat_disp = '<div class="border border-2 border-success bg-white text-success text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Final Action</div>';
                            }

                            if ($dt.rejected != null) {
                                release_stat_disp = '<div class="border border-2 border-danger bg-white text-danger text-center fs-5 fw-bold"><i class="fa fa-times-circle" aria-hidden="true"></i><br>Rejected</div>';
                            }

                            if ($dt.uploaded_act != null) {
                                release_stat_disp += '<div class="border border-2 border-info bg-white text-info text-center fw-bold">Offline action</div>';
                            }
                            // endregion identify status

                            let rcvrfn = ''; //receiving name
                            if ($dt.receiver_mname != null) {
                                rcvrfn = ($dt.received_uuid != null ? $dt.receiver_fname + ' ' + ($dt.receiver_mname).charAt(0) + '. ' + $dt.receiver_sname + ' ' + ($dt.receiver_suffix != null ? $dt.receiver_suffix : '') : '');
                            }

                            /* ------- region calculate turn around time ------- */

                            // Assuming createdAt is a string representing the timestamp from the database

                            // Convert the createdAt string to a Date object
                            const received = new Date($dt.received);
                            const released = new Date($dt.released);
                            const final_action = new Date($dt.final_action);
                            const rejected = new Date($dt.rejected);
                            const verification_date = new Date($dt.verification_date);
                            const createdAt = new Date($dt.created_at);

                            // Get the current date and time
                            const currentDate = new Date();

                            let has_been_verified = '';

                            let processstart;
                            let processend;
                            let timeDifference = 0;
                            if (released.getFullYear() > 2000) {
                                // Calculate the time difference in milliseconds
                                if (verification_date.getFullYear() > 2000) {
                                    // timeDifference = released - verification_date;
                                    processstart = verification_date;
                                    processend = released;
                                    has_been_verified = '<span class="text-primary">initial action</span>';
                                } else {
                                    // timeDifference = released - received;
                                    processstart = received;
                                    processend = released;
                                }
                            } else {
                                if (rejected.getFullYear() > 2000) {
                                    // timeDifference = rejected - received;
                                    processstart = received;
                                    processend = rejected;
                                } else if (final_action.getFullYear() > 2000) {
                                    // timeDifference = final_action - received;
                                    processstart = received;
                                    processend = final_action;
                                } else {
                                    if (verification_date.getFullYear() > 2000) {
                                        // timeDifference = currentDate - verification_date;
                                        processstart = verification_date;
                                        processend = currentDate;
                                        has_been_verified = '<span class="text-primary">initial action</span>';
                                    } else {
                                        // timeDifference = currentDate - received;
                                        processstart = received;
                                        processend = currentDate;
                                        console.log("TAT calculation executed");
                                        // console.log(received);
                                        // console.log(currentDate);
                                    }
                                }
                            }

                            // reduct time and use working days calculation
                            // Function to check if a given date is a weekend (Saturday or Sunday)
                            function isWeekend(date) {
                                const day = date.getDay();
                                return day === 0 || day === 6;
                            }

                            let processingTime = 0;
                            if (processstart.getFullYear() >= 2000 && processend.getFullYear() >= 2000) {
                                while (processstart < processend) {
                                    if (!isWeekend(processstart)) {
                                        const currentHour = processstart.getHours();

                                        // Check if the current time is within working hours (8 am to 12 pm and 1 pm to 5 pm)
                                        if ((currentHour >= 8 && currentHour < 12) || (currentHour >= 13 && currentHour < 17)) {
                                            processingTime += 1000; // Add 1 second to processing time
                                        }
                                    }

                                    // Move to the next second
                                    processstart.setTime(processstart.getTime() + 1000);
                                }
                            }
                            // now get the total days hours minutes and seconds
                            timeDifference = processingTime;

                            // ignore tat when is before validated date
                            let totalDays = 0;
                            let totalHours = 0;
                            let totalMinutes = 0;
                            let totalSeconds = 0;
                            if (received > identified_verify_date) {
                                // Calculate days, hours, and minutes
                                totalDays = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                                totalHours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                totalMinutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                                totalSeconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                                if (received.getFullYear() < 2000) {
                                    totalDays = 0;
                                    totalHours = 0;
                                    totalMinutes = 0;
                                    totalSeconds = 0;
                                } else {
                                    total_turn_around_time += timeDifference;
                                }
                            } else {
                                if (received.getFullYear() > 2000) {
                                    if (has_been_verified == '') {
                                        has_been_verified = '<span class="text-primary">xxx</span>';
                                    }
                                }
                            }

                            /* ------- endregion calculate turn around time ------- */

                            $('.tbody-viewDocInfoReleased-doc_status').append('' +
                                '<tr> ' +
                                '    <td> ' +
                                '       ' + release_stat_disp +
                                '    </td> ' +
                                '    <td> ' +
                                '        <span class="fw-bold">Received By</span> ' +
                                '        <br> ' +
                                '       ' + rcvrfn +
                                '    </td> ' +
                                '    <td> ' +
                                '        <span class="fw-bold">Recipient</span> ' +
                                '        <br> ' +
                                '       ' + $dt.send_to_abbrv +
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
                                '        <span class="fw-bold">Action Attachment/s</span> ' +
                                '        <br> ' +
                                '       ' + attachment_remarks + attach_disp +
                                '    </td> ' +
                                '    <td> ' +
                                '        <span class="fw-bold">Date Received</span> ' +
                                '        <br> ' +
                                '       ' + (date_of_received.getFullYear() > 2000 ? (months[date_of_received.getMonth()]).toUpperCase() + ' ' + date_of_received.getDate() + ', ' + date_of_received.getFullYear() + '<br>' + date_of_received.getHours() + ':' + (date_of_received.getMinutes() >= 10 ? date_of_received.getMinutes() : '0' + date_of_received.getMinutes()) : '') +
                                '    </td> ' +
                                '    <td> ' +
                                '        <span class="fw-bold">Date Released</span> ' +
                                '        <br> ' +
                                '       ' + (date_of_action.getFullYear() > 2000 ? (months[date_of_action.getMonth()]).toUpperCase() + ' ' + date_of_action.getDate() + ', ' + date_of_action.getFullYear() + '<br>' + date_of_action.getHours() + ':' + (date_of_action.getMinutes() >= 10 ? date_of_action.getMinutes() : '0' + date_of_action.getMinutes()) : '') +
                                '    </td> ' +
                                '    <td> ' +
                                '        <span class="fw-bold" tooltip="turn around time" flow="down">Turn Around Time</span> ' +
                                '        ' + (totalDays != 0 ? '<br> Days: ' + totalDays : '') +
                                '        ' + (totalHours != 0 ? '<br> Hours: ' + totalHours : '') +
                                '        ' + (totalMinutes != 0 ? '<br> Minutes: ' + totalMinutes : '') +
                                '        ' + (totalSeconds != 0 ? '<br> Seconds: ' + totalSeconds : '') +
                                '        <br>' + has_been_verified +
                                '    </td> ' +
                                '</tr> ' +
                                ''
                            );

                            // make all except the current document stats as grey
                            if (doc_stat_inactive_len_counter < doc_stat_len) {
                                $('.tbody-viewDocInfoReleased-doc_status').find('td').addClass('text-secondary');
                            }
                            doc_stat_inactive_len_counter += 1;
                        });

                        // >>>>>>>>>>>>>>> Calculate days, hours, and minutes
                        let ttlDays_ttl_tat = Math.floor(total_turn_around_time / (1000 * 60 * 60 * 24));
                        let ttlHours_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let ttlMinutes_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60)) / (1000 * 60));
                        let ttlSeconds_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60)) / 1000);

                        $('.vDIRlsd_ttlDays_ttl_tat').empty().text(ttlDays_ttl_tat + ' Days');
                        $('.vDIRlsd_ttlHours_ttl_tat').empty().text(ttlHours_ttl_tat + ' Hours');
                        $('.vDIRlsd_ttlMinutes_ttl_tat').empty().text(ttlMinutes_ttl_tat + ' Minutes');
                        $('.vDIRlsd_ttlSeconds_ttl_tat').empty().text(ttlSeconds_ttl_tat + ' Seconds');
                        // endregion document status
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion document info
    });
</script>
{{-- endregion queries --}}
