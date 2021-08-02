<!doctype html>
<?php
/*
    Author: Nuocheng Shen
    Couse:cs361
 */
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- css -->
    <link type="text/css" rel="stylesheet" href="www/css/style.css" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Weather Searcher</title>
    

  </head>
  
  <style>
  
    body{
      background-color: #DFDFE1; 
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
      color: Black;
      font-family: poppin, 'Times New Roman', Times, serif;
    }
    
    h2{
      font-weight: 720;
      margin-top: 50px;
    }
            
    .searcher{
      text-align: center;
      justify-content: center;
      align-items: center;
    }
    
    .searchList{
      text-align: center;
      justify-content: center;
      align-items: center;
    }
    
    
    input{
      width: 400px;
      padding: 5px;
    }
    
  </style>
  
  <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="weather.php">Weather Collector</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="weather.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Search by Select<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="weather.php?city=corvallis&submit=#">Corvallis</a></li>
          <li><a href="weather.php?city=Portland&submit=#">Portland</a></li>
          <li><a href="weather.php?city=Salem&submit=#">Salem</a></li>
        </ul>
      </li>
      <li><a href="listWeather.php">List Weather</a></li>
    </ul>
  </div>
</nav>

    
  <body>

