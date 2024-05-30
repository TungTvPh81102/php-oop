<?php

namespace Hi\PhpOop\Controllers\Admin;

use Hi\PhpOop\Commons\Controller;

class UserController extends Controller
{
    public function index()
    {
        $title = 'List Users';
        return $this->viewAdmin('users.index', compact('title'));
    }

    public function create()
    {
        $title = 'Create User';
        return $this->viewAdmin('users.create', compact('title'));
    }

    public function store()
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }
}
