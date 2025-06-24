{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dtCliReqRec" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead style="border-bottom: 1px solid #000;">
        <tr>
            <td>...</td>
            <th>ID</th>
            <th>Document Number</th>
            <th>Application Type</th>
            <th>Transaction Type</th>
            <th>Agency</th>
            <th>Client</th>
            <th>Classification</th>
            <th>Subclass</th>
            <th>Payment</th>
            <th>Document Attachments</th>
            <th>Action Attachments</th>
            <th>Compliance Deadline</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Request Date</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>...</th>
            <th>ID</th>
            <th>Document Number</th>
            <th>Application Type</th>
            <th>Transaction Type</th>
            <th>Agency</th>
            <th>Client</th>
            <th>Classification</th>
            <th>Subclass</th>
            <th>Payment</th>
            <th>Document Attachments</th>
            <th>Action Attachments</th>
            <th>Compliance Deadline</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Request Date</th>
        </tr>
    </tfoot>
    <tbody style="height: 200px">
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region view client id modal --}}
<div class="modal fade" id="CliReqRecviewClientIdModal" tabindex="-1" aria-labelledby="CliReqRecviewClientIdLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="CliReqRecviewClientIdLabel">Client ID View</h1>
                <button type="button" class="btn-close btn-CliReqRecreencryptId" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px;">
                <iframe id="CliReqRecviewClientIdIframe" name="viewClientIdIframe" href="" style="width: 100%; height: 100%;"></iframe>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="CliReqRecreencryptId">
                <button type="button" class="btn btn-secondary btn-CliReqRecreencryptId" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view client id modal --}}

{{-- region view doc attachment modal --}}
<div class="modal fade" id="CliReqRecvDocAtchRcvModal" tabindex="-1" aria-labelledby="CliReqRec_viewDocAtchTransitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="CliReqRec_viewDocAtchTransitLabel">Document Attachement: <b><u><span class="CliReqRecDocAtchName fs-6"></span></u></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px; overflow-y: scroll;">
                <div class="CliReqRec_vDocAtchArchCollection"></div>
                <embed id="CliReqRec_vDocAtchArchIframe" name="CliReqRec_vDocAtchArchIframe" width="100%" height="80%" style="background:url(../assets/img/denrloadsmaller.webp) center center no-repeat;">
                <div class="CliReqRec_other_req_inputs"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view doc attachment modal --}}

