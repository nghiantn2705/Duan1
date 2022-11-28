<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wolf Watch</title>
  <link rel="shortcut icon" type="image/x-icon" href="view/img/logo-icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="view/css/index.css">

</head>

<body>
  <!--Header-->
  <header class="header">
    <div class="header_container">
      <div class="navbar">
        <div class="nav-hotline">
          <div class="nav-locate"><i class="fa-solid fa-location-dot"></i><a href="">hệ thống cửa hàng</a>
          </div>
          <div class="nav-phone"><i class="fa-solid fa-phone"></i><a href="">0862738874</a></div>
        </div>
        <a href="index.php?act=" class="logo"><img src="view/img/logo.png" alt=""></a>
        <ul class="nav-icon">
          <li class="nav-item">
            <form action="" method="post">
              <input type="text">
              <div class="nav-sreach"><i class="fa-solid fa-magnifying-glass"></i></div>
            </form>
          </li>
          <li class="nav-item">
            <i class="fa-solid fa-user" id="nav-item-user"></i>
          </li>
          <li class="nav-item">
            <i class="fa-solid fa-cart-shopping" id="nav-shopping"></i>
          </li>
        </ul>

      </div>
      <ul class="nav-menu">
        <li class="nav-drop">
          <a href="#" id="item-drop">
            <img src="view/img/item/icon-4.png" alt="">
            <span>Apple</span>
          </a>
        </li>
        <li class="nav-drop">
          <a href="#" id="item-drop">
            <img src="view/img/item/icon.png" alt="">
            <span>Đồng Hồ</span>
          </a>

        </li>
        <li class="nav-drop">
          <a href="#" id="item-drop">
            <img src="view/img/item/icon-1.png" alt="">
            <span>Smart Watch</span>
          </a>
        </li>
        <li class="nav-drop">
          <a href="#" id="item-drop">
            <img src="view/img/item/icon-2.png" alt="">
            <span>Phụ Kiện</span>
          </a>
        </li>
        <li class="nav-drop">
          <a href="#" id="item-drop">
            <img src="view/img/item/icon-3.png" alt="">
            <span>Tin Tức</span>
          </a>
        </li>
        <img src="view/img/item/icon-sale.png" alt="">
      </ul>
     
      <div class="login-user">
      
       <?php if(isset($_SESSION['user'])){
        echo" <h4>Xin chào</h4>
        <ul>
        <li><a href='index.php?act=logout'>Đăng xuất</a></li>
        <li><a href='index.php?act=updateUser'>Cập nhật tài khoản</a></li>
        </ul>";
        
       } else{
          echo "<form action='index.php?act=dangnhap' method='POST'>
          <p>Đăng Nhập</p>
          <label for=''>Tên Đăng Nhập</label>
          <input type='text' placeholder='Nhập tài khoản' name='username'>
          <label for=''>Mật khẩu</label>
          <input type='password' placeholder='Nhập mật khẩu' name='password'>
          <div>
            <button type='submit'>Đăng Nhập</button>
            <a href='view/taikhoan/dangky.php'>Đăng ký</a>
          </div>
        </form>
        <div class='login-gg-fb'>
          <a href='#' class='login-gg'>
            <i class='fa-brands fa-google'></i>
            <span>Google</span>
          </a>
          <p>Hoặc</p>
          <a href='#' class='login-fb'>
            <i class='fa-brands fa-facebook'></i>
            <span>Facebook</span>
          </a>
        </div>
        ";
        
       }?>
      
       
        
        
        <img id="close" src="view/img/item/close.png" alt="">
      </div>
      <div class="Shopping-cart">
        <div class="title-cart">
          <h3>Giỏ Hàng,<span> <span class="total-product">0</span> sản phẩm</span></h3>
          <hr>
        </div>
          <form action="" method="post" id="cart-form">
            <div class="cart-product-all">
              <!-- <div class="cart-product">
                <img src="./img/image 103 (1).png" alt="...">
                <div id="item-product">
                  <div class="cart-name-product">
                  <p class="">Casio World Time AE1200WHD – Nam – Quartz (Pin) – Mặt Số 45 Mm, Bộ Bấm Giờ, Chống Nước 10
                    ATM</p>
                </div>
                <div class="box-cart">
                  <div class="value-cart">
                    <label for="">Số lượng</label>
                    <div class="value-box">
                      <input type="number" class="value-product" value="1" min="1"  readonly>
                    </div>
                  </div>
                  <div class="all-price-product">
                    <p class="">Giá: <span>12000</span>đ</p>
                  </div>
                  <div class="trash">
                    <i class="fa-solid fa-trash"></i>
                  </div>
                </div>
              </div>
            </div>  -->
            

          </div>
          <div class="all-pay">
            <div class="all-money">
              <span>Tổng Tiền</span>
              <span class="money">0</span>
            </div>
            <div class="btn-pay">
              <button type="submit">Thanh Toán</button>
            </div>
          </div>
        </form>
        <img id="close-1" src="view/img/item/close.png" alt="">
      </div>
      <div class="backdrop-shopping">

      </div>
      <div class="backdrop"></div>
    </div>
  </header>