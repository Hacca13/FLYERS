<?php

class Annuncio {

    private $id;
    private $titolo;
    private $descrizione;
    private $contatto;
    private $date;
    private $utente;

    public function __construct($id1="", $titolo1, $descrizione1, $contatto1, $date1, $utente1) {

        $this->id = $id1;
        $this->titolo = $titolo1;
        $this->descrizione = $descrizione1;
        $this->contatto = $contatto1;
        $this->date = $date1;
        $this->utente = $utente1;
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
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * @return mixed
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @return mixed
     */
    public function getContatto()
    {
        return $this->contatto;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUtente()
    {
        return $this->utente;
    }





}






?>