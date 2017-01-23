<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:51
 */
include_once BEANS_DIR .'Annuncio.php';
include_once MODEL_DIR.'Connector.php';
include_once MODEL_DIR."TagManager.php";

class AnnuncioManager
{


    public function __construct() {

    }

    public function insertAnnuncio($annuncio){
        $annuncio = new Annuncio();
        $insertSql = "INSERT INTO ANNUNCIO( TITOLO, DESCRIZIONE, CONTATTO, DATADICARICAMENTO, KEYUTENTE) 
              VALUES ( '%s', '%s', '%s', '%s', '%s'); SELECT LAST_INSERT_ID()";

        $query = sprintf($insertSql, $annuncio->getTitolo(), $annuncio->getDescrizione(), $annuncio->getContatto(), $annuncio->getDataDiCaricamento(), $annuncio->getKeyUtente());
        $keyAnnuncio = mysqli_query(Connector::getConnector(), $query);



    }




    public function getAllAnnunci() {
        $str = "SELECT * FROM ANNUNCIO";
        $res = mysqli_query(Connector::getConnector(), $str);
        $annunci = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $annuncio = new Annuncio($obj['KEYANNUNCIO'], $obj['TITOLO'], $obj['DESCRIZIONE'], $obj['CONTATTO'], $obj['DATADICARICAMENTO'], $obj['KEYUTENTE']);
                $annunci[] = $annuncio;
            }
        }
        return $annunci;
    }


    public function searchAds($nameAd){
        $GET_ADS = "SELECT * FROM ANNUNCIO WHERE LIKE '%s'";
        $nameAd = "%".$nameAd."%";
        $query = sprintf($GET_ADS,$nameAd);
        $result = array();
        return $result;

    }

}