<?php
require_once("bootstrap.php");

if (!isset($_GET["productId"])) {
    die("productId not set!");
}

$productId = intval($_GET["productId"]);
if (!empty($_POST["votoRecensione"]) && !empty($_POST["commento"])) {
    if ($dbh->hasboughtProduct(getCurrentUserId(), $productId)){
        $commento = $_POST["commento"];
        $votoRecensione = $_POST["votoRecensione"];
        $dbh->insertReview(getCurrentUserId(), $productId, $votoRecensione, $commento);
    }else{
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
        $src = UPLOAD_DIR;
        $src .= boolval($templateParams["recensioni"][$i]["privilegi"]) ? "admin.jpg" : "user.jpg";
        $templateParams["recensioni"][$i]["immagineProfilo"] = $src;
    }
}
if (empty($templateParams["prodotto"])) {
    die("Prodotto non trovato!");
}

$templateParams["titolo"] = $templateParams["prodotto"]["nome"];
$templateParams["nome"] = "template-prodotto.php";
$templateParams["scripts"] = array("js/number_button.js", "js/more-review.js", "js/product-buttons.js", "js/star-rating.js");

require("template/base.php");
?>