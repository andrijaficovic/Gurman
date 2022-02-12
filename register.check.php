<?php include('includes/db.php') ?>
<?php include('includes/functions.php') ?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];

    if(emptyInputRegister($name, $surname, $username, $email, $password, $r_password) !== false){
        header("Location: register.php?error=emptyinput");
        exit(); //zaustavlja skriptu da se dalje izvrsava   
    }

    if (invalidUsername($username) !== false) {
        header("Location: register.php?error=invalidusername");
        exit(); //zaustavlja skriptu da se dalje izvrsava   
    }

    if (invalidEmail($email) !== false) {
        header("Location: register.php?error=invalidemail");
        exit(); //zaustavlja skriptu da se dalje izvrsava   
    }

    if (passwordMatch($password, $r_password) !== false) {
        header("Location: register.php?error=passwordsdontmatch");
        exit(); //zaustavlja skriptu da se dalje izvrsava   
    }

    //mogu da dodam npr da li je duzina passworda manja od 6 char

    if (usernameExists($connection,$username, $email) !== false) {
        header("Location: register.php?error=usernametaken");
        exit(); //zaustavlja skriptu da se dalje izvrsava     
    }

    createUser($connection, $name, $surname, $username, $email, $password);
} else {
    header("Location: register.php");
    exit();
}
