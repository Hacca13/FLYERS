<?php

/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 12/01/2017
 * Time: 09:51
 */

class Utente
{

    private $keyUtente;
    private $id;
    private $email;
    private $citta;
    private $password;

    /**
     * Utente constructor.
     * @param $keyUtente
     * @param $id
     * @param $email
     * @param $citta
     * @param $password
     */
    public function __construct($keyUtente,$id,$email, $citta, $password)
    {
        $this->keyUtente = $keyUtente;
        $this->id = $id;
        $this->email = $email;
        $this->citta = $citta;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getKeyUtente()
    {
        return $this->keyUtente;
    }

    /**
     * @param mixed $keyUtente
     */
    public function setKeyUtente($keyUtente)
    {
        $this->keyUtente = $keyUtente;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCitta()
    {
        return $this->citta;
    }

    /**
     * @param mixed $citta
     */
    public function setCitta($citta)
    {
        $this->citta = $citta;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }



}