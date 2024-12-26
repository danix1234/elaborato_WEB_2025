<?php
require_once("bootstrap.php");

if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    // sql injection 
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $login_result = $dbh->checkLogin($email, $password);
        if (!empty($login_result)) {
            registerUser($login_result[0]);
        } else {
            $templateParams["erroresignin"] = "Errore, email o password sbagliati.";
        }
    } else {
        $templateParams["erroresignin"] = "Errore, email o password sbagliati.";
    }
}

if (isLoggedIn()) {
    header("Location: prodotto.php"); //TODO home
    session_unset();
} else {
    $templateParams["nome"] = "sign.php";
    $templateParams["tipo"] = "Accedi";
    $templateParams["fields"] = array("email", "password");
    $templateParams["redirect"] = "Sei nuovo? Registrati!";
    require("template/base-sign.php");
}
?>