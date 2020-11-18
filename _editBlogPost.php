<?php
    require_once "DB_Connection.php"; //database connection info

    //get the id from blogManager Page.
    //Stored in URL as ?id=
    $blogEntryToEdit = $_GET["id"]; //get the value from the URL

    //SQL select statement to get current blog post data
    $sql = "SELECT BLOG_ID, BLOG_TITLE, BLOG_AUTHOR, BLOG_CONTENT, BLOG_TAGS from blog WHERE BLOG_ID='$blogEntryToEdit'";

    //Store result of SQL query in result here
    $result = mysqli_query(db_connect(), $sql);

    //create an array of the results so we can access it below when we output to the table
    $row = mysqli_fetch_array($result);
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Management - Edit Blog</title>
    <link rel="stylesheet" href="css/tableStyle.css">
</head>
<body>

<table>
    <tr>
        <th>Blog ID</th>
        <th>Blog Title</th>
        <th>Blog Author</th>
        <th>Blog Content</th>
        <th>Blog Tags</th>
    </tr>

    <?php

    echo "<form method='post'>";
    //Output SQL data to the HTMl table
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>"; //id
    echo "<td><textarea id='updatedTitle' name='updatedTitle' rows='10'>" . $row[1] . "</textarea></td>"; //title
    echo "<td><textarea id='updatedAuthor' name='updatedAuthor' rows='10'>" . $row[2] . "</textarea></td>"; //author
    echo "<td><textarea id='updatedContent' name='updatedContent' rows='10' cols='50'>" . $row[3] . "</textarea></td>"; //content
    echo "<td><textarea id='updatedTags' name='updatedTags' rows='10'>" . $row[4] . "</textarea></td>"; //tags
    echo "</tr>";

    //Update & Cancel Buttons
    echo "<tr>";
    echo "<td colspan='5'>";
    echo "<input type='submit' value='Update'>";
    echo "<input type='submit' value='Cancel' formaction='_getAllBlogPostsFromDB.php'>";
    echo "</td>";
    echo "</tr>";
    echo "</form>";

    ?>

</table>
</form>

<a href="blogManagement.php">Return to Blog Manager</a>

</body>
</html>

<?php

    // Get updated values entered in the textarea
    $updatedTitle = $_POST["updatedTitle"];
    $updatedAuthor = $_POST["updatedAuthor"];
    $updatedContent = $_POST["updatedContent"];
    $updatedTags = $_POST["updatedTags"];
    $updateDate = date("Y-m-d");

    // SQL statement to update the blog content to the new values
    $update_SQL = "UPDATE blog SET BLOG_TITLE='$updatedTitle', BLOG_AUTHOR='$updatedAuthor', BLOG_CONTENT='$updatedContent', BLOG_TAGS='$updatedTags', BLOG_LAST_UPDATED_DATE='$updateDate' WHERE BLOG_ID='$blogEntryToEdit'";

    // Execute the update
    mysqli_query(db_connect(), $update_SQL);
    mysqli_close(db_connect());

    if(isset($updatedTitle, $updatedAuthor, $updatedContent, $updatedTags)){
        header("refresh:1;url=blogManagement.php");
        echo "<p>Blog Post Successfully Updated...</p>";
    }