{{-- region view Document Info View --}}
<div class="modal fade" id="CliReqRecModal" tabindex="-1" aria-labelledby="CliReqRecLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="CliReqRecLabel">Request Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="text-center fs-3 border border-3 CliReqRecheader-status">
                STATUS UNKNOWN
            </div>

            <div class="modal-body p-0">

                {{-- region accordian --}}
                <div class="accordion" id="CliReqRec_accordian">
                    {{-- General Information --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#CliReqRec_collapsible_gen_info" aria-expanded="true" aria-controls="CliReqRec_collapsible_gen_info">
                                General Information
                            </button>
                        </h2>
                        <div id="CliReqRec_collapsible_gen_info" class="accordion-collapse collapse" data-bs-parent="#CliReqRec_accordian">
                            <div class="accordion-body">
                                <div class="row CliReqRec-content">
                                    {{-- Document Info Contents generated here --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Requestee Inputs and Attachments --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CliReqRec_collapsible_req_info" aria-expanded="false" aria-controls="CliReqRec_collapsible_req_info">
                                Requestee Inputs and Attachments
                            </button>
                        </h2>
                        <div id="CliReqRec_collapsible_req_info" class="accordion-collapse collapse" data-bs-parent="#CliReqRec_accordian">
                            <div class="accordion-body">
                                <div class="row CliReqRec_doc_inpts">
                                    --- no other information ---
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- region form inputs --}}
                    <form class="p-0" id="addCliReqRecForm">
                        {{-- Payment Status --}}
                        <div class="accordion-item" style="display: none;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CliReqRec_collapsible_pymnt_stat" aria-expanded="false" aria-controls="CliReqRec_collapsible_pymnt_stat">
                                    Payment Status
                                </button>
                            </h2>
                            <div id="CliReqRec_collapsible_pymnt_stat" class="accordion-collapse collapse" data-bs-parent="#CliReqRec_accordian">
                                <div class="accordion-body">
                                    {{-- region order of payment --}}
                                    <div class="row">
                                        <div class="col">
                                            <span class="fs-6 fw-bold">Payment Status</span>
                                            <hr>
                                            <button class="btn btn-outline-primary btn-sm btn-view-order-of-payment mb-3 CliReqRec-btn-view-order-of-payment" value="" tooltip="View order of payment" flow="right">
                                                View order of payment
                                            </button>

                                            <div class="row m-3 border border-secondary">
                                                <div class="col-12 pt-3 px-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <span class="fs-6 fw-bold">Uploaded order of payment and/or receipt preview</span>
                                                            <hr style="margin: 10px 0;">
                                                        </div>
                                                        <div class="col-md px-5 mb-3">
                                                            <label for="none" class="CliReqRec_ofp_signed_link"></label><br>
                                                            <label for="none" class="CliReqRec_cli_rcpt_link"></label>
                                                            <div class="CliReqRec-ofp-and-rcpt-uploads"></div>
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
                                                                    <div class="p-0 col-3 border-bottom border-dark fw-bold CliReqRec_per_bill_no"></div>
                                                                    <div class="p-0 col-1"></div>
                                                                    <div class="p-0 col-2 text-end">Dated: &nbsp;</div>
                                                                    <div class="p-0 col-4 border-bottom border-dark fw-bold CliReqRec_per_bill_no_dated"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6"></div>
                                                            {{-- <div class="col-6 text-primary p-1">Note: <b>per bill no.</b> is only visible for credit and accounting officer</div> --}}
                                                        @endif
                                                    </div>
                                                    <hr style="margin: 10px 0;">
                                                </div>
                                                <div class="col-12 px-5 CliReqRec_prev_cost_breakdown"></div>
                                                <div class="col-12 px-5 pb-3 CliReqRec_prev_ttl_cost"></div>
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
                        <span class="fs-6 fw-bold">Document Status</span>
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
                                    <span class="fs-6 CliReqRec_ttlDays_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 CliReqRec_ttlHours_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 CliReqRec_ttlMinutes_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 CliReqRec_ttlSeconds_ttl_tat btn btn-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion document status --}}

                <div class="row m-3 text-center">
                    <button class="btn btn-outline-primary border-0 CliReqRecscrollToTop">Return to top</button>
                    <script>
                        $(document).ready(function() {
                            $('.CliReqRecscrollToTop').click(function() {
                                $('#CliReqRecModal').scrollTop(0);
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
    <input type="hidden" id="dtCliReqRec_loader" @if ($active_tab == 'tabCliReqRec') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dtCliReqRec_func() {
            // Setup - add a text input to each footer cell
            $('#dtCliReqRec tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dtCliReqRec').dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ajax: {
                    "url": "get-specificClientReqsReceived",
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
                    /* act */
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '';
                        }
                    },
                    /* id */
                    {
                        data: 'id',
                    },
                    /* doc_no */
                    {
                        data: 'doc_no',
                        render: function(data, type, row) {
                            let doc_no = row['doc_no'];
                            let subclass = row['subclass_slug'];

                            let more_info = '' +
                                '<a' +
                                '   style="cursor: pointer" ' +
                                '   class="btn-fetchdocInfo_CliReqRec dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#CliReqRecModal"' +
                                '   data-action_id="' + row['id'] + '"' +
                                '   data-doc_id="' + row['id'] + '"' +
                                '>' +
                                '   <i class="fa fa-info-circle" aria-hidden="true"></i> Show more details' +
                                '</a>' +
                                '';

                            let showRoutingSlip = ''; //show or allow users view public documents when the request is already approved
                            let showPubDocs = ''; //show or allow users view public documents when the request is already approved
                            if (row['doc_no'] != 'unset') {
                                showRoutingSlip = '<li><a class="dropdown-item" href="/grsid/' + row['id'] + '" target="_blank" ><i class="fa fa-map-marker" aria-hidden="true"></i> Show routing slip</a></li>';
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
                                '        ' + row['doc_no'] +
                                '    </div>' +
                                '    <ul class="dropdown-menu">' +
                                '        <li>' + more_info + '</li>' +
                                '       ' + showRoutingSlip +
                                '       ' + showPubDocs +
                                '    </ul>' +
                                '</div>' +
                                '';

                            if (doc_no == 'unset') {
                                return more_info + ' | <span class="text-danger">not yet validated</span><br>';
                            } else {
                                return dropdownMenu;
                            }
                        }
                    },
                    /* application_type_id */
                    {
                        data: 'app_type',
                        render: function(data, type, row) {
                            return row['app_type'];
                        }
                    },
                    /* transaction_type_id */
                    {
                        data: 'transaction',
                        render: function(data, tyep, row) {
                            return row['transaction'];
                        }
                    },
                    /* agency */
                    {
                        data: 'agency',
                        render: function(data, type, row) {
                            let agency = row['agency'];
                            if (agency == '' || agency == null) {
                                return '<div class="text-secondary">none</div>';
                            } else {
                                return row['agency'];
                            }
                        }
                    },
                    /* client_name */
                    {
                        data: 'fname',
                        render: function(data, type, row) {

                            let client = '';
                            client += row['fname'] + ' ';
                            client += (row['mname']).charAt(0) + '. ';
                            client += row['sname'] + ' ';
                            client += row['suffix'];

                            let id_front = row['valid_id_front'] != null ? '<span class="text-success">AVAILABLE</span>' : '<span class="text-danger">N/A</span><br>';
                            let id_back = row['valid_id_back'] != null ? '<span class="text-success">AVAILABLE</span>' : '<span class="text-danger">N/A</span>';

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
                                '                  class="btnCliReqRec-viewClientId btn btn-outline-primary btn-sm" ' +
                                '                  data-bs-toggle="modal" ' +
                                '                  data-bs-target="#CliReqRecviewClientIdModal"' +
                                '                  data-client_id="' + row['client_id'] + '" ' +
                                '               >' +
                                '          VIEW' +
                                '       </button>' +
                                '           </a>' +
                                '       </li>' +
                                '    </ul>' +
                                '</div>' +
                                '';

                            return dropdownMenu;

                            return fullname;
                        }
                    },
                    /* class_id */
                    {
                        data: 'class_title',
                        render: function(data, type, row) {
                            return row['class_title'] + ' (<span class="fw-bold">' + row['class_slug'] + '</span>)';
                        }
                    },
                    /* subclass_id */
                    {
                        data: 'subclass_title',
                        render: function(data, type, row) {
                            return row['subclass_title'] + ' (<span class="fw-bold">' + row['subclass_slug'] + '</span>)';
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
                                    "   <No href='' target='_blank' >No order of payment yet</a>" +
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
                                        "   <a class='link-primary' href='/get-orderOfPayment-view-only/" + row['id'] + "/' target='_blank' tooltip='View created order of payment' flow='right'>Order of payment</a>" +
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
                    /* document attachments */
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
                                    '   class="btnCliReqRec-viewDocAtch mb-1" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#CliReqRecvDocAtchRcvModal"' +
                                    '   data-file_type="doc" ' +
                                    '   data-doc_id="' + row['id'] + '" ' +
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
                                    '   No Attachements Found' +
                                    '</span>';
                            }

                            let req_atchs_collapsible = '' +
                                '<p class="d-inline-flex gap-1">' +
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#doc_clps_atch_CliReqRec' + row['id'] + '" role="button" aria-expanded="false" aria-controls="doc_clps_atch_CliReqRec' + row['id'] + '">' +
                                '        Show Files' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="doc_clps_atch_CliReqRec' + row['id'] + '">' +
                                '    <div class="card card-body">' +
                                '       ' + disp +
                                '    </div>' +
                                '</div>' +
                                '';

                            return '' +
                                '<div class="row ps-1">' +
                                '   <div class="col">' +
                                '       ' + req_atchs_collapsible +
                                '       <input type="hidden" id="CliReqRecdoc_fileCollection' + row['id'] + '" value="' + file_names + '">' +
                                '   </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* action Attachments */
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
                                    '   class="btnCliReqRec-viewDocAtch" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#CliReqRecvDocAtchRcvModal"' +
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
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#act_clps_atch_CliReqRec' + row['id'] + '" role="button" aria-expanded="false" aria-controls="act_clps_atch_CliReqRec' + row['id'] + '">' +
                                '        Show Files' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="act_clps_atch_CliReqRec' + row['id'] + '">' +
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
                                '       <input type="hidden" id="CliReqRecact_fileCollection' + row['id'] + '" value="' + file_names + '">' +
                                '   </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* compliance_deadline */
                    {
                        data: 'compliance_deadline',
                        render: function(data, type, row) {
                            let comp_date = row['compliance_deadline'];

                            if (comp_date !== null) {
                                // change date format
                                const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                const d = new Date(comp_date);
                                let month = months[d.getMonth()];

                                // Calculate the difference
                                const now = new Date();
                                let dispTimeLaps = '';
                                if (row['stat_msg_stat'] == 'completed') {
                                    dispTimeLaps = '<br><sup class="text-success">Approved</sup>';
                                } else {
                                    let timeDiff = d - now;
                                    let daysLeft = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                                    let hoursLeft = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                                    //check if days has been passed
                                    if(Math.sign(daysLeft) == -1){
                                        dispTimeLaps = '<br><sup class="text-danger">' + Math.abs(daysLeft) + ' day/s and ' + Math.abs(hoursLeft) + '  hour/s has passed</sup>';
                                    }else{
                                        dispTimeLaps = '<br><sup class="text-secondary">' + daysLeft + ' day/s and ' + hoursLeft + ' hour/s left</sup>';
                                    }

                                }

                                return '' +
                                    '' + month.toUpperCase() + ' ' + d.getDate() + ', ' + d.getFullYear() +
                                    '<br>' + d.getHours() + ':' + (d.getMinutes() >= 10 ? d.getMinutes() : '0' + d.getMinutes()) +
                                    dispTimeLaps;
                            } else {
                                return '<div class="text-danger">not yet validated</div>';
                            }
                        }
                    },
                    /* remarks */
                    {
                        data: 'remarks',
                        render: function(data, type, row) {
                            let remarks = row['remarks'];

                            if (remarks !== null) {
                                return remarks;
                            } else {
                                return '<div class="text-secondary">none</div>';
                            }
                        }
                    },
                    /* status */
                    {
                        data: 'stat_msg',
                        render: function(data, type, row) {
                            if (row['stat_msg_stat'] == 'completed') {
                                return '<span class="text-success">' + row['stat_msg'] + '</span>';
                            } else if (row['stat_msg_stat'] == 'rejected') {
                                return '<span class="text-danger">' + row['stat_msg'] + '</span>';
                            } else {
                                return row['stat_msg'];
                            }
                        }
                    },
                    /* Request Date */
                    {
                        data: 'created_at',
                        render: function(data, type, row) {
                            if (row['created_at'] != null) {
                                let created_at = row['created_at'];

                                // Convert to Month, Day, Year format
                                const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                const d = new Date(created_at);
                                let month = months[d.getMonth()];

                                // count how many days from today
                                const today = new Date();
                                // Calculate the time difference in milliseconds
                                const timeDifference = today - d;
                                // Convert time difference from milliseconds to days
                                const daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

                                return '' +
                                    '' + month.toUpperCase() + ' ' + d.getDate() + ', ' + d.getFullYear() +
                                    '<br>' + d.getHours() + ':' + (d.getMinutes() >= 10 ? d.getMinutes() : '0' + d.getMinutes()) +
                                    '<br><sup class="text-secondary">(' + daysDifference + ' day/s ago)</sup>'
                                '';
                            } else {
                                return '<span class="text-danger">No date found</span>';
                            }
                        }
                    }
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
                        width: '15%',
                        targets: [1],
                        visible: true,
                    },
                    /* {
                        targets: [6, 7],
                        visible: false,
                    } */
                ],
                fixedColumns: {
                    left: 1
                },
                order: [
                    [0, 'desc']
                ],
                lengthChange: true,
                "pageLength": 10,
                dom: 'Brtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [{
                        extend: 'collection',
                        text: 'Actions',
                        buttons: [
                            'pageLength',
                            'colvis'
                        ]
                    },
                    {
                        // Custom Search Button
                        text: '<input class="form-control form-control-sm border-0 dtCliReqRec_search" type="text" placeholder="Search (Click here to refresh table)">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dtCliReqRec_search').val();
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
        let tabCliReqRec = false;
        $('button.btn_collapse_tabCliReqRec').click(function() {
            if (tabCliReqRec == false) {
                dtCliReqRec_func();
                tabCliReqRec = true;
            }

            $('.currently_viewing').empty().append('Client Requests List');
        });

        if ($('#dtCliReqRec_loader').val() == 'load') {
            if (tabCliReqRec == false) {
                dtCliReqRec_func();
                tabCliReqRec = true;
            }
        }
        /* endregion Call tab on click */

        $('#dtCliReqRec_wrapper .btn-group button').removeClass('btn-secondary').addClass('btn-outline-success');
    });
</script>
{{-- endregion populate table --}}

{{-- region queries --}}
<script>
    $(function() {
        // region view client id
        $('#dtCliReqRec').on('click', '.btnCliReqRec-viewClientId', function() {
            let username = $('#auth_username').val();
            let client_id = $(this).data('client_id');

            let iframeHref = '/get-clientId-view/' + username + '/' + client_id + '/';
            $('#CliReqRecviewClientIdIframe').attr('src', iframeHref);
            $('#CliReqRecreencryptId').val(client_id);
        });
        // endregion view client id

        // region view document attachment
        $('#dtCliReqRec').on('click', '.btnCliReqRec-viewDocAtch', function() {
            let username = $('#auth_username').val();
            let file_type = $(this).data('file_type');

            if (file_type == 'doc') {
                let id = $(this).data('doc_id');
                let file_path = $(this).data('doc_file_path');
                let file_name = $(this).data('doc_file_name');
                let fileCollection = $('#dtCliReqRec #CliReqRecdoc_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.CliReqRec_vDocAtchArchCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.CliReqRec_vDocAtchArchCollection').append('' + '<button class="btnCliReqRec-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>');
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#CliReqRec_vDocAtchArchIframe').attr('src');
                if (content1 != content2) {
                    $('.CliReqRecDocAtchName').empty().append(file_name);
                    $('#CliReqRec_vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
                }

                // get other requestee input
                $('.CliReqRec_other_req_inputs').empty()
                $.ajax({
                    url: "get-other-cli-req-inputs/" + id + "/",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(r) {
                        if (r.success) {
                            $('.CliReqRec_other_req_inputs').append('<hr><h6>Other Requestee Input:</h6><br>');
                            console.log('doc_id: ' + id);
                            console.log('r.req_inputs: ' + r.req_inputs);

                            if (r.req_inputs.length >= 1) {
                                r.req_inputs.forEach(dt => {
                                    $('.CliReqRec_other_req_inputs').append('' +
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
                                $('.CliReqRec_other_req_inputs').append('' +
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

                })
            } else if (file_type == 'act') {
                let id = $(this).data('act_id');
                let file_path = $(this).data('act_file_path');
                let file_name = $(this).data('act_file_name');
                let fileCollection = $('#dtCliReqRec #CliReqRecact_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.CliReqRec_vDocAtchArchCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.CliReqRec_vDocAtchArchCollection').append('<button class="btnCliReqRec-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>');
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#CliReqRec_vDocAtchArchIframe').attr('src');
                if (content1 != content2) {
                    $('.CliReqRecDocAtchName').empty().append(file_name);
                    $('#CliReqRec_vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
                }

                //remove content
                $('.CliReqRec_other_req_inputs').empty();
            }
        });
        // endregion view document attachment

        // region view document attachment collection
        $('.CliReqRec_vDocAtchArchCollection').on('click', '.btnCliReqRec-view-file', function() {
            let file_path = $(this).data('file_path');
            let file_name = $(this).data('file_name');

            let iframeHref = '/' + file_path + '/' + file_name;
            $('.CliReqRecDocAtchName').empty().append(file_name);
            $('#CliReqRec_vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
        });
        // endregion view document attachment collection

        // region document info
        $('#dtCliReqRec').on('click', '.btn-fetchdocInfo_CliReqRec', function() {
            let action_id = $(this).data('action_id');
            let doc_id = $(this).data('doc_id');

            //client order of payment
            $('.btn-view-order-of-payment').val(doc_id);

            // set action id for receive
            // not is not used here but is not remove beceuse it might be used later
            $('#CliReqRecaction_id').val(action_id);
            $('#CliReqRecdoc_id').val(doc_id);

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
                            $('.CliReqRecheader-status').empty().append('<i class="fa fa-check-circle" aria-hidden="true"></i> VERIFIED');
                            $('.CliReqRecheader-status').removeClass('border-danger text-danger').addClass('border-success text-success');
                        } else {
                            $('.CliReqRecheader-status').empty().append('<i class="fa fa-hourglass" aria-hidden="true"></i> NOT YET VERIFIED');
                            $('.CliReqRecheader-status').removeClass('border-success text-success').addClass('border-danger text-danger');
                        }
                        // endregion status bar

                        $('.CliReqRec-content').empty().append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Tracking No.: <br>' + (doc_no != 'unset' ? '<span class="fw-bold fs-6">' + doc_no + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT YET VALIDATED</span>') + '</div>' +
                            '<div class="col-md-4 mb-2 fs-6">Compliance Date: <br>' + (compliance_deadline != null ? '<span class="fw-bold fs-6">' + compliance_deadline + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT YET VALIDATED</span>') + '</div>' +
                            '<hr>' +
                            ''
                        );

                        $('.CliReqRec-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Classification: <br><span class="fw-bold fs-6">' + doc_class_full.toUpperCase() + ' — (' + class_slug + ')</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Document Type: <br><span class="fw-bold fs-6">' + doc_type_full.toUpperCase() + ' — (' + subclass_slug + ')</span></div>' +
                            ''
                        );

                        $('.CliReqRec-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Application type: <br><span class="fw-bold fs-6">' + applicant.toUpperCase() + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Transaction Type: <br><span class="fw-bold fs-6">' + transaction.toUpperCase() + ' (' + transaction_slug + ')</span></div>' +
                            agency_disp +
                            '<hr>' +
                            ''
                        );

                        $('.CliReqRec-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Client Name: <br><span class="fw-bold fs-6">' + client_fname + ' ' + client_mname.charAt(0) + '. ' + client_sname + ' ' + (client_suffix != null ? client_suffix : '') + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Email: <br><span class="fw-bold fs-6">' + client_email + ' (' + (client_email_verify == 1 ? '<span class="text-success">VERIFIED</span>' : '<span class="text-danger">NOT VERIFIED</span>') + ')</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Contact Number: <br><span class="fw-bold fs-6">' + client_contact_no + '</span></div>' +
                            ''
                        );

                        $('.CliReqRec-content').append('' +
                            '<div class="col-md-12 fs-6">Client Address: <br><span class="fw-bold fs-6">' + client_address + '</span></div>' +
                            ''
                        );

                        $('#CliReqRecremarks').val(remarks);

                        // region document attachments and inputs
                        let filecount = 0;
                        let inptcount = 0;
                        let app_doc_form_no = 0; //appform start from 0 
                        $('.CliReqRec_doc_atch').empty(); // make sure to empty the list
                        $('.CliReqRec_doc_inpts').empty(); // make sure to empty the list
                        doc_attachments.forEach(dt => {

                            if (dt.attachment_type == 'file') {
                                // file attachments
                                filecount += 1;
                                if (app_doc_form_no != dt.app_form_no) {
                                    $('.CliReqRec_doc_inpts').append('' +
                                        '<div class="col-md-12 fs-6 mb-3"> ' +
                                        '   <hr>' +
                                        '   <span class="fw-bold"><i class="fa fa-file" aria-hidden="true"></i> Application Form ' + dt.app_form_no + '</span>: ' +
                                        '</div>' +
                                        ''
                                    );
                                    app_doc_form_no = dt.app_form_no;
                                }
                                $('.CliReqRec_doc_inpts').append('' +
                                    '<a class="col-md-2 ms-3 mb-1 fs-6 border border-primary rounded" href="/' + dt.file_path + '/' + dt.file_name + '" target="_blank" tooltip="' + dt.file_name + '" flow="down"><i class="fa fa-file-o" aria-hidden="true"></i> ' + dt.req_slug + '</a>'
                                );
                            } else {
                                // field inputs
                                inptcount += 1;
                                $('.CliReqRec_doc_inpts').append('' +
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
                            $('.CliReqRec_doc_atch').append('' +
                                '--- no attachment found ---'
                            );
                        }
                        /* if (inptcount == 0) {
                            $('.CliReqRec_doc_inpts').append('' +
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
                                    relese_stat_disp = '<div class="border border-2 border-success bg-white text-success text-center fs-5 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i><br>Done</div>';
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

                        $('.CliReqRec_ttlDays_ttl_tat').empty().text(ttlDays_ttl_tat + ' Days');
                        $('.CliReqRec_ttlHours_ttl_tat').empty().text(ttlHours_ttl_tat + ' Hours');
                        $('.CliReqRec_ttlMinutes_ttl_tat').empty().text(ttlMinutes_ttl_tat + ' Minutes');
                        $('.CliReqRec_ttlSeconds_ttl_tat').empty().text(ttlSeconds_ttl_tat + ' Seconds');
                        // endregion document status

                        // region preview cost breakdown
                        let total_of_cost_break_down = 0;
                        $('.CliReqRec_ofp_signed_link').empty(); //remove link viewable for uploaded oop or receipt
                        $('.CliReqRec_cli_rcpt_link').empty(); //remove link viewable for uploaded oop or receipt
                        $('.CliReqRec-ofp-and-rcpt-uploads').empty(); //remove link viewable for uploaded oop or receipt
                        if (order_of_payment != null) {

                            // region get order of payment uploaded document links
                            if (order_of_payment.order_of_payment != null) {
                                $('.CliReqRec_ofp_signed_link').empty().append('<a class="link-primary fs-6" href="' + order_of_payment.order_of_payment + '" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Order of payment</a>');
                            }

                            if (order_of_payment.payment_receipt != null) {
                                $('.CliReqRec_cli_rcpt_link').empty().append('<a class="link-primary fs-6" href="' + order_of_payment.payment_receipt + '" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Receipt</a>');
                            }

                            if (order_of_payment.order_of_payment == null && order_of_payment.payment_receipt == null) {
                                $('.CliReqRec-ofp-and-rcpt-uploads').empty().append('<div class="text-center text-danger fs-6">- - - No uploaded documents - - -</div>');
                            }
                            // endregion get order of payment uploaded document links

                            //perbill
                            $('.CliReqRec_per_bill_no').empty().append(order_of_payment.per_bill_no);
                            $('.CliReqRec_per_bill_no_dated').empty().append(order_of_payment.per_bill_no_dated);

                            //cost
                            if (cost_breakdown.length != 0) {
                                $('.CliReqRec_prev_cost_breakdown').empty().append('' +
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
                                    $('.CliReqRec_prev_cost_breakdown').append('' +
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
                                        $('.CliReqRec_prev_cost_breakdown').append('' +
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

                                            $('.CliReqRec_prev_cost_breakdown').append('' +
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
                                    $('.CliReqRec_prev_ttl_cost').empty().append('' +
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
                                $('.CliReqRec_prev_cost_breakdown').empty(); //clear the cost breakdown

                                // add the additional cost to the total amount to be paid
                                total_of_cost_break_down = 0;

                                // add the additional cost to the total amount to be paid
                                if (additional_oop.length != 0) {
                                    $('.CliReqRec_prev_cost_breakdown').append('' +
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

                                        $('.CliReqRec_prev_cost_breakdown').append('' +
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
                                $('.CliReqRec_prev_ttl_cost').empty().append('' +
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
                            $('.CliReqRec_prev_cost_breakdown').empty();

                            //reset bill no
                            $('.CliReqRec_per_bill_no').empty()
                            $('.CliReqRec_per_bill_no_dated').empty()

                            //display no oop
                            $('.CliReqRec_prev_ttl_cost').empty().append('' +
                                '<div class="row ttl_item"> ' +
                                '    <div class="border border-danger text-danger col-12 text-center fs-6 fw-bold"> ' +
                                '        -- Order of payment not available -- ' +
                                '    </div> ' +
                                '</div> ' +
                                ''
                            );

                            // Uploaded oop or receipt clear
                            $('.CliReqRec-ofp-and-rcpt-uploads').empty().append('<div class="text-center text-danger fs-6">- - - No uploaded documents - - -</div>');
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
        $('.btn-CliReqRecreencryptId').click(function() {
            let client_id = $('#CliReqRecreencryptId').val();

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
        
        // region generate update order of payment
        $('.btn-view-order-of-payment').click(function(e) { //this affect all view buttons for view order of payment
            e.preventDefault();

            let doc_id = $(this).val();

            window.open('/get-orderOfPayment-view-only/' + doc_id + '/');
        });
        // endregion generate update order of payment
    });
</script>
{{-- endregion queries --}}
