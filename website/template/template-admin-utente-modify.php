<?php
$user = $templateParams["user"];
function select_privilegies($priv)
{
    global $user;
    if ($user["privilegi"] == $priv) {
        echo 'selected';
    }
}
?>

<header class="row my-2">
    <h1 class="text-center m-0">
        Modifica dati personali
    </h1>
</header>

<form class="mx-md-4 mx-1 mt-md-4" action="api/manage_user.php?userId=<?php echo getCurrentUserId() ?>" method="post">
    <div class="row mb-4">
        <div class="col-md-6 pe-md-3">
            <img class="img-fluid" src="<?php getUserImage(isAdmin()) ?>" alt="immagine dell'utente" />
        </div>
        <div class="col-md-6 ps-md-3">
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input class="form-control" type="text" name="name" id="name" value="<?php echo $user["nomeUtente"] ?>" required />
            </div>
            <label class="form-label" for="address">Indirizzo</label>
            <input class="form-control" type="text" name="address" id="address" value="<?php echo $user["indirizzo"] ?>" required />
            <label class="form-label" for="city">Città</label>
            <input class="form-control" type="text" name="city" id="city" value="<?php echo $user["citta"] ?>" required />
        </div>
    </div>
    <div class="row justify-content-evenly my-4">
        <button class="btn btn-custom-lgold col-auto" type="submit" id="submit">Modifica</button>
        <button class="btn border btn-light col-auto" type="reset" id="reset">Annulla</button>
    </div>
</form>
