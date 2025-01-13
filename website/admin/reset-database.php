<?php

function run_sql_file($conn, $file)
{
    $conn->multi_query(file_get_contents($file));
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

if (!empty($_GET)) {
    if (isset($_GET["change"])) {
        if (in_array($_GET["change"], ["empty", "test", "final"])) {
            $conn = new mysqli("localhost", "root", "", "", 3306);
            $conn->query("DROP DATABASE IF EXISTS twdatabase");
            $conn->query("CREATE DATABASE IF NOT EXISTS twdatabase");

            run_sql_file($conn, "../db/TWcreateDatabase.sql");
            if ($_GET["change"] == "test") {
                run_sql_file($conn, "../db/popolazioneTWDatabase_php.sql");
            } elseif ($_GET["change"] == "final") {
                run_sql_file($conn, "../db/popolazioneTWDatabaseVersioneFinale.sql");
            }
            $conn->close();

            // delete uploaded images
            $directory = '../img';
            $files = scandir($directory);
            foreach ($files as $file) {
                if (strpos($file, 'uploaded') === 0) {
                    if (!unlink($directory . "/" . $file)) {
                    }
                }
            }
        }
    }
    header("Location: reset-database.php");
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        * {
            font-size: 50px;
        }
    </style>
</head>

<body>
    <button type="button" onclick='document.getElementsByTagName("body")[0].innerHTML=""; window.location.href="reset-database.php?change=empty" '>Empty database</button>
    <button type="button" onclick='document.getElementsByTagName("body")[0].innerHTML=""; window.location.href="reset-database.php?change=test"'>Test database</button>
    <button type="button" onclick='document.getElementsByTagName("body")[0].innerHTML=""; window.location.href="reset-database.php?change=final"'>Production database</button>
</body>

</html>
