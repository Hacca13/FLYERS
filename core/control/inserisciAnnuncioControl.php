<?php

include_once "../model/AnnuncioManager.php";
include_once "../model/CategoriaManager.php";

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


if(isset($_POST['descrizione']) && $_POST['descrizione']!= null) {
    $descrizione = $_POST['descrizione'];
} else {
    //toast
}


if(isset($_POST['categorie']) && $_POST['categorie']!= null) {
    $categoria = $_POST['categorie'];
    $managerC = new CategoriaManager();
    $categorie = $managerC->getCategoriesFromName($categoria);
    $idCategoria = $categorie[0]->getId();
} else {
    //toast
}

$data = date("Y-m-d");
$manager = new AnnuncioManager();
$contatto = 2;
$idUtente = 1;

$manager->insertAnnuncio($titolo, $descrizione, $contatto, $data, $tags, $idUtente, $idCategoria);

//toast e redirect

//$_SESSION['toast-type'] = "success";
//$_SESSION['toast-message'] = "Utente aggiornato";
//redirect
?>