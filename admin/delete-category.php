<?php 
include"config.php";
if($_SESSION["user_role"] == '0'){
    header("Location: {$hostname}/admin/post.php");
 }
$categoryid = $_GET['id'];

$sql = "DELETE FROM category WHERE category_id = {$categoryid}";

if(mysqli_query($conn, $sql)) {
    header("Location: {$hostname}/admin/category.php");
}else{
    echo "<p>Can't Delete the user record .</p>";
}

mysqli_close($conn);
?>