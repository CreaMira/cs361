<?php
/* Header */
include_once ('includes/header.php');

$APIKey = "80ffaa5e9f1fdced49462be5dc381abc";
$APIData;
$zip;
$city;

/*send API requise and get JSON data*/
  if(array_key_exists("submit", $_GET)){
    /*check empty*/
    if(!$_GET['zip'] && !$_GET['city'] ){
      $error = "Sorry, the input field is empty, please entry Zip Code or City Name";
    }
    /*send requist by zip*/
    if($_GET['zip'] || $_GET['city']){
      //zip code
      if($_GET['zip']){
        $zip = $_GET['zip'];
        $APIData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?zip=".
        $_GET['zip']."&appid=".$APIKey);
      }
      //city name
      else if ( $_GET['city']){
        $APIData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".
        $_GET['city']."&appid=".$APIKey);
      }

      /*get JSON*/
      $response = json_decode($APIData, true);
      /*get weather information*/
      if($response['cod'] == 200){
        $city = $response['name'];
        $country = $response['sys']['country'];
        $temperature = $response['main']['temp'] - 273; //
        $weather = $response['weather']['0']['description'];
        $weatherImage = "http://openweathermap.org/img/wn/".$response['weather']['0']['icon']."@2x.png";
        $wind = $response['wind']['speed'];
        
        date_default_timezone_set("PDT");
        $sunRise = $response['sys']['sunrise'];
        $date = date("Y-m-d H:i:s");

        $result = "<b>".$city.", ".$country.": </b>".$temperature."&deg;c <br>";
        $result .= "<b>Weather Condition: </b>".$weather."<br>";
        if($weatherImage){
          $result .= '<img src="'.$weatherImage.'" width="150" height="150" > <br>';
        }
        $result .= "<b>Wind Speed: </b>".$wind." meter/sec";
      }
      else{
        $error = "Sorry, the Zip Code or City Name is not vallied";
      }
  }
}


?>



<h2>Spend 30 seconds, find out your intreased city weather  <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="right" title="1.Enter Zip Code or City Name 2.Press the Search button 3.Check the information">
			Need Help?
</button></h2>

<br>

<h5>Not sure the zip code or city name? Try Search by Select on the right top!</h5>
<br>

<div class = "searcher">
  <form action = "" method = "GET">
    <h4>Enter Zip Code here</h4>
    <p><input type = "text" name = "zip" size="50" id = "zip" placeholder = "Zip Code" <?php if($zip) echo 'value ='.$zip; ?> ></p>
    <button type = "submit" name = "submit" class = "btn btn-success">Search Now</button>
    <a href="weather.php" class="btn btn-default">Cancel</a>
  </form>
  
  <br><br>
  
  <form action = "" method = "GET">
    <h4> Enter City Name here</h4>
    <p><input type = "text" name = "city" size="50" id = "city" placeholder = "City Name" <?php if($city) echo 'value ='.$city; ?> ></p>
    <button type = "submit" name = "submit" class = "btn btn-success">Search Now</button>
    <a href="weather.php" class="btn btn-default">Cancel</a>
  </form>
</div>

<br><br>

<div class = "result">
<?php
  if($error){
    echo '<div class="alert alert-danger" role="alert">'. $error.'</div>';
  }
  else if($result){
    echo '<div class="alert alert-success" role="alert">'. $result.'</div>';
    
    /*INSERT into database*/    
    echo '<h3>You can save current data by click the button</h3>';
    echo '<form action="addWeather.php" method = "POST">';
      echo '<input type = "hidden" name = "city" value = "'.$city.'">';
      echo '<input type = "hidden" name = "country" value = "'.$country.'">';
      echo '<input type = "hidden" name = "temperature" value = "'.$temperature.'">';
      echo '<input type = "hidden" name = "weatherD" value = "'.$weather.'">';
      echo '<input type = "hidden" name = "wind" value = "'.$wind.'">';
      echo '<input type = "hidden" name = "date" value = "'.$date.'">';
      echo '<button type = "submit" class="btn btn-success" > Save Data</button><br><br>';
    echo '</form>';
    
    /*member API*/
    echo '<h3>Would you like to know how far is '.$city.' from a location?</h3>';
    echo '<a href="mapAPI.php?origin=97333" class="btn btn-default"> Calculate Distance from '.$city.'</a></td>';
  }

?>
</div>

<a></a>


    
<?php
/* Footer */
include_once ('includes/footer.php');