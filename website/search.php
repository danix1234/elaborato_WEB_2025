<?php
require_once("bootstrap.php");

$templateParams["nome"] = "template-search.php";
$templateParams["prodotticasuali"] = $dbh->getRandomProducts();

require("template/base.php");
