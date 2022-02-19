<?php
session_start();

include "dbconnect.php";

$user_login = $_POST['login'];
$user_pass = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE login = :login";
$result = $conn->prepare($sql);
$result->execute(array(':login' => $user_login));
$row = $result->fetch();
if ($row){
	if (password_verify($user_pass, $row['password']))
	{
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['week_counter'] = 0;
		$_SESSION['user_status'] = $row['status'];
		echo('0');
	}
}
else {
	echo(1);
}
?>
