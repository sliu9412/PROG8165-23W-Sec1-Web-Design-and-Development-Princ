<?php
if (!isset($ROOT_PATH)) {
    header("Location:../../index.php");
}
?>

<div id="index-page-layout">
    <div>
        <img src="./images/index-bg.jpg" alt="index-background">
    </div>
    <div>
        <form id="index-form" action="./index.php" method="post">
            <div class="form-group">
                <label for="username">
                    Please enter your name
                </label>
                <input type="text" id="username" name="username" placeholder="Please Enter Your Name" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</div>