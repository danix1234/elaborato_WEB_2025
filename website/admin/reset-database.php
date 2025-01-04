<?php

$conn = new mysqli("localhost", "root", "");
$conn->query("DROP DATABASE IF EXISTS twdatabase");
$conn->query("CREATE DATABASE IF NOT EXISTS twdatabase");
$conn->multi_query(file_get_contents("../../db/TWcreateDatabase.sql"));
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());
$conn->multi_query(file_get_contents("../../db/popolazioneTWDatabase.sql"));
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());
$conn->close();

echo 'database successfully resetted!';
