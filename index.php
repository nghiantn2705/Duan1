
<?php
ob_start();
@session_start();

include "model/pdo.php";
include "model/user.php";
include "model/product.php";
include "model/cart.php";
include "global.php";
include "view/header.php";
include "model/categorys.php";
include "model/comment.php";
include "model/PHPMailer/sendMail.php";
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
$dsdm = loadall_categorys();
$listproducts =  loadall_product();
$dstop10 = loadall_sanphamview_top10();
$dstop10sale = loadall_sanphamsale_top10();
$mail = new Mailer();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            // session_destroy();
            if (isset($_POST['username'])) {
                if (strlen($_POST['username']) >= 8) {
                    if (strlen($_POST['password']) >= 8) {
                        if ($_POST['password'] == $_POST['re-pass']) {
                            $_SESSION['erro-done'] = "Đăng ký thành công ";
                            adduser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_FILES['file']['name'], $_POST['adr'], $_POST['vaitro']);
                            echo "<script>
                       alert('Bạn đã đăng ký thành công.');
                    </script>";
                            include "view/home.php";
                        } else {
                            $_SESSION['erro-repassword'] = "Re-password không trùng khớp so với passwword ";
                            include "view/taikhoan/dangky.php";
                        }
                    } else {
                        $_SESSION['erro-password'] = "Password không được ngắn hơn 8 ký tự ";
                        include "view/taikhoan/dangky.php";
                    }
                } else {
                    $_SESSION['erro-username'] = "Username không được ngắn hơn 8 ký tự ";
                    include "view/taikhoan/dangky.php";
                }
            } else {

                include "view/taikhoan/dangky.php";
            }
            break;
        case 'dangnhap':
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user = select();
                $checkuser = checkuser($username, $password);
                if (is_array($checkuser)) {
                    $_SESSION['users'] = $checkuser;
                }
                foreach ($user as $value) {
                    if ($username == $value['user_name'] && $password == $value['user_password']) {
                        $_SESSION['user_id'] = $value['user_id'];
                        $_SESSION['user'] = $value['user_name'];
                        $_SESSION['email'] = $value['user_email'];
                        $_SESSION['sdt'] = $value['user_phone'];
                        $_SESSION['diachi'] = $value['user_address'];
                        $_SESSION['pass'] = $value['user_password'];
                        $_SESSION['anh'] = $value['user_image'];
                        // var_dump($_SESSION['anh']);
                        if ($value['user_vaitro'] == 1) {

                            header('location:admin/index.php');
                        } else {
                            header("location:index.php");
                        }
                        $oke = "oke";
                    }
                }
                if (!isset($oke)) {

                    echo "<script>
                alert('Tài khoản không tồn tại.');
             </script>";
                    include "view/taikhoan/dangnhap.php";
                }
            } else {
                include "view/taikhoan/dangnhap.php";
            }
            break;
        case "updateUser":
            
            if (isset($_POST['capnhat'])) {
                if (strlen($_POST['password']) >= 8) {
                    if ($_POST['password'] == $_POST['re-password']) {
                        if ($_FILES['file']['name'] == "") {
                            $image = $_POST['anhcu'];
                        } else {
                            $image = $_FILES['file']['name'];
                        }
                        update_users($_SESSION['user_id'], $_POST['username'], $_POST['password'], $image, $_POST['adr'], $_POST['phone'], $_POST['email']);
                        $_SESSION['user']=$_POST['username'];
                        $_SESSION['anh']=$image;
                        echo "<script>
                            alert('Cập nhật thành công');
                         </script>";
                        include "view/home.php";
                    } else {
                        //  $_SESSION['erro-repassword']="Re-password không trùng khớp so với passwword ";
                        echo "<script>
                                alert('Re-password không trùng khớp so với passwword ');
                             </script>";
                        include "view/taikhoan/updateUser.php";
                    }
                } else {
                    echo "<script>
                        alert('Password phải có độ dài lớn hơn 8 ký tự');
                     </script>";
                    include "view/taikhoan/updateUser.php";
                }
            } else {

                include "view/taikhoan/updateUser.php";
            }
            break;  
        case 'logout':
            unset($_SESSION['user']);

            header("location:index.php");
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $product_image = $_POST['product_image'];
                $product_price = $_POST['product_price'];
                $amount = 1;
                $moneyy = $amount * $product_price;
                $i = 0;
                $fl = 0;
                // var_dump($money);
                // die();
                //tìm và so sánh
                if (isset($_SESSION['mycart']) && (count($_SESSION['mycart']) > 0)) {
                    foreach ($_SESSION['mycart'] as $sp) {
                        if ($sp[0] == $product_id) {
                            //cập nhật mới số lượng
                            $amount += $sp[4];
                            $fl = 1;
                            //cập nhật mới số lượng vào giỏ hàng
                            $_SESSION['mycart'][$i][4] = $amount;
                            break;
                        }
                        $i++;
                    }
                }
                //    var_dump($_SESSION['mycart']);die;
                //khi số lượng ban đầu ko thay đổi thì thêm mới sp vào giỏ hàng
                if ($fl == 0) {
                    $productAdd = [$product_id, $product_name, $product_image, $product_price, $amount, $moneyy];
                    //đẩy mảng con vào mảng cha, mảng cha là session mycart, mảng con là productadd
                    array_push($_SESSION['mycart'], $productAdd);
                }
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
                if (isset($_SESSION['users'])) {
                    $iduser = $_SESSION['users']['user_id'];
                }
                // var_dump($_SESSION['users']['user_id']);die;
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_address = $_POST['user_address'];
                $user_phone = $_POST['user_phone'];
                $pttt = $_POST['pttt'];
                $tongdonhang = tongdonhang();
                // Tạo bill
                $idbill = insert_bill($iduser, $user_name, $user_email, $user_address, $user_phone, $pttt, $tongdonhang);
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
            $listbill = loadall_bill($_SESSION['users']['user_id']);
            include "view/mybill.php";
            break;
        case "form":
            session_destroy();
            include "view/taikhoan/dangky.php";
            break;
        case "chitiet":
            $id = $_GET['id'];
            $query = "select * from products where product_id=" . $id;
            $loadone = loadone_product($id);
            extract($loadone);
            $spcungloai = load_sanpham_cungloai($id, $product_category);
            $query1 = "select * from comments where comment_product=" . $id;
            $comment = pdo_query($query1);
            // $query2 = "select * from users where user_id=".$comment[0]['comment_user'];
            $product = pdo_query_one($query);
            include "view/productdesc.php";
            break;
        case "binhluan":
            $comment = $_POST['coment'];
            $user = $_SESSION['user_id'];
            $product = $_POST['id_sp'];
            $vaitro = $_POST['vaitro'];
            addComent($comment, $user, $product, $vaitro);
            header('location:index.php?act=chitiet&id=' . $product);
            break;

        case "updateUser":
            $anh = $_SESSION['anh'];
            if (isset($_POST['capnhat'])) {
                if (strlen($_POST['password']) >= 8) {
                    if ($_POST['password'] == $_POST['re-pass']) {
                        if ($_FILES['file']['name'] == "") {
                            $image = $_POST['anhcu'];
                        } else {
                            $image = $_FILES['file']['name'];
                        }
                        update_users($_SESSION['user_id'], $_POST['username'], $_POST['password'], $image, $_POST['adr'], $_POST['phone'], $_POST['email']);
                        echo "<script>
                                    alert('Cập nhật thành công');
                                 </script>";
                        include "view/home.php";
                    } else {
                        //  $_SESSION['erro-repassword']="Re-password không trùng khớp so với passwword ";
                        echo "<script>
                                        alert('Re-password không trùng khớp so với passwword ');
                                     </script>";
                        include "view/home.php";
                    }
                } else {
                    echo "<script>
                                alert('Password phải có độ dài lớn hơn 8 ký tự');
                             </script>";
                    include "view/home.php";
                }
            } else {
                include "view/taikhoan/updateUser.php";
            }
            var_dump($_POST);
            break;
        case 'sanpham':
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $category_id = $_GET['category_id'];
                $dssp = loadall_sanpham();
                $tencategory = load_ten_dm($category_id);

                include "view/product.php";
            } else {
                include "view/home.php";
            }
            break;
        case "forgot":
            if (isset($_POST['send'])) {
                $user = loadall_users();
                $_SESSION = array();
                foreach ($user as $value) {
                    if ($_POST['email'] == $value['user_email']) {
                        $check = "oke";
                        $_SESSION['userPass_id'] = $value['user_id'];
                        $email = $_POST['email'];
                        $code = substr(rand(0, 999999), 0, 6);
                        $title = "Quên mật khẩu";
                        $content = "Mã xác nhận của bạn là : <span>" . $code . "</span>";
                        $mail->sendMail($title, $content, $email);
                        $_SESSION['ma'] = $code;
                        header("location:index.php?act=code");
                    }
                }
                if (!isset($check)) {
                    echo "<script>alert('email của bạn chưa được đăng kí')</script>";
                    include "view/taikhoan/forgot.php";
                }
            } else {
                include "view/taikhoan/forgot.php";
            }
            break;
        case "code":
            include "view/taikhoan/confirm.php";
            break;
        case "confirm":
            // var_dump($_POST['code']);
            if (isset($_POST['xacnhan'])) {
                if ($_SESSION['ma'] == $_POST['code']) {
                    include "view/taikhoan/updatePass.php";
                } else {
                    echo "<script>alert('Mã xác nhận sai!')</script>";
                    include "view/taikhoan/confirm.php";
                }
            } else {
                include "view/taikhoan/confirm.php";
            }
            break;
        case "updatePass":

            if (strlen($_POST['passnew']) >= 8) {
                if ($_POST['passnew'] == $_POST['re-passnew']) {
                    update_pass($_SESSION['userPass_id'], $_POST['passnew']);
                    echo "<script>alert('Thay đổi mật khẩu thành công')</script>";
                    include "view/home.php";
                }
            } else {
                echo "<script>alert('Mật khẩu phải có độ dài lớn hơn 8 ký tự ')</script>";
                include "view/taikhoan/updatePass.php";
            }

            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
ob_flush();
