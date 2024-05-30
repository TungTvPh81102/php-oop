<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;

class HomeController extends Controller
{

    public function index()
    {

        $this->viewClient('home');
    }

    public function contact()
    {
        $this->viewClient('contact');
    }
}
