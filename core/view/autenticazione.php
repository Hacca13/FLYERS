<!DOCTYPE html>
<html>

<head>
    <title>Flyers | Login</title>
    <?php include_once VIEW_DIR ."headerStart.php"?>

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
                                    <input type="text" class="form-control" placeholder="Username" name="username" id="Username" required="" data-validation-required-message="Please enter your name." aria-invalid="false">
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

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Conferma Password</label>
                                    <input type="password" class="form-control" placeholder="Conferma Password" name="confermaPassword" id="password" required="" data-validation-required-message="Please enter your name." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
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


<?php include_once VIEW_DIR . "footer.php"?>

</body>

<script>

    <?php if(isset($_SESSION["toast-type"]) && isset($_SESSION["toast-message"])) {?>

    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr["<?php echo $_SESSION["toast-type"];?>"]("<?php echo $_SESSION["toast-message"];?>")

    });


    <?php
        unset($_SESSION["toast-type"]);
        unset($_SESSION["toast-message"]);
    }?>

</script>

</html>