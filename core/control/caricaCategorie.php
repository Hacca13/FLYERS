<?php


include_once '../model/CategoriaManager.php';

$manager = new CategoriaManager();

$categorie = $manager->getAllCategories();

$_SESSION['categorie'] = serialize($categorie);


?>