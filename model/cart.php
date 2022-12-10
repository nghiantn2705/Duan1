<?php
// bảng giỏ hàng
function viewCart($del)
{
  global $img_path;
  $tong = 0;
  $i = 0;
  if ($del == 1) {
    $del_th = 'Thao tác';
    $deleteproduct2 = '';
  } else {
    $del_th = '';
    $deleteproduct2 = '';
  }
  echo '
  <thead>
    <tr class="text-center">
      <th scope="col" >Hình</th>
      <th scope="col">Sản Phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Thành tiền</th>
      <th scope="col">' . $del_th . '</th>
    </tr>
  </thead>
                        ';
  foreach ($_SESSION['mycart'] as $cart) {
    $image = $img_path . $cart[2];
    $moneyy = $cart[3] * $cart[4];
    $tong += $moneyy;
    if ($del == 1) {
      $deleteProduct_td = '<a href="index.php?act=deleteCart&idCart=' . $i . '"><input class="btn btn-danger" type="button" value="Delete"></a>';
    } else {
      $deleteProduct_td = '';
    }
    echo '
              <tbody>            
                            <tr class="text-center align-middle" >
                              <td ><img src="' . $image . '" alt="" class="cart-img"></td>
                              <td >' . $cart[1] . '</td>
                              <td class="span-numbers">' . $cart[3] . '</td>
                              <td >' . $cart[4] . '</td>
                              <td class="span-numbers">' . $moneyy . '</td>
                              <td >' . $deleteProduct_td . '</td>
                            </tr>  
                           
                          ';
    $i += 1;
  }
  echo '
                            <tr>
                            <td colspan="4">Tổng tiền đơn hàng</td>
                            <td class="span-numbers text-center" >' . $tong . '</td>
                            </td>
                            <td>' . $deleteproduct2 . '</td>
                          </tr> 
                          </tbody> 
                          ';
}

function bill_chi_tiet($listbill){
  global $img_path;
  $tong = 0;
  $i = 0;
  echo '
  <thead>
    <tr class="text-center">
      <th scope="col" >Hình</th>
      <th scope="col">Sản Phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Thành tiền</th>
    </tr>
  </thead>
                        ';
  foreach ($_SESSION['mycart'] as $cart) {
    $image = $img_path . $cart[2];
    $moneyy = $cart[3] * $cart[4];
    $tong += $moneyy;
    echo '
              <tbody>            
                            <tr class="text-center align-middle" >
                              <td ><img src="' . $image . '" alt="" class="cart-img"></td>
                              <td >' . $cart[1] . '</td>
                              <td class="span-numbers">' . $cart[3] . '</td>
                              <td >' . $cart[4] . '</td>
                              <td class="span-numbers">' . $moneyy . '</td>
               
                            </tr>  
                           
                          ';
    $i += 1;
  }
  echo '
                            <tr>
                            <td colspan="4">Tổng tiền đơn hàng</td>
                            <td class="span-numbers text-center" >' . $tong . '</td>
                            </td>
                          </tr> 
                          </tbody> 
                          ';
}
function tongdonhang(){

  $tong = 0;      
  foreach ($_SESSION['mycart'] as $cart) {
      $ttien = $cart[3] * $cart[4];
      $tong += $ttien;
  }
  return $tong;
}

function insert_bill($iduser,$user_name,$user_email,$user_address,$user_phone,$pttt,$tongdonhang){
  $sql="insert into bill(iduser,bill_name,bill_address,bill_phone,bill_pttt,bill_email,bill_total) values('$iduser','$user_name', '$user_address', '$user_phone','$pttt','$user_email','$tongdonhang')";
  return pdo_execute_return_lastInsertId($sql);
}


function insert_cart($cart_user, $cart_product, $cart_img, $cart_name, $cart_price, $cart_amount, $cart_money, $cart_bill){
  $sql="insert into cart(cart_user,cart_product,cart_img,cart_name,cart_price,cart_amount,cart_money,cart_bill) values('$cart_user','$cart_product','$cart_img','$cart_name','$cart_price','$cart_amount','$cart_money','$cart_bill')";
  return pdo_execute($sql); 
}

function loadone_bill($idbill){
  $sql = "select * from bill where bill_id=".$idbill;
  $bill=pdo_query_one($sql);
  return $bill;
}
function loadall_cart($idbill){
  $sql = "select * from cart where cart_bill =".$idbill;
  $bill=pdo_query($sql);
  return $bill;
}
function loadall_cart_count($idbill){
  $sql = "select * from cart where cart_bill =".$idbill;
  $bill=pdo_query($sql);
  return sizeof($bill);//số  lượng mặt hàng
}

function loadall_bill($iduser){
  $sql = "select * from bill where iduser =".$iduser;
  $listbill=pdo_query($sql);
  return $listbill;
}
////////////////////////////////////////////////////////////////////////
// function loadall_bill($kyw="",$iduser=0){

//   $sql = "select * from bill where 1";
//   if($iduser >0) {
//       $sql.=" and iduser=".$iduser;
//   }
//   if($iduser != "") {
//       $sql.=" and id like '%".$kyw."%'";
//   }
//   $sql.=" order by id";
//   $listbill=pdo_query($sql);
//   return $listbill;
// }

function get_ttdh($n){
  switch ($n) {
      case '0':
          $tt = "Đơn hàng mới";
          break;
      case '1':
          $tt = "Đang xử lý";
          break;
      case '2':
          $tt = "Đang giao hàng";
          break;
      case '3':
          $tt = "Hoàn tất";
          break;
      
      default:
          $tt = "Đơn hàng mới";
          break;
  }
  return $tt;
}

function loadall_thongke(){
  $sql = "select category.category_id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
  $sql.=" from sanpham left join danhmuc on danhmuc.id = sanpham.iddm";
  $sql.=" group by danhmuc.id order by danhmuc.id";
  $listtk=pdo_query($sql);
  return $listtk;
}

function bill_tien_momoQR(){
  $tong = 0;
  foreach ($_SESSION['mycart'] as $cart) {
    $moneyy = $cart[3] * $cart[4];
    $tong += $moneyy;
  }
  echo '
  <div class="momo" style="display:none">
  <table class="table table-striped table-striped-columns table-hover table-bordered">
  <thead class="text-center">
      <tr>
          <td>
          <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="./view/momoQR.php">
          <input hidden type="text" name="amount" value=' . $tong . ' class="form-control"/>
          <input type="submit" class="btn btn-success w-40" value="Thanh toan qua QR code" name="momo">
          </form>
          </td>
          <td><form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="./view/momoATM.php">
          <input hidden type="text" name="amount" value=' . $tong . ' class="form-control"/>
          <input type="submit" class="btn btn-success w-40" value="Thanh toan qua ATM momo" name="momo">
          </form> </td>
      </tr>
  </thead>
</table>
</div>
';
}

  