@extends('layouts.master')
@section('title')
    List User
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

                            <table id="" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Key</th>
                                        <th>Value</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($user as $key => $value)
                                        @if ($key == 'password')
                                            @continue
                                        @endif
                                        <tr class="odd">
                                            <td>{{ ucfirst($key) }}</td>
                                            <td>
                                                @switch($key)
                                                    @case('type')
                                                        {!! $value == 'admin'
                                                            ? '<span class="btn btn-success btn-sm waves-effect waves-light">Admin</span>'
                                                            : '<span class="btn btn-info btn-sm waves-effect waves-light">Member</span>' !!}
                                                    @break

                                                    @case('status')
                                                        {!! $value
                                                            ? '<span class="btn btn-success btn-sm waves-effect waves-light">Đã kích hoạt</span>'
                                                            : '<span class="btn btn-warning btn-sm waves-effect waves-light">Chưa kích hoạt</span>' !!}
                                                    @break

                                                    @case('avatar')
                                                        {!! $value
                                                            ? '<img src="' . $value . '" alt="Avatar" class="img-thumbnail" style="width: 100px; height: 100px;">'
                                                            : 'Chưa có dữ liệu' !!}
                                                    @break

                                                    @default
                                                        {{ $value ?? 'Chưa có dữ liệu' }}
                                                @endswitch

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-secondary" href="{{ url('admin/users') }}">Back to list</a>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
@endsection
