<?php
function getIdFromName($name)
{
    return preg_replace("/[^a-z]/", '', strtolower($name));
}
function registerUser($userData)
{
    $_SESSION["name"] = $userData["nomeUtente"];
    $_SESSION["email"] = $userData["email"];
    $_SESSION["userId"] = intval($userData["codUtente"]);
    $_SESSION["admin"] = boolval($userData["privilegi"]);
}
function isLoggedIn()
{
    return isset($_SESSION["userId"]);
}
function isAdmin()
{
    return isLoggedIn() && $_SESSION["admin"];
}
function getCurrentUserId()
{
    if (!isLoggedIn()) {
        die('CANNOT GET CURRENT USER: NOT LOGGED IN!');
    }
    return $_SESSION["userId"];
}
