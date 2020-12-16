<!--
 * PHP page that is visited to view/manage all users
-->
<html lang="en">
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="css/managementTableStyle.css">
    <link rel="stylesheet" href="css/navBar.css">

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="viewBlogPosts.php">View Blogs</a></li>
        <li><a href="newBlogPost.php">New Blog Post</a></li>
        <li><a href="searchBlog.php">Search Blogs</a></li>
        <?php
        session_start();

        if (!isset($_SESSION['username'])) {
            echo "<li style='float: right'><a href='register.html'>Register</a></li>";
            echo "<li style='float: right'><a href='login.php'>Login</a></li>";

        } else {
            if($_SESSION['accessLevel'] == "admin"){
                echo "<li><a href='blogManagement.php'>Blog Management</a></li>";
                echo "<li class='active'><a href='userManagement.php'>User Management</a></li>";
                echo "<li style='float: right'><a href='userLogout.php'>Logout</a></li>";
                echo "<li style='float: right'><a href='#'>User: " . $_SESSION['username'] . " | " . $_SESSION['userID'] . "</a></li>";

            } else {
                echo "<li style='float: right'><a href='userLogout.php'>Logout</a></li>";
                echo "<li style='float: right'><a href='#'>User: " . $_SESSION['username'] . " | " . $_SESSION['userID'] . "</a></li>";
            }
        }
        ?>

    </ul>
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

<a href="index.php">Return Home</a>

</body>
</html>
