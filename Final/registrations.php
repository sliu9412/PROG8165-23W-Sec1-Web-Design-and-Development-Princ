<?php
// logged user can not access login page again
session_start();
if (!isset($_SESSION["admin"])) {
    header('Location: ./login.php');
}

require("./includes/db.php");
$PAGE_PATH = "./includes/main/registrations.php";
$page_name = "Registrations";
require("./template.php");
?>