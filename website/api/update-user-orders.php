<?php
require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
}

$orders = $dbh->getFilteredOrders(getCurrentUserId(), null, "Shipping");
foreach ($orders as $order){
    // update the order state, since i removed setting the dataConsegna, we can set it here
    $dbh->updateOrderState("Spedito", $order["codOrdine"], getCurrentUserId());
    $message="";
    $dbh->inserNotification(getCurrentUserId(), "L'ordine #".$order["codOrdine"],"");
}
?>
