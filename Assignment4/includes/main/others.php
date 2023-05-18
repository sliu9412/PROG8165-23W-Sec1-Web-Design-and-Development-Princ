<?php
if (!isset($ROOT_PATH)) {
    header("Location:../../index.php");
}

$filter = new Calculator;
$product_list = $filter->GetProductsById([1, 2, 6, 7, 10, 13]);

$page_title = "Other Food";
$previous_page = "vegetable.php";
$next_page = "checkout.php";

require("product_template.php");