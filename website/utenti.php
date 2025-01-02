<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
} elseif (!isAdmin()) {
    die('thou shall not pass without admin privilegies!');
}

$templateParams["nome"] = "template-utenti.php";
$templateParams["scripts"] = array();
$templateParams["titolo"] = "Utenti";

$userId = getCurrentUserId();
$templateParams["utenti"] = $dbh->getAllUsers();

require("template/base.php");
