<?php include_once BEANS_DIR . "Annuncio.php" ?>
<?php include_once BEANS_DIR . "Appunti.php" ?>
<!DOCTYPE html>
<html>

<head>
    <title>Flyers | Risultati Ricerca</title>
    <?php include_once VIEW_DIR ."headerStart.php"?>

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

                    $classname_appunti = "Appunti";
                    $classname_annuncio = "Annuncio";

                    for($i=0; $i<count($result);$i++){

                        if($result[$i] instanceof $classname_appunti ){
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

                        <?php} else if($result[$i] instanceof $classname_annuncio){?>

                            <div class="row">
                                <div class="form-group col-xs-12" style=" border-style:solid; float: right;">
                                    <p><b> Titolo:</b><?php echo $result[$i]->getTitolo()?></p>
                                    <p><b> Descrizione:</b><?php echo $result[$i]->getDescrizione()?></p>
                                    <p><b> Tag:</b><?php echo $result[$i]->getTag()?></p>
                                    <button type="submit" class="btn btn-success btn-lg" style="float: right;">Leggi</button>
                                </div>
                            </div>

                        <?php }?>

                    <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php include_once VIEW_DIR . "footer.php"?>
</body>

</html>