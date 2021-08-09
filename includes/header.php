<!doctype html>
<html lang="en">
<?php
/*
    Author: Nuocheng Shen
    Couse:cs361
 */
?>
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

<!-- css -->
<link type="text/css" rel="stylesheet" href="www/css/styles.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
      $(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
      
     function toHome() {
        window.location.href="https://web.engr.oregonstate.edu/~shennu/cs361/weather.php";
      }
</script>


<title>Weather Collector</title>

</head>


<body>
<nav class="navbar navbar-inverse">

  <div class="container-fluid">
  
  
    <div class="navbar-header">
      <a class="navbar-brand" data-toggle="tooltip" data-placement="right" title="Back to the Home Page" href="weather.php">Weather Collector</a>
    </div>
    
    <ul class="nav navbar-nav">    
      <li class="active ">
        <a href="weather.php" data-toggle="tooltip" data-placement="left" title="Back to the Home Page" >Home Page</a>
      </li>
      
            
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" 
          id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
        >
          Search Weather by Select
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="weather.php?city=corvallis&submit=#">Corvallis</a>
          <a class="dropdown-item" href="weather.php?city=Portland&submit=#">Portland</a>
          <a class="dropdown-item" href="weather.php?city=Eugene&submit=#">Eugene</a>
        </div>
      </div>
            
      <li class="active"><a href="listWeather.php" data-toggle="tooltip" data-placement="left" title="Show Your Save Data">List Weather</a></li>     
       
    </ul>
  </div>
</nav>

<body style="text-align:center;">