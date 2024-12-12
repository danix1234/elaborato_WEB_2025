<div class="mx-1 mx-md-4">

    <!--title of entire page-->
    <header class="row my-2">
        <div class="col-1"> </div>
        <h1 class="col-10 text-center my-0">
            Ordine
        </h1>
    </header>

    <!--lista dei prodotti-->
    <div class="text-center text-md-start">
        <?php for($i=0; $i<4; $i++){ ?>
        <div class="row border-bottom border-3 py-4">
            <div class="col-md-2">
                <img class="img-fluid" src="img/temp.jpg" alt="" />
            </div>
            <div class="col-md-10">
                <a href="#" class="row link-custom">
                    <h2>Nome del prodotto</h2>
                </a>
                <div class="row">
                    <span> Descrizione molto lunga del prodotto </span>
                </div>
                <div class="row">
                    <span>Quantità: 1</span>
                </div>
                <div class="row">
                    <span>Prezzo: 11.69€</span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <!--resoconto-->
    <div class="my-2 row justify-content-evenly">
        <p class="col-auto my-1 align-middle">Prezzo totale: 16.69$</p>
    </div>
</div>
