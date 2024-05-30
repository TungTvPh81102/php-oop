@extends('layouts.master')

@section('title')
    Create Category
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
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="productname">Category name:</label>
                                            <input name="name" id="productname" type="text" class="form-control mb-3"
                                                placeholder="Enter a category name..." value=""
                                                fdprocessedid="15ftra">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-select">Status:</label>
                                            <select name="status" class="form-select mb-3" fdprocessedid="m0ti7f">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
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
                                    <a class="btn btn-info" href="{{ $_ENV['BASE_URL_ADMIN'] }}/categories"
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
