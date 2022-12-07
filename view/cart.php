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
<div class="container mb">
    <div class="boxtrai mr">
        <div class="mb ">
        <h3 class="boxtitle text-center mt-4 mb-3" style="color:red">Sản phẩm bạn đã chọn</h3>
        <div class="boxcontent cart px-2 ">
                <table class="table table-striped table-striped-columns table-hover table-bordered">
                  <?php
                    viewCart(1);
                  ?>                   
                </table>
        </div>
        </div>
            
        <div class="mb bill text-center">
        <?php 
                            if(isset($_SESSION['user'])){
                        ?>
                            <a class="mr" href="index.php?act=bill">
                            <input type="button" class="btn btn-success" value="TIẾP TỤC ĐẶT HÀNG">
                            </a>
                            <a href="index.php?act=deleteCart">
                                <input type="button" class="btn btn-success" value="XÓA GIỎ HÀNG">
                            </a>
                        </form>      
                        <?php
                            }else{ 
                        ?>
                            <h1 style="color: red; text-align: center;">Vui lòng đăng nhập để tiếp tục đặt hàng!</h1>         
                        <?php } ?>          
        </div>
    </div>
    
</div>