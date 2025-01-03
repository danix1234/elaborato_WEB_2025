<!--title of entire page-->
<header class="row my-2">
    <h1 class="text-center m-0">
        Inserisci Prodotto
    </h1>
</header>

<!--modifica del prodotto-->
<form class="mx-md-4 mx-1 mt-md-4" action="api/manage_product.php" method="post" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-md-6 pe-md-3">
            <img class="img-fluid" src="img/temp.jpg" init="img/temp.jpg" alt="immagine descrittiva del prodotto" />
            <label class="form-label visually-hidden" for="preview">Scegli Immagine </label>
            <input class="form-control image-custom-preview" type="file" accept="image/*" name="preview" id="preview" required />
        </div>
        <div class="col-md-6 ps-md-3">
            <label class="form-label" for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" required />
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control" cols="50" rows="3" name="description" id="description" required></textarea>
            <label class="form-label" for="price">Prezzo unitario</label>
            <div class="input-group">
                <input class="form-control button-custom-float" type="text" name="price" id="price" required />
                <span class="input-group-text">€</span>
            </div>
            <label class="form-label" for="quantity">Quantità residua</label>
            <div class="input-group">
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="decrement">-</button>
                <input class="form-control button-custom-quantity" type="text" name="quantity" id="quantity" required />
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="increment">+</button>
            </div>
            <label class="form-label" for="category">Categoria</label>
            <select class="form-select" id="category" name="category" required>
                <option value="" disabled selected>Scegli Categoria</option>
                <?php foreach ($templateParams["categories"] as $cat) { ?>
                    <option id="<?php echo $cat["codCategoria"] ?>" value="<?php echo $cat["codCategoria"] ?>"><?php echo $cat["nome"] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row justify-content-evenly my-4">
        <button class="btn btn-custom-lgold col-auto" type="submit" id="submit">Inserisci</button>
        <button class="btn border col-auto" type="reset" id="reset">Annulla</button>
    </div>
</form>
