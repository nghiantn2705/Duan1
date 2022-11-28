<form action="index.php?act=dangky" method="POST" enctype="multipart/form-data">
    <label for="">Họ tên</label>
    <?php if(isset($_SESSION['erro-username'])){
       echo " <div id='ms-username'>".$_SESSION['erro-username']."</div>";
    } ?>
    <input type="text" name="username" id="username" required >
    <label for="">Passwword</label>
    <?php if(isset($_SESSION['erro-password'])){
       echo " <div id='ms-username'>".$_SESSION['erro-password']."</div>";
    } ?>
    <input type="password" name="password" id="password" required >
    <label for="">Re-password</label>
    <?php if(isset($_SESSION['erro-repassword'])){
       echo " <div id='ms-username'>".$_SESSION['erro-repassword']."</div>";
    } ?>
    <input type="password" name="re-pass" id="re-password"required>
    <label for="">image</label>
    <input type="file" name="file" id=""required>
    <label for="">Địa chỉ</label>
    <input type="text" name="adr" id="diachi"required>
    <label for="">Số điện thoại</label>
    <input type="phone" name="phone" id="phone"required>
    <label for="">Email</label>
    <input type="email" name="email" id="email"required>
    <input type="hidden" name="vaitro"value="0">
    <button type="submit">Đăng ký</button>
</form>
