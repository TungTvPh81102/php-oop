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

                        @if (isset($_SESSION['status']) && $_SESSION['status'])
                            <div class="alert alert-danger">{{ $_SESSION['msg'] }}</div>

                            @php
                                unset($_SESSION['status']);
                                unset($_SESSION['msg']);
                            @endphp
                        @endif

                        @if (isset($_SESSION['status']) && !$_SESSION['status'])
                            <div class="alert alert-danger">{{ $_SESSION['msg'] }}</div>

                            @php
                                unset($_SESSION['status']);
                                unset($_SESSION['msg']);
                            @endphp
                        @endif

                        <form action="{{ url('handle-register') }}" method="post">
                            <div class="form-group mb-3">
                                <label for="name">Username <span>**</span></label>
                                <input value="{{ old('name') ? old('name') : '' }}" name="name" id="name"
                                    type="text" placeholder="Enter Username" fdprocessedid="3869mf">
                                <span
                                    class="text-danger">{{ !empty($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : '' }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email-id">Email Address <span>**</span></label>
                                <input value="{{ old('email') ? old('email') : '' }}" id="email-id" type="email"
                                    name="email" placeholder="Email address..." fdprocessedid="8tsuy9m">
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
                            <div class="form-group mb-3">
                                <label for="pass">Confirm Password <span>**</span></label>
                                <input name="confirm-password" id="pass" type="password"
                                    placeholder="Enter confirm password..." fdprocessedid="152hur">
                                <span
                                    class="text-danger">{{ !empty($_SESSION['errors']['confirm-password']) ? $_SESSION['errors']['confirm-password'] : '' }}</span>
                            </div>
                            <div class="mt-10"></div>
                            <button type="submit" class="os-btn w-100" fdprocessedid="ot736s">Register Now</button>
                            <div class="or-divide"><span>or</span></div>
                            <a href="{{ url('login') }}" class="os-btn os-btn-black w-100" previewlistener="true">login
                                Now</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@php
    unset($_SESSION['errors']);
    unset($_SESSION['data']);
@endphp
