<?php
$PAGE_PATH = "./includes/main/index.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("./src/Validator.php");
    $validator = new Validators();
    $teamName = $validator->EmptyValidator($_POST, "teamName", "Team name");
    $collegeName = $validator->EmptyValidator($_POST, "collegeName", "College name");
    $collegeAddress = $validator->EmptyValidator($_POST, "collegeAddress", "College address");
    $collegeCity = $validator->EmptyValidator($_POST, "collegeCity", "College City");
    $collegeProvince = $validator->EmptyValidator($_POST, "collegeProvince", "College province");
    $firstStudentName = $validator->EmptyValidator($_POST, "firstStudentName", "First Student Name");
    $firstStudentEmail = $validator->RegexValidator($_POST, "firstStudentEmail", "/^\w+@\w+\.\w+$/", "First Student Email");
    $secondStudentName = $validator->EmptyValidator($_POST, "secondStudentName", "Second Student Name");
    $secondStudentEmail = $validator->RegexValidator($_POST, "secondStudentEmail", "/^\w+@\w+\.\w+$/", "Second Student Email");
    if ($teamName && $collegeName && $collegeAddress && $collegeCity && $collegeProvince && $firstStudentName && $firstStudentEmail && $secondStudentName && $secondStudentEmail) {
        require("./includes/db.php");
        $sql = "Insert into $table (teamname, collegename, collegecity, firststudentemail, secondstudentemail) values ('$teamName', '$collegeName', '$collegeCity', '$firstStudentEmail', '$secondStudentEmail')";
        $sqlResult = $conn->query($sql);
        if (!$sqlResult) {
            exit($conn->error);
            // exit('Some error occurred. Please try again...');
        }
        // confirmation

    }
}
$page_name = "Registration Form";
require("./template.php");
?>