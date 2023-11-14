<?php
session_start();
require_once('connect.php');

if(isset($_POST['inp2'])) {
	
	$login = $_POST['login'];
	$password = $_POST['password'];
	$username = $_POST['username'];

	$password = password_hash($password,PASSWORD_DEFAULT);
	$sql =  "INSERT INTO users (login, password, username) VALUES('$login', '$password','$username')";

	$conn -> query($sql);	

	$sqlup = "UPDATE users SET roleid = 2 WHERE login = '$login'";
	$conn ->query($sqlup);

	$_SESSION['message'] = "Регистрация успешна";
}
header('location: login.php');
?>




