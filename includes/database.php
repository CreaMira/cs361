<?php
//define parameters
$host = "classmysql.engr.oregonstate.edu";
$login = "cs340_shennu";
$password = "x_f2e[!Bb_qKzH8f";
$database = "cs340_shennu";

//Connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);

//handle connection errors
if ($conn->connect_errno != 0) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die ("Connection failed with: ($errno) $errmsg.");
}