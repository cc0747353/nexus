<?php 
require_once('auth.php');
require_once('sqlconfig.php');
function purify($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);  
    return $var;
}

?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">
   <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
  .center{
  margin: auto;
  width: 50%;
  border: 3px solid #0000 ;
  padding:10px;
}
.icofont-check-circled{
  font-size: 20px;
}
.xax {
  box-shadow: 5px 10px gray;
}
.yay {
  box-shadow: 5px 10px rgb(201, 129, 129);
}
    </style>
    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
  <a class="navbar-brand ion-arrow-left-c btn" href="index.html" >Home page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEx" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id ="navbarEx">
  <ul class="navbar-nav mr-auto">
  <li class="nav-item">
<li class="nav-item">
<a class="btn btn-info nav-link" href="checkemail.php">Check Mails</a>
</li>
<li class="nav-item"><button type="button" class=" nav-link btn btn-info" data-toggle="modal" data-target="#changemodal">Change Admin Password</button></li>

</li>
<li class="nav-item">
<a class="btn btn-info nav-link" href="logout.php">Logout</a>
</li>
</ul>
</nav>
</div>