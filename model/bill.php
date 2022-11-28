<?php
 function loadall_bill(){
    $sql="select * from bill";
    $list_bill=pdo_query($sql);
    return $list_bill;
}
?>