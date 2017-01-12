<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:44
 */
class CategoriaManager
{

    public function __construct()
    {

    }


    public function searchNotesByCategory($nameCategory){
        $GET_NOTES_BY_CATEGORY = "SELECT * FROM appunti,categoria WHERE appunti.id_categoria = categoria.id 
                                    AND categoria.nome = '%s'";
        $query = sprintf($GET_NOTES_BY_CATEGORY,$nameCategory);
        $result = array();
        return $result;
    }
}