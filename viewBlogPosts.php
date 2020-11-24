<html lang="en">
<head>
    <title>Viewing Blogs...</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navBar.css">
    <link rel="stylesheet" href="css/viewBlogsPageStyle.css"
</head>
<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li class="active"><a href="viewBlogPosts.php">View Blogs</a></li>
    <li><a href="newBlogPost.php">New Blog Post</a></li>
    <li style="float: right"><a href="register.html">Register</a></li>
    <li style="float: right"><a href="login.html">Login</a></li>
</ul>

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