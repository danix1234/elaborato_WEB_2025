<div class="row my-2 align-items-center justify-content-evenly">
    <div class="col-7 col-md-12 text-center order-1 mb-2">
        <h2>Storico Ordini</h2>
    </div>
    <!-- filtro tempo -->
    <div class="col-5 col-md-2 order-2 order-md-3 mb-2 mb-md-0">
        <label for="filter-time" class="visually-hidden form-label">Filtra per tempo</label>
        <select id="filter-time" class="form-select">
            <option value="">Tutti</option>
            <option value="1">entro 1 mese</option>
            <option value="2">entro 3 mesi</option>
            <option value="2">entro 1 anno</option>
        </select>
    </div>

    <!-- filtro -->
    <div class="col-12 col-md-4 order-3 order-md-2">
        <div class="btn-group d-flex bg-light rounded border border-1" role="group">
            <button id="filter-ordini" type="button"
                class="btn btn-light active rounded-right border border-0 w-100">Ordini</button>
            <button id="filter-attesa" type="button" class="btn btn-light border border-0 w-100">In
                Attesa</button>
            <button id="filter-cancellato" type="button"
                class="btn btn-light rounded-left border border-0 w-100">Cancellato</button>
        </div>
    </div>
</div>
<?php foreach ($templateParams["ordini"] as $ordine) { ?>
    <div class="row mb-3 align-items-center">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- dati -->
                        <div class="col-12">
                            <div class="row">
                                <p class="col-9 fw-bold mb-1">Ordine #<?php echo $ordine["codOrdine"]; ?> </p>
                                <span class="col-3 bi text-success text-end mb-1">
                                    <?php if ($ordine["statoOrdine"] == "Shipped") { ?>
                                        <span class="bi bi-check-circle-fill text-success"></span> <!-- spedito -->
                                    <?php } elseif ($ordine["statoOrdine"] == "Shipping") { ?>
                                        <span class="bi bi-truck text-custom-gold"></span> <!-- in spedizione -->
                                    <?php } elseif ($ordine["statoOrdine"] == "Pending") { ?>
                                        <span class="bi bi-clock-history text-custom-gold"></span> <!-- in attesa -->
                                    <?php } elseif ($ordine["statoOrdine"] == "Deleted") { ?>
                                        <span class="bi bi-x-circle-fill text-danger"></span> <!-- cancellato -->
                                    <?php } ?>
                                </span>
                            </div>
                            <p class="text-body-secondary mb-1">Effettuato il: <?php echo $ordine["dataOrdine"]; ?></p>
                            <p class="text-body-secondary mb-1">Pagato: <?php echo $ordine["pagato"] ? "Si" : "No"; ?></p>
                            <p class="text-body-secondary mb-1">Stato: <span class="badge <?php if ($ordine["statoOrdine"] == "Shipped") {
                                echo "bg-success";
                            } else if ($ordine["statoOrdine"] == "Shipping" || $ordine["statoOrdine"] == "Pending") {
                                echo "bg-custom-lgold";
                            } else {
                                echo "bg-danger";
                            } ?>"><?php echo $ordine["statoOrdine"] ?></span></p>
                            <p class="fw-bold mb-0">Totale: €<?php echo $ordine["totale"]; ?></p>
                        </div>

                    </div>
                    <hr />

                    <!-- descr ordine -->
                    <div class="row d-flex align-items-center mt-3">
                        <div class="col-3">
                            <img src="<?php echo UPLOAD_DIR . $ordine["immaginePreview"]; ?>" alt="" class="img-fluid me-2">
                        </div>
                        <div class="col-9">
                            <p class="text-body-secondary mb-0">
                                <?php echo $ordine['nomeProdotto'] . " e altri " . $ordine['totProdotti'] - 1 . " prodotti"; ?>
                            </p>
                        </div>
                    </div>

                    <!-- dettagli ordine -->
                    <div class="mt-3 d-flex justify-content-between">
                        <a href="ordine.php?orderId=<?php echo $ordine["codOrdine"]; ?>"
                            class="btn btn-outline-secondary">Dettagli</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>