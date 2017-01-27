<?php

include_once MODEL_DIR . "AppuntiManager.php";
include_once BEANS_DIR ."Appunti.php";
include_once BEANS_DIR ."Utente.php";

if(isset($_POST['nome'])) {
    $nome = $_POST['nome'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Nome del file non inserito";
    header("Location:".DOMINIO_SITO."/inserisciAppunti");
}

if(isset($_POST['tags'])){
    $tags = $_POST['tags'];
    $result = explode(" ",$tags);

} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Tag/s non inserito/i";
    header("Location:".DOMINIO_SITO."/inserisciAppunti");
}

if(isset($_POST['categorie'])) {
    $categoria = $_POST['categorie'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Categoria non inserita";
    header("Location:".DOMINIO_SITO."/inserisciAppunti");
}

if(isset($_POST['descrizione'])) {
    $descrizione = $_POST['descrizione'];
} else {
    $descrizione = "";
}


if(isset($_FILES['file'])) {
    $_FILES['file']['name'];
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder = UPLOADS_DIR;

    // new file size in KB
    $new_size = $file_size/1024;

    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file=str_replace(' ','-',$new_file_name);

    $path = $folder.$final_file;

    move_uploaded_file($file_loc,$folder.$final_file);

} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "File non inserito";
    header("Location:".DOMINIO_SITO."/inserisciAppunti");
}

$data = date("Y-m-d");
$raiting = 0;
$user = unserialize($_SESSION["user"]);
$keyUtente = $user->getKeyUtente();
$keyAppunti = 0;
$manager = new AppuntiManager();
$appunti = new Appunti($keyAppunti,$nome,$categoria,$descrizione, $raiting, $path, $data, $keyUtente ,$result);

$manager->insertAppunti($appunti);
$_SESSION['toast-type'] = "success";
$_SESSION['toast-message'] = "File inserito con successo!";
header("Location:".DOMINIO_SITO."/inserisciAppunti");
?>