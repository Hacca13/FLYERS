<?php

include_once MODEL_DIR . "AnnuncioManager.php";

$manager = new AnnuncioManager();

$annunci = array();

$annunci = $manager->getAllAnnunci();

include_once VIEW_DIR ."listaAnnunci.php";
?>


