<?php

function db_connect(){
    // Database connection credentials
    $host = "gcu-cst126-blogproject-mysqldbserver.mysql.database.azure.com";
    $user = "mysqldbuser@13.65.89.91";
    $password = "dW3kRun5D2kefNK";
    $database = "cst126_blogproject";

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
