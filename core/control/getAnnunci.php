<?php

include_once MODEL_DIR . "AnnuncioManager.php";

$manager = new AnnuncioManager();

$annunci = array();

$annunci = $manager->getAllAnnunci();

$_SESSION['annunci'] = serialize($annunci);


?>



