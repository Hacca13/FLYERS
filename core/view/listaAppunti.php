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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>Lista appunti </h2>
                <hr class="star-primary">
                <?php if(isset($_SESSION["user"])){ ?>
                    <a href="<?php echo DOMINIO_SITO;?>/inserisciAppunti">
                        <button type="submit" class="btn btn-success btn-lg" style="float: right;">Aggiungi nuovi Appunti +</button>
                    </a>
                <?php } ?>
            </div>
        </div>


        <?php
        for ($i = 0; $i < count($appunti); $i++) {
            ?>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p><b> Titolo:</b>&nbsp <?php echo $appunti[$i]->getNome(); ?></p>
                    <p><b> Descrizione: </b>&nbsp <?php echo $appunti[$i]->getDescrizione(); ?> .</p>
                    <p><b> Tag:</b>&nbsp Affitto &nbsp Camera &nbsp Singola </p>
                    <p><b> Utente:</b>&nbsp <?php ?> </p>
                    <p><b> Data:</b>&nbsp <?php echo $appunti[$i]->getDataDiCaricamento(); ?> </p>
                    <a href="<?php echo DOMINIO_SITO;?>/scaricaAppunti/<?php echo $appunti[$i]->getKeyFile(); ?>">
                        <button class="btn btn-success btn-lg" style="float: right; margin-left: 1%;">Download
                            <i class="fa fa-download"></i></button>
                    </a>
                    <a href="<?php echo DOMINIO_SITO;?>/visualizzaFile/<?php echo $appunti[$i]->getKeyFile(); ?>"><button class="btn btn-success btn-lg" style="float: right;">Leggi<i class="fa fa-file-pdf-o"></i></button></a>
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