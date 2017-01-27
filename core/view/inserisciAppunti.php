<!DOCTYPE html>
<html lang="en">

<head>


    <title>Flyers | Inserisci Appunto</title>
    <?php include_once VIEW_DIR . "headerStart.php"?>

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
                <form action="<?php echo DOMINIO_SITO;?>/insertAppunti" method="post" enctype="multipart/form-data">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nome</label>
                            <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome" required data-validation-required-message="Inserisci un nome.">
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
                                <option value="Scienze Ambientali">Scienze_Ambientali</option>

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
</section>

<!-- Footer -->
<?php include_once VIEW_DIR . 'footer.php'?>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

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

