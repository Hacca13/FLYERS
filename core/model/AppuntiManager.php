<?php

include_once BEANS_DIR . 'Appunti.php';
include_once MODEL_DIR . 'Connector.php';

class AppuntiManager
{

    public function __construct() {

    }


    public function searchNotes($nameNotes){
        $GET_NOTES = "SELECT * FROM APPUNTI WHERE LIKE '%s'";
        $query = sprintf($GET_NOTES,$nameNotes);
        $res = mysqli_query(Connector::getConnector(), $query);
        if ($res) {
            $result = array();
            while ($obj = $res->fetch_assoc()) {
                $appunti = new Appunti($obj['KEYFILE'], $obj['NOME'], $obj['CATEGORIA'], $obj['DESCRIZIONE'], $obj['RAITING'], $obj['PATH'], $obj['DATADICARICAMENTO'], $obj['KEYUTENTE']);
                array_push($result,$appunto);
            }
            return $result;
        }
        return false;
    }

    public function getAllAppunti() {
        $ALL_APPUNTI = "SELECT * FROM APPUNTI";
        $res = mysqli_query(Connector::getConnector(), $ALL_APPUNTI);
        if ($res) {
            $result = array();
            while ($obj = $res->fetch_assoc()) {
                $appunto = new Appunti($obj['KEYFILE'], $obj['NOME'], $obj['CATEGORIA'], $obj['DESCRIZIONE'], $obj['RAITING'], $obj['PATH'], $obj['DATADICARICAMENTO'], $obj['KEYUTENTE']);
                array_push($result,$appunto);
            }
            return $result;
        }
        return false;
    }

    public function insertAppunti($appunti) {
        $INSERT_APPUNTI = "INSERT INTO APPUNTI (NOME, CATEGORIA, DESCRIZIONE, RAITING, PATH, DATADICARICAMENTO, KEYUTENTE) 
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s');SELECT LAST_INSERT_ID();";
        $query = sprintf($INSERT_APPUNTI, $appunti->getNome(), $appunti->getCategoria(), $appunti->getDescrizione(), $appunti->getRaiting(), $appunti->getPath(),$appunti->getDataDiCaricamento() , $appunti->getKeyUtente());
        $idAppunti = mysqli_query(Connector::getConnector(), $query);

        $tm = new TagManager();

        $tm->insertTagsByAppunti($idAppunti,$appunti->getTags());

    }

    public function getAppunto($id) {

        $GET_APPUNTO_BY_ID = "SELECT * FROM APPUNTI WHERE KEYFILE = '%s'";
        $query = sprintf($GET_APPUNTO_BY_ID,$id);
        $res = mysqli_query(Connector::getConnector(), $query);
        if ($res) {
            $result = array();
            while ($obj = $res->fetch_assoc()) {
                $appunto = new Appunti($obj['KEYFILE'], $obj['NOME'], $obj['CATEGORIA'], $obj['DESCRIZIONE'], $obj['RAITING'], $obj['PATH'], $obj['DATADICARICAMENTO'], $obj['KEYUTENTE']);
                array_push($result,$appunto);
            }
            return $result;
        }
        return false;
    }

}