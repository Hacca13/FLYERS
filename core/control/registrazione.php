<?php

include_once "";

if(isset($_POST['username']) &&  $_POST['username'] != null) {
    $username = $_POST['username'];
} else {
    //toast
}
if(isset($_POST['email']) &&  $_POST['email'] != null) {
    $email = $_POST['email'];
} else {
    //toast
}
if(isset($_POST['citta']) &&  $_POST['citta'] != null) {
    $citta = $_POST['citta'];
} else {
    //toast
}
if(isset($_POST['password']) &&  $_POST['password'] != null) {
    $password = $_POST['password'];
} else {
    //toast
}

$manager = new UtenteManager();
$manager->insertUser($username, $email, $citta, $password);

header("location: ../view/home.php");












?>


