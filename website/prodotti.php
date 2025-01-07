<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
} elseif (!isAdmin()) {
    die('thou shall not pass without admin privilegies!');
}

$templateParams["nome"] = "template-prodotti.php";
$templateParams["scripts"] = array("js/disable-product.js");
$templateParams["titolo"] = "Prodotti";

$userId = getCurrentUserId();
$templateParams["prodotti"] = $dbh->getAllProductsEvenDisabled();

require("template/base.php");
