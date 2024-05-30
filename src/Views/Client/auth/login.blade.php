@extends('layouts.master')

@section('title')
    Login Page
@endsection

@section('content')
    <section class="login-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="basic-login">
                        <h3 class="text-center mb-60">Login From Here</h3>
                        <form action="#">
                            <label for="name">Email Address <span>**</span></label>
                            <input id="name" type="text" placeholder="Email address..." fdprocessedid="ppzk8">
                            <label for="pass">Password <span>**</span></label>
                            <input id="pass" type="password" placeholder="Enter password..." fdprocessedid="qbr2xl">
                            <div class="login-action mb-20 fix">
                                <span class="log-rem f-left">
                                    <input id="remember" type="checkbox">
                                    <label for="remember">Remember me!</label>
                                </span>
                                <span class="forgot-login f-right">
                                    <a href="#">Lost your password?</a>
                                </span>
                            </div>
                            <button class="os-btn w-100" fdprocessedid="lepeli">Login Now</button>
                            <div class="or-divide"><span>or</span></div>
                            <a href="{{ $_ENV['BASE_URL'] }}/register" class="os-btn os-btn-black w-100"
                                previewlistener="true">Register
                                Now</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
