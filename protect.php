<form method="POST">
	username: <input type="text" name="username">
	password: <input type="text" name="password">
	<button type="submit">Login</button>
</form>


<?php

include_once('connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$statement = $conn->prepare("SELECT * FROM users 
								WHERE username = ?
								AND password = ?");

	$statement->bind_param("ss", $username, $password);

	$statement->execute();

	while($statement->fetch()) {
		echo "Success";
		return;
	}

	echo "Fail";

	$statement->close();
}

?>