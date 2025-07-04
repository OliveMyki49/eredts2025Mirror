{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTReceived" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0">
    <thead style="border-bottom: 1px solid #000;">
        <tr>
            <th>...</th>
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
            <th>...</th>
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
<div class="modal fade" id="vwCliIdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vwCliIdLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vwCliIdLabel">Client ID View</h1>
                <button type="button" class="btn-close btn-vwCliIdreencryptId" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px;">
                <iframe id="vwCliIdIframe" name="viewClientIdIframe" href="" style="width: 100%; height: 100%;"></iframe>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="vwCliIdreencryptId">
                <button type="button" class="btn btn-secondary btn-vwCliIdreencryptId" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view client id modal --}}

{{-- region view doc attachment modal --}}
<div class="modal fade" id="vDocAtchRcvModal" tabindex="-1" aria-labelledby="vDocAtchRcvLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDocAtchRcvLabel">Document Attachment: <b><u><span class="viewDocAtchNameReceived fs-6"></span></u></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px; overflow-y: scroll;">
                <div class="viewDocAtchReceivedCollection"></div>
                <embed id="viewDocAtchReceivedIframe" name="viewDocAtchReceivedIframe" width="100%" height="80%" style="background:url(../assets/img/denrloadsmaller.webp) center center no-repeat;">
                <div class="viewDocAtchReceived_other_req_inputs"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view doc attachment modal --}}

