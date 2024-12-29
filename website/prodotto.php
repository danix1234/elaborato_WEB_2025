<?php
require_once("bootstrap.php");

if (!isset($_GET["productId"])) {
    die("productId not set!");
}

$templateParams["nome"] = "template-prodotto.php";
$templateParams["prodotto"] = $dbh->getProductforProdotto($_GET["productId"])[0];
if (empty($templateParams["prodotto"])) {
    die("Prodotto non trovato!");
}
$mediaVoto = $templateParams["prodotto"]["mediaVoto"];
$mediaVotoInt = floor($mediaVoto);
$mediaVotoDec = ($mediaVoto - $mediaVotoInt) * 10;
$templateParams["prodotto"]["votoInt"] = $mediaVotoInt;
$templateParams["prodotto"]["votoDec"] = $mediaVotoDec;
$templateParams["recensioni"] = $dbh->getProductReviews($_GET["productId"]);

$templateParams["titolo"] = $templateParams["prodotto"]["nome"];
$templateParams["scripts"] = array("js/number_button.js", "js/more-review.js");

require("template/base.php");
?>