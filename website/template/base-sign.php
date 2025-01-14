<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

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
    require_once("bootstrap.php");
    if (isLoggedIn()) {
        $user = $dbh->getUserbyUserId(getCurrentUserId());
        $ban = boolval($user[0]["disabilitato"]);
        if ($ban) {
            session_unset();
            header("Location: search.php");
        }
    } ?>

    <header class="container-fluid overflow-hidden bg-custom-blue py-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-6 col-md-2 text-center ">
                <a href="<?php checkFile("search.php"); ?>">
                    <img src="<?php echo UPLOAD_DIR; ?>logo.jpg" alt="Logo" class="img-fluid w-25">
                </a>
            </div>
        </div>
    </header>

    <main class="container my-2 flex-grow-1">
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
    <?php
    if (isset($templateParams["scripts"])) {
        foreach ($templateParams["scripts"] as $script) {
            echo '<script src="' . $script . '"></script>';
        }
    }
    ?>
</body>

</html>
