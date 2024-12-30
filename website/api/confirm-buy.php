<?php
require_once("../bootstrap.php");

if (!isLoggedIn()) {
    die("not currently logged in!");
} elseif (empty($_GET["orderId"])) {
    die("orderId not passed via GET method!");
}

$orderId = intval($_GET["orderId"]);
$order = $dbh->getSingleOrder(getCurrentUserId(), $orderId)[0];
$orderDetails = $dbh->getOrder($orderId, getCurrentUserId());

if (empty($order) || empty($orderDetails)) {
    die("order not found");
} else if ($order["statoOrdine"] != "Pending") {
    die("order already processed");
}

foreach ($orderDetails as $detail) {
    $quantitaResidua = $dbh->getProduct($detail["codProdotto"])[0]["quantitaResidua"];
    $quantitaFinale = $quantitaResidua - $detail["quantita"];
    if ($quantitaFinale >= 0) {
        $dbh->updateProductStock($detail["codProdotto"], $quantity);
        header("Location: ordini.php");
    } else {
        //TODO: cancellare ordine? oppure lasciarlo in attesa
        $dbh->modOrderState($orderId, "Deleted", getCurrentUserId());
        die("Errore: quantita' richiesta superiore a quella disponibile!");
    }
}
$res = $dbh->confirmBuyOrder($orderId, getCurrentUserId());
?>