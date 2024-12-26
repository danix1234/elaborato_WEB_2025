<?php
require_once("bootstrap.php");

if (
    !empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["password"]) &&
    !empty($_POST["indirizzo"]) && !empty($_POST["citta"])
) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $indirizzo = $_POST["indirizzo"];
    $citta = $_POST["citta"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkEmail = $dbh->getUserbyEmail($email);
        if (!empty($checkEmail)) {
            $templateParams["erroresign"] = "Errore, email gia' registrata.";
        } else {
            $dbh->addUserr($nome, $email, $hash, $indirizzo, $citta);
            $login_result = $dbh->checkLogin($email, $hash);
            // for warning
            if (!empty($login_result)) {
                registerUser($login_result[0]);
            }
        }
    } else {
        $templateParams["erroresign"] = "Errore, email non valida.";
    }
}

if (isLoggedIn()) {
    header("Location: prodotto.php"); //TODO home
} else {
    $templateParams["nome"] = "template-sign.php";
    $templateParams["tipo"] = "Registrazione";
    $templateParams["fields"] = array("nome", "email", "password", "indirizzo", "citta");
    $templateParams["redirect"] = "Hai gia' un account? Accedi!";
    require("template/base-sign.php");
}
?>