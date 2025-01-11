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
        $dbh->modOrderState($orderId, "Cancellato", getCurrentUserId());
        die("Errore: quantita' richiesta superiore a quella disponibile!");

    }
}
foreach ($orderDetails as $detail) {
    $quantitaResidua = $dbh->getProduct($detail["codProdotto"])[0]["quantitaResidua"];
    $quantitaFinale = $quantitaResidua - $detail["quantita"];
    $dbh->updateProductStock($detail["codProdotto"], $quantitaFinale);
}

$dbh->updateOrderState("In Spedizione", $orderId, getCurrentUserId());

$message = "Ciao " . getCurrentUserName() . ", ";
$message .= "Hai completato il pagamento dell'ordine #" . $orderId;
$dbh->inserNotification(getCurrentUserId(), $message, "Pagamento Ordine");

?>