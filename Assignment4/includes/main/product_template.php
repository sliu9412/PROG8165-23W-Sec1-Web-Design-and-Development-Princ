<?php
if (!isset($ROOT_PATH)) {
    header("Location:../../index.php");
}

// when posting the form, add products' id and count into session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require($ROOT_PATH . "/src/Products.php");
    $post_ids = array_keys($_POST);
    $exist_ids = [];
    foreach ($ProductData as $product) {
        array_push($exist_ids, strval($product["id"]));
    }
    // check whether the post ids exists in the key value pairs
    $checked_ids = array_intersect($post_ids, $exist_ids);
    foreach ($checked_ids as $id) {
        if ($_POST[$id] < 0) {
            $_POST[$id] = 0;
        }
        $_SESSION["products"][$id] = $_POST[$id];
    }
    $target = $_POST["target"];
    header("Location: $target");
}

$product_list_html = "";
foreach ($product_list as $item) {
    $id = $item["id"];
    $name = $item["name"];
    $price = $item["price"];
    $count = isset($_SESSION["products"][strval($id)]) ? $_SESSION["products"][strval($id)] : $item["count"];
    $img = $item["img"];
    $product_item_html = <<<ECHO
        <div class="product-item">
            <img src="$img" alt="$name">
            <h3>$name</h3>
            <p>$$price &nbsp;</p>
            <div class="count-component">
                <button class="decrease-count">-</button>
                <span>$count</span>
                <button class="increase-count">+</button>
            </div>
            <input type="hidden" value="$count" name="$id">
        </div>
    ECHO;
    $product_list_html = $product_list_html . $product_item_html;
}
?>

<h2 class="page-title">
    <?php print_r($page_title) ?>
</h2>
<form action="" method="post">
    <div id="product-list">
        <?php print_r($product_list_html) ?>
    </div>
    <div class="page-buttons">
        <input type="hidden" id="target-page" name="target" value="/meat.php">
        <?php
        if ($previous_page) {
            print_r("<div class=\"pagenitor\" target=\"./$previous_page\">Prev</div>");
        }
        if ($next_page) {
            print_r("<div class=\"pagenitor\" target=\"./$next_page\">Next</div>");
        }
        ?>
    </div>
</form>

<script src="./js/script.js"></script>