{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTReceived" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0">
    <thead style="border-bottom: 1px solid #000;">
        <tr>
            <th>ID</th>
            <th>Document No.</th>
            <th>Subject</th>
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
                <h1 class="modal-title fs-5 text-white" id="vDIRLabel">DOCUMENT INFORMATION</h1>
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

                    {{-- DOCUMENT REMARKS AND ATTACHMENTS --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIR_collapsible_req_info" aria-expanded="false" aria-controls="vDIR_collapsible_req_info">
                                DOCUMENT REMARKS AND ATTACHMENTS
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
                                                <input type="hidden" id="vDIRaction_uuid" name="action_uuid">
                                                <input type="hidden" id="vDIRdoc_id" name="doc_id">
                                                <input type="hidden" id="vDIRdoc_uuid" name="doc_uuid">
                                                {{-- endregion important do not remove --}}

                                                <div class="row gen_cert">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-floating">
                                                            <select class="form-control" id="vDIRdoc_action" name="doc_action">
                                                                <option value="n/a">-- CHOOSE ACTION --</option>
                                                                <option value="for_release">FORWARD TO</option>
                                                                <option value="final_action">FINAL ACTION</option>
                                                            </select>
                                                            <label for="vDIRdoc_action" class="fs-6">Document Action*</label>
                                                        </div>
                                                    </div>

                                                    {{-- choose where office to release --}}
                                                    <div class="col-md-12 mb-3 vDIRdoc_action_other">
                                                        <div class="addSendToListvDIRmsg"></div>
                                                        <div class="vDIRdoc_action_other_toggle border border-secondary px-2 rounded">
                                                            <div id="addSendToListvDIR" class="row">
                                                                {{-- populate send to office here --}}
                                                            </div>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control fs-6 border-0" placeholder="Search by office name . . ." id="addSendTovDIR">
                                                                <label for="addSendTovDIR" style="font-size: 1rem;">Choose Office*</label>
                                                            </div>
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
                                                        <div class="form-floating">
                                                            <textarea class="form-control toUpperCase bg-secondary-subtle" placeholder="Subject here" id="vDIR_subject" name="subject" readonly></textarea>
                                                            <label for="vDIR_subject" style="font-size: 1rem;">Subject*</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- </div> --}}
                                                {{-- endregion Attachments here --}}

                                                {{-- <hr> --}}

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control toUpperCase" style="color:#343a40;" id="vDIRaction_taken" name="action_taken" placeholder="Action remarks here" required>
                                                            <label for="vDIRaction_taken" style="color:rgba(33, 37, 41, 0.75);;" class="fs-6">Action Taken*</label>
                                                        </div>
                                                        <div class="action_rejected_container"></div>
                                                    </div>
                                                    {{-- 
                                                    <div class="col-md-12 mb-3">
                                                        <label for="vDIRremarks" class="form-label fs-6 fw-bold">Document Remarks: </label>
                                                        <input type="text" id="vDIRremarks" name="remarks" class="form-control toUpperCase" placeholder="Document remarks here..." disabled>
                                                    </div> 
                                                    --}}
                                                </div>

                                                {{-- region Attachments here --}}
                                                <div class="p-2 my-1 border rounded">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control toUpperCase" placeholder="Attachment Remarks" id="vDIR_attachment_remarks" name="attachment_remarks"></textarea>
                                                                <label for="vDIR_attachment_remarks" style="font-size: 1rem;">Attachment Remarks (Optional)</label>
                                                            </div>
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
                                '   class="btn-fetchdocInfo_vDIR dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#vDIRModal"' +
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
                            return '' +
                                '<span class="text-primary text-uppercase">' +
                                '   ' + row['class_slug'] +
                                '</span>: ' +
                                (row['subject']).toUpperCase() +
                                '<span class="text-secondary text-uppercase">' +
                                '   sent by ' + row['sender_username'] +
                                ' [' + row['referred_by_abbrv'] + ']</span><br>';
                        }
                    },
                    /* column 3 : Doc Attachments */
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
                                    '   data-doc_uuid="' + row['uuid'] + '" ' + // this is the uuid of action but named doc id because there is action id for attachment below
                                    '   data-real_doc_id="' + row['doc_id'] + '" ' + // real document id
                                    '   data-real_doc_uuid="' + row['doc_uuid'] + '" ' + // real document uuid
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
                                '        SHOW FILES' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="doc_clps_atch_DIR' + row['id'] + '">' +
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
                                '       <input type="hidden" id="vDIRdoc_fileCollection' + row['id'] + '" value="' + file_names + '">' +
                                '   </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* column 4 : Action Attachments */
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
                                    '   data-act_uuid="' + row['uuid'] + '" ' + //this is the action attachment id
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
                                '        SHOW FILES' +
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
                                        '        NO ATTACHMENT/S' +
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
                    /* column 5 : application_type */
                    {
                        data: 'applicant',
                        render: function(data, type, row) {
                            return (row['applicant']).toUpperCase();
                        }
                    },
                    /* column 6 : sender */
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
                    /* column 7 : created at */
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
                    /* column 8 : updated at */
                    {
                        data: 'updated_at',
                    },
                    /* column 9 : status & action */
                    {
                        data: 'doc_no',
                        render: function(data, type, row) {
                            let id = row['id'];
                            let uuid = row['uuid'];
                            let act_seen = row['act_seen_id']; //act_seen doesn't have a uuid because it doesnt have any relation to other tables and only be used to check if the action is seen or not
                            let act_seen_date = row['act_seen_date'];

                            let lbl_seen = '';
                            // change background of tr
                            if (act_seen != null) {
                                // $('#rcvd_act_' + id).closest('tr').css('background-color', '#f8d7da');

                                //set label as seend
                                lbl_seen = '<span class="badge bg-info mb-1 me-2" style="cursor: pointer;" title="TIME SEEN: '+ act_seen_date +'">👁️ SEEN</span>';
                            }


                            let more_info = '' +
                                '<a' +
                                '   style="cursor: pointer" ' +
                                '   class="btn-fetchdocInfo_vDIR dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#vDIRModal"' +
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
                                // showPubDocs = '<li><a class="dropdown-item" href="rfsoats/pdv?dn=' + row['doc_no'] + '" target="_blank" ><i class="fa fa-eye" aria-hidden="true"></i> Show published document</a></li>';
                            } else {
                                showRoutingSlip = '<li><a class="dropdown-item bg-secondary-subtle"><i class="fa fa-map-marker" aria-hidden="true"></i> Routing slip not Available<br><sup>(Request not yet approved)</sup></a></li>';
                                // showPubDocs = '<li><a class="dropdown-item bg-secondary-subtle"><i class="fa fa-eye-slash" aria-hidden="true"></i> Published document not available<br><sup>(Request not yet approved)</sup></a></li>';
                            }

                            //check if synced
                            let synced = row['downloaded'] != null ? ' <spanc class="badge bg-success text-white  mb-1 me-2" >SYNCED</spanc> ' : ' <spanc class="badge bg-danger text-white  mb-1 me-2 badge-status-overdue" >NOT YET SYNCED</spanc> ';

                            let dropdownMenu = '' +
                                '<div>' + lbl_seen + synced + '</div>' +
                                '<div class="dropdown" id="rcvd_act_' + id + '">' +
                                '    <div ' +
                                '       data-bs-toggle="dropdown" ' +
                                '       aria-expanded="false" ' +
                                '       style="cursor: pointer" ' +
                                '       onMouseOut="this.style.color=`#000`" ' +
                                '       onMouseOver="this.style.color=`#0d6efd`" ' +
                                '    >' +
                                '        <span class="btn btn-sm btn-outline-primary" style="font-size: 13px;">ACTION</span>' +
                                '    </div>' +
                                '    <ul class="dropdown-menu" style="z-index: 999;">' +
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
                        targets: [5, 6, 7, 8],
                        visible: false,
                    }
                ],
                /* reason for disabling: Causes error for dropdown will overlap */
                /* fixedColumns: {
                    left: 1
                }, */
                order: [
                    [8, 'desc'] /* update by last updated action */
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
                        title: `RECEIVED CLIENT REQUESTS ${new Date().toLocaleDateString()}`,
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
                                '       tbody, tr, td { ' +
                                '           background-color: transparent;' +
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
                                '      <h2>RECEIVED CLIENT REQUESTS</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTReceived thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTReceived tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTReceived_search" type="text" placeholder="Search (Click to refresh)">',
                        action: function(e, dt, node, config) {
                            var searchValue = $(node).find('.dTReceived_search').val();
                            dt.search(searchValue).draw();
                        }
                    }
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).addClass('TestingAdd');


                    // Change background color if act_seen is not null
                    if (data.act_seen_id != null) {
                        $(row).css('background-color', '#d1ecf1');
                    }
                },
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
        $('label[for=tabReceived]').click(function() {
            if (tabReceived == false) {
                dTReceived_func();
                tabReceived = true;
            }
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
        // region view document attachment
        $('#dTReceived').on('click', '.btnvDIR-viewDocAtch', function() {
            let username = $('#auth_username').val();
            let file_type = $(this).data('file_type');

            if (file_type == 'doc') {
                let id = $(this).data('doc_id'); // this is the id of action but named doc id because there is action id for attachment below
                let uuid = $(this).data('doc_uuid'); // this is the id of action but named doc id because there is action id for attachment below
                let real_doc_id = $(this).data('real_doc_id'); // real document id
                let real_doc_uuid = $(this).data('real_doc_uuid'); // real document id
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
                        $('.viewDocAtchReceivedCollection').append('' +
                            '<button ' +
                            '   class="btnvDIR-view-file btn btn-outline-primary btn-sm border-0 m-1" ' +
                            '   data-file_path="' + file_path + '" ' +
                            '   data-file_name="' + item + '"' +
                            '>' +
                            '   ' + collection_count + '. ' + item +
                            '</button>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                            '<a ' +
                            '   style="cursor: pointer; color: rgb(0, 0, 0);" ' +
                            '   onMouseOut="this.style.color=`#000`" ' +
                            '   onMouseOver="this.style.color=`#0d6efd`" ' +
                            '   href="/' + file_path + '/' + item + '" ' +
                            '   target="_blank" ' +
                            '   tooltip="Open in separate tab" flow="down"' +
                            '>' +
                            '   <i class="fa fa-external-link" aria-hidden="true"></i> ' +
                            '</a>' +
                            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                            '<span class="btn-dlActAtch fs-6" ' +
                            '    style="cursor: pointer;" ' +
                            '    onMouseOut="this.style.color=`#000`" ' +
                            '    onMouseOver="this.style.color=`#0d6efd`" ' +
                            '    data-file_path="' + file_path + '" ' +
                            '    data-file_name="' + item + '" ' +
                            '   tooltip="download document" ' +
                            '   flow="down" ' +
                            '>' +
                            '   <i class="fa fa-download" aria-hidden="true"></i>' +
                            '</span>' +
                            '<br>');
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
                    url: "get-other-cli-req-inputs/" + real_doc_uuid + "/",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(r) {
                        if (r.success) {
                            $('.viewDocAtchReceived_other_req_inputs').append('<hr><h6>Other Input:</h6><br>');

                            if (r.req_inputs.length >= 1) {
                                r.req_inputs.forEach(dt => {
                                    $('.viewDocAtchReceived_other_req_inputs').append('' +
                                        '<div class="row row-tab-leader">' +
                                        '   <div class="col-md-12 col-tab-leader">' +
                                        '       <div>' +
                                        '          <span>* </span>' +
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
                                    '       - - NO OTHER INPUT - -' +
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
                let uuid = $(this).data('act_uuid');
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
            let action_uuid = $(this).data('action_uuid');
            let doc_id = $(this).data('doc_id');
            let doc_uuid = $(this).data('doc_uuid');

            //prevent scrambling document tracking number by clearing it every time a new tab is opened
            $('#vDIRdoc_track_no').val('');
            $('#vDIRcomp_date').val('');
            $('#vDIRcomp_time').val('');

            // region set action id for receive
            $('#vDIRaction_id').val(action_id);
            $('#vDIRaction_uuid').val(action_uuid);
            $('#vDIRdoc_id').val(doc_id);
            $('#vDIRdoc_uuid').val(doc_uuid);
            // endregion set action id for receive

            // region get document info
            $.ajax({
                url: "/get-docInfos/" + doc_uuid + "/",
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

                        if (validated != null) {
                            $('.vDIRheader-status').empty().append('<i class="fa fa-check-circle" aria-hidden="true"></i> VERIFIED');
                            $('.vDIRheader-status').removeClass('border-danger text-danger').addClass('border-success text-success');
                        } else {
                            $('.vDIRheader-status').empty().append('<i class="fa fa-hourglass" aria-hidden="true"></i> NOT YET VERIFIED');
                            $('.vDIRheader-status').removeClass('border-success text-success').addClass('border-danger text-danger');
                        }

                        $('.vDIR_content').empty().append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Tracking No.: <br>' + (doc_no != 'unset' ? '<span class="fw-bold fs-6">' + doc_no + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT AVAILABLE</span>') + '</div>' +
                            '<div class="col-md-4 mb-2 fs-6">Compliance Date: <br>' + (compliance_deadline != null ? '<span class="fw-bold fs-6">' + compliance_deadline + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT AVAILABLE</span>') + '</div>' +
                            '<hr>' +
                            ''
                        );

                        $('.vDIR_content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Application type: <br><span class="fw-bold fs-6">' + applicant.toUpperCase() + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Transaction Type: <br><span class="fw-bold fs-6">' + transaction.toUpperCase() + ' (' + transaction_slug + ')</span></div>' +
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
                                        '   <span class="fw-bold"><i class="fa fa-file" aria-hidden="true"></i> Attachment Form ' + dt.app_form_no + '</span>: ' +
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

                            $('.tbody-vDocAtchRcv-doc_status').append('' +
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
                            /* validator admin dts_admin vali_pro */
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
                    } //endregion success query
                },
                error: function(err) {
                    console.log(err);
                }
            });
            // endregion get document info

            // region check document is already seen or not
            $.ajax({
                url: "insert-seen-recvd-act/" + action_id + "/" + action_uuid + "/",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        console.log(r.msg);

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

        /* region MINIFIED SEARCH MODAL  */
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
                    '       <input type="hidden" name="vDIR_uuid[]" value="' + uuid + '">' +
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
        /* endregion MINIFIED SEARCH MODAL  */

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

        // region download published document
        $('.viewDocAtchReceivedCollection').on('click', '.btn-dlActAtch', function() {
            let file_path = $(this).data('file_path');
            let file_name = $(this).data('file_name');

            // Replace the URL with the actual path to your PDF file
            var pdfUrl = '/' + file_path + '/' + file_name;

            // Create a hidden link element
            var link = document.createElement('a');
            link.href = pdfUrl;

            // Set the download attribute with the desired file name
            link.download = file_name + '.pdf';

            // Append the link to the document body
            document.body.appendChild(link);

            // Trigger the click event on the link
            link.click();

            // Remove the link from the document
            document.body.removeChild(link);
        });
        // endregion download published document
    });
</script>
{{-- endregion queries --}}
