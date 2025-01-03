<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    setPreviousPage("carrello.php");
    header("Location: sign-in.php");
}

$templateParams["nome"] = "template-carrello.php";
$templateParams["scripts"] = array("js/number_button.js", "js/total_price.js", "js/buy-cart.js");
$templateParams["titolo"] = "Carrello";

$userId = getCurrentUserId();
$templateParams["carrello"] = $dbh->getAllCartItems($userId);

require("template/base.php");
