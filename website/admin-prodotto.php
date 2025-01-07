<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
} elseif (!isAdmin()) {
    die('cannot modify products, without admin privilegies!');
}

if (isset($_GET["productId"])) {
    $templateParams["nome"] = "template-admin-prodotto-modify.php";
    $product = $dbh->getProduct($_GET["productId"]);
    if (sizeof($product) == 0) {
        die('not a valid product id!');
    } else {
        $templateParams["product"] = $product[0];
    }
    $templateParams["titolo"] = "Modifica prodotto";
} else {
    $templateParams["nome"] = "template-admin-prodotto-insert.php";
    $templateParams["titolo"] = "Inserisci prodotto";
}
$templateParams["scripts"] = array("js/number_button.js", "js/preview_image.js", "js/float_button.js");
$templateParams["categories"] = $dbh->getAllCategories();

require("template/base.php");
