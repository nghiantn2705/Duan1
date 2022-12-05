<div class="row">
                <div class="row frmtitle mb">
                    <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
                </div>
                <form action="index.php?act=listsp" method="post">
                                <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
                                <input type="submit" name="listok" value="Check">
                </form>
                <div class="row frmcontent">
                    <form action="#" method="post">
                        <div class="row mb10 frmdsloai">

                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>MÃ ĐƠN HÀNG</th>
                                        <th>KHÁCH HÀNG<th>
                                        <th>SỐ LƯỢNG HÀNG<th>
                                        <th>GIÁ TRỊ ĐƠN HÀNG<th>
                                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                                        <!-- <th>NGÀY ĐẶT HÀNG<th> -->
                                        <th>THAO TÁC<th>
                                            
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php
                          foreach($listbill as $bill){
                            extract($bill);
                            $kh=$bill["bill_name"].'<br> '.$bill["bill_email"].'<br> '.$bill["bill_address"].'<br> '.$bill["bill_phone"];
                            $ttdh  = get_ttdh($bill["bill_status"]);
                            $countsp = loadall_cart_count($bill["bill_id"]);
                            $updatebill="index.php?act=updatebill&bill_id=".$bill_id;
                        ?>
                           <tr>
                                            
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><?= $bill_id ?></td>
                                            
                                            <td><?= $kh ?></td>
                                            <td></td>
                                            <td><?= $countsp ?></td>
                                            <td></td>
                                            <td><strong><?= $bill['bill_total'] ?></strong> VND</td>
                                            <td></td>
                                            <td><?= $ttdh ?></td>
                                    
                                           
                                            <td></td>
                                            <td>
                                                <a href="<?=$updatebill ?>"><input type="button" value="Sửa"></a>  
                                               
                                            </td>
                                        </tr>
                        <?php } ?>
                                    <!-- <?php 
                                        foreach($listbill as $bill){
                                            extract($bill);
                                            $kh=$bill["bill_name"].'<br> '.$bill["bill_email"].'<br> '.$bill["bill_address"].'<br> '.$bill["bill_phone"];
                                            $ttdh  = get_ttdh($bill["bill_status"]);
                                            $countsp = loadall_cart_count($bill["bill_id"]);
                                            $updatebill="index.php?act=updatebill&bill_id=".$bill_id;
                                            echo '<tr>
                                            
                                                    <td><input type="checkbox" name="" id=""></td>
                                                    <td>'.$bill['bill_id'].'</td>
                                                    
                                                    <td>'.$kh.'</td>
                                                    <td></td>
                                                    <td>'.$countsp.'</td>
                                                    <td></td>
                                                    <td><strong>'.$bill['bill_total'].'</strong> VND</td>
                                                    <td></td>
                                                    <td>'.$ttdh.'</td>
                                            
                                                   
                                                    <td></td>
                                                    <td>
                                                        <a href="<?=.$updatebill.>"><input type="button" value="Sửa"></a>  
                                                        <a href="<?=$xoabill?>""><input type="button" value="Xóa"></a>   
                                                    </td>
                                                </tr>';
                                         }
                                         ?> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb10">
                            
                            <input type="button" value="Chọn tất cả">
                            <input type="button" value="Bỏ chọn tất cả">
                            <input type="button" value="Xóa các mục tất tả"> 
                        </div>
                    </form> 
                </div>
        </div>