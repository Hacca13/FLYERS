<?php
/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 23/01/2017
 * Time: 09:42
 */

session_destroy();

header ("location: ".DOMINIO_SITO.DIRECTORY_SEPARATOR."login");