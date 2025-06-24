{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTArchived" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
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
            <th>Action</th>
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
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody style="height: 200px">
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region view doc attachment modal --}}
<div class="modal fade" id="vDIAvDocAtchRcvModal" tabindex="-1" aria-labelledby="viewDocAtchTransitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="viewDocAtchTransitLabel">Document Attachment: <b><u><span class="vDIADocAtchName fs-6"></span></u></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px; overflow-y: scroll;">
                <div class="vDocAtchArchCollection"></div>
                <embed id="vDocAtchArchIframe" name="vDocAtchArchIframe" width="100%" height="80%" style="background:url(../assets/img/denrloadsmaller.webp) center center no-repeat;">
                <div class="vDocAtchArch_other_req_inputs"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view doc attachment modal --}}

{{-- region view Document Info View --}}
<div class="modal fade" id="vDIAModal" tabindex="-1" aria-labelledby="vDIALabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #497ac1">
                <h1 class="modal-title fs-5 text-white" id="vDIALabel">Document Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="text-center fs-3 border border-3 vDIAheader-status">
                STATUS UNKNOWN
            </div>

            <div class="modal-body p-0">

                {{-- region accordian --}}
                <div class="accordion" id="vDIA_accordian">
                    {{-- General Information --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#vDIA_collapsible_gen_info" aria-expanded="true" aria-controls="vDIA_collapsible_gen_info">
                                General Information
                            </button>
                        </h2>
                        <div id="vDIA_collapsible_gen_info" class="accordion-collapse collapse" data-bs-parent="#vDIA_accordian">
                            <div class="accordion-body">
                                <div class="row vDIA-content">
                                    {{-- Document Info Contents generated here --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Document Remarks and Attachments --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vDIA_collapsible_req_info" aria-expanded="false" aria-controls="vDIA_collapsible_req_info">
                                Document Remarks and Attachments
                            </button>
                        </h2>
                        <div id="vDIA_collapsible_req_info" class="accordion-collapse collapse" data-bs-parent="#vDIA_accordian">
                            <div class="accordion-body">
                                <div class="row vDIA_doc_inpts">
                                    --- no other information ---
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion accordian --}}

                {{-- region document status --}}
                <div class="row mt-3 mx-3 px-3">
                    <div class="col p-3 rounded border shadow">
                        <span class="fs-6 fw-bold">Document Status</span>
                        <hr>
                        <div style="overflow: auto">
                            <table class="table table-striped table-bordered table-sm">
                                <tbody class="tbody-viewDocInfoArchived-doc_status">
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
                                    <span class="fs-6 vDIA_ttlDays_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIA_ttlHours_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIA_ttlMinutes_ttl_tat btn btn-primary"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <span class="fs-6 vDIA_ttlSeconds_ttl_tat btn btn-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endregion document status --}}

                <div class="row m-3 text-center">
                    <button class="btn btn-outline-primary border-0 vDIAscrollToTop">Return to top</button>
                    <script>
                        $(document).ready(function() {
                            $('.vDIAscrollToTop').click(function() {
                                $('#vDIAModal').scrollTop(0);
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
    <input type="hidden" id="dTArchived_loader" @if ($active_tab == 'tabArchived') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTArchived_func() {
            // Setup - add a text input to each footer cell
            $('#dTArchived tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTArchived').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-clientReqAchived",
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
                    },
                    /* column 2 : subject */
                    {
                        data: 'subject',
                        render: function(data, type, row) {
                            return '<span class="text-primary text-uppercase">' + row['class_slug'] + '</span>: ' + (row['subject']).toUpperCase();
                        }
                    },
                    /* column 3 : action_taken */
                    {
                        data: 'action_taken',
                        render: function(data, type, row) {
                            let action_taken = row['action_taken'];
                            disp = '';
                            if (action_taken == null) {
                                disp = '<span class="text-danger text-uppercase">No action taken yet</span>';
                            } else {
                                disp = action_taken.toUpperCase();
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
                                    '   class="btnvDIA-viewDocAtch mb-1" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDIAvDocAtchRcvModal"' +
                                    '   data-file_type="doc" ' +
                                    '   data-doc_id="' + row['id'] + '" ' + // this is the id of action but named doc id because there is action id for attachment below
                                    '   data-doc_uuid="' + row['uuid'] + '" ' + // this is the id of action but named doc id because there is action id for attachment below
                                    '   data-real_doc_id="' + row['doc_id'] + '" ' + // real document id
                                    '   data-real_doc_uuid="' + row['doc_uuid'] + '" ' + // real document id
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
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#doc_clps_atch_vDIA' + row['id'] + '" role="button" aria-expanded="false" aria-controls="doc_clps_atch_vDIA' + row['id'] + '">' +
                                '        SHOW FILES' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="doc_clps_atch_vDIA' + row['id'] + '">' +
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
                                '       <input type="hidden" id="vDIAdoc_fileCollection' + row['id'] + '" value="' + file_names + '">' +
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
                                    '   class="btnvDIA-viewDocAtch" ' +
                                    '   style="cursor: pointer;" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-bs-toggle="modal" ' +
                                    '   data-bs-target="#vDIAvDocAtchRcvModal"' +
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
                                '    <a class="fs-6" data-bs-toggle="collapse" href="#act_clps_atch_vDIA' + row['id'] + '" role="button" aria-expanded="false" aria-controls="act_clps_atch_vDIA' + row['id'] + '">' +
                                '        SHOW FILES' +
                                '    </a>' +
                                '</p>' +
                                '<div class="collapse" id="act_clps_atch_vDIA' + row['id'] + '">' +
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
                                '       <input type="hidden" id="vDIAact_fileCollection' + row['id'] + '" value="' + file_names + '">' +
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
                        data: 'doc_no',
                        render: function(data, type, row) {
                            let more_info = '' +
                                '<a' +
                                '   style="cursor: pointer" ' +
                                '   class="btn-fetchdocInfo_vDIA dropdown-item" ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#vDIAModal"' +
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

                            let dropdownMenu = '' +
                                '<div class="dropdown">' +
                                '    <div ' +
                                '       data-bs-toggle="dropdown" ' +
                                '       aria-expanded="false" ' +
                                '       style="cursor: pointer" ' +
                                '       onMouseOut="this.style.color=`#000`" ' +
                                '       onMouseOver="this.style.color=`#0d6efd`" ' +
                                '    >' +
                                '        <span class="btn btn-sm btn-outline-primary" style="font-size: 13px;">ACTION</span>' +
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
                        title: `COMPLETED CLIENT REQUESTS ${new Date().toLocaleDateString()}`,
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
                                '      <h2>COMPLETED CLIENT REQUESTS</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTArchived thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTArchived tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTArchived_search" type="text" placeholder="Search (Click to refresh)">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTArchived_search').val();
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
        let tabArchived = false;
        $('label[for=tabArchived]').click(function() {
            if (tabArchived == false) {
                dTArchived_func();
                tabArchived = true;
            }
        });

        if ($('#dTArchived_loader').val() == 'load') {
            if (tabArchived == false) {
                dTArchived_func();
                tabArchived = true;
            }
        }
        /* endregion Call tab on click */

        $('#dTArchived_wrapper .btn-group button').removeClass('btn-secondary').addClass('btn-outline-success');
    });
</script>
{{-- endregion populate table --}}

{{-- region queries --}}
<script>
    $(function() {
        // region view client id
        $('#dTArchived').on('click', '.btnvDIA-viewClientId', function() {
            let username = $('#auth_username').val();
            let client_id = $(this).data('client_id');

            let iframeHref = '/get-clientId-view/' + username + '/' + client_id + '/';
            $('#vDIAviewClientIdIframe').attr('src', iframeHref);
            $('#vDIAreencryptId').val(client_id);
        });
        // endregion view client id

        // region view document attachment
        $('#dTArchived').on('click', '.btnvDIA-viewDocAtch', function() {
            let username = $('#auth_username').val();
            let file_type = $(this).data('file_type');

            if (file_type == 'doc') {
                let id = $(this).data('doc_id'); // this is the id of action but named doc id because there is action id for attachment below
                let uuid = $(this).data('doc_uuid'); // this is the id of action but named doc id because there is action id for attachment below
                let real_doc_id = $(this).data('real_doc_id'); // real document id
                let real_doc_uuid = $(this).data('real_doc_uuid'); // real document id
                let file_path = $(this).data('doc_file_path');
                let file_name = $(this).data('doc_file_name');
                let fileCollection = $('#dTArchived #vDIAdoc_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.vDocAtchArchCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.vDocAtchArchCollection').append('<button class="btnvDIA-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>');
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#vDocAtchArchIframe').attr('src');
                if (content1 != content2) {
                    $('.vDIADocAtchName').empty().append(file_name);
                    $('#vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
                }

                // region get other requestee input
                $('.vDocAtchArch_other_req_inputs').empty()
                $.ajax({
                    url: "get-other-cli-req-inputs/" + real_doc_uuid + "/",
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(r) {
                        if (r.success) {
                            $('.vDocAtchArch_other_req_inputs').append('<hr><h6>Other Requestee Input:</h6><br>');

                            if (r.req_inputs.length >= 1) {
                                r.req_inputs.forEach(dt => {
                                    $('.vDocAtchArch_other_req_inputs').append('' +
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
                                $('.vDocAtchArch_other_req_inputs').append('' +
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
                let fileCollection = $('#dTArchived #vDIAact_fileCollection' + id).val();

                // Split the text into an array using commas as the delimiter
                const fileCollection_arr = fileCollection.split(',');

                // Filter out empty strings from the array
                let collection_count = 1;
                $('.vDocAtchArchCollection').empty()
                fileCollection_arr.filter(item => {
                    if (item != '') {
                        $('.vDocAtchArchCollection').append('<button class="btnvDIA-view-file btn btn-outline-primary btn-sm border-0 m-1" data-file_path="' + file_path + '" data-file_name="' + item + '">' + collection_count + '. ' + item + '</button> <a href="/' + file_path + '/' + item + '" target="_blank" tooltip="Open in separate tab" flow="right"> <i class="fa fa-external-link" aria-hidden="true"></i> </a><br>');
                        collection_count += 1;
                    }
                });

                let iframeHref = '/' + file_path + '/' + file_name;
                let content1 = iframeHref + '#toolbar=0';
                let content2 = $('#vDocAtchArchIframe').attr('src');
                if (content1 != content2) {
                    $('.vDIADocAtchName').empty().append(file_name);
                    $('#vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
                }
            }
        });
        // endregion view document attachment

        // region view document attachment collection
        $('.vDocAtchArchCollection').on('click', '.btnvDIA-view-file', function() {
            let file_path = $(this).data('file_path');
            let file_name = $(this).data('file_name');

            let iframeHref = '/' + file_path + '/' + file_name;
            $('.vDIADocAtchName').empty().append(file_name);
            $('#vDocAtchArchIframe').attr('src', iframeHref + '#toolbar=0');
        });
        // endregion view document attachment collection

        // region document info
        $('#dTArchived').on('click', '.btn-fetchdocInfo_vDIA', function() {
            // let action_id = $(this).data('action_id');
            let action_uuid = $(this).data('action_uuid');
            // let doc_id = $(this).data('doc_id');
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
                        // endregion display agency Government to Government (G2G)

                        // region status bar
                        if (validated != null) {
                            $('.vDIAheader-status').empty().append('<i class="fa fa-check-circle" aria-hidden="true"></i> VERIFIED');
                            $('.vDIAheader-status').removeClass('border-danger text-danger').addClass('border-success text-success');
                        } else {
                            $('.vDIAheader-status').empty().append('<i class="fa fa-hourglass" aria-hidden="true"></i> NOT YET VERIFIED');
                            $('.vDIAheader-status').removeClass('border-success text-success').addClass('border-danger text-danger');
                        }
                        // endregion status bar

                        $('.vDIA-content').empty().append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Tracking No.: <br>' + (doc_no != 'unset' ? '<span class="fw-bold fs-6">' + doc_no + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT AVAILABLE</span>') + '</div>' +
                            '<div class="col-md-4 mb-2 fs-6">Compliance Date: <br>' + (compliance_deadline != null ? '<span class="fw-bold fs-6">' + compliance_deadline + '</span>' : '<span class="fw-bold text-secondary fs-6">NOT AVAILABLE</span>') + '</div>' +
                            '<hr>' +
                            ''
                        );

                        $('.vDIA-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Document Classification: <br><span class="fw-bold fs-6">' + doc_class_full.toUpperCase() + ' — (' + class_slug + ')</span></div>' +
                            ''
                        );

                        $('.vDIA-content').append('' +
                            '<div class="col-md-4 mb-2 fs-6">Application type: <br><span class="fw-bold fs-6">' + applicant.toUpperCase() + '</span></div>' +
                            '<div class="col-md-4 mb-2 fs-6">Transaction Type: <br><span class="fw-bold fs-6">' + transaction.toUpperCase() + ' (' + transaction_slug + ')</span></div>' +
                            ''
                        );

                        $('#vDIAremarks').val(remarks);

                        // region document attachments and inputs
                        let filecount = 0;
                        let inptcount = 0;
                        let app_doc_form_no = 0; //appform start from 0 
                        $('.vDIA_doc_atch').empty(); // make sure to empty the list
                        $('.vDIA_doc_inpts').empty(); // make sure to empty the list
                        doc_attachments.forEach(dt => {

                            if (dt.attachment_type == 'file') {
                                // file attachments
                                filecount += 1;
                                if (app_doc_form_no != dt.app_form_no) {
                                    $('.vDIA_doc_inpts').append('' +
                                        '<div class="col-md-12 fs-6 mb-3"> ' +
                                        '   <hr>' +
                                        '   <span class="fw-bold"><i class="fa fa-file" aria-hidden="true"></i> Application Form ' + dt.app_form_no + '</span>: ' +
                                        '</div>' +
                                        ''
                                    );
                                    app_doc_form_no = dt.app_form_no;
                                }
                                $('.vDIA_doc_inpts').append('' +
                                    '<a class="col-md-2 ms-3 mb-1 fs-6 border border-primary rounded" href="/' + dt.file_path + '/' + dt.file_name + '" target="_blank" tooltip="' + dt.file_name + '" flow="down"><i class="fa fa-file-o" aria-hidden="true"></i> ' + dt.req_slug + '</a>'
                                );
                            } else {
                                // field inputs
                                inptcount += 1;
                                $('.vDIA_doc_inpts').append('' +
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
                            $('.vDIA_doc_atch').append('' +
                                '--- no attachment found ---'
                            );
                        }
                        /* if (inptcount == 0) {
                            $('.vDIA_doc_inpts').append('' +
                                '--- no other information ---'
                            );
                        } */
                        // endregion document attachments and inputs

                        // region document status
                        let doc_stat_len = r.doc_stats.length - 1;
                        let doc_stat_inactive_len_counter = 0;
                        let total_turn_around_time = 0;
                        $('.tbody-viewDocInfoArchived-doc_status').empty();
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

                            $('.tbody-viewDocInfoArchived-doc_status').append('' +
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
                                $('.tbody-viewDocInfoArchived-doc_status').find('td').addClass('text-secondary');
                            }
                            doc_stat_inactive_len_counter += 1;
                        });

                        // >>>>>>>>>>>>>>> Calculate days, hours, and minutes
                        let ttlDays_ttl_tat = Math.floor(total_turn_around_time / (1000 * 60 * 60 * 24));
                        let ttlHours_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let ttlMinutes_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60 * 60)) / (1000 * 60));
                        let ttlSeconds_ttl_tat = Math.floor((total_turn_around_time % (1000 * 60)) / 1000);

                        $('.vDIA_ttlDays_ttl_tat').empty().text(ttlDays_ttl_tat + ' Days');
                        $('.vDIA_ttlHours_ttl_tat').empty().text(ttlHours_ttl_tat + ' Hours');
                        $('.vDIA_ttlMinutes_ttl_tat').empty().text(ttlMinutes_ttl_tat + ' Minutes');
                        $('.vDIA_ttlSeconds_ttl_tat').empty().text(ttlSeconds_ttl_tat + ' Seconds');
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
