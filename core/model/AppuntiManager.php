<?php

include_once BEANS_DIR.'Appunti.php';
include_once MODEL_DIR.'Connector.php';
include_once MODEL_DIR.'TagManager.php';
class AppuntiManager
{

    public function __construct() {

    private $tagManager;

    public function __construct() {
        $this->tagManager = new TagManager();
    }

    public function insertAppunti($appunti){
        $insertSql = "INSERT INTO APPUNTI (NOME, CATEGORIA, DESCRIZIONE, RAITING, PATH, DATADICARICAMENTO, KEYUTENTE) 
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s'); SELECT LAST_INSERT_ID()" ;
        $query = sprintf($insertSql,$appunti->getNome(),$appunti->getCategoria(),$appunti->getDescrizione(),$appunti->getRaiting(),$appunti->getPath(),$appunti->getDataDiCaricamento(),$appunti->getKeyUtente());
        $keyAppunto = mysqli_query(Connector::getConnector(), $query);
        $this->tagManager->getTagByAppunti($keyAppunto,$appunti->getListTags());
    }


    public function getAllAppunti() {
        $selectSql = "SELECT * FROM APPUNTI";
        $res = mysqli_query(Connector::getConnector(), $selectSql);
        $listAppunti = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAppunti,$appunti);
            }
        }
        return $listAppunti;
    }

    public function getAppuntiByCategoria ($nameCategory){
        $selectSql = "SELECT * FROM APPUNTI WHERE CATEGORIA = '%s'";
        $query = sprintf($selectSql,$nameCategory);
        $res = mysqli_query(Connector::getConnector(), $query);
        $listAppunti = array();
        if ($res) {
            $result = array();
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAppunti,$appunti);
            }
            return $result;
        }
        return $listAppunti;
    }

    public function getAppuntiByUser ($idUser){
        $selectSql = "SELECT * FROM APPUNTI WHERE KEYUTENTE = '%s'";
        $query = sprintf($selectSql,$idUser);
        $res = mysqli_query(Connector::getConnector(), $query);
        $listAppunti = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAppunti,$appunti);
            }
        }
        return $listAppunti;
    }

    public function getAppuntiByTitolo ($name){
        $selectSql = "SELECT * FROM APPUNTI WHERE NOME LIKE '%s'";
        $name = "%".$name."%";
        $query = sprintf($selectSql,$name);
        $res = mysqli_query(Connector::getConnector(), $query);
        $listAppunti = array();
        if ($res) {
            $result = array();
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAppunti,$appunti);
            }
            return $result;
        }
        return $listAppunti;
    }



}