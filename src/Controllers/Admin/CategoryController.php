<?php

namespace Hi\PhpOop\Controllers\Admin;

use Hi\PhpOop\Commons\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $title = 'List Categories';
        $this->viewAdmin('categories.index', ['title' => $title]);
    }

    public function create()
    {
        $title = 'Create Category';
        $this->viewAdmin('categories.create', ['title' => $title]);
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
