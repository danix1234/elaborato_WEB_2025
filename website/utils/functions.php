<?php
function checkFile($pagename)
{
    $href = file_exists("$pagename") ? $pagename : "#";
    echo $href;
}
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
    return !empty($_SESSION["userId"]);
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
function getCurrentUserName()
{
    if (!isLoggedIn()) {
        die("CANNOT GET CURRENT USER: NOT LOGGED IN!");
    }
    return $_SESSION["name"];
}

function setPreviousPage($page){
    $_SESSION["previousPage"] = $page;
}

function getpreviousPage(){
    if (empty($_SESSION["previousPage"])) {
        die("CANNOT GET PREVIOUS PAGE: NOT SET!");
    }
    return $_SESSION["previousPage"];
}
function uploadImage($uploadDir, $image)
{
    if ($image["error"]) {
        return array(false, 'error uploading image!');
    }

    if (getimagesize($image["tmp_name"]) === false) {
        return array(false, 'not actually an image!');
    }

    if (!in_array($image["type"], array("image/png", "image/jpg", "image/jpeg"))) {
        return array(false, 'image type not supported!');
    }

    do {
        $imageName = uniqid("uploaded") . '.' . pathinfo($image["name"], PATHINFO_EXTENSION);
    } while (file_exists($uploadDir . $imageName));

    if (!move_uploaded_file($image["tmp_name"], $uploadDir . $imageName)) {
        return array(false, 'error in moving uploaded image!');
    } else {
        return array(true, $imageName);
    }
}
