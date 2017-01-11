<?php
include_once '../model/Annuncio.php';
include_once '../control/Connector.php';

class AnnuncioManager {

    private $db;

    public function __construct() {
        $this->db = new Connector();
    }

    public function getAllAnnuci() {

    }

    public function insertAnnuncio($titolo, $descrizione, $contatto, $data, $tag, $idUtente, $idCategoria) {
        $str = "INSERT INTO `ANNUNCIO` (`KEYANNUNCIO`, `TITOLO`, `DESCRIZIONE`, `CONTATTO`, `DATADICARICAMENTO`, `TAG`, `KEYUTENTE`, `KEYCATEGORIA`) 
                  VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $query = sprintf($str, $titolo, $descrizione, $contatto, $data, $tag, $idUtente, $idCategoria);
        $res = mysqli_query($this->db->getConnector(), $query);
    }





}





?>