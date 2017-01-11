<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 11/01/2017
 * Time: 12:23
 */


class SearchManager
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

    public function searchAds($nameAd){
        $GET_ADS = "SELECT * FROM annnunci WHERE LIKE '%s'";
        $query = sprintf($GET_ADS,$nameAd);
        $result = array();
        return $result;

    }

    public function searchNotes($nameNotes){
        $GET_NOTES = "SELECT * FROM appunti WHERE LIKE '%s'";
        $query = sprintf($GET_NOTES,$nameNotes);
        $result = array();
        return $result;

    }

    public function searchNotesByCategory($nameCategory){
        $GET_NOTES_BY_CATEGORY = "SELECT * FROM appunti,categoria WHERE appunti.id_categoria = categoria.id 
                                    AND categoria.nome = '%s'";
        $query = sprintf($GET_NOTES_BY_CATEGORY,$nameCategory);
        $result = array();
        return $result;
    }
}