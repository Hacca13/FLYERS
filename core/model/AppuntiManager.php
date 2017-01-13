<?php

include_once '../beans/Appunti.php';
include_once 'Connector.php';

class AppuntiManager
{


    private $db;

    public function __construct() {
        $this->db = new Connector();
    }


    public function searchNotes($nameNotes){
        $GET_NOTES = "SELECT * FROM APPUNTO WHERE LIKE '%s'";
        $query = sprintf($GET_NOTES,$nameNotes);
        $result = array();
        return $result;

    }

    public function getAllAppunti() {
        $str = "SELECT * FROM `APPUNTO`";
        $res = mysqli_query($this->db->getConnector(), $str);
        $appunti = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $appunto = new Appunti($obj['KEYFILE'], $obj['NOME'], $obj['CATEGORIA'], $obj['DESCRIZIONE'], $obj['RAITING'], $obj['PATH'], $obj['DATADICARICAMENTO'], $obj['KEYUTENTE']);
                $appunti[] = $appunto;
            }
        }
        return $appunti;
    }

    public function insertAppunti($nome, $categoria, $descrizione, $raiting, $path, $data, $idutente) {
        $str = "INSERT INTO `APPUNTO` (`KEYFILE`, `NOME`, `CATEGORIA`, `DESCRIZIONE`, `RAITING`, `PATH`, `DATADICARICAMENTO`, `KEYUTENTE`) 
                VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $query = sprintf($str, $nome, $categoria, $descrizione, $raiting, $path, $data, $idutente);
        $res = mysqli_query($this->db->getConnector(), $query);
    }

    public function getAppunto($id) {
        $str = "SELECT * FROM `APPUNTO` WHERE `KEYFILE` = $id";
        $res = mysqli_query($this->db->getConnector(), $str);
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $appunto = new Appunti($obj['KEYFILE'], $obj['NOME'], $obj['CATEGORIA'], $obj['DESCRIZIONE'], $obj['RAITING'], $obj['PATH'], $obj['DATADICARICAMENTO'], $obj['KEYUTENTE']);
            }
        }
        return $appunto;

    }

}