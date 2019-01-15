<?php
	$server = 'localhost';
	$user = 'hazy';
	$password = 'pandasqwad';
	$db = 'users_info';
	
	$conn = mysqli_connect ($server, $user, $password, $db);
	
	if (!$conn){
		die ("Connection Failed!:".mysqli_connect_error());
	}
?>