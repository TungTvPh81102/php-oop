@extends('layouts.master')

@section('title')
    Forgot Password
@endsection

@section('content')
    <section class="login-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="basic-login">
                        <h3 class="text-center mb-60">{{ $title }}</h3>

                        @if (isset($_SESSION['status']) && $_SESSION['status'])
                            <div class="alert alert-success">{{ $_SESSION['msg'] }}</div>
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

                        <form action="{{ url('handle-forgot-password') }}" method="post">
                            <div class="form-group mb-3">
                                <label for="email">Email <span>**</span></label>
                                <input name="email" id="name" type="email" placeholder="Enter email"
                                    fdprocessedid="3869mf">
                                <span
                                    class="text-danger">{{ !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' }}</span>
                            </div>

                            <div class="d-flex">
                                <a href="{{ url('login') }}" class="os-btn w-100 cursor btn" previewlistener="true"
                                    fdprocessedid="ot736s">Cancel</a>
                                <button class="btn os-btn os-btn-black w-100" previewlistener="true">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@php
    unset($_SESSION['errors']);
@endphp
