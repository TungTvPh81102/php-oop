<?php

namespace Hi\PhpOop\Controllers\Admin;

use Hi\PhpOop\Commons\Controller;

use Hi\PhpOop\Commons\Helper;


class DashboardController extends Controller
{
    public function index()
    {

        $this->viewAdmin('dashboard');
    }
}
