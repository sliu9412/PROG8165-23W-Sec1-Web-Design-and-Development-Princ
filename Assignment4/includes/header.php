<?php
if (!isset($ROOT_PATH)) {
    header("Location: ../index.php");
}

$greeting = "";
if (isset($_SESSION["guest"])) {
    $username = $_SESSION["guest"];
    $greeting = <<<ECHO
        <p>Welcome, $username</p>
        <p><a href="./logout.php">Sign Out</a></p>    
    ECHO;
}
?>

<header>
    <div class="container">
        <div class="header-title">
            <div>
                <h1>KW Grocery</h1>
                <p>The assignment 4 of Group 10 (Siyu Liu & Meng Wang)</p>
            </div>
            <div class="user-state">
                <?php print_r($greeting) ?>
            </div>
        </div>
    </div>
</header>