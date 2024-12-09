<!--title of entire page-->
<header class="row">
    <h1 class="col text-center">
        Inserisci Prodotto
    </h1>
</header>

<!--modifica del prodotto-->
<form action="#" method="">
    <div class="row">
        <div class="col-xl-6">
            <img class="img-fluid" src="img/temp.jpg" alt="">
            <label class="form-label" for="">Scegli Immagine </label>
            <input class="form-control" type="file" name="" value="">
        </div>
        <div class="col-xl-6">
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
            <input class="form-control" type="number" min="1" max="10000" name="" value="1" required />
        </div>
    </div>
    <div class="row justify-content-center">
        <button class="btn btn-primary col-auto" type="submit">Inserisci</button>
        <button class="btn btn-primary col-auto" type="reset">Annulla</button>
    </div>
</form>
