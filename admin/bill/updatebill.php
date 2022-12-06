<?php 
    if(is_array($update_bill)){
        extract($update_bill);
    }
?>
<div class="">
                <div class="text-center frmtitle my-3">
                    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
                </div>
                <div class="text-center frmcontent1">
                <form action="index.php?act=updatebills" method="post" enctype="multipart/form-data">
               
                        <label for="">Tình trạng đơn hàng</label>
                        <input type="text" name="bill_status" value="<?php echo $bill_status;?>">
                        <div class=" d-flex justify-content-center">
                            <input type="hidden" class="btn btn-success " name="bill_id" value="<?=$bill_id?>">
                            <input type="submit" class="btn btn-success " name="capnhat" value="CẬP NHẬT">
                            <input type="reset" class="btn btn-success" value="NHẬP LẠI">
                            <a href="index.php?act=listsp"><input type="button" class="btn btn-success" value="DANH SÁCH"></a>    
                        </div>
                        <?php
                            if(isset($thongbao) &&($thongbao != "")){
                                echo $thongbao;
                            } 
                        ?>
                    </form>
                </div>
        </div>
    </div>