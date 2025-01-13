<script>
    const isLoggedIn = <?php echo json_encode(isLoggedIn()) ?>;
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light d-md-none overflow-auto">
    <div class="container-fluid">
        <ul class="navbar-nav flex-row flex-nowrap overflow-auto w-100">
            <li class="nav-item">
                <button type="button" class="btn btn-custom-blue me-2" onclick="filtrocategorie('')">
                    Categorie</button>
            </li>
            <?php foreach ($templateParams["categorie"] as $categoria) {
                $codCategoria = $categoria["codCategoria"]; ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-custom-blue me-2"
                        onclick="filtrocategorie('<?php echo $codCategoria ?>')">
                        <?php echo $categoria["nome"]; ?>
                    </button>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>


<div class="container text-center overflow-auto">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <?php
        foreach ($templateParams["prodotti"] as $prodotto) { ?>
            <div class="col mb-3">
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
                    </a>
                    <div class="row py-1">
                        <div class="col-12">
                            <p class="card-text"><?php echo $prodotto["descrizione"] ?></p>
                        </div>
                    </div>
                    <div class="row py-1 mb-5">
                        <div class="col-12">
                            <p class="card-text"><strong><?php echo $prodotto["prezzo"] . '€' ?></strong></p>
                        </div>
                        <div class="col-12">
                            <p class="card-text">
                                <?php echo $review = $dbh->getAverageRating($prodotto["codProdotto"]); ?>
                                <?php echo generateStarRating($review); ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer mt-auto align-bottom">
                        <div class="row">
                            <div class="col-6">
                                <button onclick="buyNow(<?php echo $prodotto['codProdotto']; ?>)" type="button"
                                    class="btn btn-custom-gold w-100">
                                    <span class="bi bi-bag-check"></span>
                                    Acquista
                                </button>
                            </div>
                            <div class="col-6 text-nowrap">
                                <button onclick="addToCart(<?php echo $prodotto['codProdotto']; ?>)" type="button"
                                    class="btn w-100 btn-light border border-1">
                                    <span class="bi bi-cart-check"></span>
                                    Aggiungi
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        } ?>
    </div>
</div>
