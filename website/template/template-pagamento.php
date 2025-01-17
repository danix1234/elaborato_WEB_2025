<div class="row justify-content-center mx-1">
    <div class="col-auto border rounded p-3">
        <h2 class="text-center fw-bold mb-2">Pagamento</h2>
        <?php if (isset($templateParams["error"])): ?>
            <div class="text-danger mb-3">
                <?php echo $templateParams["error"] ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <ul class="list-unstyled">
                <li><strong>Codice Ordine:</strong> #<?php echo $templateParams["ordine"]["codOrdine"]; ?></li>
                <li><strong>Prodotti:</strong> <?php echo $templateParams["listaProdotti"]; ?></li>
                <li><strong>Prezzo Totale:</strong> €<?php echo $templateParams["ordine"]["totale"]; ?></li>
            </ul>
        </div>

        <div class="d-block gap-2">
            <button id="confirm-button" class="btn btn-custom-lgold">Conferma</button>
            <a href="?orderId=<?php echo $templateParams['ordine']['codOrdine']; ?>&deleted=true"
                class="btn btn-danger">Cancella</a>
        </div>
        <div id="message-container" class="d-none text-danger"></div>
    </div>
</div>