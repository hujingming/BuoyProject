<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="buoyStyles.css">   
    <title>BuoyBooks</title>
  </head>
	<body id="body">
    <div id="nav">  
      <ul>    
        <li><a href="buoyBooks.php" id="mybuoynav">MyBuoy</a></li>
        <li><a href="buoyBooks.php" id="booksnav">Books</a></li>
        <li><a href="buoyComputers.php" id="computersnav">Computers</a></li>
        <li><a href="buoyAccessories.php" id="accessoriesnav">Accessories</a></li>
        <li><a href="buoyApartments.php" id="apartmentsnav">Housing</a></li>
        <li><a href="buoyOther.php" id="othernav">Other</a></li>
      </ul>     
    </div>
    
    <div id="form-container">  
        <div id="h1">
        <h1>BuoyBooks:</h1>
    <div id="buoy_header">
        <img src="buoyIcon.png" alt="Buoy" width="100" height="100">
    </div> 
<div id="create_new_button">
<a href="createBooks.html">create new listing</a>
</div>
<div id="submarket_background">
<div id="submarket_body">
<h2>Current listings: </h2>

<?php
    require 'db_connect.php';
    
    $query = "SELECT * FROM `books`";
    if($is_query_run = mysql_query($query)) {
        // echo "query executed <br>";
        
        while($query_execute = mysql_fetch_assoc($is_query_run)) {
            echo 
                "<h3>" . $query_execute['title'] . "</h3>" .
                 "<img src=\"" . $query_execute['image_link'] . 
                    "\" alt = \"". $query_execute['title'] . "\" 
                    height=\"200\" 
                    width \"300\"
                    >" .
                 "<br> <b>Edition</b>: " .$query_execute['edition'] .
                 "<br> <b>Course</b>: " . $query_execute['course'] .
                 "<br> <b>Professor</b>: " . $query_execute['professor'] .
                 "<br> <b>Semester used</b>: " . $query_execute['semester_used'] .
                 "<br> <b>Condition</b>: " . $query_execute['condition'] .
                 "<br> <b>Price</b>: " . $query_execute['price'] .
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