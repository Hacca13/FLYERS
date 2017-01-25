<?php
include_once MODEL_DIR . "UtenteManager.php";
include_once BEANS_DIR . "Utente.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST["modifyUser"])){

        $id ="";
        if(isset($_POST["id"])){
            $id = $_POST["id"];
            $um = new UtenteManager();
            $flag= $um->existUsername($id);

            if($flag){
                $id = $_POST["id"];
            }else{
                $_SESSION['toast-type'] = "error";
                $_SESSION['toast-message'] = "Id già esistente!";
                header("Location:".DOMINIO_SITO."/modificaProfiloUtente");
            }
        }

        $email = "";
        if(isset($_POST["email"])){
            $email = $_POST["email"];
            $um = new UtenteManager();
            $flag= $um->existEmail($email);

            if($flag){
                $email = $_POST["email"];
            }else{
                $_SESSION['toast-type'] = "error";
                $_SESSION['toast-message'] = "Email già esistente";
                header("Location:".DOMINIO_SITO."/modificaProfiloUtente");
            }
        }

        $citta = "";
        if(isset($_POST["citta"])){
            $citta = $_POST["citta"];
        }

        if(isset($_POST["newpssw"]) && isset($_POST["confermnewpssw"]) && $_POST["newpssw"]!="" && $_POST["confermnewpssw"]!=""){

            $newpssw = $_POST["newpssw"];
            $confermnewpssw = $_POST["confermnewpssw"];

            if($newpssw == $confermnewpssw) {

                $user = unserialize($_SESSION['user']);

                    if ($id == "") {
                        $id = $user->getId();
                    }

                    if ($email = "") {
                        $email = $user->getEmail();
                    }

                    $userModified = new Utente($id, $email, $citta, $newpssw);
                    $um = new UtenteManager();
                    $um->updateUser($user->getKeyUtente(), $userModified);

                    $_SESSION['toast-type'] = "success";
                    $_SESSION['toast-message'] = "Modifiche applicate con successo";
                    header("Location:" . DOMINIO_SITO . "/modificaProfiloUtente");

            }else{
                $_SESSION['toast-type'] = "error";
                $_SESSION['toast-message'] = "Errore nell'inserimento della password";
                header("Location:".DOMINIO_SITO."/modificaProfiloUtente");

            }
        }else{
            $_SESSION['toast-type'] = "error";
            $_SESSION['toast-message'] = "Password non inserita";
            header("Location:".DOMINIO_SITO."/modificaProfiloUtente");

        }

    }

}