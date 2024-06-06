<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\Cart;
use Hi\PhpOop\Models\CartDetail;
use Hi\PhpOop\Models\Product;

class CartController extends Controller
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
    public function viewCart()
    {
        $this->viewClient('cart.view-cart');
    }

    // public function cart()
    // {
    // }

    // public function addCart()
    // {
    //     // Lấy thông tin sản phẩm theo id
    //     $product = $this->products->findById($_GET['productID']);
    //     // Khởi tạo session giỏ hàng
    //     // Check đagn đăng nhập hay ko
    //     $key = 'cart';
    //     if (isset($_SESSION['user'])) {
    //         $key .= 'cart' . '-' . $_SESSION['user']['id'];
    //     }

    //     if (isset($_SESSION[$key][$product['id']])) {
    //         // Nếu chưa tồn tại thì khởi tạo giỏ hàng với số lượng sản phẩm mới
    //         $_SESSION[$key][$product['id']] = $product + ['quantity' => $_GET['quantity'] ?? 1];
    //     } else {
    //         // Nếu sản phảm tồn tại => lưu với quantity
    //         $_SESSION[$key][$product['id']]['quantity'] += $_GET['quantity'];
    //     }

    //     // Helper::dd($_SESSION[$key]);
    //     // Nếu đăng nhập => lưu vào csdl
    //     if (isset($_SESSION['user'])) {
    //         $con = $this->cart->getConnection();
    //         // $con->beginTransaction();
    //         try {

    //             $cart = $this->cart->findByUserID($_SESSION['user']['id']);

    //             if (empty($cart)) {
    //                 $this->cart->insert([
    //                     'user_id' => $_SESSION['user']['id']
    //                 ]);
    //             }

    //             #

    //             $cardID = $cart['id'] ??  $con->lastInsertId();

    //             $_SESSION['cart_id'] = $cardID;

    //             $this->cartDetail->deleteByCartID($cardID);

    //             foreach ($_SESSION[$key] as $productID => $item) {

    //                 $this->cartDetail->insert([
    //                     'cart_id' => $cardID,
    //                     'product_id' => $productID,
    //                     'quantity' => $item['quantity']
    //                 ]);
    //             }

    //             // $con->commit();
    //         } catch (\Throwable $th) {
    //             // $con->rollBack();
    //         }
    //     }

    //     header('Location: ' . url('cart/detail'));
    //     exit();
    // }

    // public function detail()
    // {
    //     $this->viewClient('cart.detail');
    // }

    // public function quantityInc()
    // {
    //     // Lấy ra dữ loeuej cart_Detaik để đẩm báo tòn tji trong bản ghi

    //     // Thay đổi sesion
    //     $key = 'cart';
    //     if (isset($_SESSION['user'])) {
    //         $key .=  '-' . $_SESSION['user']['id'];
    //     }
    //     $_SESSION[$key][$_GET['productID']]['quantity'] += 1;

    //     // Thay đỗi dữ liệu trong db
    //     if (isset($_SESSION['user'])) {
    //         # code...
    //         $this->cartDetail->updateByProductID($_SESSION['cart_id'], $_GET['productID']);
    //     }
    // }

    // public function quantityDec()
    // {
    //     $key = 'cart';
    //     if (isset($_SESSION['user'])) {
    //         $key .=  '-' . $_SESSION['user']['id'];
    //     }
    //     $_SESSION[$key][$_GET['productID']]['quantity'] += 1;
    // }

    // public function remove()
    // {
    //     $key = 'cart';
    //     if (isset($_SESSION['user'])) {
    //         $key .=  '-' . $_SESSION['user']['id'];
    //     }
    //     unset($_SESSION[$key][$_GET['productID']]);

    //     if (isset($_SESSION['user'])) {
    //         $this->cartDetail->deleteByCartIdProductID($_GET['cartID'], $_GET['productID']);
    //     }

    //     redirect('cart/detail');
    //     exit();
    // }

    public function add()
    {
        // Lấy thông tin sản phẩm 
        $product = $this->products->findById($_GET['productId']);

        // Khởi tạo SESSION['cart']

        $key = 'cart'; // Chưa đăng nhập 
        // Kiểm tra user có đăng nhập không
        if (isset($_SESSION['user'])) {
            $key .=  '-' . $_SESSION['user']['id']; // Đã đăng nhâp
        }

        // Kiểm tra xem sản phẩm đã có chưa
        if (!isset($_SESSION[$key][$product['id']])) {
            $_SESSION[$key][$product['id']] = $product + ['quantity' => $_GET['quantity'] ?? 1];
        } else {
            $_SESSION[$key][$product['id']]['quantity'] += $_GET['quantity'];
        }

        // Helper::dd($_SESSION);
        // Đăng nhập => lưu csdl

        if (isset($_SESSION['user'])) {
            try {
                // $this->cart->getConnection()->beginTransaction();

                $cart = $this->cart->findByUserID($_SESSION['user']['id']);

                if (empty($cart)) {
                    $this->cart->insert([
                        'user_id' => $_SESSION['user']['id']
                    ]);
                }

                $cartID = $cart['id'] ?? $this->cart->getConnection()->lastInsertId();

                $_SESSION['cart_id'] = $cartID;

                $this->cartDetail->deleteByCartID($cartID);

                foreach ($_SESSION[$key] as $productID => $item) {
                    $this->cartDetail->insert([
                        'cart_id' => $cartID,
                        'product_id' => $productID,
                        'quantity' => $item['quantity']
                    ]);
                }

                // $this->cart->getConnection()->commit();
            } catch (\Throwable $th) {
                // $this->cart->getConnection()->rollBack();
            }
        }

        redirect('cart/view-cart');
        exit();
    }

    public function quantityInc()
    {
        // Lấy dữ liệu từ cart_detail

        // Thay đổi trong Session
        $key = 'cart'; // Chưa đăng nhập 
        // Kiểm tra user có đăng nhập không
        if (isset($_SESSION['user'])) {
            $key .=  '-' . $_SESSION['user']['id']; // Đã đăng nhâp
        }

        $_SESSION[$key][$_GET['productId']]['quantity'] += 1;

        // Thay đổi trong DB
        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIdAndProductId(
                $_GET['cartID'],
                $_GET['productId'],
                $_SESSION[$key][$_GET['productId']]['quantity']
            );
        }

        redirect('cart/view-cart');
        exit();
    }

    public function quantityDec()
    {
        // Lấy dữ liệu từ cart_detail

        // Thay đổi trong Session
        $key = 'cart'; // Chưa đăng nhập 
        // Kiểm tra user có đăng nhập không
        if (isset($_SESSION['user'])) {
            $key .=  '-' . $_SESSION['user']['id']; // Đã đăng nhâp
        }

        if ($_SESSION[$key][$_GET['productId']]['quantity'] > 1) {
            $_SESSION[$key][$_GET['productId']]['quantity'] -= 1;
        }

        // Thay đổi trong DB
        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIdAndProductId(
                $_GET['cartID'],
                $_GET['productId'],
                $_SESSION[$key][$_GET['productId']]['quantity']
            );
        }

        redirect('cart/view-cart');
        exit();
    }

    public function remove()
    {
        $key = 'cart'; // Chưa đăng nhập 
        // Kiểm tra user có đăng nhập không
        if (isset($_SESSION['user'])) {
            $key .=  '-' . $_SESSION['user']['id']; // Đã đăng nhâp
        }

        unset($_SESSION[$key][$_GET['productId']]);

        if (isset($_SESSION['user'])) {
            $this->cartDetail->deleteByCartIdAndProductID($_GET['cartID'], $_GET['productId']);
        }

        redirect('cart/view-cart');
        exit();
    }
}
