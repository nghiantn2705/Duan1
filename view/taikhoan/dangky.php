
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
<div class='container mt-4 mb-3'>
             <div class='tab-content container d-flex justify-content-center'>
                <div class='tab-pane form-users' id='pills-login' role='tabpanel' aria-labelledby='tab-login'>
                <form action="index.php?act=dangky" method="POST"  enctype="multipart/form-data">
                        <div class='text-center mb-3'>
                        <h1 class=''>Đăng ký</h1>
                        </div>
                        <div class='form-outline mb-4'>
                            <label class='form-label' for='loginName'>Tên đăng nhập</label>
                            <?php if(isset($_SESSION['erro-username'])){
                            echo " <div id='ms-username'>".$_SESSION['erro-username']."</div>";
                            } ?>
                            <input class='form-control ' type="text" name="username" id="username" required >
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Mật Khẩu</label>
                            <?php if(isset($_SESSION['erro-password'])){
                            echo " <div id='ms-username'>".$_SESSION['erro-password']."</div>";
                            } ?>
                            <input class='form-control' type="password" name="password" id="password" required >
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Nhập lại mật khẩu</label>
                            <?php if(isset($_SESSION['erro-repassword'])){
                            echo " <div id='ms-username'>".$_SESSION['erro-repassword']."</div>";
                            } ?>
                            <input class='form-control' type="password" name="re-pass" id="re-password"required>
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Ảnh</label>
                            <input class='form-control' type="file" name="file" id=""required>
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Địa chỉ</label>
                            <input class='form-control' type="text" name="adr" id="diachi"required>
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Số điện thoại</label>
                            <input class='form-control' type="phone" name="phone" id="phone"required>
                        </div>
                        <div class='form-outline mb-4'>
                            <label for="" class='form-label'>Email</label>
                            <input class='form-control' type="email" name="email" id="email"required>
                        </div>
                        <div class='form-outline mb-4'>
                            <input class='form-control' type="hidden" name="vaitro"value="0">
                        </div>
                        <div class='text-center'>
                        <button type='submit' class='btn btn-primary btn-block mb-4'>Đăng Ký</button>
                        </div>
                        <div class='text-center'>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                        <i class='fab fa-facebook-f'></i>
                        </button>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                            <i class='fab fa-google'></i>
                        </button>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                            <i class='fab fa-twitter'></i>
                        </button>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                            <i class='fab fa-github'></i>
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>