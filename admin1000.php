<?php 
require_once('auth.php');
require_once('sqlconfig.php');
function purify($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);  
    return $var;
}
if (isset($_POST['del_date'])) {
  $track_id=$_POST['track_id'];// echo "$track_id";
// $track_id = rand(200000000,5000000004);
  $ship_date=purify($_POST['Ship_date']);
  $del_date =  purify($_POST['del_date']);
  $Ship_type = purify($_POST['ship_type']);
  $Pack_type=purify($_POST['pack_type']);
  $rec_addr=purify($_POST['rec_addr']);
  $shipper=purify($_POST['shipper']);
  $qty=purify($_POST['qty']);
  $status=purify($_POST['pac_status']);
  $recname=purify($_POST['recname']);
  $pay_mode = purify($_POST['pay_mode']);
  $shipper_addr=purify($_POST['shipper_addr']);
  $recphone = purify($_POST['recphone']);
  $shipper_origin=purify($_POST['shipper_origin']);
  $deptime=purify($_POST['deptime']);
  $product = purify($_POST['product']);
  $recmail = purify($_POST['recmail']);
  $weight =purify($_POST['weight']);
  $query="INSERT INTO `orders` (trackid,ship_date,Estimated_delivery,Shipment_type,package_type,recaddress,shipper,quantity,status,recname,pay_mode,shipper_addr,recphone,shipper_origin,deptime,product,recmail,weights) VALUES('$track_id','$ship_date','$del_date','$Ship_type','$Pack_type','$rec_addr','$shipper','$qty','$status','$recname','$pay_mode','$shipper_addr','$recphone','$shipper_origin','$deptime','$product','$recmail','$weight')";
  $result=mysqli_query($con,$query);
  if (!$result) {
    echo "<h1>Error</h1>".mysqli_error($con);
  }
else {
    echo "<p>Order Created Successfully</p>";
}
}
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <title> TransWorld </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">
   <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
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
.yay {
  box-shadow: 5px 10px rgb(201, 129, 129);
}
    </style>
    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
  <a class="navbar-brand ion-arrow-left-c btn" href="index.html" >Home page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEx" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id ="navbarEx">
  <ul class="navbar-nav mr-auto">
  <li class="nav-item">
<button type="button" class=" nav-link btn btn-info" data-toggle="modal" data-target="#createmodal">Create Order</button></li>
<li class="nav-item">
<a class="btn btn-info nav-link" href="checkemail.php">Check Mails</a>
</li>
<li class="nav-item"><button type="button" class=" nav-link btn btn-info" data-toggle="modal" data-target="#changemodal">Change Admin Password</button></li>

<li class="nav-item">
<a class="btn btn-info nav-link" href="qr_code/index.html">qrcode generator</a>
</li>

