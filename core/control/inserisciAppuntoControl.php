<?php

include_once MODEL_DIR . "AppuntiManager.php";
include_once MODEL_DIR ."Appunti.php";

if(isset($_POST['nome']) && $_POST['nome']!= null) {
    $nome = $_POST['nome'];
} else {
    //toast
}

if(isset($_POST['tags']) && $_POST['tags']!= null) {
    $tags = $_POST['tags'];
} else {
    //toast
}

if(isset($_POST['categorie']) && $_POST['categorie']!= null) {
    $categoria = $_POST['categorie'];
} else {
    //toast
}

if(isset($_POST['descrizione']) && $_POST['descrizione']!= null) {
    $descrizione = $_POST['descrizione'];
} else {
    $descrizione = "";
}


if(isset($_FILES['file']) && $_FILES['file']!= null) {
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
    //taost;
}

$data = date("Y-m-d");
$raiting = 0;

$appunti = new Appunti(null,$nome,$categoria,$descrizione, $raiting, $path, $data, $idUtente);
$manager = new AppuntiManager();

$manager->insertAppunti($appunti);
include_once CONTROL_DIR ."getAppunti.php";


?>