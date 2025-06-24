{{-- region deletion div --}}
<div class="deleteDSCcontainer" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete DSCs here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTSubClassifications" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Document Classification</th>
            <th>Sub-Class</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Classification Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Document Classification</th>
            <th>Sub-Class</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Classification Type</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region Add modal --}}
<div class="modal fade" id="addSubClassificationModal" tabindex="-1" aria-labelledby="addSubClassificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD DOCUMENT SUB-CLASS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="addSubClassificationForm">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="addDSCclassification_id" class="form-label">Document Classification <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="addDSCclassification_id" name="classification_id">
                            </select>
                        </div>
                        <div class="col-8 mb-3">
                            <label for="addDSCdescription" class="form-label">Sub-Class Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="addDSCdescription" name="description" placeholder="Document title / description">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="addDSCslug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control toUpperCase" id="addDSCslug" name="slug" placeholder="Abbreviation (must be unique)">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="addDSCfull_description" class="form-label">Full Description <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="addDSCfull_description" name="full_description"> </textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnAddDSC">Add</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region Edit modal --}}
<div class="modal fade" id="editSubClassificationModal" tabindex="-1" aria-labelledby="editSubClassificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT DOCUMENT SUB-CLASS FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="editSubClassificationForm">
                    <input type="hidden" name="id" id="editDSCid">

                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="editDSCdescription" class="form-label">Sub-Class Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editDSCdescription" name="description" placeholder="Document title / description">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="editDSCslug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control toUpperCase" id="editDSCslug" name="slug" placeholder="Abbreviation (must be unique)" @readonly(true)>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="editDSCfull_description" class="form-label">Full Description <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="editDSCfull_description" name="full_description"> </textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnEditDSC">Save</button>
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
    <input type="hidden" id="dTSubClassifications_loader" @if ($active_tab == 'tabDSC') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table & queries --}}
