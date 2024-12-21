<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="./css/style.css" />

    <title>Nostro Sito</title> <!-- TODO change title -->
</head>

<body class="bg-white">
    <header class="container-fluid px-0 py-2 overflow-hidden bg-custom-blue">

        <div class="row align-items-center justify-content-between mx-1">
            <!-- Logo -->
            <div class="col-3 col-md-2 col-lg-1 order-1"> <!-- TODO col-lg ! -->
                <a href="#"><img src="./img/temp.jpg" class="img-fluid" alt="Logo" /></a>
            </div>

            <!-- search bar -->
            <div class="col-12 col-md-7 col-lg-8 mt-2 mt-md-0 order-4 order-md-2">
                <div class="input-group">
                    <label for="searchBar" class="visually-hidden form-label">Cerca</label>
                    <input id="searchBar" type="search" class="form-control rounded-start border border-0"
                        placeholder="Cerca" />
                    <select class="form-select-md border border-0 d-none d-md-block">
                        <option value="">Tutte le categorie</option>
                        <option value="1">Categoria 1</option>
                        <option value="2">Categoria 2</option>
                    </select>
                    <button type="submit" class="btn btn-custom-lgold">
                        <span class="bi bi-search"></span>
                    </button>
                </div>
            </div>

            <!-- log in -->
            <div class="col-5 col-md-1 text-center text-white order-2 order-md-3">
                ciao, accedi
            </div>

            <!-- icons -->
            <div class="col-4 col-md-2 d-flex align-items-center order-3 order-md-4 justify-content-center">
                <div class="w-100 d-flex justify-content-around">
                    <a href="#" title="notifica" class="text-white"><span class="bi bi-bell"></span></a>
                    <a href="#" title="ordini" class="text-white"><span class="bi bi-clock-history"></span></a>
                    <a href="#" title="carrello" class="text-custom-gold"><span class="bi bi-cart"></span></a>
                </div>
            </div>
        </div>
    </header>

    <main class="container-fluid">
        <?php
        if (isset($templateParams["nome"])) {
            require($templateParams["nome"]);
        }
        ?>
    </main>

    <footer class="text-center bg-custom-blue text-white">
        sono il footer
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <?php
    if (isset($templateParams["scripts"])) {
        foreach ($templateParams["scripts"] as $script) {
            echo '<script src="' . $script . '"></script>';
        }
    }
    ?>
</body>

</html>
