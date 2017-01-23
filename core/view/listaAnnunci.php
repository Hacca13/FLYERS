<?php
include_once CONTROL_DIR ."getAnnunci.php";

$annunci = array();

if(isset($_SESSION['annunci']) && $_SESSION['annunci'] != null) {
    $annunci = unserialize($_SESSION['annunci']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Flyers | Lista Annunci</title>
    <?php include_once VIEW_DIR . "headerStart.php"?>

</head>


<body>

<!-- Navigation -->
<?php  include_once VIEW_DIR . "header.php"; ?>
<!-- Header -->


<!-- Header -->
<section id="contact">
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Lista Annunci </h2>
                <hr class="star-primary">
                <a href="inserisciAnnuncio.php">
                <button type="submit" class="btn btn-success btn-lg" style="float: right;">Aggiungi nuovo annunci +</button>
                </a>
            </div>
        </div>


        <?php

        for ($i = 0; $i < count($annunci); $i++) {
            ?>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="<?php echo DOMINIO_SITO;?>/sentMessage" id="contactForm" novalidate>
                        <br>
                        <div class="row" style="  position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;">
                            <div class="form-group col-xs-12" style="float: right; margin-top: 2%">
                                <P><b> Titolo:</b>&nbsp <?php echo $annunci[$i]->getTitolo()?></P>
                                <P><b> Descrizione: </b>&nbsp <?php echo $annunci[$i]->getDescrizione()?> .</P>
                                <P><b> Tag:</b>&nbsp Affitto &nbsp Camera &nbsp Singola </P>
                                <P><b> Utente:</b>&nbsp <?php ?> </P>
                                <P><b> Data:</b>&nbsp <?php echo $annunci[$i]->getDataDiCaricamento();?> </P>
                                <button type="submit" class="btn btn-success btn-lg" style="float: right;">Leggi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
        }

        ?>


    </div>
</section>



<!-- Footer -->
<<?php  include_once VIEW_DIR . "footer.php"; ?>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

</body>
</html>