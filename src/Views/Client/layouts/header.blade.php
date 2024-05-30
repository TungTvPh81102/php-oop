<header>
    <div id="header-sticky" class="header__area grey-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <div class="logo">
                        <a href="{{ $_ENV['BASE_URL'] }}"><img src="public/assets/client/assets/img/logo/logo.png"
                                alt="logo"></a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8">
                    <div class="header__right p-relative d-flex justify-content-between align-items-center">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li class="active ">
                                        <a href="">Home</a>
                                    </li>
                                    <li class="has-dropdown"><a href="shop.html">Shop</a>
                                        <ul class="submenu transition-3">
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="account.html">My Account</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="error.html">Error 404</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="blog.html">Blog</a>
                                    </li>
                                    <li><a href="{{ $_ENV['BASE_URL'] }}/contact">Contact</a></li>
                                    <li><a href="contact.html">About</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu-btn d-lg-none">
                            <a href="javascript:void(0);" class="mobile-menu-toggle"><i class="fas fa-bars"></i></a>
                        </div>
                        <div class="header__action">
                            <ul>
                                <li><a href="#" class="search-toggle"><i class="ion-ios-search-strong"></i>
                                        Search</a></li>
                                <li><a href="javascript:void(0);" class="cart"><i class="ion-bag"></i> Cart
                                        <span>(01)</span></a>
                                    <div class="mini-cart">
                                        <div class="mini-cart-inner">
                                            <ul class="mini-cart-list">
                                                <li>
                                                    <div class="cart-img f-left">
                                                        <a href="product-details.html">
                                                            <img src="public/assets/client/assets/img/shop/product/cart-sm/16.jpg"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="cart-content f-left text-left">
                                                        <h5>
                                                            <a href="product-details.html">Consectetur adi </a>
                                                        </h5>
                                                        <div class="cart-price">
                                                            <span class="ammount">1 <i class="fal fa-times"></i></span>
                                                            <span class="price">$ 400</span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon f-right mt-30">
                                                        <a href="#">
                                                            <i class="fal fa-times"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cart-img f-left">
                                                        <a href="product-details.html">
                                                            <img src="public/assets/client/assets/img/shop/product/cart-sm/17.jpg"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="cart-content f-left text-left">
                                                        <h5>
                                                            <a href="product-details.html">Wooden container Bowl
                                                            </a>
                                                        </h5>
                                                        <div class="cart-price">
                                                            <span class="ammount">1 <i class="fal fa-times"></i></span>
                                                            <span class="price">$ 400</span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon f-right mt-30">
                                                        <a href="#">
                                                            <i class="fal fa-times"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cart-img f-left">
                                                        <a href="product-details.html">
                                                            <img src="public/assets/client/assets/img/shop/product/cart-sm/18.jpg"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="cart-content f-left text-left">
                                                        <h5>
                                                            <a href="product-details.html">Black White Towel </a>
                                                        </h5>
                                                        <div class="cart-price">
                                                            <span class="ammount">1 <i class="fal fa-times"></i></span>
                                                            <span class="price">$ 400</span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon f-right mt-30">
                                                        <a href="#">
                                                            <i class="fal fa-times"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="total-price d-flex justify-content-between mb-30">
                                                <span>Subtotal:</span>
                                                <span>$400.0</span>
                                            </div>
                                            <div class="checkout-link">
                                                <a href="{{ $_ENV['BASE_URL'] }}/view-cart" class="os-btn">view Cart</a>
                                                <a class="os-btn os-btn-black"
                                                    href="{{ $_ENV['BASE_URL'] }}/check-out">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li> <a href="javascript:void(0);"><i class="far fa-bars"></i></a>
                                    <ul class="extra-info">
                                        <li>
                                            <div class="my-account">
                                                <div class="extra-title">
                                                    <h5>My Account</h5>
                                                </div>
                                                <ul>
                                                    <li><a href="{{ $_ENV['BASE_URL'] }}/login">Login</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="register.html">Create Account</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
