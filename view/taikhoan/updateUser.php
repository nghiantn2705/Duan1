<div class="capnhat">
    <h1>Cập nhật tài khoản</h1>
<form action="index.php?act=updateUser" method="POST" class="w-50" enctype="multipart/form-data">
<label for="">Họ tên</label>
    
    <input type="text" name="username" id="username" value="<?php echo $_SESSION['user'] ?>" >
    <label for="">Passwword</label>
    
    <input type="password" name="password" id="password" value="<?php echo $_SESSION['pass'] ?>" >
    <label for="">Re-password</label>
    
    <input type="password" name="re-pass" id="re-password" value="<?php echo $_SESSION['pass'] ?>">
    <label for="">image</label>
    
    <input type="file" name="file" id="">
    <label for="">Địa chỉ</label>
    <input type="text" name="adr" id="diachi" value="<?php echo $_SESSION['diachi'] ?>">
    <label for="">Số điện thoại</label>
    <input type="phone" name="phone" id="phone" value="<?php echo $_SESSION['sdt'] ?>">
    <label for="">Email</label>
    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
    <input type="hidden" name="vaitro"value="0">
    <div class="text-center mt-3">
    <button type="submit" name="capnhat"  class="btn btn-danger btn-dk"   >Cập nhật</button>
    </div>
</form>
</div>