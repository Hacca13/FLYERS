<?php
/**
 * Created by PhpStorm.
 * User: Mirko Aliberti
 * Date: 13/01/2017
 * Time: 09:25
 */

$file = '../profile.png';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}




?>