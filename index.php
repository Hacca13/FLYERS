<?php
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 11/01/2017
 * Time: 14:56
 */
define('ROOT_DIR', dirname(__FILE__));
define('DOMINIO_SITO', "/FLYERS");
define('CORE_DIR', DOMINIO_SITO. DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
define('VIEW_DIR', CORE_DIR . "view" . DIRECTORY_SEPARATOR);
define('MODEL_DIR', CORE_DIR . "model" . DIRECTORY_SEPARATOR);
define('BEANS_DIR', CORE_DIR . "beans" . DIRECTORY_SEPARATOR);
define('CONTROL_DIR', CORE_DIR . "control" . DIRECTORY_SEPARATOR);
define('UPLOADS_DIR', DOMINIO_SITO . "/uploads/"); //cartella dove caricare le cose caricate su server
define('STYLE_DIR', CORE_DIR . "style" . DIRECTORY_SEPARATOR);
define('UTILS_DIR', CORE_DIR . "utils" . DIRECTORY_SEPARATOR);