{{-- region view Document Info View --}}
<div class="modal fade" id="vDIRModal" tabindex="-1" aria-labelledby="vDIRLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDIRLabel">REQUEST INFORMATION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="text-center fs-3 border border-3 vDIRheader-status">
                STATUS UNKNOWN
            </div>

            <div class="modal-body p-0">

                {{-- region accordian --}}
                <div class="accordion" id="vDIR_accordian">
                    {{-- GENERAL INFORMATION --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIR_collapsible_gen_info" aria-expanded="false" aria-controls="vDIR_collapsible_gen_info">
                                GENERAL INFORMATION
                            </button>
                        </h2>
                        <div id="vDIR_collapsible_gen_info" class="accordion-collapse collapse" data-bs-parent="#vDIR_accordian">
                            <div class="accordion-body">
                                <div class="row vDIR_content">
                                    {{-- Document Info Contents generated here --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- REQUESTEE INPUTS AND ATTACHMENTS --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIR_collapsible_req_info" aria-expanded="false" aria-controls="vDIR_collapsible_req_info">
                                REQUESTEE INPUTS AND ATTACHMENTS
                            </button>
                        </h2>
                        <div id="vDIR_collapsible_req_info" class="accordion-collapse collapse" data-bs-parent="#vDIR_accordian">
                            <div class="accordion-body">
                                <div class="row vDIR_doc_inpts">
                                    --- no other information ---
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- region form inputs --}}
                    <form class="p-0" id="addvDIRForm">
                        {{-- Document Verifification and Compliance Date --}}
                        <div class="accordion-item acc_item_set_comp_form">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIR_collapsible_doc_ver_n_comp_date" aria-expanded="false" aria-controls="vDIR_collapsible_doc_ver_n_comp_date">
                                    DOCUMENT VERIFICATION AND COMPLIANCE DATE
                                </button>
                            </h2>
                            <div id="vDIR_collapsible_doc_ver_n_comp_date" class="accordion-collapse collapse" data-bs-parent="#vDIR_accordian">
                                <div class="accordion-body">
                                    {{-- region verify document and set compliance date --}}
                                    <div class="row set_compliance_form">
                                        <div class="col">
                                            <label for="vDIRaction_taken" class="form-label fs-6">Set Compliance Date:</label>
                                            <select name="process_length" id="vDIRprocess_length" class="form-control">
                                                <option value="n/a">-- CHOOSE PROCESS LENGTH --</option>
                                            </select>
                                            <br>
                                            <div class="row m-0">
                                                <div class="col-md-8 mb-2">
                                                    <label for="vDIRdoc_track_no" class="form-label fs-6">Document Tracking No.: </label>
                                                    <input type="hidden" id="vDIRorigin_office_docnofetch">
                                                    <input type="hidden" id="vDIRsubclass_slug_docnofetch">
                                                    <input type="hidden" id="vDIRdoc_id_docnofetch">
                                                    <input type="text" id="vDIRdoc_track_no" name="doc_track_no" class="form-control toUpperCase" placeholder="Doc no generated on date input..." readonly="true">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label for="vDIRcomp_date" class="form-label fs-6">Compliance Date & Time</label>
                                                    <div class="d-flex flex-row mb-3">
                                                        <div><input type="date" class="form-control" id="vDIRcomp_date" name="comp_date"></div>
                                                        <div class="ps-2"><input type="time" class="form-control" id="vDIRcomp_time" name="comp_time"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-primary border border-primary p-2 mx-5">
                                                <div class="col-md-2">
                                                    NOTE:
                                                </div>
                                                <div class="col-10">
                                                    - CALCULATION OF COMPLIANCE DATE DOES NOT INCLUDE WEEKENDS (SATURDAY & SUNDAY),
                                                </div>
                                                <div class="col-md-2">
                                                    &nbsp;
                                                </div>
                                                <div class="col-10">
                                                    - ONCE COMPLIANCE DATE IS SET, DOCUMENT TRACKING NUMBER WILL
                                                    BE GENERATED,
                                                </div>
                                                <div class="col-md-2">
                                                    &nbsp;
                                                </div>
                                                <div class="col-10">
                                                    - AND VERIFICATION STATUS WILL BE SET TO VERIFIED;
                                                </div>
                                                <div class="col-md-2">
                                                    &nbsp;
                                                </div>
                                                <div class="col-10">
                                                    - AN EMAIL WITH THE DOCUMENT TRACKING NUMBER WILL ALSO BE SENT
                                                    TO THE EMAIL OF THE REQUESTING CLIENT
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endregion verify document and set compliance date --}}
                                </div>
                            </div>
                        </div>

                        {{-- PAYMENT STATUS --}}
                        <div class="accordion-item" style="display: none;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIR_collapsible_pymnt_stat" aria-expanded="false" aria-controls="vDIR_collapsible_pymnt_stat">
                                    PAYMENT STATUS
                                </button>
                            </h2>
                            <div id="vDIR_collapsible_pymnt_stat" class="accordion-collapse collapse" data-bs-parent="#vDIR_accordian">
                                <div class="accordion-body">
                                    {{-- region create order of payment --}}
                                    <div class="row">
                                        <div class="col p-3">
                                            <button class="btn btn-outline-primary btn-sm btn-create-order-of-payment mb-3 " value="" tooltip="Create order of payment" flow="right">
                                                Create / update main order of payment
                                            </button>

                                            <button class="btn btn-outline-primary btn-sm btn-view-order-of-payment mb-3 vDocAtchRcv-btn-view-order-of-payment" value="" tooltip="View order of payment" flow="right">
                                                View order of payment
                                            </button>

                                            <button class="btn btn-outline-primary btn-sm btn-send-billing-to-client mb-3 " value="" tooltip="Send billing to client via email" flow="right">
                                                Send Billing
                                            </button>

                                            <div class="row m-3 p-3 border border-secondary additional_pymnt_doc_atch">
                                                <div class="col-md-12">
                                                    <span class="fs-6 fw-bold">Additional order of payment</span>
                                                    <hr style="margin: 10px 0;">
                                                </div>

                                                <div class="col-md-12 other-order-of-payment-cont">

                                                </div>
                                            </div>

                                            <div class="row m-3 p-3 border border-secondary pymnt_doc_atch">
                                                <div class="col-md-12">
                                                    <span class="fs-6 fw-bold">Payment Document Attachments</span>
                                                    <hr style="margin: 10px 0;">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md mb-3">
                                                            <label for="vDocAtchRcv_ofp_signed" class="form-label fs-6 fw-bold">Signed Order Of Payment:</label>
                                                            <input type="file" id="vDocAtchRcv_ofp_signed" name="ofp_signed" class="form-control">
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-center">
                                                            <button class="btn btn-outline-primary btn-sm btn-upload-signed-oop" tooltip="upload signed order of payment" flow="down">Upload</button>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md mb-3">
                                                            <label for="vDocAtchRcv_cli_rcpt" class="form-label fs-6 fw-bold">Client Receipt:</label>
                                                            <input type="file" id="vDocAtchRcv_cli_rcpt" name="client_receipt" class="form-control">
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-center">
                                                            <button class="btn btn-outline-primary btn-sm btn-upload-receipt-oop" tooltip="upload client receipt" flow="down">Upload</button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 payment_document_receipt">
                                                    {{-- payment receipt show when uploaded by client --}}
                                                </div>
                                            </div>

                                            <div class="row m-3 border border-secondary">
                                                <div class="col-12 pt-3 px-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <span class="fs-6 fw-bold">Uploaded order of payment and/or receipt preview</span>
                                                            <hr style="margin: 10px 0;">
                                                        </div>
                                                        <div class="col-md px-5 mb-3">
                                                            <label for="none" class="vDocAtchRcv_ofp_signed_link"></label><br>
                                                            <label for="none" class="vDocAtchRcv_cli_rcpt_link"></label>
                                                            <div class="vDocAtchRcv-ofp-and-rcpt-uploads"></div>
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
                                                                    <div class="p-0 col-3 border-bottom border-dark fw-bold vDIR_per_bill_no"></div>
                                                                    <div class="p-0 col-1"></div>
                                                                    <div class="p-0 col-2 text-end">Dated: &nbsp;</div>
                                                                    <div class="p-0 col-4 border-bottom border-dark fw-bold vDIR_per_bill_no_dated"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6"></div>
                                                            {{-- <div class="col-6 text-primary p-1">Note: <b>per bill number</b> is only visible for processor, credit and accounting officer</div> --}}
                                                        @endif
                                                    </div>
                                                    <hr style="margin: 10px 0;">
                                                </div>
                                                <div class="col-12 px-5 vDIR_prev_cost_breakdown"></div>
                                                <div class="col-12 px-5 pb-3 vDIR_prev_ttl_cost"></div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endregion create order of payment --}}
                                </div>
                            </div>
                        </div>

                        {{-- Document Action --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#vDIR_collapsible_doc_act" aria-expanded="false" aria-controls="vDIR_collapsible_doc_act">
                                    DOCUMENT ACTION
                                </button>
                            </h2>
                            <div id="vDIR_collapsible_doc_act" class="accordion-collapse show" data-bs-parent="#vDIR_accordian">
                                <div class="accordion-body">
                                    {{-- region actions here --}}
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                {{-- region important do not remove --}}
                                                <input type="hidden" id="vDIRaction_id" name="action_id">
                                                <input type="hidden" id="vDIRdoc_id" name="doc_id">
                                                {{-- endregion important do not remove --}}

                                                <div class="row gen_cert">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="vDIRaction_taken" class="form-label fs-6 fw-bold">Document Action: <span class="text-danger">(required)</span></label>
                                                        <select name="doc_action" id="vDIRdoc_action" class="form-control">
                                                            <option value="n/a">-- CHOOSE ACTION --</option>
                                                            <option value="for_release">FORWARD TO</option>
                                                            <option value="final_action">FINAL ACTION</option>
                                                            <option value="rejected">REJECT</option>
                                                        </select>
                                                    </div>

                                                    {{-- choose where office to release --}}
                                                    <div class="col-md-12 mb-3 vDIRdoc_action_other">
                                                        <div class="addSendToListvDIRmsg"></div>
                                                        <label for="addSendTovDIR" class="form-label fs-6 fw-bold">Choose Office: <span class="text-danger"></span></label>
                                                        <div class="vDIRdoc_action_other_toggle border border-secondary px-2 rounded">
                                                            <div id="addSendToListvDIR" class="row">
                                                                {{-- populate send to office here --}}
                                                            </div>
                                                            <input type="text" class="form-control fs-6 p-0 border-0" placeholder="Search by office name . . ." id="addSendTovDIR">
                                                            <div class="col" style="position: relative">
                                                                <ul class="list-group addPWB-searchResult" style="position:absolute ;z-index: 100"></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <hr> --}}

                                                {{-- region Subject modification here --}}
                                                {{-- <div class="p-2 my-1 border rounded"> --}}
                                                <div class="row">
                                                    <div class="col-md mb-3">
                                                        <label for="vDIR_subject" class="form-label fs-6 fw-bold">Subject: <span class="text-danger">(required)</span></label>
                                                        <textarea type="text" id="vDIR_subject" name="subject" class="form-control" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                {{-- </div> --}}
                                                {{-- endregion Attachments here --}}

                                                {{-- <hr> --}}

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="vDIRaction_taken" class="form-label fs-6 fw-bold">Action Taken: <span class="text-danger">(required)</span></label>
                                                        <input type="text" id="vDIRaction_taken" name="action_taken" class="form-control toUpperCase" placeholder="Action remarks here...">
                                                        <div class="action_rejected_container"></div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="vDIRremarks" class="form-label fs-6 fw-bold">Document Remarks: </label>
                                                        <input type="text" id="vDIRremarks" name="remarks" class="form-control toUpperCase" placeholder="Document remarks here..." disabled>
                                                    </div>
                                                </div>

                                                {{-- region Attachments here --}}
                                                <div class="p-2 my-1 border rounded">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vDIR_attachment_remarks" class="form-label fs-6 fw-bold">Attachment Remarks: <span class="text-primary">(optional)</span></label>
                                                            <textarea type="text" id="vDIR_attachment_remarks" name="attachment_remarks" class="form-control toUpperCase" placeholder=""></textarea>
                                                        </div>
                                                        <div class="col-md-6 mb-3 mt-4">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btnvDIRAddAtchs" tooltip="Only allows PDF file" flow="right">
                                                                <span class="fa-stack fa-sm">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-file fa-stack-1x fa-inverse"></i>
                                                                    <i class="fa fa-plus fa-stack-1x"></i>
                                                                </span>
                                                                Add Attachment
                                                            </button>
                                                            <div class="row vDIRAtchCtnr p-2">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- endregion Attachments here --}}

                                                {{-- reject document confirmation --}}
                                                <div class="rowp-2 my-1 ">
                                                    <div class="col-md-12 my-2 vDIRdoc_action_reject_toggle border border-2 border-danger rounded">
                                                        <div class="p-2 text-danger fs-6 px-3">
                                                            I hereby agree that once this action is submitted, this request will be rejected and cannot be undone.
                                                            <hr style="magin: 10px 0;">
                                                            <div class="form-check">
                                                                <input class="form-check-input align-self-center" type="checkbox" value="1" style="height: 20px; width: 20px;" id="vDIR_reject_doc_checker" name="doc_reject">
                                                                <label class="form-check-label text-danger fs-6 fw-bold px-3" for="vDIR_reject_doc_checker">
                                                                    I AGREE
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-outline-success btn-vDIR-submit" data-bs-dismiss="modal">PERFORM ACTION</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endregion actions here --}}
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
                                <tbody class="tbody-vDocAtchRcv-doc_status">
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
                                    <span class="fs-6 vDIR_ttlDays_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIR_ttlHours_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIR_ttlMinutes_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIR_ttlSeconds_ttl_tat btn btn-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion document status --}}

                <div class="row m-3 text-center">
                    <button class="btn btn-outline-primary border-0 vDIRscrollToTop">Return to top</button>
                    <script>
                        $(document).ready(function() {
                            $('.vDIRscrollToTop').click(function() {
                                $('#vDIRModal').scrollTop(0);
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
    <input type="hidden" id="dTReceived_loader" @if ($active_tab == 'tabReceived') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTReceived_func() {
            // Setup - add a text input to each footer cell
            $('#dTReceived tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTReceived').dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ajax: {
                    "url": "get-clientReqReceived",
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
                    /* subject */
                    {
                        data: 'subject',
                        render: function(data, type, row) {
                            let id = row['id'];
                            let subclass = row['subclass_slug'];
                            let act_seen = row['act_seen_id'];

                            let more_info = '' +
                                '<a' +
                                '   style="cursor: pointer" ' +
                                '   class="btn-fetchdocInfo_vDIR dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#vDIRModal"' +
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
                                '<div class="dropdown" id="rcvd_act_' + id + '">' +
                                '    <div ' +
                                '       data-bs-toggle="dropdown" ' +
                                '       aria-expanded="false" ' +
                                '       style="cursor: pointer" ' +
                                '       onMouseOut="this.style.color=`#000`" ' +
                                '       onMouseOver="this.style.color=`#0d6efd`" ' +
                                '    >' +
                                '        <span class="text-primary">' + subclass + '</span>: ' + (row['subject']).toUpperCase() +
                                '    </div>' +
                                '    <ul class="dropdown-menu" style="z-index: 999;">' +
                                '        <li>' + more_info + '</li>' +
                                '       ' + showRoutingSlip +
                                '       ' + showPubDocs +
                                '    </ul>' +
                                '</div>' +
                                '';

                            let lbl_seen = '';
                            // change background of tr
                            if (act_seen != null) {
                                // $('#rcvd_act_' + id).closest('tr').css('background-color', '#c4c4c4b8');

                                //set label as seend
                                lbl_seen = '' +
                                    '<div ' +
                                    '   class="text-secondary"' +
                                    '   style="' +
                                    '    display: inline-block;' +
                                    '    font-size: 15px;' +
                                    '">Seen</div>';
                            }

                            return dropdownMenu + lbl_seen;
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
                                            "<div class='text-center text-white bg-danger rounded>" +
                                            "   Receipt Not Yet Verified" +
                                            "</span>";
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
                                '                  class="btnvDIR-viewClientId btn btn-outline-primary btn-sm" ' +
                                '                  data-bs-toggle="modal" ' +
                                '                  data-bs-target="#vwCliIdModal"' +
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
                                    '   class="btnvDIR-viewDocAtch mb-1" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDocAtchRcvModal"' +
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
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#doc_clps_atch_DIR' + row['id'] + '" role="button" aria-expanded="false" aria-controls="doc_clps_atch_DIR' + row['id'] + '">' +
                                '        Show Files' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="doc_clps_atch_DIR' + row['id'] + '">' +
                                '    <div class="card card-body">' +
                                '       ' + disp +
                                '    </div>' +
                                '</div>' +
                                '';

                            return '' +
                                '<div class="row ps-1">' +
                                '   <div class="col">' +
                                '       ' + req_atchs_collapsible +
                                '       <input type="hidden" id="vDIRdoc_fileCollection' + row['id'] + '" value="' + file_names + '">' +
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
                                    '   class="btnvDIR-viewDocAtch" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDocAtchRcvModal"' +
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
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#act_clps_atch_DIR' + row['id'] + '" role="button" aria-expanded="false" aria-controls="act_clps_atch_DIR' + row['id'] + '">' +
                                '        Show Files' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="act_clps_atch_DIR' + row['id'] + '">' +
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
                                '       <input type="hidden" id="vDIRact_fileCollection' + row['id'] + '" value="' + file_names + '">' +
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
                            const d = new Date(new Date(row['created_at']).toLocaleString('en-US', {
                                timeZone: 'Asia/Manila'
                            }));
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
                    /* {
                        targets: [3, 4, 5, 6, 7, 8, 9],
                        visible: false,
                    } */
                ],
                fixedColumns: {
                    left: 1
                },
                order: [
                    [11, 'desc'] /* update by last updated action */
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
                        text: '<input class="form-control form-control-sm border-0 dTReceived_search" type="text" placeholder="Search (Click to refresh)">',
                        action: function(e, dt, node, config) {
                            var searchValue = $(node).find('.dTReceived_search').val();
                            dt.search(searchValue).draw();
                        }
                    }
                ],
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;

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
        let tabReceived = false;
        $('button.btn_collapse_tabReceived').click(function() {
            if (tabReceived == false) {
                dTReceived_func();
                tabReceived = true;
            }

            $('.currently_viewing').empty().append('Received');
        });

        if ($('#dTReceived_loader').val() == 'load') {
            if (tabReceived == false) {
                dTReceived_func();
                tabReceived = true;
            }
        }
        /* endregion Call tab on click */

        $('#dTReceived_wrapper .btn-group button').removeClass('btn-secondary').addClass('btn-outline-success');
    });
</script>
{{-- endregion populate table --}}

{{-- region queries --}}
<script>
    $(function() {
        // region view client id
        $('#dTReceived').on('click', '.btnvDIR-viewClientId', function() {
            let username = $('#auth_username').val();
            let client_id = $(this).data('client_id');

            let iframeHref = '/get-clientId-view/' + username + '/' + client_id + '/';
            $('#vwCliIdIframe').attr('src', iframeHref);
            $('#vwCliIdreencryptId').val(client_id);
        });
        // endregion view client id

        // region view document attachment
        $('#dTReceived').on('click', '.btnvDIR-viewDocAtch', function() {
            let username = $('#auth_username').val();
            let file_type = $(this).data('file_type');

            if (file_type == 'doc') {
                let id = $(this).data('doc_id'); // this is the id of action but named doc id because there is action id for attachment below
                let real_doc_id = $(this).data('real_doc_id'); // real document id
                let file_path = $(this).data('doc_file_path');
                let file_name = $(this).data('doc_file_name');
                let fileCollection = $('#dTReceived #vDIRdoc_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.viewDocAtchReceivedCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.viewDocAtchReceivedCollection').append('<button class="btnvDIR-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>')
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#viewDocAtchReceivedIframe').attr('src');
                if (content1 != content2) {
                    $('.viewDocAtchNameReceived').empty().append(file_name);
                    $('#viewDocAtchReceivedIframe').attr('src', iframeHref + '#toolbar=0');
                }

                // region get other requestee input
                $('.viewDocAtchReceived_other_req_inputs').empty()
                $.ajax({
                    url: "get-other-cli-req-inputs/" + real_doc_id + "/",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(r) {
                        if (r.success) {
                            $('.viewDocAtchReceived_other_req_inputs').append('<hr><h6>Other Requestee Input:</h6><br>');

                            if (r.req_inputs.length >= 1) {
                                r.req_inputs.forEach(dt => {
                                    $('.viewDocAtchReceived_other_req_inputs').append('' +
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
                                $('.viewDocAtchReceived_other_req_inputs').append('' +
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
                let fileCollection = $('#dTReceived #vDIRact_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.viewDocAtchReceivedCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.viewDocAtchReceivedCollection').append('<button class="btnvDIR-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>')
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#viewDocAtchReceivedIframe').attr('src');
                if (content1 != content2) {
                    $('.viewDocAtchNameReceived').empty().append(file_name);
                    $('#viewDocAtchReceivedIframe').attr('src', iframeHref + '#toolbar=0');
                }

                //remove content
                $('.viewDocAtchReceived_other_req_inputs').empty();
            }
        });
        // endregion view document attachment

        // region view document attachment collection
        $('.viewDocAtchReceivedCollection').on('click', '.btnvDIR-view-file', function() {
            let file_path = $(this).data('file_path');
            let file_name = $(this).data('file_name');

            let iframeHref = '/' + file_path + '/' + file_name;
            $('.viewDocAtchNameReceived').empty().append(file_name);
            $('#viewDocAtchReceivedIframe').attr('src', iframeHref + '#toolbar=0');
        });
        // endregion view document attachment collection

        // region document info
        $('#dTReceived').on('click', '.btn-fetchdocInfo_vDIR', function() {

            console.clear(); //empty console before adding new

            let action_id = $(this).data('action_id');
            let doc_id = $(this).data('doc_id');

            //prevent scrambling document tracking number by clearing it every time a new tab is opened
            $('#vDIRdoc_track_no').val('');
            $('#vDIRcomp_date').val('');
            $('#vDIRcomp_time').val('');

            // set doc_id for creating order of payment
            $('.btn-create-order-of-payment').val(doc_id);
            $('.btn-view-order-of-payment').val(doc_id);
            $('.btn-send-billing-to-client').val(doc_id);

            // region set action id for receive
            $('#vDIRaction_id').val(action_id);
            $('#vDIRdoc_id').val(doc_id);
            // endregion set action id for receive

            // region get document info
            $.ajax({
                url: "/get-docInfos/" + doc_id + "/",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    // region success query
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

                        // origin office 
                        let origin_office = "";

                        // additional order of payment
                        let additional_oop = r.additional_oop;

                        // subject details and set 
                        let subject = r.doc_stats[0].subject;

                        $('#vDIR_subject').empty();
                        if (subject != null) {
                            $('#vDIR_subject').val(subject);
                        }


                        // region display agency Government to Government (G2G)
                        let agency_disp = '';
                        if (transaction_slug == 'G2G') {
                            agency_disp = '<div class="col-md-4 mb-2 fs-6">Agency: <br>' + (agency != null ? '<span class="fw-bold fs-6">' + agency + '</span>' : '<span class="fw-bold fs-6 text-secondary">NOT AVAILABLE</span>') + '</div>'
                        }
                        // endregion display agency Government to Government (G2G)

                        if (validated != null) {
                            $('.vDIRheader-status').empty().append('<i class="fa fa-check-circle" aria-hidden="true"></i> VERIFIED');
                            $('.vDIRheader-status').removeClass('border-danger text-danger').addClass('border-success text-success');
                        } else {
                            $('.vDIRheader-status').empty().append('<i class="fa fa-hourglass" aria-hidden="true"></i> NOT YET VERIFIED');
                            $('.vDIRheader-status').removeClass('border-success text-success').addClass('border-danger text-danger');
                        }

                        $('.vDIR_content').empty().append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Tracking No.: <br>' + (doc_no != 'unset' ? '<span class="fw-bold fs-6">' + doc_no + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT YET VALIDATED</span>') + '</div>' +
                            '<div class="col-md-4 mb-2 fs-6">Compliance Date: <br>' + (compliance_deadline != null ? '<span class="fw-bold fs-6">' + compliance_deadline + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT YET VALIDATED</span>') + '</div>' +
                            '<hr>' +
                            ''
                        );

                        $('.vDIR_content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Classification: <br><span class="fw-bold fs-6">' + doc_class_full.toUpperCase() + ' — (' + class_slug + ')</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Document Type: <br><span class="fw-bold fs-6">' + doc_type_full.toUpperCase() + ' — (' + subclass_slug + ')</span></div>' +
                            ''
                        );

                        $('.vDIR_content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Application type: <br><span class="fw-bold fs-6">' + applicant.toUpperCase() + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Transaction Type: <br><span class="fw-bold fs-6">' + transaction.toUpperCase() + ' (' + transaction_slug + ')</span></div>' +
                            agency_disp +
                            '<hr>' +
                            ''
                        );

                        $('.vDIR_content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Client Name: <br><span class="fw-bold fs-6">' + client_fname + ' ' + client_mname.charAt(0) + '. ' + client_sname + ' ' + (client_suffix != null ? client_suffix : '') + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Email: <br><span class="fw-bold fs-6">' + client_email + ' (' + (client_email_verify == 1 ? '<span class="text-success">VERIFIED</span>' : '<span class="text-danger">NOT VERIFIED</span>') + ')</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Contact Number: <br><span class="fw-bold fs-6">' + client_contact_no + '</span></div>' +
                            ''
                        );

                        $('.vDIR_content').append('' +
                            '<div class="col-md-12 fs-6">Client Address: <br><span class="fw-bold fs-6">' + client_address + '</span></div>' +
                            ''
                        );

                        $('#vDIRremarks').val(remarks);

                        /* region generate certificate */
                        /* if (doc_no != 'unset') {
                            $('.gen_cert').empty().append('' +
                                '<div class="col-md text-center fs-5">' +
                                '   <a href="perm_cert_route_checker/'+ doc_no +'/'+ subclass_id +'/" target="_blank">Generate Permit/Certification</a>' +
                                '   <hr>' +
                                '</div>' +
                                '');
                        } else {
                            $('.gen_cert').empty();
                        } */
                        /* endregion generate certificate */

                        // region document attachments and inputs
                        let filecount = 0;
                        let inptcount = 0;
                        let app_doc_form_no = 0; //appform start from 0 
                        $('.vDIR_doc_atch').empty(); // make sure to empty the list
                        $('.vDIR_doc_inpts').empty(); // make sure to empty the list
                        doc_attachments.forEach(dt => {
                            if (dt.attachment_type == 'file') {

                                // file attachments
                                filecount += 1;
                                if (app_doc_form_no != dt.app_form_no) {
                                    $('.vDIR_doc_inpts').append('' +
                                        '<div class="col-md-12 fs-6 mb-3"> ' +
                                        '   <hr>' +
                                        '   <span class="fw-bold"><i class="fa fa-file" aria-hidden="true"></i> Application Form ' + dt.app_form_no + '</span>: ' +
                                        '</div>' +
                                        ''
                                    );
                                    app_doc_form_no = dt.app_form_no;
                                }
                                $('.vDIR_doc_inpts').append('' +
                                    '<a class="col-md-2 mx-2 mb-1 fs-6 border border-primary rounded" href="/' + dt.file_path + '/' + dt.file_name + '" target="_blank" tooltip="' + dt.file_name + '" flow="down"><i class="fa fa-file-o" aria-hidden="true"></i> ' + dt.req_slug + '</a>'
                                );
                            } else {
                                inptcount += 1;
                                $('.vDIR_doc_inpts').append('' +
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
                            $('.vDIR_doc_atch').append('' +
                                '--- no attachment found ---'
                            );
                        }
                        /* if (inptcount == 0) {
                            $('.vDIR_doc_inpts').append('' +
                                '--- no other information ---'
                            );
                        } */
                        // endregion document attachments and inputs

                        // region document status
                        let doc_stat_len = r.doc_stats.length - 1;
                        let doc_stat_inactive_len_counter = 0;
                        let total_turn_around_time = 0;
                        $('.tbody-vDocAtchRcv-doc_status').empty();
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

                            // region get origin office
                            if (origin_office == '') {
                                origin_office = $dt.referred_by_abbrv;
                            }
                            // endregion get origin office

                            //region attachments
                            let attach_disp_count = 1;
                            let attach_disp = '';
                            let attachment_remarks = ($dt.attachment_remarks != null ? $dt.attachment_remarks + '<br><hr>' : '');
                            if ($dt.attachments.length > 0) {
                                $dt.attachments.forEach($attachment => {
                                    if ($attachment.file_name != 'n/a') {
                                        attach_disp += attach_disp_count + '.<a href="/' + $attachment.file_path + '/' + $attachment.file_name + '" target="_blank">' + $attachment.remarks + '</a><br>';

                                        attach_disp_count += 1;
                                    }
                                    if ($attachment.file_link != 'n/a') {
                                        attach_disp += attach_disp_count + '.<a href="' + $attachment.file_link + '" target="_blank">' + $attachment.remarks + '</a><br>';

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
                                        console.log("Time calculation ended");
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

                            $('.tbody-vDocAtchRcv-doc_status').append('' +
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
                                $('.tbody-vDocAtchRcv-doc_status').find('td').addClass('text-secondary');
                            }
                            doc_stat_inactive_len_counter += 1;
                        });

                        // >>>>>>>>>>>>>>> Calculate days, hours, and minutes
                        let ttlDays_ttl_tat = Math.floor(total_turn_around_time / (1000 * 60 * 60 * 24));
                        let ttlHours_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let ttlMinutes_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60)) / (1000 * 60));
                        let ttlSeconds_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60)) / 1000);

                        $('.vDIR_ttlDays_ttl_tat').empty().text(ttlDays_ttl_tat + ' Days');
                        $('.vDIR_ttlHours_ttl_tat').empty().text(ttlHours_ttl_tat + ' Hours');
                        $('.vDIR_ttlMinutes_ttl_tat').empty().text(ttlMinutes_ttl_tat + ' Minutes');
                        $('.vDIR_ttlSeconds_ttl_tat').empty().text(ttlSeconds_ttl_tat + ' Seconds');
                        // endregion document status

                        // region populate process length if validator
                        let access_id = sessionStorage.getItem("mb_user_access_id");

                        $('.acc_item_set_comp_form').hide();
                        if (access_id == 9 || access_id == 1 || access_id == 2 || access_id == 14) {
                            $('.acc_item_set_comp_form').fadeIn();
                            $.ajax({
                                url: "get-processLengths/" + subclass_id + "/",
                                method: "GET",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                },
                                success: function(r) {
                                    if (r.success) {
                                        // region populate selection
                                        $('#vDIRprocess_length').empty().append('<option value="n/a">-- CHOOSE PROCESS LENGTH --</option>');
                                        r.process_length.forEach(dt => {
                                            $('#vDIRprocess_length').append('' +
                                                '<option ' +
                                                '   data-remarks="' + dt.remarks + '" ' +
                                                '   data-process_length_days="' + dt.process_length_days + '" ' +
                                                '   data-process_length_hours="' + dt.process_length_hours + '" ' +
                                                '   data-process_length_minutes="' + dt.process_length_minutes + '" ' +
                                                '   value="' + dt.id + '" ' +
                                                '>' +
                                                '   ' + dt.remarks +
                                                '</option>' +
                                                ''
                                            );
                                        })
                                        // endregion populate selection
                                    }
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                        }

                        // hide set compliance date if it is already set
                        if (compliance_deadline != null) {
                            $('.acc_item_set_comp_form').hide();
                        }

                        $('.btn-create-order-of-payment').hide();
                        $('.btn-send-billing-to-client').hide();
                        $('.additional_pymnt_doc_atch').hide();
                        $('.pymnt_doc_atch').hide();
                        $('.vDocAtchRcv-btn-view-order-of-payment').hide();
                        if (access_id == 10 || access_id == 11 || access_id == 12 || access_id == 14) { //payment clerk
                            $('.btn-create-order-of-payment').fadeIn();
                            $('.btn-send-billing-to-client').fadeIn();
                            $('.pymnt_doc_atch').fadeIn();
                            $('.additional_pymnt_doc_atch').fadeIn();
                            // console.log("Add/Edit Access order payment");
                        } else {
                            $('.vDocAtchRcv-btn-view-order-of-payment').fadeIn();
                        }
                        // endregion populate process length if validator

                        // region pass params in a input tag to be fetched by process date
                        $('#vDIRorigin_office_docnofetch').val(origin_office);
                        $('#vDIRsubclass_slug_docnofetch').val(subclass_slug);
                        $('#vDIRdoc_id_docnofetch').val(doc_id);
                        // endregion pass params in a input tag to be fetched by process date

                        // region preview cost breakdown
                        let total_of_cost_break_down = 0;
                        $('.vDocAtchRcv_ofp_signed_link').empty(); //remove link viewable for uploaded oop or receipt
                        $('.vDocAtchRcv_cli_rcpt_link').empty(); //remove link viewable for uploaded oop or receipt
                        $('.vDocAtchRcv-ofp-and-rcpt-uploads').empty(); //remove link viewable for uploaded oop or receipt
                        if (order_of_payment != null) {

                            // region get order of payment uploaded document links
                            if (order_of_payment.order_of_payment != null) {
                                $('.vDocAtchRcv_ofp_signed_link').empty().append('<a class="link-primary fs-6" href="' + order_of_payment.order_of_payment + '" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Order of payment</a>');
                            }

                            if (order_of_payment.payment_receipt != null) {
                                $('.vDocAtchRcv_cli_rcpt_link').empty().append('<a class="link-primary fs-6" href="' + order_of_payment.payment_receipt + '" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Receipt</a>');
                            }

                            if (order_of_payment.order_of_payment == null && order_of_payment.payment_receipt == null) {
                                $('.vDocAtchRcv-ofp-and-rcpt-uploads').empty().append('<div class="text-center text-danger fs-6">- - - No uploaded documents - - -</div>');
                            }
                            // endregion get order of payment uploaded document links

                            if (order_of_payment.order_of_payment != null) {
                                $('.btn-upload-signed-oop').empty().append("Re-upload").attr('disabled', false);
                            } else {
                                $('.btn-upload-signed-oop').empty().append("Upload").attr('disabled', false);
                            }
                            if (order_of_payment.payment_receipt != null) {
                                $('.btn-upload-receipt-oop').empty().append("Re-upload").attr('disabled', false);
                            } else {
                                $('.btn-upload-receipt-oop').empty().append("Upload").attr('disabled', false);
                            }

                            // payment receipt approve or display status of receipt
                            $('.payment_document_receipt').empty();
                            if (order_of_payment.payment_receipt != null && order_of_payment.verified != 1) {
                                if (access_id == 11 || access_id == 12) {
                                    $('.payment_document_receipt').append('' +
                                        '<label for="client_receipt" class="form-label fs-6">Client Payment Receipt:</label><br>' +
                                        '<div class="d-grid gap-2 d-md-flex justify-content-md-start">' +
                                        '   <a class="btn btn-outline-primary btn-sm" href="' + order_of_payment.payment_receipt + '" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i> Client Receipt</a>' +
                                        '   <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#clpsbleVrfyRcpt" aria-expanded="false" aria-controls="clpsbleVrfyRcpt"> ' +
                                        '       Verify Client Receipt ' +
                                        '   </button> ' +
                                        '</div>' +
                                        '<div class="collapse" id="clpsbleVrfyRcpt"> ' +
                                        '    <div class="card card-body"> ' +
                                        '       <span class="btn btn-outline-success btn-sm verify-client-receipt mb-3"  data-bs-toggle="collapse" data-bs-target="#clpsbleVrfyRcpt" aria-expanded="false" aria-controls="clpsbleVrfyRcpt">Confirm Verify Receipt</span>' +
                                        '       <span class="btn btn-outline-danger mb-3" data-bs-toggle="collapse" data-bs-target="#clpsbleVrfyRcpt" aria-expanded="false" aria-controls="clpsbleVrfyRcpt">Cancel</span>' +
                                        '    </div> ' +
                                        '</div> '
                                    );
                                }else{
                                    $('.payment_document_receipt').append('' +
                                        '<label for="client_receipt" class="form-label fs-6">Client Payment Receipt:</label><br>' +
                                        '<div class="d-grid gap-2 text-center border rounded bg-warning p-3">' +
                                        '   <h6>Only Credit and Accounting Officers can validate receipt</h6>' +
                                        '</div>'
                                    );
                                }
                            }

                            if (order_of_payment.verified == 1) {
                                $('.payment_document_receipt').append('' +
                                    '<div class="border border-success text-center text-success fs-6">Receipt has been verified</div>'
                                );
                            }

                            //perbill
                            $('.vDIR_per_bill_no').empty().append(order_of_payment.per_bill_no);
                            $('.vDIR_per_bill_no_dated').empty().append(order_of_payment.per_bill_no_dated);

                            //cost
                            if (cost_breakdown.length != 0) {
                                $('.vDIR_prev_cost_breakdown').empty().append('' +
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
                                    $('.vDIR_prev_cost_breakdown').append('' +
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
                                        $('.vDIR_prev_cost_breakdown').append('' +
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

                                            $('.vDIR_prev_cost_breakdown').append('' +
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
                                    $('.vDIR_prev_ttl_cost').empty().append('' +
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

                                $('.vDIR_prev_cost_breakdown').empty(); //clear the cost breakdown

                                // add the additional cost to the total amount to be paid
                                total_of_cost_break_down = 0;

                                // add the additional cost to the total amount to be paid
                                if (additional_oop.length != 0) {
                                    $('.vDIR_prev_cost_breakdown').append('' +
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

                                        $('.vDIR_prev_cost_breakdown').append('' +
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

                                $('.vDIR_prev_ttl_cost').empty().append('' +
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
                            $('.vDIR_prev_cost_breakdown').empty();

                            //reset bill no
                            $('.vDIR_per_bill_no').empty()
                            $('.vDIR_per_bill_no_dated').empty()

                            //display no oop
                            $('.vDIR_prev_ttl_cost').empty().append('' +
                                '<div class="row ttl_item"> ' +
                                '    <div class="border border-danger text-danger col-12 text-center fs-6 fw-bold"> ' +
                                '        -- Order of payment not available -- ' +
                                '    </div> ' +
                                '</div> ' +
                                ''
                            );

                            // Uploaded oop or receipt clear
                            $('.vDocAtchRcv-ofp-and-rcpt-uploads').empty().append('<div class="text-center text-danger fs-6">- - - No uploaded documents - - -</div>');
                        }
                        // endregion preview cost breakdown

                        // fetch additional order of payments
                        if (additional_oop.length <= 0 || additional_oop == null) {
                            $('.other-order-of-payment-cont').empty().append('' +
                                '<div class="text-center text-danger fw-bold">' +
                                '    - - - No additional order of payment created - - -' +
                                '</div>'
                            );
                        } else {
                            $('.other-order-of-payment-cont').empty();
                            additional_oop.forEach(dt => {
                                let id = dt.id;
                                let doc_id = dt.doc_id;
                                let purpose = dt.purpose;
                                let pay_amount = dt.pay_amount;

                                $('.other-order-of-payment-cont').append('' +
                                    '<div class="text-start fs-6">' +
                                        '   <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a class="text-primary" href="/get-edit-another-oop/'+ doc_id +'/'+ id +'" target="_blank"> ' + purpose + ' . . . . . . . Php ' + pay_amount + '.00</a>' +
                                    '</div>'
                                );
                            });
                        }
                        console.log();
                    } //endregion success query
                },
                error: function(err) {
                    console.log(err);
                }
            });
            // endregion get document info

            // region check document is already seen or not
            $.ajax({
                url: "insert-seen-recvd-act/" + action_id + "/",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        // console.log(r.msg);

                        if (r.msg == 'seen') {
                            $('#rcvd_act_' + action_id).parent().append('' +
                                    '<div ' +
                                    '   class="text-secondary"' +
                                    '   style="' +
                                    '    display: inline-block;' +
                                    '    font-size: 15px;' +
                                    '">Seen</div>');
                        }
                    };
                },
                error: function(err) {
                    console.log(err);
                }
            });
            // endregion check document is already seen or not

        });
        // endregion document info

        // region receive perform action
        $('.btn-vDIR-submit').click(function() {
            let remarks = $('#vDIRremarks').val();
            let action_id = $('#vDIRaction_id').val();
            let doc_id = $('#vDIRdoc_id').val();
            let in_transit_remarks = $('#vDIRin_transit_remarks').val();
            let action_taken = $('#vDIRaction_taken').val();
            let subject = $('#vDIR_subject').val();
            let doc_action = $('#vDIRdoc_action :selected').val();

            form = $('#addvDIRForm')[0];
            let sbmtfrm = new FormData(form);
            console.log('updated subject: ' + subject);
            if (subject != '' || subject != null) {
                if (action_taken != '') {
                    switch (doc_action) {
                        case 'for_release':
                            $('#genDashNotifs').append('' +
                                '<div class="col-12 alert alert-warning alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                '    <strong>releasing . . . </strong> ' +
                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div>'
                            );

                            // region update add release
                            $.ajax({
                                url: "{{ url('insert-releaseAction') }}",
                                method: "POST",
                                data: sbmtfrm,
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                },
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(r) {
                                    if (r.success) {

                                        $('#genDashNotifs').append('' +
                                            '<div class="col-12 alert alert-info alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                            '    <strong>Action has been released ✅</strong> ' +
                                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                            '</div>'
                                        );

                                        // region clear
                                        console.log('clear this fields');
                                        // $('#addSendToListvDIR').empty();
                                        // addcDIR_users_selected.length = 0;
                                        $('#vDIRaction_taken').val('');
                                        $('#vDIR_attachment_remarks').val('');
                                        $('#vDIRdoc_track_no').val('');
                                        $('#vDIRcomp_date').val('');
                                        $('#vDIRcomp_time').val('');
                                        $('#vDIRprocess_length').val('n/a');
                                        // endregion clear

                                        // reload
                                        $('#dTReceived').DataTable().ajax.reload(null, false);

                                        // region send email to user
                                        if (r.set_comp_dt != false) {
                                            let subject = r.subject;
                                            let user_email = r.user_email;
                                            let prev_doc_id = r.prev_doc_id;
                                            let doc_track_no = r.doc_track_no;
                                            /* let comp_date = r.comp_date;
                                            let comp_time = r.comp_time; */

                                            const payload = [{
                                                'doc_no': doc_track_no,
                                                'email': user_email,
                                                'msg': 'Your document has been verified by the office, and your document tracking number is',
                                            }, ];

                                            toEmailer(
                                                user_email,
                                                'DENR RFSOATS: ' + subject,
                                                payload,
                                            );

                                            // open and print route
                                            var win = window.open('/grsid/' + prev_doc_id, '_blank');
                                            if (win) {
                                                //Browser has allowed it to be opened
                                                win.focus();
                                            } else {
                                                //Browser has blocked it
                                                alert('Please allow popups for this website');
                                            }
                                        }
                                        // endregion send email to user
                                    } else {
                                        $('#genDashNotifs').append('' +
                                            '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                            '    <strong>' + r.msg + '</strong> ' +
                                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                            '</div>'
                                        );

                                        // console.log(r);

                                        // reload
                                        $('#dTReceived').DataTable().ajax.reload(null, false);
                                    }


                                    // Close the message after 5 seconds
                                    setTimeout(function() {
                                        console.log('remove notifs');
                                        $('#genDashNotifs').empty(); // Remove the message
                                    }, 10000); // 5000 milliseconds = 5 seconds
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                            // endregion update add release
                            break;

                        case 'final_action':
                            $('#genDashNotifs').append('' +
                                '<div class="col-12 alert alert-warning alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                '    <strong>final action please wait . . . </strong> ' +
                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div>'
                            );

                            $.ajax({
                                url: "{{ url('edit-finalAction') }}",
                                method: "POST",
                                data: sbmtfrm,
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                },
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(r) {
                                    if (r.success) {
                                        // console.log(r);

                                        $('#genDashNotifs').append('' +
                                            '<div class="col-12 alert alert-info alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                            '    <strong>Final action has been performed</strong> ' +
                                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                            '</div>'
                                        );

                                        // region clear
                                        console.log('clear this fields');
                                        $('#addSendToListvDIR').empty();
                                        addcDIR_users_selected.length = 0;
                                        $('#vDIRaction_taken').val('');
                                        $('#vDIR_attachment_remarks').val('');
                                        $('#vDIRdoc_track_no').val('');
                                        $('#vDIRcomp_date').val('');
                                        $('#vDIRcomp_time').val('');
                                        $('#vDIRprocess_length').val('n/a');
                                        // endregion clear

                                        // reload
                                        $('#dTReceived').DataTable().ajax.reload(null, false);

                                        // region send email to user
                                        if (r.final_action == true) {
                                            let subject = r.subject;
                                            let user_email = r.user_email;
                                            let doc_track_no = r.doc_track_no;
                                            let comp_date = r.comp_date;

                                            const payload = [{
                                                'doc_no': doc_track_no,
                                                'email': user_email,
                                                'msg': 'Your requested document has been approved. You can now claim your requested document at your respective office. Please make sure to bring all documents related to the request for cross-validation. Failure to bring these documents will prevent the client from claiming their request, or the request may also be rejected.',
                                            }, ];

                                            toEmailer(
                                                user_email,
                                                'DENR RFSOATS: ' + subject,
                                                payload,
                                            );
                                        }
                                        // endregion send email to user

                                        // Close the message after 5 seconds
                                        setTimeout(function() {
                                            console.log('remove notifs');
                                            $('#genDashNotifs').empty(); // Remove the message
                                        }, 10000); // 5000 milliseconds = 5 seconds
                                    } else {
                                        $('#genDashNotifs').append('' +
                                            '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" data-bs-dismiss="alert" role="alert"> ' +
                                            '    <strong>' + r.msg + '</strong> ' +
                                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                            '</div>'
                                        );

                                        // Close the message after 5 seconds
                                        setTimeout(function() {
                                            console.log('remove notifs');
                                            $('#genDashNotifs').empty(); // Remove the message
                                        }, 10000); // 5000 milliseconds = 5 seconds
                                    }
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                            break;

                        case 'rejected':

                            $('#genDashNotifs').append('' +
                                '<div class="col-12 alert alert-warning alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                '    <strong>final action please wait . . . </strong> ' +
                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div>'
                            );

                            $.ajax({
                                url: "{{ url('edit-rejectDocAction') }}",
                                method: "POST",
                                data: sbmtfrm,
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                },
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(r) {
                                    if (r.success) {
                                        // console.log(r);

                                        $('#genDashNotifs').append('' +
                                            '<div class="col-12 alert alert-info alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                            '    <strong>Document has been rejected</strong> ' +
                                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                            '</div>'
                                        );

                                        // region clear
                                        console.log('clear this fields');
                                        $('#addSendToListvDIR').empty();
                                        addcDIR_users_selected.length = 0;
                                        $('#vDIRaction_taken').val('');
                                        $('#vDIR_attachment_remarks').val('');
                                        $('#vDIRdoc_track_no').val('');
                                        $('#vDIRcomp_date').val('');
                                        $('#vDIRcomp_time').val('');
                                        $('#vDIRprocess_length').val('n/a');
                                        // endregion clear

                                        // reload
                                        $('#dTReceived').DataTable().ajax.reload(null, false);

                                        // region send email to user
                                        if (r.set_comp_dt != false) {
                                            let subject = r.subject;
                                            let user_email = r.user_email;
                                            let doc_track_no = r.doc_track_no;
                                            let comp_date = r.comp_date;
                                            let action_taken = r.action_taken;

                                            const payload = [{
                                                'doc_no': doc_track_no,
                                                'email': user_email,
                                                'msg': 'Your request has been rejected; "' + action_taken + '"',
                                            }, ];

                                            toEmailer(
                                                user_email,
                                                'DENR RFSOATS: ' + subject,
                                                payload,
                                            );
                                        }
                                        // endregion send email to user

                                        // Close the message after 5 seconds
                                        setTimeout(function() {
                                            console.log('remove notifs');
                                            $('#genDashNotifs').empty(); // Remove the message
                                        }, 10000); // 5000 milliseconds = 5 seconds
                                    } else {
                                        $('#genDashNotifs').append('' +
                                            '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" data-bs-dismiss="alert" role="alert"> ' +
                                            '    <strong>' + r.msg + '</strong> ' +
                                            '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                            '</div>'
                                        );

                                        // Close the message after 5 seconds
                                        setTimeout(function() {
                                            console.log('remove notifs');
                                            $('#genDashNotifs').empty(); // Remove the message
                                        }, 10000); // 5000 milliseconds = 5 seconds
                                    }
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                            break;

                        case 'n/a':
                            $('#genDashNotifs').append('' +
                                '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                '    <strong>Choose what action to perform </strong> ' +
                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div>'
                            );

                            // Close the message after 5 seconds
                            setTimeout(function() {
                                console.log('remove notifs');
                                $('#genDashNotifs').empty(); // Remove the message
                            }, 10000); // 5000 milliseconds = 5 seconds
                            break

                        default:
                            $('#genDashNotifs').append('' +
                                '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                '    <strong>no action has been performed</strong> ' +
                                '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div>'
                            );

                            // Close the message after 5 seconds
                            setTimeout(function() {
                                console.log('remove notifs');
                                $('#genDashNotifs').empty(); // Remove the message
                            }, 10000); // 5000 milliseconds = 5 seconds
                    }
                } else {
                    $('#genDashNotifs').append('' +
                        '<div class="col-12 alert alert-warning alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                        '    <strong>Submit Denied: Enter action taken</strong> ' +
                        '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                        '</div>'
                    );

                    // Close the message after 5 seconds
                    setTimeout(function() {
                        console.log('remove notifs');
                        $('#genDashNotifs').empty(); // Remove the message
                    }, 10000); // 5000 milliseconds = 5 seconds
                }
            } else {
                $('#genDashNotifs').append('' +
                    '<div class="col-12 alert alert-warning alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                    '    <strong>Submit Denied: Enter Subject</strong> ' +
                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                    '</div>'
                );

                // Close the message after 5 seconds
                setTimeout(function() {
                    console.log('remove notifs');
                    $('#genDashNotifs').empty(); // Remove the message
                }, 10000); // 5000 milliseconds = 5 seconds
            }
        });
        // endregion receive perform action

        // region add attachments 
        let vDIR_atch_count = 1;
        $('.btnvDIRAddAtchs').click(function() {
            $('.vDIRAtchCtnr').append('' +
                '    <div class="col-12 mb-1 d-flex flex-row vDIRAtchCtnr_poped border shadow"> ' +
                '        <div class="p-2"> ' +
                '           <input type="text" value="FileName' + vDIR_atch_count + '" class="form-control" name="vDIRAtch_remark[]" placeholder="Attachment Remark"> ' +
                '        </div> ' +
                '        <div class="p-2"> ' +
                '           <input type="file" class="form-control vDIRAtch_file" name="vDIRAtch_file[]"> ' +
                '        </div> ' +
                '        <div class="p-2"> ' +
                '           <button class="btn btn-danger btn-sm btn_vDIRAtchCtnr_poped_cls"> <i class="fa fa-times" aria-hidden="true"></i> </button> ' +
                '        </div> ' +
                '    </div> ' +
                ''
            );
            vDIR_atch_count += 1;
        });

        // restric only pdf upload in add attachment
        $('.vDIRAtchCtnr').on('change', '.vDIRAtch_file', function() {
            var allowedFormats = ["application/pdf"];
            var maxSizeMB = 10; // Maximum allowed file size in megabytes
            var selectedFile = this.files[0];

            if (selectedFile) {
                // Check file size
                if (selectedFile.size > maxSizeMB * 1024 * 1024) {
                    alert("File size exceeds the maximum allowed size of less than" + (maxSizeMB + 1) + "MB.");
                    $(this).val(''); // Clear the input
                }

                // Check file format
                if (!allowedFormats.includes(selectedFile.type)) {
                    alert("Unsupported file format. Please select a PDF file.");
                    $(this).val(''); // Clear the input
                    return;
                }
            }
        });

        // remove attch
        $('.vDIRAtchCtnr').on('click', '.btn_vDIRAtchCtnr_poped_cls', function() {
            $(this).closest('.vDIRAtchCtnr_poped').remove();
        });
        // endregion add attachments 

        // region choose document action
        $('.btn-vDIR-submit').prop('disabled', true); //disable submit button
        $('.vDIRdoc_action_other').hide(); // hide send to button
        $('.vDIRdoc_action_reject_toggle').hide(); // hide send to button
        $('#vDIRdoc_action').change(function() {
            let val = $('#vDIRdoc_action :selected').val();

            if (val == 'for_release') {
                $('.vDIRdoc_action_other').show();
                $('.vDIRdoc_action_reject_toggle').hide();
                if ($('#vDIRaction_taken').val() == "" || $('#vDIR_subject').val() == "") {
                    console.log('perform disable perform button');
                    $('.btn-vDIR-submit').prop('disabled', true); //disable submit button
                } else {
                    $('.btn-vDIR-submit').prop('disabled', false); //enable submit button
                }
            } else if (val == 'final_action') {
                $('.vDIRdoc_action_other').hide();
                $('.vDIRdoc_action_reject_toggle').hide();
                $('.btn-vDIR-submit').prop('disabled', false); //enable submit button
            } else if (val == 'rejected') {
                $('.vDIRdoc_action_other').hide();
                $('.vDIRdoc_action_reject_toggle').show();
                $('.btn-vDIR-submit').prop('disabled', false); //enable submit button

                $('.action_rejected_container').append('' +
                    '<div class="col-12 alert alert-danger alert-dismissible fade show mt-1 p-2 pe-5" role="alert"> ' +
                    '    Enter reason for rejecting request in the  <b>action taken</b> ' +
                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                    '</div>'
                );

                // Close the message after 5 seconds
                setTimeout(function() {
                    $('.action_rejected_container').empty(); // Remove the message
                }, 5000); // 5000 milliseconds = 5 seconds
            } else {
                $('.vDIRdoc_action_other').hide();
                $('.vDIRdoc_action_reject_toggle').hide();
                $('.btn-vDIR-submit').prop('disabled', true); //disable submit button
            }
        });
        // endregion choose document action

        //region enable perform action if action taken input have value
        $('#vDIRaction_taken, #vDIR_subject').keyup(function() {
            let action = $('#vDIRaction_taken').val();
            let subject = $('#vDIR_subject').val();
            if (action != '' && subject != '') {
                $('.btn-vDIR-submit').prop('disabled', false); //enable submit button
            } else {
                $('.btn-vDIR-submit').prop('disabled', true); //disable submit button 
            }
        });
        //endregion enable perform action if action taken input have value

        // region MINIFIED SEARCH MODAL 
        // Set Text to search box and get details
        let key = 0;
        const addcDIR_users_selected = [];
        $("#addSendTovDIR").keyup(function() {
            console.log('searching');
            let search = $(this).val();
            if (search != "") {
                $.ajax({
                    url: "{{ url('get-office_via_search') }}",
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
                        // console.log('api-responded');
                        // console.log(response.data);
                        // console.log('length: ' + response.data.length);
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
                                    '   data-region_id = "' + region_id + '" ' +
                                    '   data-slug = "' + slug + '" ' +
                                    '   data-office = "' + office + '" ' +
                                    '   data-full_office_name = "' + full_office_name + '" ' +
                                    '   data-office_type = "' + office_type + '" ' +
                                    '   data-username = "' + username + '" ' +
                                    '>' +
                                    '   <span>'+ (username == null ? full_office_name + ' (' + slug + ')' : '<span class="text-primary">['+ username +']</span> ' + ' (' + slug + ')' ) +'</span>' +
                                    '</li>'
                                );
                            }
                        }

                        // binding click event to li
                        $(".addPWB-searchResult li").bind("click", function() {
                            addSendToListvDIR(this);
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

        function addSendToListvDIR(element) {
            let key = $(element).data('key');
            let id = $(element).data('id');
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
                $('.addSendToListvDIRmsg').append('' +
                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                    '    <strong>' + full_office_name + ' (' + office + ') already selected</strong> ' +
                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                    '</div>'
                );

                // delay before remove
                setTimeout(() => {
                    $('.addSendToListvDIRmsg').empty();
                }, 3000);
            } else {
                console.log("this data is unique");
                addcDIR_users_selected.push(key);

                $("#addSendToListvDIR").append(' ' +
                    '<div class="col-md-5 d-flex flex-row bd-highlight p-0 m-2 addSendToListvDIRItem"> ' +
                    '   <div class="bd-highlight rounded-start bg-info border border-info border-end-0 ps-2">' +
                    '       <input type="hidden" name="vDIR_id[]" value="' + id + '">' +
                    '       <input type="hidden" name="vDIR_region_id[]" value="' + region_id + '">' +
                    '       <input type="hidden" name="vDIR_slug[]" value="' + slug + '">' +
                    '       <input type="hidden" name="vDIR_office[]" value="' + office + '">' +
                    '       <input type="hidden" name="vDIR_full_office_name[]" value="' + full_office_name + '">' +
                    '       <input type="hidden" name="vDIR_office_type[]" value="' + office_type + '">' +
                    '       <span class="fw-bold">' + full_office_name + ' (' + slug + ')</span>' +
                    '   </div> ' +
                    '   <div class="bd-highlight rounded-end bg-info border border-info border-start-0 pe-2">' +
                    '       <button ' +
                    '           class="rounded bg-danger border border-danger text-white m-1 btnListItemRemove_vDIR" ' +
                    '           data-target="addSendToListvDIRItem" ' +
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
            $("#addSendTovDIR").val('');
        }
        // remove data when X is clicked
        $('#addSendToListvDIR').on("click", ".btnListItemRemove_vDIR", function() {
            let target = $(this).data('target');
            $(this).closest('.' + target).remove();
            const indexToRemove = addcDIR_users_selected.indexOf($(this).data('key')); // find the index of the value to remove
            if (indexToRemove !== -1) {
                addcDIR_users_selected.splice(indexToRemove, 1); // remove the value from the array
            }
            console.log("Data Remove in array: " + addcDIR_users_selected);
        });
        // endregion MINIFIED SEARCH MODAL 

        // region set length of processing
        $('#vDIRprocess_length').change(function() {
            let id = $('#vDIRprocess_length :selected').val();
            if (id != 'n/a') {
                let remarks = $('#vDIRprocess_length :selected').data('remarks');
                let process_length_days = $('#vDIRprocess_length :selected').data('process_length_days');
                let process_length_hours = $('#vDIRprocess_length :selected').data('process_length_hours');
                let process_length_minutes = $('#vDIRprocess_length :selected').data('process_length_minutes');

                let today = new Date();

                function isWeekend(date) {
                    const day = date.getDay();
                    return day === 0 || day === 6; // 0 is Sunday, 6 is Saturday
                }

                while (process_length_days > 0) {
                    today.setDate(today.getDate() + 1);
                    if (!isWeekend(today)) {
                        process_length_days--;
                    }
                }

                while (process_length_hours > 0) {
                    today.setHours(today.getHours() + 1);
                    if (!isWeekend(today)) {
                        process_length_hours--;
                    }
                }

                while (process_length_minutes > 0) {
                    today.setMinutes(today.getMinutes() + 1);
                    if (!isWeekend(today)) {
                        process_length_minutes--;
                    }
                }

                console.log("calculated date: " + today);

                let origin_office = $('#vDIRorigin_office_docnofetch').val();
                let subclass_slug = $('#vDIRsubclass_slug_docnofetch').val();
                let doc_id = $('#vDIRdoc_id_docnofetch').val();
                let calc_date = today.getFullYear() + '.' + today.getMonth() + '.' + today.getDate();

                // region fix formatting of date to enable the system to read input
                var day = today.getDate();
                var month = today.getMonth() + 1; // Months are zero-based, so add 1
                var year = today.getFullYear();
                var formattedDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
                // endregion fix formatting of date to enable the system to read input

                $('#vDIRdoc_track_no').val(origin_office + '-' + subclass_slug + '-' + calc_date + '-' + doc_id); /* OFFICE-SUB_CLASS-YYYY-MM-DD-INCREMENT */
                $('#vDIRcomp_date').val(formattedDate);
                $('#vDIRcomp_time').val(today.getHours() + ':' + (today.getMinutes() < 10 ? "0" + today.getMinutes() : today.getMinutes()));
            } else {
                $('#vDIRdoc_track_no').val('');
                $('#vDIRcomp_date').val('');
                $('#vDIRcomp_time').val('');
            }
        });
        // endregion set length of processing

        // region client email notify
        function toEmailer(sendTo, toSubject, toMessage) {
            $('#genDashNotifs').append('' +
                '<div class="alert alert-info alert-dismissible fade show p-2" role="alert">' +
                '    Please wait while sending email to <strong>' + sendTo + '</strong> . . . ' +
                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>'
            );

            $.ajax({
                url: "{{ url('send-validatedDocNotifier') }}",
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
                            '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">' +
                            '    The email was sent successfully to <strong>' + sendTo + '</strong>' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );

                        // Close the message after 5 seconds
                        setTimeout(function() {
                            console.log('remove notifs');
                            $('#genDashNotifs').empty(); // Remove the message
                        }, 10000); // 5000 milliseconds = 5 seconds
                    } else {
                        $('#genDashNotifs').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert">' +
                            '    Sending email to <strong>' + sendTo + '</strong> failed<br>' +
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

        function toEmailerBilling(sendTo, toSubject, toMessage) {
            $('#genDashNotifs').append('' +
                '<div class="alert alert-info alert-dismissible fade show p-2" role="alert">' +
                '    Please wait while sending email to <strong>' + sendTo + '</strong> . . . ' +
                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>'
            );

            $.ajax({
                url: "{{ url('send-notifyClientBilling') }}",
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
                            '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">' +
                            '    The email was sent successfully to <strong>' + sendTo + '</strong>' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );

                        // Close the message after 5 seconds
                        setTimeout(function() {
                            console.log('remove notifs');
                            $('#genDashNotifs').empty(); // Remove the message
                        }, 10000); // 5000 milliseconds = 5 seconds
                    } else {
                        $('#genDashNotifs').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert">' +
                            '    Sending email to <strong>' + sendTo + '</strong> failed<br>' +
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

        // region perform reencryption id image
        $('.btn-vwCliIdreencryptId').click(function() {
            let client_id = $('#vwCliIdreencryptId').val();

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
        $('.btn-create-order-of-payment').click(function(e) {
            e.preventDefault();

            let doc_id = $(this).val();

            window.open('/get-orderOfPayment/' + doc_id + '/');
        });
        $('.btn-view-order-of-payment').click(function(e) { //this affect all view buttons for view order of payment
            e.preventDefault();

            let doc_id = $(this).val();

            window.open('/get-orderOfPayment-view-only/' + doc_id + '/');
        });
        // endregion generate update order of payment

        // region send billing to client
        $('.btn-send-billing-to-client').click(function(e) {
            e.preventDefault();

            let doc_id = $(this).val();
            $.ajax({
                url: "get-orderOfPaymentForBilling/" + doc_id + "/",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {

                        if (r.ofp != null) {
                            if (r.ofp.or_no != null && r.ofp.or_no_dated != null) {
                                if (r.ofp.order_of_payment != null) {
                                    const payload = [{
                                        'doc_no': r.doc_info.doc_no,
                                        'email': r.doc_info.client_email,
                                        'cost_break_down': r.ofp_cost_breakdown,
                                        'or_no': r.ofp.or_no,
                                        'total_cost': r.ofp.pay_amount,
                                        'msg': 'Billing for your request has been issued',
                                        'subject': r.first_act.subject,
                                        'additional_ofp': r.additional_ofp,
                                        'additional_ofp_cost_breakdown': r.additional_ofp_cost_breakdown,
                                    }];

                                    toEmailerBilling(
                                        r.doc_info.client_email,
                                        'DENR RFSOATS: ' + r.first_act.subject,
                                        payload,
                                    );
                                } else {
                                    $('#genDashNotifs').append('' +
                                        '<div class="alert alert-warning alert-dismissible fade show p-2" role="alert">' +
                                        '    Please upload signed order of payment &nbsp; &nbsp; &nbsp; &nbsp;' +
                                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                        '</div>'
                                    );
                                }
                            } else {
                                $('#genDashNotifs').append('' +
                                    '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert">' +
                                    '    OR no / OR date not found &nbsp; &nbsp; &nbsp; &nbsp;' +
                                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }
                        } else {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert">' +
                                '    Order of payment not available &nbsp; &nbsp; &nbsp; &nbsp;' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );

                        }
                        // Close the message after 5 seconds
                        /* setTimeout(function() {
                            console.log('remove notifs');
                            $('#genDashNotifs').empty(); // Remove the message
                        }, 10000); // 5000 milliseconds = 5 seconds */
                    } else {
                        console.log(r);
                        console.log('response error');
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion send billing to client

        // region upload signed order of payment
        $('.btn-upload-signed-oop').click(function(e) {
            e.preventDefault();

            let form = $('#addvDIRForm')[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "edit-signed-order-of-payment",
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
                    console.log(r);
                    if (r.success) {
                        if (r.signed_oop_upt) {
                            // reload
                            $('#dTReceived').DataTable().ajax.reload(null, false);
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">' +
                                '    Signed order of payment sent' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                        } else {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-warning alert-dismissible data-bs-dismiss="alert" fade show p-2" role="alert">' +
                                '    File not uploaded &nbsp;&nbsp;&nbsp;&nbsp;' +
                                '    <br><br>Possible reason: ' +
                                '    <ol>' +
                                '       <li>No file attached</li>' +
                                '       <li>Order of payment not yet generated</li>' +
                                '    </ol>' +
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
        });
        // endregion upload signed order of payment

        // region upload receipt
        $('.btn-upload-receipt-oop').click(function(e) {
            e.preventDefault();


            let form = $('#addvDIRForm')[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "edit-payment-receipt-user",
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
                    console.log(r);
                    if (r.success) {
                        if (r.receipt_upt) {
                            // reload
                            $('#dTReceived').DataTable().ajax.reload(null, false);
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">' +
                                '    Receipt has been uploaded' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                        } else {
                            $('#genDashNotifs').append('' +
                                '<div class="alert alert-warning alert-dismissible data-bs-dismiss="alert" fade show p-2" role="alert">' +
                                '    File not uploaded &nbsp;&nbsp;&nbsp;&nbsp;' +
                                '    <br><br>Possible reason: ' +
                                '    <ol>' +
                                '       <li>No file attached</li>' +
                                '       <li>Order of payment not yet generated</li>' +
                                '    </ol>' +
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
        });
        // endregion upload receipt

        // region verify client permit
        $('.payment_document_receipt').on('click', '.verify-client-receipt', function(e) {
            e.preventDefault();

            let form = $('#addvDIRForm')[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "edit-verify-client-receipt",
                method: "POST",
                data: submitForm,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                async: false,
                cache: false,
                processData: false,
                contentType: false,
                success: function(r) {
                    if (r.success) {
                        // reload
                        $('#dTReceived').DataTable().ajax.reload(null, false);

                        $('#genDashNotifs').append('' +
                            '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">' +
                            '    Payment has been verfied &nbsp;&nbsp;&nbsp;&nbsp;' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );

                        // Close the message after 5 seconds
                        setTimeout(function() {
                            console.log('remove notifs');
                            $('#genDashNotifs').empty(); // Remove the message
                        }, 10000); // 5000 milliseconds = 5 seconds
                    }
                },
            });
            console.log('verify receipt');
        });
        // endregion verify client permit
    });
</script>
{{-- endregion queries --}}
