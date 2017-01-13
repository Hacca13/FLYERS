<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:51
 */
include_once '../beans/Annuncio.php';
include_once 'Connector.php';

class AnnuncioManager
{
    private $db;

    public function __construct() {
        $this->db = new Connector();
    }

    public function getAllAnnunci() {
        $str = "SELECT * FROM `ANNUNCIO`";
        $res = mysqli_query($this->db->getConnector(), $str);
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
        $GET_ADS = "SELECT * FROM annnunci WHERE LIKE '%s'";
        $query = sprintf($GET_ADS,$nameAd);
        $result = array();
        return $result;

    }

    public function insertAnnuncio($titolo, $descrizione, $contatto, $data, $idUtente) {
        $str = "INSERT INTO `ANNUNCIO` (`KEYANNUNCIO`, `TITOLO`, `DESCRIZIONE`, `CONTATTO`, `DATADICARICAMENTO`, `KEYUTENTE`) 
                  VALUES (NULL, '%s', '%s', '%s', '%s', '%s')";
        $query = sprintf($str, $titolo, $descrizione, $contatto, $data, $idUtente);
        $res = mysqli_query($this->db->getConnector(), $query);
    }

}