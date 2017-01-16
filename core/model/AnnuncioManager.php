<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:51
 */
include_once BEANS_DIR.'Annuncio.php';
include_once MODEL_DIR .'Connector.php';

class AnnuncioManager
{
    private $db;

    public function __construct() {
        $this->db = new Connector();
    }

    public function searchAds($nameAd){
        $GET_ADS = "SELECT * FROM annnunci WHERE LIKE '%s'";
        $query = sprintf($GET_ADS,$nameAd);
        $result = array();
        return $result;

    }

    public function insertAnnuncio($titolo, $descrizione, $contatto, $data, $tag, $idUtente, $idCategoria) {
        $str = "INSERT INTO `ANNUNCIO` (`KEYANNUNCIO`, `TITOLO`, `DESCRIZIONE`, `CONTATTO`, `DATADICARICAMENTO`, `TAG`, `KEYUTENTE`, `KEYCATEGORIA`) 
                  VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $query = sprintf($str, $titolo, $descrizione, $contatto, $data, $tag, $idUtente, $idCategoria);
        $res = mysqli_query($this->db->getConnector(), $query);
    }

}