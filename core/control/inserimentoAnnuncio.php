<?php


include_once '../manager/CategoriaManager.php';

$manager = new CategoriaManager();

$categorie = $manager->getAllCategories();

$_SESSION['categorie'] = serialize($categorie);


?>