<?php
 function loadall_bill_admin($kyw="",$iduser=0){

    $sql = "select * from bill where 1";
    if($iduser >0) {
        $sql.=" and iduser=".$iduser;
    }
    if($iduser != "") {
        $sql.=" and bill_id like '%".$kyw."%'";
    }
    $sql.=" order by bill_id";
    $listbill=pdo_query($sql);
    return $listbill;
  }
  function loadall_bill_ud(){
    $sql = "select * from bill order by bill_id desc";
    $listbill=pdo_query($sql);
    return $listbill;
  }
  function delete_bill($bill_id){
    $sql="delete from bill where bill_id=".$bill_id;
    pdo_execute($sql);
  }
  function update_bill($bill_id,$bill_status){
    $sql="update bill set bill_status = '".$bill_status."' where bill_id =".$bill_id;
    pdo_execute($sql);
}
function loadone_ttbill($bill_id){
  $sql = "select * from bill where bill_id =".$bill_id;
  $dm=pdo_query_one($sql);
  return $dm;
}
?>