<div class="container-fluid my-4">
    <!-- Sezione pulsanti -->
    <div class="row justify-content-between align-items-center mb-4">
        <div
            class="col-12 col-md-6 d-flex flex-wrap justify-content-center justify-content-md-start gap-2 gap-md-3 my-2">
            <button id="btn-seleziona-tutte" type="button" class="btn btn-custom-lgold">Seleziona tutto</button>
            <button id="btn-leggi-selezionate" type="button" class="btn btn-custom-lgold">Leggi Selezionate</button>
        </div>
        <div class="col-12 col-md-6 d-flex flex-wrap justify-content-center justify-content-md-end gap-2 gap-md-3">
            <button id="btn-tutte" type="button" class="btn btn-custom-lgold">Tutte</button>
            <button id="btn-gia-lette" type="button" class="btn btn-custom-lgold">Gia' lette</button>
            <button id="btn-da-leggere" type="button" class="btn btn-custom-lgold">Da leggere</button>
        </div>
    </div>

    <!-- Sezione notifiche -->
    <?php foreach ($templateParams["notifiche"] as $notifica) { ?>
        <div class="row border-bottom py-3">
            <div class="col-12 d-flex align-items-center">
                <!-- Checkbox -->
                <div class="me-3">
                    <input class="form-check-input select-checkbox" type="checkbox"
                        id="flexCheckDefault-<?php echo $notifica["codNotifica"]; ?>">
                </div>

                <!-- Accordion -->
                <div class="flex-grow-1">
                    <div class="accordion" id="accordionExample-<?php echo $notifica["codNotifica"]; ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <form action="./api/read-notice.php?codNotifica=<?php echo $notifica["codNotifica"]; ?>"
                                    method="get">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?php echo $notifica["codNotifica"]; ?>"
                                        aria-expanded="false"
                                        aria-controls="collapse<?php echo $notifica["codNotifica"]; ?>"
                                        codNotifica="<?php echo $notifica["codNotifica"]; ?>">
                                        <?php echo $notifica["tipoNotifica"] ?>
                                    </button>
                                </form>
                            </h2>
                            <div id="collapse<?php echo $notifica["codNotifica"]; ?>" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample-<?php echo $notifica["codNotifica"]; ?>">
                                <div class="accordion-body">
                                    <?php echo $notifica["messaggio"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ora -->
                <div class="ms-3 text-nowrap">
                    <?php echo $notifica["dataNotifica"] ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>