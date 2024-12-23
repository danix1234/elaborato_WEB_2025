<div class="mx-1 mx-md-4">
    <?php if (isset($templateParams["carrello"]) && sizeof($templateParams["carrello"]) == 0) { ?>
        <header class="row my-2">
            <h1 class="col text-center my-0">
                Il Carrello è vuoto!
            </h1>
        </header>
    <?php return;
    } ?>


    <!--title of entire page-->
    <header class="row my-2">
        <div class="col-1"> </div>
        <h1 class="col-10 text-center my-0">
            Carrello
        </h1>
        <a href="#buy" title="button to go to buy button" class="col-1 d-flex align-items-center justify-content-center">
            <span class="bi bi-arrow-down-circle-fill fs-5 text-custom-lblue"></span>
        </a>
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
        ?>
            <div class="row border-bottom border-3 py-4">
                <div class="col-md-4">
                    <img class="img-fluid" src="img/temp.jpg" alt="" />
                </div>
                <div class="col-md-8">
                    <a href="#" class="row link-custom">
                        <h2><?php echo $item["nome"] ?></h2>
                    </a>
                    <div class="row">
                        <span><?php echo $item["descrizione"] ?></span>
                    </div>
                    <div class="row">
                        <span class="text-custom-price">Prezzo: <?php echo $item["prezzo"] ?>€</span>
                    </div>
                    <div class="row justify-content-md-start justify-content-center">
                        <label for="quantity<?php echo $i ?>" class="col-form-label pe-0 col-auto">Quantità:</label>
                        <div class="col-auto ps-2">
                            <div class="input-group">
                                <button tabindex="-1" class="input-group-text font-monospace" type="button"
                                    id="decrement<?php echo $i ?>">-</button>
                                <input class="form-control button-custom-quantity" type="text" value="<?php echo $item["quantita"] ?>" name="<?php echo $item["codProdotto"] ?>"
                                    max="<?php echo $item["quantitaResidua"] ?>" id="<?php echo $item["codProdotto"] ?>" required />
                                <button tabindex="-1" class="input-group-text font-monospace" type="button"
                                    id="increment<?php echo $i ?>">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-start justify-content-center mt-2 ms-0">
                        <button class="btn btn-custom-lgold col-auto button-custom-remove" type="button">Remove</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!--resoconto-->
    <div class="my-2 row justify-content-evenly">
        <p class="col-auto my-1 align-middle text-custom-totprice">Prezzo totale: </p>
        <button type="button" class="col-auto btn btn-custom-lgold" id="buy">Acquista</button>
    </div>
</div>
