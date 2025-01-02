<?php
require_once("bootstrap.php");

$templateParams["nome"] = "template-search.php";
$templateParams["scripts"] = ["js/fiter-for-categories.js"];
$templateParams["categorie"] = $dbh->getAllCategories();

if (!isset($_GET["codCategoria"]) && !isset($_GET["searchBar"])) {
    $templateParams["prodotti"] = $dbh->getRandomProducts();
} elseif (isset($_GET["codCategorie"]) && !isset($_GET["searchBar"])) {
    $templateParams["prodotti"] = $dbh->getProductOnCategory($_GET["codCategorie"]);
} elseif (!isset($_GET["codCategorie"]) && isset($_GET["searchBar"])) {
    $templateParams["prodotti"] = $dbh->getSearchedProductByName($_GET["searchBar"]);
} else {
    $templateParams["prodotti"] = $dbh->getProductForCategoryAndSearch($_GET["codCategorie"], $_GET["searchBar"]);
}

require("template/base.php");