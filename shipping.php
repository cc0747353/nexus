<?php require_once 'sqlconfig.php'; 

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Package History</title>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 5px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: none;
        width: 100%;
        height: 600px%;
        position: relative;
        bottom: 0px;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 100%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
        overflow: scroll;
        height: 174px;
      }
    </style>
  </head>
  <body>
    <?php
  if (isset($_GET['trackid'])) {
      $trackid = $_GET['trackid'];
      $query = "SELECT * FROM `trackhistory` WHERE trackid=$trackid Order BY idcol ASC";
      $result = mysqli_query($con,$query);
      $q2 = "SELECT * FROM `orders` WHERE trackid=$trackid";
      $res = mysqli_query($con,$q2);
      if ($wow = mysqli_fetch_array($res)) {
        $status = $wow['status'];
        $estimated_delivery = $wow['Estimated_delivery'];
        $shipment_type = $wow['Shipment_type'];
        $package_type = $wow['package_type'];
        $rec_address = $wow['recaddress'];
        $shipper = $wow['shipper'];
        $recname = $wow['recname'];
        $shipper_adr = $wow['shipper_addr'];
        $recmail = $wow['recmail'];
        $weight = $wow['weights'];
        $shipping_costs = $wow['shipping_c'];
        $duty = $wow['duty'];
        $taxes = $wow['taxes'];
      }
      while ($row= mysqli_fetch_array($result)) {
       // var_dump($row);
        $lat = $row['lat']; $lng = $row['lng'];
         $lats[]= '{lat: '. $lat.', lng: '. $lng. ' }';
        $currentLocation[]= $row['loocation'];
        $statuus[] =$row['status'];
        $remarks[] =$row['remarks'];
         
      }
      //var_dump($lats); 
     // echo reset($lats);
      $jlats = json_encode($lats);
      $jlats = str_replace('"','', (string) $jlats);
      $cur = end($currentLocation);
      $Xstatus = end($statuus); 
      $xremarks = end($remarks);
     // echo $cur;
  }

    ?>
  
    <div id="right-panel">
      <?php 
        echo "Tracking ID: $trackid<br><hr>";
      echo "Current Package Location : <b>$cur</b><hr>";
            echo "This Package is <h2>$Xstatus</h2><hr>";
            echo" Remarks : $xremarks <hr>" ;
            echo "Estimated Delivery Date:$estimated_delivery <hr>";
            echo "Sender: $shipper <hr>";
            echo "Shipping Address: $shipper_adr <hr>";
            echo "Shipment Type: $shipment_type <hr>";
            echo "Package Type: $package_type <hr>";
            echo "Reciever Name: $recname <hr>";
            echo "Reciever Email : $recmail <hr>";
            echo "Reciever Address: $rec_address <hr>";
            echo "Weight: $weight <hr>";
            echo "Shipping Costs: $shipping_costs <hr>";
            echo "Duty: $duty <hr>";
            echo "Taxes: $taxes <hr>";
            

      ?> <br><div id="map" style="height: 600px:" ></div>
    </div>
    <script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: <?php echo reset($lats);?> ,
    mapTypeId: 'terrain'
  });
  
  var markerPoints = <?php echo $jlats; ?>;
                      
  markerPoints.forEach(function(value){
  	new google.maps.Marker({
      map: map,
      position: value
    });
  });     
  
  var lineSymbol = {
    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
  };	

  var flightPlanCoordinates = markerPoints;
  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 3,
    icons: [
    	{icon: lineSymbol,
      offset: '25%'},
      {icon: lineSymbol,
      offset: '50%'},
      {icon: lineSymbol,
      offset: '55%'},
      {icon: lineSymbol,
      offset: '100%'},
    ]
  });

  flightPath.setMap(map);
}
    </script> <br /> 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdgYV66wo0CUO_O178UOBcdS1NI_JNU3E&callback=initMap"></script>
	<script src="//code.tidio.co/4vfglz2tecgfqejmwy13lpqu5pr1b6xn.js" async></script>
	    <script src="//code.tidio.co/4vfglz2tecgfqejmwy13lpqu5pr1b6xn.js" async></script>
  </body>
</html>