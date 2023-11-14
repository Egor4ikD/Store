<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>All4Tell</title>                            
		<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
		<link rel="icon" href="favicon.ico" type = "image/vnd.microsoft.icon">
  </head>
	<body>
		<div> 
			<div id="mainline"> </div>
			<table>	
				<tr>				
					<td colspan = 3 id="headline">
						<ul class="nav">									
						<li><a href="/web">Главная</a></li><li> 					
						<li><a href='./cart.php'>Корзина</a></li>							
					<?php require_once('nav.php');?>
					</ul>
					</td>  
				</tr>
			</table>
					<?php if(isset($_SESSION['message'])) {
						echo "<p class ='msg'>" . $_SESSION['message'] . "</p>";
					} ?>				
<?php //товар
require_once('connect.php');
// Получение списка товаров
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
// Проверка наличия записей
if (mysqli_num_rows($result) > 0) 
{           //вывод товара
		while ($row = mysqli_fetch_assoc($result))
		{
			echo
			"<div class='product-grid2'> 
				<div class='product-image2'>
					<img class='pic-1' src='img/" . $row['filename']. " '>
					
					<form action='cart.php' method='post'>
					 <input type='hidden' name='productid' value='". $row['id'] ."'/> 
						  <a class='add-to-cart' href='#'>" . "<p>В корзину</p>" . "<a/>
					</form>
						<script src='scripts/script.js'></script>
				</div>
				<div class='product-content'>
					  <h3 class='title'>"  . $row['name'] . "</h3>
					<span class='price'>" . $row['price'] . " руб.</span>
				</div>
				<form action='delete.php' method='post'>
						<input type='hidden' name='id' value='" . $row["id"] . "' />
						<input type='submit' value='Удалить'>
				  </form>				  
			</div>";				
		}
	mysqli_free_result($result);
} else{
	echo"<div class='voidmain'> <h1 id =href='index.php'> <p>Товара нет<br></h1></div>";
}
?>
	</body>
	</div>
</html>