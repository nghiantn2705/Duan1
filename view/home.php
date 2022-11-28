<!--Banner-->
<div class="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="view/img/banner/banner-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="view/img/banner/banner-3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="view/img/banner/banner-1.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </div>
  <div class="banner-icon">
    <a href=""><img src="view/img/banner/banner-icon.png" alt=""></a>
    <a href=""><img src="view/img/banner/banner-icon-1.png" alt=""></a>
    <a href=""><img src="view/img/banner/banner-icon-2.png" alt=""></a>
    <a href=""><img src="view/img/banner/banner-icon-3.png" alt=""></a>
    <a href=""><img src="view/img/banner/banner-icon-4.png" alt=""></a>
    <a href=""><img src="view/img/banner/banner-icon-5.png" alt=""></a>
  </div>
  <div class="thongbao">
    <?php if(isset($_SESSION['message'])){
      echo $_SESSION['message'];
    } ?>
  </div>
  <!--End Banner-->
  <!--Product-->
    <div class="product">

      <div class="swiper mySwiper1">
        <h3>Sản Phẩm Bán Chạy</h3>
        <div class="swiper-wrapper">
          <?php foreach($listproducts as $prodcuts){
            extract($prodcuts);
            $hinhpath = "upload/" . $product_image;
                            if (is_file($hinhpath)) {
                                $image = "<img src='" . $hinhpath . "' height = '300px'>";
                            } else {
                                $image = "No Photo";
                            }
           ?>
          <a href="index.php?act=chitiet&&id=<?php echo $product_id ?>"><div class="swiper-slide" id="parent-product">
            <img src="" alt="">
          <span><?= $image ?></span>
          <div id="item-product">
            <a href="#" class="product-name"><?= $product_name ?></a>
            <div class="body-product">
              <h4 class="price-product"><?= $product_price ?></h4>
              <h4 class="price-sale-product">Giá Khuyến Mãi: <span><?= $product_sale ?></span> đ</h4>
            </div>
          </div>
          <form action="index.php?act=addtocart" method="POST" >
            <input type="text" hidden name="product_id" value="<?= $product_id ?>">
            <input type="text" hidden name="product_name" value="<?= $product_name ?>">
            <input type="text" hidden name="product_image" value="<?= $product_image ?>">
            <input type="number" hidden name="product_price" value="<?= $product_price ?>">
            <input type="submit" class="product-btn-cart" style="width:250px ;" name="addtocart" value="Mua ngay"></input>
          </form>
        </div></a>
         <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="swiper mySwiper">
        <h3>Sản Phẩm Bán Chạy</h3>
        <div class="swiper-wrapper">
          <?php foreach($listproducts as $prodcuts){
            extract($prodcuts);
            $hinhpath = "upload/" . $product_image;
                            if (is_file($hinhpath)) {
                                $image = "<img src='" . $hinhpath . "' height = '300px'>";
                            } else {
                                $image = "No Photo";
                            }
           ?>
          <a href="index.php?act=chitiet&&id=<?php echo $product_id ?>"><div class="swiper-slide" id="parent-product">
            <img src="" alt="">
          <span><?= $image ?></span>
          <div id="item-product">
            <a href="#" class="product-name"><?= $product_name ?></a>
            <div class="body-product">
              <h4 class="price-product"><?= $product_price ?></h4>
              <h4 class="price-sale-product">Giá Khuyến Mãi: <span><?= $product_sale ?></span> đ</h4>
            </div>
          </div>
          <form action="index.php?act=addtocart" method="POST" >
            <input type="text" hidden name="product_id" value="<?= $product_id ?>">
            <input type="text" hidden name="product_name" value="<?= $product_name ?>">
            <input type="text" hidden name="product_image" value="<?= $product_image ?>">
            <input type="number" hidden name="product_price" value="<?= $product_price ?>">
            <input type="submit" class="product-btn-cart" style="width:250px ;" name="addtocart" value="Mua ngay"></input>
          </form>
        </div></a>
         <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="swiper mySwiper">
        <h3>Sản Phẩm Bán Chạy</h3>
        <div class="swiper-wrapper">
          <?php foreach($listproducts as $prodcuts){
            extract($prodcuts);
            $hinhpath = "upload/" . $product_image;
                            if (is_file($hinhpath)) {
                                $image = "<img src='" . $hinhpath . "' height = '300px'>";
                            } else {
                                $image = "No Photo";
                            }
           ?>
          <a href="index.php?act=chitiet&&id=<?php echo $product_id ?>"><div class="swiper-slide" id="parent-product">
            <img src="" alt="">
          <span><?= $image ?></span>
          <div id="item-product">
            <a href="#" class="product-name"><?= $product_name ?></a>
            <div class="body-product">
              <h4 class="price-product"><?= $product_price ?></h4>
              <h4 class="price-sale-product">Giá Khuyến Mãi: <span><?= $product_sale ?></span> đ</h4>
            </div>
          </div>
          <form action="index.php?act=addtocart" method="POST" >
            <input type="text" hidden name="product_id" value="<?= $product_id ?>">
            <input type="text" hidden name="product_name" value="<?= $product_name ?>">
            <input type="text" hidden name="product_image" value="<?= $product_image ?>">
            <input type="number" hidden name="product_price" value="<?= $product_price ?>">
            <input type="submit" class="product-btn-cart" style="width:250px ;" name="addtocart" value="Mua ngay"></input>
          </form>
        </div></a>
         <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>