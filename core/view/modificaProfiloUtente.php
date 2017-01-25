<!DOCTYPE html>
<html>

<head>

    <title>Flyers | Modifica Profilo</title>
    <?php include VIEW_DIR ."headerStart.php"?>
</head>

<body id="page-top" class="index">
<?php include_once VIEW_DIR . "header.php"?>
<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Modifica Profilo</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="<?php echo DOMINIO_SITO;?>/changeData" name="modifyUser"  enctype="multipart/form-data">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">

                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>ID</label>
                            <input type="text" class="form-control" placeholder="ID" name="id">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Città</label>
                            <input type="tel" class="form-control" placeholder="Città" name="citta">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nuova Password</label>
                            <input type="password" class="form-control" placeholder="Nuova Password" name="newpssw">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Conferma Nuova Password</label>
                            <input type="password" class="form-control" placeholder="Conferma Password" name="confermnewpssw">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12 text-center">
                            <button id="sendButton" class="btn btn-success btn-lg">Invia</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if(isset($_SESSION["toast-type"]) && isset($_SESSION["toast-message"])) {

            $type = unserialize($_SESSION["toast-type"]);

            if ($type == "error") { ?>
                <div id="toast" style="background-color:rgba(255,20,20,0.5)"> <?php echo unserialize($_SESSION["toast-message"]); ?> </div>

            <?php } else if($type == "success") { ?>

                <div id="toast"> <?php echo unserialize($_SESSION["toast-message"]); ?> </div>

            <?php }
        }?>

    </div>
</section>
<?php include_once VIEW_DIR . "footer.php"?>
</body>

<!--Privacy User-->
<script src="<?php echo STYLE_DIR;?>js/privacyUser.js"></script>

<?php if(isset($_SESSION["toast-type"]) && isset($_SESSION["toast-message"])){?>
    <!--Toast notification-->
    <link href="<?php echo STYLE_DIR;?>css/toast.css">
    <script src="<?php echo STYLE_DIR;?>js/toastJS.js"></script>
<?php } ?>


</html>