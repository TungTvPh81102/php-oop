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
                            <h6 class="m-0 font-weight-bold">{{ $title }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="productname">Full name:</label>
                                            <input name="full_name" id="full_name" type="text" class="form-control mb-3"
                                                placeholder="Enter a name..." value="" fdprocessedid="15ftra">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productname">Email:</label>
                                            <input name="email" id="email" type="email" class="form-control mb-3"
                                                placeholder="Enter a email..." value="" fdprocessedid="15ftra">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productname">Phone number:</label>
                                            <input name="phone" id="phone" type="number" class="form-control mb-3"
                                                placeholder="Enter a phone..." value="" fdprocessedid="15ftra">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productname">Password:</label>
                                            <input name="password" id="password" type="password" class="form-control mb-3"
                                                placeholder="Enter a password..." value="" fdprocessedid="15ftra">
                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="productname">Avatar:</label>
                                            <input name="avatar" id="avatar" type="file" class="form-control mb-3"
                                                value="" fdprocessedid="15ftra">
                                            <span class="text-danger"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="form-select">Role:</label>
                                            <select name="status" class="form-select mb-3" fdprocessedid="m0ti7f">
                                                <option value="0">Member</option>
                                                <option value="0">Blogger</option>
                                                <option value="1">Admin</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"
                                        fdprocessedid="y9s8b">
                                        Create
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect waves-light"
                                        fdprocessedid="u0je1s">Reset</button>
                                    <a class="btn btn-info" href="{{ $_ENV['BASE_URL_ADMIN'] }}/users"
                                        previewlistener="true">Back to
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