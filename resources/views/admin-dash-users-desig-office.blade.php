{{-- region deletion div --}}
<div class="dltUDOcont" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete items here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTUDOInfo" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Office</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Office</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region Add modal --}}
<div class="modal fade" id="addUDOModal" tabindex="-1" aria-labelledby="addUDOModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">DESIGNATE OFFICE FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="addUDOModalForm">
                    <div class="row g-3">
                        <div class="col">
                            <label for="inputaddUDOusers" class="form-label">Users ID</label>
                            <input class="form-control" list="btnaddUDOusersdtListOptions" id="inputaddUDOusers" placeholder="Type to search...">
                            <datalist id="btnaddUDOusersdtListOptions">
                                {{-- populate users here --}}
                                {{-- <option value="Sample Value"> --}}
                            </datalist>
                        </div>

                        <div class="col">
                            <label for="inputaddUDOoffices" class="form-label">Offices ID</label>
                            <input class="form-control" list="btnaddUDOofficesdtListOptions" id="inputaddUDOoffices" placeholder="Type to search...">
                            <datalist id="btnaddUDOofficesdtListOptions">
                                {{-- populate office here --}}
                                {{-- <option value="Sample Value"> --}}
                            </datalist>
                        </div>

                        <div class="col">
                            <button class="btn btn-outline-primary btn-addtocollection">Add</button>
                        </div>
                    </div>



                    <div style="position: fixed; top: 10px; left: 40%; z-index: 900;" class="add_UDO_collection_msg">
                        {{-- user collection be added here --}}
                    </div>

                    <div class="add_UDO_collection">
                        {{-- user collection be added here --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnaddUDOModal">Submit</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region Edit modal --}}
<div class="modal fade" id="editUDOModalForm" tabindex="-1" aria-labelledby="editUDOModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT USER INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="editUDOForm">
                    <p class="d-inline-flex gap-1">
                        <input type="text" style="height: 30px;" class="rounded border-success" id="searchbtneditUDOoffices" placeholder="🔍 Search office">

                        <script>
                            // filter the office in select tag
                            $(document).ready(function() {
                                $("#searchbtneditUDOoffices").on("input", function() {
                                    var filter = $(this).val().toUpperCase();
                                    $(".edit_UDO_collection .edit-UDO-select-offices-tag-arr option").each(function() {
                                        if ($(this).text().toUpperCase().indexOf(filter) > -1) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });

                                    $('.edit_UDO_collection_msg').append('' +
                                        '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                        '    <strong>Search filter active</strong><br>' +
                                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                        '</div>'
                                    );
                                    // Close the message after 5 seconds
                                    setTimeout(function() {
                                        console.log('remove notifs');
                                        $('.edit_UDO_collection_msg').empty(); // Remove the message
                                    }, 2000); // 5000 milliseconds = 5 seconds
                                });
                            });
                        </script>
                    </p>
                    <div style="position: fixed; top: 10px; left: 40%; z-index: 900;" class="edit_UDO_collection_msg">
                        {{-- user collection be added here --}}
                    </div>

                    <div class="edit_UDO_collection">
                        {{-- user collection be added here --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btneditUDO">Save</button>
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
    <input type="hidden" id="dTUDOInfo_loader" @if ($active_tab == 'tabUDO') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTUDOInfo_func() {
            // Setup - add a text input to each footer cell
            $('#dTUDOInfo tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTUDOInfo').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-userDesigOffice",
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
                    /* ID */
                    {
                        data: 'id',
                    },
                    /* user */
                    {
                        data: 'username',
                        render: function(data, type, row) {
                            return row['username'] + '<br><sup class="text-secondary">User id: ' + row['user_id'] + '</sup>';
                        }
                    },
                    /* office */
                    {
                        data: 'office',
                        render: function(data, type, row) {
                            return row['full_office_name'] + '<br><sup class="text-secondary">Office id: ' + row['office_id'] + ' (' + row['slug'] + ')</sup>';
                        }
                    },
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                /* rowGroup: {
                    dataSrc: ['full_office_name']
                }, */
                columnDefs: [{
                    width: '5%',
                    targets: [0],
                    visible: true,
                }],
                fixedColumns: {
                    left: 1
                },
                /* order: [
                    [8, 'asc']
                ], */
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
                            '<span data-bs-toggle="modal" class="btnOpenaddUDOModal" data-bs-target="#addUDOModal">' +
                            '   <i class="fa fa-plus" aria-hidden="true"></i> Designate Office' +
                            '</span>',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: `USERS LIST ${new Date().toLocaleDateString()}`,
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
                                '      <h2>Users List</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTUDOInfo thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTUDOInfo tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTUDOInfo_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTUDOInfo_search').val();
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
        let tabUDO = false;
        $('label[for=tabUDO]').click(function() {
            if (tabUDO == false) {
                dTUDOInfo_func();
                if (btnaddUDOofficesLoaded == false) {
                    offices_arr.forEach(dt => {
                        $('#btnaddUDOofficesdtListOptions').append('<option class="bg-white text-dark option-item" value="[' + dt.id + ']' + dt.slug + '">' + dt.full_office_name + '</option>');
                    });

                    btnaddUDOofficesLoaded = true;
                }
                if (btnaddUDOusersLoaded == false) {
                    users_arr.forEach(dt => {
                        $('#btnaddUDOusersdtListOptions').append('<option class="bg-white text-dark option-item" value="[' + dt.id + ']' + dt.username + '">' + dt.email + '</option>');
                    });

                    btnaddUDOusersLoaded = true;
                }
                tabUDO = true;
            }
        });

        if ($('#dTUDOInfo_loader').val() == 'load') {
            if (tabUDO == false) {
                dTUDOInfo_func();
                tabUDO = true;
            }
        }
        /* endregion Call tab on click */

        /* endregion Call tab on click */

        /* ============================================== REGION QUERIES STARTS HERE ================================================== */

        // region get offices and users
        let offices_arr = [];
        let users_arr = [];

        function addUDOPopulateOfficeArr() {
            // console.log('populate offices dropdown');
            $.ajax({
                url: "{{ url('get-offices') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        offices_arr = r.offices;
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function addUDOPopulateUserArr() {
            // console.log('populate users dropdown');
            $.ajax({
                url: "{{ url('get-users') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        users_arr = r.users;
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        addUDOPopulateOfficeArr() // load data in dropdown
        addUDOPopulateUserArr() // load data in dropdown
        // endregion get offices

        let btnaddUDOofficesLoaded = false;
        $('#dTUDOInfo_wrapper').find('.btnOpenaddUDOModal').click(function() {
            if (btnaddUDOofficesLoaded == false) {
                // $('#btnaddUDOoffices').empty().append('<option value="0">--- No Office Selected ---</option>');
                offices_arr.forEach(dt => {
                    $('#btnaddUDOofficesdtListOptions').append('<option class="bg-white text-dark option-item" value="[' + dt.id + ']' + dt.slug + '">' + dt.full_office_name + '</option>');
                });

                btnaddUDOofficesLoaded = true;
            }
        })

        let btnaddUDOusersLoaded = false;
        $('#dTUDOInfo_wrapper').find('.btnOpenaddUDOModal').click(function() {
            if (btnaddUDOusersLoaded == false) {
                // $('#btnaddUDOoffices').empty().append('<option value="0">--- No Office Selected ---</option>');
                users_arr.forEach(dt => {
                    $('#btnaddUDOusersdtListOptions').append('<option class="bg-white text-dark option-item" value="[' + dt.id + ']' + dt.username + '">' + dt.email + '</option>');
                });

                btnaddUDOusersLoaded = true;
            }
        })

        //region add collection
        $('.btn-addtocollection').click(function(e) {
            e.preventDefault();

            let addUDOuser = $('#inputaddUDOusers').val();
            let addUDOoffice = $('#inputaddUDOoffices').val();

            if (
                addUDOuser != '' &&
                addUDOoffice != ''
            ) {
                let cleanUser = addUDOuser.replace('[', '');
                let cleanOffice = addUDOoffice.replace('[', '');

                let uArr = cleanUser.split(']');
                let oArr = cleanOffice.split(']');

                $('.add_UDO_collection').append('' +
                    '<div class="mt-2 p-2 border border-1 rounded row">' +
                    '   <div class="col mb-3">' +
                    '       <label for="formFile" class="form-label">User ID</label>' +
                    '       <input class="form-control" type="text" name="userId[]" value="' + uArr[0] + '" readonly>' +
                    '       <sup class="text-secondary fw-bold">'+ uArr[1] +'</sup>' +
                    '   </div>' +
                    '   <div class="col mb-3">' +
                    '       <label for="formFile" class="form-label">Office ID</label>' +
                    '       <input class="form-control" type="text" name="officeId[]" value="' + oArr[0] + '" readonly>' +
                    '       <sup class="text-secondary fw-bold">'+ oArr[1] +'</sup>' +
                    '   </div>' +
                    '   <div class="col mb-3">' +
                    '       <button class="btn btn-outline-danger btn-sm btn-remove-collection-item-UDO_collection">Remove</button>' +
                    '   </div>' +
                    '</div>' +
                    ''
                );
            } else {
                $('.add_UDO_collection_msg').append('' +
                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                    '    <strong>Please input <b>user</b> and <b>office</b></strong> ' +
                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                    '</div>'
                );
            }

        });
        //endregion add collection

        //region remove item in add modal
        $('.add_UDO_collection').on('click', '.btn-remove-collection-item-UDO_collection', function(e){
            e.preventDefault();

            $(this).closest('.row').remove();
        });
        //endregion remove item in add modal

        // region add
        $('.btnaddUDOModal').click(function() {
            let form = $("#addUDOModalForm")[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "insert-edit-UserDesig",
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
                        // remove this fields since it is saved
                        $('.add_UDO_collection').empty();

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.add_UDO_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.add_UDO_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTUDOInfo').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion add

        // region edit
        $('.btneditUDO').click(function() {
            let form = $("#editUDOForm")[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "edit-UDOs",
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

                            $('.edit_UDO_collection').find('div.' + collection).remove();
                        });

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.edit_UDO_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.edit_UDO_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTUDOInfo').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion edit

        // region fecth data for update
        $('#dTUDOInfo').on('click', '.fetcheditUDODt', function() {
            // editUDOForm
            let id = $(this).data('id');
            let fname = $(this).data('fname');
            let mname = $(this).data('mname');
            let sname = $(this).data('sname');
            let suffix = $(this).data('suffix');
            let username = $(this).data('username');
            let email = $(this).data('email');
            let access_type = $(this).data('access_type');
            let status = $(this).data('status');
            let admin_delete = $(this).data('admin_delete');
            let offices_id = $(this).data('offices_id');

            console.log('id = ' + id);
            console.log('fname = ' + fname);
            console.log('mname = ' + mname);
            console.log('sname = ' + sname);
            console.log('suffix = ' + suffix);
            console.log('username = ' + username);
            console.log('email = ' + email);
            console.log('access_type = ' + access_type);
            console.log('status = ' + status);
            console.log('admin_delete = ' + admin_delete);
            console.log('offices_id = ' + offices_id);

            if (suffix == null) {
                suffix = '';
            }

            let access_option = '';

            let offices_option = '';
            offices_arr.forEach(dt => {
                if (offices_id == dt.id) {
                    offices_option += '<option value="' + dt.id + '" selected>' + dt.full_office_name + ' (' + dt.slug + ')</option>';
                } else {
                    offices_option += '<option value="' + dt.id + '">' + dt.full_office_name + ' (' + dt.slug + ')</option>';
                }
            });

            $('.edit_UDO_collection').prepend('' +
                '<div class="div_cont edit_collection_cont' + id + ' mb-1" style="position: relative">' +
                '    <input type="hidden" class="form-control" name="collection[]" value="edit_collection_cont' + id + '">' +
                '    <button style="position: absolute; top: 4px; right: 0.5%;" class="btn btn-danger btn-sm btn-remove-collection" tooltip="Remove Item" flow="down">' +
                '        x' +
                '    </button>' +
                '    <div class="d-grid gap-2">' +
                '        <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#Collection' + id + '" role="button" aria-expanded="false" aria-controls="Collection' + id + '">' +
                '            Collection ' + id +
                '        </a>' +
                '    </div>' +
                '    <div class="collapse show" id="Collection' + id + '">' +
                '        <div class="card card-body">' +
                '            <div class="row">' +
                '                <div class="col-md-6 mb-3">' +
                '                    <div class="row">' +
                '                        <div class="col-md-6 mb-2">' +
                '                            <label for="editUDOusername" class="form-label fs-6">Username <span class="text-danger">*</span></label>' +
                '                            <input type="hidden" class="form-control" name="id[]" value="' + id + '">' +
                '                            <input type="text" class="form-control" name="username[]" placeholder="Input Username here" value="' + username + '">' +
                '                        </div>' +
                '                        <div class="col-md-6 mb-2">' +
                '                            <label for="editUDOemail" class="form-label fs-6">Email <span class="text-danger">*</span></label>' +
                '                            <input type="email" class="form-control" name="email[]" placeholder="Input Email here" value="' + email + '">' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOaccess_id" class="form-label fs-6">Access Type <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="access_id[]">' +
                '                               ' + access_option +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOoffice_id" class="form-label fs-6">Office <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control edit-UDO-select-offices-tag-arr" name="office_id[]">' +
                '                               ' + offices_option +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOpass" class="form-label fs-6">Reset Password "rfsoats123" <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="password[]" placeholder="Input Status here" >' +
                '                               <option value="0" class="text-success" selected>no action</option>' +
                '                               <option value="1" class="text-danger">reset password "rfsoats123"</option>' +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOstatus" class="form-label fs-6">Status <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="status[]" placeholder="Input Status here" >' +
                '                               <option value="1" class="text-success" ' + (status == 1 ? 'selected' : '') + '>Active</option>' +
                '                               <option value="0" class="text-danger" ' + (status == 0 ? 'selected' : '') + '>Inactive</option>' +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOadmin_delete" class="form-label fs-6">Admin Delete <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="admin_delete[]" placeholder="Input Admin Delete here">' +
                '                               <option value="0" class="text-danger" ' + (admin_delete == 0 ? 'selected' : '') + '>Not Allowed</option>' +
                '                               <option value="1" class="text-success" ' + (admin_delete == 1 ? 'selected' : '') + '>Allowed</option>' +
                '                            </select>' +
                '                        </div>' +
                '                    </div>' +
                '                </div>' +
                '                <div class="col-md-6 mb-3">' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOfname" class="form-label fs-6">First Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="fname[]" placeholder="Input First Name here" value="' + fname + '">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOmname" class="form-label fs-6">Middle Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="mname[]" placeholder="Input Middle Name here" value="' + mname + '">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOsname" class="form-label fs-6">Last Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="sname[]" placeholder="Input Last Name here" value="' + sname + '">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUDOsuffix" class="form-label fs-6">Suffix <span class="text-primary">(optional)</span></label>' +
                '                            <input type="text" class="form-control" name="suffix[]" placeholder="Input Suffix here" value="' + suffix + '">' +
                '                    </div>' +
                '                </div>' +
                '            </div>' +
                '        </div>' +
                '    </div>' +
                '</div>' +
                ''
            );
        });
        // endregion fecth data for update

        //region create delete alert
        $('#dTUDOInfo').on('click', '.btnAlertDelUDO', function() {
            let id = $(this).data('id');
            let username = $(this).data('username');

            $('.dltUDOcont').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Remove user "' + username + '"?</strong> ' +
                '    <br>' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white btnRemoveUDO" data-bs-dismiss="alert" data-id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i> Confirm Remove</button> ' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white" data-bs-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button> ' +
                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                '</div> ' +
                ''
            );
        });
        //region create delete alert

        // region soft del
        $('.dltUDOcont').on('click', '.btnRemoveUDO', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('trash-user') }}",
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
                        $('#dTUDOInfo').DataTable().ajax.reload(null, false);
                        $('.dltUDOcont').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert"> ' +
                            '    <strong>User with id: ' + id + ' has been archived</strong> ' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                            '</div> ' +
                            ''
                        );
                    } else {
                        $('.dltUDOcont').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert"> ' +
                            '    <strong>User with id: ' + id + ' might already been moved or removed from table</strong> ' +
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
