<!--title of entire page-->
<header class="row">
    <h1 class="col text-center">
        Inserisci Prodotto
    </h1>
</header>

<!--modifica del prodotto-->
<form action="#" method="get">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="img/temp.jpg" alt="">
            <label class="form-label visually-hidden" for="">Scegli Immagine </label>
            <input class="form-control" type="file" accept="image/png, image/jpeg" name="" value="">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="">Nome</label>
            <input class="form-control" type="text" name="" value="" />
            <label class="form-label" for="">Descrizione</label>
            <textarea class="form-control" cols="50" rows="3"></textarea>
            <label class="form-label" for="">Prezzo unitario</label>
            <div class="input-group">
                <input class="form-control" type="text" name="" value="" />
                <span class="input-group-text">$</span>
            </div>
            <label class="form-label" for="">Quantità residua</label>
            <div class="input-group">
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="decrement">-</button>
                <input class="form-control" type="text" name="" value="" />
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="increment">+</button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <button class="btn bg-custom-lgold bg-custom-gold-hover col-auto" type="submit">Inserisci</button>
        <button class="btn border col-auto" type="reset">Annulla</button>
    </div>
</form>
