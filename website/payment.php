<?php
require_once("bootstrap.php");
echo getpreviousPage();
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

$previousURL = isset($_SERVER["HTTP_REFERER"]) ? basename($_SERVER["HTTP_REFERER"]) : "search.php";
if (!str_contains($_SERVER["HTTP_REFERER"], "payment.php")) {
    setPreviousPage($previousURL);
}
$orderId = intval($_GET["orderId"]);
$prodotti = "<br/>";
foreach ($dettagliOrdine as $prodotto) {
    $prodotti .= $prodotto["nome"] . " x" . $prodotto["quantita"] . "<br/>";
}
$templateParams["ordine"] = $dettagliOrdine[0];
$templateParams["listaProdotti"] = $prodotti;
$templateParams["titolo"] = "Pagamento";
$templateParams["nome"] = "template-payment.php";

if (isset($_GET["deleted"]) && $_GET["deleted"] == true) {
    $res = $dbh->modOrderState($orderId, "Deleted", getCurrentUserId());
    header("Location: " . getpreviousPage());
}

require("template/base-sign.php");

?>