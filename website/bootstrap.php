<?php
session_start();
define("UPLOAD_DIR", dirname($_SERVER["SCRIPT_FILENAME"]) . "/img/");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "twdatabase");

