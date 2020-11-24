<link rel="stylesheet" href="css/navBar.css">
<ul>
    <li class="active"><a href="index.php">Home</a></li>
    <li><a href="viewBlogPosts.php">View Blogs</a></li>
    <li><a href="newBlogPost.php">New Blog Post</a></li>
    <?php
    session_start();

    echo $_SESSION['username'];
    if (!isset($_SESSION['username'])) {
        echo "<li style='float: right'><a href='register.html'>Register</a></li>";
        echo "<li style='float: right'><a href='login.php'>Login</a></li>";

    } else {
        echo "<li style='float: right'><a href='userLogout.php'>Logout</a></li>";
        echo "<li style='float: right'><a href='#'>User: " . $_SESSION['username'] . " | " . $_SESSION['userID'] . "</a></li>";
    }
    ?>

</ul>