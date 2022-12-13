<ul class="nav-menu">
  <?php 
  foreach ($dsdm as $dm) {
    extract($dm);
                                    
    $linkdm = "index.php?act=sanpham&category_id=".$category_id; 
                                    
    echo '
    <li class="nav-drop"><a href="'.$linkdm.'" id="item-drop">'.$category_name.'</a></li>
    ';
    }
    ?>
  <img src="view/img/item/icon-sale.png" alt="">
</ul>
<div class='user-profile container mt-3'>
  <div class='user-profile-menu '>
    <div class="mt-5">
    <h2 class='text-center'>Xin chào,<span class='ms-2 text-capitalize'><?php  $_SESSION['users']['user_name'] ?> </span></h2>
      <li><a href='index.php?act=mybill' type='submit'>Đơn hàng của tôi</a></li>
      <li><a href='index.php?act=updateUser' type='submit' id='btn-cn'>Cập nhập tài khoản</a></li>
      <li><a href='index.php?act=logout' type='submit'>Đăng xuất</a></li>
    </div>
  </div>
  <div class='flex-grow-1 px-5'>
    <h1 class="text-center mt-1">Cập nhập tài khoản</h1>
    <hr>
    <div class='container mt-4 mb-3 border-start border-dark'>
             <div class='tab-content container d-flex justify-content-center'>
                <div class='tab-pane form-users' id='pills-login' role='tabpanel' aria-labelledby='tab-login'>
                    <form action='index.php?act=updateUser' method='POST' enctype="multipart/form-data">
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginName'>Tên đăng nhập</label>
                        <input type="text" name="username" id="username" value="<?php echo $_SESSION['user'] ?>"class='form-control' />
                        </div>
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginPassword'>Mật khẩu</label>
                        <input type="password" name="password" id="password" value="<?php echo $_SESSION['pass'] ?>" class='form-control' />
                        </div>
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginPassword'>Mật khẩu</label>
                        <input type="password" name="re-password" id="password" value="<?php echo $_SESSION['pass'] ?>" class='form-control' />
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Ảnh</label>
                            <input type="text" hidden value="<?php echo $_SESSION['anh'] ?>" name="anhcu" >
                            <input class='form-control' type="file" name="file" id="">
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Địa chỉ</label>
                            <input class='form-control' type="text" name="adr" id="diachi"required value="<?php echo $_SESSION['diachi'] ?>" >
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Số điện thoại</label>
                            <input class='form-control' type="phone" name="phone" id="phone"required value="<?php echo $_SESSION['sdt'] ?>" >
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Email</label>
                            <input class='form-control' type="email" name="email" id="email"required value="<?php echo $_SESSION['email'] ?>" >
                        </div>
                        <div class='form-outline mb-4'>
                            <input class='form-control' type="hidden" name="vaitro"value="0">
                        </div>
                       
                        <div class='text-center'>
                        <button type='submit' class='btn btn-primary btn-block mb-4' name="capnhat">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </div>
</div>
</div>
