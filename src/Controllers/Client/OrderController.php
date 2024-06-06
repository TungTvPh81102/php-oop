<?php

namespace Hi\PhpOop\Controllers\Client;

use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\Cart;
use Hi\PhpOop\Models\CartDetail;
use Hi\PhpOop\Models\Order;
use Hi\PhpOop\Models\OrderDetail;
use Hi\PhpOop\Models\User;

class OrderController extends Controller
{
    public User $user;
    private Cart $cart;
    private CartDetail $cartDetail;
    public Order $order;

    public OrderDetail $orderDetail;

    public function __construct()
    {
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
        $this->user = new User();
    }

    public function viewCheckOut()
    {
        $this->viewClient('order.check-out');
    }

    public function handleCheckOut()
    {
        if (!empty($_POST)) {

            // Chưa đăng nhập => tạo tài khoản cho user
            $userID = $_SESSION['user']['id'] ?? null;

            if (!$userID) {

                $userID = $this->user->insertGetLastId([
                    'name' => $_POST['user_name'],
                    'email' => $_POST['user_email'],
                    'password' => password_hash($_POST['user_email'], PASSWORD_DEFAULT),
                    'type' => 'member',
                    'status' => 0
                ]);
            }

            if ($_POST['payment'] == 1) {
                $data = [
                    'user_id' => $userID,
                    'user_name' => $_POST['user_name'],
                    'user_email' => $_POST['user_email'] ?? null,
                    'user_phone' => $_POST['user_phone'] ?? null,
                    'user_address' => $_POST['user_address'],
                    'note' => $_POST['note'] ?? null,
                    'payment' => $_ENV['PAYMENT_VNPAY'],
                    'status_payment' => 1,
                    'total_money' => $_POST['total_money'],
                ];

                $_SESSION['data_order'] = $data;

                $vnp_TmnCode = "SH7S871O"; //Mã định danh merchant kết nối (Terminal Id)
                $vnp_HashSecret = "FZSLXCHBHGZGLCGSBNNJFWPSYMGEZHJY"; //Secret key
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/wd18407/php-oop/payment-response";

                $vnp_TxnRef = rand(10, 999999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = 'Thanh toán hóa đơn';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $data['total_money'] * 100;
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }

                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }

                header('Location: ' . $vnp_Url);
            } else {
                try {
                    // $this->order->getConnection()->beginTransaction();

                    // Thêm dữ liêu vào order và order-deltails
                    $orderID = $this->order->insertGetLastId([
                        'user_id' => $userID,
                        'user_name' => $_POST['user_name'],
                        'user_email' => $_POST['user_email'] ?? null,
                        'user_phone' => $_POST['user_phone'] ?? null,
                        'user_address' => $_POST['user_address'],
                        'note' => $_POST['note'] ?? null,
                        'payment' => $_ENV['PAYMENT_CASH'],
                        'total_money' => $_POST['total_money'],
                    ]);

                    $key = 'cart'; // Chưa đăng nhập 
                    // Kiểm tra user có đăng nhập không
                    if (isset($_SESSION['user'])) {
                        $key .=  '-' . $_SESSION['user']['id']; // Đã đăng nhâp
                    }

                    foreach ($_SESSION[$key] as $productID => $item) {
                        $this->orderDetail->insert([
                            'order_id' => $orderID,
                            'product_id' => $productID,
                            'quantity' => $item['quantity'],
                            'price_regular' => $item['price_regular'],
                            'price_sale' => $item['discount'],
                        ]);
                    }

                    // Xóa dữ liệu trong cart và cart-detail 
                    if (isset($_SESSION['user'])) {
                        $this->cartDetail->deleteByCartID($_SESSION['cart_id']);
                        $this->cart->destroy($_SESSION['cart_id']);
                    }

                    // Xóa dữ liệu trong session
                    unset($_SESSION[$key]);

                    if (isset($_SESSION['user'])) {
                        unset($_SESSION['cart_id']);
                    }

                    // $this->order->getConnection()->commit();
                    redirect('order-result?status=complete');
                } catch (\Throwable $th) {
                    // $this->order->getConnection()->rollBack();
                    redirect('check-out');
                    exit();
                }
            }
        }
    }

    public function handlePaymentResponse()
    {
        $vnp_HashSecret = "FZSLXCHBHGZGLCGSBNNJFWPSYMGEZHJY"; //Secret key
        $vnp_SecureHash = $_GET['vnp_SecureHash'] ?? null;

        if (isset($_GET['vnp_SecureHash']) && isset($_GET['vnp_TxnRef']) && $_GET['vnp_ResponseCode'] == 0 && (!empty($_GET['vnp_TransactionNo']))) {
            try {

                // $this->order->getConnection()->beginTransaction();

                $key = 'cart'; // Chưa đăng nhập 
                // Kiểm tra user có đăng nhập không
                if (isset($_SESSION['user'])) {
                    $key .=  '-' . $_SESSION['user']['id']; // Đã đăng nhâp
                }

                $orderID = $this->order->insertGetLastId($_SESSION['data_order']);

                foreach ($_SESSION[$key] as $productID => $item) {
                    $this->orderDetail->insert([
                        'order_id' => $orderID,
                        'product_id' => $productID,
                        'quantity' => $item['quantity'],
                        'price_regular' => $item['price_regular'],
                        'price_sale' => $item['discount'],
                    ]);
                }

                // Xóa dữ liệu trong cart và cart-detail 
                if (isset($_SESSION['user'])) {
                    $this->cartDetail->deleteByCartID($_SESSION['cart_id']);
                    $this->cart->destroy($_SESSION['cart_id']);
                }

                // Xóa dữ liệu trong session
                unset($_SESSION[$key]);

                if (isset($_SESSION['user'])) {
                    unset($_SESSION['cart_id']);
                }

                // $this->order->getConnection()->commit();
                redirect('order-result?status=complete');
            } catch (\Throwable $th) {
                // $this->order->getConnection()->rollBack();
                redirect('check-out');
                exit();
            }
        }

        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash === $vnp_SecureHash) {
            redirect('order-success?status=complete');
        } else {
            redirect('order-success?status=failed');
        }
    }

    public function orderResultPage()
    {
        if (!isset($_SESSION['data_order'])) {
            redirect('check-out');
            exit();
        }

        $status = $_GET['status'] ?? null;
        if ($status === 'complete') {
            return $this->viewClient('order.order-success');
        } else {
            return $this->viewClient('order.order-failure');
        }
    }
}
