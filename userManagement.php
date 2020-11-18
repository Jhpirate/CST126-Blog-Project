<!--
 * PHP page that is visited to actually view all users
-->
<html lang="en">
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="css/tableStyle.css">
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>User Role</th>
        <th>Actions</th>
    </tr>

    <?php
    //    Lines below provided DEBUGGING info
    //    error_reporting(E_ALL);
    //    ini_set('display_errors', 1);
    require_once "_getAllUsersFromDB.php";

    $usersArray = getAllUsers();

    for ($i = 0; $i < count($usersArray); $i++) {
        $userID = $usersArray[$i][0];
        echo "<tr>";

        echo "<td>" . $usersArray[$i][0] . "</td>";
        echo "<td>" . $usersArray[$i][1] . "</td>";
        echo "<td>" . $usersArray[$i][2] . "</td>";
        echo "<td>" . $usersArray[$i][3] . "</td>";
        echo "<td>" . $usersArray[$i][4] . "</td>";

        echo "<td>";
        echo "<form method='get' >";
        echo "<input type='hidden' name='id' value='$userID'>";
        echo "<input type='submit' value='Edit User' formaction='_editUser.php'>";
        echo "<input type='submit' value='Delete User' formaction='_deleteUser.php'>";
        echo "</form>";
        echo "</td>";

        echo "</tr>";
    }
    ?>

</table>
</body>
</html>
