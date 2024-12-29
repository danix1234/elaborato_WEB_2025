<?php
require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die("not currently logged in!");
} elseif (!isset($_GET["product"]) || !isset($_GET["quantity"])) {
    die("product id and/or quantity not passed via GET method!");
}
$productId = intval($_GET["product"]);
$quantity = intval($_GET["quantity"]);

$item = $dbh->getSingleCartItem($productId, getCurrentUserId())[0];

if (!empty($item)) {
    $totalQuantity = intval($item["quantita"]) + $quantity;
    $residuo = intval($dbh->getProduct($productId)[0]["quantitaResidua"]);
    if ($totalQuantity > $residuo) {
        die("quanita richiesta superiore a quella disponibile!");
    }
    $dbh->updateCartQuantity(getCurrentUserId(), $productId, $totalQuantity);
    echo "oggetto aggiornato!";
} else {
    $dbh->addItemToCart($productId, getCurrentUserId(), $quantity);
    echo "oggetto aggiunto!";
}
?>