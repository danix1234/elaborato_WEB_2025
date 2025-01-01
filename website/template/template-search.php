<div class="container text-center">
    <div class="row row-cols-1 row-cols-md-3">
        <?php
        foreach ($templateParams["prodotticasuali"] as $prodotto) { ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <a href="prodotto.php?productId=<?php echo $prodotto["codProdotto"] ?>" class="link-custom">
                        <div class="row py-1">
                            <div class="col-12 image-container">
                                <img src=<?php echo 'img/' . $prodotto["immagine"] ?> alt="image of product" />
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12">
                                <h1 class="card-title"><?php echo $prodotto["nome"] ?></h1>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12">
                                <p class="card-text"><?php echo $prodotto["descrizione"] ?></p>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12">
                                <p class="card-text"><strong><?php echo $prodotto["prezzo"] . '€' ?></strong></p>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12">
                                <p class="card-text">recensione</p>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer mt-5">
                        <div class="row">
                            <div class="col-6">
                                <button id="button-add-cart-home" type="button" class="btn btn-custom-gold w-100">acquista
                                    subito</button>
                            </div>
                            <div class="col-6">
                                <button id="button-buy-now-home" type="button" class="btn w-100"><i
                                        class="bi bi-cart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } ?>
    </div>
</div>