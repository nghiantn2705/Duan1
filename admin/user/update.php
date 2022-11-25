<?php
if(is_array($update_users)){
    extract($update_users);
    $hinhpath = "../upload/" . $user_image;
    if (is_file($hinhpath)) {
        $user_image = "<img src='" . $hinhpath . "' height = '60px'>";
    } else {
        $user_image = "No Photo";
    }
    
}
?>

<form action="index.php?act=update_user" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" name="user_id" value="<?=$user_id?>">
    <label for="">Tên đăng nhập</label> <br>
    <input type="text" name="user_name" value="<?=$user_name?>" > <br>
    <label for="">Passwword</label> <br>
    <input type="password" name="user_password" value="<?=$user_password?>" > <br>
    <label for="">Họ tên</label> <br>
    <input type="text" name="user_lastname" value="<?=$user_lastname?>" > <br>

    <label for="">image</label> <br>
    <input type="file" name="user_image" id="" value="<?=$user_image?>"> <br>
    <label for="">Địa chỉ</label> <br>
    <input type="text" name="user_address" id="" value="<?=$user_address?>"> <br>
    <label for="">Số điện thoại</label> <br>
    <input type="phone" name="user_phone" id="" value="<?=$user_phone?>"> <br>
    <label for="">Email</label> <br>
    <input type="text" name="user_email" id="" value="<?=$user_email?>"> <br>
    <input type="hidden" name="vaitro" id="" value="0">
    <input type="submit" name="capnhat" value="Cập Nhật">
</form>