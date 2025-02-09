<html>
    <head> 
    <title>MoExpress Logistics- Mail</title>
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
    <?php 
    require_once("sqlconfig.php");
    if (isset($_POST['numen'])) {
        $name=$_POST['numen'];
        $phone = $_POST['phone'];
        $email=$_POST['email'];
        $message= $_POST['message'];
$query="INSERT INTO mailmessage(name,email,phone,message) VALUES('$name','$phone','$email','$message')";
$result=mysqli_query($con,$query)  or die("There was an error with this mail <a href='contact.html'> Go to the previous page while we fix the error</a>".mysqli_error($con));
    }
    else{
        header("location: contact.html");
    }
    ?>
    <h3><p>Thanks for getting in touch with us. Expect our reply mail in an hours time.</p></h3>
    <a class="btn btn-info" href="index.html">Go to Home Page</a>
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/main.js"></script>

<script src="js/main.js"></script>
</html>