<div class="container">
    <div class="frmtitle my-4 text-center">
        <h1>Thống kê Loại Hàng</h1>
    </div>
    
    <div class="">
        <form action="" method="post">
            <div class="mb10 text-center mb-4 ">
               
                <a href="index.php?act=add-categorys"><input class="btn btn-success" type="button" value="Thêm mới"></a>
                
                
                <input type="text" class="btn btn-success" value="điền đi dm">
                <input type="button" class="btn btn-success" value="Tìm kiếm">


            </div>
            <div class=" mb10 frmdsloai">
                <table class="table table-striped table-striped-columns table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                           
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Số lượng</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá trung bình</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        foreach ($listtk as $tk) {
                            extract($tk);
                            // $updatedm = "index.php?act=updatedm&category_id=".$category_id;
                            // $deletedm = "index.php?act=deletedm&category_id=".$category_id;
                        ?>
                            <tr>
                                
                                <td><?= $category_id ?></td>
                                <td><?= $category_name ?></td>
                                <td><?= $countsp ?></td>
                                <td><?= $maxprice ?></td>
                                <td><?= $minprice ?></td>
                                <td><?= $avgprice ?></td>
                        
                               
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="index.php?act=bieudo"><input  type="button" value="Xem biểu đồ"></a>
            </div>

        </form>
    </div>
</div>
</div>
