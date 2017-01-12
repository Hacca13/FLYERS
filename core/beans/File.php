<?php

/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 12/01/2017
 * Time: 09:54
 */
class File
{

    private $keyFile;
    private $nome;
    private $categoria;
    private $descrizione;
    private $raiting;
    private $dataDiCaricamento;
    private $keyUtente;

    /**
     * File constructor.
     * @param $keyFile
     * @param $nome
     * @param $categoria
     * @param $descrizione
     * @param $raiting
     * @param $dataDiCaricamento
     * @param $keyUtente
     */
    public function __construct($keyFile, $nome, $categoria, $descrizione, $raiting, $dataDiCaricamento, $keyUtente)
    {
        $this->keyFile = $keyFile;
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->descrizione = $descrizione;
        $this->raiting = $raiting;
        $this->dataDiCaricamento = $dataDiCaricamento;
        $this->keyUtente = $keyUtente;
    }

    /**
     * @return mixed
     */
    public function getKeyFile()
    {
        return $this->keyFile;
    }

    /**
     * @param mixed $keyFile
     */
    public function setKeyFile($keyFile)
    {
        $this->keyFile = $keyFile;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @param mixed $descrizione
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return mixed
     */
    public function getRaiting()
    {
        return $this->raiting;
    }

    /**
     * @param mixed $raiting
     */
    public function setRaiting($raiting)
    {
        $this->raiting = $raiting;
    }

    /**
     * @return mixed
     */
    public function getDataDiCaricamento()
    {
        return $this->dataDiCaricamento;
    }

    /**
     * @param mixed $dataDiCaricamento
     */
    public function setDataDiCaricamento($dataDiCaricamento)
    {
        $this->dataDiCaricamento = $dataDiCaricamento;
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



}