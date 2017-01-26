<?php

include_once BEANS_DIR."Utente.php";
include_once MODEL_DIR."UtenteManager.php";

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['citta']) && isset($_POST['password']) && isset($_POST['confermaPassword'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $citta = $_POST['citta'];
    $password = $_POST['password'];
    $confermaPassword = $_POST['confermaPassword'];

    if($password == $confermaPassword){

    }else{
        header ("location: ".DOMINIO_SITO.DIRECTORY_SEPARATOR."autenticazione");
    }


}else{
    header ("location: ".DOMINIO_SITO.DIRECTORY_SEPARATOR."autenticazione");
}



?>


