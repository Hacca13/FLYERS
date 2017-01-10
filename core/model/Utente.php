<?php

class Utente {

    private $id;
    private $username;
    private $email;
    private $citta;
    private $password;

    public function __construct($id1="", $username1, $email1, $citta1, $password1) {

        $this->id = $id1;
        $this->username = $username1;
        $this->email = $email1;
        $this->citta = $citta1;
        $this->password = $password1;

    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getCitta()
    {
        return $this->citta;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }




}



?>