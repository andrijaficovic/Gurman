<?php include("includes/db.php");?>
<?php 
$id = $_GET['id'];
$query = "DELETE FROM `posts` WHERE `post_id`=$id";
if(mysqli_query($connection, $query)){
    header("Location: my_recipe.php?msg=deleted_post");
    exit();
}else{
    header("Location: my_recipe.php?msg=error");
    exit();
}
?>