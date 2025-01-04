<?php
require_once("bootstrap.php");

if (empty($_SESSION["previousPage"])) {
    setPreviousPage("search.php");
}

if (!empty($_POST["email"]) && !empty($_POST["password"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = $dbh->getUserbyEmail($email);
    if (!empty($user)) {
        $hash = $user[0]["password"];
        $ban = boolval($user[0]["disabilitato"]);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && password_verify($password, $hash) && !$ban) {
            registerUser($user[0]);
            header("Location: " . getpreviousPage());
        } else {
            $templateParams["erroresign"] = $ban ? "Account bannato." : "Errore, email o password sbagliati.";
        }
    } else {
        $templateParams["erroresign"] = "Errore, email o password sbagliati.";
    }
}
$templateParams["nome"] = "template-sign.php";
$templateParams["action"] = "sign-in.php";

if (isLoggedIn()) {
    $templateParams["titolo"] = "Il tuo Account";
    $templateParams["tipo"] = "Il tuo Account";
    $userData = $dbh->getUserbyUserId(getCurrentUserId())[0];
    $templateParams["fields"] = array("Nome", "Email", "Indirizzo", "Citta'");
    $templateParams["Nome"] = $userData["nomeUtente"];
    $templateParams["Email"] = $userData["email"];
    $templateParams["Indirizzo"] = $userData["indirizzo"];
    $templateParams["Citta'"] = $userData["citta"];
    $templateParams["redirect"] = "Esci dal tuo Account";
    if (isset($_GET["logout"]) && $_GET["logout"] == true) {
        session_unset();
        header("Location: search.php");
    }
} else {
    $templateParams["titolo"] = "Accedi";
    $templateParams["tipo"] = "Accedi";
    $templateParams["fields"] = array("email", "password");
    $templateParams["redirect"] = "Sei nuovo? Registrati!";
    $templateParams["redirect-link"] = "sign-up.php";
}
require("template/base-sign.php");
?>