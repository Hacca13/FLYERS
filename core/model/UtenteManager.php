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

    function insertUser($id, $email, $citta, $password){
        $INSERT_USER = "INSERT INTO UTENTE (ID, EMAIL, CITTA, PASS) VALUES ('%s', '%s', '%s', '%s')";
        $query = sprintf($INSERT_USER, $id, $email, $citta, $password);
        $res = mysqli_query(Connector::getConnector(), $query);
    }

    function updateUser($keyUtente,$utente){
        $UPDATE_USER = "UPDATE INTO UTENTE SET (ID='%s', EMAIL='%s', CITTA='%s', PASS='%s') WHERE KEYUTENTE = '%s'";
        $query = sprintf($UPDATE_USER,$utente->getId(),$utente->getEmail(),$utente->getCitta(),$utente->getPassword(), $keyUtente);
        $res = mysqli_query(Connector::getConnector(), $query);
    }

    function getUtenteByKeyUtente($keyUtente){
        $GET_USER_BY_ID ="SELECT * FROM UTENTE WHERE KEYUTENTE = '%s'";
        $query = sprintf($GET_USER_BY_ID,$keyUtente);
        $res = mysqli_query(Connector::getConnector(), $query);

        while($r = $res->fetch_assoc()){
            $user = new Utente($r['ID'],$r['EMAIL'],$r['CITTA'],$r['PASS']);
            return $user;
        }

        return false;
    }

    function checkID($idUtente){
        $CHECK_ID = "SELECT * FROM UTENTE WHERE ID='%s'";
        $query = sprintf($CHECK_ID,$idUtente);
        $res = mysqli_query(Connector::getConnector(), $query);
        return $res;
    }

    function checkEmail($emailUtente){
        $CHECK_EMAIL ="SELECT * FROM UTENTE WHERE EMAIL ='%s'";
        $query = sprintf($CHECK_EMAIL,$emailUtente);
        $res = mysqli_query(Connector::getConnector(), $query);

        return $res;
    }

    function checkLogin($username,$password){
        $checkLogin ="SELECT * FROM UTENTE WHERE ID ='%s' AND PASS = '%s'";
        $query = sprintf($checkLogin,$username,$password);
        $res = mysqli_query(Connector::getConnector(), $query);

        return $res;
    }

    function getKeyUtenteByID($idUtente){
        $GET_KEYUTENTE = "SELECT KEYUTENTE FROM UTENTE WHERE ID = '%s'";
        $query = sprintf($GET_KEYUTENTE,$idUtente);
        $res = mysqli_query(Connector::getConnector(), $query);
        while($r = $res->fetch_assoc()){
            return $r['ID'];
        }
    }

    function getyUtenteByID($idUtente){
        $getUtente = "SELECT * FROM UTENTE WHERE ID = '%s'";
        $query = sprintf($getUtente,$idUtente);
        $res = mysqli_query(Connector::getConnector(), $query);
        while($r = $res->fetch_assoc()){
            $user = new Utente($r['ID'],$r['EMAIL'],$r['CITTA'],$r['PASS']);
            return $user;
        }
    }

}