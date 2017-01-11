<?php

include_once "../manager/AppuntiManager.php";

$manager = new AppuntiManager();

$appunti = array();

$appunti = $manager->getAllAppunti();

echo count($appunti);



?>



