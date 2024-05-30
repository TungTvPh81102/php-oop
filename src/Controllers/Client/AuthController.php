<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;

class AuthController extends Controller
{
    public function authLogin()
    {
        $this->viewClient('auth.login');
    }

    public function authRegister()
    {
        $this->viewClient('auth.register');
    }
}
