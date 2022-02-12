<?php include('includes/functions.php'); ?>
<?php include('includes/db.php'); ?>
<?php

if(isset($_POST['submit'])){
    $secret = $_POST['secret'];
    $password = $_POST['password'];
    $reset_password = $_POST['reset_password'];
    $email = $_POST['email'];

    resetPassword($secret,$password,$reset_password, $email);
}

?>