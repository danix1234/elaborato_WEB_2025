<?php $user = $templateParams["user"];
function select_privilegies($user, $priv)
{
    if ($user["privilegi"] == $priv) {
        echo 'selected';
    }
}
function getImage($user)
{
    if ($user["privilegi"]) {
        echo 'img/temp.jpg';
    } else {
        echo 'img/temp.jpg';
    }
}
?>

<header class="row my-2">
    <h1 class="text-center m-0">
        Modifica utente
    </h1>
</header>

<form class="mx-md-4 mx-1 mt-md-4" action="api/manage_user.php?userId=<?php echo $_GET["userId"] ?>" method="post" enctype="">
    <div class="row mb-4">
        <div class="col-md-6 pe-md-3">
            <img class="img-fluid" src="<?php getImage($user) ?>" alt="immagine dell'utente" />
        </div>
        <div class="col-md-6 ps-md-3">
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input class="form-control" type="text" name="name" id="name" value="<?php echo $user["nomeUtente"] ?>" required />
            </div>
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $user["email"] ?>" disabled />
            <label class="form-label" for="privileges">Privilegi</label>
            <select class="form-select" id="privileges" name="privileges" required>
                <option value="User" <?php select_privilegies($user, false) ?>>Utente</option>
                <option value="Admin" <?php select_privilegies($user, true) ?>>Admin</option>
            </select>
            <label class="form-label" for="address">Indirizzo</label>
            <input class="form-control" type="text" name="address" id="address" value="<?php echo $user["indirizzo"] ?>" required />
            <label class="form-label" for="city">Città</label>
            <input class="form-control" type="text" name="city" id="city" value="<?php echo $user["citta"] ?>" required />
        </div>
    </div>
    <div class="row justify-content-evenly my-4">
        <button class="btn btn-custom-lgold col-auto" type="submit" id="submit">Modifica</button>
        <button class="btn btn-danger col-auto" type="button" id="removeuser">Rimuovi</button>
        <button class="btn border btn-light col-auto" type="reset" id="reset">Annulla</button>
    </div>
</form>
