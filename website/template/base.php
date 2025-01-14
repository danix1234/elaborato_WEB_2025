<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/png" href="./img/logo.jpg" />

    <title><?php
            echo $websiteName;
            if (isset($templateParams["titolo"])) {
                echo " - " . "$templateParams[titolo]";
            }
            ?></title> <!-- TODO change title -->
</head>

<body class="bg-white d-flex flex-column min-vh-100">
    <?php
    if (isLoggedIn()) {
        $user = $dbh->getUserbyUserId(getCurrentUserId());
        $ban = boolval($user[0]["disabilitato"]);
        if ($ban) {
            session_unset();
            header("Location: search.php");
        }
    }

    $categories = $dbh->getAllCategories();
    $products = $dbh->getAllProducts();

    // Recupera la categoria selezionata
    $selectedCategoryId = isset($_GET['codCategoria']) ? $_GET["codCategoria"] : null;
    $selectedCategoryName = 'Tutte le categorie';
    if (count($categories) >= $selectedCategoryId && !is_null($selectedCategoryId) && !empty($selectedCategoryId)) {
        $selectedCategoryName = $categories[$selectedCategoryId - 1]["nome"];
    }

    $filteredsuggestions = array();
    if (!empty($selectedCategoryId)) {
        foreach ($products as $product) {
            if (intval($product["codCategoria"]) === intval($selectedCategoryId)) {
                array_push($filteredsuggestions, $product["nome"]);
            }
        }
    } else {
        foreach ($products as $product) {
            array_push($filteredsuggestions, $product["nome"]);
        }
        foreach ($categories as $category) {
            array_push($filteredsuggestions, $category["nome"]);
        }
    }
    ?>
    <header class="container-fluid px-0 py-2 overflow-hidden bg-custom-blue">
        <div class="row align-items-center justify-content-between mx-1">
            <!-- Logo -->
            <div class="col-3 col-md-2 col-lg-1 order-1">
                <a href="<?php checkFile('search.php'); ?>"><img src="<?php echo UPLOAD_DIR; ?>logo.jpg"
                        class="img-fluid w-25" alt="Logo" /></a>
            </div>

            <!-- search bar -->
            <div class="col-12 col-md-6 col-lg-7 mt-2 mt-md-0 order-4 order-md-2">
                <form method="get" action="search.php" id="searchForm" autocomplete="off">
                    <div class="input-group">
                        <label for="searchBar" class="visually-hidden form-label">Cerca</label>
                        <input name="searchBar" id="searchBar" type="search"
                            class="form-control rounded-start border border-0" placeholder="Cerca"
                            list="list-suggestion" />
                        <datalist id="list-suggestion">
                            <?php foreach ($filteredsuggestions as $suggest): ?>
                                <option value="<?php echo $suggest; ?>"></option>
                            <?php endforeach; ?>
                        </datalist>

                        <!-- category bar -->
                        <label for="categoryBar" class="visually-hidden form-label">Categorie</label>
                        <select id="categoryBar" name="codCategoria"
                            class="form-select-md border border-0 d-none d-md-block">
                            <!-- Anteprima della categoria selezionata -->
                            <option value="" disabled selected class="d-none"><?php echo $selectedCategoryName; ?>
                            </option>
                            <!-- Opzioni della lista -->
                            <option value="">Tutte le categorie</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['codCategoria']; ?>">
                                    <?php echo $category['nome']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" class="btn btn-custom-lgold rounded-end">
                            <span class="bi bi-search"></span>
                        </button>
                    </div>
                </form>

            </div>

            <!-- log in -->
            <div class="col-5 col-md-2 text-center order-2 order-md-3">
                <a href="<?php checkFile('sign-in.php'); ?>" title="accedi"
                    class="link-light link-opacity-50-hover text-decoration-none">Ciao,
                    <?php echo isLoggedIn() ? getCurrentUserName() : "Accedi" ?></a>
            </div>

            <!-- icons -->
            <div class="col-4 col-md-2 d-flex align-items-center order-3 order-md-4 justify-content-center">
                <div class="w-100 d-flex justify-content-around">
                    <?php if (isAdmin()): ?>

                        <a href="<?php checkFile('admin-prodotto.php'); ?>" title="aggiungi prodotto"
                            class="link-light link-opacity-50-hover"><span class="bi bi-database-add"></span></a>
                        <a href="<?php checkFile('prodotti.php'); ?>" title="modifica prodotti"
                            class="link-light link-opacity-50-hover"><span class="bi bi-database-gear"></span></a>
                        <a href="<?php checkFile('utenti.php'); ?>" title="ban utenti"
                            class="link-light link-opacity-50-hover"><span class="bi bi-ban"></span></a>
                    <?php endif; ?>
                    <a href="<?php checkFile('notifiche.php'); ?>" title="notifica"
                        class="link-light link-opacity-50-hover text-decoration-none"><span class="bi bi-bell"></span>
                        <?php if (isLoggedIn() && $dbh->hasUnreadNotification(getCurrentUserId())) { ?>
                            <span
                                class="position-absolute translate-middle badge bg-danger border border-light rounded-circle px-1 mt-1"><span
                                    class="visually-hidden">unread messages</span></span><?php } ?></a>
                    <a href="<?php checkFile('ordini.php'); ?>" title="ordini"
                        class="link-light link-opacity-50-hover"><span class="bi bi-clock-history"></span></a>
                    <a href="<?php checkFile('carrello.php'); ?>" title="carrello" class="text-custom-gold"><span
                            class="bi bi-cart"></span></a>
                </div>
            </div>
        </div>
    </header>

    <main class="container-fluid flex-grow-1">
        <?php
        if (isset($templateParams["nome"])) {
            require($templateParams["nome"]);
        }
        ?>
    </main>

    <footer class="text-center text-white bg-custom-blue">
        <div class="container-fluid justify-content-center p-4">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <strong><?php echo $websiteName ?></strong>
                    <p>
                        Prodotti di informatica: laptop, smartphones, cuffie, gaming console,...
                        Se vuoi qualche tecnologia, vieni da noi!
                    </p>
                </div>

                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <strong>Seguici</strong>
                    <br />
                    <div class=""> <!-- icon not centerted? -->
                        <span class="text-white me-4"><span class="bi bi-facebook"></span></span>
                        <span class="text-white me-4"><span class="bi bi-twitter"></span></span>
                        <span class="text-white me-4"><span class="bi bi-instagram"></span></span>
                        <span class="text-white me-4"><span class="bi bi-linkedin"></span></span>
                    </div>
                </div>
                <hr />
                <div class="text-center">
                    Copyright © <?php echo date("Y") . " " . $websiteName; ?>. All rights reserved.
                </div>
            </div>
        </div>


    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/base.js"></script>
    <?php
    if (isset($templateParams["scripts"])) {
        foreach ($templateParams["scripts"] as $script) {
            echo '<script src="' . $script . '"></script>';
        }
    }
    ?>
</body>

</html>
