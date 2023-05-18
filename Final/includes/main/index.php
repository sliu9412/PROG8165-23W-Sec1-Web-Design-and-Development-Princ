<div id="index-page-layout">
    <div>
        <img src="./images/index-bg.jpg" alt="index-background">
    </div>
    <div>
        <form id="index-form" class="registration-form" action="" method="post">
            <div class="form-group">
                <label for="teamName">
                    Team Name
                </label>
                <?php
                if (isset($validator->error_messages["teamName"])) {
                    $error_teamName = $validator->error_messages["teamName"];
                    print_r("<p class=\"error_message\">$error_teamName</p>");
                }
                ?>
                <input type="text" id="teamName" name="teamName" placeholder="Please Enter Your Teamname"
                    value="<?php isset($_POST["teamName"]) ? print_r($_POST["teamName"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="collegeName">
                    College Name
                </label>
                <?php
                if (isset($validator->error_messages["collegeName"])) {
                    $error_collegeName = $validator->error_messages["collegeName"];
                    print_r("<p class=\"error_message\">$error_collegeName</p>");
                }
                ?>
                <input type="text" id="collegeName" name="collegeName" placeholder="Please Enter Your College Name"
                    value="<?php isset($_POST["collegeName"]) ? print_r($_POST["collegeName"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="collegeAddress">
                    College Address
                </label>
                <?php
                if (isset($validator->error_messages["collegeAddress"])) {
                    $error_collegeAddress = $validator->error_messages["collegeAddress"];
                    print_r("<p class=\"error_message\">$error_collegeAddress</p>");
                }
                ?>
                <input type="text" id="collegeAddress" name="collegeAddress"
                    placeholder="Please Enter Your College Address"
                    value="<?php isset($_POST["collegeAddress"]) ? print_r($_POST["collegeAddress"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="collegeCity">
                    College City
                </label>
                <?php
                if (isset($validator->error_messages["collegeCity"])) {
                    $error_collegeCity = $validator->error_messages["collegeCity"];
                    print_r("<p class=\"error_message\">$error_collegeCity</p>");
                }
                ?>
                <input type="text" id="collegeCity" name="collegeCity" placeholder="Please Enter Your College City"
                    value="<?php isset($_POST["collegeCity"]) ? print_r($_POST["collegeCity"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="collegeProvince">
                    College Province
                </label>
                <?php
                if (isset($validator->error_messages["collegeProvince"])) {
                    $error_collegeProvince = $validator->error_messages["collegeProvince"];
                    print_r("<p class=\"error_message\">$error_collegeProvince</p>");
                }
                ?>
                <input type="text" id="collegeProvince" name="collegeProvince"
                    placeholder="Please Enter Your College Province"
                    value="<?php isset($_POST["collegeProvince"]) ? print_r($_POST["collegeProvince"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="firstStudentName">
                    First Student Name
                </label>
                <?php
                if (isset($validator->error_messages["firstStudentName"])) {
                    $error_firstStudentName = $validator->error_messages["firstStudentName"];
                    print_r("<p class=\"error_message\">$error_firstStudentName</p>");
                }
                ?>
                <input type="text" id="firstStudentName" name="firstStudentName"
                    placeholder="Please Enter First Student Name"
                    value="<?php isset($_POST["firstStudentName"]) ? print_r($_POST["firstStudentName"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="firstStudentEmail">
                    First Student Email
                </label>
                <?php
                if (isset($validator->error_messages["firstStudentEmail"])) {
                    $error_firstStudentEmail = $validator->error_messages["firstStudentEmail"];
                    print_r("<p class=\"error_message\">$error_firstStudentEmail</p>");
                }
                ?>
                <input type="text" id="firstStudentEmail" name="firstStudentEmail"
                    placeholder="Please Enter First Student Email"
                    value="<?php isset($_POST["firstStudentEmail"]) ? print_r($_POST["firstStudentEmail"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="secondStudentName">
                    Second Student Name
                </label>
                <?php
                if (isset($validator->error_messages["secondStudentName"])) {
                    $error_secondStudentName = $validator->error_messages["secondStudentName"];
                    print_r("<p class=\"error_message\">$error_secondStudentName</p>");
                }
                ?>
                <input type="text" id="secondStudentName" name="secondStudentName"
                    placeholder="Please Enter Second Student Name"
                    value="<?php isset($_POST["secondStudentName"]) ? print_r($_POST["secondStudentName"]) : print_r("") ?>">
            </div>
            <div class="form-group">
                <label for="secondStudentEmail">
                    First Student Email
                </label>
                <?php
                if (isset($validator->error_messages["secondStudentEmail"])) {
                    $error_secondStudentEmail = $validator->error_messages["secondStudentEmail"];
                    print_r("<p class=\"error_message\">$error_secondStudentEmail</p>");
                }
                ?>
                <input type="text" id="secondStudentEmail" name="secondStudentEmail"
                    placeholder="Please Enter Second Student Email"
                    value="<?php isset($_POST["secondStudentEmail"]) ? print_r($_POST["secondStudentEmail"]) : print_r("") ?>">
            </div>
            <button type="submit">Sumit</button>
        </form>
    </div>
</div>