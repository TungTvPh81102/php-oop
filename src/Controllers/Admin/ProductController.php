<?php

namespace Hi\PhpOop\Controllers\Admin;

use Hi\PhpOop\Commons\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'List Products';
        return $this->viewAdmin('products.index', compact('title'));
    }

    public function create()
    {
        $title = 'Create Products';
        return $this->viewAdmin('products.create', compact('title'));
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
