<?php

$prodotto = $templateParams["prodotto"];
function generateStarRating($voto)
{
    $votoInt = intval(floor($voto));
    $votoDec = intval(($voto - $votoInt) * 10);
    $output = "";
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $votoInt) {
            $output .= '<span class="bi bi-star-fill text-custom-lgold"></span>';
        } elseif ($i == $votoInt + 1 && $votoDec >= 5) {
            $output .= '<span class="bi bi-star-half text-custom-lgold"></span>';
        } else {
            $output .= '<span class="bi bi-star text-custom-lgold"></span>';
        }
    }
    return $output;
} ?>
<div class="row mt-4 mx-md-2">
    <div class="col-12 col-md-5 text-center mb-3 mb-md-0">
        <img src="<?php echo UPLOAD_DIR . $prodotto['immagine']; ?>" class="img-fluid" alt="" />
    </div>

    <!-- nome, descr, costo, voto -->
    <div class="col-12 col-md-4 d-flex flex-column align-items-center">
        <h2><?php echo $prodotto["nome"]; ?></h2>
        <p class="text-body-secondary mb-4">
            <?php echo $prodotto["descrizione"]; ?>
        </p>

        <div class="d-flex justify-content-between w-100 mb-3">
            <div class="fw-bold fs-4">€<?php echo $prodotto["prezzo"]; ?></div>
            <div class="text-end">
                <?php echo $prodotto["mediaVoto"]; ?>/5
                <?php echo generateStarRating($prodotto["mediaVoto"]) ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3 d-flex flex-column align-items-center align-items-md-end">
        <!-- quantità -->
        <div class="d-flex align-items-center mb-3">
            <label for="quantita" class="form-label m-0 me-2">Quantità</label>
            <div class="input-group">
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="decrement">-</button>
                <label for="<?php echo $prodotto['codProdotto']; ?>">Quantita'</label>
                <input class="form-control button-custom-quantity" value="1" type="text" name="<?php echo $prodotto['codProdotto']; ?>" id="<?php echo $prodotto['codProdotto']; ?>" required />
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="increment">+</button>
                <span class="visually-hidden">1</span>
                <span class="visually-hidden"><?php echo $prodotto['quantitaResidua']; ?></span>
                <span class="visually-hidden"></span>
            </div>
        </div>

        <script>
            const isLoggedIn = <?php echo json_encode(isLoggedIn()) ?>;
        </script>
        <!-- carrello -->
        <div class="d-grid gap-2 w-100">
            <button id="button-add-cart" type="button" class="btn btn-custom-lgold">Aggiungi al Carrello</button>
            <button id="button-buy-now" type="button" class="btn btn-custom-gold">Compra Subito</button>
            <?php if (isAdmin()) { ?>
                <a href=<?php echo "admin-prodotto.php?productId=" . $_GET["productId"] ?>
                    class="btn btn-light border">Modifica</a>
            <?php } ?>
            <div id="message-container" class="d-none"></div>
        </div>

    </div>
</div>

<!-- recensioni -->
<hr />
<script>
    window.reviews = <?php echo json_encode($templateParams["recensioni"]); ?>;
</script>
<div class="row mx-md-2">
    <div class="col border rounded mb-2 mx-auto">
        <section class="mt-4">
            <h3 class="fw-bold mb-3">Recensioni</h3>
            <ul class="p-0">
                <?php
                $totRecensioni = count($templateParams["recensioni"]);
                $max = $totRecensioni >= 3 ? 3 : $totRecensioni;
                for ($i = 0; $i < $max; $i++) { ?>
                    <li class="d-flex align-items-start mb-3">
                        <img src="<?php echo $templateParams["recensioni"][$i]["immagineProfilo"]; ?>"
                            class="rounded-circle me-3 user-avatar-size" alt="" />
                        <div>
                            <strong><?php echo $templateParams["recensioni"][$i]["nomeUtente"]; ?></strong>
                            <p class="mb-1"><?php echo $templateParams["recensioni"][$i]["votoRecensione"]; ?>/5
                                <?php echo generateStarRating($templateParams["recensioni"][$i]["votoRecensione"]); ?>
                                <span class="text-secondary"> Recensito il
                                    <?php echo $templateParams["recensioni"][$i]["dataRecensione"]; ?></span>
                            </p>
                            <p class="text-body-secondary mb-0"><?php echo $templateParams["recensioni"][$i]["commento"]; ?>
                            </p>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>
        <hr />
        <div class="d-flex justify-content-between mb-3">
            <button id="other-review" type="button"
                class="btn btn-outline-secondary <?php echo $totRecensioni > 3 ? '' : 'disabled' ?>">Vedi
                altre recensioni</button>
        </div>
        <!-- scrivi recensione -->
        <h3 id="recensione" class="fw-bold mb-3">Scrivi una Recensione</h3>
        <?php if (isset($templateParams["erroreRecensione"])): ?>
            <div class="text-danger mb-3">
                <?php echo $templateParams["erroreRecensione"] ?>
            </div>
        <?php endif; ?>
        <form action="prodotto.php?productId=<?php echo $_GET['productId']; ?>#recensione" method="POST">
            <div class="d-flex align-items-center">
                <div>
                    <label for="votoRecensione" class="form-label">Voto Recensione: </label>
                    <span class="star bi bi-star-fill text-custom-lgold" data-value="1"></span><span
                        class="star bi bi-star text-custom-lgold" data-value="2"></span><span
                        class="star bi bi-star text-custom-lgold" data-value="3"></span><span
                        class="star bi bi-star text-custom-lgold" data-value="4"></span><span
                        class="star bi bi-star text-custom-lgold" data-value="5"></span>
                    <input type="hidden" id="votoRecensione" name="votoRecensione" value="1" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="commento" class="form-label">Commento</label>
                <textarea class="form-control" id="commento" name="commento" rows="3" maxlength="512"
                    required></textarea>
            </div>
            <div class="d-flex mb-3">
                <?php if (isLoggedIn()) { ?>
                    <button type="submit" class="btn btn-custom-lgold">Invia Recensione</button>
                <?php } else { ?>
                    <a href="sign-in.php" class="btn btn-custom-lgold">Accedi per scrivere una recensione</a>
                <?php } ?>
            </div>
        </form>
    </div>
</div>
