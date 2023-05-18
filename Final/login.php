<?php
// logged user can not access login page again
session_start();
$PAGE_PATH = "./includes/main/login.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["admin"] = $_POST["username"];
    header("Location:./registrations.php");
}
$page_name = "Login";
require("./template.php");
?>