<?php

include_once BEANS_DIR . 'Utente.php';
include_once MODEL_DIR .'Connector.php';
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:43
 */
class UtenteManager
{

    public function __construct() {
    }

    function insertUser($user){
        $insertSql = "INSERT INTO UTENTE (ID, EMAIL, CITTA, PASS) VALUES ('%s', '%s', '%s', '%s'); SELECT LAST_INSERT_ID();";
        $query = sprintf($insertSql,$user->getId(),$user->getEmail(),$user->getCitta(),$user->getPassword());
        $result_query = mysqli_query(Connector::getConnector(), $query);
        if($result_query) {
            $tmp = $result_query->fetch_assoc();
            $keyUtente = $tmp["LAST_INSERT_ID()"];
            return $keyUtente;
        }
    }

    function updateUser($keyUtente,$utente){
        $updateSql = "UPDATE UTENTE SET (ID='%s', EMAIL='%s', CITTA='%s', PASS='%s') WHERE KEYUTENTE = '%s'";
        $query = sprintf($updateSql,$utente->getId(),$utente->getEmail(),$utente->getCitta(),$utente->getPassword(), $keyUtente);
        mysqli_query(Connector::getConnector(), $query);
    }

    function getUtenteByKeyUtente($keyUtente){
        $selectSql ="SELECT * FROM UTENTE WHERE KEYUTENTE = '%s'";
        $query = sprintf($selectSql,$keyUtente);
        $res = mysqli_query(Connector::getConnector(), $query);
        if ($res) {
            while ($r = $res->fetch_assoc()) {
                $user = new Utente($r['KEYUTENTE'],$r['ID'], $r['EMAIL'], $r['CITTA'], $r['PASS']);
                return $user;
            }
        }
        return false;
    }

    function getUtenteById($id){
        $selectSql ="SELECT * FROM UTENTE WHERE ID = '%s'";
        $query = sprintf($selectSql,$id);
        $res = mysqli_query(Connector::getConnector(), $query);
        if ($res) {
            while ($r = $res->fetch_assoc()) {
                $user = new Utente($r['KEYUTENTE'],$r['ID'], $r['EMAIL'], $r['CITTA'], $r['PASS']);
                return $user;
            }
        }
        return false;
    }


    function checkLogin($username,$password){
        $checkLogin ="SELECT * FROM UTENTE WHERE ID ='%s' AND PASS = '%s'";
        $query = sprintf($checkLogin,$username,$password);
        $res = mysqli_query(Connector::getConnector(), $query);
        if ($res) {
            while ($r = $res->fetch_assoc()) {
                return true;
            }
        }
        return false;
    }

    function existEmail($email){
        $checkLogin ="SELECT * FROM UTENTE WHERE EMAIL ='%s'";
        $query = sprintf($checkLogin,$email);
        $res = mysqli_query(Connector::getConnector(), $query);
        if ($res) {
            while ($r = $res->fetch_assoc()) {
                return true;
            }
        }
        return false;
    }

    function existUsername($username){
        $checkLogin ="SELECT * FROM UTENTE WHERE ID ='%s'";
        $query = sprintf($checkLogin,$username);
        $res = mysqli_query(Connector::getConnector(), $query);
        if ($res) {
            while ($r = $res->fetch_assoc()) {
                return true;
            }
        }
        return false;
    }


}