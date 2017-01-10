<?php

echo "ok";

if(isset($_POST['titolo']) && $_POST['titolo']!= null) {
    $titolo = $_POST['titolo'];
} else {
    //toast
}

if(isset($_POST['descrizione']) && $_POST['descrizione']!= null) {
    $descrizione = $_POST['descrizione'];
} else {
    //toast
}






?>