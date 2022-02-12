<?php include("includes/header.php"); ?>
<?php 

if(isset($_POST)){
    $andrija = $_POST['andrija'];
    $query = "INSERT INTO test(andrija) VALUES(`$andrija`)";
    $res = mysqli_query($connection,$query);
    if($res){
        echo "ok";
    }else{
        echo "nije oke";
    }
}
?>
<form action="test.php" method="post">
    <input type="text" name="andrija">
    <input type="submit" value="ok" name="ok">
</form>
<?php if(isset($andrija)){
    //echo $andrija;
}?>

<?php 

$query = "SELECT * FROM test WHERE id=1";
$res = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($res)){
    $andrija = $row['andrija'];
    echo $andrija . "<br>";
}
?>
<?php include("includes/footer.php"); ?>