<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        Enter a number:
        <input type="text" name="number">
        <input type="submit" value="submit">
    </form>

    <?php
    $days = [
        1 => "Monday",
        2 => "Tuesday",
        3 => "Wednesday",
        4 => "Thursday",
        5 => "Friday",
        6 => "Saturday",
        7 => "Sunday"
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];
        $number = intval($number);
        if ($number != 0 and array_key_exists($number, $days)) {
            echo $days[$number];
        }
    }
    ?>
</body>

</html>