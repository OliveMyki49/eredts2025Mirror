{{-- region deletion div --}}
<div class="dltUsercont" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete items here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTUserInfo" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Access Type</th>
            <th>Status</th>
            <th>Admin Delete</th>
            <th>Image</th>
            <th>Office</th>
            <th>Action</th>
            <th>Last Update</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Access Type</th>
            <th>Status</th>
            <th>Admin Delete</th>
            <th>Image</th>
            <th>Office</th>
            <th>Action</th>
            <th>Last Update</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region Add modal --}}
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD USERS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="addUserModalForm">
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-success btn-sm mb-2" id="btnaddUserCollection">
                            <i class="fa fa-address-card-o" aria-hidden="true"></i> Add Form
                        </button>

                        <select type="text" class="btn btn-outline-success btn-sm" id="btnaddUseroffices" name="offices" style="height: 31px">
                        </select>

                        <input type="text" style="height: 30px;" class="rounded border-success" id="searchbtnaddUseroffices" placeholder="🔍 Search office">

                        <script>
                            // filter the office in select tag
                            $(document).ready(function() {
                                $("#searchbtnaddUseroffices").on("input", function() {
                                    var filter = $(this).val().toUpperCase();
                                    $("#btnaddUseroffices option").each(function() {
                                        if ($(this).text().toUpperCase().indexOf(filter) > -1) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                    $(".add_user_collection .add-user-select-offices-tag-arr option").each(function() {
                                        if ($(this).text().toUpperCase().indexOf(filter) > -1) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                });
                            });
                        </script>
                    </p>

                    <div style="position: fixed; top: 10px; left: 40%; z-index: 900;" class="add_user_collection_msg">
                        {{-- user collection be added here --}}
                    </div>

                    <div class="add_user_collection">
                        {{-- user collection be added here --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnaddUserModal">Submit</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region Edit modal --}}
<div class="modal fade" id="editUserModalForm" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT USER INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="editUserForm">
                    <p class="d-inline-flex gap-1">
                        <input type="text" style="height: 30px;" class="rounded border-success" id="searchbtneditUseroffices" placeholder="🔍 Search office">

                        <script>
                            // filter the office in select tag
                            $(document).ready(function() {
                                $("#searchbtneditUseroffices").on("input", function() {
                                    var filter = $(this).val().toUpperCase();
                                    $(".edit_user_collection .edit-user-select-offices-tag-arr option").each(function() {
                                        if ($(this).text().toUpperCase().indexOf(filter) > -1) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });

                                    $('.edit_user_collection_msg').append('' +
                                        '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                        '    <strong>Search filter active</strong><br>' +
                                        '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                        '</div>'
                                    );
                                    // Close the message after 5 seconds
                                    setTimeout(function() {
                                        console.log('remove notifs');
                                        $('.edit_user_collection_msg').empty(); // Remove the message
                                    }, 2000); // 5000 milliseconds = 5 seconds
                                });
                            });
                        </script>
                    </p>
                    <div style="position: fixed; top: 10px; left: 40%; z-index: 900;" class="edit_user_collection_msg">
                        {{-- user collection be added here --}}
                    </div>

                    <div class="edit_user_collection">
                        {{-- user collection be added here --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btneditUser">Save</button>
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
    <input type="hidden" id="dTUserInfo_loader" @if ($active_tab == 'tabUsers') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTUserInfo_func() {
            // Setup - add a text input to each footer cell
            $('#dTUserInfo tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTUserInfo').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-userInfos",
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
                    /* 1 fname */
                    {
                        data: 'fname',
                        render: function(data, type, row) {
                            let fname = row['fname'];
                            let mname = row['mname'];
                            let sname = row['sname'];
                            let suffix = (row['suffix'] != null ? row['suffix'] : '');
                            let fullname = fname + ' ' + mname + ' ' + sname + ' ' + suffix;

                            return '' +
                                '<span ' +
                                '   data-bs-toggle="modal" ' +
                                '   data-bs-target="#editUserModalForm" ' +
                                '   class="fetcheditUserDt" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-fname="' + row['fname'] + '" ' +
                                '   data-mname="' + row['mname'] + '" ' +
                                '   data-sname="' + row['sname'] + '" ' +
                                '   data-suffix="' + row['suffix'] + '" ' +
                                '   data-username="' + row['username'] + '" ' +
                                '   data-email="' + row['email'] + '" ' +
                                '   data-access_type="' + row['access_id'] + '" ' +
                                '   data-status="' + row['status'] + '" ' +
                                '   data-admin_delete="' + row['admin_delete'] + '" ' +
                                '   data-offices_id="' + row['offices_id'] + '" ' +
                                '> ' +
                                '   ' + fullname +
                                '</span> ' +
                                '';
                        }
                    },
                    /* 2 username */
                    {
                        data: 'username',
                    },
                    /* 3 email */
                    {
                        data: 'email',
                    },
                    /* 4 access_type */
                    {
                        data: 'access_type',
                    },
                    /* 5 status */
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (row['status'] == 1) {
                                return '<span class="text-success">active</span>';
                            } else {
                                return '<span class="text-danger">inactive</span>';
                            }
                        }
                    },
                    /* 6 admin_delete */
                    {
                        data: 'admin_delete',
                        render: function(data, type, row) {
                            if (row['admin_delete'] == 1) {
                                return '<span class="text-success">allowed</span>';
                            } else {
                                return '<span class="text-danger">not allowed</span>';
                            }
                        }
                    },
                    /* 7 image */
                    {
                        data: 'image',
                        render: function(data, type, row) {
                            let img = row['image'] || '../assets/img/no_image.jpg';
                            let placeholder = '../assets/img/no_image.jpg';

                            // Return a placeholder first
                            return '<div style="position: relative"><div class="zoom" style="position: relative"><img src="' + placeholder + '" alt="No Photo Found" width="80" height="80"></div></div>';

                            // Then check if the actual image exists and update the src if it does
                            imageExists(img, function(exists) {
                                if (exists) {
                                    // Update the img src if it exists
                                    $('img[src="' + placeholder + '"]').attr('src', img);
                                }
                            });
                        }
                    },
                    /* 8 office */
                    {
                        data: 'full_office_name',
                    },
                    /* 9 Action */
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
                                '   data-username="' + row['username'] + '" ' +
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
                    /* 10 office */
                    {
                        data: 'updated_at',
                        render: function(data, type, row) {
                            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            const d = new Date(row['updated_at']);
                            let month = months[d.getMonth()];
                            return '' +
                                '' + month.toUpperCase() + ' ' + d.getDate() + ', ' + d.getFullYear() +
                                '<br>' + d.getHours() + ':' + (d.getMinutes() >= 10 ? d.getMinutes() : '0' + d.getMinutes()) +
                                '';
                        }
                    },
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                rowGroup: {
                    dataSrc: ['full_office_name']
                },
                columnDefs: [{
                    width: '5%',
                    targets: [0],
                    visible: true,
                }, {
                    targets: [8],
                    visible: false,
                }],
                fixedColumns: {
                    left: 1
                },
                order: [
                    [8, 'asc']
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
                            '<span data-bs-toggle="modal" class="btnOpenAddUserModal" data-bs-target="#addUserModal">' +
                            '   <i class="fa fa-plus" aria-hidden="true"></i> Add User' +
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
                            // $(win.document.body).find('table').prepend($('#dTUserInfo thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTUserInfo tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTUserInfo_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTUserInfo_search').val();
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
        let tabUsers = false;
        $('label[for=tabUsers]').click(function() {
            if (tabUsers == false) {
                dTUserInfo_func();
                if (btnaddUserofficesLoaded == false) {
                    $('#btnaddUseroffices').empty().append('<option value="0">--- No Office Selected ---</option>');
                    offices_arr.forEach(dt => {
                        $('#btnaddUseroffices').append('<option class="bg-white text-dark" value="' + dt.id + '">' + dt.full_office_name + ' (' + dt.slug + ')</option>');
                    });

                    btnaddUserofficesLoaded = true;
                }
                tabUsers = true;
            }
        });

        if ($('#dTUserInfo_loader').val() == 'load') {
            if (tabUsers == false) {
                dTUserInfo_func();
                tabUsers = true;
            }
        }
        /* endregion Call tab on click */

        /* endregion Call tab on click */

        /* ============================================== REGION QUERIES STARTS HERE ================================================== */


        // region get access types
        let access_type_arr = [];
        $.ajax({
            url: "{{ url('get-access-types') }}",
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            success: function(r) {
                if (r.success) {
                    access_type_arr = r.access;
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
        // endregion get access types

        // region get offices
        let offices_arr = [];

        function AddUserPopulateOfficeArr() {

            console.log('populate offices dropdown');

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

        AddUserPopulateOfficeArr() // load data in dropdown
        // endregion get offices

        let btnaddUserofficesLoaded = false;
        $('#dTUserInfo_wrapper').find('.btnOpenAddUserModal').click(function() {
            if (btnaddUserofficesLoaded == false) {
                $('#btnaddUseroffices').empty().append('<option value="0">--- No Office Selected ---</option>');
                offices_arr.forEach(dt => {
                    $('#btnaddUseroffices').append('<option class="bg-white text-dark" value="' + dt.id + '">' + dt.full_office_name + ' (' + dt.slug + ')</option>');
                });

                btnaddUserofficesLoaded = true;
            }
        })

        // region add user collection
        let choosenOffice = 0;
        $('#btnaddUserCollection').click(function(e) {
            e.preventDefault();
            choosenOffice = $('#btnaddUseroffices').val();
            populate_add_user_collection();
        })

        let user_collection_count = 1;

        // region generate random text
        function generateRandomString(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let randomString = '';

            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomString += characters.charAt(randomIndex);
            }

            return randomString;
        }

        function generateDateString() {
            const now = new Date();
            const year = now.getFullYear().toString().slice(-2);
            const month = ('0' + (now.getMonth() + 1)).slice(-2);
            const day = ('0' + now.getDate()).slice(-2);
            const hours = ('0' + now.getHours()).slice(-2);
            const minutes = ('0' + now.getMinutes()).slice(-2);
            const seconds = ('0' + now.getSeconds()).slice(-2);

            return `${year}${month}${day}${hours}${minutes}${seconds}`;
        }
        // endregion generate random text

        function populate_add_user_collection() {
            let access_option = '';
            access_type_arr.forEach(dt => {
                if (access_type_arr.length > 5) {
                    if (dt.id == 5) {
                        access_option += '<option value="' + dt.id + '" selected>' + dt.type + '</option>';
                    } else {
                        access_option += '<option value="' + dt.id + '">' + dt.type + '</option>';
                    }
                } else {
                    access_option = '';
                    console.log('Access types insufficient no receiving clerk found');
                }
            });

            let offices_option = '';
            offices_arr.forEach(dt => {
                let office_selected_attr = '';
                if (choosenOffice == dt.id) {
                    office_selected_attr = 'selected';
                }

                offices_option += '<option value="' + dt.id + '" ' + office_selected_attr + '>' + dt.full_office_name + ' (' + dt.slug + ')</option>';
            });

            // this will generate random text
            const randomText = generateRandomString(5);
            const dateString = generateDateString();
            const randomStringGenerate = dateString + randomText + '' + user_collection_count;

            $('.add_user_collection').append('' +
                '<div class="div_cont collection_cont' + user_collection_count + ' mb-1" style="position: relative">' +
                '    <input type="hidden" class="form-control" name="collection[]" value="collection_cont' + user_collection_count + '">' +
                '    <button style="position: absolute; top: 4px; right: 0.5%;" class="btn btn-danger btn-sm btn-remove-collection" tooltip="Remove Item" flow="down">' +
                '        x' +
                '    </button>' +
                '    <div class="d-grid gap-2">' +
                '        <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#Collection' + user_collection_count + '" role="button" aria-expanded="false" aria-controls="Collection' + user_collection_count + '">' +
                '            Collection ' + user_collection_count +
                '        </a>' +
                '    </div>' +
                '    <div class="collapse show" id="Collection' + user_collection_count + '">' +
                '        <div class="card card-body">' +
                '            <div class="row">' +
                '                <div class="col-md-6 mb-3">' +
                '                    <div class="row">' +
                '                        <div class="col-md-6 mb-2">' +
                '                            <label for="addUserusername" class="form-label fs-6">Username <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="username[]" placeholder="Input Username here" value="Sample' + randomStringGenerate + '">' +
                '                        </div>' +
                '                        <div class="col-md-6 mb-2">' +
                '                            <label for="addUseremail" class="form-label fs-6">Email <span class="text-danger">*</span></label>' +
                '                            <input type="email" class="form-control" name="email[]" placeholder="Input Email here" value="Sample' + randomStringGenerate + '@gmail.com">' +
                '                        </div>' +
                '                        <div class="col-md-6 mb-2">' +
                '                            <label for="addUserpass" class="form-label fs-6 pass" tooltip="Password Sample eredts123">Password <span class="text-danger">*</span></label>' +
                '                            <input type="password" class="form-control" name="pass[]" placeholder="Input password here" value="eredts123">' +
                '                        </div>' +
                '                        <div class="col-md-6 mb-2">' +
                '                            <label for="addUserrepass" class="form-label fs-6 repass">Re-enter Password <span class="text-danger">*</span></label>' +
                '                            <input type="password" class="form-control" name="repass[]" placeholder="Re-enter password here" value="eredts123">' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="addUseraccess_id" class="form-label fs-6">Access Type <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="access_id[]">' +
                '                               ' + access_option +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="addUseroffice_id" class="form-label fs-6">Office <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control add-user-select-offices-tag-arr" name="office_id[]">' +
                '                               ' + offices_option +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="addUserstatus" class="form-label fs-6">Status <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="status[]" placeholder="Input Status here">' +
                '                               <option value="1" class="text-success">Active</option>' +
                '                               <option value="0" class="text-danger">Inactive</option>' +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="addUseradmin_delete" class="form-label fs-6">Admin Delete <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="admin_delete[]" placeholder="Input Admin Delete here">' +
                '                               <option value="0" class="text-danger">Not Allowed</option>' +
                '                               <option value="1" class="text-success">Allowed</option>' +
                '                            </select>' +
                '                        </div>' +
                '                    </div>' +
                '                </div>' +
                '                <div class="col-md-6 mb-3">' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="addUserfname" class="form-label fs-6">First Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="fname[]" placeholder="Input First Name here" value="Sample' + randomStringGenerate + '">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="addUsermname" class="form-label fs-6">Middle Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="mname[]" placeholder="Input Middle Name here" value="S.">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="addUsersname" class="form-label fs-6">Last Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="sname[]" placeholder="Input Last Name here" value="Surname">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="addUsersuffix" class="form-label fs-6">Suffix <span class="text-primary">(optional)</span></label>' +
                '                            <input type="text" class="form-control" name="suffix[]" placeholder="Input Suffix here">' +
                '                    </div>' +
                '                </div>' +
                '            </div>' +
                '        </div>' +
                '    </div>' +
                '</div>' +
                ''
            );
            user_collection_count += 1; //increment collection count
        }
        // endregion add user collection


        // region remove collection
        $('.add_user_collection, .edit_user_collection').on('click', '.btn-remove-collection', function(e) {
            e.preventDefault();

            $(this).closest('div.div_cont').remove();
        });
        // endregion remove collection

        // region add
        $('.btnaddUserModal').click(function() {
            let form = $("#addUserModalForm")[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "insert-Users",
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

                            $('.add_user_collection').find('div.' + collection).remove();
                        });

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.add_user_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.add_user_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTUserInfo').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion add

        // region edit
        $('.btneditUser').click(function() {
            let form = $("#editUserForm")[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "edit-Users",
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

                            $('.edit_user_collection').find('div.' + collection).remove();
                        });

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.edit_user_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.edit_user_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTUserInfo').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion edit

        // region fecth data for update
        $('#dTUserInfo').on('click', '.fetcheditUserDt', function() {
            // editUserForm
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
            access_type_arr.forEach(dt => {
                if (access_type_arr.length > 5) {
                    if (access_type == dt.id) {
                        access_option += '<option value="' + dt.id + '" selected>' + dt.type + '</option>';
                    } else {
                        access_option += '<option value="' + dt.id + '">' + dt.type + '</option>';
                    }
                } else {
                    access_option = '';
                    console.log('Access types insufficient no receiving clerk found');
                }
            });

            let offices_option = '';
            offices_arr.forEach(dt => {
                if (offices_id == dt.id) {
                    offices_option += '<option value="' + dt.id + '" selected>' + dt.full_office_name + ' (' + dt.slug + ')</option>';
                } else {
                    offices_option += '<option value="' + dt.id + '">' + dt.full_office_name + ' (' + dt.slug + ')</option>';
                }
            });

            $('.edit_user_collection').prepend('' +
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
                '                            <label for="editUserusername" class="form-label fs-6">Username <span class="text-danger">*</span></label>' +
                '                            <input type="hidden" class="form-control" name="id[]" value="' + id + '">' +
                '                            <input type="text" class="form-control" name="username[]" placeholder="Input Username here" value="' + username + '">' +
                '                        </div>' +
                '                        <div class="col-md-6 mb-2">' +
                '                            <label for="editUseremail" class="form-label fs-6">Email <span class="text-danger">*</span></label>' +
                '                            <input type="email" class="form-control" name="email[]" placeholder="Input Email here" value="' + email + '">' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUseraccess_id" class="form-label fs-6">Access Type <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="access_id[]">' +
                '                               ' + access_option +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUseroffice_id" class="form-label fs-6">Office <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control edit-user-select-offices-tag-arr" name="office_id[]">' +
                '                               ' + offices_option +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUserpass" class="form-label fs-6">Reset Password "eredts123" <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="password[]" placeholder="Input Status here" >' +
                '                               <option value="0" class="text-success" selected>no action</option>' +
                '                               <option value="1" class="text-danger">reset password "eredts123"</option>' +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUserstatus" class="form-label fs-6">Status <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="status[]" placeholder="Input Status here" >' +
                '                               <option value="1" class="text-success" ' + (status == 1 ? 'selected' : '') + '>Active</option>' +
                '                               <option value="0" class="text-danger" ' + (status == 0 ? 'selected' : '') + '>Inactive</option>' +
                '                            </select>' +
                '                        </div>' +
                '                        <div class="col-md-12 mb-2">' +
                '                            <label for="editUseradmin_delete" class="form-label fs-6">Admin Delete <span class="text-danger">*</span></label>' +
                '                            <select type="text" class="form-control" name="admin_delete[]" placeholder="Input Admin Delete here">' +
                '                               <option value="0" class="text-danger" ' + (admin_delete == 0 ? 'selected' : '') + '>Not Allowed</option>' +
                '                               <option value="1" class="text-success" ' + (admin_delete == 1 ? 'selected' : '') + '>Allowed</option>' +
                '                            </select>' +
                '                        </div>' +
                '                    </div>' +
                '                </div>' +
                '                <div class="col-md-6 mb-3">' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUserfname" class="form-label fs-6">First Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="fname[]" placeholder="Input First Name here" value="' + fname + '">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUsermname" class="form-label fs-6">Middle Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="mname[]" placeholder="Input Middle Name here" value="' + mname + '">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUsersname" class="form-label fs-6">Last Name <span class="text-danger">*</span></label>' +
                '                            <input type="text" class="form-control" name="sname[]" placeholder="Input Last Name here" value="' + sname + '">' +
                '                    </div>' +
                '                    <div class="col-md-12 mb-2">' +
                '                            <label for="editUsersuffix" class="form-label fs-6">Suffix <span class="text-primary">(optional)</span></label>' +
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
        $('#dTUserInfo').on('click', '.btnAlertDelUser', function() {
            let id = $(this).data('id');
            let username = $(this).data('username');

            $('.dltUsercont').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Remove user "' + username + '"?</strong> ' +
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
        $('.dltUsercont').on('click', '.btnRemoveUser', function() {
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
                        $('#dTUserInfo').DataTable().ajax.reload(null, false);
                        $('.dltUsercont').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert"> ' +
                            '    <strong>User with id: ' + id + ' has been archived</strong> ' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                            '</div> ' +
                            ''
                        );
                    } else {
                        $('.dltUsercont').append('' +
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
