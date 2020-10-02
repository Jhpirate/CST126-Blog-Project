<?php
/*
Author: Jared Heeringa
Date: 10/01/2020
Class: CST126
Project: Milestone #2
Description: php page to handle login info
*/

//get data from HTML form and store in variables
$username = $_POST["username"];
$password = $_POST["password"]; 

echo("Username: " . $username);
echo("Password: " . $password);

$shouldAddToDB = true;
//$loginAttemptCount = 0;

//make sure data is not null/blank. If so, dont execute sql query.
if($username == "" || is_null($username)){
	echo("<p>Username cannot be left blank</p>");
	$shouldAddToDB = false;
} elseif($password == "" || is_null($password)){
	echo("<p>Password cannot be left blank</p>");
	$shouldAddToDB = false;
}

//data link to SQL server
$data_link = mysqli_connect("localhost", "root", "root", "CST126_blog_project");

// Actual SQL statment to check if user exists
$sql_statement = "SELECT * FROM users WHERE USERNAME='$username' AND PASSWORD='$password'";


//if not null/blank, then we can look up in the database
if($shouldAddToDB == true){

	$result = mysqli_query($data_link, $sql_statement);
	
	// 1 record exits, there is only one user with the username and password. Allow them to login
	// 0 record means username/password combo dosen't exist
	// 2 records means 2 users have the same username/password combo
	if(mysqli_num_rows($result) == 1){
		echo("<p><strong>Login Sucessful</strong></p>");
	} elseif(mysqli_num_rows($result) == 0){
		echo("<p><strong>Login Failed</strong></p>");
		$loginAttemtpCount++;
	} elseif(mysqli_num_rows($result) > 1){
		echo("<p><strong>There are multiple users registered</strong></p>");
	} else {
		mysqli_connect_error();
	}
	
	mysqli_close($data_link);
	
}


?>
