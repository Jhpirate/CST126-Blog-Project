<?php

require_once "DB_Connection.php";

$userID = $_GET["id"];

$sql = "SELECT * FROM users WHERE ID='$userID'";

$result = mysqli_query(db_connect(), $sql);

$row = mysqli_fetch_array($result);
mysqli_close(db_connect());

?>

<html lang="en">
<head>
    <title>User Management - Edit User</title>
    <link rel="stylesheet" href="css/tableStyle.css">
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email Address</th>
        <th>Password</th>
        <th>Date of Birth</th>
        <th>User Role</th>
    </tr>
    <tr>
        <?php
        echo "<form method='post'>";
        echo "<td><textarea name='newUserID' id='newUserID'>" . $row[0] ."</textarea></td>";
        echo "<td><textarea name='newFirstName' id='newFirstName'>" . $row[1] ."</textarea></td>";
        echo "<td><textarea name='newLastName' id='newLastName'>" . $row[2] ."</textarea></td>";
        echo "<td><textarea name='newUsername' id='newUsername'>" . $row[3] ."</textarea></td>";
        echo "<td><textarea name='newEmailAddress' id='newEmailAddress'>" . $row[4] ."</textarea></td>";
        echo "<td><textarea name='newPassword' id='newPassword'>" . $row[5] ."</textarea></td>";
        echo "<td><textarea name='newUserDOB' id='newUserDOB'>" . $row[6] ."</textarea></td>";
//        echo "<td><textarea name='newUserRole' id='newUserRole'>" . $row[7] ."</textarea></td>"; //old 11-13-2020 Outputs role in text area

        // If user is an admin, make sure to reselect admin or they will lose permission on clicking update
        echo "<td>";
        echo "<select name='newUserRole' id='newUserRole'>";
        echo "<option value='user '>user</option>";
        echo "<option value='admin'>admin</option>";
        echo "</select>";
        echo "</td>";

        ?>
    </tr>
    <tr>
        <?php

        require_once "DB_Connection.php";
        echo "<td colspan='8'>";
        echo "<input type='submit' value='Update' formaction=''>";
        echo "<input type='submit' formaction='userManagement.php' value='Cancel Edit'>";
        echo "</td>";
        echo "</form>";

        ?>
    </tr>
</table>

</body>
</html>

<?php

$newUserID = $_POST["newUserID"];
$newFirstName = $_POST["newFirstName"];
$newLastname = $_POST["newLastName"];
$newUsername = $_POST["newUsername"];
$newEmailAddress = $_POST["newEmailAddress"];
$newPassword = $_POST["newPassword"];
$newUserDOB = $_POST["newUserDOB"];
$newUserRole = $_POST["newUserRole"];

$update_SQL = "UPDATE users SET ID='$newUserID', FIRST_NAME='$newFirstName', LAST_NAME='$newLastname', USERNAME='$newUsername', EMAIL_ADDRESS='$newEmailAddress', PASSWORD='$newPassword', DATE_OF_BIRTH='$newUserDOB', USER_ROLE='$newUserRole' WHERE ID='$userID' ";

mysqli_query(db_connect(), $update_SQL);
mysqli_close(db_connect());

//Confirm successful update and redirect user back to the user list
if(isset($newUserID, $newFirstName, $newFirstName, $newLastname, $newUsername, $newEmailAddress, $newPassword, $newUserDOB, $newUserRole)){
    header("refresh:1;url=userManagement.php");
    echo "<p>User Successfully Updated...</p>";
}
