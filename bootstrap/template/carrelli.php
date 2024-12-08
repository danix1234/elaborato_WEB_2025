<!--title of entire page-->
<header class="row">
    <h1 class="col text-center">
        Carrello
    </h1>
</header>

<div class="container-fluid">
    <div class="row justify-content-center">
        <!--prodotti-->
        <section class="">
            <?php for ($i=0; $i < 5 ; $i++) { ?>
            <div>
                <a class="" href="#">
                    <img class="img-fluid" src="img/temp.jpg" alt="" />
                </a>
                <div class="">
                    <div class="row">
                        <h2>Nome del prodotto</h2>
                    </div>
                    <div class="row">
                        <p>Descrizione non troppo lunga e non troppo complessa del prodotto.</p>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <label class="col-auto">Quantità <input type="number" name="id" value="1" min="1"
                                    max="100" />
                            </label>
                            <button class="col-auto" type="button">Rimuovi</button>
                        </div>
                        <span class="col-auto">Prezzo: 19.99$</span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>

        <!--resoconto finale-->
        <section class="">
        </section>
    </div>
</div>
<!--    <div class="col-auto">-->
<!--        <div class="ms-4 my-4 p-2 border border-1 border-secondary">-->
<!--            <span> Prezzo totale (2 prodotti): 29.98$ </span>-->
<!--            <div class="row justify-content-center">-->
<!--                <button class="col-auto btn btn-sm bg-custom-lgold bg-custom-gold-hover"-->
<!--                    type="button">Acquista</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
