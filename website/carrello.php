<?php
require_once("bootstrap.php");

$templateParams["nome"] = "template-carrello.php";
$templateParams["scripts"] = array("js/number_button.js", "js/total_price.js");

$templateParams["carrello"] = $dbh->getAllCartItems(getCurrentUserId());

require("template/base.php");
