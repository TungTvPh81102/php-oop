@extends('layouts.master')

@section('title')
    Register Page
@endsection

@section('content')
    <section class="login-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="basic-login">
                        <h3 class="text-center mb-60">Signup From Here</h3>
                        <form action="#">
                            <label for="name">Username <span>**</span></label>
                            <input id="name" type="text" placeholder="Enter Username" fdprocessedid="3869mf">
                            <label for="email-id">Email Address <span>**</span></label>
                            <input id="email-id" type="text" placeholder="Email address..." fdprocessedid="8tsuy9m">
                            <label for="pass">Password <span>**</span></label>
                            <input id="pass" type="password" placeholder="Enter password..." fdprocessedid="152hur">
                            <div class="mt-10"></div>
                            <button class="os-btn w-100" fdprocessedid="ot736s">Register Now</button>
                            <div class="or-divide"><span>or</span></div>
                            <a href="login.html" class="os-btn os-btn-black w-100" previewlistener="true">login Now</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection