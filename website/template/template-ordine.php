<?php $ordini = $templateParams["ordine"];
if (sizeof($ordini) == 0) { ?>
    <div class="mx-1 mx-md-4">

        <!--title of entire page-->
        <header class="row my-2">
            <div class="col-1"> </div>
            <h1 class="col-10 text-center my-0">
                Nessun Ordine!
            </h1>
        </header>
    </div>
<?php } else { ?>
    <div class="mx-1 mx-md-4">

        <!--title of entire page-->
        <header class="row my-2">
            <div class="col-1"> </div>
            <h1 class="col-10 text-center my-0">
                Ordine
            </h1>
        </header>

        <!--lista dei prodotti-->
        <div class="text-center text-md-start">
            <?php for ($i = 0; $i < sizeof($ordini); $i++) {
                $ordine = $ordini[$i];
            ?>
                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-md-8 mx-auto">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row py-4">
                                    <div class="col-md-2"><a href="prodotto.php?productId=<?php echo $ordine["codProdotto"] ?>">
                                        <img class="img-fluid" src="<?php echo UPLOAD_DIR . $ordine["immagine"] ?>" alt="" /></a>
                                    </div>
                                    <div class="col-md-10">
                                        <a href="prodotto.php?productId=<?php echo $ordine["codProdotto"] ?>" class="row link-custom">
                                            <h2><?php echo $ordine["nome"] ?></h2>
                                        </a>
                                        <div class="row">
                                            <span><?php echo $ordine["descrizione"] ?></span>
                                        </div>
                                        <div class="row">
                                            <span>Quantità: <?php echo $ordine["quantita"] ?></span>
                                        </div>
                                        <div class="row">
                                            <span>Prezzo: <?php echo $ordine["prezzo"] ?>€</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!--resoconto-->
        <div class="my-2 row justify-content-evenly">
            <p class="col-auto my-1 align-middle">Prezzo totale: <?php echo $ordine["totale"] ?>$</p>
        </div>
    </div>

<?php } ?>
