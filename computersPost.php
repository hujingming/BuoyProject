<?php
	include 'db_connect.php';

	$user_id = "user1234";
	$name = $_POST['computers_name'];
	$model = $_POST['computers_model'];
	$manufacturer = $_POST['computers_manufacturer'];
	$condition = $_POST['computers_condition'];
	$price = $_POST['computers_price'];
	$image_link = $_POST['computers_photourl'];
	$description = $_POST['computers_description'];
	$seller = $_POST['computers_seller'];

	$patterns = array();
	$patterns[0] = '/\'/';
	$replacements = array();
	$replacements[0] = '';
	$validatedName = preg_replace($patterns, $replacements, $name);
	$validatedModel = preg_replace($patterns, $replacements, $model);
	$validatedManufacturer = preg_replace($patterns, $replacements, $manufacturer);
	$validatedPrice = preg_replace($patterns, $replacements, $price);
	$validatedDescription = preg_replace($patterns, $replacements, $description);

	if(!$_POST['computers_submit']) {
		echo "Submission unsuccessful.";
		// header('Location: CreateAccessories.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyComputers.php \">";
	} else {
		mysql_query("INSERT INTO computers (	`item_id`, `user_id`, `name`, `model`,`manufacturer`,`condition`,
														`price`, `image_link`, `description`,`seller`)
						VALUES(NULL,'$user_id','$validatedName','$validatedModel','$validatedManufacturer','$condition','$validatedPrice','$image_link',
							'$validatedDescription','$seller')")
						or die(mysql_error());
		echo "Computer has been listed.";
		// header('Location: CreateAccessories.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyComputers.php \">";
	}

?>