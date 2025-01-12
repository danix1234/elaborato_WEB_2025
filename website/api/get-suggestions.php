<?php
require_once("../bootstrap.php");

$filteredsuggestions = array();
$products = $dbh->getAllProducts();
if (!empty($_GET["codCategoria"])) {
    foreach ($products as $product) {
        if (intval($product["codCategoria"]) === intval($_GET["codCategoria"])) {
            array_push($filteredsuggestions, $product["nome"]);
        }
    }
} else {
    foreach ($products as $product) {
        array_push($filteredsuggestions, $product["nome"]);
    }
    foreach ($dbh->getAllCategories() as $category) {
        array_push($filteredsuggestions, $category["nome"]);
    }
}
echo json_encode($filteredsuggestions);
?>