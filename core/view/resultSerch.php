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

    <title>Flyers | Il tuo Profilo</title>

    <!-- Bootstrap Core CSS -->
    <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="style/css/freelancer.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="style/css/modCustom.css">

    <!-- Custom Fonts -->
    <link href="style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
<?php include_once "header.php"?>
<section class="main-section">
    <div class="container">
        <?php
                foreach ($result as $a){
                        if($a instanceof Appunto ){
             ?>
                        /*HTML per appunti*/

                    <?php}else if($a instanceof Annuncio){?>

                        /*HTML per annuncio*/

                  <?php  }?>

        <?    }?>

    </div>
</section>
<?php include_once "footer.php"?>
</body>

<!-- jQuery -->
<script src="style/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="style/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="style/js/jqBootstrapValidation.js"></script>

<!-- Theme JavaScript -->
<script src="style/js/freelancer.min.js"></script>

<!--DropDown menu PrivacyUser-->
<script src="style/js/privacyUser.js"></script>

<!--DropDown menu Search Bar-->
<script src="style/js/searchBarDropDown.js"></script>

</html>