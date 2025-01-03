<?php
require_once("bootstrap.php");


if (!isLoggedIn()) {
    setPreviousPage("ordini.php");
    header("Location: sign-in.php");
}

// called here, to make sure the arrived orders are marked as shipped, before you get all the orders via a query!
$dbh->updateOrdersState(getCurrentUserId());
// NOTE: THIS QUERY MUST BE EXECUTED BEFORE DOING ANYTHING ELSE!

$templateParams["titolo"] = "Ordini";
$templateParams["nome"] = "template-ordini.php";
$templateParams["scripts"] = array("js/filter-orders.js");

$filterTime = !empty($_GET['filter-time']) ? intval($_GET['filter-time']) : null;
$filter = !empty($_GET['filter']) ? $_GET['filter'] : null;
$userId = getCurrentUserId();
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
}

require("template/base.php");
