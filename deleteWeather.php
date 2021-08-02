<?php
require_once 'includes/header.php';
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    echo "Error: id was not found.";
    require_once ('includes/footer.php');
    exit();
}
//retrieve book id from a query string variable.
$ID = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
 //define the MySQL delete statement
$sql = "DELETE FROM WEATHER WHERE ID = $ID";

  //execute the query
$query = @$conn->query($sql);

 //Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}

// close the connection.
$conn->close();

echo "<script language='javascript'>";
echo "     location='https://web.engr.oregonstate.edu/~shennu/cs361/listWeather.php' ; ";
echo "</script>";

?>
 