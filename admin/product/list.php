<div class="container">
    <div class="frmtitle mb text-center">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
   
    <div class="frmcontent">
        <form action="#" method="post" class="align-middle">
            <div class=" mb10 frmdsloai ">

                <table class="table table-striped table-striped-columns table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>a</th>
                            <th>MÃ SP</th>
                            <th>Mã loại</th>
                            <th>TÊN SẢN PHẨM
                            
                            <th>HÌNH ẢNH
                            
                            <th>GIÁ
                            
                            <th>Giảm Giá</th>
                            <th>Size
                            
                            <th>Màu</th>
                            <th>Loại Máy</th>
                            <th>Chống Nước</th>
                            <th>Xuất Xứ</th>
                            <th>Bảo Hành</th>
                            <th>commnet</th>
                            <th>active</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        foreach ($listproducts as $products) {
                            extract($products);
                            $updatesp = "index.php?act=updatesp&product_id=".$product_id;
                            $deletesp = "index.php?act=deletesp&product_id=".$product_id;
                            $hinhpath = "../upload/" . $product_image;
                            if (is_file($hinhpath)) {
                                $image = "<img src='" . $hinhpath . "' height = '60px'>";
                            } else {
                                $image = "No Photo";
                            }
                        ?>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?= $product_id ?></td>
                                <td><?= $product_category ?></td>
                                <td><?= $product_name ?></td>
                                
                                <td><?= $image ?></td>
                                
                                <td><?= $product_price ?></td>
                                
                                <td><?= $product_sale ?></td>
                                <td><?= $product_size ?></td>
                                <td><?= $product_color ?></td>
                                <td><?= $product_type?></td>
                                <td><?= $product_wire ?></td>
                                <td><?= $product_origin ?></td>
                                <td><?= $product_insurance ?></td>
                                <td><?= $product_comment ?></td>

                                <td>
                                    <a href="<?= $updatesp ?>"><input type="button" class="btn btn-danger my-3" value="Sửa"></a>
                                    <a href="<?= $deletesp ?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><input class="btn btn-danger" type="button" value="Xóa"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class=" mb10 text-center">
                <input type="button" class="btn btn-success" value="Chọn tất cả">
                <input type="button" class="btn btn-success" value="Bỏ chọn tất cả">
                <a href="index.php?act=add-products"><input class="btn btn-success" type="button" value="Thêm mới"></a>
                <input type="button" class="btn btn-success" value="Xóa các mục tất tả">
              
            </div>
        </form>
    </div>
</div>