{{-- 
src: https://drive.google.com/drive/folders/1uO2YH6LSrJD12zf6z0Qn_xsqrRczEJMs
TAT does not include waiting time and
is the minimum processing time up to
twenty (20) working days    
--}}

@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    <style>
        @media screen and (min-width: 768px) {

            body,
            .container-fluid {
                padding: 0;
            }

            .header,
            .padding-x-15 {
                padding-left: 15% !important;
                padding-right: 15% !important;
            }
        }

        body {
            padding: 0;
        }

        .container-fluid {
            padding-left: 0px;
            padding-right: 0px;
        }

        .header {
            /* almost black */
            /* background: linear-gradient(to bottom right, #333, #333, #333, #333); */

            /* grey */
            background: linear-gradient(to bottom right, #f7f7f7, #f7f7f7, #f7f7f7, #f7f7f7);
            /* border-bottom: solid #fff 2px; */
            height: 50px;
        }

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

        /*
                    .invoice-box table td {
                        padding: 5px;
                        vertical-align: top;
                    }*/

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

            .btn_print_file_container {
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

        .container_content {
            /* display: none; */
        }

        canvas {
            width: 100%;
            height: auto;
            display: block;
        }

        /* for the "/" in the nav name */
        .breadcrumb-item+.breadcrumb-item::before {
            color: #fff !important;
        }
    </style>

    <script>
        $(function() {
            $('.btn_print_file').click(function() {
                //print function
                var delayInMilliseconds = 500; //0.5 second
                setTimeout(function() {
                    window.print();
                }, delayInMilliseconds);
            });
        });
    </script>
    {{-- endregion print function --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu-client')
@endsection
@section('content')
    <div class="g-sidenav-show bg-gray-200" oncontextmenu="return false;">

        {{-- {{ dd($doc_info) }} --}}

        <div class="btn_print_file_container">

            {{-- region bread crumb --}}
            <div class="row mb-2">
                <div class="col">
                    <nav aria-label="breadcrumb" class="p-3" style="background-color: #149D20">
                        <ol class="breadcrumb mb-0 padding-x-15">
                            <li class="breadcrumb-item"><a href="/client-dashboard-home?active_sidebar=client-dashboard-home" class="text-white fw-bold">Home</a></li>
                            {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                            <li class="breadcrumb-item text-white" aria-current="page">Image to PDF</li>
                        </ol>
                    </nav>
                </div>
            </div>
            {{-- endregion bread crumb --}}

            {{-- region uploadding --}}
            <div class="text-start px-5 padding-x-15">
                <p class="d-inline-flex gap-1">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#imgPdfInfoDisclaimer" role="button" aria-expanded="false" aria-controls="imgPdfInfoDisclaimer">
                        What is Image-To-PDF Converter?
                    </a>
                </p>
                <div class="collapse" id="imgPdfInfoDisclaimer">
                    <div class="card card-body">
                        <b>Disclaimer:</b>
                        <br>
                        <ul class="list-group list-group">
                            <li class="list-group-item">The image to PDF converter is an embedded feature in the <b>Regional Frontline Services Online Application and Tracking System (RFSOATS)</b>.</li>
                            <li class="list-group-item">This feature converts images into PDF files. It's important to note that the <b>uploaded files are not stored in the system.</b></li>
                            <li class="list-group-item"> Therefore, <b> any file uploaded here is solely used for the purpose of image to PDF conversion. Once the page is reloaded, any previously uploaded image file will be removed</b>.</li>
                        </ul>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="imageInput" accept="image/*">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="image_size">Image Resolution</label>
                    <select class="form-select" id="image_size">
                        <option selected value="1">100%</option>
                        <option value=".95">95%</option>
                        <option value=".90">90%</option>
                        <option value=".85">85%</option>
                        <option value=".80">80%</option>
                        <option value=".75">75%</option>
                        <option value=".50">50%</option>
                        <option value=".25">25%</option>
                    </select>
                </div>
            </div>

            {{-- region form here --}}
            <form class="mt-3 padding-x-15" action="gen-img-to-pdf" target="_blank" method="POST">
                @csrf
                {{-- <a href="gen-img-to-pdf" class="btn btn-success btn-lg" type="button">Download as pdf</a> --}}
                {{-- <button class="btn btn-success btn-lg btnimageToPDF" type="submit">Download as pdf</button> --}}
                <div class="row img-collections m-3 border border-3 rounded border-dark-subtle">
                    <div class="col-md-12 text-center">
                        <h4>
                            Image to be converted
                        </h4>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-success btn-lg" type="submit">Convert and Download as PDF</button>
                </div>
            </form>
            {{-- endregion form here --}}
        </div>

        <div class="accordion accordion-flush" id="accordionRecentImgUp">
            <div class="accordion-item ">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed padding-x-15" type="button" data-bs-toggle="collapse" data-bs-target="#Drop1" aria-expanded="false" aria-controls="Drop1">
                        Last Image Uploaded
                    </button>
                </h2>
                <div id="Drop1" class="accordion-collapse collapse" data-bs-parent="#accordionRecentImgUp">
                    <div class="accordion-body">
                        <div class="container_content pb-2 padding-x-15" id="container_content">
                            <div class="invoice-box">
                                {{-- Start of table --}}
                                <div class="row m-0">
                                    <div class="col text-center">
                                        <div class="align-self-center">
                                            <canvas id="canvas" width="100%" height="300" style="border:1px solid #000;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                {{-- End of table --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- region navbar text display --}}
        <script>
            $(function() {
                $('.navbar-brand-govph').hide();
            });
        </script>
        {{-- endregion navbar text display --}}

        <script>
            $(function() {
                $('#imageInput').change(function(e) {
                    var canvas = document.getElementById('canvas');
                    var ctx = canvas.getContext('2d');
                    var img = new Image();

                    //get image size preferred:
                    let image_size = $('#image_size :selected').val();

                    // Get the selected file from the input
                    var file = e.target.files[0];

                    // Check if a file is selected
                    if (file) {
                        // Create a FileReader to read the image data
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            // Set the image source to the data URL
                            img.src = e.target.result;
                        };

                        // Read the image data as a Data URL
                        reader.readAsDataURL(file);
                    }

                    img.onload = function() {
                        // Set canvas size to match the original image size
                        canvas.width = img.naturalWidth * image_size;
                        canvas.height = img.naturalHeight * image_size;

                        // Draw the image on the canvas
                        ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                        var resultImage = new Image();
                        resultImage.src = canvas.toDataURL();
                        resultImage.style.width = '70px';
                        resultImage.style.height = '70px';

                        var imageContainer = $('<div class="imgArrCont col-md-2 m-2 p-2 border border-dark-subtle text-center"></div>');
                        imageContainer.append(resultImage);
                        imageContainer.append('<input type="hidden" name="imageArr[]" value="' + canvas.toDataURL() + '">');
                        imageContainer.append('<button class="ms-1 btn btn-remove-imgArrCont btn-danger rounded" tooltip="Remove Image" flow="down">X</button>');

                        $('.img-collections').append(imageContainer);

                        $('#inptImageArr').val(canvas.toDataURL());
                    };
                });

                // remove image uploaded before converting
                $('.img-collections').on('click', '.btn-remove-imgArrCont', function(e) {
                    e.preventDefault();

                    $(this).closest('.imgArrCont').remove();
                });

            })
        </script>
    </div>
@endsection
