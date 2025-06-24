{{-- region deletion div --}}
<div class="dltdTRegClicont" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete items here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable" id="dTRegCli" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>First Name</th>
            <th>M.I.</th>
            <th>Surname</th>
            <th>Suffix</th>
            <th>Sex</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Address</th>
            <th>Valid ID</th>
            <th>Data Privacy Consent</th>
            <th>Number of Request</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>First Name</th>
            <th>M.I.</th>
            <th>Surname</th>
            <th>Suffix</th>
            <th>Sex</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Address</th>
            <th>Valid ID</th>
            <th>Data Privacy Consent</th>
            <th>Number of Request</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region view client id modal --}}
<div class="modal fade" id="RegCliModalViewID" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="RegCliLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white" id="RegCliLabel">Client ID View</h1>
                <button type="button" class="btn-close btn-RegCliIreencryptId" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 800px;">
                <iframe id="RegCliIframe" name="viewClientIdIframe" href="" style="width: 100%; height: 100%;"></iframe>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="RegCliIreencryptId">
                <button type="button" class="btn btn-secondary btn-RegCliIreencryptId" data-clientid="" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion view client id modal --}}

{{-- region table data loadder --}}
@if (request()->has('active_tab'))
    @php
        $active_tab = request()->input('active_tab');
    @endphp
    <input type="hidden" id="dTRegCli_loader" @if ($active_tab == 'tabRegCli') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTRegCli_func() {
            // Setup - add a text input to each footer cell
            $('#dTRegCli tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTRegCli').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-dt-client-infos",
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
                    /* fullname */
                    {
                        data: 'fname',
                        render: function(data, type, row) {
                            let fname = row['fname'];
                            let mname = row['mname'];
                            let sname = row['sname'];
                            let suffix = (row['suffix'] != null ? row['suffix'] : '');
                            let fullname = fname + ' ' + mname + ' ' + sname + suffix;

                            return fullname;
                        }
                    },
                    /* fname */
                    {
                        data: 'fname',
                    },
                    /* mname */
                    {
                        data: 'mname',
                    },
                    /* sname */
                    {
                        data: 'sname',
                    },
                    /* suffix */
                    {
                        data: 'suffix',
                    },
                    /* sex */
                    {
                        data: 'sex',
                    },
                    /* email */
                    {
                        data: 'email',
                        render: function(data, type, row) {
                            let email = row['email'];
                            let email_verify = row['email_verify'];
                            let email_verify_text = '';

                            if (email_verify == 1) {
                                email_verify_text = '<sup class="text-success">Verified</sup>';
                            } else {
                                email_verify_text = '<sup class="text-danger">Not yet verified</sup>';
                            }

                            return email + '<br>' + email_verify_text;
                        }
                    },
                    /* contact_no */
                    {
                        data: 'contact_no',
                    },
                    /* address */
                    {
                        data: 'address',
                    },
                    /* valid_id_front */
                    {
                        data: null,
                        render: function(data, type, row) {
                            let id_front = row['valid_id_front'] != null ? '<span class="text-success">AVAILABLE</span>' : '<span class="text-danger">N/A</span><br>';
                            let id_back = row['valid_id_back'] != null ? '<span class="text-success">AVAILABLE</span>' : '<span class="text-danger">N/A</span>';
                            return '' +
                                '<div class="row">' +
                                '    <div class="col-12">' +
                                '       FRONT: ' + id_front + '<br>' +
                                '       BACK: ' + id_back + '<br>' +
                                '    </div>' +
                                '    <div class="col-12">' +
                                '       <button ' +
                                '          type="button" ' +
                                '          class="btn-viewClientId btn btn-outline-primary btn-sm" ' +
                                '          data-bs-toggle="modal" ' +
                                '          data-bs-target="#RegCliModalViewID"' +
                                '          data-client_id="' + row['id'] + '" ' +
                                '       >' +
                                '          VIEW' +
                                '       </button>' +
                                '    </div>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* data_privacy_consent */
                    {
                        data: 'data_privacy_consent',
                        render: function(data, type, row) {
                            disp = '';
                            if (row['data_privacy_consent'] == 1) {
                                disp = '<span class="text-success">User agreed</span>';
                            } else {
                                disp = '<span class="text-danger">Not yet agreed</span>';
                            }
                            return disp;
                        }
                    },
                    /* request_count */
                    {
                        data: 'request_count',
                        render: function(data, type, row) {
                            let request_count = row['request_count'];
                            let disp = '';

                            if (request_count == 0) {
                                // Assuming createdAt is a string representing the timestamp from the database
                                const createdAt = row['created_at'];;

                                // Convert the createdAt string to a Date object
                                const createdAtDate = new Date(createdAt);

                                // Get the current date and time
                                const currentDate = new Date();

                                // Calculate the time difference in milliseconds
                                const timeDifference = currentDate - createdAtDate;

                                // Calculate days, hours, and minutes
                                const totalDays = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                                const totalHours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                const totalMinutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));

                                disp = '<span class="text-danger">' + totalDays + ' days, ' + totalHours + ' hours, and ' + totalMinutes + ' minutes have passed with no request submitted.</span>';
                            } else {
                                disp = request_count;
                            }

                            return disp;

                        }
                    },
                    /* 6 Action */
                    {
                        data: null,
                        render: function(data, type, row) {
                            let fname = row['fname'];
                            let mname = row['mname'];
                            let sname = row['sname'];
                            let suffix = (row['suffix'] != null ? row['suffix'] : '');
                            let fullname = fname + ' ' + mname + ' ' + sname + suffix;

                            let disp = '';
                            disp = '' +
                                '<h4 ' +
                                '   class="btnAlertDelUser" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-fullname="' + fullname + '" ' +
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
                /* rowGroup: {
                    dataSrc: ['region']
                }, */
                columnDefs: [{
                    width: '5%',
                    targets: [0],
                    visible: true,
                }, {
                    targets: [2, 3, 4, 5],
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
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: `REGISTERED CLIENTS ${new Date().toLocaleDateString()}`,
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
                                '       background: linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.7)), url("{{ asset('assets/img/logo.webp') }}"); ' +
                                '       background-repeat: no-repeat; background-position: bottom; background-size: 1%;' +
                                '   }' +
                                '   thead::before{ ' +
                                '       content: " "; ' +
                                '       position: absolute; ' +
                                '       width: 100%; ' +
                                '       height: 1000px; ' +
                                '       z-index: -1; ' +
                                '       background: linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.7)), url("{{ asset('assets/img/logo.webp') }}"); ' +
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
                            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                            var currentDate = new Date();
                            var formattedDate = months[currentDate.getMonth()] + ' ' + currentDate.getDate() + ', ' + currentDate.getFullYear();
                            $(win.document.body).find('h1').text('');
                            $(win.document.body).find('h1').parent().prepend('' +
                                '<div style="text-align: center; font-size: 15pt;">' +
                                '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/logo.webp') }}" > ' +
                                '   <span style="display: inline-block;  vertical-align:middle; font-size: 20px;">' +
                                '      Republic of The Philippines<br> '+
                                '      <b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</b><br> '+
                                '      Regional Center Site, Rawis, Legazpi City<br> ' + formattedDate + ' <br><br>' +
                                '      <h2>REGISTERED CLIENTS</h2>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTRegCli thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#dTRegCli tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTRegCli_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            var searchValue = $(node).find('.dTRegCli_search').val();
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
        let tabRegCli = false;
        $('label[for=tabRegCli]').click(function() {
            if (tabRegCli == false) {
                dTRegCli_func();
                tabRegCli = true;
            }
        });

        if ($('#dTRegCli_loader').val() == 'load') {
            if (tabRegCli == false) {
                dTRegCli_func();
                tabRegCli = true;
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
        $('#btnaddRegCliCollection').click(function(e) {
            e.preventDefault();
            populate_addRegCli_collection();
        })

        let office_collection_count = 1;

        function populate_addRegCli_collection() {
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

            $('.addRegCli_collection').append('' +
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
                '                    <label for="addRegCliregion" class="form-label fs-6">Region <span class="text-danger">*</span></label> ' +
                '                    <select type="text" class="form-control" name="region[]"> ' +
                '                        ' + region_option +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addRegClioffice_type" class="form-label fs-6">Office Type <span class="text-danger">*</span></label> ' +
                '                    <select type="text" class="form-control" name="office_type[]"> ' +
                '                        <option value="Office">Office</option> ' +
                '                        <option value="Receiving">Receiving</option> ' +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addRegClifull_office_name" class="form-label fs-6">Full Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="full_office_name[]" placeholder="Input full office name here"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addRegClioffice" class="form-label fs-6">Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="office[]" placeholder="Input office here"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addRegClislug" class="form-label fs-6">Slug <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="slug[]" placeholder="Input slug here"> ' +
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
        $('.addRegCli_collection, .editRegClis_collection').on('click', '.btn-remove-collection', function(e) {
            e.preventDefault();

            $(this).closest('div.div_cont').remove();
        });
        // endregion remove collection

        // region add
        $('.btnaddRegCliModalViewID').click(function() {
            var form = $("#addRegCliModalViewIDForm")[0];
            var submitForm = new FormData(form);
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

                            $('.addRegCli_collection').find('div.' + collection).remove();
                        });

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.addRegCli_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.addRegCli_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTRegCli').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion add

        // region edit
        $('.btneditRegCli').click(function() {
            var form = $("#editRegCliForm")[0];
            var submitForm = new FormData(form);
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

                            $('.editRegClis_collection').find('div.' + collection).remove();
                        });

                        // display status messages
                        r.collection_msg.forEach(dt => {
                            let message = dt.msg;
                            let status = dt.status;

                            if (status == 'success') {
                                $('.editRegClis_collection_msg').append('' +
                                    '<div class="col-12 alert alert-success alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            } else if (status == 'error') {
                                $('.editRegClis_collection_msg').append('' +
                                    '<div class="col-12 alert alert-danger alert-dismissible fade show p-2 pe-5" role="alert"> ' +
                                    '    <strong>' + message + '</strong> ' +
                                    '    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                    '</div>'
                                );
                            }
                        });

                        // reload
                        $('#dTRegCli').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion edit

        // region fecth data for update
        $('#dTRegCli').on('click', '.fetcheditRegClisDt', function() {
            // editRegCliForm
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

            $('.editRegClis_collection').prepend('' +
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
                '                    <label for="addRegCliregion" class="form-label fs-6">Region <span class="text-danger">*</span></label> ' +
                '                    <select type="text" class="form-control" name="region[]"> ' +
                '                        ' + region_option +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addRegClioffice_type" class="form-label fs-6">Office Type <span class="text-danger">*</span></label> ' +
                '                    <select type="text" class="form-control" name="office_type[]"> ' +
                '                        <option value="Office" ' + (office_type == 'Office' ? 'selected' : '') + '>Office</option> ' +
                '                        <option value="Receiving" ' + (office_type == 'Receiving' ? 'selected' : '') + '>Receiving</option> ' +
                '                    </select> ' +
                '                </div> ' +
                '                <div class="col-md-12 mb-2"> ' +
                '                    <label for="addRegClifull_office_name" class="form-label fs-6">Full Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="hidden" class="form-control" name="id[]" value="' + id + '"> ' +
                '                    <input type="text" class="form-control" name="full_office_name[]" placeholder="Input full office name here" value="' + full_office_name + '"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addRegClioffice" class="form-label fs-6">Office Name <span class="text-danger">*</span></label> ' +
                '                    <input type="text" class="form-control" name="office[]" placeholder="Input office here" value="' + office + '"> ' +
                '                </div> ' +
                '                <div class="col-md-6 mb-2"> ' +
                '                    <label for="addRegClislug" class="form-label fs-6">Slug <span class="text-danger">*</span></label> ' +
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
        $('#dTRegCli').on('click', '.btnAlertDelUser', function() {
            let id = $(this).data('id');
            let fullname = $(this).data('fullname');

            $('.dltdTRegClicont').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Archive client ' + fullname + '? &nbsp;&nbsp;&nbsp;&nbsp;</strong> ' +
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
        $('.dltdTRegClicont').on('click', '.btnRemoveUser', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('trash-registerClient') }}",
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
                        $('#dTRegCli').DataTable().ajax.reload(null, false);
                    } else {
                        if (r.haveRequest) {
                            $('.dltdTRegClicont').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Action Denied: Client with id: ' + id + ' has a record (document request in the database) &nbsp;&nbsp;&nbsp;&nbsp;</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                        } else {
                            if(r.msg != ''){
                                $('.dltdTRegClicont').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>'+ r.msg +' &nbsp;&nbsp;&nbsp;&nbsp;</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                            }

                            $('.dltdTRegClicont').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>Client with id: ' + id + ' might already been moved or removed from table &nbsp;&nbsp;&nbsp;&nbsp;</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                        }
                    }

                    // Close the message after 5 seconds
                    setTimeout(function() {
                        console.log('remove')
                        $('.resendmailmsg').empty(); // Remove the message
                    }, 5000); // 5000 milliseconds = 5 seconds
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion soft del

        // region view client id
        $('#dTRegCli').on('click', '.btn-viewClientId', function() {
            let username = $('#auth_username').val();
            let client_id = $(this).data('client_id');

            // console.log('/get-clientId-view/' + username + '/' + client_id + '/');
            let iframeHref = '/get-clientId-view/' + username + '/' + client_id + '/';
            $('#RegCliIframe').attr('src', iframeHref);
            $('#RegCliIreencryptId').val(client_id);
        });
        // endregion view client id
    });
</script>
{{-- endregion queries --}}
