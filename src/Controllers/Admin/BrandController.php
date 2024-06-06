<?php

namespace Hi\PhpOop\Controllers\Admin;

use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\Brand;

class BrandController extends Controller
{
    private Brand $brands;

    public function __construct()
    {
        $this->brands = new Brand();
    }

    public function index()
    {
        $title = 'List Brands';

        $brands = $this->brands->getAll();

        // Helper::dd($brands);

        $this->viewAdmin('brands.index', [
            'title' => $title,
            'brands' => $brands,
        ]);
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
