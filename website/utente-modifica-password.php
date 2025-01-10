<?php
require_once("bootstrap.php");

if (!empty($_POST["vecchia"]) && !empty($_POST["nuova"]) && !empty($_POST["conferma"])) {
    $vecchia = $_POST["vecchia"];
    $nuova = $_POST["nuova"];
    $conferma = $_POST["conferma"];
    $user = $dbh->getUserbyUserId(getCurrentUserId())[0];
    $hash = $user["password"];
    $verify = password_verify($vecchia, $hash);
    if (!$verify) {
        $templateParams["errore"] = "Password errata.";
    } else if ($nuova !== $conferma) {
        $templateParams["errore"] = "Password nuova e conferma non coincidono";
    } else if ($verify && $nuova === $conferma) {
        $newHash = password_hash($nuova, PASSWORD_DEFAULT);
        $dbh->updateUserPassword(getCurrentUserId(), $newHash);

        $message = "Ciao " . getCurrentUserName() . ", passowrd modificato con successo!";
        $dbh->inserNotification(getCurrentUserId(), $message, "Modifica Password");

        header("Location: search.php");
    }
}

$templateParams["nome"] = "template-password.php";
$templateParams["titolo"] = "Modifica Password";
$templateParams["tipo"] = "Modifica Password";
$templateParams["fields"] = array("vecchia", "nuova", "conferma");
$templateParams["placeHolder"] = array("Vecchia Password", "Nuova Password", "Conferma Password");


require("template/base-sign.php");
?>