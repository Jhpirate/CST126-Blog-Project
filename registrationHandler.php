<?php
/*
Author: Jared Heeringa
Date: 09/17/2020
Class: CST126
Project: Milestone #1
*/

//Get date from register.html and store values in php variables
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$userName = $_POST["userName"];
$email = $_POST["email"];
$userPassword = $_POST["userPassword"];
$dateOfBirth = $_POST["dateOfBirth"];


//Datbase login info
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbtable = "CST126_blog_project"; //main table name

//establish connection to SQL database
$sql_connection = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbtable);


//DEBUGGING: Check to see if connection was sucessful or not
//Verification method from https://www.w3schools.com/php/php_mysql_connect.asp
//if (!$sql_connection){
//  die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";


//Actual SQL statement to execute below. Add data to the users table.
$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, EMAIL_ADDRESS, PASSWORD, DATE_OF_BIRTH) VALUES ('$firstName', '$lastName', '$userName', '$email', '$userPassword', '$dateOfBirth')";


//Actually execute the SQL stament on the table
mysqli_query($sql_connection, $sql);


//close SQL connection
mysqli_close();


//confirmation message to user that the form was submitted
echo("<p><strong>Registation Submitted.</strong></p>");

?>
