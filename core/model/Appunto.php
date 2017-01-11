<?php

class Appunto {

    private $id;
    private $nome;
    private $descrizione;
    private $raiting;
    private $file;
    private $data;
    private $idCategoria;
    private $idUtente;

    public function __construct($id1="", $nome1, $descrizione1, $raiting1, $file1, $data1, $idCategoria1, $idUtente1) {

        $this->id = $id1;
        $this->nome = $nome1;
        $this->descrizione = $descrizione1;
        $this->raiting = $raiting1;
        $this->file = $file1;
        $this->data = $data1;
        $this->idCategoria = $idCategoria1;
        $this->idUtente = $idUtente1;

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
    public function getNome()
    {
        return $this->nome;
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
    public function getRaiting()
    {
        return $this->raiting;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @return mixed
     */
    public function getIdUtente()
    {
        return $this->idUtente;
    }




}


?>