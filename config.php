<?php

require_once '../autoload.php';

$servername = "localhost";
$db = "ecom4gaming";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$GLOBALS['conn'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../autoload.php';
