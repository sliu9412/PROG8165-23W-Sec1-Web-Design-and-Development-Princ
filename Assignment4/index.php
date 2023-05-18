<?php
// logged user can not access login page again
session_start();
if (isset($_SESSION["guest"])) {
    header("Location: ./meat.php");
}

$PAGE_PATH = "./includes/main/index.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["guest"] = $_POST["username"];
    $_SESSION["products"] = [];
    header("Location:./meat.php");
}
$page_name = "Login";
require("./template.php");
?>