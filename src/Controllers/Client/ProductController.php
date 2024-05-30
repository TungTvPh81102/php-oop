<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;

class ProductController extends Controller
{
    public function productDetail()
    {
        $this->viewClient('product-detail');
    }
}
