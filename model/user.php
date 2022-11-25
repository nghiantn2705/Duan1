<?php
function select(){
    $sql="select * from users";
    $user = pdo_query($sql);
    return $user;
}
function adduser($username,$password,$email,$sdt,$image,$diachi,$vaitro,$dan){
    $query="insert into users(user_name,user_password,user_image,user_address,user_phone,user_email,user_vaitro) values ('$username','$password','../view/img/$image','$diachi','$sdt','$email',$vaitro)";
    move_uploaded_file($dan,'view/img/'.$image);
    pdo_execute($query);
}
?>