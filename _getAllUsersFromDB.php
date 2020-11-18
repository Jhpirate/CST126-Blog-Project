<?php
/*
 * Helper function to access the database and get all the users
 * Allows blog Admin to view all users and edit their role
 * Admin can assign user to:
 * - user (default)
 * - moderator
 * - admin
 */

require_once "DB_Connection.php";

function getAllUsers()
{
    $sql = "SELECT ID, FIRST_NAME, LAST_NAME, USERNAME, USER_ROLE FROM users";

    $dbConnectionQuery = mysqli_query(db_connect(), $sql) or die(mysqli_error(db_connect()));

    $usersArray = array();
    $index = 0;

    while ($row = mysqli_fetch_array($dbConnectionQuery)) {
        $usersArray[$index] = array($row["ID"], $row["FIRST_NAME"], $row["LAST_NAME"], $row["USERNAME"], $row["USER_ROLE"]);
        $index++;
    }

    mysqli_close(db_connect());

    return $usersArray;
}
