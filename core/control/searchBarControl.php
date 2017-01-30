<?php
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 11/01/2017
 * Time: 14:37
 */

include_once MODEL_DIR . 'AnnuncioManager.php';
include_once MODEL_DIR . 'AppuntiManager.php';
include_once MODEL_DIR . 'TagManager.php';
include_once MODEL_DIR . 'UtenteManager.php';
include_once BEANS_DIR . "Annuncio.php";
include_once BEANS_DIR . "Appunti.php";


if(isset($_POST["search_param"]) && isset($_POST["user_param"])) {

    if ($_POST["search_param"] == "Appunti") {

        $paramByUser = $_POST["user_param"];

        if($paramByUser !="" && $paramByUser!=" ") {
            $am = new AppuntiManager();
            $result = $am->getAppuntiByTitolo($paramByUser);
        }else{
            $am = new AppuntiManager();
            $result = $am->getAllAppunti();
        }

        $usersNameAds = array();
        $um = new UtenteManager();
        for($k=0; $k<count($result); $k++){

            $keyUser = $result[$k]->getKeyUtente();
            $user = $um->getUtenteByKeyUtente($keyUser);

            array_push($usersNameAds,$user->getId());
        }

        include_once VIEW_DIR . "resultSearch.php";

    } else if ($_POST["search_param"] == "Annunci") {

        $paramByUser = $_POST["user_param"];

        if($paramByUser !="" && $paramByUser!=" ") {
            $am = new AnnuncioManager();
            $result = $am->getAnnunciByTitolo($paramByUser);
        }else{
            $am = new AnnuncioManager();
            $result = $am->getAllAnnunci();
        }

        $um = new UtenteManager();
        $usersNameAds = array();

        for($k=0; $k<count($result); $k++){

            $keyUser = $result[$k]->getKeyUtente();
            $user = $um->getUtenteByKeyUtente($keyUser);

            array_push($usersNameAds,$user->getId());
        }

        include_once VIEW_DIR . "resultSearch.php";

    } else if ($_POST["search_param"] == "Categorie") {

        $paramByUser = $_POST["user_param"];

        if($paramByUser !="" && $paramByUser!=" ") {
            $am = new AppuntiManager();
            $result = $am->getAppuntiByCategoria($paramByUser);
        }else{
            $am = new AppuntiManager();
            $result = $am->getAllAppunti();
        }

        $um = new UtenteManager();

        $usersNameAds = array();

        for($k=0; $k<count($result); $k++){

            $keyUser = $result[$k]->getKeyUtente();
            $user = $um->getUtenteByKeyUtente($keyUser);

            array_push($usersNameAds,$user->getId());
        }

        include_once VIEW_DIR . "resultSearch.php";

    } else if ($_POST["search_param"] == "Tags") {

        $paramByUser = $_POST["user_param"];
        $tm = new TagManager();

        $result = $tm->searchByTag($paramByUser);

        $um = new UtenteManager();

        $usersNameAds = array();

        for($k=0; $k<count($result); $k++){

            $keyUser = $result[$k]->getKeyUtente();
            $user = $um->getUtenteByKeyUtente($keyUser);

            array_push($usersNameAds,$user->getId());
        }

        include_once VIEW_DIR . "resultSearch.php";
    }else{
        header("Location:".DOMINIO_SITO);
    }

}else{
    header("Location:".DOMINIO_SITO);
}
