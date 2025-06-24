@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    {{-- region important custom function --}}

    {{-- region custom css --}}
@endsection

@section('content')
    @if (request()->has('fn'))
        @php
            $upload_path = 'public/assets/doc/login_records';

            $filename = '';
            if (request()->has('fn')) {
                $filename = request('fn');
            }
            $filepath = storage_path($upload_path . '/' . $filename . '.txt');

            // Read the file line by line
            $lines = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        @endphp
        {{-- region loading indicator --}}
        <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 20%; left: 20%; width: 50%; height: 50%;">
            Loading
        </div>
        {{-- endregion loading indicator --}}

        {{-- region If Authenticated --}}
        <input type="hidden" class="auth_username" name="auth_username" id="auth_username" value="{{ Auth::user()->username }}">
        <input type="hidden" class="log_name" name="log_name" id="log_name" value="{{ $filename }}">
        {{-- endregion If Authenticated --}}

        <h2></h2>

        <h5><a href="/admin-dashboard-logs" target="_self" rel="noopener noreferrer" class="fw-bold" title="return to list of log files">↩</a> LOG FILE: {{ $filename }}.txt</h5>
        <hr>

        {{-- region render table --}}
        <table id="fileCont" class="table table-striped table-bordered dataTable " role="grid" aria-describedby="Table" style="width: 100%;" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Action</th>
                    <th>IP Address</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                {{ csrf_field() }}
                @php
                    $counting_no = 1;
                    if ($lines === false) {
                        echo 'Error reading the file.';
                    } else {
                        // Loop through each line
                        foreach ($lines as $line) {
                            // Parse each line as JSON
                            $logEntry = json_decode($line, true);

                            // Check if decoding was successful
                            if ($logEntry === null) {
                                //do nothing
                            } else {
                                $user_id = $logEntry['user_id'] ?? '';
                                $user = $logEntry['user'] ?? '';
                                $action_taken = $logEntry['action_taken'] ?? '';
                                $ip_address = $logEntry['ip_address'] ?? '';
                                $date_time = $logEntry['date_time'] ?? '';

                                echo '<tr>';
                                echo '<td><span>' . $counting_no . '</span></td>';
                                echo '<td><span>' . $user_id . '</span></td>';
                                echo '<td><span>' . $user . '</span></td>';
                                echo '<td><span>' . $action_taken . '</span></td>';
                                echo '<td><span>' . $ip_address . '</span></td>';

                                #region check date old
                                if ($date_time) {
                                    // Convert the date string to a DateTime object
                                    $date = new DateTime($date_time);
                                    $now = new DateTime();
                                    $yesterday = (new DateTime())->modify('-1 day');
                                    $lastWeek = (new DateTime())->modify('-7 days');

                                    // Format for comparison
                                    $format = 'Y-m-d';

                                    // Format for display
                                    $displayFormat = 'M d, Y g:i A';

                                    if ($date->format($format) == $now->format($format)) {
                                        echo '<td><span>' . $date->format($displayFormat) . '</span><br><span class="badge bg-primary text-white">Today</span></td>';
                                    } elseif ($date->format($format) == $yesterday->format($format)) {
                                        echo '<td><span>' . $date->format($displayFormat) . '</span><br><span class="badge  bg-warning text-black">Yesterday</span></td>';
                                    } elseif ($date >= $lastWeek && $date < $yesterday) {
                                        echo '<td><span>' . $date->format($displayFormat) . '</span><br><span class="badge  bg-danger text-white">Within 7 days ago</span></td>';
                                    } else {
                                        echo '<td><span>' . $date->format($displayFormat) . '</span></td>';
                                    }
                                } else {
                                    echo '<td>No date provided</td>';
                                }
                                #endregion check date old

                                echo '</tr>';
                            }

                            $counting_no += 1;
                        }
                    }
                @endphp
            </tbody>
            <tfoot>
                <tr>
                    <th>No. </th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Action</th>
                    <th>IP Address</th>
                    <th>Date & Time</th>
                </tr>
            </tfoot>
        </table>
        {{-- endregion render table --}}

        <script>
            $(function() {

                // Setup - add a text input to each footer cell
                $('#fileCont tfoot th').each(function() {
                    let title = $(this).text();
                    $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
                });
                $('#fileCont').dataTable({
                    paging: true,
                    columnDefs: [{
                        width: '5%',
                        targets: [0, 1],
                        visible: true,
                    }, {
                        width: '55%',
                        targets: [3],
                        visible: true,
                    }, {
                        width: '10%',
                        targets: [4, 5],
                        visible: true,
                    }, ],
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
                            title: $('.log_name').val() + ' content download dated {{ date('m_d_Y') }}',
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
                                    '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/logo.webp') }}" > ' +
                                    '   <span style="display: inline-block;  vertical-align:middle; font-size: 20px;">' +
                                    '      Republic of The Philippines<br> ' +
                                    '      <b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</b><br> ' +
                                    '      Regional Center Site, Rawis, Legazpi City<br> ' + formattedDate + ' <br><br>' +
                                    '      <h2>' + $('.log_name').val() + ' contents</h2>' +
                                    '      <sup>User: ' + auth_username + '</sup><br>' +
                                    '   </span>' +
                                    '   <img style="display: inline-block;  vertical-align:top; width: 100px; height: 100px;" src="{{ asset('assets/img/Bagong_Pilipinas_logo.webp') }}" > ' +
                                    '</div>');
                                // $(win.document.body).find('table thead').remove();
                                // $(win.document.body).find('table').prepend($('#fileCont thead').clone());
                                $(win.document.body).find('table tbody').remove();
                                $(win.document.body).find('table').append($('#fileCont tbody').clone());
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
                            text: '<input class="form-control form-control-sm border-0 fileCont_search" type="text" placeholder="Search">',
                            action: function(e, dt, node, config) {
                                let searchValue = $(node).find('.fileCont_search').val();
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
    @else
        <div style="
            text-align: center; 
            background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); 
            font: small-caps bold 24px/1 sans-serif;
            height: 100%;
            padding-top: 20%;
            padding-bottom: 20%;
        ">
            <span>
                <h2>?</h2>
                <h2>
                    📁 <º))))>
                        < </h2>
                            <h2>No log file specified</h2>
            </span>
        </div>
    @endif
@endsection
