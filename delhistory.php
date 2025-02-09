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
    if(isset($_GET['tracker'])) {
        $tracker = $_GET['tracker'];
        $prykey = $_GET['prykey'];
        $query2 = "DELETE FROM `trackhistory` WHERE trackid=$tracker AND idcol=$prykey";
        $result2 = mysqli_query($con,$query2);
        if ($result2) {echo "order deleted sucesfully";
        header('location:admin.php');
            
        }
        else{
            echo "error".mysqli_error($con);
        }
    }
    ?>
</body>
</html>