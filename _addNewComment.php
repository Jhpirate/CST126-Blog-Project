<?php

require_once "DB_Connection.php";
session_start();
$userID = $_SESSION["userID"];
$blog_ID = $_POST["blogID"];
$name = $_POST["name"];
$displayName = $_POST["displayName"];
$commentText = $_POST["comment"];

$SQL_connection = db_connect();
$SQL_statement = "INSERT INTO comments_table (comment_text, blog_BLOG_ID, users_ID) VALUES ('$commentText', '$blog_ID', '$userID')";


if(isset($userID)){
    $result = mysqli_query($SQL_connection, $SQL_statement);
    if($result) {
        echo "Insert success";
        echo "<a href='index.php'>Home</a>";
        header("Location: _viewSingleBlog.php?blogID=$blog_ID");
    } else {
        echo "Error" . mysqli_error();
    }
}