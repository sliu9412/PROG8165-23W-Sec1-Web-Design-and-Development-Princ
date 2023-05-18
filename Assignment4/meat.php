<?php
session_start();
// if user does not login, redirect to the login page
if (!isset($_SESSION["guest"])) {
    header("Location: ./index.php");
}

$PAGE_PATH = "./includes/main/meat.php";
$page_name = "Meat Product";
require("./template.php");
?>