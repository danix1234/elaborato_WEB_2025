<div class="row my-2 align-items-center justify-content-evenly">
    <header class="col-7 col-md-12 text-center order-1 mb-2">
        <h1><?php if ($templateParams["vuoto"]) {
            echo "Nessun Ordine</h1></header></div>";
            return;
        } ?>Storico Ordini</h1>
    </header>
    <!-- filtro tempo -->
    <div class="col-5 col-md-2 order-2 order-md-3 mb-2 mb-md-0">
        <form id="filter-time-form" method="GET" action="ordini.php">
            <label for="filter-time" class="visually-hidden form-label">Filtra per tempo</label>
            <select id="filter-time" name="filter-time" class="form-select">
                <option value="all">Tutti</option>
                <option value="1" <?php echo isset($_GET["filter-time"]) && $_GET["filter-time"] == "1" ? "selected" : ""; ?>>1 mese</option>
                <option value="3" <?php echo isset($_GET["filter-time"]) && $_GET["filter-time"] == "3" ? "selected" : ""; ?>>3 mesi</option>
                <option value="12" <?php echo isset($_GET["filter-time"]) && $_GET["filter-time"] == "12" ? "selected" : ""; ?>>1 anno</option>
            </select>
        </form>
    </div>

    <!-- filtro -->
    <div class="col-12 col-md-4 order-3 order-md-2">
        <div class="btn-group d-flex bg-light rounded border border-1" role="group">
            <button id="Shipped" type="button"
                class="btn btn-light btn-group-custom-filter border border-0 w-100">Spedito</button>
            <button id="Pending" type="button" class="btn btn-light btn-group-custom-filter border border-0 w-100">In
                Attesa</button>
            <button id="Deleted" type="button"
                class="btn btn-light btn-group-custom-filter border border-0 w-100">Cancellato</button>
        </div>
    </div>
</div>

<div id="orders-container">
    <?php foreach ($templateParams["ordini"] as $ordine) { ?>
        <div class="row mb-3 align-items-center">
            <div class="col-12 col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <!-- dati -->
                            <div class="col-12">
                                <div class="row">
                                    <a href="ordine.php?orderId=<?php echo $ordine['codOrdine']; ?>"
                                        class="col-9 fw-bold link-custom mb-1">Ordine
                                        #<?php echo $ordine["codOrdine"]; ?></a>
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
                                <p class="text-body-secondary mb-1">Data Consegna: <?php echo $ordine["dataConsegna"]; ?>
                                </p>
                                <p class="text-body-secondary mb-1">Pagato: <?php echo $ordine["pagato"] ? "Si" : "No"; ?>
                                </p>
                                <p class="text-body-secondary mb-1">Stato: <span class="badge <?php if ($ordine['statoOrdine'] == 'Shipped') {
                                    echo 'bg-success';
                                } else if ($ordine['statoOrdine'] == 'Shipping' || $ordine['statoOrdine'] == 'Pending') {
                                    echo 'bg-custom-lgold';
                                } else {
                                    echo 'bg-danger';
                                } ?>"><?php echo $ordine["statoOrdine"] ?></span></p>
                                <p class="fw-bold mb-0">Totale: €<?php echo $ordine["totale"]; ?></p>
                            </div>

                        </div>
                        <hr />

                        <!-- descr ordine -->
                        <div class="row d-flex mt-3">
                            <div class="col-3 col-md-1">
                                <a href="ordine.php?orderId=<?php echo $ordine['codOrdine']; ?>"><img alt="preview-image"
                                        src="<?php echo UPLOAD_DIR . $ordine['immaginePreview']; ?>"
                                        class="img-fluid me-2" /></a>
                            </div>
                            <div class="col-9 col-md-11">
                                <p class="text-body-secondary mb-0">
                                    <?php echo $ordine["descrizioneOrdine"] ?>
                                </p>
                            </div>
                        </div>

                        <!-- dettagli ordine -->
                        <div class="mt-3 d-flex gap-2">
                            <a href="ordine.php?orderId=<?php echo $ordine['codOrdine']; ?>"
                                class="btn btn-outline-secondary">Dettagli</a>
                            <a href="pagamento.php?orderId=<?php echo $ordine['codOrdine']; ?>"
                                class="btn btn-outline-secondary <?php echo $ordine['statoOrdine'] != 'Pending' ? 'disabled' : ''; ?>">Paga</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>