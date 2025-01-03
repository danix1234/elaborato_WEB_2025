<?php

require_once "../bootstrap.php";

$uploadDir = "../" . UPLOAD_DIR;

if (!isLoggedIn()) {
    die('not currently logged in!');
} elseif (!isAdmin()) {
    die("current user doesn't have admin privilegies!");
}

if (isset($_FILES["preview"]) && $_FILES["preview"]["error"] != UPLOAD_ERR_NO_FILE) {
    list($ok, $msg) = uploadImage($uploadDir, $_FILES["preview"]);
    if (!$ok) {
        die('failur in loading image: ' . $msg);
    }
}

$redirect = "../admin-prodotto.php?productId=";

if (!isset($_GET["productId"])) {
    // insert product
    $dbh->addProduct($_POST["name"], $_POST["description"], intval($_POST["quantity"]), floatval($_POST["price"]), $msg, intval($_POST["category"]));
    $redirect .= $dbh->getLatestProduct()[0]["codProdotto"];
} else if (!isset($_GET["toggle"])) {
    // modify product
    $dbh->updateProduct(intval($_GET["productId"]), $_POST["name"], $_POST["description"], intval($_POST["quantity"]), floatval($_POST["price"]), intval($_POST["category"]));
    $redirect .= $_GET["productId"];
    if (isset($msg)) {
        $product = $dbh->getProduct(intval($_GET["productId"]));
        $dbh->updateProductImg(intval($_GET["productId"]), $msg);
        if (sizeof($product) != 0 && sizeof($dbh->isImageUsed($product[0]["immagine"])) != 0) {
            unlink($uploadDir . $product[0]["immagine"]);
        }
    }
} else {
    // disable product
    $dbh->disableProduct(intval($_GET["productId"]));
    $redirect = "../search.php";
}

header("Location: " . $redirect);
