<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
} elseif (!isAdmin()) {
    die('cannot modify users, without admin privilegies!');
} elseif (!isset($_GET["userId"])) {
    die('userid is missing!');
}


$templateParams["nome"] = "template-admin-utente-modify.php";
$templateParams["scripts"] = array("js/remove_user.js");

$user = $dbh->getUser(intval($_GET["userId"]));
if (sizeof($user) == 0) {
    die('not a valid user id!');
}

$templateParams["user"] = $user[0];

require("template/base.php");
