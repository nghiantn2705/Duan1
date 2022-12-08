<?php
function addComent($content,$user,$product){
    $query = "INSERT INTO comments (comment_content, comment_user,comment_product)
    VALUES ('$content',$user,$product)";
    pdo_execute($query);
   
} 
function count_comment($category_id){
    $query = "select COUNT(comments.comment_product) as count_cmt
    from comments where comment_product='$category_id'";
    $count_cmt = pdo_query($query);
    return $count_cmt;
}
?>