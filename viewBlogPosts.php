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
    <li><a href="newBlogPost.html">New Blog Post</a></li>
    <li style="float: right"><a href="register.html">Register</a></li>
    <li style="float: right"><a href="login.html">Login</a></li>
</ul>

<!-- Display all the blog posts on the home page -->
<?php
include_once "CodeReferences/homePageBlogDisplay.php";
?>

</body>
</html>