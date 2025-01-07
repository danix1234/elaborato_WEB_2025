<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
}
$location = "../search.php";

if (!isset($_GET["userId"])) {
    die('no userid was passed!');
}
if (!isset($_GET["toggleuser"])) {
    // modify user
    $dbh->updateUser(intval($_GET["userId"]), $_POST["name"], $_POST["address"], $_POST["city"]);
    if (isset($_POST["privileges"])) {
        $dbh->updateUserPrivilegies(intval($_GET["userId"]), intval($_POST["privileges"] == "Admin"));
    }
    if (!empty($_POST["new-password"])) {
        $password = $_POST["new-password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $dbh->updateUserPassword(intval($_GET["userId"]), $hash);
    }
    $location = "../utente-modifica.php"; //?userId=" . $_GET["userId"]; Non serve by franco
} else {
    if (!isAdmin()) {
        die('ptff, you are barely a StAndArd user! Come back when you have some admin powers, you noob!!!');
    }
    // disable user
    $dbh->toggleUser(intval($_GET["userId"]));
}

header("Location: " . $location);
