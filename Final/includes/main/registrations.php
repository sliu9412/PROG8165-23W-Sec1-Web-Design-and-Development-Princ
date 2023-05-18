<?php
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
?>
<table>
    <thead>
        <tr>
            <th>Team name</th>
            <th>College Name</th>
            <th>College City</th>
            <th>First Student Email</th>
            <th>Second Student Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            $teamname = $row["teamname"];
            $collegename = $row["collegename"];
            $collegecity = $row["collegecity"];
            $firststudentemail = $row["firststudentemail"];
            $secondstudentemail = $row["secondstudentemail"];
            $html = <<<ECHO
                <tr>
                    <td>$teamname</td>
                    <td>$collegename</td>
                    <td>$collegecity</td>
                    <td>$firststudentemail</td>
                    <td>$secondstudentemail</td>
                </tr>
            ECHO;
            print_r($html);
        }
        ?>

    </tbody>
</table>