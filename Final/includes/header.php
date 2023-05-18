<?php
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
                <h1>IT Demo Day</h1>
                <p>The final exam work of Siyu Liu 8859412</p>
            </div>
            <div class="user-state">
                <?php print_r($greeting) ?>
            </div>
        </div>
    </div>
</header>