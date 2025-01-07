<nav class="navbar navbar-expand-lg navbar-light bg-light d-md-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Categorie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav flex-row flex-nowrap overflow-auto w-100">
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-primary me-2" onclick="filtrocategorie('')">
                        Tutte le categorie</button>
                </li>
                <?php foreach ($templateParams["categorie"] as $categoria) {
                    $codCategoria = $categoria["codCategoria"]; ?>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary me-2"
                            onclick="filtrocategorie('<?php echo htmlspecialchars($codCategoria, ENT_QUOTES, 'UTF-8'); ?>')">
                            <?php echo htmlspecialchars($categoria["nome"], ENT_QUOTES, 'UTF-8'); ?>
                        </button>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>


<div class="container text-center">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <?php
        foreach ($templateParams["prodotti"] as $prodotto) { ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <a href="prodotto.php?productId=<?php echo $prodotto["codProdotto"] ?>" class="link-custom">
                        <div class="row py-1">
                            <div class="col-12 image-container">
                                <img src=<?php echo 'img/' . $prodotto["immagine"] ?> alt="image of product" />
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12">
                                <h2 class="card-title"><?php echo $prodotto["nome"] ?></h2>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12">
                                <p class="card-text"><?php echo $prodotto["descrizione"] ?></p>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-12">
                                <p class="card-text"><strong><?php echo $prodotto["prezzo"] . '€' ?></strong></p>
                            </div>
                            <div class="col-12">
                                <p class="card-text">
                                    <?php echo $review = $dbh->getAverageRating($prodotto["codProdotto"]); ?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer mt-5 align-bottom">
                        <div class="row">
                            <div class="col-6">
                                <button id="button-add-cart-home" type="button" class="btn btn-custom-gold w-100">acquista
                                    subito</button>
                            </div>
                            <div class="col-6">
                                <button id="button-buy-now-home" type="button" class="btn w-100"><span
                                        class="bi bi-cart"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } ?>
    </div>
</div>