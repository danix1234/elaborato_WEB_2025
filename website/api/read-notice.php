<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
}

$codNotifiche = $_GET("codNotifiche");

var_dump($_POST);
var_dump($_GET);
var_dump($codNotifiche);
