@extends('layouts.master')

@section('title')
    Sản phẩm
@endsection

@section('content')
    <section class="contact__area pb-100 pt-95">
        <div class="container d-flex">

            <div class="card">
                <div class="card-body">
                    @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart - ' . $_SESSION['user']['id']]))
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Gía</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Hình ảnh</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                        </table>
                        <tbody>
                            @php
                                $cart = $_SESSION['cart'] ?? $_SESSION['cart - ' . $_SESSION['user']['id']];
                            @endphp
                            @foreach ($cart as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        <img width="100px" src="{{ asset($item['thumbnail']) }}" alt="">
                                    </td>
                                    <td>
                                        @php
                                            $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                            // Nếu mà nó đăng nhập thì url có thêm cartID
                                            if (isset($_SESSION['cart - ' . $_SESSION['user']['id']])) {
                                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                        @endphp
                                        <a class="btn btn-danger" href="{{ $url }}">Giamr</a>
                                        {{ $item['quantity'] }}
                                        <a class="btn btn-primary" href="{{ url('cart/quantityInc') }}">Tăng</a>
                                    </td>
                                    <td>{{ $item['discount'] ?: $item['price_regular'] }}</td>
                                    <td>
                                        {{ $item['quantity'] * ($item['discount'] ?: $item['price_regular']) }}
                                    </td>
                                    <td>
                                        @php
                                            $url = url('cart/remove') . '?productID=' . $item['id'];

                                            // Nếu mà nó đăng nhập thì url có thêm cartID
                                            if (isset($_SESSION['cart - ' . $_SESSION['user']['id']])) {
                                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                        @endphp
                                        <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')"
                                            href="{{ $url }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endSection
