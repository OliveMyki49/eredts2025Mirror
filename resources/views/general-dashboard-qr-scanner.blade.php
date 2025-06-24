@extends('layout.master')
@section('title', 'QR Code Scanner')
@section('head_extension')
    {{-- region custom css --}}
    <style>
        /* CSS */
        .qr_container {
            width: 100%;
            max-width: 500px;
            margin: 5px;
        }

        button.html5-qrcode-element {
            appearance: none;
            background-color: #4a9485;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 14px;
            font-weight: 600;
            line-height: 20px;
            padding: 6px 16px;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            white-space: nowrap;
            margin-bottom: 10px;
            width: 80%;
            text-wrap: wrap;
        }

        button.html5-qrcode-element:focus:not(:focus-visible):not(.focus-visible) {
            box-shadow: none;
            outline: none;
        }

        button.html5-qrcode-element:hover {
            background-color: #3d9099;
        }

        button.html5-qrcode-element:focus {
            box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
            outline: none;
        }

        button.html5-qrcode-element:disabled {
            background-color: #94d3a2;
            border-color: rgba(27, 31, 35, .1);
            color: rgba(255, 255, 255, .8);
            cursor: default;
        }

        button.html5-qrcode-element:active {
            background-color: #298e46;
            box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
        }
    </style>
    {{-- endregion custom css --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu')
@endsection
@section('content')

    <!-- ALLOW INSECURE CAMERA -->
    <!-- DESKTOP -->
    <!-- edge://flags/#unsafely-treat-insecure-origin-as-secure -->
    <!-- https://stackoverflow.com/questions/52759992/how-to-access-camera-and-microphone-in-chrome-without-https -->
    <!-- https://stackoverflow.com/questions/40696280/unsafely-treat-insecure-origin-as-secure-flag-is-not-working-on-chrome -->

    <!-- FOR MOBILE -->
    <!-- about://flags -->
    <!-- then search unsafely-treat-insecure-origin-as-secure -->

    {{-- region If Authenticated --}}
    <input type="hidden" class="auth_username" name="auth_username" id="auth_username" value="{{ Auth::user()->username }}">
    {{-- endregion If Authenticated --}}

    {{-- region loading indicator --}}
    <div id="loadingLogo" style="background: url(../assets/img/denrloadsmaller.webp) no-repeat center; background-size: 49%; position: fixed; z-index: 99999; top: 20%; left: 20%; width: 50%; height: 50%;">
        Loading
    </div>
    {{-- endregion loading indicator --}}

    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 10px; z-index: 100;">
        <div id="genDashNotifs" class="p-1">
            {{-- Populate notifications here --}}
        </div>
    </div>
    {{-- endregion notification --}}

    {{-- region main qr_container --}}
    <div class="bg-white p-2 qr-gen-qr_container apply_bg_theme">
        <div class="d-flex main-flex-content row p-1 justify-content-center">
            <div class="col p-3 rounded bg-white border border-2">
                <div class="row p-0">
                    <div class="col-md-12 border-bottom border-2">
                        <h3>
                            QR CODE SCANNER
                        </h3>
                    </div>
                    <div class="col-md-12 pt-3 d-flex justify-content-center">
                        <span class="scan-result fs-6 fw-bold">

                        </span>
                    </div>
                </div>
                <div class="col-md-12 pt-3 d-flex justify-content-center">
                    <div class="qr_container">
                        <div class="section">
                            <div id="my-qr-reader">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pt-3 d-flex justify-content-start">
                    <div>
                        <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapse_qr_scanner_permit" role="button" aria-expanded="false" aria-controls="collapse_qr_scanner_permit">
                            My device doesn't allow QR scanner 😔
                        </a>
                        <div class="collapse" id="collapse_qr_scanner_permit">
                            <div class="card card-body border border-primary m-2">
                                <p class="fs-6">
                                    One reason why the QR scanner is not working might be due to restrictions on your device.<br> To grant permission for this site to use the QR scanner, please access the link provided below and update the site's permissions.
                                </p>

                                <p class="fs-6">
                                    Copy the link below and open it in separate browser, if the link for you prefered browser is not in the link below you can try searching for it online.
                                </p>

                                <ul>
                                    <li>
                                        MS Edge Browser (Desktop): <a href="edge://flags/#unsafely-treat-insecure-origin-as-secure" target="_blank">edge://allow_site</a>
                                    </li>
                                    <li>
                                        Chrome Browser (Desktop): <a href="chrome://flags/#unsafely-treat-insecure-origin-as-secure" target="_blank">chrome://allow_site</a>
                                    </li>
                                    <li>
                                        Chrome Browser (Mobile): <a href="about://flags" target="_blank">chrome://allow_site</a>
                                    </li>
                                </ul>

                                <p class="fs-6">
                                    Find the "<b>Insecure origins treated as secure</b>" to enable and copy paste the rfsoats link <b>http://58.69.249.98:9133/</b> then restart your browser.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- endregion main qr_container --}}

    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}

    {{-- region queries --}}
    <script src="{{ asset('assets/js/html5-qrcode.js') }}"></script>
    <script>
        // script.js file 
        function domReady(fn) {
            if (
                document.readyState === "complete" ||
                document.readyState === "interactive"
            ) {
                setTimeout(fn, 1000);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        domReady(function() {

            // If found you qr code 
            function onScanSuccess(decodeText, decodeResult) {
                const date = new Date();
                $('.scan-result').empty().append('' +
                    'Scanned: <a href="' + decodeText + '" target="_blank" >open link here ref: ' + date.getFullYear() + '' + date.getMonth() + '' + date.getDate() + '' + date.getHours() + '' + date.getMinutes() + '' + date.getSeconds() + '</a>'
                );
                console.clear();
                console.log(decodeText);
                // window.open(decodeText, '_self');
            }

            let htmlscanner = new Html5QrcodeScanner(
                "my-qr-reader", {
                    fps: 10,
                    qrbos: 250
                }
            );
            htmlscanner.render(onScanSuccess);
        });
    </script>
    {{-- endregion queries --}}
@endsection
