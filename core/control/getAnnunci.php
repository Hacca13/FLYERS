<?php

include_once "../model/AnnuncioManager.php";

$manager = new AnnuncioManager();

$annunci = array();

$annunci = $manager->getAllAnnunci();

$_SESSION['annunci'] = serialize($annunci);


?>



