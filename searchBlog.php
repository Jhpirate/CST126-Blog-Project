<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/navBar.css">
    <title>Blog - Search</title>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="viewBlogPosts.php">View Blogs</a></li>
        <li><a href="newBlogPost.php">New Blog Post</a></li>
        <li class="active"><a href="searchBlog.php">Search Blogs</a></li>
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

</head>
<body>

<form action="_searchBlogs.php" method="get">
    <label for="searchValue">What do you want to find?</label>
    <br>
    <input type="search" name="searchValue" id="searchValue" required>
    <input type="submit" value="Search">
</form>

<a href="index.php">Return Home</a>

</body>
</html>