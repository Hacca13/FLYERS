<?php

include_once BEANS_DIR."Utente.php";
include_once MODEL_DIR."UtenteManager.php";

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['citta']) && isset($_POST['password']) && isset($_POST['confermaPassword'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $citta = $_POST['citta'];
    $password = $_POST['password'];
    $confermaPassword = $_POST['confermaPassword'];
    $manager = new UtenteManager();
    $user = null;
    if($password == $confermaPassword){
        if(!($manager->existEmail($email)) && !($manager->existUsername($username))){
            $user = new Utente($username,$email,$citta,$password);
            $manager->insertUser($user);
            $_SESSION['toast-type'] = "success";
            $_SESSION['toast-message'] = "Benvenuto ".$username." !";
            header ("location: ".DOMINIO_SITO);

        }else{
            $_SESSION['toast-type'] = "error";
            $_SESSION['toast-message'] = "Dati già esistenti!";
            header ("location: ".DOMINIO_SITO."/autenticazione");
        }

    }else{
        $_SESSION['toast-type'] = "error";
        $_SESSION['toast-message'] = "Mancano dei campi!";
        header ("location: ".DOMINIO_SITO . "/autenticazione");
    }

}else{
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Mancano dei campi!";
    header ("location: ".DOMINIO_SITO . "/autenticazione");
}



?>


