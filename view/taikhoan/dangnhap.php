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
         
<?php if (isset($_SESSION['user'])) {
          echo " <div class='user-profile px-5 my-5 '>
                    <div  class='user-profile-menu'>
                        <div>
                        <li><a href='index.php?act=mybill' type='submit'>Đơn hàng của tôi</a></li>
                        <li><a href='index.php?act=updateUser' type='submit' id='btn-cn'>Cập nhập tài khoản</a></li>
                        <li><a href='index.php?act=logout' type='submit'>Đăng xuất</a></li>
                        </div>     
                    </div>
                    <div class='flex-grow-1 '>
                    <h2 class='text-center'>Xin chào,<span class='ms-2 text-capitalize'>". $_SESSION['user'] ."</span></h2>
                    <hr>
                    
                    </div>
                </div>";
                
        } else {
          echo "
        <div class='container mt-4 mb-3'>
             <div class='tab-content container d-flex justify-content-center'>
                <div class='tab-pane form-users' id='pills-login' role='tabpanel' aria-labelledby='tab-login'>
                    <form action='index.php?act=dangnhap' method='POST'>
                        <div class='text-center mb-3'>
                        <h1 class=''>Đăng nhập</h1>
                        </div>
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginName'>Tên đăng nhập</label>
                        <input type='text' id='loginName'  name='username' class='form-control' />
                        </div>
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginPassword'>Mật khẩu</label>
                        <input type='password' id='loginPassword' name='password' class='form-control' />
                        </div>
                        <div class='row mb-4'>
                        <div class='col-md-6 d-flex justify-content-center'>
                            <div class='form-check mb-3 mb-md-0'>
                            <input class='form-check-input' type='checkbox' value=' id='loginCheck' checked />
                            <label class='form-check-label' for='loginCheck'> Nhớ mật khẩu </label>
                            </div>
                        </div>
                        <div class='col-md-6 d-flex justify-content-center'>
                            <!-- Simple link -->
                            <a href='index.php?act=forgot'>Quên mật khẩu?</a>
                        </div>
                        </div>
                        <div class='text-center'>
                        <button type='submit' class='btn btn-primary btn-block mb-4'>Đăng Nhập</button>
                        </div>
                        <div class='text-center'>
                        <p>Bạn chưa có tài khoản? <a href='index.php?act=dangky'>Đăng ký</a></p>
                        </div>
                    </form>
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
            </div>
        </div>
        ";}
?>
