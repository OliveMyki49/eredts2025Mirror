@extends('layout.master')
@section('title', 'PDF viewer tester')
@section('head_extension')
    {{-- region custom js --}}
    {{-- <script src="../assets/js/pdf.min.js"></script> --}}
    {{-- endregion custom js --}}

    <style>
        #pdf-view-canvas {
            border: 1px solid black;
            direction: ltr;
        }
    </style>

    {{-- region custom js --}}
    {{-- SOURCE: https://github.com/mozilla/pdf.js?tab=readme-ov-file#online-demo --}}
    {{-- SOURCE: https://mozilla.github.io/pdf.js/examples/index.html#interactive-examples --}}
    <script src="../assets/js/pdf.mjs" type="module"></script>

    <script type="module">
        $(function() {
            // If absolute URL from the remote server is provided, configure the CORS
            // header on that server.
            var url = '/action_files/sample_cert.pdf';

            // Loaded via <script> tag, create shortcut to access PDF.js exports.
            var {
                pdfjsLib
            } = globalThis;

            // The workerSrc property shall be specified.
            pdfjsLib.GlobalWorkerOptions.workerSrc = '../assets/js/pdf.worker.mjs';

            var pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = 2,
                canvas = document.getElementById('pdf-view-canvas'),
                ctx = canvas.getContext('2d');

            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                pageRendering = true;
                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    var viewport = page.getViewport({
                        scale: scale
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);

                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                // Update page counters
                document.getElementById('page_num').textContent = num;
            }

            /**
             * If another page rendering in progress, waits until the rendering is
             * finised. Otherwise, executes rendering immediately.
             */
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            /**
             * Displays previous page.
             */
            function onPrevPage() {
                if (pageNum <= 1) {
                    return;
                }
                pageNum--;
                queueRenderPage(pageNum);

                // add water mark
                addwatermark();
            }
            document.getElementById('prev').addEventListener('click', onPrevPage);

            /**
             * Displays next page.
             */
            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                queueRenderPage(pageNum);

                // add water mark
                addwatermark();
            }
            document.getElementById('next').addEventListener('click', onNextPage);

            /**
             * Asynchronously downloads PDF.
             */
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count').textContent = pdfDoc.numPages;

                // Initial/first page rendering
                renderPage(pageNum);

                // add water mark
                addwatermark();
            });

            function addwatermark() {

                $('.print-button-container').empty();

                var delayInMilliseconds = 500; //1000 = 1 second

                setTimeout(function() {
                    // Assuming 'canvas' is your canvas element and 'ctx' is the 2D context
                    var canvas = document.getElementById('pdf-view-canvas');
                    var ctx = canvas.getContext('2d');

                    // Rotate the canvas by 45 degrees to the left
                    ctx.rotate(-45 * Math.PI / 180);

                    ctx.font = '30px Arial'; // Adjust the font size
                    ctx.textAlign = 'center';
                    ctx.fillStyle = 'rgba(0, 0, 0, 0.1)'; // Adjust color and opacity

                    // Calculate the diagonal size to ensure the watermark covers the entire canvas
                    var diagonalSize = Math.sqrt(Math.pow(canvas.width, 2) + Math.pow(canvas.height, 2));

                    // Calculate the position to center the watermark diagonally
                    var xPosition = (diagonalSize / 2) / 2;
                    var yPosition = (diagonalSize / 2) / 2;

                    let waterMarkText = '';
                    for (let i = 0; i <= 50; i++) {
                        waterMarkText += 'RFSOATS RN:123     ';
                    }

                    for (let i = (-1000); i <= 1300; i += 60) {
                        ctx.fillText(waterMarkText, xPosition + i, yPosition + i);
                    }

                    // region bottom note
                    // Rotate the canvas by 45 degrees to the left
                    ctx.rotate(45 * Math.PI / 180);
                    ctx.font = '20px Arial'; // Adjust the font size
                    ctx.textAlign = 'center';
                    ctx.fillStyle = 'rgba(0, 0, 0, 1)'; // Adjust color and opacity
                    ctx.fillText('NOTE: Printed copy of the document are only valid with watermark', canvas.width/2, canvas.height-5);
                    // region bottom note

                    $('.print-button-container').append('<button type="button" class="btn btn-outline-success printCanvas">🖨️ Print</button>');

                }, delayInMilliseconds);
            }

            $('.print-button-container').on('click', 'button.printCanvas', function() {

                var canvas = document.getElementById('pdf-view-canvas');
                var imgData = canvas.toDataURL('image/png');

                var newWindow = window.open();
                newWindow.document.write('<img src="' + imgData + '" alt="Canvas Image">');

                newWindow.onload = function() {
                    newWindow.print();
                };
            });

        });
    </script>
    {{-- endregion custom js --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu-client')
@endsection
@section('content')

    <div class="container">
        <h1>VIEW DOCUMENTS</h1>

        {{-- <p>Please use <a href="https://mozilla.github.io/pdf.js/getting_started/#download"><i>official releases</i></a> in production environments.</p> --}}

        <div class="row">
            <div class="col-md-6">
                <div class="btn-group mb-3" role="group" aria-label="none">
                    <button type="button" class="btn btn-outline-success" id="prev">Previous</button>
                    <button type="button" class="btn btn-outline-success" id="next">Next</button>
                </div>
                <div class="print-button-container btn-group mb-3">

                </div>
                <br>
                <span class="fs-6">NOTE: Printed copy of the document are only valid with watermark</span>
                <br>
                &nbsp; &nbsp;
                <span class="fs-6">Page: <span id="page_num" class="fs-6"></span> / <span id="page_count" class="fs-6"></span></span>
                <br>
                <canvas id="pdf-view-canvas"></canvas>
            </div>
            <div class="col-md-6"></div>
        </div>

    </div>
@endsection
