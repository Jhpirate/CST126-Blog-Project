<?php

require_once "DB_Connection.php";

$userID = $_GET["id"];

//echo "Your ID is: " . $userID;

$sql = "DELETE FROM users WHERE ID='$userID'";

//execute the delete sql statement
mysqli_query(db_connect(), $sql);
mysqli_close(db_connect()); //close the connection

echo "<h1><strong>User Successfully deleted!</strong></h1>";
echo "</br>";
echo "<b>Returning to User Management Screen</b>";

header("refresh:1;url=userManagement.php");
