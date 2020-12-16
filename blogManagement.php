<html lang="en">
<head>
    <title>Blog Manager</title>
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
                echo "<li class='active'><a href='blogManagement.php'>Blog Management</a></li>";
                echo "<li><a href='userManagement.php'>User Management</a></li>";
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

<form method="post">
    <table>
        <tr>
            <th>Blog ID</th>
            <th>Blog Title</th>
            <th>Blog Author</th>
            <th>Blog Content</th>
            <th>Blog Tags</th>
            <th>Actions</th>
        </tr>
        <?php

        require_once "_getAllBlogPostsFromDB.php";

        $blogContentArray = getAllBlogPosts();

        for ($i = 0; $i < count($blogContentArray); $i++) {
            echo "<tr>";
//        echo "<td>" . $blogContent[$x][0] . "</td>" . "<td><textarea>" . $blogContent[$x][1] . "</textarea></td>" . "</td>" . "<td><textarea>" . $blogContent[$x][2] . "</textarea></td>" . "<td><textarea rows='10' cols='50'>" . $blogContent[$x][3] . "</textarea></td>" . "<td><textarea>" . $blogContent[$x][4] . "</textarea></td>" . "<td><button >Delete</button><button>Save</button></td>";
            echo
                "<td>" . $blogContentArray[$i][0] . "</td>" .
                "<td><textarea rows='10' readonly disabled>" . $blogContentArray[$i][1] . "</textarea></td>" .
                "<td><textarea rows='10' readonly disabled>" . $blogContentArray[$i][2] . "</textarea></td>" .
                "<td><textarea rows='10' cols='50' readonly disabled>" . $blogContentArray[$i][3] . "</textarea></td>" .
                "<td><textarea rows='10' readonly disabled>" . $blogContentArray[$i][4] . "</textarea></td>" .
                "<td><button type='submit'formaction='_deleteBlogPost.php?id=" . $blogContentArray[$i][0] . "'>Delete Entry</button><br/><button type='submit' formaction='_editBlogPost.php?id=" . $blogContentArray[$i][0] . "'>Update</button></td>";

            echo "</tr>";
        }
        ?>
    </table>
</form>

<a href="index.php">Return Home</a>

</body>
</html>
