<?php
/*
Author: Jared Heeringa
Date: 00/00/0000
Class: CST126
Project: Milestone #3
Description: php page to handle login info
*/

// Contains the connection info for SQL database
require("DB_Connection.php");
session_start();

// Get data from HTML form and store in variables
$username = $_POST["username"];
$password = $_POST["password"];

// Sanity check variable
// If this is ever false, we wont add any data to the database or query the database
$shouldQueryDB = true;

// Make sure data is not null/blank. If so, dont execute sql query. Prevent junk getting into the DB.
// Should not be utilized because "require" is added to html form fields that are required
if ($username == "" || is_null($username)) {
    $error_message = "ERROR: Username cannot be left blank";
    include("loginError.php");
    $shouldQueryDB = false;

} elseif ($password == "" || is_null($password)) {
    echo("<p>Password cannot be left blank</p>"); //redirect to loginError.php?
    $shouldQueryDB = false;
}

// Data link to SQL server
// Get info from db_connect function in DB_Connection.php
$data_link = db_connect();

// Actual SQL statement to check if user exists with correct password
$sql_statement = "SELECT * FROM users WHERE USERNAME='$username' AND PASSWORD='$password'";

// If not null/blank, then we can look up in the database
if ($shouldQueryDB == true) {

    // Execute the SQL query
    $result = mysqli_query($data_link, $sql_statement);

    // 1 record exits, there is only one user with the username and password. Allow them to login
    // 0 record means username/password combo doesn't exist
    // 2 records means 2 users have the same username/password combo
    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['USERNAME'];
        $_SESSION['userID'] = $row['ID'];
        $_SESSION['accessLevel'] = $row['USER_ROLE'];
        header('Location: index.php');
        //echo("<p><strong>Login Successful</strong></p>");
    } else {
        echo "<p><b>Login Failed</b></p>";
    }

    // Close the SQL link
    mysqli_close($data_link);

}

?>
