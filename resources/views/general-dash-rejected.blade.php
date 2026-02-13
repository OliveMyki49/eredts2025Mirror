{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTRejected" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead style="border-bottom: 1px solid #000;">
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Document No.</th>
            <th>Action Taken</th>
            <th>Payment</th>
            <th>Client Name</th>
            <th>Document Attachments</th>
            <th>Action Attachments</th>
            <th>Application Type</th>
            <th>Sent By</th>
            <th>Date & Time Released</th>
            <th>TimeStamp Update</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Document No.</th>
            <th>Action Taken</th>
            <th>Payment</th>
            <th>Client Name</th>
            <th>Document Attachments</th>
            <th>Action Attachments</th>
            <th>Application Type</th>
            <th>Sent By</th>
            <th>Date & Time Released</th>
            <th>TimeStamp Update</th>
        </tr>
    </tfoot>
    <tbody style="height: 200px">
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region view client id modal --}}
<div class="modal fade" id="vDIRJCTDviewClientIdModal" tabindex="-1" aria-labelledby="vDIRJCTDviewClientIdLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDIRJCTDviewClientIdLabel">Client ID View</h1>
                <button type="button" class="btn-close btn-vDIRJCTDreencryptId" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px;">
                <iframe id="vDIRJCTDviewClientIdIframe" name="viewClientIdIframe" href="" style="width: 100%; height: 100%;"></iframe>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="vDIRJCTDreencryptId">
                <button type="button" class="btn btn-secondary btn-vDIRJCTDreencryptId" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view client id modal --}}

{{-- region view doc attachment modal --}}
<div class="modal fade" id="vDIRJCTDvDocAtchRcvModal" tabindex="-1" aria-labelledby="vDIRJCTD_viewDocAtchTransitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDIRJCTD_viewDocAtchTransitLabel">Document Attachment: <b><u><span class="vDIRJCTDDocAtchName fs-6"></span></u></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px; overflow-y: scroll;">
                <div class="vDIRJCTD_vDocAtchArchCollection"></div>
                <embed id="vDIRJCTD_vDocAtchArchIframe" name="vDIRJCTD_vDocAtchArchIframe" width="100%" height="80%" style="background:url(../assets/img/denrloadsmaller.webp) center center no-repeat;">
                <div class="vDIRJCTD_other_req_inputs"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view doc attachment modal --}}

