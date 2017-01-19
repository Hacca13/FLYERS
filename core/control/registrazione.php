<?php

include_once MODEL_DIR . "UtenteManager.php";

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
$users = $manager->getAllUser();

for ($i = 0; $i < count($users); $i++) {
    if ($users[$i]->getEmail() == $email) {
        $variableInsert = 1;
        include_once VIEW_DIR . "regFail.php";
        if ($users[$i]->getId() == $username) {
            $variableInsert = 2;
            include_once VIEW_DIR . "regFail.php";

        }
    }
}

if ($variableInsert == null) {
    $manager->insertUser($username, $email, $citta, $password);
    include_once VIEW_DIR . "home.php";
}












?>


