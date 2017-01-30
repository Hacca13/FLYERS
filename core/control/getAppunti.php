<?php
include_once MODEL_DIR . "AppuntiManager.php";
include_once MODEL_DIR ."UtenteManager.php";


if(isset($_URL) && isset($_URL[1])) {

    $categoria = (String)testInput($_URL[1]);

    $manager = new AppuntiManager();

    $appunti = $manager->getAppuntiByCategoria($categoria);

    $um = new UtenteManager();

    $usersName = array();
    for($k=0; $k<count($appunti); $k++){
        $keyUser = $appunti[$k]->getKeyUtente();
        $user = $um->getUtenteByKeyUtente($keyUser);

        array_push($usersName,$user->getId());
    }

    include_once VIEW_DIR . "listaAppunti.php";
}


function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>