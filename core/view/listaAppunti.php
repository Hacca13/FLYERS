<?php
include_once "../control/getAppunti.php";

if(isset($_SESSION['appunti']) && $_SESSION['appunti'] != null) {
    $appunti = array();
    $appunti = unserialize($_SESSION['appunti']);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FLYERS</title>

    <!-- Bootstrap Core CSS -->
    <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="style/css/freelancer.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
<?php  include_once"header.php"; ?>
<!-- Header -->


<!-- Header -->
<section id="contact">
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Scarica file </h2>
                <hr class="star-primary">
                <button type="submit" class="btn btn-success btn-lg" style="float: right;">Aggiungi nuovi appunti +</button>
            </div>
        </div>


        <?php

        for ($i = 0; $i < count($appunti); $i++) {
            ?>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <br>
                        <div class="row" style="  position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;">
                            <div class="form-group col-xs-12" style="float: right; margin-top: 2%">
                                <P><b> Titolo:</b>&nbsp <?php echo $appunti[$i]->getNome() ?></P>
                                <P><b> Descrizione: </b>&nbsp <?php echo $appunti[$i]->getDescrizione() ?> .</P>
                                <P><b> Tag:</b>&nbsp Affitto &nbsp Camera &nbsp Singola </P>
                                <P><b> Utente:</b>&nbsp <?php ?> </P>
                                <P><b> Data:</b>&nbsp <?php echo $appunti[$i]->getDataDiCaricamento(); ?> </P>
                                <a href="<?php echo $appunti[$i]->getPath();?>"><button class="btn btn-success btn-lg" style="float: right; margin-left: 1%;">Download
                                <i class="fa fa-download"></i></button></a>
                                <a><button class="btn btn-success btn-lg" style="float: right;">Leggi
                                <i class="fa fa-file-pdf-o"></i></button></a>
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
<?php  include_once"footer.php"; ?>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>





<!-- jQuery -->
<script src="style/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="style/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="style/js/jqBootstrapValidation.js"></script>
<script src="style/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="style/js/freelancer.min.js"></script>


</body>
</html>