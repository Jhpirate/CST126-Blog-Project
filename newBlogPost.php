<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CST126 - New Blog Post</title>
    <link rel="stylesheet" href="css/navBar.css">

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="viewBlogPosts.php">View Blogs</a></li>
        <li class="active"><a href="newBlogPost.php">New Blog Post</a></li>
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

</head>
<body>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<p>Please login before posting</p><br>";
    echo "<p><a href='login.php'>Click HERE if you were not automatically redirected</a></p>";
    header('Refresh:2; url=login.php');
    exit;
}
?>

<form action="_addNewBlogPost.php" method="post">
    <table>
        <tr>
            <td><label for="blogName">Post Name</label></td>
            <td><input type="text" name="blogName" id="blogName" placeholder="Blog Title"></td>
        </tr>
        <tr>
            <td><label for="blogAuthor">Author</label></td>
            <td><input type="text" name="blogAuthor" id="blogAuthor" placeholder="Author" value="<?php echo $_SESSION["username"] ?>"></td>
        </tr>
        <tr>
            <td><label for="blogContent">Blog Post</label></td>
            <td><textarea name="blogContent" id="blogContent" placeholder="Enter you blog post here..." rows="10"
                          cols="75"></textarea></td>
        </tr>
        <tr>
            <td><input type="reset"></td>
            <td><input type="submit" name="Post"></td>
        </tr>


    </table>
</form>

<a href="index.php">Home</a>

</body>
</html>