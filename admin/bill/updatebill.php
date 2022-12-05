
<div class="row">
                <div class="row frmtitle">
                    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
                </div>
                <div class="row frmcontent">
                <form action="index.php?act=updatebill" method="post" enctype="multipart/form-data">
               
                        <label for="">tình trạng đơn hàng</label>
                        <select name="bill_status" id="">
                                <?php 
                                    foreach($listbill as $bill){
                                        extract($bill);   
                                        echo '<option value="'.$bill_id.'">'.get_ttdh($bill["bill_status"]).'</option>';
                                    }
                                ?>                               
                            </select>
                        <div class="row mb10">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" name="capnhat" value="CẬP NHẬT">
                            <input type="reset" value="NHẬP LẠI">
                            <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>    
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