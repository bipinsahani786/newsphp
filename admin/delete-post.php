<?php 
include "config.php";
$post_id = $_GET['id'];
$cat_id = $_GET['catid'];


$sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
unlink("upload/".$row1['post_img']);
$sql = "DELETE FROM post WHERE post_id = {$post_id};";
$sql .= "UPDATE category SET post= post-1 WHERE category_id = {$cat_id}";
if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/post.php");
}
else{
    echo "Query failed";
}
?>