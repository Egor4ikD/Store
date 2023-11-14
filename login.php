<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<div id="media">
    <head>
        <meta charset="utf-8">
        <title> Login </title>
		<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
		<link rel="icon" href="favicon.ico" type = "image/vnd.microsoft.icon">
	</head>
		<body id= "body2">
			<table>
				<tr>
					<td id = "upstr">
						<ul class="nav">
							<li><a href="./index.php">Главная</a></li>
							<li><a href="./registration.php">Регистрация</a></li>
						</ul>
					</td> 
				</tr>
			</table>
		<div id="box">
			<div id = "boxinbox">				
				<div  id="ugolkrug"> </div>	
				<form id = "nampass" action="conlog.php" method="post" >	
					<h1 id = "avtorization"> ВХОД</h1>
					<input id="name" type="text" required name="login" placeholder="Введите логин" size="20" /> <br>
					<p><input type="password" required name="password" placeholder="Введите пароль" size="20" maxlength="11"/> </p>
					<input type="submit" name="inp" value="Войти" />
				<?php
				if(isset($_SESSION['message'])) {
					echo "<p class ='msg'>" . $_SESSION['message'] . "</p>";
					}
				unset($_SESSION['message']);
				?>	
				</form>
				
			</div>		 
		</div>
		</div>
	</body>
</html>