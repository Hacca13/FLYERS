<?php

/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 12/01/2017
 * Time: 09:54
 */
class Appunti
{

    private $keyFile;
    private $nome;
    private $categoria;
    private $descrizione;
    private $path;
    private $dataDiCaricamento;
    private $keyUtente;
    private $listTags;

    /**
     * Appunti constructor.
     * @param $keyFile
     * @param $nome
     * @param $categoria
     * @param $descrizione
     * @param $raiting
     * @param $path
     * @param $dataDiCaricamento
     * @param $keyUtente
     * @param $listTags
     */
    public function __construct($keyFile, $nome, $categoria, $descrizione,$path, $dataDiCaricamento, $keyUtente, $listTags)
    {
        $this->keyFile = $keyFile;
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->descrizione = $descrizione;
        $this->path = $path;
        $this->dataDiCaricamento = $dataDiCaricamento;
        $this->keyUtente = $keyUtente;
        $this->listTags = $listTags;
    }

    /**
     * @return mixed
     */
    public function getKeyFile()
    {
        return $this->keyFile;
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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
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

    /**
     * @return mixed
     */
    public function getListTags()
    {
        return $this->listTags;
    }

    /**
     * @param mixed $listTags
     */
    public function setListTags($listTags)
    {
        $this->listTags = $listTags;
    }


}