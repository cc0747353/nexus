<?php 
require_once('sqlconfig.php');
session_start();
?>
<html> 
<head>
    <title>login manager</title>
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
<a href="index.html" class=" ion-arrow-left-c btn">Home Page</a>
  </head>
<?php 
if(isset($_POST['username'])){
  $username=stripslashes($_REQUEST['username']);
  $username=mysqli_real_escape_string($con,$username);
  $password = stripslashes($_REQUEST['password']);
  $password= mysqli_real_escape_string($con,$password);
  $query="SELECT * FROM `login` WHERE username='$username'and passwords='$password'";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  $rows = mysqli_num_rows($result);
  if($rows==1){
    $_SESSION['username']= $username;
    header("location: /admin1000.php");
  }
  else{
    echo "<div class='form'>
    <h3> Either the Username or the Password is not correct. </h3>
    <br/>Click here to <a type='button' href='login.php'> login</a></div>";
  } 
} else{
?>
<div class="form">
  <h1>Login</h1>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
  <div class="row">
                <div class="col-md-3 form-group">
                  <label for="name">UserName</label>
                  <input type="text" id="username" name="username" class="form-control " required>
                </div>
              </div>
                
              </div>
              <div class="row">
                <div class="col-md-3 form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control " required>
                </div>
              </div>
                  <input type="submit" value="Login" class="btn btn-primary px-3 py-3">
                </div>
              </div>
</form> 
</div>
<?php } ?>


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