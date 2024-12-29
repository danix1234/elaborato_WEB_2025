<?php
require_once("bootstrap.php");
$previousURL = isset($_SERVER['HTTP_REFERER']) ? basename($_SERVER['HTTP_REFERER']) : 'search.php';
if ($previousURL != "sign-in.php" && $previousURL != "sign-up.php") {
    setPreviousPage($previousURL);
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
$templateParams["action"] = "sign-in.php";
$templateParams["tipo"] = "Registrazione";
$templateParams["fields"] = array("nome", "email", "password", "indirizzo", "citta");
$templateParams["redirect"] = "Hai gia' un account? Accedi!";
$templateParams["redirect-link"] = "sign-in.php";
require("template/base-sign.php");

?>