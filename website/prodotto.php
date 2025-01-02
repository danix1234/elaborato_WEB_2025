<?php
require_once("bootstrap.php");

if (!isset($_GET["productId"])) {
    die("productId not set!");
}

$productId = intval($_GET["productId"]);

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
$templateParams["scripts"] = array("js/number_button.js", "js/more-review.js", "js/product-buttons.js");

require("template/base.php");
?>