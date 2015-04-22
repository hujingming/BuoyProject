<?php
	include 'db_connect.php';

	$user_id = "user1234";
	$name = $_POST['accessories_name'];
	$price = $_POST['accessories_price'];
	$condition = $_POST['accessories_condition'];
	$image_link = $_POST['accessories_photourl'];
	$description = $_POST['accessories_description'];
	$seller = $_POST['accessories_seller'];

	$patterns = array();
	$patterns[0] = '/\'/';
	$replacements = array();
	$replacements[0] = '';
	$validatedName = preg_replace($patterns, $replacements, $name);
	$validatedPrice = preg_replace($patterns, $replacements, $price);
	$validatedDescription = preg_replace($patterns, $replacements, $description);

	if(!$_POST['accessories_submit']) {
		echo "Submission unsuccessful.";
		// header('Location: CreateAccessories.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyAccessories.php \">";
	} else {
		mysql_query("INSERT INTO elec_accessories (	`item_id`, `user_id`, `name`, `condition`, 
														`description`, `price`, `image_link`,`seller`)
						VALUES(NULL,'$user_id','$name','$condition','$validatedDescription','$validatedPrice',
									'$image_link','$seller')")
						or die(mysql_error());
		echo "Accessory has been listed.";
		// header('Location: CreateAccessories.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyAccessories.php \">";
	}

?>