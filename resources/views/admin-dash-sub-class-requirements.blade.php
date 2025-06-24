{{-- region deletion div --}}
<div class="deleteDSCRcontainer" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete DSCs here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTSubClassReq" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Sub-Class Name</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Attachment Type</th>
            <th>Requirement Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Sub-Class Name</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Attachment Type</th>
            <th>Requirement Type</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region Add modal --}}
<div class="modal fade" id="addSubClassReqModal" tabindex="-1" aria-labelledby="addSubClassReqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD SUB-CLASS REQUIREMENT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="addSubClassReqForm">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="AddDSCRsubclass_id" class="form-label">Document Sub-Class <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="AddDSCRsubclass_id" name="subclass_id">
                            </select>
                        </div>
                        <div class="col-8 mb-3">
                            <label for="AddDSCRtitle" class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="AddDSCRtitle" name="title" placeholder="Requirement Title">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="AddDSCRslug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="AddDSCRslug" name="slug" placeholder="Abbreviation (must be unique)">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="AddDSCRdescription" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="AddDSCRdescription" name="description" placeholder="Abbreviation (must be unique)">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="AddDSCRattachment_type" class="form-label">Attachment Type <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="AddDSCRattachment_type" name="attachment_type">
                                <option value="file">file</option>
                                <option value="text">text</option>
                                <option value="date">date</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="AddDSCRrequirement_type" class="form-label">Requirement Type <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="AddDSCRrequirement_type" name="requirement_type">
                                <option value="required">required</option>
                                <option value="additional">additional</option>
                                <option value="optional">optional</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnAddDSCR">Add</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region Edit modal --}}
<div class="modal fade" id="editSubClassReqModal" tabindex="-1" aria-labelledby="editSubClassReqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT DOCUMENT SUB-CLASS FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="editSubClassReqForm">
                    <input type="hidden" name="id" id="editDSCRid">

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="editDSCRsubclass_id" class="form-label">Document Sub-Class <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="editDSCRsubclass_id" name="subclass_id">
                            </select>
                        </div>
                        <div class="col-8 mb-3">
                            <label for="editDSCRtitle" class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editDSCRtitle" name="title" placeholder="Requirement Title">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="editDSCRslug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editDSCRslug" name="slug" placeholder="Abbreviation (must be unique)">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="editDSCRdescription" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editDSCRdescription" name="description" placeholder="Abbreviation (must be unique)">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="editDSCRattachment_type" class="form-label">Attachment Type <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="editDSCRattachment_type" name="attachment_type">
                                <option value="file">file</option>
                                <option value="text">text</option>
                                <option value="date">date</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="editDSCRrequirement_type" class="form-label">Requirement Type <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="editDSCRrequirement_type" name="requirement_type">
                                <option value="required">required</option>
                                <option value="additional">additional</option>
                                <option value="optional">optional</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btneditDSCR">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region table data loadder --}}
@if (request()->has('active_tab'))
    @php
        $active_tab = request()->input('active_tab');
    @endphp
    <input type="hidden" id="dTSubClassReq_loader" @if ($active_tab == 'tabDSCR') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table & region queries --}}
