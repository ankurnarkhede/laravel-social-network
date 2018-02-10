
@extends('layouts.master')

@section('title')
    Idli
@endsection

@section('content')
    <div class="row" id="login-page">
        @include('message_block')

        <div class="col s12 m6 z-depth-4 card-panel">
            <div class="offset-m1 s12 m10">
            <form action="{{ route('signin') }}" class="login-form" enctype="multipart/form-data" method="post" style="">

                    <div class="row" style="margin-bottom: 0px;">
                        <div class="input-field col s12 center">
                            <img alt="" class="circle responsive-img valign profile-image-login" src="../assets/images/sggs.png" style="width: unset;">

                            <p class="center" style="color: #e74c3c; font-weight: bold;"></p>
                        </div>
                    </div>



                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s6">
                                <a class="active" href="#login" id="login_btn">IDLI LOGIN</a>
                            </li>
                        </ul>
                    </div>



                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="email" name="email" type="text" value="{{ Request::old('email') }}">
                            <label class="center-align" for="email">Email</label>
                        </div>
                    </div>


                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">security</i>
                            <input id="password" name="password" type="password" value="{{ Request::old('password') }}">
                            <label class="center-align" for="password">Password</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12" type="submit">
                            <button class="btn waves-effect waves-light col s12" name="signin_submit" type="submit">SignIn</button>
                        </div>
                    </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">



            </form>
        </div>
        </div>


        <div class="col s12 m6 z-depth-4 card-panel">
            <div class="offset-m1 s12 m10">
            <form action="{{ route('signup') }}" class="login-form" enctype="multipart/form-data" method="post" style="">

                <div class="row" style="margin-bottom: 0px;">
                    <div class="input-field col s12 center">
                        <img alt="" class="circle responsive-img valign profile-image-login" src="../assets/images/sggs.png" style="width: unset;">

                        {{--<p class="center login-form-text">IDLI SIGNUP</p>--}}


                        <p class="center" style="color: #e74c3c; font-weight: bold;"></p>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s6">
                                <a class="active" href="#login" id="login_btn">IDLI SIGNUP</a>
                            </li>
                        </ul>
                    </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="name" name="name" type="text" value="{{ Request::old('name') }}">
                                <label class="center-align" for="name">Name</label>
                            </div>
                        </div>



                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="email" name="email" type="text" value="{{ Request::old('email') }}">
                                <label class="center-align" for="email">Email</label>
                            </div>
                        </div>


                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">security</i>
                                <input id="password" name="password" type="password" value="{{ Request::old('password') }}">
                                <label class="center-align" for="password">Password</label>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="input-field col s12 m12 l12 login-text">
                                <input id="remember-me" type="checkbox"> <label for="remember-me">Remember me</label>
                            </div>
                        </div> -->


                        <div class="row">
                            <div class="input-field col s12" type="submit">
                                <button class="btn waves-effect waves-light col s12" name="signup_submit" type="submit">SignUp</button>
                            </div>
                        </div>

                    <input type="hidden" name="_token" value="{{ Session::token() }}">


                </div>

            </form>
            </div>
        </div>
    </div>
@endsection

