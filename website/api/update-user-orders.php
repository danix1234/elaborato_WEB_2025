<?php
require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} 

$orders = $dbh->getFilteredOrders(getCurrentUserId(), null, "Shipping");
foreach ($orders as $order){
    $dbh->updateOrderState("Shipped", $order["codOrdine"], getCurrentUserId());
    $message="";
    $dbh->inserNotification(getCurrentUserId(), "L'ordine #".$order["codOrdine"],"");
}
?>
