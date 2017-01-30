<?php
/**
 * Created by PhpStorm.
 * User: Hacca
 * Date: 23/01/2017
 * Time: 09:42
 */

if(isset($_SESSION['user'])) {
    session_destroy();

    header("Location: " . DOMINIO_SITO . "/autenticazione");

}else{

    header("Location:".DOMINIO_SITO);

}