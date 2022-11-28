<?php 
ob_start();
@session_start();
include "model/pdo.php";
include "model/user.php";
include "model/product.php";
include "model/cart.php";
include "global.php";
include "view/header.php";


if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

$listproducts =  loadall_product();
if((isset($_GET['act'])) && ($_GET['act']!="")){
    $act =$_GET['act'];
    switch ($act){
        case "form":
            include "view/taikhoan/dangky.php";
            break;
        case 'dangky':
            session_destroy();
            if(strlen($_POST['username'])>=8){
                if(strlen($_POST['password'])>=8){
                    if($_POST['password']==$_POST['re-pass']){
                        $_SESSION['erro-done']="Đăng ký thành công ";
                        echo "oke";
                }
                else{
                    $_SESSION['erro-repassword']="Re-password không trùng khớp so với passwword ";
                    include "view/taikhoan/dangky.php";
                }
            }else{
                $_SESSION['erro-password']="Password không được ngắn hơn 8 ký tự ";
                include "view/taikhoan/dangky.php";
            }
        }
            else{
                $_SESSION['erro-username']="Username không được ngắn hơn 8 ký tự ";
                include "view/taikhoan/dangky.php";
            }
            // if($_POST['password']==$_POST['re-pass']){
            //  adduser($_POST['username'],$_POST['password'],$_POST['email'],$_POST['phone'],$_FILES['file']['name'],$_POST['adr'],$_POST['vaitro'],$_FILES['file']['tmp_name']);
           
            // echo "<div class='btn btn-success'>Đăng ký tài khoản thành công</div>";
            // include "view/home.php";
            // }else{
            //  echo "<div class='btn btn-danger'>Re-pasword không trùng khớp với password</div>";
            //  include "view/taikhoan/dangky.php";
            // }
            
             
         break;
        case 'dangnhap':
            // session_destroy();
            $username =$_POST['username'];
            $password = $_POST['password'];
            $user = select();
           
            foreach($user as $value){
                if($username==$value['user_name'] && $password==$value['user_password']){
                    $_SESSION['user']=$value['user_name'];
                    $_SESSION['email']=$value['user_email'];
                    $_SESSION['sdt']=$value['user_phone'];
                    $_SESSION['diachi']=$value['user_address'];
                    if($value['user_vaitro']==1){
                       header("location:index.php");
                    }else{
                        include "view/home.php";
                    }
                    $oke="oke";
                }
            }
            if(!isset($oke)){
                $_SESSION['message']="Tai khoan khong ton tai";
                include "view/home.php";
            }
           
        break;
            case 'logout':
                session_destroy();
                header("location:index.php");
                break;
        // case 'thoat':
        //     session_unset();
        //     header('Location: index.php');
        //     break;
        case 'addtocart':
            if(isset($_POST['addtocart'])){
                    $product_id=$_POST['product_id'];
                    $product_name=$_POST['product_name'];
                    $product_image=$_POST['product_image'];
                    $product_price=$_POST['product_price'];
                    $amount = 1;
                    $moneyy = $amount * $product_price;
                    // var_dump($money);
                    // die();
                    $productAdd = [$product_id,$product_name,$product_image,$product_price,$amount,$moneyy];
                    //đẩy mảng con vào mảng cha, mảng cha là session mycart, mảng con là productadd
                    array_push($_SESSION['mycart'],$productAdd);
                    // var_dump($_SESSION['mycart']);
                    // die();
                }
            include "view/cart.php"; 
            break;
        case 'deleteCart':
            if(isset($_GET['idCart'])){
                //mảng xóa, vị trí xóa, xóa bn phần tử
                array_splice($_SESSION['mycart'],$_GET['idCart'],1);
            }else{
                $_SESSION['mycart']=[];
            }
            include "./view/cart.php";
            break;
        case 'bill':
            include "view/bill.php";
            break;
        case 'billcomfirm':
            if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])){
                // if(isset($_SESSION['users'])) {$iduser = $_SESSION['user']['user_id'];}
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_address = $_POST['user_address'];
                $user_phone = $_POST['user_phone'];
                $pttt = $_POST['pttt'];
                $tongdonhang = tongdonhang();
                // Tạo bill
                $idbill=insert_bill($user_name,$user_email,$user_address,$user_phone,$pttt,$tongdonhang);

                // Insert into cart: $session['mycart'] $idbill
                    
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                    print_r($cart[0]);
                } 
                // Xóa session cart
                $_SESSION['cart'] = [];
            }
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
           
            include "view/billconfirm.php";
            break;    
        case "chitiet":
            $id = $_GET['id'];
            $query = "select * from products where product_id=".$id;
            $query1 = "select * from comments where comment_product=".$id;
            $comment=pdo_query($query1);
            // $query2 = "select * from users where user_id=".$comment[0]['comment_user'];
            $product=pdo_query_one($query);
           
            // $user=pdo_query_one($query2);
            var_dump($product);
            foreach($comment as $value){
                
            }
            
            // var_dump($user);

            include "view/productdesc.php";
            break;    
        default:
            include "view/home.php";
            break;
    }
}
else{
    include "view/home.php";
}
include "view/footer.php";
ob_flush();