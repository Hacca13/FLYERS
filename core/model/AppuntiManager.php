<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:43
 */
class AppuntiManager
{

    public function __construct()
    {

    }

    public function searchNotes($nameNotes){
        $GET_NOTES = "SELECT * FROM appunti WHERE LIKE '%s'";
        $query = sprintf($GET_NOTES,$nameNotes);
        $result = array();
        return $result;

    }
}