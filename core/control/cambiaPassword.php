<?php
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 28/01/2017
 * Time: 13:43
 */
include_once MODEL_DIR . "UtenteManager.php";
include_once BEANS_DIR . "Utente.php";

if($_SERVER["REQUEST_METHOD"]=="POST") {

    if (isset($_POST["oldpssw"]) && isset($_POST["newpssw"]) && isset($_POST["confermnewpssw"])){

        $oldpssw = $_POST["oldpssw"];
        $newpssw = $_POST["newpssw"];
        $confermpssw = $_POST["confermnewpssw"];


        if( $newpssw == $confermpssw){

            $user = unserialize($_SESSION['user']);

            if ($user->getPassword()== $oldpssw) {

                $user->setPassword($newpssw);

                $um = new UtenteManager();
                $um->updateUser($user->getKeyUtente(), $user);

                unset($_SESSION['user']);
                $_SESSION['user'] = serialize($user);

                $_SESSION['toast-type'] = "success";
                $_SESSION['toast-message'] = "Modifiche applicate con successo";
                header("Location:" . DOMINIO_SITO . "/modificaProfiloUtente");

            } else {
                $_SESSION['toast-type'] = "error";
                $_SESSION['toast-message'] = "Errore nell'inserimento della password";
                header("Location:" . DOMINIO_SITO . "/modificaProfiloUtente");
            }

        } else {
            $_SESSION['toast-type'] = "error";
            $_SESSION['toast-message'] = "Errore nell'inserimento della password";
            header("Location:" . DOMINIO_SITO . "/modificaProfiloUtente");

        }
    } else {
        $_SESSION['toast-type'] = "error";
        $_SESSION['toast-message'] = "Password non inserita";
        header("Location:" . DOMINIO_SITO . "/modificaProfiloUtente");

    }
}