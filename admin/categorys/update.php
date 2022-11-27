<?php
if (is_array($update_category)) {
    extract($update_category);
}
?>
<div class="row">

    <h1>Cập Nhật Loại Hàng </h1>

    <div class="form">
        <form action="index.php?act=updatedmuc" method="post">

            <input type="hidden" name="category_id" value="<?php if (isset($category_id) && ($category_id > 0)) echo $category_id; ?>">

            <label for="">Tên loại</label>
            <input type="text" name="category_name" value="<?php if (isset($category_name) && ($category_name != "")) echo $category_name; ?>">




            <div class="button">
                <input type="submit" name="capnhat" value="Cập Nhật">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=list-categorys">Danh Sách</a>
            </div>
        </form>
    </div>

    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>

</div>