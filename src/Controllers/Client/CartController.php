<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;

class CartController extends Controller
{

    public function viewCart()
    {
        $this->viewClient('cart.view-cart');
    }
}
