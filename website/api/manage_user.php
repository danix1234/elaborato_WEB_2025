<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isAdmin()) {
    die("current user doesn't have admin privileges!");
}

if (!isset($_GET["userId"])) {
    die('no userid was passed!');
}
if (!isset($_GET["deleteuser"])) {
    // modify user
    $dbh->updateUser(
        intval($_GET["userId"]),
        $_POST["privilegi"],
        $_POST["indirizzo"],
        $_POST["citta"]
    );
} else {
    // disable user
    $dbh->disableUser(intval($_GET["userId"]));
}

header("Location: " . $_SERVER['HTTP_REFERER']);
