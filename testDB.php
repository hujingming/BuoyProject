<?php

	include 'config.php';

	$query = "SELECT * FROM users";

	$result = mysql_query($query);

	while($user = mysql_fetch_array($result)) {
		echo "<h3>" . $user['username'] . "</h3>";
		echo "<h3>" . $user['user_id'] . "</h3>";
		echo "<img src=\"" . $user['avatar_link'] . "\" alt=\"Avatar\" height=\"125\" width=\"215\">";
		echo "<h3>" . $user['buoy_rating'] . "</h3>";
	}

?>