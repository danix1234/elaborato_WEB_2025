<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    die('not logged in!');
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
} else {
    $templateParams["nome"] = "template-admin-prodotto-insert.php";
}
$templateParams["scripts"] = array("js/number_button.js", "js/preview_image.js", "js/float_button.js", "js/remove_product.js");
$templateParams["categories"] = $dbh->getAllCategories();

require("template/base.php");
