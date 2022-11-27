<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <form action="" method="post">
            <div class="row mb10 frmdsloai">
                <table border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI
                            <th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <a href="<?= $updatedm ?>"><input type="button" value="Sửa"></a>
                                    <a href="<?= $deletedm ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><input type="button" value="Xóa"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="row mb10">
                <input type="button" value="Chọn tất cả">
                <input type="button" value="Bỏ chọn tất cả">
                <input type="button" value="Xóa các mục tất tả">
                <a href="index.php?act=add-categorys"><input type="button" value="Thêm mới"></a>
            </div>
        </form>
    </div>
</div>