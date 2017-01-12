<?php

class Categoria {

    private $id;
    private $nome;

    public function __construct($id1="", $nome1) {

        $this->id = $id1;
        $this->nome = $nome1;

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




}



?>