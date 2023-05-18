<?php
session_start();
// if user does not login, redirect to the login page
if (!isset($_SESSION["guest"])) {
    header("Location: ./index.php");
}

$PAGE_PATH = "./includes/main/vegetable.php";
$page_name = "Vegetables";
require("./template.php");
?>