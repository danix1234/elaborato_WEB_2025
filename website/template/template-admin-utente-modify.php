<?php $user = $templateParams["user"] ?>

<header class="row my-2">
    <h1 class="text-center m-0">
        Modifica utente
    </h1>
</header>

<form class="mx-md-4 mx-1 mt-md-4" action="api/manage_user.php?productId=<?php echo $_GET["userId"] ?>" method="post" enctype="">
    <div class="row mb-4">
        <div class="col-md-6 pe-md-3">
            <img class="img-fluid" src="<?php echo UPLOAD_DIR . $user["immagine"] ?>" alt="immagine dell'utente" />
            <label class="form-label visually-hidden" for="preview">Scegli Immagine </label>
            <input class="form-control image-custom-preview" type="file" accept="image/*" name="preview"
                id="preview" />
        </div>
        <div class="col-md-6 ps-md-3">
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input class="form-control" type="text" name="name" id="name" value="<?php echo $user["nome"] ?>" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $user["email"] ?>" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="privileges">Privilegi</label>
                <select class="form-select" id="privileges" name="privileges" required>
                    <option value="User">Utente</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Indirizzo</label>
                <input class="form-control" type="text" name="address" id="address" value="<?php echo $user["indirizzo"] ?>" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="city">Città</label>
                <input class="form-control" type="text" name="city" id="city" value="<?php echo $user["citta"] ?>" required />
            </div>

        </div>
    </div>
    <div class="row justify-content-evenly my-4">
        <button class="btn btn-custom-lgold col-auto" type="submit" id="submit">Modifica</button>
        <button class="btn btn-danger col-auto" type="button" id="remove">Rimuovi</button>
        <button class="btn border btn-light col-auto" type="reset" id="reset">Annulla</button>
    </div>
</form>