<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="buoyStyles.css">   
    <title>BuoyHousing</title>
  </head>
	<body id="body">
    <div id="nav">  
      <ul>    
        <li><a href="buoyApartments.php" id="mybuoynav">MyBuoy</a></li>
        <li><a href="buoyBooks.php" id="booksnav">Books</a></li>
        <li><a href="buoyComputers.php" id="computersnav">Computers</a></li>
        <li><a href="buoyAccessories.php" id="accessoriesnav">Accessories</a></li>
        <li><a href="buoyApartments.php" id="apartmentsnav">Housing</a></li>
        <li><a href="buoyOther.php" id="othernav">Other</a></li>
      </ul>     
    </div>
    <h1>BuoyHousing:</h1>
    <div id="buoy_header">
        <img src="buoyIcon.png" alt="Buoy" width="100" height="100">
    </div> 
<div id="create_new_button">
<a href="createHousing.html">create new listing</a>
</div>

<div id="submarket_background">
<div id="submarket_body">
<h2>Current listings: </h2>

    <?php
    require 'db_connect.php';
    
    $query = "SELECT * FROM `apartments`";
    if($is_query_run = mysql_query($query)) {
        // echo "query executed <br>";
        
        while($query_execute = mysql_fetch_assoc($is_query_run)) {
            echo 
                "<h3>" . $query_execute['street_address'] . "</h3>" .
                 "<img src=\"" . $query_execute['image_link'] . 
                    "\" alt = \"". $query_execute['street_address'] . "\" 
                    height=\"200\" 
                    width \"300\"
                    >" .
                 "<br> <b>Zip code</b>: " .$query_execute['zip_code'] .
                 "<br> <b>Bedrooms</b>: " . $query_execute['bedrooms'] .
                 "<br> <b>Lease/Sublet timeframe</b>: " . $query_execute['timeframe'] .
                 "<br> <b>Rent price per month</b>: " . $query_execute['rent_price'] .
                 "<br> <b>Description</b>: " . $query_execute['description'] .
                 "<br> <b>Seller</b>: " . $query_execute['seller'] . "@pitt.edu" . 
                 '<br><br>';
        }
    } else {
        echo "query not executed";
    }

    ?>
  </div>
  </div>
	</body>
</html>