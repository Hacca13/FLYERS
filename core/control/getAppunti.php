<?php
include_once "../model/AppuntiManager.php";

$manager = new AppuntiManager();

$appunti = array();

$appunti = $manager->getAllAppunti();

session_start();

$_SESSION['appunti'] = serialize($appunti);


?>