<?php
//Konekcija sa bazom
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gurman");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$connection){
    die("Nemoguce je uspostaviti vezu sa bazom podataka." . mysqli_connect_error());
}
?>