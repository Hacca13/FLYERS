<!DOCTYPE html>
<html lang="en">

<head>

    <title>Flyers | Home</title>
    <?php include_once VIEW_DIR . 'headerStart.php'?>
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
                    <p><a class="btn btn-lg btn-primary" href="<?php echo DOMINIO_SITO;?>/categorie" role="button">Dai uno sguardo</a></p>
                </div>
            </div>
        </div>
        <div class="item"> <img src="<?php echo IMG_DIR;?>annunci.jpg" style="width:100%" data-src="" alt="Second    slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Annunci</h1>
                    <p>Consulta oppure pubblica un annuncio universitario.</p>
                    <p><a class="btn btn-lg btn-primary" href="<?php echo DOMINIO_SITO;?>/listaAnnunci" role="button">Consulta gli annunci</a></p>
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

</body>

</html>
