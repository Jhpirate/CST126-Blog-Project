<?php
session_start();

$_SESSION['user'] = "Jared H";

echo $_SESSION['user'];