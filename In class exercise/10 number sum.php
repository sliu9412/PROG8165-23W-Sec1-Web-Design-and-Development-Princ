<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 4. Print the sum of first 10 numbers in the following format: 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9 + 10 = 55. -->
    <?php
    $sum = 0;
    $output_str = "";
    for ($i = 0; $i <= 10; $i++) {
        $sum += $i;
        $output_str = $output_str . " + " . $i;
    }
    $output_str = substr($output_str, 2);
    $output_str = $output_str . " = $sum";
    echo $output_str;
    ?>
</body>

</html>