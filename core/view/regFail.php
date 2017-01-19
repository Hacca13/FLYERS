<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flyers | Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo STYLE_DIR;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo STYLE_DIR;?>css/freelancer.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo STYLE_DIR;?>css/modCustom.css">

    <!-- Custom Fonts -->
    <link href="<?php echo STYLE_DIR;?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>Login</h2>
                    <hr class="star-primary">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="<?php echo DOMINIO_SITO;?>/login" method="post">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="Username" id="Username" required="" data-validation-required-message="Please enter your name." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="" data-validation-required-message="Please enter your password." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Accedi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>Registrazione</h2>
                    <hr class="star-primary">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="<?php echo DOMINIO_SITO; ?>/registrazione" method="post">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username" id="Username" required="" data-validation-required-message="Please enter your name." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="" data-validation-required-message="Please enter your name." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Città</label>
                                    <input type="text" class="form-control" placeholder="Città" name="citta" id="citta" required="" data-validation-required-message="Please enter your name." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="" data-validation-required-message="Please enter your name." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <h5>Username/Email esistente!</h5>


                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Registrati</button>
                                    <button type="reset" class="btn btn-danger btn-lg">Cancella</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php include_once "footer.php"?>
</body>

<!-- jQuery -->
<script src="<?php echo STYLE_DIR;?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo STYLE_DIR;?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo STYLE_DIR;?>js/jqBootstrapValidation.js"></script>

<!-- Theme JavaScript -->
<script src="<?php echo STYLE_DIR;?>js/freelancer.min.js"></script>

<!--DropDown menu PrivacyUser-->
<script src="<?php echo STYLE_DIR;?>js/privacyUser.js"></script>

<!--DropDown menu Search Bar-->
<script src="<?php echo STYLE_DIR;?>js/searchBarDropDown.js"></script>

</html>