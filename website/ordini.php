<?php
require_once("bootstrap.php");


if (!isLoggedIn()) {
    header("Location: sign-in.php");
}

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
        $templateParams["ordini"][$index]["nomeProdotto"] = $prodottoPreview["nome"];
        $templateParams["ordini"][$index]["immaginePreview"] = $prodottoPreview["immagine"];
        $templateParams["ordini"][$index]["totProdotti"] = count($prodotti);
    }
}

require("template/base.php");
?>