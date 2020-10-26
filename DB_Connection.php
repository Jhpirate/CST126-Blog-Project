<?php

function db_connect(){
    // Database connection credentials
    // I have no idea how to connect to Azure
    $host = "gcu-cst126-blogproject.mysql.database.azure.com";
    $user = "gcuCST126dbUser";
    $password = "pk4JLe8LNmsF7n2";
    $database = "gcu_cst126";

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
