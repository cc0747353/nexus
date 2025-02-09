<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <a class="navbar-brand ion-arrow-left-c btn" href="admin.php" >Back To Admin Page</a>
<?php 
require_once('sqlconfig.php');
require_once('auth.php');
$query="SELECT * FROM `mailmessage` ";
$result =mysqli_query($con,$query) or die("There was an error fetching mails");
$rows= mysqli_num_rows($result);
if ($rows==0) {
    echo "You do not have any mail.";
}
else {
    while ($row2=mysqli_fetch_array($result)) {
        $name=$row2['name'];
        $email = $row2['email'];
        $phone = $row2['phone'];
        $message = $row2['message'];
        $echostring= "<table class='table'>
        <thead> <tr>
        <h2 align=center>Mail</h2>
        </tr> </thead>
        <tbody>
        <tr> <th scope='row'> Name</th>
        <td> $name</td>
        </tr>
        <tr>
        <th scope='row'>Email</th>
        <td> $email</td>
        </tr>
        <tr>
        <th scope='row'>message</th>
        <td> $message</td>
        </tr>
        </tbody>
        </table>";
        echo $echostring;
    }
}
?>
 <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/main.js"></script>


    <script src="js/main.js"></script>
</body>
    </html>