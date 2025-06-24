@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    {{-- Add styles here --}}
@endsection

@section('content')
    <div class="content" oncontextmenu="return false;">
        <input type="hidden" name="client_id" id="client_id" value="{{ $client_id }}">

        {{-- region Decrypt image --}}
        @php
            $idFront = '';
            $idFront_ext = '';
            $path1 = $pathfront;
            if ($path1 != null) {
                if (file_exists(public_path($path1))) {
                    $encryptedPath = public_path($path1);
                    try {
                        // Decrypt the image using Laravels decryption
                        $encryptedImage = file_get_contents($encryptedPath);
                        $decryptedImage = Crypt::decryptString($encryptedImage);
                        file_put_contents($encryptedPath, $decryptedImage);
                        $idFront = $path1;
                        $idFront_ext = pathinfo($pathfront, PATHINFO_EXTENSION);
                    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                        $idFront = $path1;
                    }
                }
            }
            $idBack = '';
            $idBack_ext = '';
            $path2 = $pathback;
            if ($path2 != null) {
                if (file_exists(public_path($path2))) {
                    $encryptedPath = public_path($path2);
                    try {
                        // Decrypt the image using Laravels decryption
                        $encryptedImage = file_get_contents($encryptedPath);
                        $decryptedImage = Crypt::decryptString($encryptedImage);
                        file_put_contents($encryptedPath, $decryptedImage);
                        $idBack = $path2;
                        $idBack_ext = pathinfo($pathback, PATHINFO_EXTENSION);
                    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                        $idBack = $path2;
                    }
                }
            }
        @endphp
        {{-- endregion Decrypt image --}}

        <div class="row justify-content-md-center mb-3">
            <div class="col-md text-center">
                <h5><b>Front Id</b></h5>
                <h6><b>Type: {{ $idFront_ext }}</b></h6>
                @if ($idFront_ext == 'pdf')
                    <div>
                        <embed src="{{ asset($idFront) }}#toolbar=0" width="100%" height="500px" style="background:url({{ asset('assets/img/denrloadsmaller.webp') }}) center center no-repeat;">
                    </div>
                @else
                    <span>
                        <img class="border border-2 border-secondary p-1" src="{{ asset($idFront) }}" alt="No Image Loaded" height="500px">
                    </span>
                @endif
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md text-center">
                <h5><b>Back Id</b></h5>
                <h6><b>Type: {{ $idBack_ext }}</b></h6>
                @if ($idBack_ext == 'pdf')
                    <div>
                        <embed src="{{ asset($idBack) }}#toolbar=0" width="100%" height="500px" style="background:url({{ asset('assets/img/denrloadsmaller.webp') }}) center center no-repeat;">
                    </div>
                @else
                    <span>
                        <img class="border border-2 border-secondary p-1" src="{{ asset($idBack) }}" alt="No Image Loaded" height="500px">
                    </span>
                @endif
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md text-center encrypt_msg p-2">

            </div>
        </div>

        {{-- region reencrypt image --}}
        <script>
            $(function() {
                let client_id = $('#client_id').val();

                function reencrypt() {
                    $.ajax({
                        url: "/get-clientId-view-reencrypt/" + client_id + "/",
                        method: 'GET',
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });

                    $('.encrypt_msg').empty().append('' +
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"> ' +
                        '    <strong>image reencrypted</strong>' +
                        '    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> ' +
                        '</div> ' +
                        ''
                    );
                }

                // function reencrypt is disabled
                // setTimeout(reencrypt, 5000); // Use setTimeout, not delay
            });
        </script>
        {{-- endregion reencrypt image --}}
    </div>
@endsection
