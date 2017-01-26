<?php include_once BEANS_DIR ."Annuncio.php"?>
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

<section id="contact">
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>Lista Annunci </h2>
                <hr class="star-primary">

                <?php if(isset($_SESSION["user"])){ ?>
                    <a href="<?php echo DOMINIO_SITO;?>/inserisciAnnuncio">
                    <button type="submit" class="btn btn-success btn-lg" style="float: right;">Aggiungi nuovo Annuncio +</button>
                </a>
                <?php } ?>

            </div>
        </div>


        <?php
        for ($i = 0; $i < count($annunci); $i++) {
            ?>

            <div class="row">
                <div class="col-lg-12 col-md 12- col-sm-12 col-xs-12">
                    <p><b> Titolo:</b>&nbsp <?php echo $annunci[$i]->getTitolo();?></p>
                    <p><b> Descrizione: </b>&nbsp <?php echo $annunci[$i]->getDescrizione();?></p>
                    <p><b> Tag:</b>&nbsp Affitto &nbsp Camera &nbsp Singola</p>
                    <P><b> Utente:</b>&nbsp <?php ?> </P>
                    <p><b> Data:</b>&nbsp <?php echo $annunci[$i]->getDataDiCaricamento();?></p>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</section>



<!-- Footer -->
<?php  include_once VIEW_DIR . "footer.php"; ?>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

</body>
</html>