<?php include_once BEANS_DIR . "Appunti.php"?>
<?php include_once BEANS_DIR . "Annuncio.php"?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flyers | Risultati Ricerca</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo STYLE_DIR; ?>vendor/bootstrap/css/bootstrap.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo STYLE_DIR; ?>css/freelancer.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo STYLE_DIR; ?>css/modCustom.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css"  href="<?php echo STYLE_DIR; ?>vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="index">
<?php include_once VIEW_DIR ."header.php"?>
<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-lg 12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>Risultato Ricerca</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg 12 col-md-12 col-sm-12 col-xs-12 text-center">
                <?php
                if(isset($result)){
                    for($i=0; $i<count($result);$i++){

                        if($result[$i] instanceof Appunto ){
                            ?>
                            <div class="row">
                                <div class="form-group col-xs-12" style=" border-style:solid; float: right;">
                                    <p><b> Titolo:</b><?php echo $result[$i]->getTitolo()?></p>
                                    <p><b> Descrizione:</b><?php echo $result[$i]->getDescrizione()?></p>
                                    <p><b> Tag:</b><?php echo $result[$i]->getTag()?></p>
                                    <button class="btn btn-success btn-lg" style="float: right;">
                                        <a href="#">Download</a></button>
                                </div>
                            </div>

                        <?php} else if($result[$i] instanceof Annuncio){?>

                            <div class="row">
                                <div class="form-group col-xs-12" style=" border-style:solid; float: right;">
                                    <p><b> Titolo:</b><?php echo $result[$i]->getTitolo()?></p>
                                    <p><b> Descrizione:</b><?php echo $result[$i]->getDescrizione()?></p>
                                    <p><b> Tag:</b><?php echo $result[$i]->getTag()?></p>
                                    <button type="submit" class="btn btn-success btn-lg" style="float: right;">Leggi</button>
                                </div>
                            </div>

                        <?php }?>

                    <?    }
                }?>
            </div>
        </div>
    </div>
</section>
<?php include_once VIEW_DIR . "footer.php"?>
</body>

<!-- jQuery -->
<script src="<?php echo STYLE_DIR; ?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo STYLE_DIR; ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo STYLE_DIR; ?>js/jqBootstrapValidation.js"></script>

<!-- Theme JavaScript -->
<script src="<?php echo STYLE_DIR; ?>js/freelancer.min.js"></script>

<!--DropDown menu PrivacyUser-->
<script src="<?php echo STYLE_DIR; ?>js/privacyUser.js"></script>

<!--DropDown menu Search Bar-->
<script src="<?php echo STYLE_DIR; ?>js/searchBarDropDown.js"></script>

</html>