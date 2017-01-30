<?php
include_once MODEL_DIR . "AnnuncioManager.php";
include_once MODEL_DIR ."UtenteManager.php";

if(isset($_SESSION['user'])){

    $userLogged = unserialize($_SESSION['user']);
    $am = new AnnuncioManager();
    $annunci= $am->getAnnunciByUser($userLogged->getKeyUtente());

    $um = new UtenteManager();
    $usersNameAds = array();

    for($k=0; $k<count($annunci); $k++){
        $keyUser = $annunci[$k]->getKeyUtente();
        $user = $um->getUtenteByKeyUtente($keyUser);

        array_push($usersNameAds,$user->getId());
    }


    include_once VIEW_DIR . "myAnnunci.php";

}else{
    header("Location:".DOMINIO_SITO);
}