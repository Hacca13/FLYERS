<?php include_once BEANS_DIR . "Annuncio.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flyers | I Miei Appunti</title>
    <?php include_once VIEW_DIR . "headerStart.php"?>

</head>


<body>

<!-- Navigation -->
<?php  include_once VIEW_DIR ."header.php"; ?>
<!-- Header -->



<section>
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>I Miei Annunci</h2>
                <hr class="star-primary">
            </div>
        </div>

        <?php
        if(isset($annunci)){
            if(count($annunci)>0){


                for ($i = 0; $i < count($annunci); $i++) {
                    ?>
                    <div class="row">
                        <div class="col-lg-12 col-md 12- col-sm-12 col-xs-12">
                            <p><b> Titolo:</b>&nbsp <?php echo $annunci[$i]->getTitolo();?></p>
                            <p><b> Descrizione: </b>&nbsp <?php echo $annunci[$i]->getDescrizione();?></p>
                            <p><b> Tag:</b>&nbsp <?php $tags = $annunci[$i]->getTags();

                                for($j=0;$j<count($tags);$j++){
                                    echo $tags[$j]->getNome()." ";
                                }
                                ?></p>
                            <p><b> Utente:</b>&nbsp <?php echo $usersNameAds[$i] ?> </p>
                            <p><b> Contatto:</b>&nbsp <?php echo $annunci[$i]->getContatto();?></p>
                            <p><b> Data:</b>&nbsp <?php echo $annunci[$i]->getDataDiCaricamento();?></p>
                        </div>
                    </div>
                    <hr>

                    <?php
                }
            }else{ ?>
                <div>
                    <p><b>Non ci sono annunci.</b></p>
                </div>

            <?php }
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
