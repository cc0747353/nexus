<?php require_once 'sqlconfig.php'; ?>
<html>
    <head>
       <title>Track Your Shipment </title>
       <link rel="stylesheet" url="dashboard.css">
       <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <style>
         .row {
    border: 2px solid black;
  }


       </style>
       <style type="text/css">
#background{
    position:absolute;
    z-index:0;
    background:white;
    display:block;
    min-height:100%; 
    min-width:100%;
    color:yellow;
}

#content{
    position:absolute;
    z-index:1;
}

#bg-text
{
    color:lightgrey;
  
    transform:rotate(300deg);
    -webkit-transform:rotate(300deg);
}


 </style>
    </head>
    <body style="background-image: url('assets/img/wallpaper.jpeg') ;"> 
    <br><br><br><br>

<?php if (isset($_GET['id'])) {
      $tracker = $_GET['id'];
      // $tracker= mysqli_real_escape_string($con,$tracker);
       $query = "SELECT * FROM `orders` WHERE trackid=$tracker";
       $result = mysqli_query($con,$query);
       $res = $result;
       $lopa = mysqli_num_rows($res);
       if ($lopa<1) {
           echo "<h1>No such order found!</h1>";
       }
      if ( $row=mysqli_fetch_array($res)) {
        //var_dump($row);  
        $phone = $row['recphone']; 
        $des_count = $row['shipper_addr'];
        $content = $row['product'];
        $del_addr = $row['recaddress'];
        $arr_date = $row['Estimated_delivery'];
        $id = $row['trackid'];
        $send_name = $row['shipper'];
        $ship_date = $row['ship_date'];
        $estimated_delivery = $row['Estimated_delivery'];
        $weight = $row['weights'];
        $rec = $row['recname'];
        $shipping_c = $row['shipping_c'];
        $taxes = $row['taxes'];
        $duty = $row['duty'];
        ?>
  
    <span align='center'>
    // <h2><img src="LOGO2.jpg"><b>INTERNATIONALFASTEXPRESS Logistics</b></h2>
    <h5><b><br> SPECIAL DELIVERY RECIEPT</b><br>
    <button class="btn btn-lg btn-success" onclick="printer()">Print</button>
    <script type="text/javascript">
        function printer() {
          window.print();
        }
    </script>
  <!-- <img src="assets/img/hero_2.jpeg" align='left'>
    <img src="assets/img/head.jpeg" align='right'>--><br><br></h5>
    </span> <br><br><br><br> <b>
  <!--   
    <div id=background'>
  <p id='bg-text' >MOEXPRESS  COURIER SERVICES <br></p>
  <p id='bg-text' >MOEXPRESS  COURIER SERVICES <br></p>
  <p id='bg-text' >MOEXPRESS  COURIER SERVICES <br></p>
	</div>

	<div id='content'>
 
  <br/>

	</div> -->
<div class="container">   
<div class="row">
<div class="col justify-content-md-center col-4">

  <div class="row" style="background-color: gray; ">DESTINATION COUNTRY</div>
  <div class="row "><br><br><h5> <?php echo $des_count; ?></h5></div>
  <div class="row" style="background-color: gray;">SENDER'S NAME</div>
  <div class="row"><br><br><h5><?php echo $send_name; ?></h5></div>
  <div class="row" style="background-color: gray;">RECIEVER NAME</div>
  <div class="row"><br><br> <?php echo $rec ; ?> </div>

  <div class="row" style="background-color: gray;"><br>CONTENT OF ITEM</div><div class="row"><br><h5><?php echo $content;  ?></h5> <br> </div>
  <div class="row" style="background-color: gray;">SENDER AUTHORIZED </div>
  <div class="row"><img src="assets/img/finger.jpeg"></div>
   <div class="w-100"></div> 

 </div>
 <div class="col">
 <div class="row" style="background-color: gray;">SERVICE TYPE</div><br>
  <div class="row "><ul><b><h5>
    <li>WORLD WIDE EXPRESS</li>
    <li><b>*</b> DIPLOMATIC DELIVERY</li>
    <li>DOMESTIC EXPRESS</li>
    <li>SPECIAL SERVICE</li>
    <li>WORLD OVERNIGHT EXPRESS</li>
    <li>REGULAR</li> </h5></b>
  </ul></div><!--
  <div id=background'>
  <p id='bg-text' >MOEXPRESS  COURIER SERVICES <br></p>
  <p id='bg-text' >MOEXPRESS COURIER SERVICES <br></p>
	</div>

	<div id='content'>
 
  <br/>

	</div>-->
<div class="row" style="background-color: gray;">
  DELIVERY ADDRESS
</div>
<div class="row">
  <br><br><h5> <?php echo $del_addr; ?> </h5><br><br><br>
</div>
<div class="row">
<br><br>
  DELIVERY DATE: <?=$estimated_delivery?>
  <br><br>
</div>
<div class="row"><br><br><h5>
  PHONE NUMBER: <?php echo $phone; ?> </h5>
  <br> <br>
</div>
 </div>
 <div class="col">
   <div class="row"><br><br><h5>
    <b> DEPARTURE DATE:<?=$ship_date?> <br>  </b>
      </h5><br><br> <br><br>
   </div>
   <div class="row">
     FORM OF PAYMENT
   </div>
   <div class="row">
     <ul>  <b><h5>
       <li>*CASH</li><br><br>
       <li>CHEQUE</li><br><br>
       <li>CORPORATE ACCOUNT</li><br><br>
       <li>EXTERNAL BILLING ACCOUNT</li> <br><br></b>
      </h5>
     </ul>
   </div>
   <div class="row"> <br><br>
     <p>WARNING!! CONFIDENTIAL <br> THE PACKAGE CAN ONLY BE OPENED BY THE RECIEVER ONLY</p>
   </div>
 </div>
<div class="col">
  <div class="row">ORIGIN</div>
  <div class="row"><br><h5><b>USA</b></h5><br></div>
  <div class="row"><br><br><h5><?php echo $weight; ?></h5><br><br></div>
  <div class="row">
    <div class="col"><br><br>CODE: <br> <h5><?php echo $id; ?></h5><br><br></div>
    <div class="col"><br><br>SERVICE CHARGES<br><br></div>
  </div>
  <div class="row">
    <div class="col">SHIPPING</div>
    <div class="col"><?=$shipping_c?></div>
  </div>
  <div class="row">
    <div class="col">TAXES</div>
    <div class="col"><h5><?=$taxes?></h5></div>
  </div>
  <div class="row">
    <div class="col">DUTY PAID</div>
    <div class="col"><?=$duty?></div>
  </div>
  
  <div class="row">
    NOTE: RULES AND REGULATIONS VARIES FROM ONE JURISDICTION <br> TO ANOTHER AND NOT LIMITED TO THE CONCLUSION TERMS OF THIS
  </div>
  <div class="row" >
    UNITED AGENTS AGENT REPRESENTATIVE
    <br><br>
  </div>
</div>
</div> </b>
<?php 
 }
}
?>
    </body>
</html>