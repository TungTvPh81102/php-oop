@extends('layouts.master')

@section('title')
    Create User
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="m-0 font-weight-bold">{{ $title }} : {{ $user['name'] }}</h6>
                        </div>
                        <div class="card-body">

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

                            <form action="{{ url("admin/users/{$user['id']}/update") }}" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="productname">Full name:</label>
                                            <input name="name" id="name" type="text" class="form-control mb-3"
                                                placeholder="Enter a name..." value="{{ $user['name'] }}"
                                                fdprocessedid="15ftra">
                                            <span
                                                class="text-danger">{{ !empty($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : '' }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productname">Email:</label>
                                            <input name="email" id="email" type="email" class="form-control mb-3"
                                                placeholder="Enter a email..." value="{{ $user['email'] }}"
                                                fdprocessedid="15ftra">
                                            <span
                                                class="text-danger">{{ !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productname">Password:</label>
                                            <input name="password" id="password" type="password" class="form-control mb-3"
                                                placeholder="Enter a password..." fdprocessedid="15ftra">
                                            <span
                                                class="text-danger">{{ !empty($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : '' }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="productname">Avatar:</label>
                                            <input name="avatar" id="avatar" type="file" class="form-control mb-3"
                                                value="" fdprocessedid="15ftra">
                                            {!! $user['avatar'] ? '<img src="' . asset($user['avatar']) . '" width="100" height="100">' : '' !!}
                                            <span
                                                class="text-danger">{{ !empty($_SESSION['errors']['avatar']) ? $_SESSION['errors']['avatar'] : '' }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="form-select">Status:</label>
                                            <select name="status" class="form-select mb-3" fdprocessedid="m0ti7f">
                                                <option value="">--- Choose status ---</option>
                                                <option {{ !$user['status'] ? 'selected' : '' }} value="0">
                                                    Không kích hoạt</option>
                                                <option {{ $user['status'] ? 'selected' : '' }} value="1">Kích
                                                    hoạt
                                                </option>
                                            </select>
                                            <span
                                                class="text-danger">{{ !empty($_SESSION['errors']['status']) ? $_SESSION['errors']['status'] : '' }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="form-select">Role:</label>
                                            <select name="type" class="form-select mb-3" fdprocessedid="m0ti7f">
                                                <option value="">--- Choose type ---</option>
                                                <option {{ $user['type'] == $_ENV['TYPE_MEMBER'] ? 'selected' : '' }}
                                                    value="{{ $_ENV['TYPE_MEMBER'] }}">Member</option>
                                                <option {{ $user['type'] == $_ENV['TYPE_ADMIN'] ? 'selected' : '' }}
                                                    value="{{ $_ENV['TYPE_ADMIN'] }}">Admin</option>
                                            </select>
                                            <span
                                                class="text-danger">{{ !empty($_SESSION['errors']['type']) ? $_SESSION['errors']['type'] : '' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"
                                        fdprocessedid="y9s8b">
                                        Update
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect waves-light"
                                        fdprocessedid="u0je1s">Reset</button>
                                    <a class="btn btn-info" href="{{ url('admin/users') }}" previewlistener="true">Back to
                                        list</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
        <!-- container-fluid -->
    </div>
@endsection

@php
    unset($_SESSION['data']);
    unset($_SESSION['errors']);
@endphp
