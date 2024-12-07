<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="css/style.css" />

    <title>Document</title> <!-- TODO -->
</head>

<body class="container-fluid p-sm-4 pt-4 p-0">
    <main class="overflow-hidden px-4">
        <!--title of entire page-->
        <header class="row bb-4">
            <h1 class="col text-center">
                Carrello
            </h1>
        </header>

        <div class="row justify-content-evenly">
            <div class="col-auto">
                <?php for ($i=0; $i < 2 ; $i++) { ?>
                <div class="row justify-content-center border border-1 border-secondary my-4 py-2">
                    <a class="col-auto text-center" href="#">
                        <img class="img-fluid img-preview-size" src="img/temp.jpg" alt="" />
                    </a>
                    <div class="col-sm text-center text-sm-start">
                        <h2 class="col">Nome del Prodotto</h2>
                        <p class="col">Descrizione molto lunga del prodotto da acquistare
                        <div class="row justify-content-center justify-content-sm-start">
                            <label class="col-auto">Quantità <input type="number" name="id" value="1" min="1" max="100"
                                    id="id">
                            </label>
                            <button class="col-auto btn btn-sm bg-custom-lgold" type="button">Rimuovi</button>
                            <span class="col-auto">Prezzo: 19.99$</span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="col-auto">
                <div class="ms-4 my-4 p-2 border border-1 border-secondary">
                    <span> Prezzo totale (2 prodotti): 29.98$ </span>
                    <div class="row justify-content-center">
                        <button class="col-auto btn btn-sm bg-custom-lgold" type="button">Acquista</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

</body>

</html>
