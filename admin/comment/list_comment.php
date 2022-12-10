<div class="container">
    <div class="frmtitle my-4 text-center">
        <h1>Danh Sách Bình Luận</h1>
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
                            
                            <th>STT </th>
                            <th>Content</th>
                            <th> Id User</th>
                            <th>ID Product</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        foreach ($list_cmt as $cmt) {
                            extract($cmt);
                            
                            $an = "index.php?act=an_bl&bl=".$comment_id;
                            $hien = "index.php?act=hien_bl&bl=".$comment_id;
                        ?>
                            <tr>
                                
                                <td><?= $comment_id ?></td>
                                <td><?= $comment_content ?></td>

                                <td value="'.$comment_user.'" ><?= $comment_user ?></td>
                                <td><?= $comment_product ?></td>
                                <?php if($comment_status ==1){
                                    echo "<td>Hiện</td>";
                                }else {
                                    echo"<td>Ẩn</td>";
                                } ?>
                                <td><?= $comment_date ?></td>
                                <td>
                                    <a href="<?= $an ?>" onclick="return confirm('Bạn có chắc chắn muốn Ẩn?')"><input type="button" class="btn btn-danger" value="Ẩn"></a>
                                    <a href="<?= $hien ?>" onclick="return confirm('Bạn có chắc chắn muốn Hiện?')"><input type="button" class="btn btn-danger" value="Hiện"></a>
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