<div class="container">
    <div class="frmtitle my-4 text-center">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="">
        <form action="" method="post">
            <div class="mb10 text-center mb-4 ">
                <input type="button" class="btn btn-success" value="Chọn tất cả">
                <input type="button" class="btn btn-success" value="Bỏ chọn tất cả">
                <a href="index.php?act=add-categorys"><input  class="btn btn-success" type="button" value="Thêm mới"></a>
                <input type="button" class="btn btn-success" value="Xóa các mục tất tả">
                
            </div>
            <div class=" mb10 frmdsloai">
                <table class="table table-striped table-striped-columns table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI
                            <th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        foreach ($listcategorys as $categorys) {
                            extract($categorys);
                            $updatedm = "index.php?act=updatedm&category_id=".$category_id;
                            $deletedm = "index.php?act=deletedm&category_id=".$category_id;
                        ?>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?= $category_id ?></td>
                                <td><?= $category_name ?></td>
                                <td>
                                    <a href="<?= $updatedm ?>"><input type="button" class="btn btn-danger" value="Sửa"></a>
                                    <a href="<?= $deletedm ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><input type="button" class="btn btn-danger" value="Xóa"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
        </form>
    </div>
</div>
</div>