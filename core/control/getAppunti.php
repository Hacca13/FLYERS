<?php
include_once MODEL_DIR . "AppuntiManager.php";

if($isset($_URL) &&$isset($_URL[1])) {

    $categoria = (String)testInput($_URL[1]);

    $manager = new AppuntiManager();

    $appunti = $manager->getAllAppuntiByCategoria();

    include_once VIEW_DIR . "listaAppunti.php";
}


function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>