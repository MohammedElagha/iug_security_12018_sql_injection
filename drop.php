<!--
SQL Injection, in Login form, that cause drop table from database.
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
	$password = $_POST['password'];		// anything' OR '1' = '1'; DROP TABLE dropped. then escaping

	$query = "SELECT * FROM users WHERE
			username = '$username'
			AND password = '$password'";

	$result = mysqli_mulit_query($conn, $query);

	if($result->num_rows > 0) {
		echo "Success";
	} else {
		echo "Fail";
	}
}

?>