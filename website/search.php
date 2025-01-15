<?php
require_once("bootstrap.php");

$templateParams["nome"] = "template-search.php";
$templateParams["titolo"] = "Home";
$templateParams["scripts"] = ["js/search.js", "js/product-buttons-home.js"];
$templateParams["categorie"] = $dbh->getAllCategories();

$nomeprod = isset($_GET["searchBar"]) ? $_GET["searchBar"] : null;
$codCategoria = isset($_GET["codCategoria"]) ? $_GET["codCategoria"] : null;


if (!empty($nomeprod)) {
    if (empty($codCategoria)) {
        $templateParams["prodotti"] = $dbh->getSearchedProductByName($nomeprod);
    } else {
        $templateParams["prodotti"] = $dbh->getProductForCategoryAndSearch($nomeprod, $codCategoria);
    }
} elseif (!empty($codCategoria)) {
    $templateParams["prodotti"] = $dbh->getProductOnCategory($codCategoria);
} else {
    $templateParams["prodotti"] = $dbh->getRandomProducts();
}

require("template/base.php");