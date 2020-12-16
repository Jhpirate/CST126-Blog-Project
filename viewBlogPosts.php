<html lang="en">
<head>
    <title>Viewing Blogs...</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navBar.css">
    <link rel="stylesheet" href="css/viewBlogsPageStyle.css"
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="viewBlogPosts.php">View Blogs</a></li>
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
</nav>

<!-- Display all the blog posts on the home page -->
<?php

session_start();

if (!isset($_SESSION['username'])) {
    echo "<b>ERROR: YOUR ARE NOT AUTHORIZED</b><br>";
    echo "<b>Please login first</b>";
    header('Refresh: 3; url=login.php');
} else {
    include_once "CodeReferences/homePageBlogDisplay.php";
}
?>

</body>
</html>