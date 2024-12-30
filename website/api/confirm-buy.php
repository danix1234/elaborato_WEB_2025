<?php
require_once("../bootstrap.php");

if (!isLoggedIn()) {
    die("not currently logged in!");
} elseif (empty($_GET["orderId"])) {
    die("orderId not passed via GET method!");
}

$orderId = intval($_GET["orderId"]);
$order = $dbh->getSingleOrder(getCurrentUserId(), $orderId)[0];
$orderDetails = $dbh->getOrder($orderId, getCurrentUserId());

if (empty($order) || empty($orderDetails)) {
    die("order not found");
} else if ($order["statoOrdine"] != "Pending") {
    die("order already processed");
}

$res = $dbh->confirmBuyOrder($orderId, getCurrentUserId());
foreach ($orderDetails as $detail) {
    $quantity = -$detail["quantita"];
    $dbh->updateProductStock($detail["codProdotto"], $quantity);
}

?>