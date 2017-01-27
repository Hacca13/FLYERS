<?php

include_once MODEL_DIR . "AnnuncioManager.php";
include_once MODEL_DIR . "UtenteManager.php";

$am = new AnnuncioManager();

$annunci = $am->getAllAnnunci();

$um = new UtenteManager();

$usersNameAds = array();
for($k=0; $k<count($annunci); $k++){
    $keyUser = $annunci[$k]->getKeyUtente();
    $user = $um->getUtenteByKeyUtente($keyUser);

    array_push($usersNameAds,$user->getId());
}


include_once VIEW_DIR ."listaAnnunci.php";
?>


