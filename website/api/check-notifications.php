<?php
require_once "../bootstrap.php";

$temp = false;
if (isLoggedIn() && $dbh->hasUnreadNotification(getCurrentUserId())) {
    $temp = true;
}
echo json_encode($temp);
?>