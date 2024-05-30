@extends('layouts.master')
@section('title')
    List Products
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
                            <a class="btn btn-primary" href="{{ $_ENV['BASE_URL_ADMIN'] }}/products/create"
                                previewlistener="true">Create</a>
                        </div>
                        <div class="card-body">
                            <!-- Hiển thị thông báo thành công -->
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="datatable_length"><label>Show <select
                                                    name="datatable_length" aria-controls="datatable"
                                                    class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm"
                                                    fdprocessedid="xx02bd">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="datatable_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="datatable"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                            aria-describedby="datatable_info" style="width: 1183px;">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 36.2px;"
                                                        aria-sort="ascending"
                                                        aria-label="ID: activate to sort column descending">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 172.2px;"
                                                        aria-label="Tên thương hiệu: activate to sort column ascending">Tên
                                                        thương hiệu</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 113.2px;"
                                                        aria-label="Trạng thái: activate to sort column ascending">Trạng
                                                        thái</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 187.2px;"
                                                        aria-label="Ngày tạo: activate to sort column ascending">Ngày tạo
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 187.2px;"
                                                        aria-label="Ngày cập nhật: activate to sort column ascending">Ngày
                                                        cập nhật</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 254.2px;"
                                                        aria-label="Thao tác: activate to sort column ascending">Thao tác
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">1</td>
                                                    <td>Gucci</td>
                                                    <td> <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt
                                                            động</span> </td>
                                                    <td>Chưa có dữ liệu</td>
                                                    <td>2024-03-19 06:02:22 </td>
                                                    <td>
                                                        <a href="http://localhost/da1/admin/?action=brand-detail&amp;id=1"
                                                            class="btn btn-info" previewlistener="true">
                                                            Chi tiết
                                                        </a>
                                                        <a href="http://localhost/da1/admin/?action=brand-update&amp;id=1"
                                                            class="btn btn-warning" previewlistener="true">
                                                            Sửa
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: Gucci không?')"
                                                            href="http://localhost/da1/admin/?action=brand-delete&amp;id=1"
                                                            class="btn btn-danger" previewlistener="true">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="dtr-control sorting_1" tabindex="0">2</td>
                                                    <td>Chanel</td>
                                                    <td> <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt
                                                            động</span> </td>
                                                    <td>Chưa có dữ liệu</td>
                                                    <td>2024-03-19 06:05:17 </td>
                                                    <td>
                                                        <a href="http://localhost/da1/admin/?action=brand-detail&amp;id=2"
                                                            class="btn btn-info" previewlistener="true">
                                                            Chi tiết
                                                        </a>
                                                        <a href="http://localhost/da1/admin/?action=brand-update&amp;id=2"
                                                            class="btn btn-warning" previewlistener="true">
                                                            Sửa
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: Chanel không?')"
                                                            href="http://localhost/da1/admin/?action=brand-delete&amp;id=2"
                                                            class="btn btn-danger" previewlistener="true">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">3</td>
                                                    <td>Burberry</td>
                                                    <td> <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt
                                                            động</span> </td>
                                                    <td>Chưa có dữ liệu</td>
                                                    <td>2024-04-08 04:18:51 </td>
                                                    <td>
                                                        <a href="http://localhost/da1/admin/?action=brand-detail&amp;id=3"
                                                            class="btn btn-info" previewlistener="true">
                                                            Chi tiết
                                                        </a>
                                                        <a href="http://localhost/da1/admin/?action=brand-update&amp;id=3"
                                                            class="btn btn-warning" previewlistener="true">
                                                            Sửa
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: Burberry không?')"
                                                            href="http://localhost/da1/admin/?action=brand-delete&amp;id=3"
                                                            class="btn btn-danger" previewlistener="true">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="dtr-control sorting_1" tabindex="0">4</td>
                                                    <td>Louis Vuitton</td>
                                                    <td> <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt
                                                            động</span> </td>
                                                    <td>Chưa có dữ liệu</td>
                                                    <td>2024-03-19 06:00:31 </td>
                                                    <td>
                                                        <a href="http://localhost/da1/admin/?action=brand-detail&amp;id=4"
                                                            class="btn btn-info" previewlistener="true">
                                                            Chi tiết
                                                        </a>
                                                        <a href="http://localhost/da1/admin/?action=brand-update&amp;id=4"
                                                            class="btn btn-warning" previewlistener="true">
                                                            Sửa
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: Louis Vuitton không?')"
                                                            href="http://localhost/da1/admin/?action=brand-delete&amp;id=4"
                                                            class="btn btn-danger" previewlistener="true">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">6</td>
                                                    <td>The Ciu</td>
                                                    <td> <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt
                                                            động</span> </td>
                                                    <td>2024-03-19 05:43:40</td>
                                                    <td>2024-03-19 06:06:17 </td>
                                                    <td>
                                                        <a href="http://localhost/da1/admin/?action=brand-detail&amp;id=6"
                                                            class="btn btn-info" previewlistener="true">
                                                            Chi tiết
                                                        </a>
                                                        <a href="http://localhost/da1/admin/?action=brand-update&amp;id=6"
                                                            class="btn btn-warning" previewlistener="true">
                                                            Sửa
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: The Ciu không?')"
                                                            href="http://localhost/da1/admin/?action=brand-delete&amp;id=6"
                                                            class="btn btn-danger" previewlistener="true">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="dtr-control sorting_1" tabindex="0">8</td>
                                                    <td>Glowing</td>
                                                    <td> <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt
                                                            động</span> </td>
                                                    <td>2024-04-08 00:18:04</td>
                                                    <td>2024-04-08 04:19:00 </td>
                                                    <td>
                                                        <a href="http://localhost/da1/admin/?action=brand-detail&amp;id=8"
                                                            class="btn btn-info" previewlistener="true">
                                                            Chi tiết
                                                        </a>
                                                        <a href="http://localhost/da1/admin/?action=brand-update&amp;id=8"
                                                            class="btn btn-warning" previewlistener="true">
                                                            Sửa
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: Glowing không?')"
                                                            href="http://localhost/da1/admin/?action=brand-delete&amp;id=8"
                                                            class="btn btn-danger" previewlistener="true">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="datatable_info" role="status"
                                            aria-live="polite">Showing 1 to 6 of 6 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="datatable_previous"><a aria-controls="datatable"
                                                        aria-disabled="true" role="link" data-dt-idx="previous"
                                                        tabindex="-1" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="datatable" role="link" aria-current="page"
                                                        data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="datatable_next"><a
                                                        aria-controls="datatable" aria-disabled="true" role="link"
                                                        data-dt-idx="next" tabindex="-1" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- container-fluid --> <!-- container-fluid -->
    </div>
@endsection