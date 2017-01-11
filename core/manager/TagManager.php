<?php
include_once '../model/Tag.php';
include_once '../control/Connector.php';

class TagManager {
    private $db;

    public function __construct() {
        $this->db = new Connector();
    }

    public function insertTag($nome, $idAnnuncio, $idFile) {
        $sql = "INSERT INTO `TAG` (`KEYTAG`, `NOME`, `KEYANNUNCIO`, `KEYFILE`) VALUES (NULL, '%s', '%s', '%s')";
        $query = sprintf($sql, $nome, $idAnnuncio, $idFile);
        $res = mysqli_query($this->db->getConnector(), $query);
    }

}



?>