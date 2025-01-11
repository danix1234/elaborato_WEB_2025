<?php
require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
}

$orders = $dbh->getNotificationShippedButWithShippingState(getCurrentUserId());
var_dump($orders);
foreach ($orders as $order) {
    $dbh->updateOrdersState(getCurrentUserId());
    $dbh->updateOrderShippedDate(date('Y-m-d H:i:s'), $order["codOrdine"], getCurrentUserId());
    $message = "Ciao " . getCurrentUserName() . ", ";
    $message.="L'ordine #" . $order["codOrdine"]. "è arrivata al suo indirizzo!";
    $dbh->inserNotification(getCurrentUserId(), $message, "Arrivo Ordine");
}
?>