<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isAdmin()) {
    die("current user doesn't have admin privileges!");
}

if (!isset($_GET["userId"])) {
    $dbh->addUser(
        $_POST["nomeUtente"],
        $_POST["password"],
        $_POST["email"],
        $_POST["privilegi"],
        $_POST["indirizzo"],
        $_POST["citta"]
    );
} elseif (!isset($_GET["delete"])) {
    $dbh->updateUser(
        $_POST["nomeUtente"],
        $_POST["password"],
        $_POST["email"],
        $_POST["privilegi"],
        $_POST["indirizzo"],
        $_POST["citta"]
    );
} else {
    $dbh->deleteUser($_POST["nomeUtente"]);
}

header("Location: " . $_SERVER['HTTP_REFERER']);
