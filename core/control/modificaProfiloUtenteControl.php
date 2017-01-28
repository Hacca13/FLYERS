<?php
include_once MODEL_DIR . "UtenteManager.php";
include_once BEANS_DIR . "Utente.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

        if(isset($_POST["username"])){
            $username = $_POST["username"];
            $um = new UtenteManager();
            $flag= $um->existUsername($username);

            if($flag){
                $_SESSION['toast-type'] = "error";
                $_SESSION['toast-message'] = "Username già esistente!";
                header("Location:".DOMINIO_SITO."/modificaProfiloUtente");
            }
        }

        if(isset($_POST["email"])){
            $email = $_POST["email"];
            $um = new UtenteManager();
            $flag= $um->existEmail($email);

            if($flag){
                $_SESSION['toast-type'] = "error";
                $_SESSION['toast-message'] = "Email già esistente";
                header("Location:".DOMINIO_SITO."/modificaProfiloUtente");
            }
        }

        if(isset($_POST["citta"])){
            $citta = $_POST["citta"];
        }

        if(isset($_POST["pssw"]) && isset($_POST["confermpssw"])){

            $pssw = $_POST["pssw"];
            $confermpssw = $_POST["confermpssw"];

            if($pssw == $confermpssw) {

                $user = unserialize($_SESSION['user']);

                    if($email!= " " && $email!=""){
                        $user->setEmail($email);
                    }
                    if($username!=" " && $username!=""){
                        $user->setId($username);
                    }
                    if($citta!=" " && $citta!=""){
                        $user->setCitta($citta);
                    }

                    $um = new UtenteManager();
                    $um->updateUser($user->getKeyUtente(), $user);

                    unset($_SESSION['user']);
                    $_SESSION['user'] = serialize($user);

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