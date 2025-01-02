<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isAdmin()) {
    die("current user doesn't have admin privileges!");
}

$location = "../search.php";

if (!isset($_GET["userId"])) {
    die('no userid was passed!');
}
if (!isset($_GET["deleteuser"])) {
    // modify user
    $dbh->updateUser(intval($_GET["userId"]), $_POST["name"], $_POST["address"], $_POST["city"]);
    if (isset($_POST["privileges"])) {
        $dbh->updateUserPrivilegies(intval($_GET["userId"]), intval($_POST["privileges"] == "Admin"));
    }
    $location = "../admin-utente.php?userId=" . $_GET["userId"];
} else {
    // disable user
    $dbh->disableUser(intval($_GET["userId"]));
}

header("Location: " . $location);
