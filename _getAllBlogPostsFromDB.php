<?php

require_once "DB_Connection.php";

//Get all blog posts from SQL database
function getAllBlogPosts()
{
    //SQL statement to select the id, title, author, content, and tags
    $sql = "SELECT BLOG_ID, BLOG_TITLE, BLOG_AUTHOR, BLOG_CONTENT, BLOG_TAGS FROM blog";

    $dbConnectionQuery = mysqli_query(db_connect(), $sql) or die(mysqli_error(db_connect()));

    //declare variables
    $blogPostContents = array();
    $index = 0;

    //loop to add all content to the blog array
    while ($currentRow = mysqli_fetch_array($dbConnectionQuery)) {
        $blogPostContents[$index] = array($currentRow["BLOG_ID"], $currentRow["BLOG_TITLE"], $currentRow["BLOG_AUTHOR"], $currentRow["BLOG_CONTENT"], $currentRow["BLOG_TAGS"]);
        $index++;
    }

    mysqli_close(db_connect()); //close the connection

    return $blogPostContents;

}
