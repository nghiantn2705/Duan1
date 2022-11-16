<?php 
    include "../model/pdo.php";

    include "../model/categorys.php";
    include "../model/product.php";
    


    include "./header.php";

    // Controller

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){

            // Danh mục
            case 'adddm':
                // Kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                    
                }
                include "categorys/add.php";
                break;
            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "categorys/list.php";
                break;
                case 'xoadm':
                    if(isset($_GET['id']) && ($_GET['id'] >0)){
                        delete_danhmuc($_GET['id']);
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
                    break;
                
                case 'suadm':
                        if(isset($_GET['id']) && ($_GET['id'] >0)){
                            $dm = loadone_danhmuc($_GET['id']);
                        }
                        include "danhmuc/update.php";
                        break;
                case 'updatedm':
                    // Kiểm tra xem người dùng có click vào nút add hay không
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $tenloai=$_POST['tenloai'];
                        $id=$_POST['id'];
                        update_danhmuc($id,$tenloai);
                        $thongbao="Cập nhật thành công thành công";
                        
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
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
?>