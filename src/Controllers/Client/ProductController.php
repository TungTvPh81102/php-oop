<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\Product;

class ProductController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function productDetail($id)
    {
        $product = $this->product->findById($id);

        $gallery = explode(",", $product['g_image']);

        // Helper::dd($gallery);

        $this->viewClient('product-detail', compact('product', 'gallery'));
    }
}
