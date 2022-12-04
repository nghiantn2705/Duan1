<?php
include "../model/pdo.php";

include "../model/categorys.php";
include "../model/product.php";
include "../model/user.php";
include "../model/thongke.php";



include "./header.php";

// Controller

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

            // Quản lí danh mục
        case 'list-categorys':
            $listcategorys = loadall_categorys();
            include "categorys/list.php";
            break;
        case 'add-categorys':
            // Kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $category_name = $_POST['category_name'];
                insert_categorys($category_name);
                $thongbao = "Thêm thành công";
            }
            include "categorys/add.php";
            break;
        case 'updatedm':
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $update_category = loadone_categorys($_GET['category_id']);
            }
            include "categorys/update.php";
            break;
        case 'updatedmuc':
            // Kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $category_name = $_POST['category_name'];
                $category_id = $_POST['category_id'];
                $sql = "update categorys set category_name = '" . $category_name . "' where category_id =" . $category_id;
                pdo_execute($sql);
                $thongbao = "Cập nhật thành công thành công";
            }
            $listcategorys = loadall_categorys();
            include "categorys/list.php";
            break;

        case 'deletedm':
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                delete_categorys($_GET['category_id']);
            }
            $listcategorys = loadall_categorys();
            include "categorys/list.php";
            break;



            // Quản lí sản phẩm
        case 'list-products':
            $listproducts = loadall_product();
            include "product/list.php";
            break;
        default:
            include "../view/home.php";
            break;

        case 'add-products':
            // Kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $product_category = $_POST['product_category'];
                $product_name = $_POST['product_name'];
                $product_image = $_FILES['product_image']["name"];
                $product_price = $_POST['product_price'];
                $product_sale = $_POST['product_sale'];
                $product_size = $_POST['product_size'];
                $product_color = $_POST['product_color'];
                $product_type = $_POST['product_type'];
                $product_wire = $_POST['product_wire'];
                $product_origin = $_POST['product_origin'];
                $product_insurance = $_POST['product_insurance'];

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['product_image']["name"]);
                if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                } else {
                }

                insert_products($product_name, $product_image, $product_price, $product_sale, $product_size, $product_color, $product_type, $product_wire, $product_origin, $product_insurance, $product_category);
                $thongbao = "Thêm thành công";
            }
            $listcategorys = loadall_categorys();
            include "product/add.php";
            break;
        case 'deletesp':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                delete_products($_GET['product_id']);
            }
            $listproducts = loadall_product();
            include "product/list.php";
            break;
        case 'updatesp':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $update_product = loadone_product($_GET['product_id']);
            }
            include "product/update.php";
            break;

        case 'updatespham':

            // Kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {

                $product_category = $_POST['product_category'];
                $product_name = $_POST['product_name'];
                $product_image = $_FILES['product_image'];
                $product_price = $_POST['product_price'];
                $product_sale = $_POST['product_sale'];
                $product_size = $_POST['product_size'];
                $product_color = $_POST['product_color'];
                $product_type = $_POST['product_type'];
                $product_wire = $_POST['product_wire'];
                $product_origin = $_POST['product_origin'];
                $product_insurance = $_POST['product_insurance'];
                $product_image = $_FILES['product_image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
                $product_id = $_POST['product_id'];
                update_product($product_id, $product_category, $product_name, $product_image, $product_price, $product_sale, $product_size, $product_color, $product_type, $product_wire, $product_origin, $product_insurance);
                $thongbao = "Cập nhật thành công thành công";
            }
            $listcategorys = loadall_categorys();
            $listproducts = loadall_product();
            include "product/list.php";
            break;
          

            // Quản lí khách hàng
        case 'list-users':
            $listusers = loadall_users();
            include "user/list.php";
            break;
        
            case 'update_users':
                if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                    $update_users = loadone_users($_GET['user_id']);
                }
                include "user/update.php";
                break;
    
            case 'update_user':
    
                // Kiểm tra xem người dùng có click vào nút add hay không
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
    
                    $user_name = $_POST['user_name'];
                    $user_password = $_POST['user_password'];
                    $user_image = $_FILES['user_image']['name'];
                    $user_lastname = $_POST['user_lastname'];
                    $user_address = $_POST['user_address'];
                    $user_phone = $_POST['user_phone'];
                    $user_email = $_POST['user_email'];
                    // $product_type = $_POST['product_type'];
                    // $product_wire = $_POST['product_wire'];
                    // $product_origin = $_POST['product_origin'];
                    // $product_insurance = $_POST['product_insurance'];
                    // $product_image = $_FILES['product_image']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["user_image"]["name"]);
                    $user_id = $_POST['user_id'];
                     update_users($user_id,$user_name,$user_password,$user_image,$user_lastname,$user_address,$user_phone,$user_email);
                    $thongbao = "Cập nhật thành công thành công";
                }
                $listusers = loadall_users();
                include "user/list.php";
                break;

        case 'delete_users':
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                delete_users($_GET['user_id']);
            }
            $listusers = loadall_users();
            include "user/list.php";
            break;


        // Thống kê 
        case 'thongke':
            $listtk = loadall_tk();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listtk = loadall_tk();
            include "thongke/bieudo.php";
    }
} else {
    include "./home.php";
}

include "./footer.php";
