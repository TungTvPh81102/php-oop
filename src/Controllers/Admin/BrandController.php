<?php

namespace Hi\PhpOop\Controllers\Admin;

use Hi\PhpOop\Commons\Controller;

class BrandController extends Controller
{

    public function index()
    {
        $title = 'List Brands';
        $this->viewAdmin('brands.index', ['title' => $title]);
    }

    public function create()
    {
        $title = 'Create Brand';
        $this->viewAdmin('brands.create', ['title' => $title]);
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
