<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isset($_GET["product"])) {
    die('product id not passed via GET method!');
};

$codUtente = getCurrentUserId();
$codProdotto = $_GET["product"];
if (isset($_GET["delete"])) {
    $dbh->deleteFromCart($codUtente, intval($codProdotto));
    echo 'deleted product from cart!';
} elseif (isset($_GET["quantity"])) {
    $dbh->updateCartQuantity($codUtente, intval($codProdotto), intval($_GET["quantity"]));
    echo 'updated product from cart!';
}
