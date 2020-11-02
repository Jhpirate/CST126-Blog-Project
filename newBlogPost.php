<?php

// We need the DB_connection file or we cant add the blog to the database
require "DB_Connection.php";

// Declare variable to hold information captured from the html form
$blogName = $_POST["blogName"];
$blogAuthor = $_POST["blogAuthor"];
$blogPublishDate = date("Y-m-d"); //Get current date as the publish date (YYYY-MM-DD)
//$blogUpdateDate = date("Y-m-d"); //Might re-add later, but disabled right now
$blogPostContent = $_POST["blogContent"];

// World list filter (replace bad words with *
// Read in file with bad words to array
// Ideas from: https://stackoverflow.com/questions/6159683/read-each-line-of-txt-file-to-new-array-element
$bad_words = file("wordlist_file/badwords.txt", FILE_IGNORE_NEW_LINES);

// Replace any bad words with *'s
// Make a copy of original blog content, so we can preserve the original
// https://stackoverflow.com/questions/48907373/replace-word-with-stars-exact-length/48907497
$censored_blog_content = $blogPostContent;

foreach ($bad_words as $bad_word) {
    $word_length = strlen($bad_word); //get word length of current bad word
    $stars = str_repeat("*", $word_length); //repeat * for however long the bad word is
    $censored_blog_content = str_replace($bad_word, $stars, $censored_blog_content); //replace the bad word with *
}

// Get data connection from DB_Connection.php file
$sql_connection = db_connect();

// SQL statement to execute
//$sql_statement = "INSERT INTO blog (BLOG_TITLE, BLOG_AUTHOR, BLOG_CREATION_DATE, BLOG_CONTENT) VALUES ('$blogName', '$blogAuthor', '$blogPublishDate', '$censored_blog_content' ))";
//$sql_statement = "INSERT INTO blog ( BLOG_TITLE, BLOG_AUTHOR, BLOG_CONTENT ) VALUES ( '$blogName', '$blogAuthor', '$censored_blog_content' ))";
$sql_statement = "INSERT INTO blog (BLOG_TITLE, BLOG_AUTHOR, BLOG_CREATION_DATE, BLOG_CONTENT) VALUES ('$blogName', '$blogAuthor', '$blogPublishDate', '$censored_blog_content')";

// Execute the SQL statement
mysqli_query($sql_connection, $sql_statement);

// Close data connection
mysqli_close();

// Tell user blog was successfully submitted
echo("<p><strong>Blog Submitted.</strong></p>");
echo("<a href='index.html'>Return Home</a>");

?>
