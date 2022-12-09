<?php 
    if(isset($_GET['id'])) $id=$_GET['id']; else $id=0;
    $id=update_view($id);
?>
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
<div class="container">

  <div class="d-flex my-4">
    <div class="col-md-6 align-middle text-center ">
      <?php $hinhpath = "upload/" ?>
      <img class="" style="height: 370px; margin-top:20px;" src="<?php echo $hinhpath . $product['product_image']  ?>" class="w-100" alt="">

    </div>
    <div class="col-md-6">
      <div class="product-dtl">
        <div class="product-info">
          <div class="product-name-1 fs-2"><?php echo $product['product_name']  ?></div>
        </div>
        <div class="product-price-discount ">Giá: <span class="span-numbers" style="color: red;"><?php echo $product['product_sale']  ?>đ</span><span class="line-through span-numbers"><?php echo $product['product_price']  ?>đ </span></div>
        <div class="product-view">
          <p class=""><i class="fa-solid fa-eye"></i><span> Lượt Xem: <?php echo $product['product_view']  ?></span></p>
        </div>
      </div>
      <div class="container border">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Chi Tiết Sản Phẩm</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="col">Kích Cỡ</th>
              <th><?php echo $product['product_size']  ?></th>
            </tr>
            <tr>
              <th scope="col">Màu Sắc</th>
              <th><?php echo $product['product_color']  ?></th>
            </tr>
            <tr>
              <th scope="col">Kiểu</th>
              <th><?php echo $product['product_type']  ?></th>
            </tr>
            <tr>
              <th scope="col">Cỡ Dây</th>
              <th><?php echo $product['product_wire']  ?></th>
            </tr>
            <tr>
              <th scope="col">Nguồn Gốc</th>
              <th><?php echo $product['product_origin']  ?></th>
            </tr>
            <tr>
              <th scope="col">Bảo hành</th>
              <th><?php echo $product['product_insurance']  ?></th>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="product-count">
        <form action="index.php?act=addtocart" method="POST">
          <input type="text" hidden name="product_id" value="<?php echo $product['product_id']  ?>">
          <input type="text" hidden name="product_name" value="<?php echo $product['product_name']  ?>">
          <input type="text" hidden name="product_image" value="<?php echo $product['product_image']  ?>">
          <input type="number" hidden name="product_price" value="<?php echo $product['product_sale']  ?>">
          <input type="submit" class="btn btn-dark mt-3" style="width:250px ;" name="addtocart" value="Mua ngay"></input>
        </form>


        <!-- <a href="#" class="round-black-btn">Mua Ngay</a> -->
      </div>
    </div>
  </div>

  <div class="product-info-tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">Bình luận (<?php
        $category_id=$_GET['id'];
        $count_cmt=count_comment($category_id);
          foreach ($count_cmt as $tk) {
            extract($tk);
            echo"$count_cmt";}
       ?>)</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">

      <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
        <?php foreach ($comment as $value) {

          if($value['comment_status']==1){
            $query2 = "select * from users where user_id=" . $value['comment_user'];
          $user = pdo_query_one($query2);
          echo "<div class='mb-20'>
          <div class='user-cmt'>
            <div class=''>
            <span class='text'>". $user['user_name']." :</span> 
            <span class='noidung'>" . $value['comment_content']."</span>
            </div>
            <div class='date-cmt'>
            <i class='justify-content-end'>". $value['comment_date'] ."</i>
            </div>
          </div>
        </div>";
          }
        } ?>
        <?php
        if (isset($_SESSION['user'])) {
          echo "<form class='review-form' action='index.php?act=binhluan' method='POST' id='binhluan'>
            <div class='form-group'>
    
            </div>
            <div class='form-group' >
              <label>Bình luận của bạn</label>
              <input type='hidden' value='" . $product['product_id'] . "' name='id_sp'>
              <input type='text' hidden value='1' name='vaitro'>
              <textarea class='form-control' rows='4' name='coment'  ></textarea>
            </div>
            <button class='round-black-btn' id='nut' >Gửi</button>
          </form>";
        } else {
          echo "<div class='btn btn_danger bl-user'>Đăng nhập để được bình luận </div>";
        }
        ?>
      </div>
    </div>

  </div>
</div>
</div>
</form>
</div>
<div class="load container" id="load">      <div class="swiper mySwiper">
    <h3>Sản phẩm cùng loại</h3>
    <div class="collapse" id="collapseExample">
    
      <?php foreach ($spcungloai as $prodcuts) {
        extract($prodcuts);
        $hinhpath = "upload/" . $product_image;
        if (is_file($hinhpath)) {
          $image = "<img src='" . $hinhpath . "' height = '300px'>";
        } 
      ?>
         
        <div class="collapse-product" id="parent-product">
          <img src="" alt="">
          <a href="index.php?act=chitiet&id=<?php echo $product_id ?>"> <?= $image ?></a>
          <div id="item-product">
            <a href="#" class="product-name"><?= $product_name ?></a>
            <div class="body-product">
              <h4 class="price-product span-numbers">Giá: <?= $product_price ?>đ</h4>
              <h4 class="price-sale-product span-numbers">Giá Khuyến Mãi: <span><?= $product_sale ?></span> đ</h4>
            </div>
          </div>
          <form action="index.php?act=addtocart" method="POST">
            <input type="text" hidden name="product_id" value="<?= $product_id ?>">
            <input type="text" hidden name="product_name" value="<?= $product_name ?>">
            <input type="text" hidden name="product_image" value="<?= $product_image ?>">
            <input type="number" hidden name="product_price" value="<?= $product_sale ?>">
            <input type="submit" class="btn btn-dark" style="width:250px ;" name="addtocart" value="Mua ngay"></input>
          </form>
        </div>
        
      <?php } ?>
      
    </div>

        </div>
      </div>
<script>
   
</script>