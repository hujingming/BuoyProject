<?php

	include 'config.php';

	$query = "SELECT * FROM users";

	$result = mysql_query($query);

	while($user = mysql_fetch_array($result)) {
		echo '
			<table>
			  <tr>
			    <td>Username</td>
			    <td>', $user['username'], '</td>
			  </tr>
			  <tr>
			    <td>User ID</td>
			    <td>', $user['user_id'], '</td>
			  </tr>
			  <tr>
			    <td>Image Link</td>
			    <td>', $user['avatar_link'], '</td>
			  </tr>
			</table>';



		echo "<h3>" . $user['username'] . "</h3>";
		echo "<h3>" . $user['user_id'] . "</h3>";
		echo "<img src=\"" . $user['avatar_link'] . "\" alt=\"Avatar\" height=\"125\" width=\"200\">";
		echo "<h3>" . $user['buoy_rating'] . "</h3>";
	}

?>