<?php
require_once("bootstrap.php");

if (!isset($_GET["productId"])) {
    die("productId not set!");
}

setPreviousPage(basename($_SERVER['REQUEST_URI']));

$productId = intval($_GET["productId"]);

if (isLoggedIn()) {
    $recensionePrecedente = $dbh->getUserReviewByProductId(getCurrentUserId(), $productId);
}
if (!empty($_POST["votoRecensione"]) && !empty($_POST["commento"])) {
    if ($dbh->hasBoughtProduct(getCurrentUserId(), $productId)) {
        $commento = $_POST["commento"];
        $votoRecensione = $_POST["votoRecensione"];

        if (empty($recensionePrecedente)) {
            $dbh->insertReview(getCurrentUserId(), $productId, $votoRecensione, $commento);
        } else {
            $dbh->updateReview(getCurrentUserId(), $productId, $votoRecensione, $commento);
        }
        $recensionePrecedente = $dbh->getUserReviewByProductId(getCurrentUserId(), $productId);
    } else {
        $templateParams["erroreRecensione"] = "Devi acquistare il prodotto per poter recensire!";
    }
}

$templateParams["recensioni"] = $dbh->getProductReviews($productId);
if (empty($templateParams["recensioni"])) {
    $templateParams["prodotto"] = $dbh->getProduct($productId)[0];
    $templateParams["prodotto"]["mediaVoto"] = "0.0";
} else {
    $templateParams["prodotto"] = $dbh->getProductwithRating($productId)[0];
    for ($i = 0; $i < count($templateParams["recensioni"]); $i++) {
        $templateParams["recensioni"][$i]["immagineProfilo"] = getUserImage(boolval($templateParams["recensioni"][$i]["privilegi"]));
    }
}
if (empty($templateParams["prodotto"])) {
    die("Prodotto non trovato!");
}

if (!empty($recensionePrecedente)) {
    $templateParams["recensionePrecedente"] = $recensionePrecedente[0];
}
$templateParams["titolo"] = $templateParams["prodotto"]["nome"];
$templateParams["nome"] = "template-prodotto.php";
$templateParams["scripts"] = array("js/number_button.js", "js/more-review.js", "js/product-buttons.js");

require("template/base.php");
?>