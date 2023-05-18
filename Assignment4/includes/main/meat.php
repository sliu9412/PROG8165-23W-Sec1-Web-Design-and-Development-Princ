<?php
if (!isset($ROOT_PATH)) {
    header("Location:../../index.php");
}

$filter = new Calculator;
$product_list = $filter->GetProductsById([0, 5, 12]);

$page_title = "Meat Products";
$previous_page = false;
$next_page = "vegetable.php";

require("product_template.php");