<script>
    $(function() {
        // region populate function
        function dTSubClassifications_func() {
            // region Setup - add a text input to each footer cell
            $('#dTSubClassifications tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            // endregion Setup - add a text input to each footer cell

            // region populate table
            $('#dTSubClassifications').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-redtsSubClass",
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
                    /* 1 main_class */
                    {
                        data: 'main_class',
                    },
                    /* 1 sub_class */
                    {
                        data: 'sub_class',
                        render: function(data, type, row) {
                            return '' +
                                '<div ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#editSubClassificationModal" ' +
                                '   class="fetchDtSubClass" ' +
                                '   style="cursor: pointer;" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-sub_class="' + row['sub_class'] + '" ' +
                                '   data-full_description="' + row['full_description'] + '" ' +
                                '   data-slug="' + row['slug'] + '" ' +
                                '> ' +
                                '   ' + row['sub_class'] +
                                '</div> ' +
                                '';
                        }
                    },
                    /* 2 full_description */
                    {
                        data: 'full_description',
                    },
                    /* 2 slug */
                    {
                        data: 'slug',
                    },
                    /* 2 classification_type */
                    {
                        data: 'classification_type',
                    },
                    /* 2 Action */
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '' +
                                '<h4 ' +
                                '   class="btnAlertDelDSC" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-sub_class="' + row['sub_class'] + '" ' +
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
                    dataSrc: ['main_class']
                },
                columnDefs: [{
                        width: '5%',
                        targets: [0],
                        visible: true,
                    },
                    {
                        targets: [1,4],
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
                            '<span class="btnShowAddModal" data-bs-toggle="modal" data-bs-target="#addSubClassificationModal">' +
                            '   <i class="fa fa-plus" aria-hidden="true"></i> Add Sub-Classification' +
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
                                '   <div style="display: inline-block;  vertical-align:top; margin-right: 2%; "><img style="width: 100px; height: 100px;" src="{{ asset('assets/img/logo.webp') }}" > </div>' +
                                '   <span style="display: inline-block;  vertical-align:middle; font-size: 20px;">' +
                                '      Republic of The Philippines<br> '+
                                '      <b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</b><br> '+
                                '      Regional Center Site, Rawis, Legazpi City<br> ' + formattedDate + ' <br><br>' +
                                '      <h2>DOCUMENTATION SUB-CLASS</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>'+
                                '   </span>' +
                                '   <div style="display: inline-block;  vertical-align:top; margin-left: 2%; "><img style="width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > </div>' +
                                '</div>');
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').prepend($('#dTSubClassifications tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTSubClassifications_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTSubClassifications_search').val();
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
        let tabDSC = false;
        $('label[for=tabDSC]').click(function() {
            if (tabDSC == false) {
                dTSubClassifications_func();
                DSCpupolateSelectTag(); // populate select tag
                tabDSC = true;
            }
        });

        if ($('#dTSubClassifications_loader').val() == 'load') {
            if (tabDSC == false) {
                dTSubClassifications_func();
                tabDSC = true;
            }
        }
        /* endregion Call tab on click */
        
        /* =================================REGION QUERIES STARTS HERE====================================== */
        
        // region populate document classification select tag
        function DSCpupolateSelectTag() {
            $.ajax({
                url: "{{ url('fetch-redtsClassifications') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        $('#addDSCclassification_id').empty().append('' +
                            '<option value="">-- Choose Classification --</option>'
                        );
                        console.log(r.classifications);
                        r.classifications.forEach(dt => {
                            $('#addDSCclassification_id').append('' +
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
        }
        // endregion populate document classification select tag

        // region pupolate select tag when clicked
        $('#dTSubClassifications_wrapper .btn-group .btnShowAddModal').click(function() {
            DSCpupolateSelectTag();
        });
        // endregion pupolate select tag when clicked

        // region add
        $('.btnAddDSC').click(function() {
            if ($('#addDSCdescription').val() != '' && $('#addDSCslug').val() != '' && $('#addDSCclassification_id option:selected').val()) {
                let form = $("#addSubClassificationForm")[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "{{ url('insert-redtsSubClass') }}",
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
                            $('#addSubClassificationModal form').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Data has been successfully added</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> '
                            );

                            $('#addDSCdescription, #addDSCslug').val('');

                            // reload
                            $('#dTSubClassifications').DataTable().ajax.reload(null, false);
                        } else {
                            $('#addSubClassificationModal form').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Input rejected: Slug ' + $('#addDSCslug').val() + ' already exists</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> '
                            );
                            $('#addDSCslug').val('');
                            $('#addDSCdescription, #addDSCslug').each(function() {
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
                $('#addDSCdescription, #addDSCslug').each(function() {
                    if ($(this).val() == '') {
                        $(this).css('border-color', 'red');
                    }
                })
                $('#addSubClassificationModal form').append('' +
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
        $('.btnEditDSC').click(function() {
            if ($('#editDSCdescription').val() != '' && $('#editDSCslug').val() != '') {
                let form = $("#editSubClassificationForm")[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "{{ url('edit-redtsSubClass') }}",
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
                            $('#editSubClassificationModal form').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Data has been successfully updated</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );

                            // reload
                            $('#dTSubClassifications').DataTable().ajax.reload(null, false);
                        } else {
                            $('#editSubClassificationModal form').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Input rejected: Slug ' + $('#editDSCslug').val() + ' already exists</strong> ' + r.message +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                            $('#editDSCslug').val('');
                            $('#editDSCdescription, #editDSCslug').each(function() {
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
                $('#editDSCdescription, #editDSCslug').each(function() {
                    if ($(this).val() == '') {
                        $(this).css('border-color', 'red');
                    }
                })
                $('#editSubClassificationModal form').append('' +
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
        $('#dTSubClassifications').on('click', '.fetchDtSubClass', function() {
            // editSubClassificationForm
            let id = $(this).data('id');
            let sub_class = $(this).data('sub_class');
            let full_description = $(this).data('full_description');
            let slug = $(this).data('slug');

            $('#editDSCid').val(id);
            $('#editDSCdescription').val(sub_class);
            $('#editDSCfull_description').empty().text(full_description);
            $('#editDSCslug').val(slug);
        });
        // endregion fecth data for update

        //region create delete alert
        $('#dTSubClassifications').on('click', '.btnAlertDelDSC', function() {
            let id = $(this).data('id');
            let sub_class = $(this).data('sub_class');

            $('.deleteDSCcontainer').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Remove ' + sub_class + '?</strong> ' +
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
        $('.deleteDSCcontainer').on('click', '.btnRemoveDSC', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('trash-redtsSubClass') }}",
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
                        $('#dTSubClassifications').DataTable().ajax.reload(null, false);
                    } else {
                        $('.deleteDSCcontainer').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                            '    <strong>Item with id: '+ id +' might already been moved or removed from table</strong> ' +
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
