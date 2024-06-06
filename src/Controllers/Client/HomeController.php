<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\Cart;
use Hi\PhpOop\Models\CartDetail;
use Hi\PhpOop\Models\Product;

class HomeController extends Controller
{

    private Product $products;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {

        $this->products = new Product();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
    }

    public function index()
    {
        $productTreding = $this->products->getTreding();
        // Helper::dd($productTreding);
        $this->viewClient('home', compact('productTreding'));
    }

    public function contact()
    {
        $this->viewClient('contact');
    }

    public function sanPham()
    {
        $data = $this->products->getAll();
        // Helper::dd($data);
        $this->viewClient('sanpham', compact('data'));
    }

    public function chiTiet($id)
    {
        $data = $this->products->findById($id);
        // Helper::dd($data);
        $this->viewClient('chi-tiet', compact('data'));
    }

    public function cart()
    {
        $this->viewClient('cart');
    }

    public function addCart()
    {
    }

    public function quantityInc()
    {
    }

    public function quantityDec()
    {
    }

    public function remove()
    {
    }
}
