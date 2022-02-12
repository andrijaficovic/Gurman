<?php include('includes/db.php') ?>
<?php include('includes/functions.php') ?>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (emptyInputLogin($username, $password) !== false) {
        header("Location: login.php?error=emptyinput");
        exit(); //zaustavlja skriptu da se dalje izvrsava   
    }

    loginUser($connection, $username, $password);

}else{
    header("Location: login.php");
    exit();
}
?>