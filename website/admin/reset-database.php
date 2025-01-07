<?php

// reset database
$conn = new mysqli("localhost", "root", "", "", 3306);
$conn->query("DROP DATABASE IF EXISTS twdatabase");
$conn->query("CREATE DATABASE IF NOT EXISTS twdatabase");
$conn->multi_query(file_get_contents("./TWcreateDatabase.sql"));
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());
$conn->multi_query(file_get_contents("./popolazioneTWDatabase.sql"));
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());
$conn->close();

echo 'database successfully resetted!';

// delete uploaded images
$directory = '../img';
$files = scandir($directory);
foreach ($files as $file) {
    if (strpos($file, 'uploaded') === 0) {
        if (!unlink($directory . "/" . $file)) {
        }
    }
}
