<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from wphix.com/template/outstock-prv/outstock/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 23:28:47 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - Outstock</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="public/assets/client/assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/fontAwesome5Pro.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/client/assets/css/style.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->

    <!-- prealoder area start -->
    @include('components.loading')
    <!-- prealoder area end -->

    <!-- header area start -->
    @include('layouts.header')
    <!-- header area end -->

    <!-- scroll up area start -->
    <div class="scroll-up" id="scroll" style="display: none;">
        <a href="javascript:void(0);"><i class="fas fa-level-up-alt"></i></a>
    </div>
    <!-- scroll up area end -->

    <!-- search area start -->
    @include('components.search')
    <!-- search area end -->

    <!-- extra info area start -->
    <section class="extra__info transition-3">
        <div class="extra__info-inner">
            <div class="extra__info-close text-right">
                <a href="javascript:void(0);" class="extra__info-close-btn"><i class="fal fa-times"></i></a>
            </div>
            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu d-block d-lg-none">
                <ul id="mobile-menu-active">
                    <li class="active has-dropdown"><a href="index.html">Home</a>
                        <ul class="submenu transition-3">
                            <li><a href="index.html">Home Style 1</a></li>
                            <li><a href="index-2.html">Home Style 2</a></li>
                            <li><a href="index-3.html">Home Style 3</a></li>
                            <li><a href="index-4.html">Home Style 4</a></li>
                            <li><a href="index-5.html">Home Style 5</a></li>
                            <li><a href="index-6.html">Home Style 6</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu has-dropdown"><a href="shop.html">Shop</a>
                        <ul class="submenu transition-3"
                            data-background="public/assets/client/assets/img/bg/mega-menu-bg.jpg">
                            <li class="has-dropdown">
                                <a href="shop.html">Shop Pages</a>
                                <ul>
                                    <li><a href="shop.html">Standard Shop Page</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li><a href="shop-4-col.html">Shop 4 Column</a></li>
                                    <li><a href="shop-3-col.html">Shop 3 Column</a></li>
                                    <li><a href="shop.html">Shop Page</a></li>
                                    <li><a href="shop.html">Shop Page </a></li>
                                    <li><a href="shop.html">Shop Infinity</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="shop.html">Products Pages</a>
                                <ul>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="product-details.html">Product Page V2</a></li>
                                    <li><a href="product-details.html">Product Page V3</a></li>
                                    <li><a href="product-details.html">Product Page V4</a></li>
                                    <li><a href="product-details.html">Simple Product</a></li>
                                    <li><a href="product-details.html">Variable Product</a></li>
                                    <li><a href="product-details.html">External Product</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="shop.html">Other Shop Pages</a>
                                <ul>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="cart.html">Shopping Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="blog.html">Blog</a>
                        <ul class="submenu transition-3">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                            <li><a href="blog-2-col.html">Blog 2 Column</a></li>
                            <li><a href="blog-2-col-mas.html">BLog 2 Col Masonary</a></li>
                            <li><a href="blog-3-col.html">Blog 3 Column</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="shop.html">Pages</a>
                        <ul class="submenu transition-3">
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="error.html">Error 404</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <!-- side-mobile-menu end -->
        </div>
    </section>
    <div class="body-overlay transition-3"></div>
    <!-- extra info area end -->

    <main>
        @yield('content')
    </main>

    <!-- footer area start -->
    @include('layouts.footer')
    <!-- footer area end -->

    <!-- JS here -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js'"></script>
    <script src="{{ asset('public/assets/client/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/jquery-ui-slider-range.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/assets/client/assets/js/main.js') }}"></script>
</body>

<!-- Mirrored from wphix.com/template/outstock-prv/outstock/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 23:29:10 GMT -->

</html>
