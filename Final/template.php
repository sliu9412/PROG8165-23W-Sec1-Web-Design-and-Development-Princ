<?php
$GLOBALS["ROOT_PATH"] = dirname(__FILE__);

// Only for development
// if (isset($_SESSION["admin"])) {
//     print_r($_SESSION["admin"]);
// } else {
//     print_r("No guest");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KW Grocery -
        <?php print_r($page_name) ?>
    </title>
    <meta name="description" content="The assignment 4 of Group 10 (Siyu Liu & Meng Wang)">
    <!-- <link rel="stylesheet/less" href="./css/style.less"> -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php require($ROOT_PATH . "/includes/header.php") ?>
    <?php require($ROOT_PATH . "/includes/nav.php") ?>
    <main class="container">
        <?php require($PAGE_PATH) ?>
    </main>
    <?php require($ROOT_PATH . "/includes/footer.php") ?>
    <!-- <script src="./css/less.min.js"></script> -->
</body>

</html>