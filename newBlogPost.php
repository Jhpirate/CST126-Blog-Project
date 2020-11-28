<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CST126 - New Blog Post</title>
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
            <td><input type="text" name="blogAuthor" id="blogAuthor" placeholder="Author"></td>
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