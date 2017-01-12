<?php

include_once "../model/AppuntiManager.php";

$manager = new AppuntiManager();

$appunti = array();

$appunti = $manager->getAllAppunti();

echo count($appunti);



?>



