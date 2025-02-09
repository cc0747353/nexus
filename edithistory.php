<?php
require_once('sqlconfig.php');
require_once('auth.php');
?>
<html> 
<head>
<title>MoExpress Logistics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/hist_style.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php  
if (isset($_GET['tracker'])) {
    $tracker= $_GET['tracker'];
    $editdata= $_GET['editdata'];
    $prykey=$_GET['prykey'];
    $edittable= $_GET['edittable'];
    $data_type = $_GET['datatype'];
    if (true) {
        ?>
    <h3>Change value for <?php echo "$editdata"; ?></h3><br/>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" name="edit">
<label for="edit"> Enter new value : </label>
<?php
if ($edittable=='status') { ?>
    <select id='editdata' name='editdata'><option value='HOLD' selected>HOLD</option><option value='SHIPPED'>SHIPPED</option><option value='CLEARED'> CLEARED</option></select>
    <br/>
<?php
}
else{
    ?>
<input type=<?php echo "$data_type"; ?> name='editdata' required>

<?php
}
?>
<input type="hidden" name="edittable" value="<?php echo $edittable; ?>">
<input type="hidden" name="tracker" value="<?php echo $tracker; ?>">
<input type="hidden" name="prykey" value="<?php echo $prykey; ?>">
<input type="submit" name="submit" class="btn btn-success">
</form>
<?php
    }

if (isset($_GET['submit'])) {
   $answer1 = $_GET['edittable'];
   $answer2 = $_GET['editdata'];
   $answer3 = $_GET['tracker'];
   $answer4 = $_GET['prykey'];
    $query = "UPDATE `trackhistory` SET $answer1= '$answer2' WHERE trackid='$answer3' AND idcol='$answer4'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {
       header('location: admin.php');
    }
}
}
?>
<div>
<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main.js"></script>
</div>
</body>
</html>