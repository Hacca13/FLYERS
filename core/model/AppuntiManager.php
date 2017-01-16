<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:43
 */

include_once BEANS_DIR .'Appunti.php';
include_once MODEL_DIR .'Connector.php';

class AppuntiManager
{


    private $db;

    public function __construct() {
        $this->db = new Connector();
    }


    public function searchNotes($nameNotes){
        $GET_NOTES = "SELECT * FROM appunti WHERE LIKE '%s'";
        $query = sprintf($GET_NOTES,$nameNotes);
        $result = array();
        return $result;

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