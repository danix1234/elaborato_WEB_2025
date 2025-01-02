<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    header("Location: sign-in.php");
}
$templateParams["nome"] = "template-admin-utente-modify.php";
$templateParams["scripts"] = array("js/disable-user.js");
$templateParams["user"] = $dbh->getUser(getCurrentUserId())[0];
$templateParams["titolo"] = "Modifica dati personali";

require("template/base.php");
