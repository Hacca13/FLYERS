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
                if(isset($result) && count($result)>0){
                    for($i=0; $i<count($result);$i++){
                        if($result[$i] instanceof Appunti ){
                            ?>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p><b> Titolo:</b>&nbsp <?php echo $result[$i]->getNome(); ?></p>
                                    <p><b> Descrizione: </b>&nbsp <?php echo $result[$i]->getDescrizione(); ?> .</p>
                                    <p><b> Categoria: &nbsp <?php echo  $result[$i]->getCategoria()?> </b></p>
                                    <p><b> Tag:</b>&nbsp <?php $tags = $result[$i]->getListTags();
                                        for($j=0; $j<count($tags) ;$j++){
                                            echo $tags[$j]->getNome();
                                        }
                                        ?></p>
                                    <p><b> Utente:</b>&nbsp <?php echo  $usersNameAds[$i]?> </p>
                                    <p><b> Data:</b>&nbsp <?php echo $result[$i]->getDataDiCaricamento(); ?> </p>
                                    <?php if(isset($_SESSION['user'])) { ?>
                                        <a href="<?php echo DOMINIO_SITO; ?>/scaricaAppunti/<?php echo $appunti[$i]->getKeyFile(); ?>">
                                            <button class="btn btn-success btn-lg" style="float: right; margin-left: 1%;">Download
                                                <i class="fa fa-download"></i></button>
                                        </a>
                                        <?php $pathFile = $appunti[$i]->getPath();
                                        //cerca la stringa .pdf all'interno del nome...
                                        if (strpos($pathFile, '.pdf') !== false) { ?>
                                            <a href="<?php echo DOMINIO_SITO; ?>/visualizzaFile/<?php echo $appunti[$i]->getKeyFile(); ?>">
                                                <button class="btn btn-success btn-lg" style="float: right;">Leggi<i
                                                        class="fa fa-file-pdf-o"></i></button>
                                            </a>
                                        <?php }
                                    }
                                    ?>

                                </div>
                            </div>
                            <hr>

                        <?php } else if($result[$i] instanceof Annuncio){?>
                            <div class="row">
                                <div class="col-lg-12 col-md 12- col-sm-12 col-xs-12">
                                    <p><b> Titolo:</b>&nbsp <?php echo $result[$i]->getTitolo();?></p>
                                    <p><b> Descrizione: </b>&nbsp <?php echo $result[$i]->getDescrizione();?></p>
                                    <p><b> Tag:</b>&nbsp <?php $tags = $result[$i]->getTags();

                                        for($j=0;$j<count($tags);$j++){
                                            echo $tags[$j]->getNome()." ";
                                        }
                                        ?></p>
                                    <p><b> Utente:</b>&nbsp <?php echo $usersNameAds[$i] ?> </p>
                                    <?php if(isset($_SESSION['user'])){?>
                                        <p><b> Contatto:</b>&nbsp <?php echo $annunci[$i]->getContatto();?></p>
                                    <?php } ?>
                                    <p><b> Data:</b>&nbsp <?php echo $result[$i]->getDataDiCaricamento();?></p>
                                </div>
                            </div>
                            <hr>

                        <?php }?>

                    <?php }
                }else{?>
                    <div>
                        <p><b>La ricerca non prodotto alcun risultato.</b></p>
                    </div>

                <?php }?>
            </div>
        </div>
    </div>
</section>
<?php include_once VIEW_DIR . "footer.php"?>
</body>

</html>