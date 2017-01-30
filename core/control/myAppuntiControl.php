<?php
include_once MODEL_DIR . "AppuntiManager.php";
include_once MODEL_DIR ."UtenteManager.php";

if(isset($_SESSION['user'])){

    $userLogged = unserialize($_SESSION['user']);
    $am = new AppuntiManager();
    $appunti = $am->getAppuntiByUser($userLogged->getKeyUtente());

    $um = new UtenteManager();
    $usersNameAds = array();

    for($k=0; $k<count($appunti); $k++){
        $keyUser = $appunti[$k]->getKeyUtente();
        $user = $um->getUtenteByKeyUtente($keyUser);

        array_push($usersNameAds,$user->getId());
    }

    include_once VIEW_DIR . "myAppunti.php";

}else{
    header("Location:".DOMINIO_SITO);
}