</li>
<li class="nav-item">
<a class="btn btn-info nav-link" href="logout.php">Logout</a>
</li>
</ul>
</nav>
</div>
</div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="create">
    <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="createmodalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="xmodalLabel">Enter Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="cancel">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <div class="md-form mt-0">
              <span>
                <label for="Trackid">Track ID</label>
                <input class="form-control" id="track_id" name="track_id" type="number" min="1000" placeholder="make sure you havnt used this number before" required>
                <label for="Ship_date">Shipping date</label>
              <input class="form-control" id="Shipping Date" name="Ship_date" type="date" required>
              <label for="del_date">Delivery date</label>
              <input class="form-control" id="Delivery date" name="del_date" type="date" required>
              <label for="Ship_type">Shipment Type</label>
              <input class="form-control" id="Shipping Type" placeholder="Air Freight" name="ship_type" type="text" required>
              <label for="del_date">Type of package</label>
              <input class="form-control" id="package type" name="pack_type" type="text" placeholder="Laptops" required>
              <label for="rec_name">Reciever name</label>
              <input class="form-control" id="Reciever name" name="recname" type="text" required>
              <label for="del_date">Reciever Address</label>
              <input class="form-control" id="Reciever Address" name="rec_addr" type="text" required>
              <label for="del_date">Package Status</label>
              <select id="pac_status" name="pac_status" class="form-control"><option value="In transit" selected>In transit</option><option value="On hold">On hold</option></select><br/>
              <label for="qty">Quantity of Goods ordered</label>
              <input class="form-control" id="Qty" name="qty" type="number" required>
              <label for="dpack_sender">Package Sender</label>
              <input class="form-control" id="Shipper" name="shipper" type="text" placeholder="eg. John Smith" required>
              <label for="weight"> Package weight </label>
              <input class="form-control" id="weight" name="weight" type="text" required>
              <label for="pay_mode">Payment Mode </label>
              <select id="pay_mode" name="pay_mode" class="form-control"><option value="Post Paid" selected>Post Paid </option><option value="Prepaid">Prepaid</option></select>
              <br/>
              <label for="shipper_addr">Shipper Address </label>
              <input class="form-control" name="shipper_addr" type="text" placeholder="address of the package sender" required> <br>
              <label for="recphone">Reciever Phone Number </label>
              <input class="form-control" name="recphone" type="text" required>
              <label for="shipper_origin">Package/Sender Origin </label>
              <input class="form-control" name="shipper_origin" type="text" required>
              <label for="deptime"> Package departure Time </label>
              <input class="form-control" name="deptime" type="text" required>
              <label for="product"> Product </label>
              <input class="form-control" name="product" type="text" required> <br>
               <label for="mail">Reciever Email </label>
               <input class="form-control" type="email" name="recmail" required>
            </span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" class="btn btn-primary" id="sub">Go!</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <?php 
      $qquery = "SELECT * FROM `orders` ORDER BY trackid";
      $resultt=mysqli_query($con,$qquery) or die("There was an error running this query. Please contact the admin.");
      while ($wor = mysqli_fetch_array($resultt)) {
        $ship_date= $wor['ship_date'];
        $Estimated_delivery = $wor['Estimated_delivery'];
        $Shipment_type = $wor['Shipment_type'];
        $Package_type= $wor['package_type'];
        $recaddress= $wor['recaddress'];
        $shipper= $wor['shipper'];
        $quantity= $wor['quantity'];
        $status= $wor['status'];
        $recname= $wor['recname'];
        $tracker=$wor['trackid'];
        $pay_mode=$wor['pay_mode'];
        $shipping_c = $wor['shipping_c'];
        $taxes = $wor['taxes'];
        $duty = $wor['duty'];
        $echostring= "<table class='table center xax'>
      <thead> <tr>
      <h2 align=center>$tracker <a class='btn btn-danger' href='delete.php?tracker=$tracker' align='left'>Delete</a><a class='btn btn-info btn-mini' href='hold.php?tracker=$tracker&status=$status' align='left'>Remove/Put on Hold</a><a class='btn btn-secondary' href='history.php?tracker=$tracker' align='left'> Package Location</a>
      <a class='btn btn-secondary btn-mini' href='receipt.php?id=$tracker' align='left'> Reciept</a></h2>
      <th scope='col'>Title</th>
      <th scope='col'>Details</th>
      </tr> </thead>
      <tbody>
      <tr> 
      <th scope='row'><i class='icofont-check-circled'></i>Shipment type</th>
      <td> $Shipment_type<a href='edit.php?editvalue=$Shipment_type&edittable=Shipment_type&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Package Type</th>
      <td> $Package_type<a href='edit.php?editvalue=$Package_type&edittable=package_type&tracker=$tracker' class='btn btn-mini'> Edit</a></td>
      </tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Qty</th>
      <td> $quantity<a href='edit.php?editvalue=$quantity&edittable=quantity&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      <tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Package Sender</th>
      <td>$shipper<a href='edit.php?editvalue=$shipper&edittable=shipper&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Shipping Date</th>
      <td> $ship_date<a href='edit.php?editvalue=$ship_date&edittable=ship_date&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Reciever</th>
      <td> $recname<a href='edit.php?editvalue=$recname&edittable=recname&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Status</th>
      <td>$status</td>
      </tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Package Location</th>
      <td>$recname<a href='edit.php?editvalue=$recname&edittable=recname&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Estimated Delivery date</th>
      <td> $Estimated_delivery<a href='edit.php?editvalue=$Estimated_delivery&edittable=Estimated_delivery&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      <tr>
      <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Payment Mode</th>
      <td> $pay_mode<a href='edit.php?editvalue=$pay_mode&edittable=pay_mode&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
       <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Shipping Charges</th>
      <td> $shipping_c<a href='edit.php?editvalue=$shipping_c&edittable=shipping_c&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
       <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Duty Charges</th>
      <td> $duty<a href='edit.php?editvalue=$duty&edittable=duty&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
       <tr>
      <th scope='row'><i class='icofont-check-circled'></i>Taxes Paid</th>
      <td> $taxes<a href='edit.php?editvalue=$taxes&edittable=taxes&tracker=$tracker' class='btn btn-mini'>Edit</a></td>
      </tr>
      </tbody>
      </table>";
      echo $echostring;
   }
    ?>
    <form action="changeadmin.php" method="POST" name="create">
    <div class="modal fade" id="changemodal" tabindex="-1" role="dialog" aria-labelledby="createmodalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="xmodalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="cancel">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <div class="md-form mt-0">
              <span>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control " required>
                </div>
              </div> 
  <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Old Password</label>
                  <input type="text" id="opassword" name="opassword" class="form-control " required>
                </div>
              </div>
                
              </div>
  <div class="row">
                <div class="col-md-6 form-group">
                  <label for="password">New Password</label>
                  <input type="password" id="password" name="password" class="form-control " required>
                </div>
              </div>
                  <input type="submit" value="Change" class="btn btn-primary px-3 py-3">
                </div>
            </span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" class="btn btn-primary" id="inip">Go!</button>
          </div>
        </div>
      </div>
    </div>
    </form>
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/main.js"></script>


    <script src="js1/jquery-3.2.1.min.js"></script>
    <script src="js1/popper.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/owl.carousel.min.js"></script>
    <script src="js1/jquery.waypoints.min.js"></script>
    <script src="js1/jquery.fancybox.min.js"></script>
    <script src="js1/main.js"></script>


    <script src="js1/main.js"></script>
</body>
    </html>