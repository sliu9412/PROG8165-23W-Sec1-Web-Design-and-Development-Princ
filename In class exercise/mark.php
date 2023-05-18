<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 3. Ask the user for their name, email and average marks. Display their details along with the grade A+ (100-90), A (80 - 89), B+ (75 - 79), B (70 - 74), C+ (65 - 69), C (60 - 64), D (55 - 59), F (54 or less). -->
    <form method="post">
        Enter your name:
        <input type="text" name="name"><br>
        Enter your email:
        <input type="text" name="email"><br>
        Enter your mark:
        <input type="text" name="mark"><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mark = $_POST["mark"];
    $mark = intval($mark);
    $output_str = "Name: $name<br> Email: $email<br>";
    switch ($mark) {
        case $mark >= 90 and $mark <= 100:
            $output_str = $output_str . "Grade: A+";
            break;
        case $mark >= 80 and $mark < 90:
            $output_str = $output_str . "Grade: A";
            break;
        case $mark >= 75 and $mark < 80:
            $output_str = $output_str . "Grade: B+";
            break;
        case $mark >= 70 and $mark < 75:
            $output_str = $output_str . "Grade: B";
            break;
        case $mark >= 65 and $mark < 70:
            $output_str = $output_str . "Grade: C+";
            break;
        case $mark >= 60 and $mark < 65:
            $output_str = $output_str . "Grade: C";
            break;
        case $mark >= 55 and $mark < 60:
            $output_str = $output_str . "Grade: D";
            break;
        case $mark < 55:
            $output_str = $output_str . "Grade: F";
            break;
        default:
            break;
    }
    echo $output_str;
}
?>