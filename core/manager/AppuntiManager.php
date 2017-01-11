<?php
include_once '../model/Appunto.php';
include_once '../control/Connector.php';

class AppuntiManager {

    private $db;

    public function __construct() {
        $this->db = new Connector();
    }

    public function getAllAppunti() {
        $str = "SELECT * FROM `OBJECTFILE`";
        $res = mysqli_query($this->db->getConnector(), $str);
        $appunti = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $appunto = new Appunto($obj['KEYFILE'], $obj['NOME'], $obj['DESCRIZIONE'], $obj['RAITING'], $obj['FILE'], $obj['DATADICARICAMENTO'], $obj['TAG'], $obj['KEYCATEGORIA'], $obj['KEYUTENTE']);
                $appunti[] = $appunto;
            }
        }
        return $appunti;
    }

    public function inserAppunti($nome, $descrizione, $raiting, $file, $data, $tag, $idCategoria, $idUtente) {
        $str = "INSERT INTO `OBJECTFILE` (`KEYFILE`, `NOME`, `DESCRIZIONE`, `RAITING`, `FILE`, `DATADICARICAMENTO`, `TAG`, `KEYCATEGORIA`, `KEYUTENTE`) 
                VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s, %s', '%s', '%s')";
        $query = sprintf($str, $nome, $descrizione, $raiting, $file, $data, $tag, $idCategoria, $idUtente);
        $res = mysqli_query($this->db->getConnector(), $query);
    }



}



?>