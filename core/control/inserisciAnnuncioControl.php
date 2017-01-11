<?php

echo "ok";

if(isset($_POST['titolo']) && $_POST['titolo']!= null) {
    echo $titolo = $_POST['titolo'];
} else {
    //toast
}

if(isset($_POST['tags']) && $_POST['tags']!= null) {
    echo $tags = $_POST['tags'];
} else {
    //toast
}


if(isset($_POST['descrizione']) && $_POST['descrizione']!= null) {
    echo $descrizione = $_POST['descrizione'];
} else {
    //toast
}


if(isset($_POST['categorie']) && $_POST['categorie']!= null) {
    echo $categorie = $_POST['categorie'];
} else {
    //toast
}





?>