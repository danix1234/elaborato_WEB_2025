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
} else if ($order["statoOrdine"] != "In Attesa") {
    die("order already processed");
}

// check if requested quantity >= remaining
foreach ($orderDetails as $detail) {
    $quantitaResidua = $dbh->getProduct($detail["codProdotto"])[0]["quantitaResidua"];
    $quantitaFinale = $quantitaResidua - $detail["quantita"];
    if ($quantitaFinale < 0) {
        $dbh->updateOrderState($orderId, "Cancellato", getCurrentUserId());
        die("Errore: quantita' richiesta superiore a quella disponibile!");
    }
}

foreach ($orderDetails as $detail) {
    $quantitaResidua = $dbh->getProduct($detail["codProdotto"])[0]["quantitaResidua"];
    $quantitaFinale = $quantitaResidua - $detail["quantita"];
    $dbh->updateProductStock($detail["codProdotto"], $quantitaFinale);
}

$dbh->updateOrderStateConfirmBuy($orderId, getCurrentUserId());

$message = "Ciao " . getCurrentUserName() . ", ";
$message .= "Hai completato il pagamento dell'ordine #" . $orderId;
$dbh->inserTNotification(getCurrentUserId(), $message, "Pagamento Ordine");

// BY DANIELE: if any product was finished thanks to this order, send a notification to all ADMINS
$products = $dbh->getOrder($orderId, getCurrentUserId());
$admins = $dbh->getAllAdmins();
foreach ($products as $product) {
    if ($product["quantitaResidua"] == 0) {
        foreach ($admins as $admin) {
            $msg = "Ciao " . $admin["nomeUtente"] . ", il prodotto #" . $product["codProdotto"] . " è esaurito!";
            $dbh->inserTNotification($admin["codUtente"], $msg, "Prodotto esaurito");
        }
    }
}
// END CODE BY DANIELE
