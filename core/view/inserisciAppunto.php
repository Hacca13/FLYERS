


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flyers | inserisciAppunto</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo STYLE_DIR;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="<?php echo STYLE_DIR;?>css/freelancer.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo STYLE_DIR;?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<?php include_once VIEW_DIR . 'header.php'?>

<!-- Header -->
<section id="contact">
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Inserisci Appunto</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="../control/inserisciAppuntoControl.php" method="post" enctype="multipart/form-data">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Titolo</label>
                            <input type="text" class="form-control" placeholder="Titolo" id="titolo" name="titolo" required data-validation-required-message="Inserisci un titolo.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Tags</label>
                            <input type="text" class="form-control" placeholder="Tags" id="tags" name="tags" required data-validation-required-message="Inserisci almeno un tag.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Categorie</label>
                            <select class="form-control" name="categorie">
                                <option value="" disabled selected>Seleziona una Categoria</option>
                                <option value="Matematica">Matematica</option>
                                <option value="Biologia">Biologia</option>
                                <option value="Chimica">Chimica</option>
                                <option value="Fisica">Fisica</option>
                                <option value="Informatica">Informatica</option>
                                <option value="Scienze Ambientali">Scienze Ambientali</option>

                            </select>

                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Descrizione</label>
                            <textarea rows="5" class="form-control" placeholder="Descrizione" id="descrizione" name="descrizione" required data-validation-required-message="Inserisci una descrizione."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Scegli file</label>
                            <input type="file" placeholder="Nessun file scelto.." name="file">
                        </div>
                    </div>


                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12" style="float: right;">
                            <button type="reset" class="btn btn-danger btn-lg" style="float: right;">Cancella</button>
                            <button type="submit" class="btn btn-success btn-lg" style="float: right;">Inserisci</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






<!-- Footer -->
<?php include_once VIEW_DIR . 'footer.php'?>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>



<!-- jQuery -->
<script src="<?php echo STYLE_DIR;?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo STYLE_DIR;?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo STYLE_DIR;?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo STYLE_DIR;?>js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="<?php echo STYLE_DIR;?>js/freelancer.min.js"></script>

</body>

</html>