<script>
    $(function() {
        // region populate function
        function dTSubClassReq_func() {
            // region Setup - add a text input to each footer cell
            $('#dTSubClassReq tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            // endregion Setup - add a text input to each footer cell

            // region populate table
            $('#dTSubClassReq').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-redtsSubClassReq",
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
                    /* 0 id */
                    {
                        data: 'id',
                    },
                    /* 1 sub_class */
                    {
                        data: 'sub_class',
                    },
                    /* 2 title */
                    {
                        data: 'title',
                        render: function(data, type, row) {
                            return '' +
                                '<span ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#editSubClassReqModal" ' +
                                '   class="fetchDteditSubClass fs-6" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-subclass_id="' + row['subclass_id'] + '" ' +
                                '   data-title="' + row['title'] + '" ' +
                                '   data-slug="' + row['slug'] + '" ' +
                                '   data-description="' + row['description'] + '" ' +
                                '   data-attachment_type="' + row['attachment_type'] + '" ' +
                                '   data-requirement_type="' + row['requirement_type'] + '" ' +
                                '> ' +
                                '   ' + row['title'] +
                                '</span> ' +
                                '';
                        }
                    },
                    /* 3 slug */
                    {
                        data: 'slug',
                    },
                    /* 4 description */
                    {
                        data: 'description',
                    },
                    /* 4 attachment_type */
                    {
                        data: 'attachment_type',
                    },
                    /* 4 requirement_type */
                    {
                        data: 'requirement_type',
                    },
                    /* 5 Action */
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '' +
                                '<h4 ' +
                                '   class="btnAlertDelDSCR" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-sub_class="' + row['sub_class'] + '" ' +
                                '   data-title="' + row['title'] + '" ' +
                                '> ' +
                                '   <span ' +
                                '       class="badge bg-danger border border-danger text-white"' +
                                '   >' +
                                '       <i class="fa fa-trash" aria-hidden="true"></i>' +
                                '   </span>' +
                                '</h4>';
                        }
                    },
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                rowGroup: {
                    dataSrc: ['sub_class']
                },
                columnDefs: [{
                        width: '5%',
                        targets: [0],
                        visible: true,
                    },
                    {
                        targets: [1],
                        visible: false,
                    },
                ],
                fixedColumns: {
                    left: 1
                },
                order: [
                    [1, 'desc']
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
                        text: '' +
                            '<span class="btnShowAddModal" data-bs-toggle="modal" data-bs-target="#addSubClassReqModal">' +
                            '   <i class="fa fa-plus" aria-hidden="true"></i> Add Sub-Class Requirement' +
                            '</span>',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: `DOCUMENTATION SUB-CLASS ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print <i class="fa fa-print" aria-hidden="true"></i>',
                        orientation: 'landscape',
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
                                '       height: 2000px; ' +
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
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/logo.webp') }}" > ' +
                                '   <span style="display: inline-block;  vertical-align:middle; font-size: 20px;">' +
                                '      Republic of The Philippines<br> ' +
                                '      <b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</b><br> ' +
                                '      Regional Center Site, Rawis, Legazpi City<br> ' + formattedDate + ' <br><br>' +
                                '      <h2>SUB-CLASS REQUIREMENTS</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').prepend($('#dTSubClassReq tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTSubClassReq_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTSubClassReq_search').val();
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
            // endregion populate table
        }
        // endregion populate function

        /* region Call tab on click */
        let tabDSCR = false;
        $('label[for=tabDSCR]').click(function() {
            if (tabDSCR == false) {
                dTSubClassReq_func();
                DSCpupolateSelectTag(); // load data in dropdown 
                tabDSCR = true;
            }
        });

        if ($('#dTSubClassReq_loader').val() == 'load') {
            if (tabDSCR == false) {
                dTSubClassReq_func();
                tabDSCR = true;
            }
        }
        /* endregion Call tab on click */

        /* ============================================== REGION QUERIES STARTS HERE ================================================== */

        // region populate document classification select tag
        function DSCpupolateSelectTag() {
            // region get sub classes
            $.ajax({
                url: "{{ url('fetch-redtsSubClass') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        $('#AddDSCRsubclass_id').empty().append('' +
                            '<option value="">-- Choose Sub-Class --</option>'
                        );
                        console.log(r.classifications);
                        r.classifications.forEach(dt => {
                            $('#AddDSCRsubclass_id').append('' +
                                '<option value="' + dt['id'] + '">' +
                                '   ' + dt['description'] + ' <b>(' + dt['slug'] + ')</b>' +
                                '</option>'
                            );
                        });
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
            // endregion get sub classes
        }

        function DSCpupolateSelectTag_edit(subclass_id) {
            // region get sub classes
            $.ajax({
                url: "{{ url('fetch-redtsSubClass') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        $('#editDSCRsubclass_id').empty().append('' +
                            '<option value=""></option>'
                        );
                        r.classifications.forEach(dt => {
                            if (subclass_id == dt['id']) {
                                $('#editDSCRsubclass_id').append('' +
                                    '<option value="' + dt['id'] + '" selected >' +
                                    '   ' + dt['description'] + ' <b>(' + dt['slug'] + ')</b>' +
                                    '</option>'
                                );
                            } else {
                                $('#editDSCRsubclass_id').append('' +
                                    '<option value="' + dt['id'] + '">' +
                                    '   ' + dt['description'] + ' <b>(' + dt['slug'] + ')</b>' +
                                    '</option>'
                                );
                            }
                        });
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
            // endregion get sub classes
        }
        // endregion populate document classification select tag

        // region pupolate select tag when clicked
        $('#dTSubClassReq_wrapper').find('.btnShowAddModal').click(function() {
            DSCpupolateSelectTag();
        });
        // endregion pupolate select tag when clicked

        // region add
        $('.btnAddDSCR').click(function() {
            console.log('perform inputs');
            if ($('#AddDSCRsubclass_id option:selected').val() != '' && $('#AddDSCRtitle').val() != '' && $('#AddDSCRslug').val() != '' && $('#AddDSCRdescription').val() != '') {
                let form = $("#addSubClassReqForm")[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "{{ url('insert-redtsSubClassReq') }}",
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
                            $('#addSubClassReqModal form').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Data has been successfully added</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> '
                            );

                            $('#AddDSCRtitle, #AddDSCRdescription, #AddDSCRslug').val('');

                            // reload
                            $('#dTSubClassReq').DataTable().ajax.reload(null, false);
                        } else {
                            $('#addSubClassReqModal form').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Input rejected: Slug ' + $('#AddDSCRslug').val() + ' already exists</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> '
                            );
                            $('#AddDSCRslug').val('');
                            $('#AddDSCRdescription, #AddDSCRslug').each(function() {
                                if ($(this).val() == '') {
                                    $(this).css('border-color', 'red');
                                }
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            } else {
                $('#AddDSCRtitle, #AddDSCRslug, #AddDSCRdescription').each(function() {
                    if ($(this).val() == '') {
                        $(this).css('border-color', 'red');
                    }
                })
                $('#addSubClassReqModal form').append('' +
                    '<div class="alert alert-warning alert-dismissible fade show p-2" role="alert"> ' +
                    '    <strong>Fill in all important fields</strong> ' +
                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                    '</div> ' +
                    ''
                );
            }
        });
        // endregion add

        // region edit
        $('.btneditDSCR').click(function() {
            if ($('#editDSCRdescription').val() != '' && $('#editDSCRslug').val() != '') {
                let form = $("#editSubClassReqForm")[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "{{ url('edit-redtsSubClassReq') }}",
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
                            $('#editSubClassReqModal form').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Data has been successfully updated</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );

                            // reload
                            $('#dTSubClassReq').DataTable().ajax.reload(null, false);
                        } else {
                            $('#editSubClassReqModal form').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Input rejected: Slug ' + $('#editDSCRslug').val() + ' already exists</strong> ' + r.message +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                            $('#editDSCRslug').val('');
                            $('#editDSCRdescription, #editDSCRslug').each(function() {
                                if ($(this).val() == '') {
                                    $(this).css('border-color', 'red');
                                }
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            } else {
                $('#editDSCRdescription, #editDSCRslug').each(function() {
                    if ($(this).val() == '') {
                        $(this).css('border-color', 'red');
                    }
                })
                $('#editSubClassReqModal form').append('' +
                    '<div class="alert alert-warning alert-dismissible fade show p-2" role="alert"> ' +
                    '    <strong>Fill in all important fields</strong> ' +
                    '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                    '</div> ' +
                    ''
                );
            }
        });
        // endregion edit

        // region fecth data for update
        $('#dTSubClassReq').on('click', '.fetchDteditSubClass', function() {
            let id = $(this).data('id');
            let subclass_id = $(this).data('subclass_id');
            let title = $(this).data('title');
            let slug = $(this).data('slug');
            let description = $(this).data('description');
            let attachment_type = $(this).data('attachment_type');
            let requirement_type = $(this).data('requirement_type');

            $('#editDSCRid').val(id);
            // $('#editDSCRsubclass_id').val(subclass_id);
            $('#editDSCRtitle').val(title);
            $('#editDSCRslug').val(slug);
            $('#editDSCRdescription').val(description);
            $('#editDSCRattachment_type').val(attachment_type);
            $('#editDSCRrequirement_type').val(requirement_type);

            console.log(subclass_id);
            DSCpupolateSelectTag_edit(subclass_id);
        });
        // endregion fecth data for update

        //region create delete alert
        $('#dTSubClassReq').on('click', '.btnAlertDelDSCR', function() {
            let id = $(this).data('id');
            let sub_class = $(this).data('sub_class');
            let title = $(this).data('title');

            $('.deleteDSCRcontainer').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Remove ' + title + ' (' + sub_class + ')? &nbsp;&nbsp;&nbsp;&nbsp;</strong> ' +
                '    <br>' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white btnRemoveDSC" data-bs-dismiss="alert" data-id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i> Confirm Remove</button> ' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white" data-bs-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button> ' +
                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                '</div> ' +
                ''
            );
        });
        //region create delete alert

        // region soft del
        $('.deleteDSCRcontainer').on('click', '.btnRemoveDSC', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('trash-redtsSubClassReq') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                data: {
                    id: id,
                },
                dataType: 'json',
                success: function(r) {
                    if (r.success) {
                        $('#dTSubClassReq').DataTable().ajax.reload(null, false);
                    } else {
                        $('.deleteDSCRcontainer').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                            '    <strong>Item with id: ' + id + ' might already been moved or removed from table</strong> ' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                            '</div> ' +
                            ''
                        );
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion soft del
    });
</script>
{{-- endregion queries --}}
