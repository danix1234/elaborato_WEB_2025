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

$res = $dbh->buyCartAddOrder($userId, "TODO", true);
$res = $dbh->buyCartAddOrderDetails($userId);
$res = $dbh->buyCartUpdateQuantityLeft($userId);
$res = $dbh->buyCartDeleteCart($userId);
