<?php
include_once BEANS_DIR ."Annuncio.php";
include_once MODEL_DIR . "AnnunciManager.php";
include_once BEANS_DIR . "Utente.php";

if(isset($_POST['titolo'])){
    $titolo = $_POST['titolo'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Inserisci il titolo";
    header("Location:". DOMINIO_SITO."/inserisciAnnuncio");
}

if(isset($_POST['tags'])) {
    $tags = $_POST['tags'];
    $result = explode(",",$tags);
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Inserisci almeno un tag";
    header("Location:". DOMINIO_SITO."/inserisciAnnuncio");
}

if(isset($_POST['descrizione'])){
    $descrizione = $_POST['descrizione'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Inserisci la descrizione";
    header("Location:". DOMINIO_SITO."/inserisciAnnuncio");
}

if(isset($_POST['contatto'])) {
    $contatto = $_POST['contatto'];
}else{
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Inserisci un contatto";
    header("Location:". DOMINIO_SITO."/inserisciAnnuncio");
}

$user = unserialize($_SESSION["user"]);
$keyUtente = $user->getKeyUtente();

$data = date("Y-m-d");
$manager = new AnnuncioManager();
$annuncio = new Annuncio(null,$titolo, $descrizione, $contatto, $data, $keyUtente,$result);
$manager->insertAnnuncio($annuncio);

$_SESSION['toast-type'] = "success";
$_SESSION['toast-message'] = "Annuncio inserito con successo!";

header("Location:". DOMINIO_SITO."/getAnnunci");

?>
