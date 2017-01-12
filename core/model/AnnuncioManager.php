<?php

/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:51
 */
class AnnucioManager
{

    public function __construct()
    {

    }


    public function searchAds($nameAd){
        $GET_ADS = "SELECT * FROM annnunci WHERE LIKE '%s'";
        $query = sprintf($GET_ADS,$nameAd);
        $result = array();
        return $result;

    }
}