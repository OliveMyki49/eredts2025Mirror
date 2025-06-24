@extends('layout.master')

<!-- Main Content -->
<div class="container-fluid ">
    <div class="row main-content bg-success text-center">
        <div class="col-md-4 text-center company__info">

            <img src="../assets/img/logo.png" class="navbar-brand-img h-2 v-2" alt="main_logo" width="176px" height="176px">
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
            <div class="container-fluid">
                <div class="row">
                    <h2>Register</h2>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ session::get('success') }}
                    </div>
                @endif
                <div class="row">

                    <form control="" class="form-group" action="{{ route('register.post') }}" method="POST" role="form">
                        @csrf
                        <div class="row">

                            <input type="text" name="fname" id="fname" class="form__input" placeholder="FirstName" required>
                            @if ($errors->has('fname'))
                                <span class="text-danger"> {{ $errors->first('fname') }} </span>
                            @endif
                        </div>
                        <div class="row">

                            <input type="text" name="mname" id="mname" class="form__input" placeholder="MiddleName" required>
                            @if ($errors->has('mname'))
                                <span class="text-danger"> {{ $errors->first('mname') }} </span>
                            @endif
                        </div>
                        <div class="row">

                            <input type="text" name="sname" id="sname" class="form__input" placeholder="LastName" required>
                            @if ($errors->has('sname'))
                                <span class="text-danger"> {{ $errors->first('sname') }} </span>
                            @endif
                        </div>
                        <div class="row">
                            <input type="email" name="email" id="email" class="form__input" placeholder="Email" required>
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger"> {{ $errors->first('email') }} </span>
                        @endif
                        <div class="row">
                            <input type="text" name="tin_no" id="tin_no" class="form__input" placeholder="BIR Tin Number" required>
                        </div>
                        @if ($errors->has('tin_no'))
                            <span class="text-danger"> {{ $errors->first('tin_no') }} </span>
                        @endif
                        <div class="row">
                            <!-- <span class="bx bx-lock"></span> -->

                            <select name="position" id="position" class="form__input" required style="color:grey;background-color:white">
                                <option disabled>Position</option>
                                <option value="Admin Aide">Admin Aide </option>
                                <option value="Admin Assistant">Admin Assistant </option>
                                <option value="Bookeeper">Bookeeper </option>
                                <option value="Accountant">Accountant </option>
                                <option value="IT Operator">IT Operator </option>
                                <option value="Computer Operator">Computer Operator </option>
                                <option value="Computer Programmer">Computer Programmer </option>
                                <option value="ISA I">ISA I </option>
                                <option value="ISA II">ISA II </option>
                                <option value="ISA II">ISA III </option>
                                <option value="Statistician I">Statistician I </option>
                                <option value="Statistician II">Statistician II </option>
                                <option value="Project Evaluation Officer I">Project Evaluation Officer I </option>
                                <option value="Project Evaluation Officer II">Project Evaluation Officer II </option>
                                <option value="Division Chief">Division Chief </option>
                                <option value="Unit Head">Unit Head </option>
                                <option value="ARD">ARD </option>
                                <option value="RED">RED </option>
                            </select>
                        </div>
                        @if ($errors->has('position'))
                            <span class="text-danger"> {{ $errors->first('position') }} </span>
                        @endif
                        <div class="row">
                            <!-- <span class="bx bx-lock"></span> -->
                            <input type="password" name="password" id="password" class="form__input" placeholder="Password" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger"> {{ $errors->first('password') }} </span>
                        @endif
                        <div class="row">
                            <input type="checkbox" name="remember_me" id="remember_me" class="">
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Submit" class="btn" style="width: 15em;">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <p>Already have an account? <a href="{{ route('login') }}">Login in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
