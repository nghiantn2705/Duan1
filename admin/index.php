<?php 
include "../model/pdo.php";
include "./header.php";
// Controller
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch($act){
        case 'adddm':
            include "categorys/add.php";
            break;
        case 'listdm':
            include "categorys/list.php";
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