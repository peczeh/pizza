<!DOCTYPE html>
<html>
<head>
<title>DELIZIOSO PIZZARENDELÉS</title>
<link rel="shortcut icon" href="/icon/icon.png" type="image/x-icon" />
<?php 
  include_once 'header.php';
 ?>

<meta charset="UTF-8" lang="HU">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<?php 
//főoldal
  include_once 'main.php';
 ?>
<!-- MENÜ -->
<div class="w3-bottom w3-hide-small">
  <div class="w3-bar w3-white w3-center w3-padding w3-opacity-min w3-hover-opacity-off">
    <a href="#main" style="width:25%" class="w3-bar-item w3-button">BEJELENTKEZÉS</a>
    <a href="#us" style="width:25%" class="w3-bar-item w3-button">RÓLUNK</a>
    <a href="#pizzas" style="width:25%" class="w3-bar-item w3-button">RENDELÉS</a>
    <a href="#regist" style="width:25%" class="w3-bar-item w3-button">REGISZTRÁCIÓ</a> 
</div>
</div>


<?php
//rólunk
  include_once 'us.php';

//válzozó képek
  include_once 'change.php';

//pizzák, táblázat, rendelés
  include_once 'pizzas.php';


 ?>

<!-- Background photo (szivecskes) -->
<div class="w3-display-container bgimg2">
  <div class="w3-display-middle w3-text-white w3-center">
   <h1 style="text-shadow: 2px 2px 4px #000;"><u>NÁLUNK MINDEN VENDÉG</u></h1><br>
   <h1 style="text-shadow: 2px 2px 4px #000;" class="w3-jumbo"><b>ELSŐ</b></h1>
  </div>
</div>

<?php 
  //regisztáció
include_once 'regist.php';



//oldal vége
  include_once 'footer.php';

 ?>
</body>
</html>
