<?php
require_once("../bootstrap.php");

if (!isLoggedIn()) {
    die("not currently logged in!");
} elseif (empty($_GET["productId"])) {
    die("product id not passed via GET method!");
}

$quantity = intval($_GET["quantity"]);
$productId = $_GET["productId"];

$res = $dbh->addOrderBuyNow($productId, getCurrentUserId(), $quantity);
$orderId = intval($dbh->getLastOrderId()[0]["codOrdine"]);
$res = $dbh->addOrderDetail($orderId, $productId, $quantity);

header("Location: ../pagamento.php?orderId=" . $orderId);
?>