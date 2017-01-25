<?php

include_once MODEL_DIR . "AppuntiManager.php";
include_once MODEL_DIR ."Appunti.php";

if(isset($_POST['nome'])) {
    $nome = $_POST['nome'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Nome del file non settato";
    header("Location:".DOMINIO_SITO."/profiloUtente");
}

if(isset($_POST['tags'])){
    $tags = $_POST['tags'];
    $result = explode(",",$tags);


} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Tag/s non settati";
    header("Location:".DOMINIO_SITO."/profiloUtente");
}

if(isset($_POST['categorie'])) {
    $categoria = $_POST['categorie'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Categorie non settata";
    header("Location:".DOMINIO_SITO."/profiloUtente");
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
    $_SESSION['toast-message'] = "File non caricato";
    header("Location:".DOMINIO_SITO."/profiloUtente");
}

$data = date("Y-m-d");
$raiting = 0;

$appunti = new Appunti($nome,$categoria,$descrizione, $raiting, $path, $data, $idUtente,$result);
$manager = new AppuntiManager();

$manager->insertAppunti($appunti);

include_once CONTROL_DIR ."getAppunti.php";


?>