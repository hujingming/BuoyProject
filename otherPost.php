<?php
	include 'db_connect.php';

	$user_id = "user1234";
	$name = $_POST['other_name'];
	$condition = $_POST['other_condition'];
	$price = $_POST['other_price'];
	$image_link = $_POST['other_photourl'];
	$description = $_POST['other_description'];
	$seller = $_POST['other_seller'];

	$patterns = array();
	$patterns[0] = '/\'/';
	$replacements = array();
	$replacements[0] = '';
	$validatedName = preg_replace($patterns, $replacements, $name);
	$validatedPrice = preg_replace($patterns, $replacements, $price);
	$validatedDescription = preg_replace($patterns, $replacements, $description);


	if(!$_POST['other_submit']) {
		echo "Submission unsuccessful.";
		// header('Location: CreateAccessories.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyOther.php \">";
	} else {
		mysql_query("INSERT INTO other_items (	`item_id`, `user_id`, `name`, `condition`,`price`,`image_link`,
														`description`,`seller`)
						VALUES(NULL,'$user_id','$validatedName','$condition','$validatedPrice','$image_link','
									$validatedDescription','$seller')")
						or die(mysql_error());
		echo "Item has been listed.";
		// header('Location: CreateAccessories.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyOther.php \">";
	}

?>