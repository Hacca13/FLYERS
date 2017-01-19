<?php
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 11/01/2017
 * Time: 14:56
 */
define('ROOT_DIR', dirname(__FILE__));
define('DOMINIO_SITO', '/FLYERS');//da usare se si va online
define('CORE_DIR', ROOT_DIR . '/core/');
define('VIEW_DIR', CORE_DIR . 'view/');
define('MODEL_DIR', CORE_DIR . 'model/');
define('BEANS_DIR', CORE_DIR . 'beans/');
define('CONTROL_DIR', CORE_DIR . 'control/');
define('UPLOADS_DIR', CONTROL_DIR . 'upload/');
define('STYLE_DIR', DOMINIO_SITO . '/core/view/style/');
define('IMG_DIR', DOMINIO_SITO .'/img/');
define('UTILS_DIR', CORE_DIR . 'utils/');
define('FILES_UPLOADED', UPLOADS_DIR. 'files_uploaded/');
define('IMG_PROFILES', UPLOADS_DIR . 'img_profiles/');

    /*
     * URL Parsing, in pratica qualsiasi richiesta al sito arriva a questo file,
     * e quindi possiamo ricavare la richiesta da $_SERVER['SCRIPT_NAME']
     *
     * Successivamente rimuovo tutto ciò che non dovrebbe stare nella richiesta e faccio split
     *
     */
    $_URL = preg_replace("/^(.*?)index.php$/", "$1", $_SERVER['SCRIPT_NAME']);
    $_URL = preg_replace("/^" . preg_quote($_URL, "/") . "/", "", urldecode($_SERVER['REQUEST_URI']));
    $_URL = preg_replace("/(\/?)(\?.*)?$/", "", $_URL);
    $_URL = explode("/", $_URL);
    if (preg_match("/^index.(?:html|php)$/i", $_URL[count($_URL) - 1]))
        unset($_URL[count($_URL) - 1]);
    // definisco costante IP contenente l'ip del client
    if (isset($_SERVER['HTTP_X_REAL_IP'])) {
        define('IP', $_SERVER['HTTP_X_REAL_IP']);
    } else {
        define('IP', $_SERVER['REMOTE_ADDR']);
    }
    session_start(); //facciamo partire la sessione

    if (!defined("TESTING")) {
        switch (isset($_URL[0]) ? $_URL[0] : '') {
            //CONTROL
            case 'search':
                include_once CONTROL_DIR . "searchBarControl.php";
                break;
            case 'homeAnnunci':
                include_once CONTROL_DIR . "getAnnunci.php";
                break;
            case 'homeAppunti':
                include_once CONTROL_DIR . "getAppunti.php";
                break;
            case 'insertAnnuncio':
                include_once CONTROL_DIR . "inserisciAnnuncioControl.php";
                break;
            case 'insertAppunto':
                include_once CONTROL_DIR . "inserisciAppuntoControl.php";
                break;
            case 'visualizzaAppunto':
                include_once CONTROL_DIR . "visualizzaFile.php";
                break;
            case 'scaricaAppunto':
                include_once CONTROL_DIR . "scaricaAppunti.php";
                break;
            case 'registrazione':
                include_once CONTROL_DIR . "registrazione.php";
                break;

            //VIEWS
            case 'home':
                include_once VIEW_DIR . "home.php";
                break;
            case 'inserisciAnnucio':
                include_once VIEW_DIR . "inserisciAnnuncio.php";
                break;
            case 'inserisciAppunto':
                include_once VIEW_DIR . "inserisciAppunto.php";
                break;
            case 'listaAppunti':
                include_once VIEW_DIR . "listaAppunti.php";
                break;
            case 'listaAnnunci':
                include_once VIEW_DIR . "listaAnnunci.php";
                break;
            case 'login':
                include_once VIEW_DIR ."login.php";
                break;
            case 'modificaProfiloUtente':
                include_once VIEW_DIR . "modificaProfiloUtente.php";
                break;
            case 'profiloUtente':
                include_once VIEW_DIR . "profiloUtente.php";
                break;
            case 'regFail':
                include_once VIEW_DIR . "regFail.php";
                break;
            default:
                include_once VIEW_DIR ."404.php";
                break;
        }

    }

