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
                        <h4 class="mb-sm-0 font-size-18">{{ $title }}: {{ $product->name }}'</h4>
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
                            <table id="" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Key</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $key => $item)
                                        {{-- <tr class="odd">
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


                                        </tr> --}}
                                        <tr>
                                            <td>{{ ucfirst($key) }}</td>
                                            <td>
                                                @switch($key)
                                                    @case('g_image')
                                                        @foreach ($gallerys as $item)
                                                            <img width="100" src="{{ asset($item) }}" alt="">
                                                        @endforeach
                                                    @break

                                                    @case('thumbnail')
                                                        <img width="100" src="{{ asset($item) }}" alt="">
                                                    @break

                                                    @default
                                                        {{ $item ?? 'Chưa có dữ liệu' }}
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <a class="btn btn-secondary" href="{{ url('admin/products') }}">Back to list</a>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
@endsection
