<div class="row">

    <h1>THÊM MỚI LOẠI HÀNG</h1>

    <div class="form">
        <form action="index.php?act=add-categorys" method="post">
            <label for="">Tên loại</label>
            <input type="text" name="category_name">
            <div class="button">
                <input type="submit" name="themmoi" value="Thêm Mới">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=list-categorys">Danh Sách</a>
            </div>
        </form>
    </div>
    
    <?php
    if(isset($thongbao) &&($thongbao != "")){
        echo $thongbao;
    } 
    ?>

</div>