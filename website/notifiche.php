<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
    exit();
}

$templateParams["titolo"] = "Notifiche";
$templateParams["nome"] = "template-notifiche.php";
$templateParams["scripts"] = ["js/notifiche.js"];

$userId = getCurrentUserId();

$filter = !empty($_GET['filter']) ? $_GET['filter'] : null;

$templateParams["notifiche"] = $dbh->getFilteredNotifications($userId, $filter);

require("template/base.php");
