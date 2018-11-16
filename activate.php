<!--
SQL Injection that cause activation of all accounts in some system, such as: program licence, system account, etc.
-->

<form method="POST">
	activate code: <input type="text" name="token">
	<button type="submit">Activate</button>
</form>

<?php

include_once('connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$token = $_POST['token'];	// anything' OR 'x'='x

	$query = "UPDATE tokens SET active = 1
			WHERE token = '$token'";

	$result = mysqli_query($conn, $query);

	if($conn->affected_rows > 0) {
		echo "Done";
	} else {
		echo "Done not";
	}
}

?>