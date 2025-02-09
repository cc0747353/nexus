<?php
require_once('sqlconfig.php');
require_once('auth.php');
?>
<html> 
<head>
<title>TransWorld</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">
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
  </style>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/hist_style.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<?php 
if(isset($_GET['tracker'])){
$tracker=$_GET['tracker'];} ?>
<div class="" >
<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"  name="hist">
<label for="new_date" > Enter Date: </label> <br>
<input type="date" name="new_date"  required> <br>
<label for="new_time" >Enter Time: </label> 
<input type="time" name="new_time"  required> <br>
<label for="new_loocation"> Enter Location: </label>
<input type="text" name="new_loocation" placeholder="Enter Location" required><br>
<label for="lat">Enter Latitude:</label><br>
<input type="text" name="lat" placeholder="Enter Latitude" required><br>
<label for="lng">Enter Longitude:</label><br>
<input type="text" name="lng" placeholder="Enter Longitude" required><br>
<br>
<label for="lat">Enter Status:</label><br>
<input type="text" name="status" placeholder="Enter Package Status" required><br>
<label for="lng">Enter Remarks:</label><br>
<input type="text" name="remark" placeholder="Enter Remarks" required><br>
<br>

<input type="hidden"  name="tracker" value=<?php echo "$tracker"; ?>  >
<input type="submit" name="submit" class="btn btn-success">  <br>
</form>
</div>
<?php

if (isset($_GET['tracker'])) {
$tracker=$_GET['tracker'];
echo "<input type='hidden' name='tracker' value='$tracker'>";
$query = "SELECT * FROM `trackhistory` WHERE trackid=$tracker";
$result = mysqli_query($con,$query) or die("There was an error fetching the track history. Please try again later");
if (mysqli_num_rows($result)==0) {
    echo "<h3>No tracking History yet. Use the form to add</h3>";
}
while ($rowser=mysqli_fetch_array($result)) {
    $hist_date= $rowser['dates'];
    $hist_time= $rowser['time'];
    $hist_loc = $rowser['loocation'];
    $hist_lng = $rowser['lng'];
    $idcol = $rowser['idcol'];
    $hist_lat = $rowser['lat'];
    $hist_status = $rowser['status'];
    $hist_remark = $rowser['remarks'];
    $echostr = "
    <div align=center>   
    <table class='table table-striped hist'> 
    <thead> <strong><h4>Shipment History <a href='delhistory.php?tracker=$tracker&prykey=$idcol' class='btn btn-secondary float-right'> Delete History </a></h4></strong> </thead>
     <tbody>
    <tr> <th> Date: </th><td> $hist_date <a href='edithistory.php?tracker=$tracker&editdata=$hist_date&prykey=$idcol&edittable=dates&datatype=date' class='btn btn-mini'>Edit</a>   </td></tr>
    
    <tr> <th> Time: </th><td> $hist_time <a href='edithistory.php?tracker=$tracker&editdata=$hist_time&prykey=$idcol&edittable=time&datatype=time' class='btn btn-mini'>Edit</a></td> </td></tr>
    
    <tr> <th> Location: </th><td> $hist_loc <a href='edithistory.php?tracker=$tracker&editdata=$hist_loc&prykey=$idcol&edittable=loocation&datatype=text' class='btn btn-mini'>Edit</a> </td></td> </tr>

     <tr> <th> Latitude: </th><td> $hist_lat <a href='edithistory.php?tracker=$tracker&editdata=$hist_lat&prykey=$idcol&edittable=lat&datatype=text' class='btn btn-mini'>Edit</a></td> </td></tr>
     
      <tr> <th> Longitude: </th><td> $hist_lng <a href='edithistory.php?tracker=$tracker&editdata=$hist_lng&prykey=$idcol&edittable=lng&datatype=text' class='btn btn-mini'>Edit</a></td> </td></tr>
    
     <tr> <th> Status: </th><td> $hist_status<a href='edithistory.php?tracker=$tracker&editdata=$hist_status&prykey=$idcol&edittable=status&datatype=text' class='btn btn-mini'>Edit</a></td> </td></tr>
     
      <tr> <th> Remarks: </th><td> $hist_remark<a href='edithistory.php?tracker=$tracker&editdata=$hist_remark&prykey=$idcol&edittable=remarks&datatype=text' class='btn btn-mini'>Edit</a></td> </td></tr>  
   
    </tbody>
    </table>
    </div>
    ";
    echo $echostr;
}
}
if (isset($_GET['submit'])) {
    $new_date = $_GET['new_date'];
    $new_loocation = $_GET['new_loocation'];
    $lng = $_GET['lng'];
    $new_time= $_GET['new_time'];
    $lat = $_GET['lat'];
    $tracker  = $_GET['tracker'];
    $status = $_GET['status'] ;
    $remarks = $_GET['remark'] ;
    $hist_query = "INSERT INTO `trackhistory` (dates,time,loocation,trackid,lng,lat, status, remarks) VALUES('$new_date','$new_time','$new_loocation','$tracker','$lng','$lat','$status','$remarks')";

    $query_2 = mysqli_query($con,$hist_query);
    if($query_2){ echo "<h5>shipment history successfully updated! Dont Refresh Page </h5>";
     }
    else {
        echo "There was an error updating shipment history";
    }
}

?>