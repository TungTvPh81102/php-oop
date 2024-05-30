@extends('layouts.master')

@section('title')
    Create Product
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
                                <div class="card">
                                    <div
                                        class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                                        <h6 class="m-0 font-weight-bold">Product information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="form-select">Category name:</label>
                                                    <select name="category_id" class="form-select mb-3"
                                                        fdprocessedid="m0ti7f">
                                                        <option value="">--- Choose category name ---</option>
                                                        <option value="1">Active</option>
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="form-select">Brand name:</label>
                                                    <select name="brand_id" class="form-select mb-3" fdprocessedid="m0ti7f">
                                                        <option value="">--- Choose brand name ---</option>
                                                        <option value="1">Active</option>
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">SKU:</label>
                                                    <input name="sku" id="sku" type="text"
                                                        class="form-control mb-3" placeholder="Enter a sku..."
                                                        value="" fdprocessedid="15ftra">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">Name:</label>
                                                    <input name="name" id="name" type="text"
                                                        class="form-control mb-3" placeholder="Enter a name..."
                                                        value="" fdprocessedid="15ftra">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">Price:</label>
                                                    <input name="price_regular" id="price_regular" type="number"
                                                        class="form-control mb-3" placeholder="Enter a price regular..."
                                                        value="" fdprocessedid="15ftra">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">Discount:</label>
                                                    <input name="discount" id="discount" type="number"
                                                        class="form-control mb-3" placeholder="Enter a discount..."
                                                        value="" fdprocessedid="15ftra">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">Thumbnail:</label>
                                                    <input name="img_thumbnail" id="img_thumbnail" type="file"
                                                        class="form-control mb-3" value="" fdprocessedid="15ftra">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">Gallery:</label>
                                                    <input multiple name="gallery[]" id="gallery" type="file"
                                                        class="form-control mb-3" value="" fdprocessedid="15ftra">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">Over view:</label>
                                                    <textarea placeholder="Enter a over view..." class="form-control" name="over_view" id="" cols="30"
                                                        rows="4"></textarea>
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productname">Content:</label>
                                                    <textarea placeholder="Enter a content..." class="form-control" name="content" id="" cols="30"
                                                        rows="4"></textarea>
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="form-select">Status:</label>
                                                    <select name="status" class="form-select mb-3"
                                                        fdprocessedid="m0ti7f">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div
                                        class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                                        <h6 class="m-0 font-weight-bold">Colors and Sizes</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <table id="product_attributes"
                                                class="table table-bordered dt-responsive  nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Kích cỡ</th>
                                                        <th>Màu sắc</th>
                                                        <th>Số lượng</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" name="size_id[]" id="size_id"
                                                                fdprocessedid="amsogg">

                                                                <option value="8">XL</option>


                                                                <option value="7">L</option>


                                                                <option value="6">M</option>


                                                                <option value="5">S</option>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="color_id[]" id="color_id"
                                                                fdprocessedid="asd12b">
                                                                <option value="14">Màu blue </option>
                                                                <option value="13">Màu hồng phấn </option>
                                                                <option value="12">Màu drank jean </option>
                                                                <option value="11">Màu cream </option>
                                                                <option value="9">Màu đỏ </option>
                                                                <option value="6">Màu trắng </option>
                                                                <option value="5">Màu đen </option>
                                                                <option value="4">Màu xanh lá </option>
                                                                <option value="3">Màu vàng </option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input min="1" type="number" name="quantity[]"
                                                                placeholder="Nhập số lượng" class="form-control"
                                                                fdprocessedid="arh9cj">
                                                        </td>
                                                        <td>
                                                            <div onclick="addRow()" class="btn btn-info"
                                                                id="payment-button-amount">Add More</div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
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
                                    <a class="btn btn-info" href="{{ $_ENV['BASE_URL_ADMIN'] }}/products"
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
