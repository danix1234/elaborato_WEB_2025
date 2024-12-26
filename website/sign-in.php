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
        } else {
            $templateParams["erroresign"] = "Errore, email o password sbagliati.";
        }
    } else {
        $templateParams["erroresign"] = "Errore, email o password sbagliati.";
    }
}

if (isLoggedIn()) {
    header("Location: prodotto.php"); //TODO home
} else {
    $templateParams["nome"] = "template-sign.php";
    $templateParams["tipo"] = "Accedi";
    $templateParams["fields"] = array("email", "password");
    $templateParams["redirect"] = "Sei nuovo? Registrati!";
    require("template/base-sign.php");
}
?>