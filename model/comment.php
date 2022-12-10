<?php
function addComent($content,$user,$product,$vaitro){
    $query = "INSERT INTO comments (comment_content, comment_user,comment_product,comment_status)
    VALUES ('$content',$user,$product,$vaitro)";
    pdo_execute($query);
   
} 
function count_comment($category_id){
    $query = "select COUNT(comments.comment_product) as count_cmt
    from comments where comment_product='$category_id' and comment_status=1";
    $count_cmt = pdo_query($query);
    return $count_cmt;
}
function load_comment(){
    $query = "select * from comments";
    $comment=pdo_query($query);
    return $comment;
}
function status_hien($id){
    $query="UPDATE comments
    SET comment_status = 1
    WHERE comment_id =".$id;
    pdo_execute($query);
}
function status_an($id){
    $query="UPDATE comments
    SET comment_status = 0
    WHERE comment_id =".$id;
    pdo_execute($query);
}
?>