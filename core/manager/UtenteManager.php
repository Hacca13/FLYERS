<?php

include_once '../model/Utente.php';
include_once '../control/Connector.php';

class UtenteManager
{

    private $db;

    public function __construct()
    {
        $this->db = new Connector();
    }


    public function getAllUtenti()
    {
        $sql = "SELECT * FROM UTENTI";

        $res = mysqli_query($this->db->getConnector(), $sql);
        $utenti = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $utenti = new Utente($obj['KEYUTENTE'], $obj['ID'], $obj['EMAIL'], $obj['CITTA'], $obj['PASS']);
                $utenti[] = $utenti;
            }
        }
        return $utenti;
    }

    public function insertUtente($id, $username, $email, $citta, $password) {
        $str = "INSERT INTO `UTENTE` (`KEYUTENTE`, `ID`, `EMAIL`, `CITTA`, `PASS`) 
                  VALUES (NULL, '%s', '%s', '%s', '%s', '%s')";
        $query = sprintf($str, $id, $username, $email, $citta, $password);
        $res = mysqli_query($this->db->getConnector(), $query);
    }

}

?>