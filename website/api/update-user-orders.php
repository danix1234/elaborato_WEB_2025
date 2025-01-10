<?php
require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} 

/*for each order that its state = "shipping" do stuff..
change the order state into shipped and send the notification*/

$orders = $dbh->getFilteredOrders(getCurrentUserId(), null, "Shipping");
foreach ($orders as $order){
    // update the order state, since i removed setting the dataConsegna, we can set it here
    $dbh->updateOrderState("Shipped", $order["codOrdine"], getCurrentUserId());
    $message="";
    $dbh->inserNotification(getCurrentUserId(), "L'ordine #".$order["codOrdine"],"");
}
?>
