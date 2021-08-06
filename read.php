<?php

$post_arr = array();
$post_arr['data'] = array();

//database
require_once('includes/database.php');

//SELECT statement
$sql = "SELECT * FROM WEATHER";

//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Selection failed: ($errno) $error.");
}

//create array
while ($row = $query->fetch_assoc()){
  
  $post_item = array(
    'id' => $row['id'],
    'city' => $row['City'],
    'country' => $row['Country'],
    'temperature' => $row['Temperature'],
    'weather_description' => $row['WeatherD'],
    'wind' => $row['Wind'],
    'date' => $row['Date']
    
  );

  
array_push($post_arr['data'], $post_item);
  
}

echo json_encode($post_arr);

?>