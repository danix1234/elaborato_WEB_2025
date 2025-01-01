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



if (!empty($templateParams["notifiche"])) {
    foreach ($templateParams["notifiche"] as $index => $notifica) {
        if (!empty($notifica["dataNotifica"])) {
            $timestamp = strtotime($notifica["dataNotifica"]);
            if ($timestamp) {
                $templateParams["notifiche"][$index]["dataNotifica"] = date("d/m/Y H:i", $timestamp);
            } else {
                // Gestione di una dataNotifica non valida
                $templateParams["notifiche"][$index]["dataNotifica"] = "Data non valida";
            }
        }
    }
}



require("template/base.php");
