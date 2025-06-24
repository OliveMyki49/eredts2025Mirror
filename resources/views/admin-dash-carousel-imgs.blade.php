{{-- region deletion div --}}
<div class="deleteDCcontainer" style="position: fixed; top: 10%; z-index: 9000">
    {{-- pupolate delete DCs here --}}
</div>
{{-- endregion deletion div --}}

{{-- region display table --}}
<table class="table table-striped table-bordered dataTable " id="dTCrslImgs" role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>File Path</th>
            <th>File Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>File Path</th>
            <th>File Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        {{ csrf_field() }}
    </tbody>
</table>
{{-- endregion display table --}}

{{-- region Add modal --}}
<div class="modal fade" id="addCrslImgsModal" tabindex="-1" aria-labelledby="addCrslImgsLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">ADD CAROUSEL IMAGE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="addCrslImgsForm">
                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="addCrslImgsdescription" class="form-label">Image File<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="addCrslImgs_file" id="addCrslImgs_file">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btnaddCrslImgs">Add</button>
            </div>
        </div>
    </div>
</div>
{{-- endregion Add modal --}}

{{-- region Edit modal --}}
<div class="modal fade" id="editCrslImgsModal" tabindex="-1" aria-labelledby="editCrslImgsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">EDIT DOCUMENT CLASSIFICATION FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" id="editCrslImgsForm">
                    <input type="hidden" name="id" id="editCrslImgsid">

                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="editCrslImgsdescription" class="form-label">Document Classification <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editCrslImgsdescription" name="description" placeholder="Document title / description">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="editCrslImgsslug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control toUpperCase" id="editCrslImgsslug" name="slug" placeholder="Abbreviation (must be unique)" @readonly(true)>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btneditCrslImgs">Save</button>
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
    <input type="hidden" id="dTCrslImgs_loader" @if ($active_tab == 'tabCrslImgs') value="load" @endif>
@endif
{{-- endregion table data loadder --}}

{{-- region populate table --}}
<script>
    $(function() {
        // region populate table
        function dTCrslImgs_func() {
            // Setup - add a text input to each footer cell
            $('#dTCrslImgs tfoot th').each(function() {
                let title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            $('#dTCrslImgs').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "get-redtsCarouselImgs",
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
                    /* 1 file_path */
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '' +
                                '<div ' +
                                '   class="text-center" ' +
                                '   style="' +
                                '      position: relative; ' +
                                '      display: block; ' +
                                '      width: 100%; ' +
                                '      height: 100px; ' +
                                '   " ' +
                                '> ' +
                                '   <a href="' + row['file_path'] + '' + row['file_name'] + '" target="_blank">' +
                                '       <img src="' + row['file_path'] + '' + row['file_name'] + '" ' +
                                '           style="' +
                                '               cursor: pointer; ' +
                                '               width: 95%; ' +
                                '               height: auto; ' +
                                '           " ' +
                                '           title = "open to see full view"' +
                                '       > ' +
                                '   </a>' +
                                '</div>' +
                                '';
                        }
                    },
                    /* 2 file_path */
                    {
                        data: 'file_path',
                    },
                    /* 3 file_name */
                    {
                        data: 'file_name',
                    },
                    /* 2 Action */
                    {
                        data: null,
                        render: function(data, type, row) {
                            let disp = '';
                            disp = '' +
                                '<h4 ' +
                                '   class="btnAlertDelCarouselItem" ' +
                                '   style="cursor: pointer" ' +
                                '   onMouseOut="this.style.color=`#000`" ' +
                                '   onMouseOver="this.style.color=`#0d6efd`" ' +
                                '   data-id="' + row['id'] + '" ' +
                                '   data-file_name="' + row['file_name'] + '" ' +
                                '> ' +
                                '   <span ' +
                                '       class="badge bg-danger border border-danger text-white"' +
                                '   >' +
                                '       <i class="fa fa-trash" aria-hidden="true"></i>' +
                                '   </span>' +
                                '</h4>';

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
                        visible: false,
                    },
                    /* {
                                       targets: [4],
                                       visible: false,
                                   } */
                ],
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
                            '<span data-bs-toggle="modal" data-bs-target="#addCrslImgsModal">' +
                            '   <i class="fa fa-plus" aria-hidden="true"></i> Add Carousel Image' +
                            '</span>',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: `CAROUSEL IMAGES ${new Date().toLocaleDateString()}`,
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
                                '      <h2>CAROUSEL IMAGES</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#dTCrslImgs thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').prepend($('#dTCrslImgs tbody').clone());
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
                        text: '<input class="form-control form-control-sm border-0 dTCrslImgs_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.dTCrslImgs_search').val();
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
        let tabCrslImgs = false;
        $('label[for=tabCrslImgs]').click(function() {
            if (tabCrslImgs == false) {
                dTCrslImgs_func();
                tabCrslImgs = true;
            }
        });

        if ($('#dTCrslImgs_loader').val() == 'load') {
            if (tabCrslImgs == false) {
                dTCrslImgs_func();
                tabCrslImgs = true;
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
        $('.btnaddCrslImgs').click(function() {
            let form = $("#addCrslImgsForm")[0];
            let submitForm = new FormData(form);
            $.ajax({
                url: "insert-carouselImg",
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

                        // remove inserted data from input
                        $('#addCrslImgs_file').val('');

                        // reload
                        $('#dTCrslImgs').DataTable().ajax.reload(null, false);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        // endregion add

        //region create delete alert
        $('#dTCrslImgs').on('click', '.btnAlertDelCarouselItem', function() {
            let id = $(this).data('id');
            let file_name = $(this).data('file_name');

            $('.deleteDCcontainer').append('' +
                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                '    <strong>Remove ' + file_name + '?</strong> ' +
                '    <br>' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white btnRemoveCarouselItem" data-bs-dismiss="alert" data-id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i> Confirm Remove</button> ' +
                '    <button type="button" class="p-2 badge bg-danger border-danger text-white" data-bs-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button> ' +
                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                '</div> ' +
                ''
            );
        });
        //region create delete alert

        // region soft del
        $('.deleteDCcontainer').on('click', '.btnRemoveCarouselItem', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('trash-redtsgcarouselimgs') }}",
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
                        $('#dTCrslImgs').DataTable().ajax.reload(null, false);
                    } else {
                        $('.deleteDCcontainer').append('' +
                            '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                            '    <strong>Item with id: ' + id + ' might already been moved or removed from table</strong> ' +
                            '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                            '</div> ' +
                            ''
                        );

                        if (r.msg != '') {
                            $('.deleteDCcontainer').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert"> ' +
                                '    <strong>' + r.msg + '</strong> ' +
                                '    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                                '</div> ' +
                                ''
                            );
                        }
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
