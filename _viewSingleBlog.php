<?php
require_once "DB_Connection.php";

$BlogToView = $_GET["blogID"];

$DB_Connection = db_connect();
$SQL_Statement = "SELECT * FROM blog WHERE BLOG_ID='$BlogToView'";
$result = mysqli_query(db_connect(), $SQL_Statement);

$row = mysqli_fetch_array($result);
mysqli_close(db_connect());

?>

<!doctype html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="css/commentsSection.css">
    <link rel="stylesheet" href="css/navBar.css">

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

</head>
<body>
<table class="content">
    <tr>
        <th>Blog Title</th>
        <td><?php echo $row['BLOG_TITLE'] //Title ?></td>
    </tr>
    <tr>
        <th>Blog Author</th>
        <td><?php echo $row['BLOG_AUTHOR'] //Author?></td>
    </tr>
    <tr>
        <th>Blog Publish Date</th>
        <td><?php echo $row['BLOG_CREATION_DATE'] ?></td>
    </tr>
    <tr>
        <th>Last Updated</th>
        <td>
            <?php
            if(!is_null($row['BLOG_CREATION_DATE']))
                echo $row['BLOG_CREATION_DATE'];
            ?>
        </td>
    </tr>
    <tr>
        <th>Blog Content</th>
        <td><?php echo $row['BLOG_CONTENT'] ?></td>
    </tr>
</table>

<!-- Comments Section -->
<hr>
<h2>Comments Section</h2>
<form action="_addNewComment.php" method="post">
    <table>
        <tr>
            <td><input type="hidden" name="blogID" value="<?php echo $BlogToView ?>"></td>
        </tr>
        <tr>
            <td><label for="name">Name</label></td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td><label for="displayName">Display Name</label></td>
            <td><input type="text" name="displayName" id="displayName"></td>
        </tr>
        <tr>
            <td><label for="comment">Comment</label></td>
            <td><textarea name="comment" id="comment" rows="10" cols="50"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
</form>

<br>

<table class="commentSection">
    <tr>
        <th>Username</th>
        <th>Comment</th>
    </tr>

    <?php
    // Get all comments for specific blog post from DB and display them
//    $comments_SQL_statement = "SELECT * FROM comments_table JOIN users ON users.ID = comments_table.users_ID WHERE blog_BLOG_ID ='$BlogToView'";
    $comments_SQL_statement = "SELECT * FROM comments_table JOIN users u on comments_table.users_ID = u.ID WHERE blog_BLOG_ID ='$BlogToView'";

    $comments_result = mysqli_query($DB_Connection, $comments_SQL_statement);

    while($commentRow = mysqli_fetch_array($comments_result)) {
        echo "<tr>";
        echo "<td>" . $commentRow['USERNAME'] . "</td>";
        echo "<td>" . $commentRow["comment_text"] . "</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
