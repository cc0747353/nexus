<?php
require_once('sqlconfig.php');
require_once('auth.php'); 
if (isset($_POST['username'])) {
    $username =stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $opassword = stripslashes($_POST['opassword']);
    $opassword = mysqli_real_escape_string($con,$opassword);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $query1 = "SELECT * FROM `login` WHERE username='$username' and passwords='$opassword'";
    $result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
    $rows1 = mysqli_num_rows($result1);
    if ($rows1==1) {
        $query2 = "UPDATE  `login` SET passwords='$password' WHERE username='$username'";
        $result2 = mysqli_query($con,$query2) or die("There was an error updating the password, try later");
        if ($result2) {
            echo "<h2>Password Successfully reset. Please login again </h2>";
            echo "<a class='btn btn-success' href='login.php'>Click to Login </a>";
        }
        else {
            echo "Error";
        }
    }
    else {
       echo "Wrong Password/Username";
    }
}
else {
    echo "There was an unspecified eror. Please go back and try again";
}
?>