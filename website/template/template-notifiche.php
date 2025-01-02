<form action="api/read-notice.php" method="post" id="form-notifiche">
    <div class="row justify-content-between align-items-center mb-4">
        <div
            class="col-12 col-md-6 d-flex flex-wrap justify-content-center justify-content-md-start gap-2 gap-md-3 my-2">
            <button type="button" class="btn btn-custom-lgold" onclick="selezionaTutte()">Seleziona tutto</button>
            <button type="submit" class="btn btn-custom-lgold">Leggi Selezionate</button>
        </div>
        <div class="col-12 col-md-6 d-flex flex-wrap justify-content-center justify-content-md-end gap-2 gap-md-3">
            <button type="button" class="btn btn-custom-lgold" onclick="filtraNotifiche('tutte')">Tutte</button>
            <button type="button" class="btn btn-custom-lgold" onclick="filtraNotifiche('gia-lette')">Gia'
                lette</button>
            <button type="button" class="btn btn-custom-lgold" onclick="filtraNotifiche('da-leggere')">Da
                leggere</button>
        </div>
    </div>

    <!-- Checkbox Notifiche -->
    <?php foreach ($templateParams["notifiche"] as $notifica) { ?>
        <div class="row border-bottom py-3">
            <div class="col-12 d-flex align-items-center">
                <!-- Checkbox -->
                <div class="me-3">
                    <input class="form-check-input select-checkbox" type="checkbox" name="notificheIds[]"
                        value="<?php echo $notifica["codNotifica"]; ?>">
                </div>

                <!-- Accordion -->
                <div class="flex-grow-1">
                    <div class="accordion" id="accordionExample-<?php echo $notifica["codNotifica"]; ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $notifica["codNotifica"]; ?>" aria-expanded="false"
                                    aria-controls="collapse<?php echo $notifica["codNotifica"]; ?>">
                                    <?php echo htmlspecialchars($notifica["tipoNotifica"]); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $notifica["codNotifica"]; ?>" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample-<?php echo $notifica["codNotifica"]; ?>">
                                <div class="accordion-body">
                                    <?php echo htmlspecialchars($notifica["messaggio"]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ora -->
                <div class="ms-3 text-nowrap">
                    <?php echo htmlspecialchars($notifica["dataNotifica"]); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</form>