<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flyers | Categorie</title>
    <?php include_once VIEW_DIR . "headerStart.php"?>
</head>

<body id="page-top" class="index">

<!-- Navigation -->
<?php include_once VIEW_DIR . 'header.php'?>


<!-- Portfolio Grid Section -->
<section id="portfolio" style="margin-top: 10%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>Appunti</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin:2%;float:right;">
                    <?php if(isset($_SESSION["user"])){ ?>
                        <a href="<?php echo DOMINIO_SITO;?>/inserisciAppunti">
                            <button type="submit" class="btn btn-success btn-lg">
                                Aggiungi nuovi appunti +
                            </button>
                        </a>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo DOMINIO_SITO;?>/getAppunti/Biologia" class="portfolio-link" data-toggle="modal">
                    <div align="center"><h4>Biologia</h4></div>
                    <img src="<?php echo DOMINIO_SITO;?>/img/categories/biologia.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo DOMINIO_SITO;?>/getAppunti/Chimica" class="portfolio-link" data-toggle="modal">
                    <div align="center"><h4>Chimica</h4></div>
                    <img src="<?php echo DOMINIO_SITO;?>/img/categories/chimica.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo DOMINIO_SITO;?>/getAppunti/Fisica" class="portfolio-link" data-toggle="modal">
                    <div align="center"><h4>Fisica</h4></div>
                    <img src="<?php echo DOMINIO_SITO;?>/img/categories/fisica.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo DOMINIO_SITO;?>/getAppunti/Informatica" class="portfolio-link" data-toggle="modal">
                    <div align="center"><h4>Informatica</h4></div>
                    <img src="<?php echo DOMINIO_SITO;?>/img/categories/informatica.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo DOMINIO_SITO;?>/getAppunti/Matematica" class="portfolio-link" data-toggle="modal">
                    <div align="center"><h4>Matematica</h4></div>
                    <img src="<?php echo DOMINIO_SITO;?>/img/categories/matematica.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo DOMINIO_SITO;?>/getAppunti/Scienze Ambientali" class="portfolio-link" data-toggle="modal">
                    <div align="center"><h4>Scienze Ambientali</h4></div>
                    <img src="<?php echo DOMINIO_SITO;?>/img/categories/scienze%20ambientali.png" class="img-responsive" alt="">
                </a>
            </div>
        </div>
    </div>
</section>



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
