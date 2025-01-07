<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    setPreviousPage("notifiche.php");
    header("Location: sign-in.php");
    exit();
}

$templateParams["titolo"] = "Notifiche";
$templateParams["nome"] = "template-notifiche.php";
$templateParams["scripts"] = ["js/notifiche.js"];

$userId = getCurrentUserId();

if (!empty($_GET['codNotifica'])) {
    $codNotifica = ($_GET['codNotifica']);
    if ($_GET['codNotifica'] == 'tutte') {
        $templateParams['notifiche'] = $dbh->getFilteredNotifications($userId, 0);
        foreach ($templateParams['notifiche'] as $notifica) {
            $dbh->markNotificationAsRead($notifica['codNotifica'], $userId);
        }
    } else {
        $dbh->markNotificationAsRead($codNotifica, $userId);
    }
}

$filter = !empty($_GET['filter']) ? $_GET['filter'] : null;

$templateParams["notifiche"] = $dbh->getFilteredNotifications($userId, $filter);

require("template/base.php");
