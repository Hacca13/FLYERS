<?php
include_once MODEL_DIR . "AppuntiManager.php";

$manager = new AppuntiManager();

$appunti = array();

$appunti = $manager->getAllAppunti();

session_start();

$_SESSION['appunti'] = serialize($appunti);



?>