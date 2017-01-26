<?php include_once BEANS_DIR . "Appunti.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flyers | Lista Appunti</title>
    <?php include_once VIEW_DIR . "headerStart.php"?>

</head>


<body>

<!-- Navigation -->
<?php  include_once VIEW_DIR ."header.php"; ?>
<!-- Header -->


<!-- Header -->
<section id="contact">
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Lista appunti </h2>
                <hr class="star-primary">
            </div>
        </div>


        <?php

        for ($i = 0; $i < count($appunti); $i++) {
            ?>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                        <br>
                        <div class="row" style="  position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;">
                            <div class="form-group col-xs-12" style="float: right; margin-top: 2%">
                                <P><b> Titolo:</b>&nbsp <?php echo $appunti[$i]->getNome(); ?></P>
                                <P><b> Descrizione: </b>&nbsp <?php echo $appunti[$i]->getDescrizione(); ?> .</P>
                                <P><b> Tag:</b>&nbsp Affitto &nbsp Camera &nbsp Singola </P>
                                <P><b> Utente:</b>&nbsp <?php ?> </P>
                                <P><b> Data:</b>&nbsp <?php echo $appunti[$i]->getDataDiCaricamento(); ?> </P>
                                <a href="<?php echo DOMINIO_SITO;?>/scaricaAppunti/<?php echo $appunti[$i]->getKeyFile(); ?>">
                                <button class="btn btn-success btn-lg" style="float: right; margin-left: 1%;">Download
                                <i class="fa fa-download"></i></button>
                                </a>
                                <a href="<?php echo DOMINIO_SITO;?>/visualizzaFile/<?php echo $appunti[$i]->getKeyFile(); ?>"><button class="btn btn-success btn-lg" style="float: right;">Leggi
                                <i class="fa fa-file-pdf-o"></i></button></a>

                            </div>
                        </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</section>

<!-- Footer -->
<?php  include_once VIEW_DIR . "footer.php"; ?>
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

</script>s

</html>