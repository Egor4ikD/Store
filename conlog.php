<?php
require_once('connect.php');

if(isset($_POST['inp']))
{
	$login = $_POST['login'];
	$password =($_POST['password']);

     $sql = "SELECT * FROM `users` WHERE login = '$login'";
     $result = $conn->query($sql);
             
	$row = mysqli_fetch_array($result);
	if(password_verify($password, $row['password'])) {
		$_SESSION['user'] = [
		'id' => $row['id'],
		'login' => $row['login'],
		'roleid' => $row['roleid']
		];
		$_SESSION['message'] = "<b>Привет " .$login . "</b>" ;
		header('Location: index.php');                
    }
    else {
        $_SESSION['message'] = "Неверный логин или пароль";
        header('location: login.php');
    }
}
?>