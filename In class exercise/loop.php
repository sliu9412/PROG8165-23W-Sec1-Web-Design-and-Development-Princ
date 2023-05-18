<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $sum = 0;
    $output_str = "";
    for ($i = 1; $i <= 10; $i++) {
        $sum += $i;
        $output_str = $output_str . " + " . $i;
    }
    echo $sum;
    echo "<br/>";
    echo "Print the sum of first 10 number in the following format: " . substr($output_str, 2);
    ?>

</body>

</html>