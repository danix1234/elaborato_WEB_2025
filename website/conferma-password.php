<?php
require_once("bootstrap.php");

$templateParams["nome"] = "template-confirm-password.php";
$templateParams["titolo"] = "Conferma Password";
$templateParams["tipo"] = "Conferma Password";
$templateParams["action"] = "conferma-password.php";

require("template/base-sign.php");