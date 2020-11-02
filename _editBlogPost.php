<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CST126 - Blog Management</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>
<body>

<form action="" method="post">
<table>
    <tr>
        <th>Blog ID</th>
        <th>Blog Title</th>
        <th>Blog Author</th>
        <th>Blog Content</th>
        <th>Blog Tags</th>
        <th>Actions</th>
    </tr>
    <?php
    require "DB_Connection.php"; //database connection info

    //get the id from blogManager Page.
    //Stored in URL as ?id=
    $blogEntryToEdit = $_GET["id"]; //get the value from the URL

    //SQL select statement to get current blog post data
    $sql = "SELECT BLOG_ID, BLOG_TITLE, BLOG_AUTHOR, BLOG_CONTENT, BLOG_TAGS from blog WHERE BLOG_ID=$blogEntryToEdit";

    //Store result of SQL query in result here
    $result = mysqli_query(db_connect(), $sql);

    //create an array of the results so we can access it below when we output to the table
    $row = mysqli_fetch_array($result);

    //Output SQL data to the HTMl table
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>"; //id
    echo "<td><textarea id='updatedTitle' name='updatedTitle' rows='10'>" . $row[1] . "</textarea></td>"; //title
    echo "<td><textarea id='updatedAuthor' name='updatedAuthor' rows='10'>" . $row[2] . "</textarea></td>"; //author
    echo "<td><textarea id='updatedContent' name='updatedContent' rows='10' cols='50'>" . $row[3] . "</textarea></td>"; //content
    echo "<td><textarea id='updatedTags' name='updatedTags' rows='10'>" . $row[4] . "</textarea></td>"; //tags
    echo "<td><input type='submit'></td>";
    echo "</tr>";


    //get updated values entered in the textarea
    $updatedTitle = $_POST["updatedTitle"];
    $updatedAuthor = $_POST["updatedAuthor"];
    $updatedContent = $_POST["updatedContent"];
    $updatedTags = $_POST["updatedTags"];

    //SQL statement to update the blog content to the new values
    $update_sql = "UPDATE blog SET BLOG_TITLE='$updatedTitle', BLOG_AUTHOR='$updatedAuthor', BLOG_CONTENT='$updatedContent', BLOG_TAGS='$updatedTags' WHERE BLOG_ID='$row[0]'";

    //execute the update
    mysqli_query(db_connect(), $update_sql);

    mysqli_close(db_connect()); //close the connection

    ?>

</table>
</form>

<a href="blogManager.php">Return to Blog Manager</a>

</body>
</html>
