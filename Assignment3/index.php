<?php
define("ROOT_PATH", dirname(__FILE__));
require(ROOT_PATH . "/src/Grocery.php");
$grocery = new Grocery();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grocery->StoreNewData($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siyu Liu's Grocery Store</title>
    <meta name="description"
        content="This is an online store of Siyu Liu of Mobile Solution Development, and it's also an individual assignment.">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>

<body>
    <!-- modal -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include(ROOT_PATH . "/include/modal.php");
    }
    ?>
    <!-- header -->
    <?php include(ROOT_PATH . "/include/header.php") ?>
    <!-- nav -->
    <?php include(ROOT_PATH . "/include/nav.php") ?>

    <div class="main-aside container">
        <!-- main -->
        <main>
            <div class="products-display">
                <?php echo $grocery->Generate_Cart() ?>
            </div>
        </main>
        <!-- aside -->
        <aside>
            <div class="shopping-cart">
                <form action="./index.php" method="POST">
                    <?php include(ROOT_PATH . "/include/userform.php") ?>
                    <h2>RECEIPT</h2>
                    <span class="minimum-purchase">
                        <?php echo $grocery->error_messages["is_reach_minimal_pruchasing_price"]; ?>
                    </span>
                    <ul class="checklist item-cart">
                        <?php echo $grocery->Generate_Recept() ?>
                    </ul>
                    <button class="btn" type="submit">SUBMIT ORDER</button>
                </form>
            </div>
        </aside>
    </div>
    <!-- footer -->
    <?php include(ROOT_PATH . "/include/footer.php") ?>
    <script src="./js/script.js"></script>
</body>

</html>