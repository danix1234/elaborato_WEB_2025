<?php
require_once("bootstrap.php");

if (!empty($_POST["email"]) && !empty($_POST["password"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = $dbh->getUserbyEmail($email);
    if (!empty($user)) {
        $hash = $user[0]["password"];
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && password_verify($password, $hash)) {
            registerUser($user[0]);
            header("Location: prodotto.php"); //TODO home
        } else {
            $templateParams["erroresign"] = "Errore, email o password sbagliati.";
        }
    } else {
        $templateParams["erroresign"] = "Errore, email o password sbagliati.";
    }
}
$templateParams["titolo"] = "Accedi";
$templateParams["nome"] = "template-sign.php";

if (isLoggedIn()) {
    $templateParams["tipo"] = "Il tuo Account";
    $templateParams["fields"] = ""; //TODO forse far vedete i dati dell'utente
    $templateParams["redirect"] = "Esci dal tuo Account";
    if (isset($_GET["logout"]) && $_GET["logout"] == true) {
        session_unset();
        header("Location: prodotto.php"); //TODO home
    }
} else {
    $templateParams["tipo"] = "Accedi";
    $templateParams["fields"] = array("email", "password");
    $templateParams["redirect"] = "Sei nuovo? Registrati!";
    $templateParams["redirect-link"] = "sign-up.php";
}
require("template/base-sign.php");
?>