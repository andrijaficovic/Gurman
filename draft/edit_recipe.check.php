<?php include("includes/db.php"); ?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    header("Location: edit_recipe.form.php?id=$id");
}
?>