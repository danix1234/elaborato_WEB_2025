<?php
require_once("bootstrap.php");

if (!empty($_POST["password"])) {
    $password = $_POST["password"];
    $user = $dbh->getUserbyUserId(getCurrentUserId())[0];
    $hash = $user["password"];
    if (password_verify($password, $hash)) {
        $redirect = empty($_GET["redirect"]) ? "" : $_GET["redirect"];
        if ($redirect === "modifica-dati") {
            header("Location: utente-modifica.php");
        } else if ($redirect === "modifica-password") {
            header("Location: utente-modifica-password.php");
        } else {
            $templateParams["errore"] = "Unknown redirect";
        }
    } else {
        $templateParams["errore"] = "Password errata.";
    }
}

$templateParams["nome"] = "template-password.php";
$templateParams["titolo"] = "Conferma Password";
$templateParams["tipo"] = "Conferma Password";
$templateParams["fields"] = array("password");
$templateParams["placeHolder"] = array("Password");


require("template/base-sign.php");
?>