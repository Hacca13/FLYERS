<?php
include_once MODEL_DIR . "AppuntiManager.php";
include_once BEANS_DIR ."Appunti.php";

if(isset($_URL) && isset($_URL[1])) {

    $manager = new AppuntiManager();
    $id = (int)testInput($_URL[1]);
    $appunti = $manager->getAppuntiByKeyAppunti($id);
    $file = $appunti->getPath();

    if (file_exists($file)) {

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>