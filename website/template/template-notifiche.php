<div class="container-fluid my-4">
    <!-- Sezione pulsanti -->
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-12 col-md-6 d-flex flex-wrap justify-content-center justify-content-md-start gap-2 gap-md-3 my-2">
            <button type="button" class="btn btn-custom-lgold">Seleziona tutto</button>
            <button type="button" class="btn btn-custom-lgold">Leggi Selezionate</button>
        </div>
        <div class="col-12 col-md-6 d-flex flex-wrap justify-content-center justify-content-md-end gap-2 gap-md-3">
            <button type="button" class="btn btn-custom-lgold">Gia' lette</button>
            <button type="button" class="btn btn-custom-lgold">Da leggere</button>
        </div>
    </div>

    <!-- Sezione notifiche -->
    <?php for ($i = 0; $i < 4; $i++) { ?>
        <div class="row border-bottom py-3">
            <div class="col-12 d-flex align-items-center">
                <!-- Checkbox -->
                <div class="me-3">
                    <input class="form-check-input select-checkbox" type="checkbox" id="flexCheckDefault-<?php echo $i; ?>">
                </div>

                <!-- Accordion -->
                <div class="flex-grow-1">
                    <div class="accordion" id="accordionExample-<?php echo $i; ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $i; ?>"
                                    aria-expanded="false"
                                    aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo "Notifica " . $i; ?>
                                </button>
                            </h2>
                            <div
                                id="collapse<?php echo $i; ?>"
                                class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample-<?php echo $i; ?>">
                                <div class="accordion-body">
                                    Contenuto della notifica. Puoi personalizzare questo testo come preferisci.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ora -->
                <div class="ms-3 text-nowrap">
                    12:32
                </div>
            </div>
        </div>
    <?php } ?>
</div>