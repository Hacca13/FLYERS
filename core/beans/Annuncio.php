<?php

/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 12/01/2017
 * Time: 09:53
 */
class Annuncio
{

    private $keyAnnuncio;
    private $titolo;
    private $descrizione;
    private $contatto;
    private $dataDiCaricamento;
    private $keyUtente;

    /**
     * Annuncio constructor.
     * @param $keyAnnuncio
     * @param $titolo
     * @param $descrizione
     * @param $contatto
     * @param $dataDiCaricamento
     * @param $keyUtente
     */
    public function __construct( $titolo, $descrizione, $contatto, $dataDiCaricamento, $keyUtente)
    {
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->contatto = $contatto;
        $this->dataDiCaricamento = $dataDiCaricamento;
        $this->keyUtente = $keyUtente;
    }

    /**
     * @return mixed
     */
    public function getKeyAnnuncio()
    {
        return $this->keyAnnuncio;
    }

    /**
     * @param mixed $keyAnnuncio
     */
    public function setKeyAnnuncio($keyAnnuncio)
    {
        $this->keyAnnuncio = $keyAnnuncio;
    }

    /**
     * @return mixed
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * @param mixed $titolo
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
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
    public function getContatto()
    {
        return $this->contatto;
    }

    /**
     * @param mixed $contatto
     */
    public function setContatto($contatto)
    {
        $this->contatto = $contatto;
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