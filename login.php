<!doctype html>

<!--
Author: Jared Heeringa
Date: 10/01/2020
Class: CST126
Project: Milestone #2
Description: html page with login form
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>

<body>
<form action="loginHandler.php" method="post">
    <table>
        <tr>
            <td><label for="username">Username</label></td>
            <td><input type="text" name="username" id="username" placeholder="Enter username"></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password" placeholder="Enter password"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>

<a href="index.php">Main Menu</a>

</body>
</html>
