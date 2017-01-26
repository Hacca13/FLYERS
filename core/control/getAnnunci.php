<?php

include_once MODEL_DIR . "AnnunciManager.php";

$manager = new AnnuncioManager();

$annunci = $manager->getAllAnnunci();

include_once VIEW_DIR ."listaAnnunci.php";
?>


