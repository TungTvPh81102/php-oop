<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ $_ENV['BASE_URL_ADMIN'] }}" class="">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>

                <li class="menu-title" key="t-apps">Apps</li>

                <li>
                    <a href="{{ url('admin/categories') }}" class="waves-effect">
                        <i class="bx bx-menu"></i>
                        <span key="t-ecommerce">Category Management</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ $_ENV['BASE_URL_ADMIN'] }}/brands" class="waves-effect" aria-expanded="false">
                        <i class="bx bx-menu"></i>
                        <span key="t-ecommerce">Brand Management</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="bx bx-menu"></i>
                        <span key="t-ecommerce">Product Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{ url('admin/products') }}" key="t-products" previewlistener="true">List
                                Product</a>
                        </li>
                        {{-- <li><a href="" key="t-product-detail"
                                previewlistener="true">Color</a>
                        </li>
                        <li><a href="http://localhost/da1/admin/?action=sizes-list" key="t-product-detail"
                                previewlistener="true">Size</a>
                        </li>
                        <li><a href="http://localhost/da1/admin/?action=gallerys" key="t-product-detail"
                                previewlistener="true">Thumbnail</a>
                        </li> --}}
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/users') }}" previewlistener="true" aria-expanded="false">
                        <i class="bx bx-user"></i>
                        <span key="t-ecommerce">User management</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/da1/admin/?action=orders-list" previewlistener="true"
                        aria-expanded="false">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/da1/admin/?action=statistical-management" previewlistener="true"
                        aria-expanded="false">
                        <i class="bx bx-line-chart"></i>
                        <span key="t-ecommerce">Statistical management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $_ENV['BASE_URL'] }}" previewlistener="true" aria-expanded="false">
                        <i class="bx bx-left-arrow-alt"></i>
                        <span key="t-ecommerce">Back to home</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
