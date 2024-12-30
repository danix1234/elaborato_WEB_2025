<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
}

$userId = getCurrentUserId();

$invalidRows = $dbh->checkCartInvalidRows($userId);
$validRows = $dbh->checkCartValidRows($userId);

if (sizeof($invalidRows) > 0) {
    $dbh->buyCartDeleteCart($userId);
    die('invalid products or invalid product quantity');
}

if (sizeof($validRows) == 0) {
    echo 'nothing to do!';
    return;
}

$res = $dbh->buyCartAddOrder($userId, "Pending", false);
if ($res[0] != 0 && $res[1] != 1) {
    die('add order query failed!');
}
$orderId = intval($dbh->getLastOrderId()[0]["codOrdine"]);
$res = $dbh->buyCartAddOrderDetails($userId, $orderId);
$res = $dbh->buyCartDeleteCart($userId);

header("Location: ../pagamento.php?orderId=" . $orderId);
