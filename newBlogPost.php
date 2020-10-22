<?php

// We need the DB_connection file or we cant add the blog to the database
require "DB_Connection.php";

// Declare variable to hold information captured from the html form
$blogName = $_POST["blogName"];
$blogAuthor = $_POST["blogAuthor"];
$blogPublishDate = date("Y-m-d"); //Get current date as the publish date (YYYY-MM-DD)
//$blogUpdateDate = date("Y-m-d"); //Might re-add later, but disabled right now
$blogPostContent = $_POST["blogContent"];

// World list filter (replace bad words with *******
// Read in file with bad words to array
// Ideas from: https://stackoverflow.com/questions/6159683/read-each-line-of-txt-file-to-new-array-element
$bad_words = file("wordlist_file/badwords.txt", FILE_IGNORE_NEW_LINES);

// Debug print contents of the entire file
//foreach ($bad_words as $bad_word){
//    echo $bad_word;
//}

// Replace any bad words with "******"
// Right now it replaces all swears with the same amount of *'s
// I'll fix it in the future so it replaces with the proper amount of *'s
$censored_blog_content = str_replace($bad_words, "******", $blogPostContent);
//echo($censored_blog_content); //debug - print the new message with replacements

// Get data connection from DB_Connection.php file
$sql_connection = db_connect();

// SQL statement to execute
$sql_statement = "INSERT INTO blog (BLOG_TITLE, BLOG_AUTHOR, BLOG_CREATION_DATE, BLOG_CONTENT) VALUES ('$blogName', '$blogAuthor', '$blogPublishDate', '$censored_blog_content')";

// Execute the SQL statement
mysqli_query($sql_connection, $sql_statement);

// Close data connection
mysqli_close();

// Tell user blog was successfully submitted
echo("<p><strong>Blog Submitted.</strong></p>");

?>
