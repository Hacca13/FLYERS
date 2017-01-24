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
        $tagManager= new TagManager();
    }

    public function insertAnnuncio($annuncio){
        $insertSql = "INSERT INTO ANNUNCIO( TITOLO, DESCRIZIONE, CONTATTO, DATADICARICAMENTO, KEYUTENTE) 
              VALUES ( '%s', '%s', '%s', '%s', '%s'); SELECT LAST_INSERT_ID()";
        $query = sprintf($insertSql, $annuncio->getTitolo(), $annuncio->getDescrizione(), $annuncio->getContatto(), $annuncio->getDataDiCaricamento(), $annuncio->getKeyUtente());
        $keyAnnuncio = mysqli_query(Connector::getConnector(), $query);

        $tagManager->insertTagsByAnnuncio($keyAnnuncio,$annuncio->getTags());

    }

    public function getAllAnnunci(){
        $selectSql = "SELECT * FROM ANNUNCIO";
        $res = mysqli_query(Connector::getConnector(), $selectSql);
        $listAnnunci = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAnnuncio($obj['KEYANNUNCIO']);
                $annuncio = new Annuncio($obj['KEYANNUNCIO'],$obj['TITOLO'],$obj['DESCRIZIONE'],$obj['CONTATTO'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAnnunci,$annuncio)
            }
        }
        return $listAnnunci;
    }

    


/*


    public function searchAds($nameAd){
        $GET_ADS = "SELECT * FROM ANNUNCIO WHERE TITOLO LIKE '%s'";
        $nameAd = "%".$nameAd."%";
        $query = sprintf($GET_ADS,$nameAd);
        $result = array();
        return $result;

    }*/


}