<div class="row">
    <div class="row frmtitle mb">
        <h1>DANH SÁCH LNGƯỜI DÙNG</h1>
    </div>
   
    <div class="row frmcontent">
        <form action="#" method="post">
            <div class="row mb10 frmdsloai">

                <table border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Tên đăng nhập </th>
                            <th>Mật khẩu</th>
                            <th>Ảnh
                            
                            <th>Họ tên
                            
                            <th>Địa chỉ
                            
                            <th>Số điện thoại</th>
                            <th>Email
                            
                            <th>Vai trò</th>
                            <!-- <th>Loại Máy</th>
                            <th>Chống Nước</th>
                            <th>Xuất Xứ</th>
                            <th>Bảo Hành</th>
                            <th>commnet</th>
                            <th>active</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listusers as $users) {
                            extract($users);
                            $update_users = "index.php?act=update_users&user_id=".$user_id;
                            $delete_users = "index.php?act=delete_users&user_id=".$user_id;
                            // $hinhpath = "../upload/" . $product_image;
                            // if (is_file($hinhpath)) {
                            //     $image = "<img src='" . $hinhpath . "' height = '60px'>";
                            // } else {
                            //     $image = "No Photo";
                            // }
                        ?>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?= $user_id ?></td>
                                <td><?= $user_name ?></td>
                                <td><?= $user_password ?></td>
                                
                                <td><?= $user_image ?></td>
                                
                                <td><?= $user_lastname ?></td>
                                
                                <td><?= $user_address ?></td>
                                <td><?= $user_phone ?></td>
                                <td><?= $user_email ?></td>
                                <td><?= $user_rolex	?></td>
                                <!-- <td><?= $product_wire ?></td>
                                <td><?= $product_origin ?></td>
                                <td><?= $product_insurance ?></td>
                                <td><?= $product_comment ?></td> -->

                                <td>
                                    <a href="<?= $update_users ?>"><input type="button" value="Sửa"></a>
                                    <a href="<?= $delete_users ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><input type="button" value="Xóa"></a>
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
                <a href="index.php?act=add-products"><input type="button" value="Thêm mới"></a>
            </div>
        </form>
    </div>
</div>