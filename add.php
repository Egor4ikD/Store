<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>All4Tell</title>
		<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
		<link rel="icon" href="favicon.ico" type = "image/vnd.microsoft.icon">
    </head>
	
	<body>

		<div id="maintable">
			<table>
				<tr>
					<td colspan = 3 id="headline">
						<ul class="nav">
							<li><a href="index.php">Главная</a></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>
					    <div  id="ugolkrug"> </div>
			            <form  id = "prod" method="post" enctype="multipart/form-data" action="add.php">
                        <input type="text"  required name="name" class="addpublic" placeholder="Наименование товара"/>
                        <p><input type = "text" required name = "price" class="addpublic" placeholder = "Цена товара"/></p>
                        <p><input name="filename" type="file" /></p>
                        <p> <input type="submit" name = "button" value="Добавить" /> </p>
			</form>

<?php
	require_once('connect.php');
	if(isset($_POST['button']))
	{
		if (move_uploaded_file($_FILES['filename']['tmp_name'], __DIR__ . '\\img\\' . $_FILES['filename']))
		{
			echo $filename= $_FILES['filename']['name'];
		} 
		else 
		{
			 echo "Ошибка загрузки";
		}

		  //добавляется
		$name = ($_POST["name"]);
		$price = ($_POST["price"]);
		$sql = "INSERT INTO products (filename,name, price) VALUES ('$filename', '$name', '$price')";

		//запрос
		if($conn ->query($sql)) 
		{
			header("Location: index.php");
		} 
		else 
		{
			echo "Error: " . $conn->error;
		}
	}
?>
					</td>
				</tr>
				<tr>
					<td colspan = "3"> <div id = "space"> </div> </td>
				</tr>
			</table>
		</div>
	</body>
</html>


