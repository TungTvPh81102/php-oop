@extends('layouts.master')

@section('title')
    Check out
@endsection

@section('content')
    <section class="coupon-area pt-100 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p>
                                <form action="#">
                                    <p class="form-row-first">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row">
                                        <button class="os-btn os-btn-black" type="submit">Login</button>
                                        <label>
                                            <input type="checkbox">
                                            Remember me
                                        </label>
                                    </p>
                                    <p class="lost-password">
                                        <a href="#">Lost your password?</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input type="text" placeholder="Coupon Code">
                                        <button class="os-btn os-btn-black" type="submit">Apply Coupon</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout-area pb-70">
        <div class="container">
            <form action="{{ url('handle-check-out') }}" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Full name</label>
                                        <input name="user_name" value="{{ $_SESSION['user']['name'] ?? null }}"
                                            type="text" placeholder="" fdprocessedid="9w0q4p">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input name="user_address" value="{{ $_SESSION['user']['address'] ?? null }}"
                                            type="text" placeholder="Street address" fdprocessedid="j37ohl">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input name="user_email" value="{{ $_SESSION['user']['email'] ?? null }}"
                                            type="email" placeholder="" fdprocessedid="jjqi4g">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input name="user_phone" value="{{ $_SESSION['user']['phone'] ?? null }}"
                                            type="text" placeholder="Ex: 0123456789" fdprocessedid="zmr5ld">
                                    </div>
                                </div>
                            </div>
                            <div class="different-address">
                                {{-- <div class="ship-different-title">
                                    <h3>
                                        <label>Ship to a different address?</label>
                                        <input id="ship-box" type="checkbox">
                                    </h3>
                                </div>
                                <div id="ship-box-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="country-select">
                                                <label>Country <span class="required">*</span></label>
                                                <select>
                                                    <option value="volvo">bangladesh</option>
                                                    <option value="saab">Algeria</option>
                                                    <option value="mercedes">Afghanistan</option>
                                                    <option value="audi">Ghana</option>
                                                    <option value="audi2">Albania</option>
                                                    <option value="audi3">Bahrain</option>
                                                    <option value="audi4">Colombia</option>
                                                    <option value="audi5">Dominican Republic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Company Name</label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input type="text" placeholder="Street address">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <input type="text"
                                                    placeholder="Apartment, suite, unit etc. (optional)">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text" placeholder="Town / City">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>State / County <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Postcode / Zip <span class="required">*</span></label>
                                                <input type="text" placeholder="Postcode / Zip">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input type="email" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" placeholder="Postcode / Zip">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Order Notes</label>
                                        <textarea name="note" id="checkout-mess" cols="30" rows="10"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . $_SESSION['user']['id']]))
                                <div class="your-order-table table-responsive">
                                    <table class=" ">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-name">Image</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @php
                                                $cart =
                                                    $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                                                $total = 0;
                                            @endphp

                                            @foreach ($cart as $item)
                                                @php
                                                    $subtotal =
                                                        $item['quantity'] *
                                                        ($item['discount'] ?: $item['price_regular']);
                                                    $total += $subtotal;
                                                @endphp
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $item['name'] }} <strong class="product-quantity"> ×
                                                            {{ $item['quantity'] }}</strong>
                                                    </td>
                                                    <td class="product-name">
                                                        <img width="100px" src="{{ asset($item['thumbnail']) }}"
                                                            alt="">
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{ number_format($subtotal, 0) }}
                                                            đ</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            {{-- <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">$215.00</span></td>
                                            </tr> --}}
                                            <tr class="shipping">
                                                <th>Payments</th>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" name="payment" value="0">
                                                            <label>
                                                                Crash
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" name="payment" value="1">
                                                            <label>Online</label>
                                                        </li>
                                                        <li></li>
                                                    </ul>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">{{ number_format($total, 0) }}
                                                            đ</span></strong>
                                                    <input type="hidden" name="total_money"
                                                        value="{{ $total }}">
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            @endif
                            <div class="payment-method">
                                <div class="order-button-payment mt-20">
                                    <button type="submit" class="os-btn os-btn-black" fdprocessedid="xaujd">Place
                                        order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
