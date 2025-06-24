{{-- @extends('layout.master') --}}

{{-- header here --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/codePenMagicToolTip.css') }}" />

    <script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>

    {{-- generate qr code --}}
    <script src="{{ asset('assets/js/easy.qrcode.min.js') }}"></script>
    <script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
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

            .button_appear {
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
                zoom: 70%;
            }
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

        // $(document).ready(function() { //csrf prevent cross platform injection
        //     window.addEventListener('afterprint', function() {
        //         // close print tab if exit
        //         setTimeout(function() {
        //             window.close();
        //         }, 500);
        //     });

        // });
    </script>
    {{-- endregion print function --}}
</head>

<body class="g-sidenav-show  bg-gray-200" oncontextmenu="return false;">

    {{-- {{ dd($doc_info) }} --}}
    <input type="hidden" id="qrval" value="{{ $genQRcontent }}">


    <div class="container_content d-flex justify-content-center" id="container_content">
        <div class="invoice-box">
            <div class="qrcontainer">
                {{-- QR CODE BE GENERATED HERE --}}
            </div>

            <br>
            <div class="row">
                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">QR Content:</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $genQRcontent == '' ? 'No content found' : $genQRcontent }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md fs-6">
                    <div class="d-grid gap-2" tooltip="download qr" flow="right">
                        <button class="btn btn-outline-success btn-lg btn-download-qr" style="height: 90px;" type="button">
                            <i class="fa fa-download" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
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
                    width: 400, // Widht
                    height: 400, // Height
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

    {{-- region downloader --}}
    <script>
        $(function() {
            $('.btn-download-qr').click(function() {
                // Select the qrcontainer element
                let qrContainer = $('.qrcontainer')[0];
                const date = new Date();
                let dateFomrat = date.getFullYear() +"_"+ date.getMonth() +"_"+ date.getDate();

                // Use html2canvas to capture the content as an image
                html2canvas(qrContainer).then(function(canvas) {
                    // Create a temporary link to download the image
                    let link = document.createElement('a');
                    link.href = canvas.toDataURL('image/png');
                    link.download = 'qr_image_'+ dateFomrat +'.png';
                    link.click();
                });
            });
        })
    </script>
    {{-- endregion downloader --}}
</body>
