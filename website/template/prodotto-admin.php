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
            <img class="img-fluid" src="img/temp.jpg" alt="immagine descrittiva del prodotto" />
            <label class="form-label visually-hidden" for="preview">Scegli Immagine </label>
            <input class="form-control" type="file" accept="image/png, image/jpeg" name="preview" id="preview"
                required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" required />
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control" cols="50" rows="3" name="description" id="description" required></textarea>
            <label class="form-label" for="price">Prezzo unitario</label>
            <div class="input-group">
                <input class="form-control" type="text" name="price" id="price" required />
                <span class="input-group-text">€</span>
            </div>
            <label class="form-label" for="quantity">Quantità residua</label>
            <div class="input-group">
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="decrement">-</button>
                <input class="form-control" type="text" name="quantity" id="quantity" required />
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="increment">+</button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <button class="btn bg-custom-lgold bg-custom-gold-hover col-auto" type="submit" id="submit">Inserisci</button>
        <button class="btn border col-auto" type="reset" id="reset">Annulla</button>
    </div>
</form>
