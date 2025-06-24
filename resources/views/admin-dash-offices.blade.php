{{-- region deletion div --}}
<div class="dltdTOfficescont" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete items here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTOffices" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Region</th>
            <th>Full Office Name</th>
            <th>Office</th>
            <th>Slug</th>
            <th>Office Type</th>
            <th>Office Address</th>
            <th>Number of Users</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Region</th>
            <th>Full Office Name</th>
            <th>Office</th>
            <th>Slug</th>
            <th>Office Type</th>
            <th>Office Address</th>
            <th>Number of Users</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region Add modal --}}
<div class="modal fade" id="addOfficeModal" tabindex="-1" aria-labelledby="addOfficeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD OFFICES</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="addOfficeModalForm">
                    <button class="btn btn-success btn-sm mb-2" id="btnaddOfficeCollection">
                        <i class="fa fa-building" aria-hidden="true"></i> Add Form
                    </button>

                    <div class="addOffice_collection_msg">
                        {{-- user collection be added here --}}
                    </div>

                    <div class="addOffice_collection">
                        {{-- user collection be added here --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnaddOfficeModal">Submit</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region Edit modal --}}
<div class="modal fade" id="editOfficesModal" tabindex="-1" aria-labelledby="editOfficeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT USER INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="editOfficeForm">
                    <div class="editOffices_collection_msg">
                        {{-- user collection be added here --}}
                    </div>

                    <div class="editOffices_collection">
                        {{-- user collection be added here --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btneditOffice">Save</button>
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
    <input type="hidden" id="dTOffices_loader" @if ($active_tab == 'tabOffices') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTOffices_func() {
            // Setup - add a text input to each footer cell
            $('#dTOffices tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTOffices').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-officeInfo",
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
                    /* region_id */
                    {
                        data: 'region',
                    },
                    /* full_office_name */
                    {
                        data: 'full_office_name',
                        render: function(data, type, row) {
                            return '' +
                                '<span ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#editOfficesModal" ' +
                                '   class="fetcheditOfficesDt" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-region="' + row['region_id'] + '" ' +
                                '   data-office_type="' + row['office_type'] + '" ' +
                                '   data-full_office_name="' + row['full_office_name'] + '" ' +
                                '   data-office="' + row['office'] + '" ' +
                                '   data-slug="' + row['slug'] + '" ' +
                                '> ' +
                                '   ' + row['full_office_name'] +
                                '</span> ' +
                                '';
                        }
                    },
                    /* office */
                    {
                        data: 'office',
                    },
                    /* slug */
                    {
                        data: 'slug',
                    },
                    /* office_type */
                    {
                        data: 'office_type',
                    },
                    /* office_address */
                    {
                        data: 'office_address',
                    },
                    /* office_users */
                    {
                        data: 'office_users_count',
                        render: function(data, type, row) {
                            let office_users_count = row['office_users_count'];
                            return (office_users_count == 0 ? '<div class="text-danger">0</div>' : '<div class="text-success">' + office_users_count + '</div>');
                        }
                    },
                    /* Action */
                    {
                        data: null,
                        render: function(data, type, row) {
                            let disp = '';
                            disp = '' +
                                '<h4 ' +
                                '   class="btnAlertDelUser" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-office="' + row['office'] + '" ' +
                                '   data-full_office_name="' + row['full_office_name'] + '" ' +
                                '> ' +
                                '   <span ' +
                                '       class="badge bg-danger border border-danger text-white"' +
                                '   >' +
                                '       <i class="fa fa-trash" aria-hidden="true"></i>' +
                                '   </span>' +
                                '</h4>'

                            return disp;
                        }
                    },
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                rowGroup: {
                    dataSrc: ['region']
                },
                columnDefs: [{
                    width: '5%',
                    targets: [0],
                    visible: true,
                }, {
                    targets: [1],
                    visible: false,
                }],
                fixedColumns: {
                    left: 1
                },
                order: [
                    [2, 'desc']
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
                            '<span data-bs-toggle="modal" data-bs-target="#addOfficeModal">' +
                            '   <i class="fa fa-plus" aria-hidden="true"></i> Add Office' +
                            '</span>',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: `DENR V OFFICES ${new Date().toLocaleDateString()}`,
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
                                '      Republic of The Philippines<br> ' +
                                '      <b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</b><br> ' +
                                '      Regional Center Site, Rawis, Legazpi City<br> ' + formattedDate + ' <br><br>' +
                                '      <h2>OFFICES</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTOffices thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTOffices tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTOffices_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTOffices_search').val();
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
        let tabOffices = false;
        $('label[for=tabOffices]').click(function() {
            if (tabOffices == false) {
                dTOffices_func();
                tabOffices = true;
            }
        });

        if ($('#dTOffices_loader').val() == 'load') {
            if (tabOffices == false) {
                dTOffices_func();
                tabOffices = true;
            }
        }
        /* endregion Call tab on click */
    });
</script>
{{-- endregion populate table --}}

{{-- region queries --}}
<script>
    $(function() {

        // region get access types
        let region_arr = [];
        $.ajax({
            url: "{{ url('get-regions') }}",
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            success: function(r) {
                if (r.success) {
                    region_arr = r.region;
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
        // endregion get access types

        // region add office collection
        $('#btnaddOfficeCollection').click(function(e) {
            e.preventDefault();
            populate_addOffice_collection();
        })

        let office_collection_count = 1;

        function populate_addOffice_collection() {
            let region_option = '';
            region_arr.forEach(dt => {
                if (region_arr.length > 7) {
                    if (dt.id == 7) {
                        region_option += '<option value="' + dt.id + '" selected>' + dt.region + '</option>';
                    } else {
                        region_option += '<option value="' + dt.id + '">' + dt.region + '</option>';
                    }
                } else {
                    access_option = '';
                    console.log('Access types insufficient no receiving clerk found');
                }
            });

            $('.addOffice_collection').append('' +
                '<div class="div_cont collection_cont' + office_collection_count + ' mb-1" style="position: relative"> ' +
                '    <input type="hidden" class="form-control" name="collection[]" value="collection_cont' + office_collection_count + '"> ' +
                '    <button style="position: absolute; top: 4px; right: 0.5%;" class="btn btn-danger btn-sm btn-remove-collection" tooltip="Remove Item" flow="down"> ' +
                '        x ' +
                '    </button> ' +
                '    <div class="d-grid gap-2"> ' +
                '        <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#Collection' + office_collection_count + '" role="button" aria-expanded="false" aria-controls="Collection' + office_collection_count + '"> ' +
                '            Collection ' + office_collection_count +
                '        </a> ' +
                '    </div> ' +
                '    <div class="collapse show" id="Collection' + office_collection_count + '"> ' +
                '        <div class="card card-body"> ' +
                '            <div class="row"> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addOfficeregion" class="form-label fs-6">Region <span class="text-danger">*</span></label> ' +
                '                    <select class="form-control" name="region[]"> ' +
                '                        ' + region_option +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addOfficeoffice_type" class="form-label fs-6">Office Type <span class="text-danger">*</span></label> ' +
                '                    <select class="form-control" name="office_type[]"> ' +
                '                        <option value="Office">Office</option> ' +
                '                        <option value="Receiving">Receiving</option> ' +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addOfficefull_office_name" class="form-label fs-6">Full Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="full_office_name[]" placeholder="Input full office name here"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addOfficeoffice" class="form-label fs-6">Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="office[]" placeholder="R5-SampOffice-Div-Sec"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addOfficeslug" class="form-label fs-6">Slug <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="slug[]" placeholder="R5-SampOffice-Div-Sec"> ' +
                '                </div> ' +
                '            </div> ' +
                '        </div> ' +
                '    </div> ' +
                '</div> ' +
                ''
            );

            office_collection_count += 1; //increment collection count
        }
        // endregion add office collection


        // region remove collection
        $('.addOffice_collection, .editOffices_collection').on('click', '.btn-remove-collection', function(e) {
            e.preventDefault();

            $(this).closest('div.div_cont').remove();
        });
        // endregion remove collection

        // region add
        $('.btnaddOfficeModal').click(function() {
            let form = $("#addOfficeModalForm")[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "insert-Offices",
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
                        console.log(r);

                        // remove this fields since it is saved
                        r.collection_remove.forEach(dt => {
                            let collection = dt.collection_id;

                            $('.addOffice_collection').find('div.' + collection).remove();
                        });

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.addOffice_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.addOffice_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTOffices').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion add

        // region edit
        $('.btneditOffice').click(function() {
            let form = $("#editOfficeForm")[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "edit-Offices",
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
                        console.log(r);

                        // remove this fields since it is saved
                        r.collection_remove.forEach(dt => {
                            let collection = dt.collection_id;

                            $('.editOffices_collection').find('div.' + collection).remove();
                        });

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.editOffices_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.editOffices_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTOffices').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion edit

        // region fecth data for update
        $('#dTOffices').on('click', '.fetcheditOfficesDt', function() {
            // editOfficeForm
            let id = $(this).data('id');
            let region = $(this).data('region');
            let office_type = $(this).data('office_type');
            let full_office_name = $(this).data('full_office_name');
            let office = $(this).data('office');
            let slug = $(this).data('slug');

            console.log('id = ' + id);
            console.log('region = ' + region);
            console.log('office_type = ' + office_type);
            console.log('full_office_name = ' + full_office_name);
            console.log('office = ' + office);
            console.log('slug = ' + slug);

            let region_option = '';
            region_arr.forEach(dt => {
                if (region == dt.id) {
                    region_option += '<option value="' + dt.id + '" selected>' + dt.region + '</option>';
                } else {
                    region_option += '<option value="' + dt.id + '">' + dt.region + '</option>';
                }
            });

            $('.editOffices_collection').prepend('' +
                '<div class="div_cont collection_cont' + id + ' mb-1" style="position: relative"> ' +
                '    <input type="hidden" class="form-control" name="collection[]" value="collection_cont' + id + '"> ' +
                '    <button style="position: absolute; top: 4px; right: 0.5%;" class="btn btn-danger btn-sm btn-remove-collection" tooltip="Remove Item" flow="down"> ' +
                '        x ' +
                '    </button> ' +
                '    <div class="d-grid gap-2"> ' +
                '        <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#Collection' + id + '" role="button" aria-expanded="false" aria-controls="Collection' + id + '"> ' +
                '            Collection ' + id +
                '        </a> ' +
                '    </div> ' +
                '    <div class="collapse show" id="Collection' + id + '"> ' +
                '        <div class="card card-body"> ' +
                '            <div class="row"> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addOfficeregion" class="form-label fs-6">Region <span class="text-danger">*</span></label> ' +
                '                    <select type="text" class="form-control" name="region[]"> ' +
                '                        ' + region_option +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addOfficeoffice_type" class="form-label fs-6">Office Type <span class="text-danger">*</span></label> ' +
                '                    <select type="text" class="form-control" name="office_type[]"> ' +
                '                        <option value="Office" ' + (office_type == 'Office' ? 'selected' : '') + '>Office</option> ' +
                '                        <option value="Receiving" ' + (office_type == 'Receiving' ? 'selected' : '') + '>Receiving</option> ' +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addOfficefull_office_name" class="form-label fs-6">Full Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="hidden" class="form-control" name="id[]" value="' + id + '"> ' +
                '                    <input type="text" class="form-control" name="full_office_name[]" placeholder="Input full office name here" value="' + full_office_name + '"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addOfficeoffice" class="form-label fs-6">Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="office[]" placeholder="Input office here" value="' + office + '"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addOfficeslug" class="form-label fs-6">Slug <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="slug[]" placeholder="Input slug here" value="' + slug + '"> ' +
                '                </div> ' +
                '            </div> ' +
                '        </div> ' +
                '    </div> ' +
                '</div> ' +
                ''
            );
        });
        // endregion fecth data for update

        //region create delete alert
        $('#dTOffices').on('click', '.btnAlertDelUser', function() {
            let id = $(this).data('id');
            let office = $(this).data('office');
            let full_office_name = $(this).data('full_office_name');

            $('.dltdTOfficescont').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Remove ' + full_office_name + ' (' + office + ')?</strong> &nbsp; &nbsp; &nbsp;' +
                '    <br>' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white btnRemoveUser" data-bs-dismiss="alert" data-id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i> Confirm Remove</button> ' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white" data-bs-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button> ' +
                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                '</div> ' +
                ''
            );
        });
        //region create delete alert

        // region soft del
        $('.dltdTOfficescont').on('click', '.btnRemoveUser', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('trash-redtsOffice') }}",
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
                        $('#dTOffices').DataTable().ajax.reload(null, false);
                    } else {
                        if (r.msg != '') {
                            console.log(r.msg);
                            $('.dltdTOfficescont').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>' + r.msg + ' &nbsp;&nbsp;&nbsp;&nbsp;</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                        }

                        $('.dltdTOfficescont').append('' +
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
