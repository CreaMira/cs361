<?php
/* Header */
include ('includes/header.php');

$origin = $_GET['origin'];
$destination = $_GET['destination'];


$response = get_map_API($origin, $destination);
$distance = $response['rows']['0']['elements']['0']['distance']['text'];
$origin_city = $response['origin_addresses']['0'];
$destination_city = $response['destination_addresses']['0'];

$result = create_result($distance, $origin_city, $destination_city);

/*
*  Parameters: $origin_city (zip code), $destination_city (zip code), distance (text, distance bewtween two city)
*  Return: a long text
*/
function create_result($distance, $origin_city, $destination_city){
  $result = "The distance between ";
  $result .= $origin_city;
  $result .= " and ";  
  $result .= $destination_city;
  $result .= " is ";  
  $result .= "<b>".$distance."</b>";
  
  return $result;
}

/*
*  Parameters: $origin (zip code), $destination (zip code)
*  Send requist to https://marsican.app/maps/distance and get the respense
*  Return: Array of information   
*/
function get_map_API($origin, $destination){
  //send requist
  $APIData = file_get_contents("https://marsican.app/maps/distance?Origin=".$origin."&Destination=".$destination);
  
  //decode json
  $response = json_decode($APIData, true);

  if($response['status'] == "OK"){
    return $response;
  }
}



?>

<div class = "searcher">
  
  <!--map API input-->
  <h2>Calculate the Distance</h2>
  <form action = "" method = "GET">
    <label for = "zip"> Enter Zip Code</lable>
    <p><input type = "text" name = "origin" id = "origin" placeholder = "Origin Zip Code"></p>
    <p><input type = "text" name = "destination" id = "destination" placeholder = "Destination Zip Code"></p>
    <button type = "submit" name = "submit" class = "btn btn-success">Calculate distance</button>
    <a href="mapAPI.php" class="btn btn-default">Cancel</a>
    <br><br>

  </form>
  
  <!--map API input-->
  <div class = "result">
  <?php
    if($response){
      echo '<div class="alert alert-success" role="alert">
            '.$result.'
            </div>';
    }
  ?>
  </div>
  
  <br>
  <a href="weather.php" class="btn btn-default">Back to Home</a>
  
</div>

<?php
/*** Footer ***/
include ('includes/footer.php');