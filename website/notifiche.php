<?php
require_once("bootstrap.php");

// Redirezione se non loggato
if (!isLoggedIn()) {
    header("Location: sign-in.php");
    exit();
}

// Imposta il template
$templateParams["nome"] = "template-notifiche.php";
$templateParams["scripts"] = ["js/notifiche.js"];


// Ottieni l'ID utente
$userId = getCurrentUserId();

// Filtri opzionali dai parametri GET
$filter = !empty($_GET['filter']) ? $_GET['filter'] : null;

// Recupera le notifiche filtrate
$templateParams["notifiche"] = $dbh->getFilteredNotifications($userId, $filter);

if (!empty($templateParams["notifiche"])) {
    foreach ($templateParams["notifiche"] as $index => $notifica) {
        $templateParams["notifiche"][$index]["data"] = date("d/m/Y H:i", strtotime($notifica["data"]));
    }
}

require("template/base.php");
