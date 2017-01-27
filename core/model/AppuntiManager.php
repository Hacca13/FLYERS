<?php

include_once BEANS_DIR.'Appunti.php';
include_once MODEL_DIR.'Connector.php';
include_once MODEL_DIR.'TagManager.php';
class AppuntiManager

{


    private $tagManager;

    public function __construct() {
        $this->tagManager = new TagManager();
    }

    private function lastInsertKey(){
        $lastInsert = "SELECT MAX(KEYAPPUNTI) FROM APPUNTI";
        $result_query = mysqli_query(Connector::getConnector(),$lastInsert);
        if($result_query){
            while($r = $result_query->fetch_assoc()){
                $keyAppunti = $r["MAX(KEYAPPUNTI)"];
                return $keyAppunti;
            }
        }
    }

    public function insertAppunti($appunti){
        $insertSql = "INSERT INTO APPUNTI (NOME, CATEGORIA, DESCRIZIONE, RAITING, PATH, DATADICARICAMENTO, KEYUTENTE) 
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')" ;
        $query = sprintf($insertSql,$appunti->getNome(),$appunti->getCategoria(),$appunti->getDescrizione(),$appunti->getRaiting(),$appunti->getPath(),$appunti->getDataDiCaricamento(),$appunti->getKeyUtente());
        mysqli_query(Connector::getConnector(), $query);
        $keyAppunti = $this->lastInsertKey();
        $this->tagManager->insertTagsByAppunti($keyAppunti,$appunti->getListTags());
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
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAppunti,$appunti);
            }
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
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAppunti,$appunti);
            }
        }
        return $listAppunti;
    }

    public function  getAppuntiByKeyAppunti($keyAppunti){
        $selectSql = "SELECT * FROM APPUNTI WHERE KEYAPPUNTI = '%s'";
        $query = sprintf($selectSql,$keyAppunti);
        $res = mysqli_query(Connector::getConnector(),$query);

        if($res){

            while($obj =$res->fetch_assoc()){
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                return $appunti;
            }
        }

        return null;

    }


}