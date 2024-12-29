<?php
require_once("bootstrap.php");

if (!isset($_GET["productId"])) {
    die("productId not set!");
}

$templateParams["recensioni"] = $dbh->getProductReviews($_GET["productId"]);
if (empty($templateParams["recensioni"])) {
    $templateParams["prodotto"] = $dbh->getProduct($_GET["productId"])[0];
    $templateParams["prodotto"]["mediaVoto"] = "0.0";
} else {
    $templateParams["prodotto"] = $dbh->getProductwithRating($_GET["productId"])[0];
}
if (empty($templateParams["prodotto"])) {
    die("Prodotto non trovato!");
}

$templateParams["titolo"] = $templateParams["prodotto"]["nome"];
$templateParams["nome"] = "template-prodotto.php";
$templateParams["scripts"] = array("js/number_button.js", "js/more-review.js", "js/add-cart.js");

require("template/base.php");
?>