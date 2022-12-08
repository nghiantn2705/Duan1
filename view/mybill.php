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
<div class="container " >
    <div class="boxtrai mr">
        <div class=" mb">
            <div class="boxtitle text-center mt-4"><h2>ĐƠN HÀNG CỦA BẠN</h2></div>
            <div class=" boxcontent cart">
                <table class="table table-striped table-striped-columns table-hover table-bordered mt-3 text-center"  >
                    <thead>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>SỐ LƯỢNG MẶT HÀNG</th>
                        <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //ktra mangr listbill
                        if(is_array($listbill)){
                            foreach ($listbill as $bill) {
                                extract($bill);
                                $ttdh = get_ttdh($bill['bill_status']);
                                $countsp = loadall_cart_count($bill['bill_id']);
                                echo '  
                                  
                                   <tr>
                                   <td>WolfWatch'.$bill['bill_id'].'</td>
                                   <td>'.$countsp.'</td>
                                   <td class="span-numbers">'.$bill['bill_total'].' đ</td>
                                   <td>'.$ttdh.'</td>
                                    </tr>
                                   
                                ';
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




