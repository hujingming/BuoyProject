<?php
	include 'db_connect.php';

	$user_id = "user1234";
	$address = $_POST['apartments_address'];
	$zipcode = $_POST['apartments_zip'];
	$bedrooms = $_POST['apartments_bedrooms'];
	$timeframe = $_POST['apartments_timeframe'];
	$price = $_POST['apartments_price'];
	$image_link = $_POST['apartments_photourl'];
	$description = $_POST['apartments_description'];
	$seller = $_POST['apartments_seller'];

	$patterns = array();
	$patterns[0] = '/\'/';
	$replacements = array();
	$replacements[0] = '';
	$validatedAddress = preg_replace($patterns, $replacements, $address);
	$validatedBedrooms = preg_replace($patterns, $replacements, $bedrooms);
	$validatedTimeframe = preg_replace($patterns, $replacements, $timeframe);
	$validatedPrice = preg_replace($patterns, $replacements, $price);
	$validatedDescription = preg_replace($patterns, $replacements, $description);

	if(!$_POST['apartments_submit']) {
		echo "Submission unsuccessful.";
		// header('Location: createApartments.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyApartments.php \">";
	} else {
		mysql_query("INSERT INTO apartments (	`item_id`, `user_id`, `street_address`, `zip_code`, `bedrooms`, 
														`timeframe`, `rent_price`, `image_link`, `description`,`seller`)
						VALUES(NULL,'$user_id','$validatedAddress','$zipcode','$validatedBedrooms','$validatedTimeframe','$validatedPrice',
									'$image_link','$validatedDescription', '$seller')")
						or die(mysql_error());
		echo "Housing item has been listed.";
		// header('Location: createApartments.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyApartments.php \">";
	}

?>