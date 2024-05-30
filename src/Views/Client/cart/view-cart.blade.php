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
                            <table class="table">
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
                                    <tr>
                                        <td class="product-thumbnail"><a href="product-details.html"
                                                previewlistener="true"><img src="assets/img/shop/product/product-2.jpg"
                                                    alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html" previewlistener="true">Bakix
                                                Furniture</a></td>
                                        <td class="product-price"><span class="amount">$130.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus"><input type="text" value="1"
                                                    fdprocessedid="a56y6d">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                        <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail"><a href="product-details.html"
                                                previewlistener="true"><img src="assets/img/shop/product/product-4.jpg"
                                                    alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html" previewlistener="true">Sujon
                                                Chair Set</a></td>
                                        <td class="product-price"><span class="amount">$120.50</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus"><input type="text" value="1"
                                                    fdprocessedid="cbpl9g">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$120.50</span></td>
                                        <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
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
                                        <li>Subtotal <span>$250.00</span></li>
                                        <li>Total <span>$250.00</span></li>
                                    </ul>
                                    <a class="os-btn" href="{{ $_ENV['BASE_URL'] }}/check-out"
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
