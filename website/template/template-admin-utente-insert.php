<header class="row my-2">
    <h1 class="text-center m-0">
        Inserisci Utente
    </h1>
</header>

<form class="mx-md-4 mx-1 mt-md-4" action="api/manage_product.php" method="post" enctype="">
    <div class="row mb-4">
        <div class="d-none d-md-block col-md-6 pe-md-3">
            <img class="img-fluid" src="img/temp.jpg" alt="immagine dell'utente" />
            <label class="form-label visually-hidden" for="preview">Scegli Immagine </label>
            <input class="form-control image-custom-preview" type="file" accept="image/*" name="preview" id="preview" required />
        </div>
        <div class="col-md-6 ps-md-3 my-3">
            <div class="mb-3">
                <label class="form-label" for="name">Nome e cognome</label>
                <input class="form-control" type="text" name="name" id="name" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="privileges">Privilegi</label>
                <select class="form-select" id="privileges" name="privileges" required>
                    <option value="Admin">Admin</option>
                    <option value="User">Utente</option>
                </select>

            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Indirizzo</label>
                <input class="form-control" type="text" name="address" id="address" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="city">Città</label>
                <input class="form-control" type="text" name="city" id="city" required />
            </div>

        </div>
    </div>
    <div class="row justify-content-evenly my-4">
        <button class="btn btn-custom-lgold col-auto" type="submit" id="submit">Inserisci</button>
        <button class="btn border col-auto" type="reset" id="reset">Annulla</button>
    </div>
</form>
