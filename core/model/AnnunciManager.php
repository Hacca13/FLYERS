<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:51
 */
include_once BEANS_DIR .'Annuncio.php';
include_once MODEL_DIR.'Connector.php';
include_once MODEL_DIR.'TagManager.php';
class AnnuncioManager
{


    private $tagManager;

    public function __construct() {
        $this->tagManager= new TagManager();

    }

    public function insertAnnuncio($annuncio){
        $insertSql = "INSERT INTO ANNUNCIO( TITOLO, DESCRIZIONE, CONTATTO, DATADICARICAMENTO, KEYUTENTE) 
              VALUES ( '%s', '%s', '%s', '%s', '%s'); SELECT LAST_INSERT_ID()";
        $query = sprintf($insertSql, $annuncio->getTitolo(), $annuncio->getDescrizione(), $annuncio->getContatto(), $annuncio->getDataDiCaricamento(), $annuncio->getKeyUtente());
        $keyAnnuncio = mysqli_query(Connector::getConnector(), $query);

        $this->tagManager->insertTagsByAnnuncio($keyAnnuncio,$annuncio->getTags());

    }

    public function getAllAnnunci(){
        $selectSql = "SELECT * FROM ANNUNCIO";
        $res = mysqli_query(Connector::getConnector(), $selectSql);
        $listAnnunci = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAnnuncio($obj['KEYANNUNCIO']);
                $annuncio = new Annuncio($obj['KEYANNUNCIO'],$obj['TITOLO'],$obj['DESCRIZIONE'],$obj['CONTATTO'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAnnunci,$annuncio);
            }
        }
        return $listAnnunci;
    }

    public function getAnnuncioByKey($keyAnnunci){
        $selectSql = "SELECT * FROM ANNUNCIO WHERE KEYANNUNCIO = '%s'";
        $query = sprintf($selectSql,$keyAnnunci);
        $res = mysqli_query(Connector::getConnector(), $query);
        $listAnnunci = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAnnuncio($obj['KEYANNUNCIO']);
                $annuncio = new Annuncio($obj['KEYANNUNCIO'],$obj['TITOLO'],$obj['DESCRIZIONE'],$obj['CONTATTO'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAnnunci,$annuncio);
            }
        }
        return $listAnnunci;
    }

    public function getAnnunciByTitolo($titolo){
        $selectSql = "SELECT * FROM ANNUNCIO WHERE LIKE '%s'";
        $titolo = "%".$titolo."%";
        $query = sprintf($selectSql,$titolo);
        $res = mysqli_query(Connector::getConnector(), $query);
        $listAnnunci = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAnnuncio($obj['KEYANNUNCIO']);
                $annuncio = new Annuncio($obj['KEYANNUNCIO'],$obj['TITOLO'],$obj['DESCRIZIONE'],$obj['CONTATTO'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAnnunci,$annuncio);
            }
        }
        return $listAnnunci;
    }

    public function getAnnunciByUser($idUser){
        $selectSql = "SELECT * FROM ANNUNCIO WHERE KEYUTENTE = '%s'";
        $query = sprintf($selectSql,$idUser);
        $res = mysqli_query(Connector::getConnector(), $query);
        $listAnnunci = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAnnuncio($obj['KEYANNUNCIO']);
                $annuncio = new Annuncio($obj['KEYANNUNCIO'],$obj['TITOLO'],$obj['DESCRIZIONE'],$obj['CONTATTO'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAnnunci,$annuncio);
            }
        }
        return $listAnnunci;
    }



}
