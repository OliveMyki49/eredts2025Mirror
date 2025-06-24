{{-- region deletion div --}}
<div class="deleteDCcontainer" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete DCs here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTClassifications" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Document Classification</th>
            <th>Slug</th>
            <th>Sub-Class</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Document Classification</th>
            <th>Slug</th>
            <th>Sub-Class</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region Add modal --}}
<div class="modal fade" id="addClassificationModal" tabindex="-1" aria-labelledby="addClassificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD DOCUMENT CLASSIFICATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="addClassificationForm">
                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="addDCdescription" class="form-label">Document Classification <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="addDCdescription" name="description" placeholder="Document title / description">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="addDCslug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control toUpperCase" id="addDCslug" name="slug" placeholder="Abbreviation (must be unique)">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnAddDC">Add</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region Edit modal --}}
<div class="modal fade" id="editClassificationModal" tabindex="-1" aria-labelledby="editClassificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT DOCUMENT CLASSIFICATION FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="editClassificationForm">
                    <input type="hidden" name="id" id="editDCid">

                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="editDCdescription" class="form-label">Document Classification <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editDCdescription" name="description" placeholder="Document title / description">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="editDCslug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control toUpperCase" id="editDCslug" name="slug" placeholder="Abbreviation (must be unique)" @readonly(true)>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnEditDC">Save</button>
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
    <input type="hidden" id="dTClassifications_loader" @if ($active_tab == 'tabDC') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTClassifications_func() {
            // Setup - add a text input to each footer cell
            $('#dTClassifications tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTClassifications').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-redtsClassifications",
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
                    /* 1 description */
                    {
                        data: 'description',
                        render: function(data, type, row) {
                            return '' +
                                '<span ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#editClassificationModal" ' +
                                '   class="fetchDt" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-description="' + row['description'] + '" ' +
                                '   data-slug="' + row['slug'] + '" ' +
                                '> ' +
                                '   ' + row['description'] +
                                '</span> ' +
                                '';
                        }
                    },
                    /* 2 slug */
                    {
                        data: 'slug',
                    },
                    /* 2 count_sub_class */
                    {
                        data: 'count_sub_class',
                    },
                    /* 2 Action */
                    {
                        data: null,
                        render: function(data, type, row) {
                            let disp = '';
                            if (row['count_sub_class'] == 0) {
                                disp = '' +
                                    '<h4 ' +
                                    '   class="btnAlertDelDC" ' +
                                    '   style="cursor: pointer" ' +
                                    '   onMouseOut="this.style.color=`#000`" ' +
                                    '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                    '   data-id="' + row['id'] + '" ' +
                                    '   data-description="' + row['description'] + '" ' +
                                    '> ' +
                                    '   <span ' +
                                    '       class="badge bg-danger border border-danger text-white"' +
                                    '   >' +
                                    '       <i class="fa fa-trash" aria-hidden="true"></i>' +
                                    '   </span>' +
                                    '</h4>'
                            } else {
                                disp = '' +
                                    '<h4> ' +
                                    '   <span ' +
                                    '       class="badge bg-secondary border border-secondary text-white"' +
                                    '   >' +
                                    '       <i class="fa fa-trash" aria-hidden="true"></i>' +
                                    '   </span>' +
                                    '</h4>'
                            }

                            return disp;
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
                    visible: true,
                }, {
                    targets: [4],
                    visible: false,
                }],
                fixedColumns: {
                    left: 1
                },
                order: [
                    [0, 'desc']
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
                            '<span data-bs-toggle="modal" data-bs-target="#addClassificationModal">' +
                            '   <i class="fa fa-plus" aria-hidden="true"></i> Add Classification' +
                            '</span>',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: `DOCUMENTATION CLASSIFICATION ${new Date().toLocaleDateString()}`,
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
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/logo.webp') }}" > ' +
                                '   <span style="display: inline-block;  vertical-align:middle; font-size: 20px;">' +
                                '      Republic of The Philippines<br> '+
                                '      <b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</b><br> '+
                                '      Regional Center Site, Rawis, Legazpi City<br> ' + formattedDate + ' <br><br>' +
                                '      <h2>DOCUMENTATION CLASSIFICATION</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>'+
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTClassifications thead').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTClassifications_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTClassifications_search').val();
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
        let tabDC = false;
        $('label[for=tabDC]').click(function() {
            if (tabDC == false) {
                dTClassifications_func();
                tabDC = true;
            }
        });

        if ($('#dTClassifications_loader').val() == 'load') {
            if (tabDC == false) {
                dTClassifications_func();
                tabDC = true;
            }
        }
        /* endregion Call tab on click */
    });
</script>
{{-- endregion populate table --}}

{{-- region queries --}}
<script>
    $(function() {
        // region add
        $('.btnAddDC').click(function() {
            if ($('#addDCdescription').val() != '' && $('#addDCslug').val() != '') {
                let form = $("#addClassificationForm")[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "{{ url('insert-redtsClassifications') }}",
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
                            $('#addClassificationModal form').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Data has been successfully added</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );

                            $('#addDCdescription, #addDCslug').val('');

                            // reload
                            $('#dTClassifications').DataTable().ajax.reload(null, false);
                        } else {
                            $('#addClassificationModal form').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Input rejected: Slug ' + $('#addDCslug').val() + ' already exists</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                            $('#addDCslug').val('');
                            $('#addDCdescription, #addDCslug').each(function() {
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
                $('#addDCdescription, #addDCslug').each(function() {
                    if ($(this).val() == '') {
                        $(this).css('border-color', 'red');
                    }
                })
                $('#addClassificationModal form').append('' +
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
        $('.btnEditDC').click(function() {
            if ($('#editDCdescription').val() != '' && $('#editDCslug').val() != '') {
                let form = $("#editClassificationForm")[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "{{ url('edit-redtsClassifications') }}",
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
                            $('#editClassificationModal form').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Data has been successfully updated</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );

                            // reload
                            $('#dTClassifications').DataTable().ajax.reload(null, false);
                        } else {
                            $('#editClassificationModal form').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Input rejected: Slug ' + $('#editDCslug').val() + ' already exists</strong> ' + r.message +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                            $('#editDCslug').val('');
                            $('#editDCdescription, #editDCslug').each(function() {
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
                $('#editDCdescription, #editDCslug').each(function() {
                    if ($(this).val() == '') {
                        $(this).css('border-color', 'red');
                    }
                })
                $('#editClassificationModal form').append('' +
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
        $('#dTClassifications').on('click', '.fetchDt', function() {
            // editClassificationForm
            let id = $(this).data('id');
            let description = $(this).data('description');
            let slug = $(this).data('slug');

            $('#editDCid').val(id);
            $('#editDCdescription').val(description);
            $('#editDCslug').val(slug);
        });
        // endregion fecth data for update

        //region create delete alert
        $('#dTClassifications').on('click', '.btnAlertDelDC', function() {
            let id = $(this).data('id');
            let description = $(this).data('description');

            $('.deleteDCcontainer').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Remove ' + description + '?</strong> ' +
                '    <br>' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white btnRemoveDC" data-bs-dismiss="alert" data-id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i> Confirm Remove</button> ' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white" data-bs-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button> ' +
                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                '</div> ' +
                ''
            );
        });
        //region create delete alert

        // region soft del
        $('.deleteDCcontainer').on('click', '.btnRemoveDC', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('trash-redtsClassifications') }}",
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
                        $('#dTClassifications').DataTable().ajax.reload(null, false);
                    } else {
                        $('.deleteDCcontainer').append('' +
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
