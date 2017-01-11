<?php

include_once '../model/Categoria.php';

include "Connector.php";
$db = new Connector();
$sql2 = "SELECT * FROM CATEGORIA";

$res = mysqli_query($db->getConnector(), $sql2);
$categorie = array();
if ($res) {
    while ($obj = $res->fetch_assoc()) {
        $categoria = new Categoria($obj['KEYCATEGORIA'], $obj['NOME']);
        $categorie[] = $categoria;
    }
}

$_SESSION['categorie'] = serialize($categorie);

?>