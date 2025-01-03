<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
} elseif (!isset($_GET["orderId"])) {
    die('orderId not set!');
}

$templateParams["nome"] = "template-ordine.php";
$templateParams["ordine"] = $dbh->getOrder($_GET["orderId"], getCurrentUserId());
$templateParams["titolo"] = "Ordine";

require("template/base.php");
