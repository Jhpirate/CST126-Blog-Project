<?php

function db_connect(){
    // Database connection credentials
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "CST126_blog_project";

    // Connection attempt
    $db_connection = mysqli_connect($host, $user, $password, $database);

    // Check if connection was successful or not
    // If connection is not successful, stop the script and output the reason why the connection failed
    if(mysqli_connect_error()){
        echo("Error: Data connection failed!\n");
        echo(mysqli_connect_error());
        exit(); //stop the script because data connection failed
    }

    // Returns the connection
    return $db_connection;
}
