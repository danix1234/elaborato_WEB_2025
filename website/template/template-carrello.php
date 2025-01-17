<div class="mx-1 mx-md-4">
    <?php if (empty($templateParams["carrello"])) { ?>
        <header class="row my-2">
            <h1 class="col text-center my-0">
                Il Carrello è vuoto!
            </h1>
        </header>
        <?php echo '</div>';
        return;
    } ?>


    <!--title of entire page-->
    <header class="row my-2">
        <div class="col-md-2"></div>
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-1"> </div>
                <h1 class="col-10 text-center my-0">
                    Carrello
                </h1>
                <a href="#buy" title="button to go to buy button"
                    class="col-1 d-flex align-items-center justify-content-center">
                    <span class="bi bi-arrow-down-circle-fill fs-5 text-custom-lblue"></span>
                </a>

            </div>
        </div>
    </header>

    <!--lista dei prodotti-->
    <div class="text-center text-md-start">
        <?php
        $items = array();
        $total_price = 0;
        if (isset($templateParams["carrello"])) {
            $items = $templateParams["carrello"];
        }
        for ($i = 0; $i < sizeof($items); $i++) {
            $item = $items[$i];
            $total_price += $item["quantita"] * $item["prezzo"];
            ?>
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-8 mx-auto">
                    <div class="target-outline scroll-25" id="item-<?php echo $item["codProdotto"] ?>">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row py-4">
                                    <div class="col-md-4">
                                        <div class="row justify-content-center">
                                            <a href="prodotto.php?productId=<?php echo $item["codProdotto"] ?>">
                                                <img class="img-fluid col-auto"
                                                    src="<?php echo UPLOAD_DIR . $item["immagine"] ?>" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="prodotto.php?productId=<?php echo $item["codProdotto"] ?>"
                                            class="row link-custom">
                                            <h2><?php echo $item["nome"] ?></h2>
                                        </a>
                                        <div class="row">
                                            <span><?php echo $item["descrizione"] ?></span>
                                        </div>
                                        <div class="row">
                                            <span class="text-custom-price">Prezzo: <?php echo $item["prezzo"] ?>€</span>
                                        </div>
                                        <div class="row justify-content-md-start justify-content-center">
                                            <label for="<?php echo $item["codProdotto"] ?>"
                                                class="col-form-label pe-0 col-auto">Quantità:</label>
                                            <div class="col-auto ps-2">
                                                <div class="input-group">
                                                    <button tabindex="-1" class="input-group-text font-monospace"
                                                        type="button" id="decrement<?php echo $i ?>">-</button>
                                                    <input class="form-control button-custom-quantity" type="text"
                                                        value="<?php echo $item["quantita"] ?>"
                                                        name="<?php echo $item["codProdotto"] ?>"
                                                        id="<?php echo $item["codProdotto"] ?>" required />
                                                    <button tabindex="-1" class="input-group-text font-monospace"
                                                        type="button" id="increment<?php echo $i ?>">+</button>
                                                </div>
                                                <span
                                                    class="visually-hidden"><?php echo $item["quantitaResidua"] == 0 ? 0 : 1 ?></span>
                                                <span class="visually-hidden"><?php echo $item["quantitaResidua"] ?></span>
                                                <span class="visually-hidden"><?php echo $item["quantita"] ?></span>
                                            </div>
                                        </div>
                                        <div class="row text-center text-md-start">
                                            <span class="cart-element-msg text-danger"
                                                id="msg<?php echo $item["codProdotto"] ?>"></span>
                                        </div>
                                        <div class="row justify-content-md-start justify-content-center mt-2 ms-0">
                                            <button class="btn btn-danger col-auto button-custom-remove"
                                                type="button">Rimuovi</button>
                                        </div>
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
        <p class="col-auto my-1 align-middle text-custom-totprice">Prezzo totale: <?php echo $total_price ?>€</p>
        <button type="button" class="col-auto btn btn-custom-lgold" id="buy"><span class="bi bi-cart-check"></span>
            Acquista</button>
    </div>
</div>