<?php
if (!isset($ROOT_PATH)) {
    header("Location:../../index.php");
}

$filter = new Calculator;
$product_list = $filter->GetProductsById([3, 4, 8, 9, 11, 14]);

$page_title = "Vegetables";
$previous_page = "meat.php";
$next_page = "others.php";

require("product_template.php");