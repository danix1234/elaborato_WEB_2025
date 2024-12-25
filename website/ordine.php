<?php
require_once("bootstrap.php");

if (!isLoggedIn()) {
    die('not logged in!');
}

$templateParams["nome"] = "template-ordine.php";

require("template/base.php");
