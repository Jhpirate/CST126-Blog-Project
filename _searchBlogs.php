<?php

require_once "DB_Connection.php";

$searchValue = $_GET['searchValue'];
$searchResults = getSearchResults($searchValue);

// Get our search results from the database
function getSearchResults($p_searchVal){
    $connection = db_connect();
    $sql_statement = "SELECT * FROM blog WHERE BLOG_TITLE LIKE '%$p_searchVal%' OR BLOG_CONTENT LIKE '%$p_searchVal%' OR BLOG_TAGS LIKE '%$p_searchVal%'";

    $result = mysqli_query($connection, $sql_statement);

    $searchResults = array();
    $index = 0;

    while($row = mysqli_fetch_assoc($result)) {
        $searchResults[$index] = array($row['BLOG_TITLE'], $row['BLOG_CONTENT'], $row['BLOG_TAGS']);
        $index++;
    }

    return $searchResults;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <link rel="stylesheet" href="css/managementTableStyle.css">-->
    <link rel="stylesheet" href="css/viewBlogsPageStyle.css">
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

<table>
    <tr>
        <th>Blog Title</th>
        <th>Blog Contents</th>
        <th>Blog Tags</th>
    </tr>
    <?php

    if(count($searchResults) > 0){
        for ($i = 0; $i < count($searchResults); $i++) {

            echo "<tr><td colspan='3'><hr></td></tr>";
            echo "<tr>";

            echo "<td>" . $searchResults[$i][0] . "</td>"; //title
            echo "<td>" . $searchResults[$i][1] . "</td>"; //content
            echo "<td>" . $searchResults[$i][2] . "</td>"; //tags

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3' align='center'><b>-- No Results Found --</b></td></tr>";
    }



    ?>
</table>

<hr>
<a href="index.php">Return Home</a>

</body>
</html>