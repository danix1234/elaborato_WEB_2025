<div class="mx-1 mx-md-4">
    <?php
    function disabled($disabled)
    {
        if ($disabled) {
            echo "Il prodotto è stato rimosso!";
        }
    }
    if (isset($templateParams["prodotti"]) && sizeof($templateParams["prodotti"]) == 0) { ?>
        <header class="row my-2">
            <h1 class="col text-center my-0">
                Nessun prodotto!
            </h1>
        </header>
    <?php return;
    } ?>


    <!--title of entire page-->
    <header class="row my-2">
        <div class="col-1"> </div>
        <h1 class="col-10 text-center my-0">
            Prodotti
        </h1>
    </header>

    <!--lista dei prodotti-->
    <div class="text-center text-md-start">
        <?php
        $items = array();
        $total_price = 0;
        if (isset($templateParams["prodotti"])) {
            $items = $templateParams["prodotti"];
        }
        for ($i = 0; $i < sizeof($items); $i++) {
            $item = $items[$i];
            $disabilitato = $item["disabilitato"];
            $btnDisable = $disabilitato ? "Abilita" : "Disabilita";
        ?>
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row py-4">
                                <div class="col-md-4">
                                    <div class="row justify-content-center">
                                        <img class="img-fluid col-auto" src="<?php echo UPLOAD_DIR . $item["immagine"] ?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <h2>Prodotto #<?php echo $item["codProdotto"] ?></h2>
                                    </div>
                                    <div class="row">
                                        <span>Nome: <?php echo $item["nome"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span>Descrizione: <?php echo $item["descrizione"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span>Quantità residua: <?php echo $item["quantitaResidua"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span>Prezzo unitario: <?php echo $item["prezzo"] ?>€</span>
                                    </div>
                                    <div class="row">
                                        <span>Categoria: <?php echo $item["nomeCategoria"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span class="text-danger"><?php disabled($item["disabilitato"]) ?></span>
                                    </div>
                                    <div class="row justify-content-md-start justify-content-center mt-2 ms-0">
                                        <?php if (!$disabilitato) { ?>
                                            <a class="btn btn-danger col-auto me-4 btn-custom-lgold" href="admin-prodotto.php?productId=<?php echo $item["codProdotto"] ?>">Modifica</a>
                                            <button class="btn btn-danger col-auto me-4 custom-toggle-button" id="<?php echo $item["codProdotto"] ?>" type="button">Rimuovi</button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger col-auto me-4 custom-toggle-button" id="<?php echo $item["codProdotto"] ?>">Riabilita</button>
                                        <?php } ?>
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
</div>
