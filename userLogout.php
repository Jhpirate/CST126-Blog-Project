<?php
session_start(); //used anytime we are working with any session vars

//fill session with blank array
$_SESSION = array();

session_destroy();

echo "<b>Successfully logged out</b>";
header('Location: index.php');