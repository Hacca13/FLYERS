<?php

include_once MODEL_DIR . "AnnuncioManager.php";

if(isset($_POST['titolo']) && $_POST['titolo']!= null) {
    $titolo = $_POST['titolo'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Inserisci il titolo";
}

if(isset($_POST['tags']) && $_POST['tags']!= null) {
    $tags = $_POST['tags'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Inserisci almeno un tag";
}


if(isset($_POST['descrizione']) && $_POST['descrizione']!= null) {
    $descrizione = $_POST['descrizione'];
} else {
    $_SESSION['toast-type'] = "error";
    $_SESSION['toast-message'] = "Inserisci la descrizione";
}


$data = date("Y-m-d");
$manager = new AnnuncioManager();
$contatto = 2;
$idUtente = 1;
$manager->insertAnnuncio($titolo, $descrizione, $contatto, $data, $idUtente);

include_once CONTROL_DIR ."getAnnunci.php";

?>

