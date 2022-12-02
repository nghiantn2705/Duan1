<?php
@session_start();
include "model/pdo.php";
include "model/user.php";
include "model/product.php";
include "model/cart.php";
include "global.php";
include "view/header.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$listproducts =  loadall_product();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {


        case 'dangky':
            if (isset($_POST['dangky'])) {
                if ($_POST['password'] == $_POST['re-pass']) {
                    adduser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_FILES['file']['name'], $_POST['adr'], $_POST['vaitro'], $_FILES['file']['tmp_name']);
                    //  echo $_SESSION['thanhcong']="oke";
                    include "view/home.php";
                } else {
                    
                }
            }
            include "./view/taikhoan/dangky.php";
            break;
        case 'dangnhap':

            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = select();

            foreach ($user as $value) {
                if ($username == $value['user_name'] && $password == $value['user_password']) {
                    $_SESSION['user'] = $value['user_name'];
                    $_SESSION['email'] = $value['user_email'];
                    $_SESSION['sdt'] = $value['user_phone'];
                    $_SESSION['diachi'] = $value['user_address'];
                    if ($value['user_vaitro'] == 1) {
                        unset($_SESSION['message']);

                        include "view/home.php";
                    } else {
                        unset($_SESSION['message']);

                        include "view/home.php";
                    }
                    $oke = "oke";
                }
            }
            if (!isset($oke)) {
                $_SESSION['message'] = "Tai khoan khong ton tai";
                include "view/home.php";
            }

            break;
        case 'logout':
            unset($_SESSION['user']);

            include "view/home.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
        case 'addtocart':
            if (isset($_POST['addtocart'])) {
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $product_image = $_POST['product_image'];
                $product_price = $_POST['product_price'];
                $amount = 1;
                $moneyy = $amount * $product_price;
                // var_dump($money);
                // die();
                $productAdd = [$product_id, $product_name, $product_image, $product_price, $amount, $moneyy];
                //đẩy mảng con vào mảng cha, mảng cha là session mycart, mảng con là productadd
                array_push($_SESSION['mycart'], $productAdd);
                // var_dump($_SESSION['mycart']);
                // die();
            }
            include "view/cart.php";
            break;
        case 'deleteCart':
            if (isset($_GET['idCart'])) {
                //mảng xóa, vị trí xóa, xóa bn phần tử
                array_splice($_SESSION['mycart'], $_GET['idCart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            include "./view/cart.php";
            break;
        case 'bill':
            include "view/bill.php";
            break;
        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                // if(isset($_SESSION['users'])) {$iduser = $_SESSION['user']['user_id'];}
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_address = $_POST['user_address'];
                $user_phone = $_POST['user_phone'];
                $pttt = $_POST['pttt'];
                $tongdonhang = tongdonhang();
                // Tạo bill
                $idbill = insert_bill($user_name, $user_email, $user_address, $user_phone, $pttt, $tongdonhang);
                // var_dump($idbill);die;
                // Insert into cart: $session['mycart'] $idbill

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
                // Xóa session cart
                $_SESSION['cart'] = [];
            }
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);

            include "view/billconfirm.php";
            break;
            case 'mybill':
                $listbill=loadall_bill($_SESSION['user']['user_id']);
                include "view/mybill.php";
                break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
