@extends('layout.master')
@section('title', 'Signin Page')
@section('head_extension')
    <style>
        img {
            --a: 8deg;
            /* control the angle of rotation (the smaller, the better) */
            aspect-ratio: 1;
            /* transform: perspective(400px) rotate3d(var(--r, 1, -1), 0, calc(var(--i, 1)*var(--a))); */
            -webkit-mask:
                linear-gradient(135deg, #000c 40%, #000, #000c 60%) 100% 100%/250% 250%;
            transition: 1s;
            cursor: pointer;
        }

        .alt {
            --r: 1, 1;
            -webkit-mask:
                linear-gradient(45deg, #000c 40%, #000, #000c 60%) 0 100%/250% 250%;
        }

        img:hover {
            --i: -1;
            -webkit-mask-position: 0 0;
        }

        .alt:hover {
            -webkit-mask-position: 100% 0;
        }

        .main-content {
            border-radius: 0px;
        }

        /* modify footer size for login page */
        .padding-x-15 {
            padding-left: 25% !important;
            padding-right: 25% !important;
        }

        /* hide go to top button in footer */
        .btn-go-to-top-page {
            display: none;
        }

        span.lbl-local {
            margin-left: 10px;
            padding: 4px 10px;
            background-color: #f0f0f0;
            border: 2px solid grey;
            border-radius: 4px;
            font-weight: bold;
            color: grey;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    {{-- region crystal background --}}
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background: linear-gradient(45deg, #284b64, #3ea5b9, #20333f);
            background-size: 400% 400%;
            animation: gradientBackground 15s ease infinite;
        }

        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .crystals {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .crystal {
            position: absolute;
            width: 150px;
            height: 150px;

            /* Increase opacity for visibility */
            background: rgba(255, 255, 255, 1);

            /* Reduce for sharper edges */
            border-radius: 0 100%;

            /* Increase spread for more visibility */
            box-shadow: 0 0 30px rgba(255, 255, 255, 1);

            transform: rotate(180deg);
            animation: moveCrystal 20s linear infinite;
        }

        @keyframes moveCrystal {
            0% {
                transform: translate(0, -1200px) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translate(calc(-500px + 1000px * random()), 1200px) rotate(calc(360deg * random()));
                opacity: 0;
            }
        }



        .crystal:nth-child(odd) {
            animation-duration: 25s;
        }

        .crystal:nth-child(even) {
            animation-duration: 40s;
        }
    </style>
    {{-- endregion crystal background --}}

    {{-- region loader --}}
    <style>
        /* HTML: <div class="loader"></div> */
        .loader {
            width: 25px;
            aspect-ratio: 1;
            border-radius: 50%;
            border: 4px solid #000000;
            animation:
                l20-1 0.8s infinite linear alternate,
                l20-2 1.6s infinite linear;
        }

        @keyframes l20-1 {
            0% {
                clip-path: polygon(50% 50%, 0 0, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%)
            }

            12.5% {
                clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 0%, 100% 0%, 100% 0%)
            }

            25% {
                clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 100%, 100% 100%, 100% 100%)
            }

            50% {
                clip-path: polygon(50% 50%, 0 0, 50% 0%, 100% 0%, 100% 100%, 50% 100%, 0% 100%)
            }

            62.5% {
                clip-path: polygon(50% 50%, 100% 0, 100% 0%, 100% 0%, 100% 100%, 50% 100%, 0% 100%)
            }

            75% {
                clip-path: polygon(50% 50%, 100% 100%, 100% 100%, 100% 100%, 100% 100%, 50% 100%, 0% 100%)
            }

            100% {
                clip-path: polygon(50% 50%, 50% 100%, 50% 100%, 50% 100%, 50% 100%, 50% 100%, 0% 100%)
            }
        }

        @keyframes l20-2 {
            0% {
                transform: scaleY(1) rotate(0deg)
            }

            49.99% {
                transform: scaleY(1) rotate(135deg)
            }

            50% {
                transform: scaleY(-1) rotate(0deg)
            }

            100% {
                transform: scaleY(-1) rotate(-135deg)
            }
        }
    </style>
    {{-- endregion loader --}}
@endsection

<!-- Main Content -->
@section('content')
    <div class="crystals">
        <div class="crystal" style="left: {{ rand(10, 10 + 10) }}%; top: {{ rand(90, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(40, 40 + 10) }}%; top: {{ rand(100, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(70, 70 + 10) }}%; top: {{ rand(95, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(20, 20 + 10) }}%; top: {{ rand(110, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(60, 60 + 10) }}%; top: {{ rand(105, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(10, 10 + 10) }}%; top: {{ rand(90, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(40, 40 + 10) }}%; top: {{ rand(100, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(70, 70 + 10) }}%; top: {{ rand(95, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(20, 20 + 10) }}%; top: {{ rand(110, 120) }}%;"></div>
        <div class="crystal" style="left: {{ rand(60, 60 + 10) }}%; top: {{ rand(105, 120) }}%;"></div>
    </div>

    <div class="container pt-5" style="position: relative; z-index:10;">

        <div class="row main-content text-center mb-2">
            <div class="loader-container">
                {{-- loader append here --}}
            </div>
        </div>

        <div class="row main-content border border-light bg-white text-center">
            <div class="col-md-4 p-3 text-center company__info d-flex image-wrapper shine">
                {{-- <a href="{{ url('client-dashboard-home') }}" tooltip="Visit me" flow="down"> --}}
                <img src="{{ asset('assets/img/eredtslogo.webp') }}" class="h-2 v-2" alt="main_logo" width="100%" height="100%">
                {{-- </a> --}}
                <h3>E-REDTS</h3>
                <span class="lbl-local mb-1">LOCAL</span>
                <sub>{{ config('app.version') }}</sub>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 bg-white" style="margin: auto;">
                {{-- <div class="row pt-2">
                    <h2><b>Log In</b></h2>
                </div> --}}

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" data-bs-dismiss="alert" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <div class="row">
                    <div class="col p-4">
                        <form control="form-control" class="form-group" action="{{ route('login.post') }}" method="POST" role="form" class="text-start">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="username" id="username" class="form__input" value="{{ old('username') }}" placeholder="Username" autocomplete="username">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Password" autocomplete="password">
                                </div>
                            </div>
                            @if ($errors->has('username'))
                                <span class="text-danger"> {{ $errors->first('username') }} </span>
                            @endif
                            @if ($errors->has('password'))
                                <span class="text-danger"> {{ $errors->first('password') }} </span>
                            @endif
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" name="remember_me" id="remember_me" class="">
                                    <label for="remember_me">Remember Me!</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <input type="submit" value="Log In" class="btn-login" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="base-url" value="{{ config('app.bapiu') }}">

    <script>
        $(function() {

            $('.loader-container').append(`
                <div class="alert alert-primary row mb-0" role="alert">
                    <div class="col-md-1">
                        <div class="loader"></div>
                    </div>
                    <div class="col-md">
                        PERFORMING SYSTEM SYNC, PLEASE WAIT...
                    </div>
                </div>
            `);

            $.ajax({
                url: "/sync-user-list",
                type: "GET",
                success: function(r) {
                    if (r.success) {
                        $('.loader-container').empty();

                        console.log(r);

                        if (r.msg == "No changes detected") {
                            $('.loader-container').empty().append(`
                                <div class="alert alert-success row mb-0" role="alert">
                                    <div class="col-md-1">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-md">
                                        NO CHANGES DETECT, YOUR DATABASE IS UP TO DATE.
                                    </div>
                                </div>
                            `);
                        }else{
                            $('.loader-container').empty().append(`
                                <div class="alert alert-success row mb-0" role="alert">
                                    <div class="col-md-1">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-md">
                                        DATABASE SYNC COMPLETED
                                    </div>
                                </div>
                            `);
                        }
                    } else {
                        $('.loader-container').empty().append(`
                            <div class="alert alert-warning row mb-0" role="alert">
                                <div class="col-md-1">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                                <div class="col-md">
                                    SYSTEM IS OFFLINE, CONTINUE EREDTS LOCALLY.
                                </div>
                            </div>
                        `);
                        console.log("System Offline")
                    }
                },
                error: function(err) {
                    $('.loader-container').empty().append(`
                            <div class="alert alert-danger row mb-0" role="alert">
                                <div class="col-md-1">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                                <div class="col-md">
                                    ERROR OCCURRED DURING SYNC, PLEASE TRY AGAIN LATER.
                                </div>
                            </div>
                        `);
                    console.log(err);
                }
            });
        });
    </script>
@endsection
