<?php
include_once MODEL_DIR . "UtenteManager.php";
include_once BEANS_DIR ."Utente.php";

if(isset($_SESSION["user"])){

    $keyUser = unserialize($_SESSION["user"]);
    $um = new UtenteManager();
    $user = $um->getUtenteByKeyUtente($keyUser);


    include_once VIEW_DIR . "profiloUtente.php";
}