{{-- region view Document Info View --}}
<div class="modal fade" id="vDIRJCTDModal" tabindex="-1" aria-labelledby="vDIRJCTDLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDIRJCTDLabel">REQUEST INFORMATION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="text-center fs-3 border border-3 vDIRJCTDheader-status">
                STATUS UNKNOWN
            </div>

            <div class="modal-body p-0">

                {{-- region accordian --}}
                <div class="accordion" id="vDIRJCTD_accordian">
                    {{-- GENERAL INFORMATION --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#vDIRJCTD_collapsible_gen_info" aria-expanded="true" aria-controls="vDIRJCTD_collapsible_gen_info">
                                GENERAL INFORMATION
                            </button>
                        </h2>
                        <div id="vDIRJCTD_collapsible_gen_info" class="accordion-collapse collapse" data-bs-parent="#vDIRJCTD_accordian">
                            <div class="accordion-body">
                                <div class="row vDIRJCTD-content">
                                    {{-- Document Info Contents generated here --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- REQUESTEE INPUTS AND ATTACHMENTS --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIRJCTD_collapsible_req_info" aria-expanded="false" aria-controls="vDIRJCTD_collapsible_req_info">
                                REQUESTEE INPUTS AND ATTACHMENTS
                            </button>
                        </h2>
                        <div id="vDIRJCTD_collapsible_req_info" class="accordion-collapse collapse" data-bs-parent="#vDIRJCTD_accordian">
                            <div class="accordion-body">
                                <div class="row vDIRJCTD_doc_inpts">
                                    --- no other information ---
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- region form inputs --}}
                    <form class="p-0" id="addvDIRJCTDForm">
                        {{-- PAYMENT STATUS =======================================================================================> HIDE --}}
                        <div class="accordion-item" style="display: none;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIRJCTD_collapsible_pymnt_stat" aria-expanded="false" aria-controls="vDIRJCTD_collapsible_pymnt_stat">
                                    PAYMENT STATUS
                                </button>
                            </h2>
                            <div id="vDIRJCTD_collapsible_pymnt_stat" class="accordion-collapse collapse" data-bs-parent="#vDIRJCTD_accordian">
                                <div class="accordion-body">
                                    {{-- region order of payment --}}
                                    <div class="row">
                                        <div class="col">
                                            <span class="fs-6 fw-bold">PAYMENT STATUS</span>
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
                                                            <label for="none" class="vDIRJCTD_ofp_signed_link"></label><br>
                                                            <label for="none" class="vDIRJCTD_cli_rcpt_link"></label>
                                                            <div class="vDIRJCTD-ofp-and-rcpt-uploads"></div>
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
                                                                    <div class="p-0 col-3 border-bottom border-dark fw-bold vDIRJCTD_per_bill_no"></div>
                                                                    <div class="p-0 col-1"></div>
                                                                    <div class="p-0 col-2 text-end">Dated: &nbsp;</div>
                                                                    <div class="p-0 col-4 border-bottom border-dark fw-bold vDIRJCTD_per_bill_no_dated"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6"></div>
                                                            {{-- <div class="col-6 text-primary p-1">Note: <b>per bill no.</b> is only visible for credit and accounting officer</div> --}}
                                                        @endif
                                                    </div>
                                                    <hr style="margin: 10px 0;">
                                                </div>
                                                <div class="col-12 px-5 vDIRJCTD_prev_cost_breakdown"></div>
                                                <div class="col-12 px-5 pb-3 vDIRJCTD_prev_ttl_cost"></div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endregion order of payment --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- endregion form inputs --}}
                </div>
                {{-- endregion accordian --}}

                {{-- region document status --}}
                <div class="row mt-3 mx-3 px-3">
                    <div class="col p-3 rounded border shadow">
                        <span class="fs-6 fw-bold">DOCUMENT STATUS</span>
                        <hr>
                        <div style="overflow: auto">
                            <table class="table table-striped table-bordered table-sm">
                                <tbody class="tbody-viewDocInfoRejected-doc_status">
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
                                    <span class="fs-6 vDIRJCTD_ttlDays_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIRJCTD_ttlHours_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIRJCTD_ttlMinutes_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIRJCTD_ttlSeconds_ttl_tat btn btn-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion document status --}}

                <div class="row m-3 text-center">
                    <button class="btn btn-outline-primary border-0 vDIRJCTDscrollToTop">Return to top</button>
                    <script>
                        $(document).ready(function() {
                            $('.vDIRJCTDscrollToTop').click(function() {
                                $('#vDIRJCTDModal').scrollTop(0);
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
    <input type="hidden" id="dTRejected_loader" @if ($active_tab == 'tabRejected') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTRejected_func() {
            // Setup - add a text input to each footer cell
            $('#dTRejected tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTRejected').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-clientReqRejected",
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
                    /* id */
                    {
                        data: 'id',
                    },
                    /* subject */
                    {
                        data: 'subject',
                        render: function(data, type, row) {
                            let subclass = row['subclass_slug'];

                            let more_info = '' +
                                '<a' +
                                '   style="cursor: pointer" ' +
                                '   class="btn-fetchdocInfo_vDIRJCTD dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#vDIRJCTDModal"' +
                                '   data-action_id="' + row['id'] + '"' +
                                '   data-doc_id="' + row['doc_id'] + '"' +
                                '>' +
                                '   <i class="fa fa-info-circle" aria-hidden="true"></i> Show more details' +
                                '</a>' +
                                '';

                            let showRoutingSlip = ''; //show or allow users view public documents when the request is already approved
                            let showPubDocs = ''; //show or allow users view public documents when the request is already approved
                            if (row['doc_no'] != 'unset') {
                                showRoutingSlip = '<li><a class="dropdown-item" href="/grsid/' + row['doc_id'] + '" target="_blank" ><i class="fa fa-map-marker" aria-hidden="true"></i> Show routing slip</a></li>';
                                showPubDocs = '<li><a class="dropdown-item" href="rfsoats/pdv?dn=' + row['doc_no'] + '" target="_blank" ><i class="fa fa-eye" aria-hidden="true"></i> Show published document</a></li>';
                            } else {
                                showRoutingSlip = '<li><a class="dropdown-item bg-secondary-subtle"><i class="fa fa-map-marker" aria-hidden="true"></i> Routing slip not Available<br><sup>(Request not yet approved)</sup></a></li>';
                                showPubDocs = '<li><a class="dropdown-item bg-secondary-subtle"><i class="fa fa-eye-slash" aria-hidden="true"></i> Published document not available<br><sup>(Request not yet approved)</sup></a></li>';
                            }


                            let dropdownMenu = '' +
                                '<div class="dropdown">' +
                                '    <div ' +
                                '       data-bs-toggle="dropdown" ' +
                                '       aria-expanded="false" ' +
                                '       style="cursor: pointer" ' +
                                '       onMouseOut="this.style.color=`#000`" ' +
                                '       onMouseOver="this.style.color=`#0d6efd`" ' +
                                '    >' +
                                '        <span class="text-primary">' + subclass + '</span>: ' + (row['subject']).toUpperCase() +
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
                    /* doc_no */
                    {
                        data: 'doc_no',
                        render: function(data, type, row) {
                            if (row['doc_no'] != 'unset') {
                                return '<a class="link-body-emphasis" href="/grsid/' + row['doc_id'] + '" target="_blank" tooltip="Print routing slip" flow="down">' + row['doc_no'] + '</a>';
                            } else {
                                return '<span class="text-danger">not yet validated</span>';
                            }
                        }
                    },
                    /* action_taken */
                    {
                        data: 'action_taken',
                        render: function(data, type, row) {
                            let action_taken = row['action_taken'];
                            disp = '';
                            if (action_taken == null) {
                                disp = '<span class="text-danger">NO ACTION TAKEN YET</span>';
                            } else {
                                disp = action_taken;
                            }

                            return disp;
                        }
                    },
                    /* payment */
                    {
                        data: null,
                        render: function(data, type, row) {
                            let ofp = row['order_of_payment'];
                            let ofplen = ofp.length;
                            let disp = '';
                            if (ofplen < 1) {
                                disp = "" +
                                    "<span class='link-danger text-center'>" +
                                    "   <No href='' target='_blank' >NO ORDER OF PAYMENT YET</a>" +
                                    "</span>";
                            } else {
                                if (ofp[0].order_of_payment != null) {
                                    disp += "" +
                                        "<span class='text-center'>" +
                                        "   <a class='link-success' href='" + ofp[0].order_of_payment + "' target='_blank' tooltip='View signed Order of payment' flow='right'>Signed order of payment</a>" +
                                        "</span>";
                                } else {
                                    disp += "" +
                                        "<span class='text-center'>" +
                                        "   <a class='link-primary' href='/get-orderOfPayment-view-only/" + row['doc_id'] + "/' target='_blank' tooltip='View created order of payment' flow='right'>Order of payment</a>" +
                                        "</span>"
                                }
                                if (ofp[0].payment_receipt != null) {
                                    disp += "" +
                                        "<hr style='margin: 5px 0;'>" +
                                        "<span class='text-center'>" +
                                        "   <a class='link-success' href='" + ofp[0].payment_receipt + "' target='_blank' tooltip='View client payment receipt' flow='right'>Payment Receipt</a>" +
                                        "</span>";

                                    if (ofp[0].verified == 1) {
                                        disp += "" +
                                            "<hr style='margin: 5px 0;'>" +
                                            "<div class='text-center text-white bg-success rounded'>" +
                                            "   Receipt Verified" +
                                            "</div>";
                                    } else {
                                        disp += "" +
                                            "<hr style='margin: 5px 0;'>" +
                                            "<div class='text-center text-white bg-danger rounded'>" +
                                            "   Receipt Not Yet Verified" +
                                            "</div>";
                                    }
                                }
                            }

                            return disp;
                        }
                    },
                    /* client_name */
                    {
                        data: 'clientfname',
                        render: function(data, type, row) {


                            let user = row['sender_username'];
                            let client = '';
                            client += row['clientfname'] + ' ';
                            client += (row['clientmname']).charAt(0) + '. ';
                            client += row['clientsname'] + ' ';
                            client += row['clientsuffix'];

                            let id_front = row['client_valid_id_front'] != null ? '<span class="text-success">AVAILABLE</span>' : '<span class="text-danger">N/A</span><br>';
                            let id_back = row['client_valid_id_back'] != null ? '<span class="text-success">AVAILABLE</span>' : '<span class="text-danger">N/A</span>';

                            let dropdownMenu = '' +
                                '<div class="dropdown">' +
                                '    <div ' +
                                '       data-bs-toggle="dropdown" ' +
                                '       aria-expanded="false" ' +
                                '       style="cursor: pointer" ' +
                                '       onMouseOut="this.style.color=`#000`" ' +
                                '       onMouseOver="this.style.color=`#0d6efd`" ' +
                                '    >' +
                                '        ' + client +
                                '    </div>' +
                                '    <ul class="dropdown-menu">' +
                                '        <li><a class="dropdown-item" href="#" >VALID ID</a></li>' +
                                '        <li><a class="dropdown-item" href="#" >FRONT: ' + id_front + ' </a></li>' +
                                '        <li><a class="dropdown-item" href="#" >BACK: ' + id_back + ' </a></li>' +
                                '        <li>' +
                                '           <a class="dropdown-item" href="#" >' +
                                '               <button ' +
                                '                  type="button" ' +
                                '                  class="btnvDIRJCTD-viewClientId btn btn-outline-primary btn-sm" ' +
                                '                  data-bs-toggle="modal" ' +
                                '                  data-bs-target="#vDIRJCTDviewClientIdModal"' +
                                '                  data-client_id="' + row['sender_client_id'] + '" ' +
                                '               >' +
                                '          VIEW' +
                                '       </button>' +
                                '           </a>' +
                                '       </li>' +
                                '    </ul>' +
                                '</div>' +
                                '';

                            return dropdownMenu;
                        }
                    },
                    /* Doc Attachments */
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
                                    '   class="btnvDIRJCTD-viewDocAtch mb-1" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDIRJCTDvDocAtchRcvModal"' +
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
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#doc_clps_atch_vDIRJCTD' + row['id'] + '" role="button" aria-expanded="false" aria-controls="doc_clps_atch_vDIRJCTD' + row['id'] + '">' +
                                '        Show Files' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="doc_clps_atch_vDIRJCTD' + row['id'] + '">' +
                                '    <div class="card card-body">' +
                                '       ' + disp +
                                '    </div>' +
                                '</div>' +
                                '';

                            return '' +
                                '<div class="row ps-1">' +
                                '   <div class="col">' +
                                '       ' + req_atchs_collapsible +
                                '       <input type="hidden" id="vDIRJCTDdoc_fileCollection' + row['id'] + '" value="' + file_names + '">' +
                                '   </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* Action Attachments */
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
                                    '   class="btnvDIRJCTD-viewDocAtch" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDIRJCTDvDocAtchRcvModal"' +
                                    '   data-file_type="act" ' +
                                    '   data-act_id="' + row['id'] + '" ' + //this is the action attachment id
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
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#act_clps_atch_vDIRJCTD' + row['id'] + '" role="button" aria-expanded="false" aria-controls="act_clps_atch_vDIRJCTD' + row['id'] + '">' +
                                '        Show Files' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="act_clps_atch_vDIRJCTD' + row['id'] + '">' +
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
                                        '        No file/s found' +
                                        '    </a>';
                                }
                            }

                            return '' +
                                '<div class="row ps-1">' +
                                '   <div class="col">' +
                                '       ' + attachment_remarks +
                                '       ' + req_atchs_collapsible +
                                '       <input type="hidden" id="vDIRJCTDact_fileCollection' + row['id'] + '" value="' + file_names + '">' +
                                '   </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* application_type */
                    {
                        data: 'applicant',
                        render: function(data, type, row) {
                            return (row['applicant']).toUpperCase();
                        }
                    },
                    /* sender */
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
                    /* created at */
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
                    /* updated at */
                    {
                        data: 'updated_at',
                    },
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                columnDefs: [{
                        width: '5%',
                        targets: [0],
                        visible: true,
                    },
                    {
                        targets: [4, 5, 6, 7, 8, 9, 11],
                        visible: false,
                    }
                ],
                fixedColumns: {
                    left: 1
                },
                order: [
                    [11, 'desc'] /* update by last updated action */
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
                        title: `REJECTED DOCUMENTS ${new Date().toLocaleDateString()}`,
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
                                '      <h2>REJECTED DOCUMENTS</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTRejected thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTRejected tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTRejected_search" type="text" placeholder="Search (Click to refresh)">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTRejected_search').val();
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
        let tabRejected = false;
        $('label[for=tabRejected]').click(function() {
            if (tabRejected == false) {
                dTRejected_func();
                tabRejected = true;
            }
        });

        if ($('#dTRejected_loader').val() == 'load') {
            if (tabRejected == false) {
                dTRejected_func();
                tabRejected = true;
            }
        }
        /* endregion Call tab on click */

        $('#dTRejected_wrapper .btn-group button').removeClass('btn-secondary').addClass('btn-outline-success');
    });
</script>
{{-- endregion populate table --}}

{{-- region queries --}}
<script>
    $(function() {
        // region view client id
        $('#dTRejected').on('click', '.btnvDIRJCTD-viewClientId', function() {
            let username = $('#auth_username').val();
            let client_id = $(this).data('client_id');

            let iframeHref = '/get-clientId-view/' + username + '/' + client_id + '/';
            $('#vDIRJCTDviewClientIdIframe').attr('src', iframeHref);
            $('#vDIRJCTDreencryptId').val(client_id);
        });
        // endregion view client id

        // region view document attachment
        $('#dTRejected').on('click', '.btnvDIRJCTD-viewDocAtch', function() {
            let username = $('#auth_username').val();
            let file_type = $(this).data('file_type');

            if (file_type == 'doc') {
                let id = $(this).data('doc_id'); // this is the id of action but named doc id because there is action id for attachment below
                let real_doc_id = $(this).data('real_doc_id'); // real document id
                let file_path = $(this).data('doc_file_path');
                let file_name = $(this).data('doc_file_name');
                let fileCollection = $('#dTRejected #vDIRJCTDdoc_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.vDIRJCTD_vDocAtchArchCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.vDIRJCTD_vDocAtchArchCollection').append('<button class="btnvDIRJCTD-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>');
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#vDIRJCTD_vDocAtchArchIframe').attr('src');
                if (content1 != content2) {
                    $('.vDIRJCTDDocAtchName').empty().append(file_name);
                    $('#vDIRJCTD_vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
                }
            } else if (file_type == 'act') {
                let id = $(this).data('act_id');
                let file_path = $(this).data('act_file_path');
                let file_name = $(this).data('act_file_name');
                let fileCollection = $('#dTRejected #vDIRJCTDact_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.vDIRJCTD_vDocAtchArchCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.vDIRJCTD_vDocAtchArchCollection').append('<button class="btnvDIRJCTD-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>');
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#vDIRJCTD_vDocAtchArchIframe').attr('src');
                if (content1 != content2) {
                    $('.vDIRJCTDDocAtchName').empty().append(file_name);
                    $('#vDIRJCTD_vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
                }

                // region get other requestee input
                $('.vDIRJCTD_other_req_inputs').empty()
                $.ajax({
                    url: "get-other-cli-req-inputs/" + real_doc_id + "/",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(r) {
                        if (r.success) {
                            $('.vDIRJCTD_other_req_inputs').append('<hr><h6>Other Requestee Input:</h6><br>');

                            if (r.req_inputs.length >= 1) {
                                r.req_inputs.forEach(dt => {
                                    $('.vDIRJCTD_other_req_inputs').append('' +
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
                                $('.vDIRJCTD_other_req_inputs').append('' +
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
            }
        });
        // endregion view document attachment

        // region view document attachment collection
        $('.vDIRJCTD_vDocAtchArchCollection').on('click', '.btnvDIRJCTD-view-file', function() {
            let file_path = $(this).data('file_path');
            let file_name = $(this).data('file_name');

            let iframeHref = '/' + file_path + '/' + file_name;
            $('.vDIRJCTDDocAtchName').empty().append(file_name);
            $('#vDIRJCTD_vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
        });
        // endregion view document attachment collection

        // region document info
        $('#dTRejected').on('click', '.btn-fetchdocInfo_vDIRJCTD', function() {
            let action_id = $(this).data('action_id');
            let doc_id = $(this).data('doc_id');

            //client order of payment
            $('.btn-view-order-of-payment').val(doc_id);

            // set action id for receive
            $('#vDIRJCTDaction_id').val(action_id);
            $('#vDIRJCTDdoc_id').val(doc_id);

            $.ajax({
                url: "/get-docInfos/" + doc_id + "/",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {

                        let doc_no = r.doc_info.doc_no;

                        // application type
                        let application_type_id = r.doc_info.application_type_id;
                        let applicant = r.doc_info.applicant;

                        // transaction type
                        let transaction_type_id = r.doc_info.transaction_type_id;
                        let transaction = r.doc_info.transaction;
                        let transaction_slug = r.doc_info.transaction_slug;

                        // agency
                        let agency = r.doc_info.agency;

                        // client info
                        let client_id = r.doc_info.client_id;
                        let client_fname = r.doc_info.client_fname;
                        let client_mname = r.doc_info.client_mname;
                        let client_sname = r.doc_info.client_sname;
                        let client_suffix = r.doc_info.client_suffix;
                        let client_address = r.doc_info.client_address;
                        let client_email = r.doc_info.client_email;
                        let client_email_verify = r.doc_info.client_email_verify;
                        let client_contact_no = r.doc_info.client_contact_no;

                        // document classification
                        let class_id = r.doc_info.class_id;
                        let class_slug = r.doc_info.class_slug;
                        let doc_class_full = r.doc_info.doc_class_full;

                        // doc inputs and attachmetns
                        let doc_attachments = r.doc_info.attachments;

                        // document type
                        let subclass_id = r.doc_info.subclass_id;
                        let subclass_slug = r.doc_info.subclass_slug;
                        let doc_type_full = r.doc_info.doc_type_full;

                        // other
                        let remarks = r.doc_info.remarks;
                        let validated = r.doc_info.validated;
                        let compliance_deadline = r.doc_info.compliance_deadline;

                        //order of payment
                        let order_of_payment = r.ofp;
                        let cost_breakdown = r.ofpcbd;

                        // additional order of payment
                        let additional_oop = r.additional_oop;

                        // region display agency Government to Government (G2G)
                        let agency_disp = '';
                        if (transaction_slug == 'G2G') {
                            agency_disp = '<div class="col-md-4 mb-2 fs-6">Agency: <br>' + (agency != null ? '<span class="fw-bold fs-6">' + agency + '</span>' : '<span class="fw-bold fs-6 text-secondary">NOT AVAILABLE</span>') + '</div>'
                        }
                        // endregion display agency Government to Government (G2G)

                        // region status bar
                        if (validated != null) {
                            $('.vDIRJCTDheader-status').empty().append('<i class="fa fa-check-circle" aria-hidden="true"></i> VERIFIED');
                            $('.vDIRJCTDheader-status').removeClass('border-danger text-danger').addClass('border-success text-success');
                        } else {
                            $('.vDIRJCTDheader-status').empty().append('<i class="fa fa-hourglass" aria-hidden="true"></i> NOT YET VERIFIED');
                            $('.vDIRJCTDheader-status').removeClass('border-success text-success').addClass('border-danger text-danger');
                        }
                        // endregion status bar

                        $('.vDIRJCTD-content').empty().append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Tracking No.: <br>' + (doc_no != 'unset' ? '<span class="fw-bold fs-6">' + doc_no + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT YET VALIDATED</span>') + '</div>' +
                            '<div class="col-md-4 mb-2 fs-6">Compliance Date: <br>' + (compliance_deadline != null ? '<span class="fw-bold fs-6">' + compliance_deadline + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT YET VALIDATED</span>') + '</div>' +
                            '<hr>' +
                            ''
                        );

                        $('.vDIRJCTD-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Classification: <br><span class="fw-bold fs-6">' + doc_class_full.toUpperCase() + ' — (' + class_slug + ')</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Document Type: <br><span class="fw-bold fs-6">' + doc_type_full.toUpperCase() + ' — (' + subclass_slug + ')</span></div>' +
                            ''
                        );

                        $('.vDIRJCTD-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Application type: <br><span class="fw-bold fs-6">' + applicant.toUpperCase() + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Transaction Type: <br><span class="fw-bold fs-6">' + transaction.toUpperCase() + ' (' + transaction_slug + ')</span></div>' +
                            agency_disp +
                            '<hr>' +
                            ''
                        );

                        $('.vDIRJCTD-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Client Name: <br><span class="fw-bold fs-6">' + client_fname + ' ' + client_mname.charAt(0) + '. ' + client_sname + ' ' + (client_suffix != null ? client_suffix : '') + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Email: <br><span class="fw-bold fs-6">' + client_email + ' (' + (client_email_verify == 1 ? '<span class="text-success">VERIFIED</span>' : '<span class="text-danger">NOT VERIFIED</span>') + ')</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Contact Number: <br><span class="fw-bold fs-6">' + client_contact_no + '</span></div>' +
                            ''
                        );

                        $('.vDIRJCTD-content').append('' +
                            '<div class="col-md-12 fs-6">Client Address: <br><span class="fw-bold fs-6">' + client_address + '</span></div>' +
                            ''
                        );

                        $('#vDIRJCTDremarks').val(remarks);

                        // region document attachments and inputs
                        let filecount = 0;
                        let inptcount = 0;
                        let app_doc_form_no = 0; //appform start from 0 
                        $('.vDIRJCTD_doc_atch').empty(); // make sure to empty the list
                        $('.vDIRJCTD_doc_inpts').empty(); // make sure to empty the list
                        doc_attachments.forEach(dt => {

                            if (dt.attachment_type == 'file') {
                                // file attachments
                                filecount += 1;
                                if (app_doc_form_no != dt.app_form_no) {
                                    $('.vDIRJCTD_doc_inpts').append('' +
                                        '<div class="col-md-12 fs-6 mb-3"> ' +
                                        '   <hr>' +
                                        '   <span class="fw-bold"><i class="fa fa-file" aria-hidden="true"></i> Application Form ' + dt.app_form_no + '</span>: ' +
                                        '</div>' +
                                        ''
                                    );
                                    app_doc_form_no = dt.app_form_no;
                                }
                                $('.vDIRJCTD_doc_inpts').append('' +
                                    '<a class="col-md-2 ms-3 mb-1 fs-6 border border-primary rounded" href="/' + dt.file_path + '/' + dt.file_name + '" target="_blank" tooltip="' + dt.file_name + '" flow="down"><i class="fa fa-file-o" aria-hidden="true"></i> ' + dt.req_slug + '</a>'
                                );
                            } else {
                                // field inputs
                                inptcount += 1;
                                $('.vDIRJCTD_doc_inpts').append('' +
                                    '<div class="col-md-12 px-3 fs-6"> ' +
                                    '    <div class="row"> ' +
                                    '       <div class="col"> ' +
                                    '           <span class="fw-bold">' + dt.title + '</span>: ' +
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
                            $('.vDIRJCTD_doc_atch').append('' +
                                '--- no attachment found ---'
                            );
                        }
                        /* if (inptcount == 0) {
                            $('.vDIRJCTD_doc_inpts').append('' +
                                '--- no other information ---'
                            );
                        } */
                        // endregion document attachments and inputs

                        // region document status
                        let doc_stat_len = r.doc_stats.length - 1;
                        let doc_stat_inactive_len_counter = 0;
                        let total_turn_around_time = 0;
                        $('.tbody-viewDocInfoRejected-doc_status').empty();
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
                            let relese_stat_disp = '';
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

                            let rcvrfn = '';
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
                                    has_been_verified = '<span class="text-primary">has been verified here</span>';
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
                                        has_been_verified = '<span class="text-primary">has been verified here</span>';
                                    } else {
                                        // timeDifference = currentDate - received;
                                        processstart = received;
                                        processend = currentDate;
                                        console.log("too much calculation");
                                        console.log(received);
                                        console.log(currentDate);
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

                            $('.tbody-viewDocInfoRejected-doc_status').append('' +
                                '<tr> ' +
                                '    <td> ' +
                                '       ' + relese_stat_disp +
                                '    </td> ' +
                                '    <td> ' +
                                '        <span class="fw-bold">Received By</span> ' +
                                '        <br> ' +
                                '       ' + rcvrfn +
                                '    </td> ' +
                                '    <td> ' +
                                '        <span class="fw-bold">Recipient</span> ' +
                                '        <br> ' +
                                '       ' + $dt.send_to_full_office_name +
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
                                $('.tbody-viewDocInfoRejected-doc_status').find('td').addClass('text-secondary');
                            }
                            doc_stat_inactive_len_counter += 1;
                        });

                        // >>>>>>>>>>>>>>> Calculate days, hours, and minutes
                        let ttlDays_ttl_tat = Math.floor(total_turn_around_time / (1000 * 60 * 60 * 24));
                        let ttlHours_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let ttlMinutes_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60)) / (1000 * 60));
                        let ttlSeconds_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60)) / 1000);

                        $('.vDIRJCTD_ttlDays_ttl_tat').empty().text(ttlDays_ttl_tat + ' Days');
                        $('.vDIRJCTD_ttlHours_ttl_tat').empty().text(ttlHours_ttl_tat + ' Hours');
                        $('.vDIRJCTD_ttlMinutes_ttl_tat').empty().text(ttlMinutes_ttl_tat + ' Minutes');
                        $('.vDIRJCTD_ttlSeconds_ttl_tat').empty().text(ttlSeconds_ttl_tat + ' Seconds');
                        // endregion document status

                        // region preview cost breakdown
                        let total_of_cost_break_down = 0;
                        $('.vDIRJCTD_ofp_signed_link').empty(); //remove link viewable for uploaded oop or receipt
                        $('.vDIRJCTD_cli_rcpt_link').empty(); //remove link viewable for uploaded oop or receipt
                        $('.vDIRJCTD-ofp-and-rcpt-uploads').empty(); //remove link viewable for uploaded oop or receipt
                        if (order_of_payment != null) {

                            // region get order of payment uploaded document links
                            if (order_of_payment.order_of_payment != null) {
                                $('.vDIRJCTD_ofp_signed_link').empty().append('<a class="link-primary fs-6" href="' + order_of_payment.order_of_payment + '" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Order of payment</a>');
                            }

                            if (order_of_payment.payment_receipt != null) {
                                $('.vDIRJCTD_cli_rcpt_link').empty().append('<a class="link-primary fs-6" href="' + order_of_payment.payment_receipt + '" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Receipt</a>');
                            }

                            if (order_of_payment.order_of_payment == null && order_of_payment.payment_receipt == null) {
                                $('.vDIRJCTD-ofp-and-rcpt-uploads').empty().append('<div class="text-center text-danger fs-6">- - - No uploaded documents - - -</div>');
                            }
                            // endregion get order of payment uploaded document links
                            //perbill
                            $('.vDIRJCTD_per_bill_no').empty().append(order_of_payment.per_bill_no);
                            $('.vDIRJCTD_per_bill_no_dated').empty().append(order_of_payment.per_bill_no_dated);

                            //cost
                            if (cost_breakdown.length != 0) {
                                $('.vDIRJCTD_prev_cost_breakdown').empty().append('' +
                                    '<div class="row cb_item bg-secondary-subtle"> ' +
                                    '    <div class="col-8 border border-dark border-end-0 text-center fw-bold fs-6"> ' +
                                    '        Payment for ' +
                                    '    </div> ' +
                                    '    <div class="col-4 border border-dark text-center fw-bold fs-6"> ' +
                                    '        Amount ' +
                                    '    </div> ' +
                                    '</div> ' +
                                    ''
                                );

                                // calculate cost break down here
                                cost_breakdown.forEach(dt => {
                                    $('.vDIRJCTD_prev_cost_breakdown').append('' +
                                        '<div class="row cb_item"> ' +
                                        '    <div class="col-8 border border-dark border-top-0 border-end-0 fs-6"> ' +
                                        '        ' + dt.cost_breakdown + ' ' +
                                        '    </div> ' +
                                        '    <div class="col-4 border border-dark border-top-0 fs-6"> ' +
                                        '        PHP ' + dt.cost_breakdown_amount + '.00 ' +
                                        '    </div> ' +
                                        '</div> ' +
                                        ''
                                    );

                                    total_of_cost_break_down += dt.cost_breakdown_amount;
                                });

                                //check if the total calculated matches the value
                                if (total_of_cost_break_down == order_of_payment.pay_amount) {

                                    // add the additional cost to the total amount to be paid
                                    if (additional_oop.length != 0) {
                                        $('.vDIRJCTD_prev_cost_breakdown').append('' +
                                            '<div class="row cb_item mt-2 bg-secondary-subtle"> ' +
                                            '    <div class="col-8 border border-dark border-end-0 text-center fw-bold fs-6"> ' +
                                            '        Additional Fee ' +
                                            '    </div> ' +
                                            '    <div class="col-4 border border-dark text-center fw-bold fs-6"> ' +
                                            '        Amount ' +
                                            '    </div> ' +
                                            '</div> ' +
                                            ''
                                        );

                                        // get all additional cost to be aaded to the total
                                        additional_oop.forEach(dt => {
                                            let purpose = dt.purpose;
                                            let pay_amount = dt.pay_amount;

                                            $('.vDIRJCTD_prev_cost_breakdown').append('' +
                                                '<div class="row cb_item"> ' +
                                                '    <div class="col-8 border border-dark border-top-0 border-end-0 fs-6"> ' +
                                                '        ' + dt.purpose +
                                                '    </div> ' +
                                                '    <div class="col-4 border border-dark border-top-0 fs-6"> ' +
                                                '        PHP ' + dt.pay_amount + '.00 ' +
                                                '    </div> ' +
                                                '</div> ' +
                                                ''
                                            );
                                            total_of_cost_break_down += dt.pay_amount;
                                        });
                                    }

                                    //show total cost
                                    $('.vDIRJCTD_prev_ttl_cost').empty().append('' +
                                        '<div class="row ttl_item"> ' +
                                        '    <div class="col-8 text-end fs-6 fw-bold"> ' +
                                        '        Total Cost ' +
                                        '    </div> ' +
                                        '    <div class="col-4 border-bottom border-dark border-top-0 fw-bold fs-6"> ' +
                                        '        PHP ' + total_of_cost_break_down + '.00 ' +
                                        '    </div> ' +
                                        '</div> ' +
                                        ''
                                    );
                                } else {
                                    console.log('total_of_cost_break_down does not match');
                                }
                            } else {

                                $('.vDIRJCTD_prev_cost_breakdown').empty(); //clear the cost breakdown

                                // add the additional cost to the total amount to be paid
                                total_of_cost_break_down = 0;

                                // add the additional cost to the total amount to be paid
                                if (additional_oop.length != 0) {
                                    $('.vDIRJCTD_prev_cost_breakdown').append('' +
                                        '<div class="row cb_item mt-2 bg-secondary-subtle"> ' +
                                        '    <div class="col-8 border border-dark border-end-0 text-center fw-bold fs-6"> ' +
                                        '        Additional Fee ' +
                                        '    </div> ' +
                                        '    <div class="col-4 border border-dark text-center fw-bold fs-6"> ' +
                                        '        Amount ' +
                                        '    </div> ' +
                                        '</div> ' +
                                        ''
                                    );

                                    // get all additoinal cost to be aaded to the total
                                    additional_oop.forEach(dt => {
                                        let purpose = dt.purpose;
                                        let pay_amount = dt.pay_amount;

                                        $('.vDIRJCTD_prev_cost_breakdown').append('' +
                                            '<div class="row cb_item"> ' +
                                            '    <div class="col-8 border border-dark border-top-0 border-end-0 fs-6"> ' +
                                            '        ' + dt.purpose +
                                            '    </div> ' +
                                            '    <div class="col-4 border border-dark border-top-0 fs-6"> ' +
                                            '        PHP ' + dt.pay_amount + '.00 ' +
                                            '    </div> ' +
                                            '</div> ' +
                                            ''
                                        );
                                        total_of_cost_break_down += dt.pay_amount;
                                    });
                                }

                                //show total cost
                                $('.vDIRJCTD_prev_ttl_cost').empty().append('' +
                                    '<div class="row ttl_item"> ' +
                                    '    <div class="col-8 text-end fs-6 fw-bold"> ' +
                                    '        Total Cost ' +
                                    '    </div> ' +
                                    '    <div class="col-4 border-bottom border-dark fw-bold fs-6"> ' +
                                    '        PHP ' + (order_of_payment.pay_amount + total_of_cost_break_down) + '.00 ' +
                                    '    </div> ' +
                                    '</div> ' +
                                    ''
                                );
                            }
                        } else {
                            //reset labels when order of payment is not yet available

                            //reset upload button label
                            $('.btn-upload-signed-oop').empty().append("Create order of payment first").attr('disabled', true);
                            $('.btn-upload-receipt-oop').empty().append("Create order of payment first").attr('disabled', true);

                            //reset receipt status
                            $('.payment_document_receipt').empty();

                            //remove cost breakdown
                            $('.vDIRJCTD_prev_cost_breakdown').empty();

                            //reset bill no
                            $('.vDIRJCTD_per_bill_no').empty()
                            $('.vDIRJCTD_per_bill_no_dated').empty()

                            //display no oop
                            $('.vDIRJCTD_prev_ttl_cost').empty().append('' +
                                '<div class="row ttl_item"> ' +
                                '    <div class="border border-danger text-danger col-12 text-center fs-6 fw-bold"> ' +
                                '        -- Order of payment not available -- ' +
                                '    </div> ' +
                                '</div> ' +
                                ''
                            );

                            // Uploaded oop or receipt clear
                            $('.vDIRJCTD-ofp-and-rcpt-uploads').empty().append('<div class="text-center text-danger fs-6">- - - No uploaded documents - - -</div>');
                        }
                        // endregion preview cost breakdown
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion document info

        // region perform reencryption id image
        $('.btn-vDIRJCTDreencryptId').click(function() {
            let client_id = $('#vDIRJCTDreencryptId').val();

            $.ajax({
                url: "/get-clientId-view-reencrypt/" + client_id + "/",
                method: 'GET',
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                error: function(err) {
                    console.log(err);
                }
            });

            console.log('reencrypt => ' + client_id)
        });
        // endregion perform reencryption id image
    });
</script>
{{-- endregion queries --}}
