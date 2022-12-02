<?php
function loadall_thongke()
{
    $sql = "select categorys.category_id as id_loai, categorys.category_name as ten_loai, count(products.product_category) as countsp,max(products.product_price) as maxprice, min(products.product_price) as minprice, avg(products.product_price) as avgprice from categorys inner join products on categorys.category_id=products.product_category group by categorys.category_id order by categorys.category_id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>