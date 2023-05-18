<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<?php
if (isset($_POST["total_score"])) {
    $total_score = $_POST["total_score"];
} else {
    $total_score = 0;
}
$guess_result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["number"] == $_POST["lucky_num"]) {
        $guess_result = "win!";
        $total_score++;
    } else {
        $guess_result = "Sorry, guess again";
    }

}
?>

<?php
$number_count = 3;
$number_arr = [];
$html = "<h1>Guess a number below</h1><p class=\"guess_result\">$guess_result</p><ul>";
for ($i = 0; $i < $number_count; $i++) {
    $random_num = random_int(0, 100);
    $html = $html . "<li>" . $random_num . "</li>";
    array_push($number_arr, $random_num);
}
$html = $html . "</ui>";
$lucky_num = $number_arr[random_int(0, count($number_arr) - 1)];
?>

<!-- 5. Create a guessing game, where the computer chooses a random number from a list of numbers. Then the user is asked to guess that number. If the user guesses correctly, they win otherwise they lose. Keep a running total of the wins and display total score after each turn. Make sure the user enters a number only when guessing. -->

<body>
    <div class="container">
        <div>
            <?php
            echo "$html<br>";
            ?>
        </div>
        <div>
            <p>Your Total Score:
                <?php echo $total_score ?>
            </p>
            <form method="post" autocomplete="off">
                <input type="text" name="number">
                <input type="hidden" name="total_score" value="<?php echo $total_score ?>">
                <input type="hidden" name="lucky_num" value="<?php echo $lucky_num ?>">
                <input type="submit" value="SUBMIT">
            </form>
        </div>
    </div>
</body>

</html>