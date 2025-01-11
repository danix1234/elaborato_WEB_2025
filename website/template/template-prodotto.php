<?php
$prodotto = $templateParams["prodotto"];
?>
<div class="row mt-4 mx-md-2">
    <div class="col-12 col-md-5 text-center mb-3 mb-md-0">
        <img src="<?php echo UPLOAD_DIR . $prodotto['immagine']; ?>" class="img-fluid" alt="" />
    </div>

    <!-- nome, descr, costo, voto -->
    <div class="col-12 col-md-4 d-flex flex-column align-items-center">
        <h1><?php echo $prodotto["nome"]; ?></h1>
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
        <!-- quantita' -->
        <div class="d-flex align-items-center mb-2 w-100">
            <label for="<?php echo $prodotto['codProdotto']; ?>" class="form-label m-0 me-2">Quantita'</label>
            <div class="input-group">
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="decrement">-</button>
                <input class="form-control button-custom-quantity" value="1" type="text"
                    name="<?php echo $prodotto['codProdotto']; ?>" id="<?php echo $prodotto['codProdotto']; ?>"
                    required />
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="increment">+</button>
            </div>
            <span class="visually-hidden">1</span>
            <span class="visually-hidden"><?php echo $prodotto['quantitaResidua']; ?></span>
            <span class="visually-hidden"></span>
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
            <h2 class="fw-bold mb-3">Recensioni</h2>
            <ul class="p-0">
                <?php
                $totRecensioni = count($templateParams["recensioni"]);
                $max = $totRecensioni >= 3 ? 3 : $totRecensioni;
                for ($i = 0; $i < $max; $i++) { ?>
                    <li class="d-flex align-items-start mb-3">
                        <img src="<?php echo $templateParams["recensioni"][$i]["immagineProfilo"]; ?>"
                            class="rounded-circle me-3 user-avatar-size" alt="" />
                        <div>
                            <strong><?php echo htmlspecialchars($templateParams["recensioni"][$i]["nomeUtente"]); ?></strong>
                            <p class="mb-1"><?php echo $templateParams["recensioni"][$i]["votoRecensione"]; ?>/5
                                <?php echo generateStarRating($templateParams["recensioni"][$i]["votoRecensione"]); ?>
                                <span class="text-secondary"> Recensito il
                                    <?php echo $templateParams["recensioni"][$i]["dataRecensione"]; ?></span>
                            </p>
                            <p class="text-body-secondary mb-0"><?php echo htmlspecialchars($templateParams["recensioni"][$i]["commento"]); ?>
                            </p>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>
        <div class="d-flex justify-content-between mb-3">
            <button id="other-review" type="button"
                class="btn btn-outline-secondary <?php echo $totRecensioni > 3 ? '' : 'disabled' ?>">Vedi
                altre recensioni</button>
        </div>
        <hr/>
        <!-- scrivi recensione -->
        <h2 id="recensione" class="fw-bold mb-3">Scrivi una Recensione</h2>
        <?php if (isset($templateParams["erroreRecensione"])): ?>
            <div class="text-danger mb-3">
                <?php echo $templateParams["erroreRecensione"] ?>
            </div>
        <?php endif; ?>
        <form action="prodotto.php?productId=<?php echo $_GET['productId']; ?>#recensione" method="POST">
            <div class="d-flex align-items-center">
                <div>
                    <label class="form-label">Voto Recensione: </label>
                    <?php
                    $dataValue = array("1", "2", "3", "4", "5");
                    $votoRecensione = empty($templateParams["recensionePrecedente"]) ? 1 : $templateParams["recensionePrecedente"]["votoRecensione"];
                    echo generateStarRating(
                        $votoRecensione,
                        "star-rating",
                        $dataValue
                    ); ?>
                    <input type="hidden" id="votoRecensione" name="votoRecensione"
                        value="<?php echo $votoRecensione; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="commento" class="form-label">Commento</label>
                <textarea class="form-control" id="commento" name="commento" rows="3" maxlength="512" required><?php
                $commento = empty($templateParams["recensionePrecedente"]) ? "" : $templateParams["recensionePrecedente"]["commento"];
                echo $commento ?></textarea>
            </div>
            <div class="d-flex mb-3">
                <?php if (isLoggedIn()) { ?>
                    <button type="submit"
                        class="btn btn-custom-lgold"><?php echo empty($templateParams["recensionePrecedente"]) ? "Invia Recensione" : "Modifica Recensione" ?></button>
                <?php } else { ?>
                    <a href="sign-in.php" class="btn btn-custom-lgold">Accedi per scrivere una recensione</a>
                <?php } ?>
            </div>
        </form>
    </div>
</div>
