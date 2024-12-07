<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="css/style.css" />

    <title>Nostro Sito</title> <!-- TODO change title -->
</head>

<body class="bg-white">
    <header class="container-fluid p-0 overflow-hidden bg-custom-blue">

        <div class="row px-1">
            <div class="col-3 d-flex align-items-center justify-content-center">
                <a href="#"><img src="img/temp.jpg" class="img-fluid" alt="Logo" /></a><!-- TODO add path to img -->
            </div>
            <div class="col d-flex align-items-center justify-content-center text-white">ciao, accedi</div>
            <!-- TODO add correct ref -->
            <div class="col-4 d-flex align-items-center">
                <div class="w-100 d-flex justify-content-around">
                    <a href="#" title="notifica" class="text-white"><span
                            class="bi bi-bell"></span></a><!-- TODO add correct ref -->
                    <a href="#" title="ordini" class="text-white"><span
                            class="bi bi-clock-history"></span></a><!-- TODO add correct ref -->
                    <a href="#" title="carrello" class="text-custom-gold"><span
                            class="bi bi-cart"></span></a><!-- TODO add correct ref -->
                </div>
            </div>
        </div>
        <!-- search bar -->
        <div class="row mt-2 px-3">
            <div class="input-group">
                <label for="searchBar" class="visually-hidden">Cerca</label>
                <input id="searchBar" type="search" class="form-control rounded-start rm-border" placeholder="Cerca" />
                <a href="#" class="input-group-text bg-custom-lgold rm-border" title="cerca">
                    <span class="bi bi-search"></span> </a>
            </div>
        </div>
    </header>

    <!-- category -->
    <div class="row px-2 overflow-auto bg-custom-lblue">
        <nav class="nav d-flex flex-nowrap w-100">
            <a class="nav-link text-white" href="#">categoria1</a>
            <a class="nav-link text-white" href="#">categoria2</a>
            <a class="nav-link text-white" href="#">categoria3</a>
            <a class="nav-link text-white" href="#">categoria4</a>
            <a class="nav-link text-white" href="#">categoria5</a>
        </nav>
    </div>

    <main>
        sono il main
</br>
</br>
</br>
</br>
    </main>

    <footer class="text-center bg-custom-blue text-white">
        sono il footer
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>