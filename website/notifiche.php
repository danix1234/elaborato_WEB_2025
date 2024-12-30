<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
    exit();
}

$templateParams["nome"] = "template-notifiche.php";
$templateParams["scripts"] = ["js/notifiche.js"];

$userId = getCurrentUserId();

$filter = !empty($_GET['filter']) ? $_GET['filter'] : null;

$templateParams["notifiche"] = $dbh->getFilteredNotifications($userId, $filter);

if (!empty($templateParams["notifiche"])) {
    foreach ($templateParams["notifiche"] as $index => $notifica) {
        $templateParams["notifiche"][$index]["data"] = date("d/m/Y H:i", strtotime($notifica["data"]));
    }
}

require("template/base.php");
