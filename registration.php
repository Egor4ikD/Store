<?php session_start(); 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Registration </title>
		<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
		<link rel="icon" href="favicon.ico" type = "image/vnd.microsoft.icon">
	</head>
		<body id= "body2">
			<table>
				<tr>
					<td id = "upstr">
					<ul class="nav">
							<li><a href="./index.php">Главная</a></li>
							<li><a href="./login.php">Вход</a></li>
					</ul>
					</td> 
				</tr>
			</table>
			<div id="box">
			<div id = "boxinbox">		
				<div  id="ugolkrug"> </div>
				<form id = "reg" action="reg.php" method="post">
					<h1 id = "avtorization"> РЕГИСТРАЦИЯ</h1>
					<input id="name" type="text" required name="login" placeholder="Введите логин" size="20" pattern = "^[A-Za-z0-9]+$"/> 
					<p> <input type="password" required name="password" minlength = "8" placeholder="Введите пароль" size="20" maxlength="16" pattern="^[A-Za-z0-9]+$"/> </p>
					<p> <input id="name" type="text" required  name="username" placeholder="Введите имя" size="20" pattern = "^[А-Яа-яЁё\s]+$"/> 
					<p> <input type="submit" name="inp2" value="Регистрация"/> </p>		
				</form>		
			</div>		 
		</div>
	</body>
</html>