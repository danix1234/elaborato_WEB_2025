<?php if (!empty($templateParams["notifiche"])) { ?>
    <div class="row justify-content-start align-items-center mb-4">
        <form action="notifiche.php?codNotifica=tutte" method="get">
            <div class="btn-group col-md-3 d-flex flex-wrap justify-content-md-start my-2 border">
                <button type="submit" name="codNotifica" value="tutte" class="col btn btn-custom-lgold">
                    Leggi Tutte
                </button>
                <button id="btnUnread" type="button" class="col btn btn-light border" onclick="filtraNotifiche('unread')">Da
                    leggere</button>
                <button id="btnRead" type="button" class="col btn btn-light border" onclick="filtraNotifiche('read')">Gia'
                    lette</button>
            </div>
        </form>
    </div>
<?php } ?>

<!-- Notifiche -->
<?php if (empty($templateParams["notifiche"])) { ?>
    <h1 class="text-center">Non ci sono notifiche</h1>
<?php } else { ?>
    <?php
    foreach ($templateParams["notifiche"] as $notifica):
        $codNotifica = $notifica["codNotifica"]; // Preleva codNotifica all'inizio del ciclo
        ?>
        <div class="notification-item" data-filter="<?php echo $notifica['letto'] ? 'read' : 'unread'; ?>">
            <div class="row border-bottom py-3">
                <div class="col-12 d-flex align-items-center">
                    <!-- Accordion -->
                    <div class="flex-grow-1">
                        <div class="accordion" id="accordionExample-<?php echo $codNotifica; ?>">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?php echo $codNotifica; ?>" aria-expanded="false"
                                        aria-controls="collapse<?php echo $codNotifica; ?>"
                                        onclick="leggiNotifica('<?php echo $codNotifica; ?>')">
                                        <?php echo $notifica["tipoNotifica"]; ?>
                                        <p>&nbsp;&nbsp;</p><span class="badge bg-custom-blue" <?php if ($notifica['letto'])
                                            echo 'style="display:none;"'; ?>>nuovo</span>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $codNotifica; ?>" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample-<?php echo $codNotifica; ?>">
                                    <div class="accordion-body">
                                        <?php echo ($notifica["messaggio"]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ora -->
                    <div class="ms-3 text-nowrap">
                        <?php echo $notifica["dataNotifica"]; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;
} ?>