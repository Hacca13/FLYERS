<?php

/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 12/01/2017
 * Time: 09:53
 */
class Tag
{
    private $keyTag;
    private $nome;

    /**
     * Tag constructor.
     * @param $keyTag
     * @param $nome
     */
    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getKeyTag()
    {
        return $this->keyTag;
    }

    /**
     * @param mixed $keyTag
     */
    public function setKeyTag($keyTag)
    {
        $this->keyTag = $keyTag;
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




}