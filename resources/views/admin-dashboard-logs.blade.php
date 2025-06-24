@extends('layout.master')
@section('title', 'Sys Logs')
@section('head_extension')
    {{-- region important custom function --}}

    {{-- region custom css --}}
@endsection

@section('content')
    @php
        $upload_path = 'public/assets/doc/login_records';
        $directory = storage_path($upload_path);
        // Initialize an array to store file names
        $fileList = [];

        // Check if the directory exists
        if (is_dir($directory)) {
            // Open the directory
            if ($handle = opendir($directory)) {
                // Loop through each file in the directory
                while (false !== ($file = readdir($handle))) {
                    // Exclude "." and ".." entries
                    if ($file != '.' && $file != '..') {
                        // Increment the counter
                        $fileList[] = str_replace('.txt', '', $file);
                    }
                }

                // Close the directory handle
                closedir($handle);

                // Output the total count and list of file names
                // $totalCount = count($fileList);
            } else {
                echo "Unable to open directory: $directory";
            }
        } else {
            echo "Directory does not exist: $directory";
        }
    @endphp

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 20%; left: 20%; width: 50%; height: 50%;">
        Loading
    </div>
    {{-- endregion loading indicator --}}

    {{-- region If Authenticated --}}
    <input type="hidden" class="auth_username" name="auth_username" id="auth_username" value="{{ Auth::user()->username }}">
    {{-- endregion If Authenticated --}}

    {{-- region render table --}}
    <table id="logFiles" class="table table-striped table-bordered dataTable " role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Log Files</th>
            </tr>
        </thead>
        <tbody>
            {{ csrf_field() }}
            @php
                foreach ($fileList as $fileName) {
                    echo '<tr><td>' . $fileName . ' | <a href="admin-dash-view-log-file?fn=' . $fileName . '" target="_self" title="View logs for this month"><i class="fa fa-eye" aria-hidden="true"></i></a> | <a href="admin-dash-view-log-file?fn=' . $fileName . '" target="_blank" title="View in separate tab"><i class="fa fa-external-link" aria-hidden="true"></i></a></td></tr>';
                }
            @endphp
        </tbody>
        <tfoot>
            <tr>
                <th>Log Files</th>
            </tr>
        </tfoot>
    </table>
    {{-- endregion render table --}}

    <script>
        $(function() {
            $('#logFiles').dataTable({
                paging: true,
                fixedHeader: {
                    header: true
                },
                order: [
                    [0, 'desc']
                ],
                /* columnDefs: [
                    {
                        target: 0, visible: false,
                    },
                ], */
                lengthChange: true,
                responsive: false,
                "pageLength": 10,
                dom: 'Brtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        title: 'Log Record files as of {{ date('m_d_Y') }}',
                    }, {
                        extend: 'print',
                        text: 'Print <i class="fa fa-print" aria-hidden="true"></i>',
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
                                '      <h2>Log Records</h2>' +
                                '      <sup>User: ' + auth_username + '</sup><br>' +
                                '   </span>' +
                                '   <img style="display: inline-block;  vertical-align:middle; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                '</div>');
                            // $(win.document.body).find('table thead').remove();
                            // $(win.document.body).find('table').prepend($('#logFiles thead').clone());
                            $(win.document.body).find('table tbody').remove();
                            $(win.document.body).find('table').append($('#logFiles tbody').clone());
                        }
                    },
                    // {
                    //     extend: 'pdf',
                    //     text: 'PDF <i class="fa fa-file-excel-o" aria-hidden="true"></i>'
                    // },
                    {
                        extend: 'copy',
                        text: 'COPY <i class="fa fa-clipboard" aria-hidden="true"></i>'
                    },
                    'colvis',
                    {
                        // Custom Search Button
                        text: '<input class="form-control form-control-sm border-0 logFiles_search" type="text" placeholder="Search">',
                        action: function(e, dt, node, config) {
                            let searchValue = $(node).find('.logFiles_search').val();
                            dt.search(searchValue).draw();
                        }
                    }
                ],
            });
        });
    </script>

    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}

    {{-- dataTable datas --}}
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
@endsection
