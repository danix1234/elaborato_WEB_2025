<div class="container text-center">
    <div class="row row-cols-1 row-cols-md-3">
        <?php
        foreach ($templateParams["prodotticasuali"] as $prodotto) { ?>
            <div class="col mb-5"><a href="#"><img src=<?php echo 'img/' . $prodotto["immagine"] ?> class="img-fluid"
                        alt="Logo" /></a>
                <header><?php echo $prodotto["nome"] ?></header>
                <p><?php echo $prodotto["descrizione"] ?></p>
                <p><?php echo $prodotto["prezzo"] . '€' ?></p>
                <p><?php echo 'recensione' ?></p>
                <button type="button" class="btn btn-custom-gold">acquista subito</button>
                <button type="button" class="btn"><i class="bi bi-cart"></i></button>
            </div>
            <?php
        } ?>
    </div>
</div>