<?php
/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 20/01/2017
 * Time: 19:06
 */

include_once MODEL_DIR."UtenteManager.php";

$manager = new UtenteManager();

if(isset($_POST['username'])&&isset($_POST['password'])){
    $username = $_POST['username'] ;
    $password = $_POST['password'];

    if($manager->checkLogin($username,$password)){
        $user = $manager->getUtenteById($username);
        $_SESSION['user']= serialize($user);

        $_SESSION['toast-type'] = "success";
        $_SESSION['toast-message'] = "Bentornato ".$user->getId()." !";
        header ("location: ".DOMINIO_SITO."/home");

    }
    else{
        $_SESSION['toast-type'] = "error";
        $_SESSION['toast-message'] = "Username e/o Password Sbagliati!";
        header ("location: ".DOMINIO_SITO."/autenticazione");
    }

}
else{
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Username e/o Password Sbagliati!";
    header ("location: ".DOMINIO_SITO."/autenticazione");
}


