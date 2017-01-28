<?php
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 11/01/2017
 * Time: 14:56
 */
define('ROOT_DIR', dirname(__FILE__));
define('DOMINIO_SITO', '/FLYERS');
define('CORE_DIR', ROOT_DIR . '/core/');
define('VIEW_DIR', CORE_DIR . 'view/');
define('MODEL_DIR', CORE_DIR . 'model/');
define('BEANS_DIR', CORE_DIR . 'beans/');
define('CONTROL_DIR', CORE_DIR . 'control/');
define('UPLOAD_FOLDER','C:/xampp/htdocs'); //variabile per stabilire path totale pre - 'FLYERS'
define('UPLOADS_DIR', UPLOAD_FOLDER . DOMINIO_SITO. '/uploads/');
define('STYLE_DIR', DOMINIO_SITO . '/core/view/style/');
define('IMG_DIR', DOMINIO_SITO .'/img/');
define('UTILS_DIR', CORE_DIR . 'utils/');

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
            case 'search':
                include_once CONTROL_DIR . "searchBarControl.php";
                break;
            case 'insertAnnuncio':
                include_once CONTROL_DIR . "inserisciAnnuncioControl.php";
                break;
            case 'insertAppunti':
                include_once CONTROL_DIR . "inserisciAppunti.php";
                break;
            case 'profiloUtente':
                include_once CONTROL_DIR ."getProfiloUtente.php";
                break;
            case 'getAppunti':
                include_once CONTROL_DIR ."getAppunti.php";
                break;
            case 'getAnnunci':
                include_once CONTROL_DIR ."getAnnunci.php";
                break;
            case 'scaricaAppunti':
                include_once CONTROL_DIR . "scaricaAppunti.php";
                break;
            case 'visualizzaFile':
                include_once CONTROL_DIR . "visualizzaFile.php";
                break;
            case 'modificaUtente':
                include_once CONTROL_DIR . "modificaProfiloUtenteControl.php";
                break;
            case 'cambiaPassword':
                include_once CONTROL_DIR ."cambiaPassword.php";
                break;
            case 'registrazione':
                include_once CONTROL_DIR . "registrazione.php";
                break;
            case 'login':
                include_once CONTROL_DIR . "loginControl.php";
                break;
            case 'logout':
                include_once CONTROL_DIR . "logoutControl.php";
                break;
            case '':
                include_once VIEW_DIR . "home.php";
                break;
            case 'categorie':
                include_once VIEW_DIR . "categorie.php";
                break;
            case 'home':
                include_once VIEW_DIR . "home.php";
                break;
            case 'help':
                include_once VIEW_DIR . "help.php";
                break;
            case 'inserisciAnnuncio':
                include_once VIEW_DIR . "inserisciAnnuncio.php";
                break;
            case 'inserisciAppunti':
                include_once VIEW_DIR . "inserisciAppunti.php";
                break;
            case 'autenticazione':
                include_once VIEW_DIR . "autenticazione.php";
                break;
            case 'modificaProfiloUtente':
                include_once VIEW_DIR . "modificaProfiloUtente.php";
                break;
            default:
                include_once VIEW_DIR ."404.php";
                break;
        }

    }

