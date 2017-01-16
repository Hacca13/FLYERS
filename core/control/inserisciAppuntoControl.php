<?php

include_once "../model/AppuntiManager.php";

if(isset($_POST['titolo']) && $_POST['titolo']!= null) {
    $titolo = $_POST['titolo'];
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
    //toast
}


if(isset($_FILES['file']) && $_FILES['file']!= null) {
    $_FILES['file']['name'];
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="upload/";

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
$raiting = 2;
$idUtente = 1;

$manager = new AppuntiManager();
$manager->insertAppunti($titolo, $categoria, $descrizione, $raiting, $path, $data, $idUtente);
header("location: ../view/listaAppunti.php");


?>