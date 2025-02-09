<?php
require_once('sqlconfig.php');
require_once('auth.php');
$editvalue = $_GET['editvalue'];
$edittable = $_GET['edittable'];
$tracker = $_GET['tracker'];
?>
<html><head><title>Edit </title>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css"></head>

<body><h3>Change value for <?php echo $editvalue; ?></h3><br/>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" name="edit">
<label for="edit"> Put new value for <?php echo $edittable; ?> </label>
<input type="text" name="editname" required>
<input type="hidden" name="edittable" value="<?php echo $edittable; ?>">
<input type="hidden" name="editvalue" value="<?php echo $editvalue; ?>">
<input type="hidden" name="tracker" value="<?php echo $tracker; ?>">
<input type="submit" name="submit" class="btn btn-success">
</form>
<?php
if (isset($_GET['submit'])) {
    $answer1=$_GET['editname'];
    $answer2 = $_GET['edittable'];
    $answer3 = $_GET['editvalue'];
    $answer4 = $_GET['tracker'];
    $query = "UPDATE `orders` SET $answer2= '$answer1' WHERE trackid='$answer4'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {
       header('location: admin.php');
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