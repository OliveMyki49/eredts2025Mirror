{{-- @extends('layout.master') --}}

{{-- header here --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link id="pagestyle" href="{{ asset('assets/css/datatables.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" />

    <script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>

    {{-- generate qr code --}}
    <script src="{{ asset('assets/js/easy.qrcode.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> --}}
    <style>
        .invoice-box {
            /* background: linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.9)), url("Panarayon Old Logo.png"); */
            background-repeat: no-repeat;
            background-position: 45% 50%;
            background-size: 80% 80%;
            max-width: 100%;
            margin-block-end: auto;
            margin-top: 0;
            /* margin: none; */
            /* padding: 30px; */
            /*border: 1px solid #eee;*/
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 9px;
            line-height: 24px;
            font-family: Tahoma, Times, serif;
            padding-top: 3em;
            padding-right: 3em;
            padding-left: 3em;
        }

        .invoice-box::before {}

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        /* .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        } */

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        /* print */
        @media print {

            .invoice-box {
                height: 100%;
            }

            thead {
                padding-top: 150px;
            }

            body,
            table,
            tr,
            td {
                margin: 0;
                padding: 0;
            }

            .btn_print_route_slip_container {
                height: 0px;
                padding: 0px;
                margin: 0px;
                visibility: hidden;
            }

            /* Show only the printable element */
            #printable {
                visibility: visible;
                margin-top: 0;
                padding: 0;
            }

            @page {
                /* Chrome sets own margins, we change these printer settings */
                margin: 0mm 7mm 7mm 7mm;
                /* margin: 0; */

                @bottom-left {
                    content: 'page ' counter(page);
                }
            }

            footer {
                visibility: hidden;
            }

            /* Set color to exact color */
            body {
                -webkit-print-color-adjust: exact;
                zoom: 60%;
            }
        }
    </style>

    {{-- custom style TREX --}}
    <style>
        .bg-soft-green {
            background-color: #1c920082;
        }

        .bg-soft-gray {
            background-color: #6c757d9c;
        }

        .md-check-box-size {
            width: 20px;
            height: 20px;
        }

        /* for headers */
        .bg-headertitle {
            background-color: #d9dfe4;
        }

        .text-align-center {
            text-align: center;
        }
    </style>

    <script src="/assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_js_bootstrap.bundle.min.js"></script>

    {{-- region print function --}}
    <script type="text/javascript">
        //print function
        // var delayInMilliseconds = 500; //0.5 second
        // setTimeout(function() {
        //     window.print();
        // }, delayInMilliseconds);

        $(document).ready(function() { //csrf prevent cross platform injection
            window.addEventListener('afterprint', function() {
                // close print tab if exit
                setTimeout(function() {
                    window.close();
                }, 500);
            });

        });
    </script>
    <script>
        $(function() {
            $('.btn_print_route_slip').click(function() {
                //print function
                var delayInMilliseconds = 500; //0.5 second
                setTimeout(function() {
                    window.print();
                }, delayInMilliseconds);
            });
        });
    </script>
    {{-- endregion print function --}}
</head>

<body class="g-sidenav-show  bg-gray-200" oncontextmenu="return false;">

    {{-- {{ dd($doc_info) }} --}}
    <input type="hidden" id="qrval" value="http://58.69.249.98:9133/grsid/{{ $doc_info->uuid }}">

    <div class="d-grid gap-2 col-6 mx-auto pt-2 btn_print_route_slip_container">
        <button class="btn btn-success btn-lg btn_print_route_slip" type="button">Print Routing Slip</button>
    </div>


    <div class="container_content pb-2" id="container_content">
        <div class="invoice-box">
            {{-- Start of table --}}
            <table id="printable" class="m-0 p-0" cellpadding="0" cellspacing="0">
                <thead>
                    <tr class="top m-0 p-0">
                        <td class="m-0 p-0" colspan="2">
                            <table class="m-0 p-0">
                                <tr class="m-0 p-0">
                                    <td class="m-0 p-0 text-center">
                                        <br>
                                        <div style="position: relative">
                                            <div class="d-flex justify-content-end" style="position: absolute; top: -15px; left:15%;">
                                                <img src="{{ asset('assets/img/denrlogoplain.webp') }}" class="navbar-brand-img h-2 v-2" alt="main_logo" width="90px" height="90px">
                                            </div>
                                            <p style="margin-block-start: 0px;">
                                                <span class="fs-5"><b style="color: #004ad6; text-shadow: 1px 1px rgba(134, 134, 134, 0.5)">Department of Environment and Natural Resources</b></span>
                                                <br>
                                                <span class="fs-5"><b style="color: #249200; text-shadow: 1px 1px rgba(134, 134, 134, .5)">Kagawaran ng Kapaligiran at Likas Yaman</b></span>
                                                <br>
                                            </p>
                                            <div class="d-flex justify-content-start qrcontainer" style="position: absolute; top: -15px; right:0;">
                                                {{-- QR CODE BE GENERATED HERE --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Start of CERTIFICATION --}}
                    <tr>
                        <td colspan="2">
                            <table class="my-3 p-0">
                                <tr class="m-0 p-0">
                                    <td class="m-0 ps-1 text-center">
                                        <h5><b>ENHANCED-REGIONAL ELECTONIC DOCUMENT<br>AND TRACKING SYSTEM<br></h5>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- End of CERTIFICATION --}}

                    {{-- region header --}}
                    <tr class="information">
                        <td class="p0" colspan="2">
                            <div class="row m-0">
                                <div class="col text-start fw-bold">
                                    {{ strtoupper($doc_info->doc_type_full) }}
                                </div>
                            </div>

                            <div class="row m-0 mt-3">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 fw-bold">
                                            DOCUMENT NO:
                                        </div>
                                        <div class="col-6">
                                            {{ $doc_info->doc_no }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-0 mt-2">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 fw-bold">
                                            REQUESTEE:
                                        </div>
                                        <div class="col-6">
                                            {{ $doc_info->client_fname }}
                                            {{ $doc_info->client_mname }}
                                            {{ $doc_info->client_sname }}
                                            {{ $doc_info->client_suffix != null ? $doc_info->client_suffix : '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 fw-bold">
                                            COMPLIANCE DEADLINE:
                                        </div>
                                        <div class="col-6">
                                            {{ strtoupper(date('F j, Y g:i A', strtotime($doc_info->compliance_deadline))) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-0 mt-2">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 fw-bold">
                                            SUBJECT:
                                        </div>
                                        <div class="col-6">
                                            {{ strtoupper($doc_info->doc_class_full) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 fw-bold">
                                            ADDRESEE:
                                        </div>
                                        <div class="col-6">
                                            {{-- remove the  - Records Section text since the origin office is this --}}
                                            {{ strtoupper(str_replace(' - Records Section', '', $doc_stats[0]->referred_by_full_office_name)) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-0 mt-2">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 fw-bold">
                                            REMARKS:
                                        </div>
                                        <div class="col-6">
                                            {{ $doc_info->remarks }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 fw-bold">
                                            DOCUMENT DATE:
                                        </div>
                                        <div class="col-6">
                                            {{ strtoupper(date('F j, Y g:i A', strtotime($doc_info->created_at))) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row m-0">
                                <div class="col border border-dark fw-bold text-center text-white bg-secondary">ROUTING AND ACTION INFORMATION</div>
                            </div>
                        </td>
                    </tr>
                    {{-- endregion header --}}
                </thead>

                <tbody>
                    {{-- region populate action status --}}
                    @foreach ($doc_stats as $key => $dt)
                        <tr>
                            <td>
                                <div class="row m-0">
                                    <div class="col border border-dark border-top-0 border-end-0">
                                        <div class="mb-2">
                                            <span class="fw-bold">RECEPIENT/RECEIVED BY:</span><br>
                                            @if ($dt->received != null)
                                                @php
                                                    $receiver_fname = $dt->receiver_fname;
                                                    $receiver_mname = $dt->receiver_mname;
                                                    $receiver_sname = $dt->receiver_sname;
                                                    $receiver_suffix = $dt->receiver_suffix;

                                                    $receiver_fullname = $receiver_fname . '  ' . $receiver_mname . '  ' . $receiver_sname . '  ' . ($receiver_suffix != null ? $receiver_suffix : '');
                                                @endphp
                                                {{ strtoupper($receiver_fullname) }}
                                            @else
                                                <span class="text-secondary">DOCUMENT NOT YET RECEIVED</span>
                                            @endif
                                        </div>

                                        <div class="mb-2">
                                            <span class="fw-bold pt-2">RECEIVING OFFICE:</span><br>
                                            {{ strtoupper($dt->send_to_full_office_name) }}
                                        </div>

                                        <div class="mb-2">
                                            <span class="fw-bold">DATE / TIME RECEIVED</span><br>
                                            @if ($dt->received != null)
                                                {{ strtoupper(date('F j, Y g:i A', strtotime($dt->received))) }}
                                            @else
                                                <span class="text-secondary">DOCUMENT NOT YET RECEIVED</span>
                                            @endif
                                        </div>

                                        <div class="mb-2">
                                            <span class="fw-bold">IN-TRANSIT REMARKS</span>
                                            <br>
                                            @if ($dt->in_transit_remarks != null)
                                                {{ $dt->in_transit_remarks }}
                                            @else
                                                <span class="text-secondary">NOT AVAILABLE</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col border border-dark border-top-0 border-start-0">

                                        <div class="mb-2">
                                            <span class="fw-bold">ACTION TAKEN / MARGINAL NOTE:</span><br>
                                            @if ($dt->released != null)
                                                {{ $dt->action_remarks }}
                                            @else
                                                @if ($dt->rejected != null)
                                                    — — <span class="text-danger">REJECTED</span> — —
                                                @else
                                                    @if ($dt->final_action != null)
                                                        — — <span class="text-success">FINAL ACTION</span> — —
                                                    @else
                                                        <span class="text-secondary">DOCUMENT NOT YET RELEASED</span>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>

                                        <div class="mb-2">
                                            <span class="fw-bold">DATE ACTION TAKEN:</span><br>
                                            @if ($dt->released != null)
                                                {{ strtoupper(date('F j, Y g:i A', strtotime($dt->released))) }}
                                            @else
                                                <span class="text-secondary">DOCUMENT NOT YET RELEASED</span>
                                            @endif
                                        </div>

                                        <div class="mb-2">
                                            <span class="fw-bold">REMARKS:</span><br>
                                            @if ($key <= count($doc_stats) - 2)
                                                @if ($doc_stats[$key + 1]->received != null)
                                                    {{ $doc_stats[$key + 1]->action_remarks }}
                                                @else
                                                    <span class="text-secondary">DOCUMENT NOT YET RECEIVED</span>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="mb-2">
                                            <span class="fw-bold">ATTACHMENT DETAILS:</span>
                                            <br>
                                            @if ($dt->attachment_remarks != null)
                                                {{ $dt->attachment_remarks }}
                                            @else
                                                <span class="text-secondary">NOT AVAILABLE</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- endregion populate action status --}}

                    @php
                        $action_count = count($doc_stats);
                    @endphp
                    @while ($action_count % 5 != 0)
                        <tr>
                            <td>
                                <div class="row m-0">
                                    <div class="col border border-dark border-top-0 border-end-0">
                                        <div class="mb-1">
                                            <span class="fw-bold">RECEPIENT/RECEIVED BY:</span><br>&nbsp;
                                        </div>

                                        <div class="mb-1">
                                            <span class="fw-bold pt-2">RECEIVING OFFICE:</span><br>&nbsp;
                                        </div>

                                        <div class="mb-1">
                                            <span class="fw-bold">DATE / TIME RECEIVED</span><br>&nbsp;
                                        </div>

                                        <div class="mb-1">
                                            <span class="fw-bold">IN-TRANSIT REMARKS</span><br>&nbsp;
                                        </div>
                                    </div>
                                    <div class="col border border-dark border-top-0 border-start-0">

                                        <div class="mb-1">
                                            <span class="fw-bold">ACTION TAKEN / MARGINAL NOTE:</span><br>&nbsp;
                                        </div>

                                        <div class="mb-1">
                                            <span class="fw-bold">DATE ACTION TAKEN:</span><br>&nbsp;
                                        </div>

                                        <div class="mb-1">
                                            <span class="fw-bold">REMARKS:</span><br>&nbsp;
                                        </div>

                                        <div class="mb-1">
                                            <span class="fw-bold">ATTACHMENT DETAILS:</span><br>&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @php
                            $action_count += 1;
                        @endphp
                    @endwhile
                </tbody>

            </table>
            {{-- End of table --}}


        </div>
    </div>

    {{-- region qr code script --}}
    <script type="text/template" id="qrcodeTpl">
        <div class="imgblock">
          <!-- <div class="title">{title}</div> -->
          <div class="qr" id="qrcode_{i}"></div>
      </div>
    </script>
    <script type="text/javascript">
        $(function() {
            let qrval = $('#qrval').val();
            console.log(qrval);
            var demoParams = [{
                title: "Logo + quietZoneColor",
                config: {
                    text: qrval, // Content
                    width: 200, // Widht
                    height: 200, // Height
                    colorDark: "#000000", // Dark color
                    colorLight: "#ffffff", // Light color
                    quietZone: 3,
                    quietZoneColor: '#249200',
                    logo: "/assets/img/qrlogo.webp",
                    logoBackgroundColor: '#ffffff', // Logo backgroud color, Invalid when `logBgTransparent` is true; default is '#ffffff'
                    logoBackgroundTransparent: false, // Whether use transparent image, default is false
                    correctLevel: QRCode.CorrectLevel.H // L, M, Q, H
                }
            }, ]
            var qrcodeTpl = document.getElementById("qrcodeTpl").innerHTML;
            var qrcontainer = $('.qrcontainer')[0];
            for (var i = 0; i < demoParams.length; i++) {
                var qrcodeHTML = qrcodeTpl.replace(/\{title\}/, demoParams[i].title).replace(/{i}/, i);
                qrcontainer.innerHTML += qrcodeHTML;
            }
            for (var i = 0; i < demoParams.length; i++) {
                var t = new QRCode(document.getElementById("qrcode_" + i), demoParams[i].config);
            }
        });
    </script>
    {{-- endregion qr code script --}}
</body>
