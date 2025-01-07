<?php
require_once("bootstrap.php");


if (!isLoggedIn()) {
    setPreviousPage("ordini.php");
    header("Location: sign-in.php");
}

// SNIPPED OF CODE HANDLED BY Daniele: check if any order got shipped, and in such case, also send a notification
$orders = $dbh->getNotificationShippedButWithShippingState(getCurrentUserId());
foreach ($orders as $order) {
    $dbh->notificationFromShippedOrder(intval($order["codOrdine"]));
}
$dbh->updateOrdersState(getCurrentUserId());
// END OF SNIPPET OF CODE HANDLED BY Daniele!

$templateParams["titolo"] = "Ordini";
$templateParams["nome"] = "template-ordini.php";


$filterTime = !empty($_GET['filter-time']) ? intval($_GET['filter-time']) : null;
$filter = !empty($_GET['filter']) ? $_GET['filter'] : null;
$userId = getCurrentUserId();
$templateParams["vuoto"] = empty($dbh->getFilteredOrders($userId));
$templateParams["ordini"] = $dbh->getFilteredOrders($userId, $filterTime, $filter);

if (!empty($templateParams["ordini"])) {
    foreach ($templateParams["ordini"] as $index => $ordine) {
        $prodotti = $dbh->getOrder($ordine["codOrdine"], getCurrentUserId());
        $prodottoPreview = $prodotti[0];
        $descrizioneOrdine = $prodottoPreview["nome"];
        if (count($prodotti) == 2) {
            $descrizioneOrdine .= " e un altro prodotto";
        } else if (count($prodotti) > 2) {
            $descrizioneOrdine .= " e altri " . (count($prodotti) - 1) . " prodotti";
        }
        $templateParams["ordini"][$index]["descrizioneOrdine"] = $descrizioneOrdine;
        $templateParams["ordini"][$index]["immaginePreview"] = $prodottoPreview["immagine"];
        $templateParams["ordini"][$index]["totProdotti"] = count($prodotti);
    }
    $templateParams["scripts"] = array("js/filter-orders.js");
}

require("template/base.php");
