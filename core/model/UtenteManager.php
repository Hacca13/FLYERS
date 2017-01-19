<?php

include_once BEANS_DIR . 'Utente.php';
include_once 'Connector.php';
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:43
 */
class UtenteManager
{

    private $db;

    public function __construct() {
        $this->db = new Connector();
    }

    function insertUser($id, $email, $citta, $password){
        $str = "INSERT INTO `UTENTE` (`KEYUTENTE`, `ID`, `EMAIL`, `CITTA`, `PASS`) 
                  VALUES (NULL, '%s', '%s', '%s', '%s')";
        $query = sprintf($str, $id, $email, $citta, $password);
        $res = mysqli_query($this->db->getConnector(), $query);
    }

    function updateUser(){

    }

    function searchUser (){

    }

    function getAllUser() {
        $str = "SELECT * FROM `UTENTE`";
        $res = mysqli_query($this->db->getConnector(), $str);
        $users = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $utente = new Utente($obj['KEYUTENTE'], $obj['ID'], $obj['EMAIL'], $obj['CITTA'], $obj['PASS']);
                $users[] = $utente;
            }
        }
        return $users;
    }

}