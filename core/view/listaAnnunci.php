
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flyers | Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo STYLE_DIR; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="<?php echo STYLE_DIR; ?>css/freelancer.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo STYLE_DIR; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

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
                <a href="<?php echo "inserisciAnnucio"?>">
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


<!-- jQuery -->
<script src="<?php echo STYLE_DIR; ?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo STYLE_DIR; ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo STYLE_DIR; ?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo STYLE_DIR; ?>js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="<?php echo STYLE_DIR; ?>js/freelancer.min.js"></script>





</body>
</html>