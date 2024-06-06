@extends('layouts.master')

@section('title')
    View Cart
@endsection

@section('content')
    <section class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . $_SESSION['user']['id']]))
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                                            $total = 0;
                                        @endphp
                                        @foreach ($cart as $item)
                                            @php
                                                $subtotal =
                                                    $item['quantity'] * ($item['discount'] ?: $item['price_regular']);
                                                $total += $subtotal;
                                            @endphp
                                            <tr>
                                                <td class="product-thumbnail"><a href="product-details.html"
                                                        previewlistener="true"><img src="{{ asset($item['thumbnail']) }}"
                                                            alt=""></a>
                                                </td>
                                                <td class="product-name"><a href="product-details.html"
                                                        previewlistener="true">{{ $item['name'] }}</a></td>
                                                <td class="product-price"><span
                                                        class="amount">{{ number_format($item['discount'], 0) ?: number_format($item['price_regular'], 0) }}
                                                        đ</span>
                                                </td>
                                                <td class="product-quantity">

                                                    <div class="d-flex">
                                                        <div class="input-group">
                                                            @php
                                                                // Nếu không đăng nhập
                                                                $decUrl =
                                                                    url('cart/quantityDec') .
                                                                    '?productId=' .
                                                                    $item['id'];

                                                                // Nếu đăng nhập
                                                                if (
                                                                    isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                                                ) {
                                                                    $decUrl .= '&cartID=' . $_SESSION['cart_id'];
                                                                }
                                                            @endphp
                                                            <div class="input-group-prepend">
                                                                <a href="{{ $decUrl }}"
                                                                    class="btn btn-outline-secondary dec qtybutton">-</a>
                                                            </div>
                                                            <input class="form-control text-center " type="text"
                                                                value="{{ $item['quantity'] }}" fdprocessedid="a56y6d">
                                                            @php
                                                                // Nếu không đăng nhập
                                                                $incUrl =
                                                                    url('cart/quantityInc') .
                                                                    '?productId=' .
                                                                    $item['id'];

                                                                // Nếu đăng nhập
                                                                if (
                                                                    isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                                                ) {
                                                                    $incUrl .= '&cartID=' . $_SESSION['cart_id'];
                                                                }
                                                            @endphp
                                                            <div class="input-group-append">
                                                                <a href="{{ $incUrl }}"
                                                                    class="btn btn-outline-secondary inc qtybutton">+</a>
                                                            </div>
                                                        </div>
                                                </td>
                                                <td class="product-subtotal"><span
                                                        class="amount">{{ number_format($item['quantity'] * ($item['discount'] ?: $item['price_regular']), 0) }}đ</span>
                                                </td>
                                                <td class="product-remove">
                                                    @php
                                                        // Nếu không đăng nhập
                                                        $url = url('cart/remove') . '?productId=' . $item['id'];

                                                        // Nếu đăng nhập
                                                        if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                                        }

                                                    @endphp
                                                    <a onclick="return confirm('Are you sure?')"
                                                        href="{{ $url }}"><i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Coupon code" type="text" fdprocessedid="cybnz">
                                        <button class="os-btn os-btn-black" name="apply_coupon" type="submit"
                                            fdprocessedid="4jltsr">Apply
                                            coupon</button>
                                    </div>
                                    <div class="coupon2">
                                        <button class="os-btn os-btn-black" name="update_cart" type="submit"
                                            fdprocessedid="as4f34">Update cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        {{-- <li>Subtotal <span>$250.00</span></li> --}}
                                        <li>Total <span>{{ number_format($total, 0) }} đ</span></li>
                                    </ul>
                                    <a class="os-btn" href="{{ url('check-out') }}"
                                        previewlistener="true">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endSection
