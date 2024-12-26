<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isAdmin()) {
    die("current user doesn't have admin privilegies!");
}

if (isset($_FILES["preview"]) && $_FILES["preview"]["error"] != UPLOAD_ERR_NO_FILE) {
    list($ok, $msg) = uploadImage("../" . UPLOAD_DIR, $_FILES["preview"]);
    if (!$ok) {
        die('failur in loading image: ' . $msg);
    }
}

if (!isset($_GET["productId"])) {
    // insert product
    $dbh->addProduct($_POST["name"], $_POST["description"], intval($_POST["quantity"]), floatval($_POST["price"]), $msg, intval($_POST["category"]));
} else {
    // modify product
    $dbh->updateProduct(intval($_GET["productId"]), $_POST["name"], $_POST["description"], intval($_POST["quantity"]), floatval($_POST["price"]), intval($_POST["category"]));
    if (isset($msg)) {
        $dbh->updateProductImg(intval($_GET["productId"]), $msg);
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
