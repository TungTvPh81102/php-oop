@extends('layouts.master')
@section('title')
    List Categories
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
                            <a class="btn btn-primary" href="{{ url('admin/categories/create') }}"
                                previewlistener="true">Create</a>
                        </div>
                        <div class="card-body">

                            @if (isset($_SESSION['status']) && $_SESSION['status'] )
                                <div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

                                @php
                                    unset($_SESSION['status']);
                                    unset($_SESSION['msg']);
                                @endphp
                            @endif

                            @if (isset($_SESSION['status']) && !$_SESSION['status'])
                                <div class="alert alert-warning">{{ $_SESSION['msg'] }}</div>

                                @php
                                    unset($_SESSION['status']);
                                    unset($_SESSION['msg']);
                                @endphp
                            @endif

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>
                                                {!! $item['status'] == 'publish'
                                                    ? '<span class="btn btn-success btn-sm waves-effect waves-light">Hoạt động</span>'
                                                    : '<span class="btn btn-warning btn-sm waves-effect waves-light">Bảo mật</span>' !!}

                                            </td>
                                            <td>{{ $item['created_at'] ?? 'Chưa có dữ liệu' }}</td>
                                            <td>{{ $item['updated_at'] ?? 'Chưa có dữ liệu' }} </td>
                                            <td class="d-flex">
                                                <a href="{{ url('admin/categories/' . $item['id'] . '/show') }}"
                                                    class="btn btn-info me-2" previewlistener="true">
                                                    Chi tiết
                                                </a>
                                                <a href="{{ url('admin/categories/' . $item['id'] . '/edit') }}"
                                                    class="btn btn-warning me-2" previewlistener="true">
                                                    Sửa
                                                </a>
                                                <form action="{{ url('admin/categories/' . $item['id'] . '/destroy') }}"
                                                    method="POST">
                                                    <button onclick="return confirm('Bạn có chắc muốn xóa?')"
                                                        class="btn btn-danger">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
@endsection
