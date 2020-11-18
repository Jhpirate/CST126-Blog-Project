<?php
/*
Author: Jared Heeringa
Date: 09/17/2020
Class: CST126
Project: Milestone #1
*/

require("DB_Connection.php");

// Get fields from register.html and store then in php variables
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$userName = $_POST["userName"];
$email = $_POST["email"];
$userPassword = $_POST["userPassword"];
$dateOfBirth = $_POST["dateOfBirth"];

// Establish connection to SQL database using db_connect function from DB_Connect.php
$sql_connection = db_connect();

// SQL statement to execute below. Adds data to the users table.
// Insert default user role of 'user'
$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, EMAIL_ADDRESS, PASSWORD, DATE_OF_BIRTH, USER_ROLE) VALUES ('$firstName', '$lastName', '$userName', '$email', '$userPassword', '$dateOfBirth', 'user')";

//Actually execute the SQL statement on the table
mysqli_query($sql_connection, $sql);

// Close the SQL connection
mysqli_close();

//confirmation message to user that the form was submitted
echo("<p><strong>Registration Submitted.</strong></p>"); //replace with loginResponse.php
header("refresh:3;url=index.html");
