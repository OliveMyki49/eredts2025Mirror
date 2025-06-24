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

    {{-- region main container --}}
    <div class="bg-white p-2 qr-gen-container apply_bg_theme">
        <div class="d-flex main-flex-content row p-1 justify-content-center">
            <div class="col p-3 rounded bg-white border border-2">
                <div class="row p-0">
                    <div class="col-md-12 border-bottom border-2">
                        <h3>
                            QR CODE GENERATOR
                        </h3>
                    </div>
                    <div class="col-md-12">
                        <form class="p-0 mt-3" action="{{ route('fetchgenqr') }}" method="POST" id="genQRform" target="_blank">
                            @csrf
                            <label for="genQRcontent" class="form-label fs-6">QR Content:</label>
                            <input type="text" id="genQRcontent" name="genQRcontent" class="form-control" placeholder="input QR content" required>
                            <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-success me-md-2 btngenQRcontent" type="button">Generate QR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- endregion main container --}}

    {{-- region stop ajax loading --}}
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('loadingLogo').style.display = "none";
        }
    </script>
    {{-- endregion stop ajax loading --}}

    {{-- region queries --}}
    <script>
        
    </script>
    {{-- endregion queries --}}
@endsection
