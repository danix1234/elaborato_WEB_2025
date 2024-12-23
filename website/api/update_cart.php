<?php

require_once "../bootstrap.php";

if (!isset($_GET["product"])) {
    return;
};

/* TODO: get codutente from session */
$codUtente = getCurrentUserId();
$codProdotto = $_GET["product"];
if (isset($_GET["delete"])) {
    $dbh->deleteFromCart($codUtente, intval($codProdotto));
} elseif (isset($_GET["quantity"])) {
    $dbh->updateCartQuantity($codUtente, intval($codProdotto), intval($_GET["quantity"]));
}
