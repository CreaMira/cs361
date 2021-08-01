<?php
  /* Header */
  include ('includes/header.php');

  /*get weather*/
  $APIKey = "80ffaa5e9f1fdced49462be5dc381abc";
  
  if(array_key_exists("submit", $_GET)){
    /*check empty*/
    if(!$_GET['zip']){
      $error = "Sorry, the input field is empty, please entry Zip Code";
    }
    /*send requist*/
    if($_GET['zip']){
      $APIData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?zip=".
      $_GET['zip']."&appid=".$APIKey);

      /*get JSON*/
      $response = json_decode($APIData, true);
      /*get weather information*/
      if($response['cod'] == 200){
        $city = $response['name'];
        $country = $response['sys']['country'];
        $temperature = $response['main']['temp'] - 273; //
        $weather = $response['weather']['0']['description'];
        $wind = $response['wind']['speed'];

        if($weather){
          $weatherImage = "logo.png";
        }
        $result  = '<img src="www/img/'.$weatherImage.'" alt="Happy" width="150" height="150" > <br>'; 
        $result .= "<b>".$city.", ".$country.": </b>".$temperature."&deg;c <br>";
        $result .= "<b>Weather Condition: </b>".$weather."<br>";
        $result .= "<b>Wind Speed: </b>".$wind." meter/sec";
      }
      else{
        $error = "Sorry, the Zip Code is not vallied";
      }
    }

  }

?>

    <div class = "searcher">
      <h1>Weather Searcher</h1>
      <form action = "" method = "GET">
        <label for = "zip"> Enter Zip Code</lable>
        <p><input type = "text" name = "zip" id = "zip" placeholder = "Zip Code"></p>
        <button type = "submit" name = "submit" class = "btn btn-success">Search Now</button>
        <a href="weather.php" class="btn btn-default">Cancel</a>
      </form>

      <br><br>

      <div class = "result">
        <!--https://getbootstrap.com/docs/4.3/components/alerts/-->
        <?php
          if($result){
            echo '<div class="alert alert-success" role="alert">
            '. $result.'
          </div>';
          }
          if($error){
            echo '<div class="alert alert-danger" role="alert">
            '. $error.'
          </div>';
          }
        ?>
  
      </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
/*** Footer ***/
include ('includes/footer.php');