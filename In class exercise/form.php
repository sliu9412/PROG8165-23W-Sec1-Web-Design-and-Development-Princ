<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        Enter name:
        <input type="text" name="myname">
        <input type="submit" value="submit">
    </form>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myname = $_POST["myname"];
    echo $myname;
}
?>

</html>