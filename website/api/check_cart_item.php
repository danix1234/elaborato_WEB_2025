<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isset($_GET["productId"])) {
    die('productId not passed via GET method!');
}

$userId = getCurrentUserId();
$productId = $_GET["productId"];

header('Content-Type: application/json');
echo json_encode($dbh->getCartItemPlusProductData($userId, $productId));
