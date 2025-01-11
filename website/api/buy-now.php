<?php
require_once("../bootstrap.php");

if (!isLoggedIn()) {
    die("not currently logged in!");
} elseif (empty($_GET["productId"]) || empty($_GET["quantity"])) {
    die("product id and/or quantity not passed via GET method!");
}

$quantity = intval($_GET["quantity"]);
$productId = $_GET["productId"];

$res = $dbh->addOrderBuyNow($productId, getCurrentUserId(), $quantity);
$orderId = intval($dbh->getLastOrderId()[0]["codOrdine"]);
$res = $dbh->addOrderDetail($orderId, $productId, $quantity);

header("Location: ../pagamento.php?orderId=" . $orderId);
?>