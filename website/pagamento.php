<?php
require_once("bootstrap.php");
if (!isLoggedIn()) {
    die("not currently logged in!");
} else if (empty($_GET["orderId"])) {
    die("orderId not set");
}

$dettagliOrdine = $dbh->getOrder($_GET["orderId"], getCurrentUserId());
if (empty($dettagliOrdine)) {
    die("order not found");
} else if (!empty($dettagliOrdine) && $dettagliOrdine[0]["statoOrdine"] != "Pending") {
    die("order already processed");
}

$orderId = intval($_GET["orderId"]);
$prodotti = "<br/>";
foreach ($dettagliOrdine as $prodotto) {
    $prodotti .= $prodotto["nome"] . " x" . $prodotto["quantita"] . "<br/>";
}
$templateParams["ordine"] = $dettagliOrdine[0];
$templateParams["listaProdotti"] = $prodotti;
$templateParams["titolo"] = "Pagamento";
$templateParams["nome"] = "template-pagamento.php";
$templateParams["scripts"] = array("js/confirm-buy.js");

if (isset($_GET["deleted"]) && $_GET["deleted"] == true) {
    $dbh->modOrderState($orderId, "Deleted", getCurrentUserId());
    $message = "Ciao " . getCurrentUserName() . ", ";
    $message .= "Hai cancellato il pagamento dell'ordine #" . $orderId;
    $dbh->inserNotification(getCurrentUserId(), $message, "Pagamento    Ordine");
    header("Location: ordini.php");
}

require("template/base-sign.php");

?>