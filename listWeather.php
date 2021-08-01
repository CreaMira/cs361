<?php
//header
require 'includes/header.php';

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
?>

<div class = "searchList">
  <h1>Weather History</h1>
</div>

<table id="weatherList" class="weatherList">
    <tr>
        <th class="col1">id</th>
        <th class="col1">City</th>
        <th class="col1">Country</th>
        <th class="col1">Temperature</th>
        <th class="col1">WeatherD</th>
        <th class="col1">Wind</th>
        <th class="col1">Date</th>        
    </tr>
    
    <!--database table -->
    <?php
    while ($row = $query->fetch_assoc()) {
        echo "<tr>";
        echo "<td>", $row['id'], "</td>";
        echo "<td>", $row['City'], "</td>";
        echo "<td>", $row['Country'], "</td>";
        echo "<td>", $row['Temperature'], "</td>";
        echo "<td>", $row['WeatherD'], "</td>";
        echo "<td>", $row['Wind'], "</td>";
        echo "<td>", $row['Date'], "</td>";
        echo "</tr>";
    }
    ?>
    
</table>

<?php
//footer
require 'includes/footer.php';
