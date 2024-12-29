<?php $prodotto = $templateParams["prodotto"];
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
        <img src=<?php echo UPLOAD_DIR . $prodotto["immagine"]; ?> class="img-fluid" alt="" />
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
            <label for="quantita" class="form-label mb-0 me-2">Quantità</label>
            <div class="input-group">
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="decrement">-</button>
                <input class="form-control button-custom-quantity" value="1" type="text" name="quantity" id="quantity"
                    max="<?php echo $prodotto["quantitaResidua"]; ?>" min="1" required />
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="increment">+</button>
            </div>
        </div>

        <!-- carrello -->
        <div class="d-grid gap-2 w-100">
            <button type="button" class="btn btn-custom-lgold">Aggiungi al Carrello</button>
            <button type="button" class="btn btn-custom-gold">Compra Subito</button>
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
                <?php for ($i = 0; $i < (count($templateParams["recensioni"]) >= 3 ? 3 : count($templateParams["recensioni"])); $i++) { ?>
                    <li class="d-flex align-items-start mb-3">
                        <img src="img/temp.jpg" class="rounded-circle me-3 user-avatar-size" alt="" />
                        <div>
                            <strong><?php echo $templateParams["recensioni"][$i]["nomeUtente"]; ?></strong>
                            <p class="mb-1"><?php echo $templateParams["recensioni"][$i]["votoRecensione"]; ?>/5
                                <?php echo generateStarRating($templateParams["recensioni"][$i]["votoRecensione"]); ?>
                                <span class="text-secondary"> Recensito il <?php echo $templateParams["recensioni"][$i]["dataRecensione"]; ?></span>
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
                class="btn btn-outline-secondary <?php echo (count($templateParams["recensioni"]) > 3 ? "" : "disabled") ?>">Vedi
                altre recensioni</button>
        </div>
    </div>
</div>