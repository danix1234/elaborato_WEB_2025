<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isAdmin()) {
    die("current user doesn't have admin privilegies!");
}

if (!isset($_GET["productId"])) {
    // insert product
    $dbh->addProduct($_POST["name"], $_POST["description"], intval($_POST["quantity"]), floatval($_POST["price"]), 'TODO: image', intval($_POST["category"]));
} elseif (!isset($_GET["delete"])) {
    // modify product
    $dbh->updateProduct(intval($_GET["productId"]), $_POST["name"], $_POST["description"], intval($_POST["quantity"]), floatval($_POST["price"]), 'TODO: image', intval($_POST["category"]));
} else {
    // remove product
    $dbh->deleteProduct(intval($_GET["productId"]));
}


header("Location: " . $_SERVER['HTTP_REFERER']);
