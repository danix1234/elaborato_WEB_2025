<?php
require_once("../bootstrap.php");

if (!isLoggedIn()) {
    die("not currently logged in!");
}

$userId = getCurrentUserId();

$dbh->updateOrdersState($userId);

