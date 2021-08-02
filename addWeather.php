<?php

//header
require_once 'includes/header.php';

//database
require_once('includes/database.php');

$city = $_POST["city"];
$country = $_POST["country"];
$temperature = $_POST["temperature"];
$weatherD = $_POST["weatherD"];
$wind = $_POST["wind"];
$date = $_POST["date"];


//INSERT
$sql = "INSERT INTO WEATHER VALUES (NULL, '$city','$country','$temperature','$weatherD','$wind','$date')";


//Execute the query
$query = @$conn->query($sql);

//handle error
if(!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

$conn->close();

echo "<script language='javascript'>";
echo "     location='https://web.engr.oregonstate.edu/~shennu/cs361/listWeather.php' ; ";
echo "</script>";
?>