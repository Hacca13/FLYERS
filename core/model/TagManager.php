<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:43
 */
class TagManager
{
    public function __construct()
    {

    }


    public function searchByTag($nameTag){
        $GET_TAG_REFERENCES_OBJECTS = "SELECT * FROM annuncio,tag,appunti WHERE annuncio.id = tag.id_annuncio 
                                        AND appunti.id = tag.id_appunti LIKE '%s'";
        $query = sprintf($GET_TAG_REFERENCES_OBJECTS,$nameTag);
        $result = array();//query
        return $result;

    }
}