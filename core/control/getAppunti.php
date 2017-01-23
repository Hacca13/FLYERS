<?php
include_once MODEL_DIR . "AppuntiManager.php";

$manager = new AppuntiManager();

$appunti = $manager->getAllAppunti();

include_once VIEW_DIR ."listaAppunti.php";

?>