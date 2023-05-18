<?php
if (!isset($ROOT_PATH)) {
    header("Location: ../index.php");
}
?>

<nav>
    <div class="container">
        <ul id="nav">
            <?php
            if (isset($_SESSION["guest"])) {
                if ($PAGE_PATH == "./includes/main/meat.php") {
                    print_r("<li class=\"active pagenitor\" target=\"./meat.php\">Meat Products</li>");
                } else {
                    print_r("<li class=\"pagenitor\" target=\"./meat.php\">Meat Products</li>");
                }
                if ($PAGE_PATH == "./includes/main/vegetable.php") {
                    print_r("<li class=\"active pagenitor\" target=\"./vegetable.php\">Vegetables</li>");
                } else {
                    print_r("<li class=\"pagenitor\" target=\"./vegetable.php\">Vegetables</li>");
                }
                if ($PAGE_PATH == "./includes/main/others.php") {
                    print_r("<li class=\"active pagenitor\" target=\"./others.php\">Other Food</li>");
                } else {
                    print_r("<li class=\"pagenitor\" target=\"./others.php\">Other Food</li>");
                }
                if ($PAGE_PATH == "./includes/main/checkout.php") {
                    print_r("<li class=\"active pagenitor\" target=\"./checkout.php\">Checkout</li>");
                } else {
                    print_r("<li class=\"pagenitor\" target=\"./checkout.php\">Checkout</li>");
                }
            } else {
                print_r("<li class=\"active\">Login</li>");
            }
            ?>
        </ul>
    </div>
</nav>