<?php
require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die("not currently logged in!");
} elseif (!isset($_GET["product"]) || !isset($_GET["quantity"])) {
    die("product id and/or quantity not passed via GET method!");
}
$productId = intval($_GET["product"]);
$quantity = intval($_GET["quantity"]);

$items = $dbh->getSingleCartItem($productId, getCurrentUserId());

if (!empty($items)) {
    $item = $items[0];
    $totalQuantity = intval($item["quantita"]) + $quantity;
    $residuo = intval($dbh->getProduct($productId)[0]["quantitaResidua"]);
    if ($totalQuantity > $residuo) {
        die("quantita' richiesta superiore a quella disponibile!");
    }
    $dbh->updateCartQuantity(getCurrentUserId(), $productId, $totalQuantity);
    echo "oggetto aggiornato con successo!";
} else {
    $dbh->addItemToCart($productId, getCurrentUserId(), $quantity);
    echo "oggetto aggiunto con successo!";
}
?>