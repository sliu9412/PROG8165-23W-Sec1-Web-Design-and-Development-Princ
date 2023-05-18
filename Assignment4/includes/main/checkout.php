<?php
if (!isset($ROOT_PATH)) {
    header("Location:../../index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target = $_POST["target"];
    header("Location:$target");
}


$calculate = new Calculator;
$html = $calculate->Checkout($_SESSION["products"]);
?>

<h2 class="page-title">Checkout</h2>
<form action="" method="post">
    <input type="hidden" id="target-page" name="target" value="/meat.php">
</form>
<?php print_r($html) ?>
<div class="page-buttons">
    <input type="hidden" id="target-page" name="target" value="/meat.php">
    <div class="pagenitor" target="./others.php">Prev</div>
</div>
<script src="./js/script.js"></script>