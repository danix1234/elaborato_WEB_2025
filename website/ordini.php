<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
}

$templateParams["titolo"] = "Ordini";
$templateParams["nome"] = "template-ordini.php";
$templateParams["ordini"] = $dbh->getOrders(getCurrentUserId());
if (!empty($templateParams["ordini"])) {
    foreach ($templateParams["ordini"] as $index => $ordine) {
        $prodotti =$dbh->getOrder($ordine["codOrdine"], getCurrentUserId());
        $prodottoPreview =$prodotti[0];
        $templateParams["ordini"][$index]["nomeProdotto"] = $prodottoPreview["nome"];
        $templateParams["ordini"][$index]["immaginePreview"] = $prodottoPreview["immagine"];
        $templateParams["ordini"][$index]["totProdotti"] = count($prodotti);
    }
}


require("template/base.php");
?>