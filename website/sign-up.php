<?php
require_once("bootstrap.php");

if (empty($_SESSION["previousPage"])) {
    setPreviousPage("search.php");
}

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
            $dbh->addUser($nome, $email, $hash, $indirizzo, $citta);
            $login_result = $dbh->checkLogin($email, $hash);
            // for warning
            if (!empty($login_result)) {
                registerUser($login_result[0]);
                header("Location: " . getpreviousPage());
            }
        }
    } else {
        $templateParams["erroresign"] = "Errore, email non valida.";
    }
}

$templateParams["titolo"] = "Registrazione";
$templateParams["nome"] = "template-sign.php";
$templateParams["action"] = "sign-up.php";
$templateParams["tipo"] = "Registrazione";
$templateParams["fields"] = array("nome", "email", "password", "indirizzo", "citta");
$templateParams["placeHolder"] = array(
    "Nome",
    "Email: es. Mario.Rossi@example.com",
    "Password",
    "Indirizzo: es. Via Emilia",
    "Citta': es. Cesena"
);
$templateParams["redirect"] = "Hai gia' un account? Accedi!";
$templateParams["redirect-link"] = "sign-in.php";
require("template/base-sign.php");

?>