<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;

class OrderController extends Controller
{
    public function viewCheckOut()
    {
        $this->viewClient('order.check-out');
    }
}
