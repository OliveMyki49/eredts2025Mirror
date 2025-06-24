@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    {{-- region custom css and javascript here --}}
    <style>
        div.main {
            text-align: center;
            background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
            font: small-caps bold 24px/1 sans-serif;
            height: 800px;
            padding-top: 20%;
            padding-left: 10%;
            padding-right: 10%;
        }
    </style>
    {{-- endregion custom css and javascript here --}}

    {{-- region custom css --}}
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

        .header {
            /* almost black */
            /* background: linear-gradient(to bottom right, #333, #333, #333, #333); */

            /* grey */
            background: linear-gradient(to bottom right, #f7f7f7, #f7f7f7, #f7f7f7, #f7f7f7);
            /* border-bottom: solid #fff 2px; */
            height: 50px;
        }

        .container-fluid {
            padding: 0;
        }

        /* endregion horizontal scrolling */
    </style>
    {{-- endregion custom css --}}
@endsection

@section('sidebar')
    @parent
    @include('layout.menu-client')
@endsection
@section('content')
    {{-- region contents here --}}
    <div class="main padding-x-15">
        <span>
            <h2>Denr RFSOATS: Your request has been successfully submitted.</h2>
            <hr>
            <ul>
                <li>
                    <h3 style="text-align: left; font: 24px/1 sans-serif;">An acknowledgement will be sent to your email 📧.</h3>
                </li>
                <li>
                    <h3 style="text-align: left; font: 24px/1 sans-serif;">Document tracking number will be sent to your email once validated and approved, Please check your email for updates.</h3>
                </li>
            </ul>
            <h5><a href="/">Go to home page<a></h5>
        </span>
    </div>
    {{-- endregion contents here --}}
@endsection
