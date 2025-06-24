@extends('layout.master')
@section('title', 'Sys Logs')
@section('head_extension')
    {{-- region important custom function --}}

    {{-- region custom css --}}
    <style>
        body {
            padding: 0px;
        }

        @media screen and (min-width: 768px) {
            .padding-x-15 {
                padding: 0px;
            }
        }
    </style>
    {{-- endregion custom css --}}
@endsection

@section('content')
    {{-- region notification --}}
    <div class="d-flex flex-row-reverse" style="position: fixed; top: 70px; right: 10px; z-index: 9999; cursor: pointer;">
        <div class="genDashNotifs" class="p-1">
            {{-- Populate notifications here --}}
        </div>
    </div>
    {{-- endregion notification --}}

    <h2>GENERAL SETTING</h2>
    <hr>
    {{-- region upload size form --}}
    <div class="row">
        <div class="col">
            <form class="row g-3" id="editUploadSizeForm">
                <div class="col-auto">
                    <label for="inputUploadSizelbl" class="visually-hidden">Label</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputUploadSizelbl" value="Upload Limit">
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <input type="number" min="10000" class="form-control" id="inputUploadSize" name="inputUploadSize" placeholder="10485760 bytes default" aria-label="Byte Size" aria-describedby="basic-addon1">
                        <span class="input-group-text bytelbl" id="basic-addon2" title="copy original upload size" style="cursor: pointer;">bytes</span>
                    </div>
                    <sup class="byteSizeInputMsg text-secondary"></sup>
                    <sup class="text-primary"> (Default: 10485760 bytes = 10 mb)</sup>
                </div>
                <div class="col-auto">
                    <button type="submit" class="form-control btn btn-outline-primary mb-3 btn-set-upload-size">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{-- region upload size form --}}
    <hr>

    {{-- region custom script --}}
    <script type="text/javascript">
        $(function() {

            /* region fetch upload size */
            let origUpldLmt = 0; //original upload limit;
            $.ajax({
                url: "/get-upload-size",
                method: "GET",
                header: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                success: function(r) {
                    if (r.success) {
                        $('#inputUploadSize').val(r.upload.size);
                        origUpldLmt = r.upload.size; // set original upload limit
                        byteToMb(r.upload.size); //display conversion of byte to mb
                        $('.btn-set-upload-size').hide();
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
            /* endregion fetch upload size */

            /* region save new upload size */
            $('.btn-set-upload-size').click(function(e) {
                e.preventDefault();

                let form = $('#editUploadSizeForm')[0];
                let submitForm = new FormData(form);
                $.ajax({
                    url: "/edit-upload-size-limit",
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
                            $('.genDashNotifs').append('' +
                                '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    <strong>Upload limit has been updated</strong>' +
                                '</div>'
                            );
                        } else {
                            $('.genDashNotifs').append('' +
                                '<div class="alert alert-danger alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                                '    <strong>Upload limit: update error</strong><br>' +
                                '    Please check your input' +
                                '</div>'
                            );
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
            /* endregion save new upload size */

            /* region translate byte size to mb for better understanding */
            $('#inputUploadSize').on('keyup', function() {
                let bytes = $(this).val();
                byteToMb(bytes);
            });

            function byteToMb(byteSize) {
                let mb = byteSize / (1024 * 1024);
                $('.byteSizeInputMsg').empty().append(mb.toFixed(2) + ' MB'); //display convertion to mb below
                $('.btn-set-upload-size').show().html("Save changes");
            }
            /* endregion translate byte size to mb for better understanding */

            /* region copy original byte size */
            $('.bytelbl').click(function() {
                unsecuredCopyToClipboard(origUpldLmt);
            });
            /* endregion copy original byte size */

            /* region unsecured copy text copy to clipboard */
            function unsecuredCopyToClipboard(text) {
                const textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.focus({preventScroll:true});
                textArea.select();
                try {
                    document.execCommand('copy');
                    $('.genDashNotifs').append('' +
                        '<div class="alert alert-success alert-dismissible fade show p-2" data-bs-dismiss="alert" role="alert">' +
                        '    <strong>original byte size copied to clipboard</strong><br>' +
                        '</div>'
                    );
                } catch (err) {
                    console.error('Unable to copy to clipboard', err);
                }
                document.body.removeChild(textArea);
            }
            /* endregion unsecured copy text copy to clipboard */
        });
    </script>
    {{-- endregion custom script --}}

    {{-- dataTable datas --}}
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
@endsection
