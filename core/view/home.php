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

<body id="page-top" class="index">

<!-- Navigation -->
<?php include_once VIEW_DIR .'header.php'?>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="<?php echo IMG_DIR;?>paperplane.png" width="300" alt="">
                <div class="intro-text">
                    <span class="name">Flyers</span>
                    <hr class="star-light">
                    <span class="skills">Carica e scarica appunti in base alla categoria scelta.</span>
                    <br>
                    <span class="skills">Consulta e publica annunci universitari</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active"> <img src="<?php echo IMG_DIR;?>appunti.jpg" style="width:100%" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Appunti</h1>
                    <p>Upload e Download di appunti utili al tuo studio.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Dai uno sguardo</a></p>
                </div>
            </div>
        </div>
        <div class="item"> <img src="<?php echo IMG_DIR;?>annunci.jpg" style="width:100%" data-src="" alt="Second    slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Annunci</h1>
                    <p>Consulta oppure pubblica un annuncio universitario.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Consulta gli annunci</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> </div>


<!-- Footer -->
<?php include_once VIEW_DIR .'footer.php'?>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>



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
