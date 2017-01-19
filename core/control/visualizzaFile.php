<?php
include_once "../model/AppuntiManager.php";

$manager = new AppuntiManager();
$id = $_GET['id'];
$appunto = $manager->getAppunto($id);
$file = $appunto->getPath();
$directory = getcwd();
$full = $directory."/".$file;

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename='.$file);
readfile($file);

?>