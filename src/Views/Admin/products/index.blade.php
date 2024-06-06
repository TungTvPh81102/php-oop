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
                            <a class="btn btn-primary" href="{{ url('admin/products/create') }}"
                                previewlistener="true">Create</a>
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
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($products as $item)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $item['sku'] }}</td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>
                                                <img width="100" src="{{ asset($item['thumbnail']) }}" alt="">
                                            </td>
                                            <td>{{ $item['c_name'] }}</td>
                                            <td>
                                                @switch($item['status'])
                                                    @case('draft')
                                                        {!! '<span class="btn btn-warning btn-sm waves-effect waves-light">Bảo mật</span>' !!}
                                                    @break

                                                    @case('pending')
                                                        {!! '<span class="btn btn-danger btn-sm waves-effect waves-light">Chờ duyệt</span>' !!}
                                                    @break

                                                    @case('publish')
                                                        {!! '<span class="btn btn-success btn-sm waves-effect waves-light">Đã xuất bản</span>' !!}
                                                    @break

                                                    @default
                                                        {!! '<span class="btn btn-secondary btn-sm waves-effect waves-light">Không xác định</span>' !!}
                                                @endswitch
                                            </td>

                                            <td>{{ $item['created_at'] ?? 'Chưa có dữ liệu' }}</td>
                                            <td>{{ $item['updated_at'] ?? 'Chưa có dữ liệu' }} </td>
                                            <td class="">
                                                <a href="{{ url('admin/products/' . $item['id'] . '/show') }}"
                                                    class="btn btn-info " previewlistener="true">
                                                    Chi tiết
                                                </a>
                                                <a href="{{ url('admin/products/' . $item['id'] . '/edit') }}"
                                                    class="btn btn-warning " previewlistener="true">
                                                    Sửa
                                                </a>
                                                <form action="{{ url("admin/products/{$item['id']}/destroy") }}"
                                                    method="POST">
                                                    <button class="btn btn-danger mt-2"
                                                        onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</button>
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
