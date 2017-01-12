<?php

include_once "../manager/AnnuncioManager.php";
include_once "../manager/CategoriaManager.php";

$managerA = new AnnuncioManager();
$managerC = new CategoriaManager();

$annunci = array();
$categorie = array();

$annunci = $managerA->getAllAnnuci();

for ($i = 0; $i < count($annunci); $i++) {
    $categoria = $managerC->getCategoriesFromId($annunci[$i]->getIdCategoria());
    array_push($categorie, $categoria[$i]);
    echo $categorie[$i]->getNome();
}



session_start();

$_SESSION['annunci'] = serialize($annunci);
$_SESSION['categorie'] = serialize($categorie);

?>



