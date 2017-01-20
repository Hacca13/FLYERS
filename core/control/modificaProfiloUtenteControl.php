<?php
include_once MODEL_DIR . "UtenteManager.php";
include_once BEANS_DIR . "Utente.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST["modifyUser"])){
        $id = null;

        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }

        $email = null;
        if(isset($_POST["email"])){
            $email = $_POST["email"];
        }

        $citta = null;
        if(isset($_POST["citta"])){
            $citta = $_POST["citta"];
        }


        if(isset($_POST["newpssw"]) && isset($_POST["confermnewpssw"])){
            $newpssw = $_POST["newpssw"];
            $confermnewpssw = $_POST["confermnewpssw"];
            if($newpssw == $confermnewpssw){
                $userModified = new Utente($id,$email,$citta,$newpssw);
            }
        }

    }








}