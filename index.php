<?php 
include "model/pdo.php";
include "global.php";
include "view/header.php";
if((isset($_GET['act'])) && ($_GET['act']!="")){
    $act =$_GET['act'];
    switch ($act){
        case 'dangky':
            break;
        case 'dangnhap':
            break;
        case 'gopy':
            include "view/gopy.php";
            break;
        case 'hoidap':
            include "view/hoidap.php";
            break;
            
        default:
            include "view/home.php";
            break;
    }
}
else{
    include "../view/home.php";
}
include "../view/footer.php";
?>