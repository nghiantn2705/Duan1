<ul class="nav-menu">
  <?php
  foreach ($dsdm as $dm) {
    extract($dm);

    $linkdm = "index.php?act=sanpham&category_id=" . $category_id;

    echo '
                                        <li class="nav-drop"><a href="' . $linkdm . '" id="item-drop">' . $category_name . '</a></li>
                                    ';
  }
  ?>
  <img src="view/img/item/icon-sale.png" alt="">
</ul>
<div class="swiper mySwiper container">
  <h3 class='mt-3'>Sản Phẩm <?= $tencategory ?> </h3>
  <div class="swiper-wrapper">
    <?php foreach ($dssp as $prodcuts) {
      extract($prodcuts);
      $hinhpath = "upload/" . $product_image;
      if (is_file($hinhpath)) {
        $image = "<img src='" . $hinhpath . "' height = '300px'>";
      } else {
        $image = "No Photo";
      }
    ?>
      <?php if ($_GET['category_id'] == $prodcuts['product_category']) {
        echo "<a href='index.php?act=chitiet&id=" . $product_id . "'>
        <div class='swiper-slide' id='parent-product'>
          <img src='''' alt=''>
          <div> " . $image . " </div>
          <div id='item-product'>
            <a href='#' class='product-name'>" . $product_name . "</a>
            <div class='body-product'>
              <h4 class='price-product mt-2  span-numbers'>Giá: " . $product_price . "</h4>
              <h4 class='price-sale-product span-numbers'>Giá Khuyến Mãi: <span>" . $product_sale . "</span> đ</h4>
            </div>
          </div>
          <form action='index.php?act=addtocart' method='POST'>
            <input type='text' hidden name='product_id' value='" . $product_id . "'>
            <input type='text' hidden name='product_name' value='" . $product_name . "'>
            <input type='text' hidden name='product_image' value='" . $product_image . "'>
            <input type='number' hidden name='product_price' value='" . $product_sale . "'>
            <input type='submit' class='btn btn-dark mt-2' style='width:250px ;' name='addtocart' value='Mua ngay'></input>
          </form>
          
        </div>
        
        </a>";
      } ?>

    <?php } ?>

  </div>
  <div class='swiper-button-next'></div>
          <div class='swiper-button-prev'></div>
    </div>
