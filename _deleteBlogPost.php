<?php
require "DB_Connection.php";

//get the selected id from the URL
$blogEntryToEdit = $_GET["id"]; //get the value from the URL

//Delete SQL statement. Very careful here or we could delete the wrong entry.
$sql = "DELETE FROM blog WHERE BLOG_ID='$blogEntryToEdit'";

//execute the delete sql statement
mysqli_query(db_connect(), $sql);
mysqli_close(db_connect()); //close the connection

//Confirm successful delete and redirect user back to the blog manager page
echo "<p>Blog entry deleted...</p>";
header("refresh:3;url=blogManager.php");
echo "<a href='blogManager.php'>Redirecting in 3 seconds. Click here if you are not automatically taken back.</a>";
