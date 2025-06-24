@extends('layout.master')
@section('title', 'Generate QR Code')
@section('head_extension')
    {{-- region custom css --}}
    <style>
        .qr-gen-container {
            padding-left: 250px !important;
            padding-right: 250px !important;
        }

        @media screen and (max-width: 768px) {
            .qr-gen-container {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
        }
    </style>
    {{-- endregion custom css --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu')
@endsection
@section('content')
    <div class="g-sidenav-show bg-gray-200" oncontextmenu="return false;">

        <div class="alert alert-info alert-dismissible fade show" role="alert" data-bs-dismiss="alert" aria-label="Close" style="cursor:pointer; position: fixed; top: 10%; left: 40%; z-index:999; opacity: 90%;">
            <h3>This page is opened in new tab</h3>
        </div>

        {{-- {{ dd($doc_info) }} --}}

        <div class="mt-5 p-3 bg-light btn_print_file_container apply_bg_theme">

            {{-- region bread crumb --}}
            <div class="row mt-2">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-white rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            {{-- <li class="breadcrumb-item"><a href="#">Item name</a></li> --}}
                            <li class="breadcrumb-item" aria-current="page">Image to PDF</li>
                        </ol>
                    </nav>
                </div>
            </div>
            {{-- endregion bread crumb --}}

            {{-- region uploadding --}}
            <div class="text-start px-5">
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
            <form class="mt-3" action="gen-img-to-pdf" target="_blank" method="POST">
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
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Drop1" aria-expanded="false" aria-controls="Drop1">
                        Last Image Uploaded
                    </button>
                </h2>
                <div id="Drop1" class="accordion-collapse collapse" data-bs-parent="#accordionRecentImgUp">
                    <div class="accordion-body">
                        <div class="container_content pb-2" id="container_content">
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
