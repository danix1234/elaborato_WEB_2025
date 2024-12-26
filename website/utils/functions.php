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
function uploadImage($uploadDir, $image)
{
    if ($image["error"]) {
        return array(false, 'error uploading image!');
    }

    if (getimagesize($image["tmp_name"]) === false) {
        return array(false, 'not actually an image!');
    }

    if (!in_array($image["type"], array("image/png", "image/jpg"))) {
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
