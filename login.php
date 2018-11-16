<!--
SQL Injection that cause successed login.
-->

<form method="POST">
	username: <input type="text" name="username">
	password: <input type="text" name="password">
	<button type="submit">Login</button>
</form>


<?php

include_once('connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];		// anything
	$password = $_POST['password'];		// anything' OR '1' = '1

	$query = "SELECT * FROM users WHERE
			username = '$username'
			AND password = '$password'";

	$result = mysqli_query($conn, $query);

	if($result->num_rows > 0) {
		echo "Success";
	} else {
		echo "Fail";
	}
}

?>