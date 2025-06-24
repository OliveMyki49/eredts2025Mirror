@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    {{-- region custom css --}}
    <link rel="stylesheet" href="../assets/css/tab.css">

    {{-- source: https://startbootstrap.com/theme/sb-admin-2 --}}
    {{-- template name: SB Admin 2 - Dashboard --}}
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    {{-- <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet"> --}}
    {{-- region card style --}}
    <style>
        .border-left-primary {
            border-left: .25rem solid #4e73df !important;
        }

        .border-left-success {
            border-left: .25rem solid #1cc88a !important;
        }

        .border-left-info {
            border-left: .25rem solid #36b9cc !important;
        }

        .border-left-warning {
            border-left: .25rem solid #f6c23e !important;
        }

        .pb-2,
        .py-2 {
            padding-bottom: .5rem !important;
        }

        .pt-2,
        .py-2 {
            padding-top: .5rem !important;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow {
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e3e6f0;
            border-radius: .35rem;
        }

        .text-gray-300 {
            color: #dddfeb !important;
        }
    </style>
    {{-- endregion card style --}}

    {{-- region horizontal bar title --}}
    <style>
        .title-with-hr {
            display: inline-block;
            position: relative;
            margin: 0;
            padding: 0px 10px 0px 10px;
            /* Add space between the title and hr */
            background-color: rgb(247 248 249);
            /* Match your background to cover hr */
            z-index: 1;
            border-radius: 10px;
        }

        .styled-hr {
            border: none;
            border-top: 1px solid #000;
            /* Customize the line style */
            margin: 0;
            position: relative;
            top: -10px;
            /* Adjust based on your design */

            display: block;
            font-size: 2em;
            font-weight: bold;
            unicode-bidi: isolate;
        }
    </style>
    {{-- endregion horizontal bar title --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu')
@endsection

@section('content')
    <div class="bg-light p-2 apply_bg_theme data-csrf_token" data-csrf="{{ csrf_token() }}"> {{-- separate token for js ajax requests --}}

        {{-- region bread crumb --}}
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-white rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                        <li class="breadcrumb-item" aria-current="page">
                            Statistics
                            <select class="border-0 stat_origin_year bg-body" name="stat_origin_year" id="stat_origin_year">
                                @for ($i = date('Y'); $i > 2020; $i--)
                                    <option value="{{ $i }}" title="page reload on change">Year {{ $i }}</option>
                                @endfor
                            </select>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- endregion bread crumb --}}

        <div class="content">

            <!-- Content Row: cards -->
            <div class="row">

                <!-- Requests (Monthly) Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Requests <sup>(This Month {{ date('Y') }})</sup></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 card-stats-request-this-month">{{-- populate data here --}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Request (Annual) Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Requests <sup class="card-stat-req-annual-sup-title">{{-- sup title will be generated --}}</sup></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 card-stats-request-annual">{{-- populate data here --}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-days fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed (Appoved & Rejected) Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed <sup>(Approved & Rejected)</sup>
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 card-stats-request-completed">{{-- populate data here --}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info card-stats-request-completed-progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{-- progress bar label generated here --}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending <sup>(In-transit & Forwarded)</sup></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 card-stats-request-pending">{{-- populate data here --}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="title-with-hr text-primary">Summary of Requests</h3>
            <hr class="styled-hr">
            <br>

            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart & Horizontal Bar Chart -->
                <div class="col-xl-8 col-lg-7">

                    {{-- Area Chart --}}
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total Requests Summary</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="annualAreaChart"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- Horizontal Bar Chart --}}
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Request Type <sup>(Sub-Classification)</sup></h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="annualBarChart"></canvas>
                            </div>
                            {{--
                            <hr>
                            Styling for the bar chart can be found in the
                            <code>/js/demo/chart-bar-demo.js</code> file. 
                            --}}
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Requets Per Class <sup>(Annual)</sup></h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-2 pb-2">
                                <canvas id="annualPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <hr class="styled-hr">
            <br>

            <!-- Content Row -->
            <div class="row">

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Client Records<sup>(Gender)</sup></h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-2 pb-2">
                                <canvas id="clientsGenderPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Horizontal Bar Chart request per office -->
                <div class="col-xl-8 col-lg-7">

                    {{-- Horizontal Bar Chart --}}
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Requests <sup>(Per Receiving Office)</sup></h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="annualBarChartPerReceivingOffice"></canvas>
                            </div>
                            {{--
                            <hr>
                            Styling for the bar chart can be found in the
                            <code>/js/demo/chart-bar-demo.js</code> file. 
                            --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            {{-- <script src="../js/sb-admin-2.min.js"></script> --}}

            <!-- Page level plugins -->
            <script src="../vendor/chart.js/Chart.min.js"></script>

            {{-- used to add labels for pie chart --}}
            {{-- 
            source demo: https://emn178.github.io/chartjs-plugin-labels/samples/demo/
            source plugin: https://github.com/emn178/chartjs-plugin-labels
            source forum: https://stackoverflow.com/questions/33363373/how-to-display-pie-chart-data-values-of-each-slice-in-chart-js
        --}}
            <script src="../vendor/chart.js/chartjs-plugin-labels.js"></script>

            <!-- Page level custom scripts -->
            <script src="../assets/js/sb-admin-2-charts/chart-area.js"></script>
            <script src="../assets/js/sb-admin-2-charts/card-stats.js"></script>
            <script src="../assets/js/sb-admin-2-charts/chart-pie.js"></script>
            <script src="../assets/js/sb-admin-2-charts/chart-bar.js"></script>

            {{-- region charts custom scripts --}}
            <script>
                $(function() {
                    //set year
                    $('.stat_origin_year').change(function() {
                        sessionStorage.setItem("stat_year", $('.stat_origin_year :selected').val());
                        location.reload();
                    });

                    let stat_origin_year = sessionStorage.getItem("stat_year");
                    if (stat_origin_year != null) {
                        $('.stat_origin_year').val(stat_origin_year);
                        $('.card-stat-req-annual-sup-title').text("(Year " + stat_origin_year + ")");
                    } else {
                        $('.card-stat-req-annual-sup-title').text("(Year " + new Date().getFullYear() + ")");
                    }
                });
            </script>
            {{-- endregion charts custom scripts --}}
        </div>
    @endsection
