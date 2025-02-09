<?php
require_once('sqlconfig.php');
require_once('auth.php');
$tracker =$_GET['tracker'];
?>

<html><head><title>Delete?</title></head>
    <body><h1>Are you sure you want to delete this Order</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" name="delete">
    <input type="radio" name="radio" value="yes">Yes
    <input type="radio" name="radio" value ="no"> No
    <input type="hidden" name="tracker" value="<?php echo $tracker; ?>">
    <input type="submit" name="GO" value="submit">
    </form></body></html>
<?php
if (isset($_GET['GO'])) {
    $answer=$_GET['radio'];
    $tracky = $_GET['tracker'];
    if ($answer=='yes') {
        $query= "DELETE from orders WHERE trackid=$tracky";
        $result = mysqli_query($con,$query);
        if ($result) {
                        $query2 = "DELETE FROM  `trackhistory` WHERE trackid=$tracky";
                        $result2 = mysqli_query($con,$query2);
                        if ($result2) {
                             echo "order deleted sucesfully";
                             header('location:admin.php');
                        }
        }
        else {
            echo "<h1>There was an error deleting.Please try again later</h1>";
        }
    } else {
        header('location: admin.php');
    }
}
mysqli_close($con);
?>