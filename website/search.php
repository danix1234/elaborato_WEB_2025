<?php
require_once("bootstrap.php");


$templateParams["nome"] = "template-search.php";
$templateParams["prodotticasuali"] = $dbh->getRandomProducts();

var_dump($_GET);


require("template/base.php");