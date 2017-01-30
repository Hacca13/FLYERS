<?php
include_once MODEL_DIR . "AppuntiManager.php";
include_once MODEL_DIR ."UtenteManager.php";

if(isset($_SESSION['user'])){

    $user = unserialize($_SESSION['user']);
    $am = new AnnuncioManager();
    $appunti = $am->getAnnunciByUser($user->getKeyUtente());

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