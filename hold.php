<?php
require_once('auth.php');
require_once('sqlconfig.php');
$trackid=$_GET['tracker'];
$current_status = $_GET['status'];
echo $current_status;
if ($current_status== 'On hold') {
    $query = "UPDATE `orders` SET status= 'In transit' WHERE trackid='$trackid' ";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {
        header('location: admin.php');
    }
}
else {
    $query = "UPDATE `orders` SET status= 'On hold' WHERE trackid='$trackid' ";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {
        header('location: admin.php');
    }  
}
?>