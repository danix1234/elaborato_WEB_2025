<?php
require_once("bootstrap.php");

if (
    !empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["password"]) &&
    !empty($_POST["indirizzo"]) && !empty($_POST["citta"])
) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $indirizzo = $_POST["indirizzo"];
    $citta = $_POST["citta"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkEmail = $dbh->getUserbyEmail($email);
        if (!empty($checkEmail)) {
            $templateParams["erroresign"] = "Errore, email gia' registrata.";
        } else {
            $dbh->addUserr($nome, $password, $email, $indirizzo, $citta);
            $login_result = $dbh->checkLogin($email, $password);
            registerUser($login_result[0]);
        }
    } else {
        $templateParams["erroresign"] = "Errore, email non valida.";
    }
}

if (isLoggedIn()) {
    header("Location: prodotto.php"); //TODO home
    session_unset();
} else {
    $templateParams["nome"] = "sign.php";
    $templateParams["tipo"] = "Registrazione";
    $templateParams["fields"] = array("nome", "email", "password", "indirizzo", "citta");
    $templateParams["redirect"] = "Hai gia' un account? Accedi!";
    require("template/base-sign.php");
}
?>