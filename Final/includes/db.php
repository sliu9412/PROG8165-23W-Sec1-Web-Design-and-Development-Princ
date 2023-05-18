<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "siyu_liu";
$table = "userinfo";

$conn = new mysqli($host, $username, $password, $db);
if ($conn->connect_error) {
    die("Error connecting to db");
}
?>