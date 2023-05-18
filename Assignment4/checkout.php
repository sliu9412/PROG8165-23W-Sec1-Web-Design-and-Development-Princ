<?php
session_start();
if (!isset($_SESSION["guest"])) {
    header("Location: ./index.php");
}
$PAGE_PATH = "./includes/main/checkout.php";
$page_name = "Checkout";
require("./template.php");
?>