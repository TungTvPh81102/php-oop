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

                        @if (isset($_SESSION['errors']) && $_SESSION['errors'])
                            <div class="alert alert-danger">{{ $_SESSION['errors'] }}</div>
                            @php
                                unset($_SESSION['errors']);
                            @endphp
                        @endif

                        <form action="{{ url('handle-login') }}" method="POST">
                            <div class="form-group mb-3">
                                <label for="email-id">Email Address <span>**</span></label>
                                <input id="email-id" type="email" name="email" placeholder="Email address..."
                                    fdprocessedid="8tsuy9m">
                                <span
                                    class="text-danger">{{ !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="pass">Password <span>**</span></label>
                                <input name="password" id="pass" type="password" placeholder="Enter password..."
                                    fdprocessedid="152hur">
                                <span
                                    class="text-danger">{{ !empty($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : '' }}</span>
                            </div>
                            <button class="os-btn w-100" fdprocessedid="lepeli">Login Now</button>
                            <div class="or-divide"><span>or</span></div>
                            <a href="{{ url('register') }}" class="os-btn os-btn-black w-100"
                                previewlistener="true">Register
                                Now</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
