<?php
require_once("bootstrap.php");

if (!isAdmin()) {
    die('cannot modify users, without admin privilegies!');
}

if (isset($_GET["userId"])) {
    $templateParams["nome"] = "template-admin-utente-modify.php";
    $user = $dbh->getuser($_GET["userId"]);
    if (sizeof($user) == 0) {
        die('not a valid user id!');
    } else {
        $templateParams["user"] = $user[0];
    }
} else {
    $templateParams["nome"] = "template-admin-utente-insert.php";
}
$templateParams["scripts"] = array("js/preview_image.js", "js/remove_user.js");

require("template/base.php");
